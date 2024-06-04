<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\SupplierNoticeBoard;
use App\Models\TodoTaskList;
use App\Models\EmployeeAlert;
use App\Models\ForumModule;
use App\Models\ActivityLog;
use App\Models\EmployeecontactEmergency;
use App\Models\Contract;
use App\Models\CertificateUploadRequest;
use App\Models\EmployeeCertificates;
use App\Models\AddContractProject;
use App\Models\ContractProjects;
use Mail;
use App\Models\AssignSpecialQualification;
use Illuminate\Support\Facades\Cookie;

class VerifierController extends Controller
{

    public function home()
    {
        if (@$_GET['switch'] != '') {
            Cookie::queue(Cookie::make('switch_id', base64_decode($_GET['switch']), 30));
            $value = Cookie::get('switch_id');
        }

        $supplierNoticeBoard = SupplierNoticeBoard::where('status', '<>', 0)
            ->latest('created_at')
            ->limit(3)
            ->get();
        $forums = ForumModule::where('status', '<>', 0)
            ->latest('created_at')
            ->limit(3)
            ->get();
        $todoListTask = TodoTaskList::latest('created_at')
            ->limit(3)
            ->get();
        $allUsers = User::get();
        $sidebar = "0";
        return view('verifier.main', compact('todoListTask', 'allUsers', 'supplierNoticeBoard', 'forums', 'sidebar'));
    }

    public function index(Request $request)
    {

        $userList = DB::table('cvb_employee_verification_request')->orderByDesc('id')->whereNotNull('employee')->get();


        if (Auth()->user()->role_id != 1 && Auth()->user()->role_id != '15' && Auth()->user()->role_id != '224') {
            $user = DB::table('cvb_employee_verification_request')->whereNotNull('employee_id')
                ->orWhere('client_company_technical_verifier', Auth()->user()->name)
                ->orderByDesc('id')
                ->orWhere('client_company_hsse__verifier__', Auth()->user()->name)
                ->orWhere('client_company_medical_verifier', Auth()->user()->name)->whereNotNull('employee')
                ->orderByDesc('id')->get();
        } else if (Auth()->user()->role_id == '15') {



            $locations = DB::table('cvb_location')
                ->where('client_company', Auth()->user()->company_id)
                ->orderByDesc('id')
                ->pluck('id');

            $user = collect();

            foreach ($locations as $value) {
                $locationUsers = DB::table('cvb_employee_verification_request')
                    ->whereRaw("FIND_IN_SET($value, site_location_id)")
                    ->get();

                $user = $user->merge($locationUsers)->unique('id');
            }

            $employee_ids = $user->pluck('employee_id')->toArray();

            $not_approved = [];
            foreach ($employee_ids as $value) {
                $allCertificateCount = DB::table('cvb_certificate_upload_request')
                    ->where('employee', $value)
                    ->where('archived', 0)
                    ->count();
                $allCertificateApproved = DB::table('cvb_certificate_upload_request')
                    ->where('employee', $value)
                    ->where('archived', 0)
                    ->where('status', 'Approved')
                    ->count();

                if ($allCertificateApproved == $allCertificateCount) {
                    $not_approved[] = $value;
                }
            }


            $endlast = $user->filter(function ($item) use ($not_approved) {
                return in_array($item->employee_id, $not_approved);
            })->pluck('id')->toArray();

            $user = DB::table('cvb_employee_verification_request')
                ->where('client_company', Auth()->user()->company_id)
                ->orderByDesc('id')
                ->get();
        } else if (Auth()->user()->role_id == '224') {

            $user = DB::table('cvb_employee_verification_request')->where('contract_holder', Auth()->user()->id)->orderByDesc('id')->get();
        } else {

            $user = DB::table('cvb_employee_verification_request')->whereNotNull('employee_id')->whereNotNull('employee')->orderByDesc('id')->get();
        }


        $groupList = DB::table('cvb_employee_verification_request')->whereNotNull('employee')->get();
        $Role = DB::table('cvb_sub_role')->get();
        $ContractDetails = ContractProjects::get();
        $certificateUpload = DB::table('cvb_certificate_upload_request')->where('archived', 0)->where('certificate_upload_check', 'Assigned')->get();
        $userName = "";
        $StaffRequisition  =  DB::table('cvb_staff_requisition')->get();
        $enagagement =  DB::table('cvb_engagements')->get();
        $projectName =  DB::table('cvb_contract_projects')->get();


        return view('verifier.verifier-listing', compact('StaffRequisition', 'enagagement', 'projectName', 'user', 'groupList', 'userList', 'userName', 'Role', 'ContractDetails', 'certificateUpload'));
    }



    public function filterByName(Request $request)
    {

        $employee_id = Auth::user()->id;
        $userName = $request->search;
        $userList = DB::table('cvb_employee_verification_request')->whereNotNull('employee')->get();
        $groupList = DB::table('cvb_employee_verification_request')->where('employee', $request->group_name)->whereNotNull('employee')->get();
        $user = DB::table('cvb_employee_verification_request')->where('employee', 'LIKE', "%" . $request->group_name . "%")->get();
        $Role = DB::table('cvb_sub_role')->get();
        $ContractDetails = ContractProjects::get();
        $certificateUpload = DB::table('cvb_certificate_upload_request')->where('certificate_upload_check', 'Assigned')->get();
        $StaffRequisition  =  DB::table('cvb_staff_requisition')->get();
        $enagagement =  DB::table('cvb_engagements')->get();
        $projectName =  DB::table('cvb_contract_projects')->get();
        return view('verifier.verifier-listing', compact('projectName', 'enagagement', 'StaffRequisition', 'user', 'userList', 'groupList', 'userName', 'Role', 'ContractDetails', 'certificateUpload'));
    }


    public function filterByEmployee(Request $request)
    {

        $employee_id = Auth::user()->id;
        $userName = $request->search;
        $userList = DB::table('cvb_employee_verification_request')->whereNotNull('employee')->get();
        $groupList = DB::table('cvb_employee_verification_request')->where('employee', $request->employee_id)->whereNotNull('employee')->get();
        $user = DB::table('cvb_employee_verification_request')->where('employee', 'LIKE', "%" . $request->employee_id . "%")->get();
        $Role = DB::table('cvb_sub_role')->get();
        $ContractDetails = ContractProjects::get();
        $certificateUpload = DB::table('cvb_certificate_upload_request')->where('archived', 0)->where('certificate_upload_check', 'Assigned')->get();
        $StaffRequisition  =  DB::table('cvb_staff_requisition')->get();
        $enagagement =  DB::table('cvb_engagements')->get();
        $projectName =  DB::table('cvb_contract_projects')->get();
        return view('verifier.verifier-listing', compact('StaffRequisition', 'enagagement', 'projectName', 'user', 'groupList', 'userList', 'userName', 'Role', 'ContractDetails', 'certificateUpload'));
    }

    public function verifierProfile($id)
    {


        $StaffRequisition =  "";
        $enagagement = "";
        $projectName = "";
        $userList = DB::table('users')->where('id', $id)->first();
        $evrDetials = DB::table('cvb_employee_verification_request')->where('employee_id', $id)->first();


        if ($evrDetials->staff_requisition != '') {
            $StaffRequisition =  DB::table('cvb_staff_requisition')->where('id', $evrDetials->staff_requisition)->first();
            $enagagement =  DB::table('cvb_engagements')->where('id', $StaffRequisition->engagement_title)->first();
            $projectName =  DB::table('cvb_contract_projects')->where('enagement_id', $enagagement->id)->first();
            $purchaseOrder =  DB::table('cvb_purchase_order')->where('contract_id', $enagagement->id)->first();
        }



        $userContactDetails = DB::table('cvb_employee_contacts')->where('employee_id', $id)->first();
        $alllocations = DB::table('cvb_location')->get();
        $locations = DB::table('site_access_user_locations')->where('employee_name', $evrDetials->employee_id)->get();
        $ContractData = DB::table('cvb_projects')->where('id', $userList->supplier_id)->first();
        $ContractorData = DB::table('cvb_contractor_company')->where('id', $userList->supplier_id)->first();
        $certificate = DB::table('cvb_certificate_type')->get();
        $certificateUpload = DB::table('cvb_certificate_upload_request')->where('employee', $id)->where('certificate_upload_check', 'Assigned')->where('archived', '0')->get();
        $groupList = DB::table('cvb_employee_verification_request')->whereNotNull('employee')->get();
        $risks = AssignSpecialQualification::where('employee_id', $id)->value('high_risk_activities_name');
        $forAllApproveCheck = DB::table('site_access_user_locations')->where('employee_name', $evrDetials->employee_id)->where('location_approved_status', '1')->count();
        $stdenddate = DB::table('site_access_user_locations')->where('employee_name', $evrDetials->employee_id)->first();

        $cvb_employee_address = DB::table('cvb_employee_address')->where('employee_id', $evrDetials->employee_id)->first();
        $cvb_employee_experience = DB::table('cvb_employee_experience')->where('employee_id', $evrDetials->employee_id)->get();
        $cvb_employee_skills = DB::table('cvb_employee_skills')->where('employee_id', $evrDetials->employee_id)->get();
        $ContractorCompany = DB::table('cvb_contractor_company')->get();

        return view('verifier.verifiers-profile', compact('cvb_employee_experience', 'cvb_employee_address', 'cvb_employee_skills', 'ContractorCompany', 'projectName', 'enagagement', 'StaffRequisition', 'forAllApproveCheck', 'stdenddate', 'risks', 'userList', 'alllocations', 'locations', 'userContactDetails', 'certificate', 'certificateUpload', 'ContractData', 'ContractorData',  'evrDetials'));
    }

    function filter(Request $request)
    {
        // dd($request->all());
        $groupList = DB::table('cvb_employee_verification_request')->whereNotNull('employee')->get();
        $employee_id = Auth::user()->id;
        $userName = $request->search;
        $userList = DB::table('cvb_employee_verification_request')->get();




        $StaffRequisition  =  DB::table('cvb_staff_requisition')->get();
        $enagagement =  DB::table('cvb_engagements')->get();
        $projectName =  DB::table('cvb_contract_projects')->get();


        // $user = DB::table('cvb_employee_verification_request')->where('employee', 'LIKE', "%" . $request->name . "%")->orWhere('country_code',$request->address)->get();

        $query = DB::table('users');

        // Retrieve filter criteria from the request
        $name = $request->input('name');
        $job = $request->input('job');
        $address = $request->input('address');
        $available = $request->input('available');
        $certificateValidity = $request->input('certificate_validity');

        // Apply filters based on the provided query parameters
        if ($name) {
            $query->where('name', 'LIKE', '%' . $name . '%');
        }

        if ($job) {
            $query->where('job_title', 'LIKE', '%' . $job . '%');
        }
        if ($address) {
            $query->where('country_code', 'LIKE', '%' . $address . '%');
        }

        if ($available === 'on') {
            $query->where('employee_avalabilty', 1);
        }
        if (!empty($request->end) && !empty($request->start)) {
            $startDate = $request->start;
            $endDate = $request->end;
            $project = DB::table('cvb_contract_jobs')
                ->whereBetween('start_date', [$startDate, $endDate])
                ->first();

            if ($project) {
                $requiredEmployee = $project->required_employee;
                echo $project->required_employee;
                $skills = DB::table('cvb_employee_skills')
                    ->where('skills', 'like', '%' . $requiredEmployee . '%')
                    ->pluck('employee_id')
                    ->toArray();
                $query->whereIn('id', $skills);
            }
        }



        // // Retrieve filtered data
        $data = $query->pluck('id');
        //  dd($data,$name);
        $user = DB::table('cvb_employee_verification_request')->whereIn('employee_id', explode(",", $data))->get();



        $Role = DB::table('cvb_sub_role')->get();
        $ContractDetails = ContractProjects::get();
        $certificateUpload = DB::table('cvb_certificate_upload_request')->where('certificate_upload_check', 'Assigned')->get();
        return view('verifier.verifier-listing', compact('projectName', 'enagagement', 'StaffRequisition', 'user', 'groupList', 'userList', 'userName', 'Role', 'ContractDetails', 'certificateUpload'));
    }

    function updateImage(Request $request)
    {


        $FileName = time() . '.' . $request->file->extension();
        $request->file->move('uploads/ProfilePics/', $FileName);

        $user = User::find($request->id);
        $user->profile_pic = $FileName;
        $user->update();
        return back();
    }

    function certificateInformationAjax(Request $request)
    {



        $request->certificateId;
        $request->certificateUploadId;
        $request->status;
        $request->expirydate;
        $request->verifier_notes;
        $request->verifier_notes_visible;

        $CertificateUploadRequest = CertificateUploadRequest::find($request->certificateUploadId);

        $CertificateUploadRequest->expiry_date = $request->expirydate;
        $CertificateUploadRequest->note_for_recruiter = $request->verifier_notes;
        $CertificateUploadRequest->status =  $request->status;
        $CertificateUploadRequest->approved_by =  auth()->user()->name;
        print_r($CertificateUploadRequest);
        // $CertificateUploadRequest->save();
        $CertificateUploadRequest->save();
        //activity log id:

        $aid = $CertificateUploadRequest->id;

        $activity = new ActivityLog();
        $activity->uid = auth()->user()->id;
        $activity->aid = $aid;
        $activity->activity_name = $request->status;
        $activity->save();
        if ($request->status == "Approved") {
            User::where('id', $CertificateUploadRequest->employee)->update(['evr_status' => 'approved']);
            $employee_id = $CertificateUploadRequest->employee;
            $certificateRequestsCount = CertificateUploadRequest::where('employee', $employee_id)
                ->where('archived', 0)
                ->count();
            $certificateRequests = CertificateUploadRequest::where('employee', $employee_id)
                ->where('archived', 0)
                ->where('status', 'approved')
                ->count();
            $AllLocation = DB::table('cvb_employee_location_approved')->where('employee_id', $employee_id)->count();
            $AllLocationStatus = DB::table('cvb_employee_location_approved')->where('status', '1')->where('employee_id', $employee_id)->count();


            if ($certificateRequestsCount == $certificateRequests && $certificateRequests != 0 && $AllLocation == $AllLocationStatus && $AllLocationStatus != 0) {
                $user = User::where('id', $employee_id)->first(); // Assuming 'id' is the primary key of the users table
                $user->evr_status = 'approved'; // Update the status column
                $user->save();
            }
        }

        if ($request->status == "Rejected") {

            $evrs = DB::table('cvb_employee_verification_request')->where('employee_id', $CertificateUploadRequest->employee)->first();
            $user_id = $CertificateUploadRequest->employee;
            $user = User::where('id', $user_id)->first();
            $useremail = $user->email;
            $contractor = DB::table('cvb_employee_verification_request')->where('employee_id', $user_id)->first();
            if (@$contractor->created_by != '') {
                $contractor_user = User::where('id', $contractor->created_by)->first();
                $contractor_email = $contractor_user->email;
            }
            $subject = 'Certificate Reject Notification';
            $user_content = 'Your certificate are Reject. Please upload valid cetificate as soon as possible.';

            Mail::send([], $user->toArray(), function ($message) use ($user_content, $useremail, $subject) {
                $message
                    ->to($useremail)
                    ->subject('CVB Certificate Notification')
                    ->setBody($user_content, 'text/html')
                    ->addPart($subject, 'text/plain');
            });
            $alert = new EmployeeAlert;
            $alert->task_topic = "Certificate Rejected";
            $alert->task_name = 'Upload Again';
            $alert->user_id = $contractor->created_by;
            $alert->task_type = "Certificate Reject";
            $alert->employee_id = $user_id;
            $alert->date_time = now()->timezone('Asia/Kolkata');
            $alert->save();
            User::where('id', $CertificateUploadRequest->employee)->update(['evr_status' => 'expired']);
            $userEvr = User::find($CertificateUploadRequest->employee);
            $userEvr->evr_status = 'reject';
            $userEvr->save();

            DB::table('cvb_employee_location_approved')->where('archived', '0')->where('employee_id', $user_id)->update(['archived' => '1']);

            $evr = DB::table('cvb_employee_verification_request')
                ->where('employee_id', $user_id)
                ->first();
            $selectedValues = [];

            if ($evr !== null) {
                $hseVerifiers = DB::table('users')
                    ->whereIn('name', explode(',', $evr->client_company_hsse__verifier__))
                    ->pluck('id')
                    ->toArray();
                $medicalVerifiers = DB::table('users')
                    ->whereIn('name', explode(',', $evr->client_company_medical_verifier))
                    ->pluck('id')
                    ->toArray();
                $techVerifiers = DB::table('users')
                    ->whereIn('name', explode(',', $evr->client_company_technical_verifier))
                    ->pluck('id')
                    ->toArray();
                    $contractor = DB::table('cvb_employee_verification_request')
                    ->where('employee_id', $user_id)
                    ->pluck('created_by')
                    ->toArray(); 
                    $selectedValues = array_merge($hseVerifiers, $medicalVerifiers, $techVerifiers,$contractor);

            }

            $alert = new EmployeeAlert;
            $alert->task_topic = "SiteAccess";
            $alert->task_name = 'SiteAccess';
            $alert->user_id = serialize($selectedValues);
            $alert->task_type = "SiteAccess";
            $alert->employee_id = $user_id;
            $alert->date_time = now()->timezone('Asia/Kolkata');
            
            // Unserialize the user_id and convert it to a comma-separated string
            $unserializedUserIds = unserialize($alert->user_id);
            $commaSeparatedUserIds = implode(',', $unserializedUserIds);
            $alert->user_id = $commaSeparatedUserIds;
            
            $alert->save();
            

        }


        echo "success";

        // $EmployeeCertificates = EmployeeCertificates::find($request->certificateId);
        // $EmployeeCertificates->contract_holder_id = $request->contract_holder_id;
        // $EmployeeCertificates->project_name = $request->project_name;
        // $EmployeeCertificates->status =  $request->status;
        // $EmployeeCertificates->save();
    }
}
