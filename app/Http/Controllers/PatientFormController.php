<?php

namespace App\Http\Controllers;

use App\Patient;
use App\PatientShippingAddress;
use App\PrescriptionTemplate;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Service;
use App\Managesetting;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;
use Mail;
use PDF;
use App\RoleUser;
use App\User;
use App\Prescription;
use App\Transaction;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Support\Facades\File;

class PatientFormController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        

       // return view('admin.patients.index');
    }

    public function store(Request $request)
    {
   
    //dd($request);
    //Patient save in user and role table
    $userExist = User::where('email', $request->email)->first();
    $patient_id= '';
    if (!$userExist) {
        $user = new User;
        $user->name = $request->fname.' '.$request->lname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = 12345;
        $user->gender = $request->gender;
        $user->dob = $request->year.'-'.$request->month.'-'.$request->day;
        $user->role_id = 2;
        $user->save();
        
        $role = new RoleUser;
        $role->user_id = $user->id;
        $role->role_id = 2;
        $role->save();
        
        $patient_id = $user->id;
    }else{
        $patient_id = $userExist->id;
    }
        
        
    if($request->facePicture!=''){
    $facePicture = time() . '.' . $request->facePicture->extension();
    $request->facePicture->move(base_path('uploads/facePicture'), $facePicture);
    $facePicturePath = 'uploads/facePicture/' . $facePicture;
    }else{
        $facePicturePath = NULL;
    }
    
    if($request->uploadId!=''){
    $uploadId = time() . '.' . $request->uploadId->extension();
    $request->uploadId->move(base_path('uploads/uploadId'), $uploadId);
    $uploadIdPath = 'uploads/uploadId/' . $uploadId;
    }else{
        $uploadIdPath = NULL;
    }
      
    Session::put('pat_uni_id', $request->hidden_session_value);
    
    $patient = new Patient;
    $patient->patient_id = $patient_id;
    $patient->fname = $request->fname;
    $patient->lname = $request->lname;
    $patient->phone = $request->phone;
    $patient->email = $request->email;
    $patient->gender = $request->gender;
    $patient->month = $request->month;
    $patient->day = $request->day;
    $patient->year = $request->year;
    $patient->selector1 = $request->selector1;
    $patient->selector2 = $request->selector2;
    $patient->selector3 = $request->selector3;
    $patient->selector4 = json_encode($request->selector4);
    $patient->n_option4_textarea4 = $request->n_option4_textarea4;
    $patient->selector5 = $request->selector5;
    $patient->selector6 = $request->selector6;
    $patient->n_option6_textarea6 = $request->n_option6_textarea6;
    $patient->selector7 = $request->selector7;
    $patient->selector8 = $request->selector8;
    $patient->selector9 = $request->selector9;
    $patient->selector10 = json_encode($request->selector10);
    $patient->i_option10_textarea10 = $request->i_option10_textarea10;
    $patient->selector11 = $request->selector11;
    $patient->selector12 = $request->selector12;
    $patient->n_option12_textarea12 = $request->n_option12_textarea12;
    $patient->selector13 = $request->selector13;
    $patient->n_option13_textarea13 = $request->n_option13_textarea13;
    $patient->selector14 = json_encode($request->selector14);
    $patient->selector15 = $request->selector15;
    $patient->selector16 = $request->selector16;
    $patient->n_option16_textarea16 = $request->n_option16_textarea16;
    $patient->selector17 = json_encode($request->selector17);
    $patient->selector18 = $request->selector18;
    $patient->n_option18_textarea18 = $request->n_option18_textarea18;
    $patient->selector19 = $request->selector19;
    $patient->selector20 = $request->selector20;
    $patient->selector21 = $request->selector21;
    $patient->selector22 = $request->selector22;
    $patient->selector23 = $request->selector23;
    $patient->selector24 = json_encode($request->selector24);
    $patient->selector25 = $request->selector25;
    $patient->n_option25_textarea25 = $request->n_option25_textarea25;
    $patient->selector26 = $request->selector26;
    $patient->n_option26_textarea26 = $request->n_option26_textarea26;
    $patient->selector27 = $request->selector27;
    $patient->selector28 = json_encode($request->selector28);
    $patient->selector29 = $request->selector29;
    $patient->n_option29_textarea29 = $request->n_option29_textarea29;
    $patient->selector30 = $request->selector30;
    $patient->selector33 = $request->selector33;
    $patient->selector34 = $request->selector34;
    $patient->selector35 = $request->selector35;
    $patient->session_uni_id = $request->hidden_session_value;
    $patient->facePicture = $facePicturePath;
    $patient->uploadId = $uploadIdPath;
    $patient->save();
    
    
    
    //////////Email//////
    // $pid = $patient->id;
    // $admin_mail = 'vipinjoshi.joshi@gmail.com';
    // $form_link = "http://148.251.83.25/~leaveco1/$pid/patient-details";
    // $user_content = "Hello  admin <br><br>".$request->fname."
    //   submitted request for the periscription please <a href='" . $form_link . "'>clicking here</a> to more information.
    //   <br><br>
    //   Kind Regards, REXMD";
    //     Mail::send([], $patient->toArray(), function ($message) use ($user_content, $admin_mail) {
    //       $message
    //         ->to($admin_mail)
    //         ->subject('Periscription Form')
    //         ->setBody($user_content, 'text/html')
    //         ->addPart('Hello, welcome to REXMD', 'text/plain');
    //     });
    /////////Email End//
    
    return redirect('/medicine-supply-month');
        
    }
    
    public function details($id)
    {
    
    $patient = Patient::where('id',$id)->first();
    $prescription_detail = Prescription::where('patient_id',$id)->get();
    $PatientShippingAddress = PatientShippingAddress::where('patient_id', $id)->first();
    $PrescriptionTemplate = PrescriptionTemplate::where('status', '1')->get();
    //print_r($PatientShippingAddress);
    return view('patient-form.patient-details-form', compact('patient','prescription_detail','PrescriptionTemplate'));
    }
    
    public function getPrescriptionData(Request $request, $templateId)
    {
        
        $data = PrescriptionTemplate::where('id',$templateId)->first(); 
        $template = $data->temp_description;
        $patient = Patient::where('patient_id', $request->customerID)->first();
        $PatientShippingAddress = PatientShippingAddress::where('patient_id', $patient->id)->first();
        
        $name = "<b>".$patient->fname.' '.$patient->lname."</b>";
        $duration = "<b>".$patient->selector34.' for '.$patient->how_many_month_supply."</b>";
        $shipingaddress = "<b>".$patient->fname.' '.$patient->lname.'<br>'.$PatientShippingAddress->address_one.'<br>'.$PatientShippingAddress->city.','.$PatientShippingAddress->state.'<br>'.$PatientShippingAddress->country.','.$PatientShippingAddress->zip_code."</b>";
        //Replace #name# with the actual name
        $template = str_replace("#name#", $name, $template);
        $template = str_replace("#duration#", $duration, $template);
        $template = str_replace("#shipingaddress#", $shipingaddress, $template);

        return response()->json($template);
    }
    
    public function detailsGlobal($id)
    {
    $id = decrypt($id);
    $patient = Patient::where('id',$id)->first();
    $prescription_detail = Prescription::where('patient_id',$id)->get();
    
    return view('patient-form.patient-details-form-global', compact('patient','prescription_detail'));
    }
    
    public function prescription_update(Request $request, $id)
    {
        $siteUrl =  url('/');
        $settings = Managesetting::where('id', '1')->first();
        $prescription = new Prescription;
        $prescription->patient_id = $id;
        $prescription->prescription_detail =  $request->prescription_area;
        $prescription->save();
        
        $user = User::where('id', $request->patient_id)->first();
        $transactionCount = Transaction::where('patient_id', $request->patient_id)->where('subscription_status', 'active')->count();
        
        ///////PDF Generate///////////////
        $data = array('prescription'=>$request->prescription_area);
        $path = storage_path('prescriptions/');
        $fileName = time().$id.".pdf";
        $pdf = PDF::loadView('patient-form.prescriptionpdf', $data);
        $pdf->save($path.$fileName);
        
        $prescription->prescription_pdf =  $siteUrl.'/storage/prescriptions/'.$fileName;
        $prescription->save();
        //die();
        /////End PDF Generate////////////
        
        $logo = url('public/quiz-assets/images/logo.svg');
        $siteUrl =  url('/');
        if($transactionCount>0){
           //////////Email//////
            $fullname = $user->name;
            $pdfPath = storage_path('prescriptions/'.$fileName);
            $pid = $request->patient_id;
            $PharmacistEmail = $settings->pharmacy_email;
            $user_email = $user->email;
            $form_link = route('patiantDetailsGlobal', encrypt($id));
            $pharmacis_content = "Dear Pharmacist,<br><br>Please find the attached prescription of $fullname.
              <br><br>
              Kind Regards,<br>
              <a href='" . $siteUrl . "'><img src='" . $logo . "' alt='HEADS UP'></a>";
              
            $user_content = "Dear $fullname,<br><br>We have sent your prescription to the pharmacy, you will receive it at your shipping address soon.
              <br><br>
              Kind Regards,<br>
              <a href='" . $siteUrl . "'><img src='" . $logo . "' alt='HEADS UP'></a>";  
              
            Mail::send([], [], function ($message) use ($pharmacis_content, $PharmacistEmail, $fullname, $pdfPath) {
              $message
                ->to($PharmacistEmail)
                ->subject('Prescription Details of '.$fullname )
                ->setBody($pharmacis_content, 'text/html');
                // Attach the PDF file
                $message->attach($pdfPath, ['mime' => 'application/pdf']);
                $message->addPart('Prescription Details', 'text/plain');
            });
            /////User soft email/////
            Mail::send([], [], function ($message) use ($user_content, $user_email, $fullname, $pdfPath) {
              $message
                ->to($user_email)
                ->subject('Prescription Notification of '.$fullname.' from HEADS UP')
                ->setBody($user_content, 'text/html')
                ->addPart('Prescription Notification', 'text/plain');
            });
            /////////Email End//
        }else{
            echo "This customer has not made the payment";
        }
        
        return redirect('/admin/patients')->with('success', 'Prescription Has Been updated successfully');
    }
    
    public function update(Request $request, $id)
    {
        //dd($request);
        ///Face picture///
        $facePicturePath = "";
        if($request->hasFile('facePicture')){
            $facePicture = time() . '.' . $request->facePicture->extension();
            $request->facePicture->move(base_path('uploads/facePicture'), $facePicture);
            $facePicturePath = 'uploads/facePicture/' . $facePicture;
        }else{
            $patientFace = Patient::find($id);
            $facePicturePath = $patientFace->facePicture;   
        }
        
        ///Id picture///
        $uploadIdPath = "";
        if($request->hasFile('uploadId')){
            $uploadId = time() . '.' . $request->uploadId->extension();
            $request->uploadId->move(base_path('uploads/uploadId'), $uploadId);
            $uploadIdPath = 'uploads/uploadId/' . $uploadId;
        }else{
            $patientId = Patient::find($id);
            $uploadIdPath = $patientId->uploadId;
        }
        ///Update data///
        $patient = Patient::find($id);
        
        $patient->fname = $request->fname;
        $patient->lname = $request->lname;
        $patient->phone = $request->phone;
        $patient->email = $request->email;
        $patient->gender = $request->gender;
        $patient->month = $request->month;
        $patient->day = $request->day;
        $patient->year = $request->year;
        $patient->selector1 = $request->selector1;
        $patient->selector2 = $request->selector2;
        $patient->selector3 = $request->selector3;
        $patient->selector4 = json_encode($request->selector4);
        $patient->n_option4_textarea4 = $request->n_option4_textarea4;
        $patient->selector5 = $request->selector5;
        $patient->selector6 = $request->selector6;
        $patient->n_option6_textarea6 = $request->n_option6_textarea6;
        $patient->selector7 = $request->selector7;
        $patient->selector8 = $request->selector8;
        $patient->selector9 = $request->selector9;
        $patient->selector10 = json_encode($request->selector10);
        $patient->i_option10_textarea10 = $request->i_option10_textarea10;
        $patient->selector11 = $request->selector11;
        $patient->selector12 = $request->selector12;
        $patient->n_option12_textarea12 = $request->n_option12_textarea12;
        $patient->selector13 = $request->selector13;
        $patient->n_option13_textarea13 = $request->n_option13_textarea13;
        $patient->selector14 = json_encode($request->selector14);
        $patient->selector15 = $request->selector15;
        $patient->selector16 = $request->selector16;
        $patient->n_option16_textarea16 = $request->n_option16_textarea16;
        $patient->selector17 = json_encode($request->selector17);
        $patient->selector18 = $request->selector18;
        $patient->n_option18_textarea18 = $request->n_option18_textarea18;
        $patient->selector19 = $request->selector19;
        $patient->selector20 = $request->selector20;
        $patient->selector21 = $request->selector21;
        $patient->selector22 = $request->selector22;
        $patient->selector23 = $request->selector23;
        $patient->selector24 = json_encode($request->selector24);
        $patient->selector25 = $request->selector25;
        $patient->n_option25_textarea25 = $request->n_option25_textarea25;
        $patient->selector26 = $request->selector26;
        $patient->n_option26_textarea26 = $request->n_option26_textarea26;
        $patient->selector27 = $request->selector27;
        $patient->selector28 = json_encode($request->selector28);
        $patient->selector29 = $request->selector29;
        $patient->n_option29_textarea29 = $request->n_option29_textarea29;
        $patient->selector30 = $request->selector30;
        $patient->facePicture = $facePicturePath;
        $patient->uploadId = $uploadIdPath;
        $patient->save();
        //return redirect()->route('admin/patients')->with('success', 'User Has Been updated successfully');
        return redirect('/admin/patients')->with('success', 'Patient Has Been updated successfully');
    }
  
    
    
    // 
    public function orderSummary(Request $request)
    {
        //dd($request);
        $form_session_id=Session::get('pat_uni_id');
        
        $patient = Patient::where('session_uni_id', $form_session_id)->first();
        $patient->how_many_month_supply = $request->how_many_month_supply;
        $patient->save();
        
        
        return redirect()->route('orderSummaryDetail');
    }
    
    public function orderSummaryDetail(Request $request)
    {
        //dd($request);
        $form_session_id=Session::get('pat_uni_id');
        $patient_form_data = Patient::where('session_uni_id', $form_session_id)->first();
        if($patient_form_data->how_many_month_supply == "1 Month"){
        $supply_price = '3.00';
        }elseif($patient_form_data->how_many_month_supply == "3 Month"){
        $supply_price = '2.91';
        }elseif($patient_form_data->how_many_month_supply == "6 Month"){
        $supply_price = '2.60';
        }elseif($patient_form_data->how_many_month_supply == "12 Month"){
        $supply_price = '2.40';
        }
        
        return view('patient-form.order-summary',compact('patient_form_data', 'supply_price'));
    }
    
    public function patientShippingInformation(Request $request)
    {
        //dd($request);
        $form_session_id=Session::get('pat_uni_id');
        
        $patient = Patient::where('session_uni_id', $form_session_id)->first();
        $patient->medician_image = $request->medician_image;
        $patient->total_amount = $request->total_amount;
        $patient->total_discount = $request->total_discount;
        $patient->save();
        
        
        return redirect()->route('patientShippingDetails');
    }
    
    public function patientShippingDetails(Request $request)
    {
        //dd($request);
        $form_session_id=Session::get('pat_uni_id');
        $patient_form_data = Patient::where('session_uni_id', $form_session_id)->first();
        $PatientShippingAddress = PatientShippingAddress::where('patient_id', $patient_form_data->id)->first();
        
        
        return view('patient-form.patient-shipping-information',compact('patient_form_data', 'PatientShippingAddress'));
    }
    
    public function patientShippingDetailsStore(Request $request)
    {
        //dd($request);
        $form_session_id = Session::get('pat_uni_id');
        
        $patientShippingAddressData = [
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'address_one' => $request->address_one,
        'address_two' => $request->address_two,
        'country' => $request->country,
        'city' => $request->city,
        'state' => $request->state,
        'zip_code' => $request->zip_code,
       ];
    
       // Find the record with the given patient_id or create a new one
        PatientShippingAddress::updateOrCreate(
            ['patient_id' => $request->patient_id],
            $patientShippingAddressData
        );
        
        
        return redirect()->route('patientPaymentView');
    }
    
    public function patientPaymentView(Request $request)
    {
        $form_session_id = Session::get('pat_uni_id');
       
        $patient_form_data = Patient::where('session_uni_id', $form_session_id)->first();
        //dd($patient_form_data);
        $PatientShippingAddress = PatientShippingAddress::where('patient_id', $patient_form_data->id)->first();
        
        
        return view('patient-form.patient-payment',compact('patient_form_data', 'PatientShippingAddress'));
    }
}
