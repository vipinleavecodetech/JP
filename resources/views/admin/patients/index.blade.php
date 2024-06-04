@extends('layouts.admin')
@section('content')
@can('employee_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            {{--<a class="btn btn-success" href="{{ route("admin.patients.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.employee.title_singular') }}
            </a>--}}
            <!--<a class="btn btn-success" href="#">-->
            <!--    Patient List-->
            <!--</a>-->
        </div>
    </div>
@endcan
<div class="card">
    {{--<div class="card-header">
        {{ trans('cruds.employee.title_singular') }} {{ trans('global.list') }}
    </div>--}}
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <div id="loader"></div>
    <div class="card-body">
        <div class="cust_overflow">
        <table class="table table-bordered table-striped table-hover datatable display dt-responsive" id="patientTable">
            <thead>
                <tr>
                    <th width="5%">Sr.No.</th>
                    <th>Name</th>
                    <th>Phone No</th>
                    <th>Email Id</th>
                    <th>Gender</th>
                    <th>Date of Birth</th>
                    <th>Action</th>
                {{--<th class="none">How did your ED begin? Select the one that best describes your ED.</th>
                    <th class="none">What effect, if any, has your sex problems had on your partner relationships?</th>
                    <th class="none">How satisfied have you been with your sex life in the past 6 months?</th>
                    <th class="none">Do you have any of the following medical conditions?</th>
                    <th class="none">Please list your other medical conditions</th>
                    <th class="none">Have you seen your primary care doctor within the past 3 years?</th>
                    <th class="none">Are all of your medical issues being appropriately treated by your primary care provider?</th>
                    <th class="none">Please explain your medical issues not currently being treated by your primary care provider</th>
                    <th class="none">With sexual stimulation can you…?</th>
                    <th class="none">How satisfied are you with the rigidity of your erection during sexual activity?</th>
                    <th class="none">How satisfied have you been with your ability to keep your erections as long as you wanted over the past six months, in general?</th>
                    <th class="none">Have you taken any of the following as treatment for erectile dysfunction?</th>
                    <th class="none">Other Treatment</th>
                    <th class="none">If you have had treatment listed above for ED, please explain for each if the treatment was effective and provide dosage if applicable. Write NA if it does not apply to you.</th>
                    <th class="none">Are you on any medications? Include any medicines (e.g., Lipitor, Zyrtec, ibuprofen), herbs, vitamins, or dietary supplements that you have taken in the past 2 weeks, even if you are not taking them today.</th>
                    <th class="none">Please list the current medications that you are taking</th>
                    <th class="none">Do you have any allergies? Include any allergies to food, dyes, prescription or over-the-counter medicines (e.g., antibiotics, allergy medications), herbs, vitamins, supplements, or anything else.</th>
                    <th class="none">In the last three months, have you taken any of the following drugs?</th>
                    <th class="none">If said yes to any of the drugs in question 13, please provide more details for each</th>
                    <th class="none">Have you ever been prescribed nitrates/nitroglycerin?</th>
                    <th class="none">Please provide as much detail as possible. When was the last time you were prescribed nitrates/nitroglycerin?</th>
                    <th class="none">In the past several months, have you had any of the following</th>
                    <th class="none">Have you had any surgeries?</th>
                    <th class="none">Please list all surgeries you've had</th>
                    <th class="none">Is there a family history of any of the following?</th>
                    <th class="none">Please provide details of family history of cardiovascular disease or unexplained sudden death (family members, relationship, age of onset)</th>
                    <th class="none">Over the past two weeks how often have felt little or no pleasure in activities you usually enjoy?</th>
                    <th class="none">Over the past two weeks how often have feltdown, depressed, or hopeless?</th>
                    <th class="none">Over the past two weeks how often have feltnervous, anxious, on edge, or worrying too much?</th>
                    <th class="none">Which of the following apply to you?</th>
                    <th class="none">In The Last Three Months, Have You Used Any Of The Following Drugs Recreationally?</th>
                    <th class="none">Please provide more details here</th>
                    <th class="none">Have you had elevated Blood pressure in the past 6 months?</th>
                    <th class="none">Please provide more details</th>
                    <th class="none">Enter your blood pressure reading taken within the last 6 months</th>
                    <th class="none">Have you experienced any of the following conditions?</th>
                    <th class="none">Do you have any extra information to share with your doctor?</th>
                    <th class="none">Please provide details you would like to share with the doctor</th>
                    <th class="none">What is your treatment preference?</th>
                    <th class="none">Identity Verification (Face Picture)</th>
                    <th class="none">Identity Verification (Id Card)</th>
                    <th class="none">Created At</th>
                --}}
                </tr>
            </thead>
                <tbody>
                    <?php $i=1; ?>
                    
                    @foreach($patient as $key=>$data)
                        <tr data-entry-id="{{ $data->id }}">
                            <td class="details-control">
                             {{ $i++ }}
                            </td>
                            <td>
                                {{ $data->fname ?? '' }} {{ $data->lname ?? '' }}
                            </td>
                            <td>
                                {{ $data->phone ?? '' }}
                            </td>
                            <td>
                                {{ $data->email ?? '' }}
                            </td>
                            <td>
                                {{ $data->gender ?? '' }}
                            </td>
                            <td>
                                {{ $data->day ?? '' }}-{{ $data->month ?? '' }}-{{ $data->year ?? '' }}
                            </td>
                            <td>
                                <?php if(Auth::user()->role_id=='2'){ ?>
                                @can('user_show')
                                    @php $subscribed=0; @endphp

                                    @foreach($subscriptionStatus[0] as $key1 => $subscriptionData)
                                        @php $status = $subscriptionData->subscription_status; @endphp
                                       
                                        @if($subscriptionData->patient_id == $data->patient_id)
                                            @if($status =='active')
                                                @php $subscribed = 1; @endphp
                                            @endif
                                        @endif
                                    @endforeach
                                    
                                    @if($subscribed)
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.patients.patiantEdit', $data->id) }}?action=view">
                                            {{ trans('global.view') }}
                                        </a>
                                    @else
                                        <a href="{{ route("admin.user-patients.index") }}" class="btn btn-xs btn-primary" title="Please subscribe to view">Please subscribe to view your prescription</a>
                                    @endif
                                    @endcan
                                    <?php }else{ ?>
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.patients.patiantEdit', $data->id) }}?action=view">
                                            {{ trans('global.view') }}
                                        </a>
                                    <?php } ?>
                    

                                {{--@can('user_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.patients.patiantEdit', $data->id) }}?action=edit">
                                        trans('global.edit') Send Prescription
                                    </a>
                                @endcan --}}
                                @if(Auth::user()->role_id !='2')
                                @if($data->sure_script_patient_id)
                                <a class="btn btn-xs btn-info" style="color:#ffffff;font-weight:600;background-color:#aa1314;border:2px solid #aa1314;" onclick="createPrescription('{{$data->sure_script_patient_id}}')">
                                        {{-- trans('global.edit') --}} Send/View Prescriptions from SureScript
                                </a>
                                <!--<a class="btn btn-xs btn-info" style="color:#ffffff;font-weight:600;background-color:#aa1314;" onclick="GetPreferredPharmacy('{{$data->sure_script_patient_id}}')">
                                        {{-- trans('global.edit') --}} Get Preferred Pharmacy
                                </a>-->
                                @endif
                                @endif
                            </td>
                        {{--
                            <td>{{ $data->selector1 ?? '' }}</td>
                            <td>{{ $data->selector2 ?? '' }}</td>
                            <td>{{ $data->selector3 ?? '' }}</td>
                            <td><?php foreach(json_decode($data->selector4) as  $selector4){ echo $selector4.', ';  } ?></td>
                            <td>{{ $data->n_option4_textarea4 ?? '' }}</td>
                            <td>{{ $data->selector5 ?? '' }}</td>
                            <td>{{ $data->selector6 ?? '' }}</td>
                            <td>{{ $data->n_option6_textarea6 ?? '' }}</td>
                            <td>{{ $data->selector7 ?? '' }}</td>
                            <td>{{ $data->selector8 ?? '' }}</td>
                            <td>{{ $data->selector9 ?? '' }}</td>
                            <td><?php foreach(json_decode($data->selector10) as  $selector10){ echo $selector10.', ';  } ?></td>
                            <td>{{ $data->i_option10_textarea10 ?? '' }}</td>
                            <td>{{ $data->selector11 ?? '' }}</td>
                            <td>{{ $data->selector12 ?? '' }}</td>
                            <td>{{ $data->n_option12_textarea12 ?? '' }}</td>
                            <td>{{ $data->selector13 ?? '' }}</td>
                            <td><?php foreach(json_decode($data->selector14) as  $selector14){ echo $selector14.', ';  } ?></td>
                            <td>{{ $data->selector15 ?? '' }}</td>
                            <td>{{ $data->selector16 ?? '' }}</td>
                            <td>{{ $data->n_option16_textarea16 ?? '' }}</td>
                            <td><?php foreach(json_decode($data->selector17) as  $selector17){ echo $selector17.', ';  } ?></td>
                            <td>{{ $data->selector18 ?? '' }}</td>
                            
                            <td>{{ $data->n_option18_textarea18 ?? '' }}</td>
                            <td>{{ $data->selector19 ?? '' }}</td>
                            <td>{{ $data->selector20 ?? '' }}</td>
                            <td>{{ $data->selector21 ?? '' }}</td>
                            <td>{{ $data->selector22 ?? '' }}</td>
                            <td>{{ $data->selector23 ?? '' }}</td>
                            <td><?php foreach(json_decode($data->selector24) as  $selector24){ echo $selector24.', ';  } ?></td>
                            <td>{{ $data->selector25 ?? '' }}</td>
                            <td>{{ $data->n_option25_textarea25 ?? '' }}</td>
                            <td>{{ $data->selector26 ?? '' }}</td>
                            <td>{{ $data->n_option26_textarea26 ?? '' }}</td>
                            <td>{{ $data->selector27 ?? '' }}</td>
                            <td><?php foreach(json_decode($data->selector28) as  $selector28){ echo $selector28.', ';  } ?></td>
                            <td>{{ $data->selector29 ?? '' }}</td>
                            <td>{{ $data->n_option29_textarea29 ?? '' }}</td>
                            <td>{{ $data->selector30 ?? '' }}</td>
                            <td><img src="http://148.251.83.25/~leaveco1//{{ $data->facePicture ?? '' }}" width="10%"></td>
                            <td><img src="http://148.251.83.25/~leaveco1//{{ $data->uploadId ?? '' }}" width="10%"></td>
                            <td>{{ $data->created_at ?? '' }}</td>
                        --}}
                           
                        </tr>
                        
                    @endforeach
                </tbody>
        </table>

</div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/1.0.6/css/dataTables.responsive.css"> 
<script type="text/javascript" src="https://cdn.datatables.net/responsive/1.0.6/js/dataTables.responsive.min.js"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.4/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>  
<script>
  $('#patientTable').DataTable( {
    responsive: true,
});
</script>

<script>
    const SERVER_URL = 'https://spa.scriptsure.com/v3/login/byapp';
    const API_KEY = '22951580-c891-47f1-b20b-28ae55983999';
    const SECRET = '$2b$10$ftiH.VaJVJDNLqhVScTYoORAcDTgpS1Xzeud9AsT/5MP/fV/3gJrK';
    const EMAIL = 'sales@leavecode.com';

    // Generate the SHA1 Hash
    const generateHash = (apikey, password, dtStamp) => {
        const message = `${apikey}_${password}_${dtStamp}`;
        const hash = CryptoJS.HmacSHA1(message, password).toString(CryptoJS.enc.Hex);
        return hash;
    };

    //GENERATE API KEY VALUE to send as part of request body
    const encodeAPIKey = (apiKey, secret) => {
        // build message from apiKey, secret, and time in milliseconds
        const mills = Date.now();
        const finalHash = generateHash(apiKey, secret, mills);
        const encodedValue = apiKey + "~" + finalHash + "~" + mills;
        return encodedValue;
    }

    async function scriptSureAuthentication(apiKey, token, email, patientId, flag) {
        const login = {
            method: 'post',
            url: SERVER_URL,
            headers: { apiKey: apiKey, 'Content-Type': 'application/json', Accept: 'application/json' },
            data: { apikey: token, email: email }
        };
        showLoader();
        try {
            let res = await axios.request(login);
            let sessionToken = res.data.sessionToken;
            console.log('Session Token:', sessionToken); // Log the session token
            if(flag == 'createPrescription'){
                url = 'https://ssu.scriptsure.com/chart/' + patientId + '?sessiontoken=' + sessionToken + '&darkmode=on';
                //the popup window
                var width = 1300;
                var height = 600;
                var left = (screen.width - width) / 2;
                var top = (screen.height - height) / 2;
                var popupWindow = window.open('', 'Chart Popup', 'width=' + width + ',height=' + height + ',left=' + left + ',top=' + top);
                popupWindow.document.write('<iframe width="100%" height="100%" frameborder="0" src="' + url + '"></iframe>');
            
            }else if(flag == 'GetPreferredPharmacy'){
                //window.location = 'https://ssu.scriptsure.com/chart/' + patientId + '?sessiontoken=' + sessionToken + '&darkmode=on';
                window.location = 'https://ssu.scriptsure.com/v3/user/practice/prescriber' + sessionToken + '&darkmode=on';
            }
            hideLoader();
            //scriptSurePatientCreate(sessionToken); // Call scriptSurePatientCreate with the session token
            //document.getElementById('sessiontoken').innerHTML = sessionToken;
        } catch (error) {
            console.error('Error:', error.response ? error.response.data : error.message);
        }
    }

//Create Patient End
  const createPrescription = (patientId) => {
    const encodedApiKey = encodeAPIKey(API_KEY, SECRET);
    console.log("Encoded API Key:", encodedApiKey);
    scriptSureAuthentication(API_KEY, encodedApiKey, EMAIL, patientId, 'createPrescription');
    
  }

//Create Patient End
 const GetPreferredPharmacy = (patientId) => {
    const encodedApiKey = encodeAPIKey(API_KEY, SECRET);
    console.log("Encoded API Key:", encodedApiKey);
    scriptSureAuthentication(API_KEY, encodedApiKey, EMAIL, patientId, 'GetPreferredPharmacy');
 }

function showLoader() {
    document.getElementById('loader').style.display = 'block';
}

function hideLoader() {
    document.getElementById('loader').style.display = 'none';
}
</script>
@endsection