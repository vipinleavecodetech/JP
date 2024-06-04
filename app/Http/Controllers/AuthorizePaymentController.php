<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\CardDetails;
use App\Patient;
use App\PatientShippingAddress;
use App\Managesetting;
use App\User;
use Mail;
use Stripe\Stripe;
use Stripe\Token;
use Stripe\Charge;
use Stripe\Customer;
use Stripe\PaymentMethod;
use Stripe\SetupIntent;
use Stripe\Subscription;
use Illuminate\Support\Facades\DB;
use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;
use DateTime;
use Illuminate\Support\Facades\Auth;


class AuthorizePaymentController extends Controller
{
    public function showPaymentForm($encrypted_patient)
    {
        $patient_form_data = Patient::where('patient_id', decrypt($encrypted_patient))->first();
        //print_r($patient_form_data);
       // die();
        $PatientShippingAddress = PatientShippingAddress::where('patient_id', $patient_form_data->id)->first();
        
        return view('payment', compact('patient_form_data', 'PatientShippingAddress'));
    }
    
    
    public function processSubscriptionAuthorised(Request $request)
    {
        //echo $request->patient_id;
        
        $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
        $merchantAuthentication->setName('3qnKW8Q8H');
        $merchantAuthentication->setTransactionKey('3st244m3N285CHtE');
        ////
        Patient::where('patient_id', $request->patient_id)
           ->update([
               'sure_script_patient_id' => $request->sure_script_patient_id,
               'sure_script_practiceId' => $request->sure_script_practiceId,
               'sure_script_userIdAdded' => $request->sure_script_userIdAdded
        ]);

        $user = User::where('id', $request->patient_id)->first();
        $user->customer_id;
        ///
        
        
        $customerProfileId = $user->customer_id;
        $customerPaymentProfileId = $request->card_id;
        $response=array();
        
        if($customerProfileId==''){
            $customerProfile = $this->createCustomerProfile($request);
            if($customerProfile['message']=='success'){
                $customerProfileId = $customerProfile['customer_id'];
                $customerPaymentProfileId = $customerProfile['card_id']; 
            }else{
                $response['message'] = 'Something went wrong.';
                return $response;
            }
        }
        
        if($customerProfileId!='' && $customerPaymentProfileId==''){
            $customerPaymentProfile = $this->addCustomerCard($request);
            if($customerPaymentProfile['message']=='success'){
                $customerPaymentProfileId = $customerPaymentProfile['card_id'];
            }else{
                $response['message'] = 'Something went wrong.';
                return $customerPaymentProfile['message'];
            }
        }
        // Set the transaction's refId
        $refId = 'ref' . time();
    
        $subscription = new AnetAPI\ARBSubscriptionType();
        $subscription->setName($request->subscription_name);
    
        $interval = new AnetAPI\PaymentScheduleType\IntervalAType();
        $interval->setLength($request->interval);
        $interval->setUnit($request->intervalunit);
        
    
        $paymentSchedule = new AnetAPI\PaymentScheduleType();
        $paymentSchedule->setInterval($interval);
        $paymentSchedule->setStartDate(new DateTime());
        $paymentSchedule->setTotalOccurrences($request->occurance);
        $paymentSchedule->setTrialOccurrences("0");
    
        $subscription->setPaymentSchedule($paymentSchedule);
        $subscription->setAmount($request->amount);
        $subscription->setTrialAmount("0.00");
        
        $profile = new AnetAPI\CustomerProfileIdType();
        $profile->setCustomerProfileId($customerProfileId);
        $profile->setCustomerPaymentProfileId($customerPaymentProfileId);
        //$profile->setCustomerAddressId($customerAddressId);

        $subscription->setProfile($profile);
        
        $apirequest = new AnetAPI\ARBCreateSubscriptionRequest();
        $apirequest->setmerchantAuthentication($merchantAuthentication);
        $apirequest->setRefId($refId);
        $apirequest->setSubscription($subscription);
        $controller = new AnetController\ARBCreateSubscriptionController($apirequest);
    
        $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);
       
        if (($response != null) && ($response->getMessages()->getResultCode() == "Ok") )
        {
            $settings = Managesetting::where('id', '1')->first();
            
            $transaction = new Transaction();
            $transaction->patient_id = $request->patient_id;
            $transaction->amount = $request->amount;
            $transaction->customer_id = $customerProfileId;
            //$transaction->subscription_id = $subscription->id;
            $transaction->transaction_id = $response->getSubscriptionId();
            $transaction->patient_name = $request->patient_name;
            $transaction->email = $request->email;
            $transaction->subscription_durations = $request->subscription_name;
            $transaction->save();
            
            //////////Email//////
            $siteUrl =  url('/');
            $logo = url('public/quiz-assets/images/logo.svg');
            $customer_mail = $request->email;
            $admin_mail = $settings->email;
            $user_content = "Dear $request->patient_name <br><br>
            Your subscription has been created successfully and your customer id is $customerProfileId
            <br><br>
            For more details, access you dashboard $siteUrl/login using below credentilas:
            <br><br>
            <b>Email Id:</b> $request->email <br>
            <b>Password:</b> 12345
            <br><br>
            Kind Regards,<br>
            <a href='" . $siteUrl . "'><img src='" . $logo . "' alt='HEADS UP'></a>";
            
            $admin_content = "Hello Doctor/Admin,<br><br>New patient is waiting for your review.<br><br>
            <b>Name:</b> $request->patient_name <br>
            <b>Email Id:</b> $request->email <br>
            <b>Customer Id:</b> $customerProfileId
            <br><br>
            Kind Regards,<br>
            <a href='" . $siteUrl . "'><img src='" . $logo . "' alt='HEADS UP'></a>";
            
            // Send email to the customer
            Mail::send([], $transaction->toArray(), function ($message) use ($user_content, $customer_mail) {
                $message->to($customer_mail)
                        ->subject('Subscription Completed: HEADS UP')
                        ->setBody($user_content, 'text/html')
                        ->addPart('Hello, Welcome to HEADS UP', 'text/plain');
            });
            
            // Send email to the admin
            Mail::send([], $transaction->toArray(), function ($message) use ($admin_content, $admin_mail) {
                $message->to($admin_mail)
                        ->subject('New Subscription With HEADS UP')
                        ->setBody($admin_content, 'text/html');
            });
            
            
            if($request->globalPay=='payment'){
              $submissionId = Patient::where('patient_id', $request->patient_id)->first();
              return redirect()->route('patiantDetailsGlobal', encrypt($submissionId->id));
            }else{
              return redirect('/payment-thankyou')->with('success', 'Subscription successful!');
            }
        }
        else
        {
            echo "ERROR :  Invalid response\n";
            $errorMessages = $response->getMessages()->getMessage();
            echo "Response : " . $errorMessages[0]->getCode() . "  " .$errorMessages[0]->getText() . "\n";
            
            //return redirect()->back();
        }
    
        //return $response;
       
    }
    
    public function cancelSubscriptionAuthorised(Request $request, $encrypted_patient)
    {
        $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
        $merchantAuthentication->setName('3qnKW8Q8H');
        $merchantAuthentication->setTransactionKey('3st244m3N285CHtE');
        
        $subscriptionId = decrypt($encrypted_patient);
        $deletedAt = now();
        // Set the transaction's refId
        $refId = 'ref' . time();
    
        $request = new AnetAPI\ARBCancelSubscriptionRequest();
        $request->setMerchantAuthentication($merchantAuthentication);
        $request->setRefId($refId);
        $request->setSubscriptionId($subscriptionId);
    
        $controller = new AnetController\ARBCancelSubscriptionController($request);
    
        $response = $controller->executeWithApiResponse( \net\authorize\api\constants\ANetEnvironment::SANDBOX);
    
        if (($response != null) && ($response->getMessages()->getResultCode() == "Ok"))
        {
            
            Transaction::where('transaction_id', $subscriptionId)->update(['deleted_at' => $deletedAt, 'subscription_status' => 'cancelled']);
            
            return redirect('/admin/user-patients')->with('successCancel', 'Subscription canceled successfully!');
            //echo "SUCCESS : " . $successMessages[0]->getCode() . "  " .$successMessages[0]->getText() . "\n";
            
         }
        else
        {
            echo "ERROR :  Invalid response\n";
            $errorMessages = $response->getMessages()->getMessage();
            echo "Response : " . $errorMessages[0]->getCode() . "  " .$errorMessages[0]->getText() . "\n";
            
        }

        //return $response;
       
    }
    
    public function createCustomerProfile($request){
        
        $patient = Patient::where('patient_id',  $request->patient_id)->get();
      
        $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
        $merchantAuthentication->setName('3qnKW8Q8H');
        $merchantAuthentication->setTransactionKey('3st244m3N285CHtE');
        
        // Set the transaction's refId
        $refId = 'ref' . time();
    
        // Set credit card information for payment profile
        $creditCard = new AnetAPI\CreditCardType();
        $creditCard->setCardNumber($request->card_number);
        $creditCard->setExpirationDate($request->exp_year."-".$request->exp_month);
        $creditCard->setCardCode($request->cvc);
        $paymentCreditCard = new AnetAPI\PaymentType();
        $paymentCreditCard->setCreditCard($creditCard);
    
        // Create the Bill To info for new payment type
        $billTo = new AnetAPI\CustomerAddressType();
        $billTo->setFirstName($patient[0]->fname);
        $billTo->setLastName($patient[0]->lname);
        $billTo->setPhoneNumber($patient[0]->phone);
    
        // Create a customer shipping address
        $customerShippingAddress = new AnetAPI\CustomerAddressType();
        $customerShippingAddress->setFirstName($patient[0]->fname);
        $customerShippingAddress->setLastName($patient[0]->lname);
        $customerShippingAddress->setPhoneNumber($patient[0]->phone);
    
        // Create an array of any shipping addresses
        $shippingProfiles[] = $customerShippingAddress;
    
    
        // Create a new CustomerPaymentProfile object
        $paymentProfile = new AnetAPI\CustomerPaymentProfileType();
        $paymentProfile->setCustomerType('individual');
        $paymentProfile->setBillTo($billTo);
        $paymentProfile->setPayment($paymentCreditCard);
        $paymentProfiles[] = $paymentProfile;
    
    
        // Create a new CustomerProfileType and add the payment profile object
        $customerProfile = new AnetAPI\CustomerProfileType();
        $customerProfile->setDescription($patient[0]->fname);
        $customerProfile->setMerchantCustomerId("M_" . time());
        $customerProfile->setEmail($patient[0]->email);
        $customerProfile->setpaymentProfiles($paymentProfiles);
        $customerProfile->setShipToList($shippingProfiles);
    
    
        // Assemble the complete transaction request
        $apirequest = new AnetAPI\CreateCustomerProfileRequest();
        $apirequest->setMerchantAuthentication($merchantAuthentication);
        $apirequest->setRefId($refId);
        $apirequest->setProfile($customerProfile);
    
        // Create the controller and get the response
        $controller = new AnetController\CreateCustomerProfileController($apirequest);
        $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);
      
        $customer =array();
        if (($response != null) && ($response->getMessages()->getResultCode() == "Ok")) {
            //echo "Succesfully created customer profile : " . $response->getCustomerProfileId() . "\n";
            $paymentProfiles = $response->getCustomerPaymentProfileIdList();
            $customer['customer_id'] = $response->getCustomerProfileId();
            $customer['card_id'] = $paymentProfiles[0];
            $customer['message'] = 'success';
            
            $user = User::find($request->patient_id);
            $user->customer_id=$customer['customer_id'];
            $user->save();
            
            $CardDetails = new CardDetails;
            $CardDetails->patient_id = $patient[0]->patient_id;
            $CardDetails->card_id = $customer['card_id'];
            $CardDetails->card_number = $request->card_number;
            $CardDetails->customer_id = $customer['customer_id'];
            $CardDetails->save();
            
        } else {
            $errorMessages = $response->getMessages()->getMessage();
            $customer['message'] = $errorMessages[0]->getCode() . "  " .$errorMessages[0]->getText();
            
        }
        
        return $customer;
        
    }
    
    public function addCustomerCard($request){
        $patient = Patient::where('patient_id',  $request->patient_id)->get();
          
        $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
        $merchantAuthentication->setName('3qnKW8Q8H');
        $merchantAuthentication->setTransactionKey('3st244m3N285CHtE');
        
        // Set the transaction's refId
        $refId = 'ref' . time();
        
        $creditCard = new AnetAPI\CreditCardType();
        $creditCard->setCardNumber($request->card_number);
        $creditCard->setExpirationDate($request->exp_year."-".$request->exp_month);
        $creditCard->setCardCode($request->cvc);
        $paymentCreditCard = new AnetAPI\PaymentType();
        $paymentCreditCard->setCreditCard($creditCard);
    
        // Create the Bill To info for new payment type
        $billto = new AnetAPI\CustomerAddressType();
        $billto->setFirstName($patient[0]->fname.$patient[0]->phone);
        $billto->setLastName($patient[0]->lname);
        $billto->setCompany("HeadsUP");
        $billto->setAddress($request->address);
        $billto->setCity($request->city);
        $billto->setState($request->state);
        $billto->setZip($request->zip);
        $billto->setCountry($request->country);
        $billto->setPhoneNumber($patient[0]->phone);
        $billto->setfaxNumber("999-999-9999");
    
        // Create a new Customer Payment Profile object
        $paymentprofile = new AnetAPI\CustomerPaymentProfileType();
        $paymentprofile->setCustomerType('individual');
        $paymentprofile->setBillTo($billto);
        $paymentprofile->setPayment($paymentCreditCard);
        $paymentprofile->setDefaultPaymentProfile(true);
    
        $paymentprofiles[] = $paymentprofile;
    
        // Assemble the complete transaction request
        $paymentprofilerequest = new AnetAPI\CreateCustomerPaymentProfileRequest();
        $paymentprofilerequest->setMerchantAuthentication($merchantAuthentication);
    
    
        $user = User::where('id', $request->patient_id)->first();
        $user->customer_id;
        // Add an existing profile id to the request
        $paymentprofilerequest->setCustomerProfileId($user->customer_id);
        $paymentprofilerequest->setPaymentProfile($paymentprofile);
        $paymentprofilerequest->setValidationMode("liveMode");
    
        // Create the controller and get the response
        $controller = new AnetController\CreateCustomerPaymentProfileController($paymentprofilerequest);
        $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);
    
        $customer =array();
        if (($response != null) && ($response->getMessages()->getResultCode() == "Ok") ) {
                $customer['card_id'] = $response->getCustomerPaymentProfileId();
                $customer['message'] = 'success';
                
                $CardDetails = new CardDetails;
                $CardDetails->patient_id = $request->patient_id;
                $CardDetails->card_id = $customer['card_id'];
                $CardDetails->card_number = $request->card_number;
                $CardDetails->customer_id = $user->customer_id;
                $CardDetails->save();
        } else {
            $errorMessages = $response->getMessages()->getMessage();
            $customer['message'] = $errorMessages[0]->getCode() . "  " .$errorMessages[0]->getText();
    
        }
     
        return $customer;
        
    }

}

?>