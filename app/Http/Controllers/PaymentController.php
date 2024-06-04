<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\CardDetails;
use App\Patient;
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


class PaymentController extends Controller
{
    public function showPaymentForm($encrypted_patient)
    {
        $patient_details = User::where('id', decrypt($encrypted_patient))->first();
        return view('payment', compact('patient_details'));
    }
    
    public function processPayment(Request $request)
    {
        $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
        $merchantAuthentication->setName('3GX3ke2g');
        $merchantAuthentication->setTransactionKey('6Z72FBG8q5V62xty');
        
        // Set the transaction's refId
        $refId = 'ref' . time();
       
    
        // Create the payment data for a credit card
        $creditCard = new AnetAPI\CreditCardType();
        $creditCard->setCardNumber($request->card_number);
        $creditCard->setExpirationDate($request->exp_year .'-'. $request->exp_month);
        $creditCard->setCardCode($request->cvc);
    
        // Add the payment data to a paymentType object
        $paymentOne = new AnetAPI\PaymentType();
        $paymentOne->setCreditCard($creditCard);
        
        $transactionRequestType = new AnetAPI\TransactionRequestType();
        $transactionRequestType->setTransactionType("authCaptureTransaction");
        $transactionRequestType->setAmount($request->amount);
        $transactionRequestType->setPayment($paymentOne);
        
        $request = new AnetAPI\CreateTransactionRequest();
        $request->setMerchantAuthentication($merchantAuthentication);
        $request->setRefId($refId);
        $request->setTransactionRequest($transactionRequestType);
    
        // Create the controller and get the response
        $controller = new AnetController\CreateTransactionController($request);
        $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);
        
        // dd($response);
    
        if ($response != null) {
            // Check to see if the API request was successfully received and acted upon
            if ($response->getMessages()->getResultCode() == "Ok") {
                // Since the API request was successful, look for a transaction response
                // and parse it to display the results of authorizing the card
                $tresponse = $response->getTransactionResponse();
            
                if ($tresponse != null && $tresponse->getMessages() != null) {
                    echo " Successfully created transaction with Transaction ID: " . $tresponse->getTransId() . "\n";
                    echo " Transaction Response Code: " . $tresponse->getResponseCode() . "\n";
                    echo " Message Code: " . $tresponse->getMessages()[0]->getCode() . "\n";
                    echo " Auth Code: " . $tresponse->getAuthCode() . "\n";
                    echo " Description: " . $tresponse->getMessages()[0]->getDescription() . "\n";
    
                        $msg_type = 'success_msg';
                        $message_text = $tresponse->getMessages()[0]->getDescription().' Transaction ID:'.$tresponse->getTransId();
    
                        // PaymentLog::create([
                        //     'amount' => $request->amount,
                        //     'response_code' =>  $tresponse->getResponseCode(),
                        //     'transaction_id' =>  $tresponse->getTransId(),
                        //     'auth_id' =>  $tresponse->getAuthCode(),
                        //     'message_code' =>  $tresponse->getMessages()[0]->getCode(),
                        //     'name_of_card' =>  $request->email,
                        //     'qty' =>  1,
                        // ]);
    
                } else {
                    echo "Transaction Failed \n";
                    if ($tresponse->getErrors() != null) {
                        echo " Error Code  : " . $tresponse->getErrors()[0]->getErrorCode() . "\n";
                        echo " Error Message : " . $tresponse->getErrors()[0]->getErrorText() . "\n";
    
                        $msg_type = 'error_msg';
                        $message_text = $tresponse->getErrors()[0]->getErrorText();
                    }
                }
                // Or, print errors if the API request wasn't successful
            } else {
    
                  $msg_type = 'error_msg';
                    $message_text = 'Transaction Failed ';
    
                // echo "\n";
                $tresponse = $response->getTransactionResponse();
            
                if ($tresponse != null && $tresponse->getErrors() != null) {
                    echo " Error Code  : " . $tresponse->getErrors()[0]->getErrorCode() . "\n";
                    echo " Error Message : " . $tresponse->getErrors()[0]->getErrorText() . "\n";
    
                    $msg_type = 'error_msg';
                    $message_text = $tresponse->getErrors()[0]->getErrorText();
                } else {
                    echo " Error Code  : " . $response->getMessages()->getMessage()[0]->getCode() . "\n";
                    echo " Error Message : " . $response->getMessages()->getMessage()[0]->getText() . "\n";
    
                    $msg_type = 'error_msg';
                    $message_text = $response->getMessages()->getMessage()[0]->getText();
                }
            }
        } else {
            $msg_type = 'error_msg';
            $message_text = 'No reponse returned';
        }

    //return back()->with($msg_type,$message_text);
    
        // Create a customer in Stripe
        
        
        // $transaction = new Transaction;
        // $transaction->patient_id = $request->patient_id;
        // $transaction->amount = $request->amount;
        // $transaction->customer_id = $customer->id;
        // $transaction->subscription_id = $subscription->id;
        // $transaction->patient_name = $request->patient_name;
        // $transaction->email = $request->email;
        // $transaction->save();
       
    }
    
    public function processSubscriptionAuthorised(Request $request)
    {
        $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
        $merchantAuthentication->setName('3GX3ke2g');
        $merchantAuthentication->setTransactionKey('86h8mvcG2567kGQW');
        
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
        $paymentSchedule->setTrialOccurrences("1");
    
        $subscription->setPaymentSchedule($paymentSchedule);
        $subscription->setAmount($request->amount/12.0*12);
        $subscription->setTrialAmount("0.00");
        
        $creditCard = new AnetAPI\CreditCardType();
        $creditCard->setCardNumber($request->card_number);
        $creditCard->setExpirationDate($request->exp_year."-".$request->exp_month);
    
        $payment = new AnetAPI\PaymentType();
        $payment->setCreditCard($creditCard);
        $subscription->setPayment($payment);
    
        $order = new AnetAPI\OrderType();
        $order->setInvoiceNumber("2");        
        $order->setDescription("Description of the subscription"); 
        $subscription->setOrder($order); 
        
        $billTo = new AnetAPI\NameAndAddressType();
        $billTo->setFirstName($request->patient_name);
        $billTo->setLastName($request->patient_name);
    
        $subscription->setBillTo($billTo);
    
        $apirequest = new AnetAPI\ARBCreateSubscriptionRequest();
        $apirequest->setmerchantAuthentication($merchantAuthentication);
        $apirequest->setRefId($refId);
        $apirequest->setSubscription($subscription);
        $controller = new AnetController\ARBCreateSubscriptionController($apirequest);
    
        $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);
        
        if (($response != null) && ($response->getMessages()->getResultCode() == "Ok") )
        {
            // print_r($response);
            // exit;
            echo "SUCCESS: Subscription ID : " . $response->getSubscriptionId() . "\n";
            
            $transaction = new Transaction();
            $transaction->patient_id = $request->patient_id;
            $transaction->amount = $request->amount;
            //$transaction->customer_id = $customer->id;
            //$transaction->subscription_id = $subscription->id;
            $transaction->transaction_id = $response->getSubscriptionId();
            $transaction->patient_name = $request->patient_name;
            $transaction->email = $request->email;
            $transaction->save();
            
            return redirect('/payment-thankyou')->with('success', 'Subscription successful!');
        }
        else
        {
            echo "ERROR :  Invalid response\n";
            $errorMessages = $response->getMessages()->getMessage();
            echo "Response : " . $errorMessages[0]->getCode() . "  " .$errorMessages[0]->getText() . "\n";
            
            return redirect()->back();
        }
    
        //return $response;
       
    }
    
    public function cancelSubscriptionAuthorised(Request $request, $encrypted_patient)
    {
        $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
        $merchantAuthentication->setName('3GX3ke2g');
        $merchantAuthentication->setTransactionKey('86h8mvcG2567kGQW');
        
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
    
    public function processSubscription(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));
        
        // Create a customer in Stripe
        $amount = $request->input('amount') * 100;
        $email = $request->input('email');
        $customer = Customer::create([
        'email' => $email,
        'payment_method' => $request->input('stripeToken'),
        ]);
        
        // Create a subscription
        $subscription = Subscription::create([
        'customer' => $customer->id,
        'default_payment_method' => $request->input('stripeToken'),
        'items' => [
        [
        'price' => 'price_1O2qx4Gg2FEMhsYQALseHDYH', // Replace with your actual price ID
        ],
        ],
        ]);
        $subscription->id;
        // Store subscription ID in your database for user
        
        $transaction = new Transaction;
        $transaction->patient_id = $request->patient_id;
        $transaction->amount = $request->amount;
        $transaction->customer_id = $customer->id;
        $transaction->subscription_id = $subscription->id;
        $transaction->patient_name = $request->patient_name;
        $transaction->email = $request->email;
        $transaction->save();
        
        $subscriptionId = $subscription->id;
        if (!$subscriptionId) {
            // Handle the case where subscription creation fails
        }
        
        // Retrieve the subscription from Stripe with payment method details
        try {
            // Retrieve the subscription
            $subscription = Subscription::retrieve($subscriptionId);
        
            // Retrieve the PaymentMethod associated with the subscription
            $paymentMethodId = $subscription->default_payment_method;
            $paymentMethod = PaymentMethod::retrieve($paymentMethodId);
        
            // Access card details
            $card = $paymentMethod->card;
            
            $CardDetails = new CardDetails;
            $CardDetails->patient_id = $request->patient_id;
            $CardDetails->card_brand = $card->brand;
            $CardDetails->card_number = $card->last4;
            $CardDetails->customer_id = $customer->id;
            $CardDetails->save();
        
            } catch (Exception $e) {
                // Handle any exceptions
                echo 'Exception: ' . $e->getMessage();
            }

        
        return redirect('/payment-thankyou')->with('success', 'Subscription successful!');
    }

    public function addPaymentMethod(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));
        
        // Create a PaymentMethod
        $paymentMethod = PaymentMethod::create([
        'type' => 'card',
        'card' => [
        'number' => '4000056655665556',
        'exp_month' => '11',
        'exp_year' => '2027',
        'cvc' => '143',
        ],
        ]);
        
        // Attach the PaymentMethod to the customer using a Setup Intent
        $customer = Customer::retrieve('cus_OqswasGrVboG1e');
        $setupIntent = SetupIntent::create([
        'customer' => $customer->id,
        'payment_method' => $paymentMethod->id,
        'confirm' => true,
        'return_url' => 'https://148.251.83.25/~leaveco1/add-card',
        ]);
        
        echo $setupIntent->id;
        echo $paymentMethod->id;

    }
    
    public function setDefaultPaymentMethod(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));
        
        // Update the customer's default payment method
        $customer = Customer::update('cus_OqswasGrVboG1e', [
        'invoice_settings' => [
        'default_payment_method' => 'pm_1O3BwlGg2FEMhsYQcueSELtZ'
        ]
        ]);
        
        dd($customer);
    }
    
    public function subscriptionCancel(Request $request, $encrypted_patient){
        $id = decrypt($encrypted_patient);
        $deletedAt = now();
        Stripe::setApiKey(config('services.stripe.secret'));
        $suscription_id = Transaction::where('patient_id', $id)->first();
        //dd($suscription_id->subscription_id);
        $subscriptionId = $suscription_id->subscription_id;
        
        try {
            // Cancel the subscription
            $subscription = Subscription::retrieve($subscriptionId);
            $canceledSubscription = $subscription->cancel();
             //echo "<pre>";
             //print_r($canceledSubscription);
             //echo "</pre>";
             //echo $canceledSubscription->status;
             Transaction::where('customer_id', $suscription_id->customer_id)->update(['deleted_at' => $deletedAt, 'subscription_status' => $canceledSubscription->status]);
             CardDetails::where('customer_id', $suscription_id->customer_id)->update(['deleted_at' => $deletedAt]);
            // Handle success, e.g., update your database to reflect the cancellation
            // You can access information about the canceled subscription using $canceledSubscription
            echo 'Subscription canceled successfully.';
            return redirect('/admin/user-patients')->with('successCancel', 'Subscription canceled successfully!');
            } catch (\Stripe\Exception\CardException $e) {
                // Handle any Stripe-specific errors related to card issues
                echo 'Stripe Card Exception: ' . $e->getMessage();
            } catch (\Stripe\Exception\InvalidRequestException $e) {
                // Handle other Stripe-specific errors
                echo 'Stripe Invalid Request Exception: ' . $e->getMessage();
            } catch (Exception $e) {
                // Handle general exceptions
                echo 'Exception: ' . $e->getMessage();
            }
    }
    
    public function reActivateSubscription(Request $request, $encrypted_patient){
        Stripe::setApiKey(config('services.stripe.secret'));
        $id = decrypt($encrypted_patient);
        $customer_id = Transaction::where('patient_id', $id)->first();
        
        //dd($customer_id->customer_id);
        
        try {
            $customer = Customer::retrieve($customer_id->customer_id);
            //dd($customer);
            $subscription = $customer->subscriptions->create([
                'items' => [
                    [
                        'price' => 'price_1O2qx4Gg2FEMhsYQALseHDYH',
                    ],
                ],
            ]);
           // Optionally update billing cycle settings if needed
                $subscription->items->data[0]->billing_cycle_anchor = 'now';
                $subscription->items->data[0]->proration_behavior = 'always_invoice';
                $subscription->save();
            
                echo 'Subscription renewed successfully.';
            } catch (\Stripe\Exception\CardException $e) {
                // Handle card exception
                echo $e->getMessage();
            } catch (\Stripe\Exception\StripeException $e) {
                // Handle other Stripe exceptions
                echo $e->getMessage();
            }

    }
    
    
    
    /////////////////Old Code Start/////////////////////////////////////////////////
    // public function processPayment(Request $request)
    // {
       
    //     //dd($request->input('email'));
    //         try {
    //             Stripe::setApiKey(config('services.stripe.secret'));
    //             $amount = $request->input('amount') * 100;
            
    //             $token = Token::create([
    //                 'card' => [
    //                     'number' => $request->input('card_number'),
    //                     'exp_month' => $request->input('exp_month'),
    //                     'exp_year' => $request->input('exp_year'),
    //                     'cvc' => $request->input('cvc'),
    //                 ],
    //             ]);
            
    //             $amount = $request->input('amount') * 100;
    //             $email = $request->input('email');
            
    //             $charge = Charge::create([
    //                 'amount' => $amount, // Amount in cents
    //                 'currency' => 'usd',
    //                 'source' => $token,
    //                 'description' => 'Prescription charges: ' . $email,
    //                 'receipt_email' => $email,
    //             ]);
            
    //             $chargeId = $charge->id;
                
    //             $transaction = new Transaction;
    //             $transaction->patient_id = $request->patient_id;
    //             $transaction->amount = $request->amount;
    //             $transaction->charge_id = $chargeId;
    //             $transaction->patient_name = $request->patient_name;
    //             $transaction->email = $request->email;
    //             $transaction->save();
                
    //             //////////Email//////
    //             $pid = $request->patient_id;
    //             $admin_mail = 'leavecode0@gmail.com';
    //             $form_link = "http://148.251.83.25/~leaveco1/$pid/patient-details";
    //             $user_content = "Hello  admin <br><br>".$request->fname."
    //               submitted request for the periscription please <a href='" . $form_link . "'>clicking here</a> to more information.
    //               <br><br>
    //               Kind Regards, REXMD";
    //                 Mail::send([], $transaction->toArray(), function ($message) use ($user_content, $admin_mail) {
    //                   $message
    //                     ->to($admin_mail)
    //                     ->subject('Periscription Form')
    //                     ->setBody($user_content, 'text/html')
    //                     ->addPart('Hello, welcome to REXMD', 'text/plain');
    //              });
    //             /////////Email End//
            
    //             return "Payment successful! Transaction ID: $chargeId";
                
    //             } catch (\Stripe\Exception\CardException $e) {
    //                 // Handle card-related exceptions, e.g., card declined.
    //                 return "Card declined: " . $e->getMessage();
    //             } catch (\Stripe\Exception\InvalidRequestException $e) {
    //                 // Handle other Stripe-specific exceptions.
    //                 return "Stripe Error: " . $e->getMessage();
    //             } catch (Exception $e) {
    //                 // Handle any other general exceptions.
    //                 return "An error occurred: " . $e->getMessage();
    //             }

    // }
    /////////////////Old Code End/////////////////////////////////////////////////

}

?>