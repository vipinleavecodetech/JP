@extends('layouts.main-patient-form')
@section('main-section')
<style>
    #loader {
      position: absolute;
      top: 28%;
      left: 48%;
      transform: translate(-50%, -50%);
      border: 5px solid #a01214;
      border-top: 5px solid #f3f3f3;
      border-radius: 50%;
      width: 50px;
      height: 50px;
      animation: spin 2s linear infinite;
      z-index: 9999; /* Ensure it appears above other content */
      display: none; /* Initially hidden */
    }
    /* Spinner animation */
    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }
</style>
<div id="loader"></div>
<section class="main-sects">
   	<div class="container">
   		<div class="row">
   			<div class="col-md-3">
   			</div>
   			<div class="col-md-6">
          <div class="para-1">
          <h3>PAYMENT FINAL STEP</h3>
          <p>Your privacy is strictly protected</p>
          <!--<a href="#" class="pay-pal-btn">Pay width <img src="{{ url('public/quiz-assets/images/pay-logo.png') }}"></a>-->
          <div class="image-box-1">
            <img src="{{ url('public/quiz-assets/images/images.png') }}">
           </div>
        </div>

        <div class="info-mid text-center">
          <p>Payment method</p>
          <div class="check-1">
           <!--<input type="radio" id="cardType" name="cardType"  value="" checked/>-->
           <label for="scales">Credit / Debit Card</label>&nbsp&nbsp&nbsp
           <!--<input type="radio" id="horns" name="horns" />-->
           <!--<label for="horns">HSA / FSA Card</label>--><br>
           {{--<label for="horns" style="font-weight:700;font-size:15px">Payable Amount: ${{$patient_form_data->total_amount}}</label>--}}
           </div>
         </div>
       </div>
   			<div class="col-md-3">
   			</div>
   		</div>
   	</div>
   </section>
   <section class="main-sects">
   		<div class="container">
   		<div class="row">
   			<div class="col-md-3">
   			</div>
   			<div class="col-md-6 info-mid">
                             <form action="{{ route('payment.subscribe') }}" method="post" id="payment-form">
                                    @csrf
                                    <div id="card-element">
                                    <div class="row">
                                        <div class="col-12">
                                        <div class="form-group">
                                            <label for="card_number">Card Number</label>
                                            <input type="text" id="card_number" value="4111111111111111" name="card_number" class="form-control" placeholder="Card Number" required>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exp_month">Expiration Month</label>
                                            <select name="exp_month" id="exp_month" class="form-control" required>
                                               <option value="">Select Month</option>
                                               <option value="01">01</option>
                                               <option value="02">02</option>
                                               <option value="03">03</option>
                                               <option value="04">04</option>
                                               <option value="05">05</option>
                                               <option value="06">06</option>
                                               <option value="07">07</option>
                                               <option value="08">08</option>
                                               <option value="09">09</option>
                                               <option value="10">10</option>
                                               <option value="11">11</option>
                                               <option value="12">12</option>
                                            </select>
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exp_year">Expiration Year</label>
                                            <select id="exp_year" name="exp_year" class="form-control" required>
                                               <option value="">Select Year</option>
                                               <option value="2023">2023</option>
                                               <option value="2024">2024</option>
                                               <option value="2025">2025</option>
                                               <option value="2026">2026</option>
                                               <option value="2027">2027</option>
                                               <option value="2028">2028</option>
                                               <option value="2029">2029</option>
                                               <option value="2030">2030</option>
                                               <option value="2031">2031</option>
                                               <option value="2032">2032</option>
                                               <option value="2033">2033</option>
                                            </select>
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="cvc">CVC</label>
                                            <input type="text" id="cvc" name="cvc" value="123" class="form-control" placeholder="Ex:123" required style="height:36px;">
                                        </div>
                                        </div>

                                         <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="cvc">Email</label>
                                            <input type="text" id="email" name="email" value="{{$patient_form_data->email}}" class="form-control" required style="height:36px;" readonly>
                                        </div>
                                        </div>

                                         <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="cvc">Phone No</label>
                                            <input type="text" id="phone" name="phone" value="{{ $patient_form_data->phone }}" class="form-control" required style="height:36px;" readonly>
                                        </div>
                                        </div>

                                        </div>
                                        </div>
                                        <div class="col-12">
                                        <?php 
                                        $how_many_time_per_month = preg_replace('/[^0-9]/', '', $patient_form_data->selector34); 
                                        $interval = 30*$how_many_time_per_month;
                                        if($PatientShippingAddress->country!=''){
                                           $country = $PatientShippingAddress->country;
                                        }else{
                                           $country = "USA";
                                        }
                                        ?>
                                        <input type="hidden" name="patient_id" value="{{$patient_form_data->patient_id}}">
                                        <input type="hidden" name="sure_script_patient_id" id="sure_script_patient_id" value="">
                                        <input type="hidden" name="sure_script_practiceId" id="sure_script_practiceId" value="">
                                        <input type="hidden" name="sure_script_userIdAdded" id="sure_script_userIdAdded" value="">
                                        <input type="hidden" name="globalPay" value="{{$patient_form_data->email}}">
                                        <input type="hidden" name="patient_name" value="{{$patient_form_data->fname}} {{$patient_form_data->lname}}" >
                                        <input type="hidden" name="email" value="{{$patient_form_data->email}}">
                                        <input type="hidden" id="amount" name="amount" value="{{$patient_form_data->total_amount}}" required>
                                        <input type="hidden" name="card_type" id="card_type" >
                                        <input type="hidden" name="interval" value="{{$interval}}">
                                        <input type="hidden" name="intervalunit" value="days">
                                        <input type="hidden" name="occurance" value="12">
                                        <input type="hidden" name="subscription_name" value="{{$patient_form_data->how_many_month_supply}} Subscription">
                                        <input type="hidden" name="address" value="{{$PatientShippingAddress->address_one}}">
                                        <input type="hidden" name="city" value="{{$PatientShippingAddress->city}}">
                                        <input type="hidden" name="state" value="{{$PatientShippingAddress->state}}">
                                        <input type="hidden" name="country" value="{{$country}}">
                                        <input type="hidden" name="zip" value="{{$PatientShippingAddress->zip_code}}">
                                        
                                    </div>
                                    <div class="bt-shop mt-2">
                                        <div class="col-md-12 text-center p-0">
                                            <button class="m-auto btn btn-primary" id="complete_my_order" type="submit" style="display:none">COMPLETE MY ORDER <i class="fa-solid fa-chevron-right"></i></button>
                                            <button class="m-auto btn btn-primary" type="button" onclick="createPatient()">COMPLETE MY ORDER <i class="fa-solid fa-chevron-right"></i></button>
                                            <button class="m-auto btn btn-primary gray-btn" type="submit"><a href="{{ url()->previous() }}" style="color:#000;"><i class="fa-solid fa-chevron-left"></i> PREVIOUS STEP</a></button>
                                        </div>
                                    </div>
                                    <div class="check-2"> 
                                       <input type="checkbox" id="scales" name="scales"  value="" required>
                                       <label for="scales">By checking Complete  my order you will be changed ${{$patient_form_data->total_amount}} for your first shiping and ${{$patient_form_data->total_amount}} every #month there after untilyou cancel or your prescription expires. You can cancel your plan anytime by logging into your account or calling us at (866)294-3772 or via email at headsup@rexmd.com</label>
                                   </div>
                                </form>
                        
                        
                       <div class="image-box">
                         <img src="{{ url('public/quiz-assets/images/bank-2.jpg') }}">
                       </div>
                    </div>
   			</div>
   			<div class="col-md-3">
   			</div>
   		</div>
   		   	</div>
   </section>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
jQuery('input[type="text"]').keyup(function(){
    $(this).next('.danger').remove();
});

jQuery('select').change(function(){
    $(this).next('.danger').remove();
});

jQuery('#card_number').change(function(){
    var cardnumber = $(this).val();
    var americanexpcardno = /^(?:3[47][0-9]{13})$/;
    var visacardno = /^(?:4[0-9]{12}(?:[0-9]{3})?)$/;
    var mastercardno = /^(?:5[1-5][0-9]{14})$/;
    var discovercardno = /^(?:6(?:011|5[0-9][0-9])[0-9]{12})$/;
    var dinersclubcardno = /^(?:3(?:0[0-5]|[68][0-9])[0-9]{11})$/;
    var jcbcardno = /^(?:(?:2131|1800|35\d{3})\d{11})$/;
    var isValidCard = 0;
    if(cardnumber.match(americanexpcardno)){
        isValidCard=1;
        jQuery('#card_type').val('American Express')
    }
    if(cardnumber.match(visacardno)){
        isValidCard=1;
        jQuery('#card_type').val('Visa');
    }
    if(cardnumber.match(mastercardno)){
        isValidCard=1;
        jQuery('#card_type').val('Master');
    }
    if(cardnumber.match(discovercardno)){
        isValidCard=1;
        jQuery('#card_type').val('Discover');
    }
    if(cardnumber.match(dinersclubcardno)){
        isValidCard=1;
        jQuery('#card_type').val('Dinners Club');
    }
    if(cardnumber.match(jcbcardno)){
        isValidCard=1;
        jQuery('#card_type').val('JCB');
    }
    
    if(isValidCard==0){
         jQuery(this).after('<span class="danger">Please enter a valid card number.</span>');
         jQuery('#card_type').val('');
    }
});    

jQuery('#pay').click(function(){
    $('.danger').remove();
    var cardtype = jQuery('#card_type').val();
    var cardnumber = jQuery('#card_number').val();
    var exp_month = jQuery('#exp_month').val();
    var exp_year = jQuery('#exp_year').val();
    var cvc = jQuery('#cvc').val();
    var isError=0;
    
    if(card_type==''){
        jQuery('#card_number').after('<span class="danger">Please enter a valid card number.</span>');
        isError=1;
    }else{
        $('#card_number').next('.danger').remove();
    } 
    
    if(cardnumber==''){
        $('#card_number').after('<span class="danger">Please enter card number.</span>');
        isError=1;
    }else{
        $('#card_number').next('.danger').remove();
    }
    
    if(exp_month==''){
        $('#exp_month').after('<span class="danger">Please select month.</span>');
        isError=1;
    }else{
        $('#exp_month').next('.danger').remove();
    }
    
    if(exp_year==''){
        $('#exp_year').after('<span class="danger">Please select month.</span>');
        isError=1;
    }else{
        $('#exp_year').next('.danger').remove();
    }
    
    if(cvc==''){
        $('#cvc').after('<span class="danger">Please enter CVC.</span>');
        isError=1;
    }else{
        $('#cvc').next('.danger').remove();
    }
   
   if(isError==0){
       $('#payment-form').submit();
   }
    
});
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.4/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>


<script>
    const SERVER_URL = 'https://spa.scriptsure.com/v3/login/byapp';
    const API_KEY = '22951580-c891-47f1-b20b-28ae55983999';
    const SECRET = '$2b$10$ftiH.VaJVJDNLqhVScTYoORAcDTgpS1Xzeud9AsT/5MP/fV/3gJrK';
    const EMAIL = 'vipin@leavecodetech.com';

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

    async function scriptSureAuthentication(apiKey, token, email) {
        const login = {
            method: 'post',
            url: SERVER_URL,
            headers: { apiKey: apiKey, 'Content-Type': 'application/json', Accept: 'application/json' },
            data: { apikey: token, email: email }
        };
        try {
            let res = await axios.request(login);
            let sessionToken = res.data.sessionToken;
            let practiceId = res.data.practices[0].id;
            console.log('Session Token:', sessionToken); // Log the session token
            scriptSurePatientCreate(sessionToken,practiceId); // Call scriptSurePatientCreate with the session token
            document.getElementById('sessiontoken').innerHTML = sessionToken;
        } catch (error) {
            console.error('Error:', error.response ? error.response.data : error.message);
        }
    }

    //Create Patient Start
    async function scriptSurePatientCreate(token,practiceId) {
        const createPatient = {
            method: 'post',
            url: 'https://ssa.scriptsure.com/v3/patient?sessiontoken=' + token,
            headers: { 'Content-Type': 'application/json', Accept: 'application/json' },
            data: {
                dob: '{{ $patient_form_data->year }}-{{ $patient_form_data->month }}-{{ $patient_form_data->day }}',
                zip: '{{ $PatientShippingAddress->zip_code }}',
                cell: '{{ $patient_form_data->phone }}',
                city: '{{ $PatientShippingAddress->city }}',
                home: '{{ $patient_form_data->phone }}',
                work: '{{ $patient_form_data->phone }}',
                state: '{{ $PatientShippingAddress->state }}',
                gender: '{{ $patient_form_data->gender }}',
                consent: true,
                doctorId: 1,
                lastName: '{{ $patient_form_data->lname }}',
                firstName: '{{ $patient_form_data->fname }}',
                practiceId: practiceId,
                addressLine1: '{{ $PatientShippingAddress->address_one }}',
                patientStatusId: 0,
                preferredCommunicationId: '0'
            }
        };
        
        try {
            showLoader();
            let res = await axios.request(createPatient);
            //console.log('Patient Creation Response:', res.data);
            //console.log(res.data.savedPatientObj.patientId);
            $("#sure_script_patient_id").val(res.data.savedPatientObj.patientId);
            $("#sure_script_practiceId").val(practiceId);
            $("#sure_script_userIdAdded").val(res.data.savedPatientObj.userIdAdded);

            // Add Diagnosis Code Start 27-05-24
            const diagnosis = {
                method: 'POST',
                url: `https://ssa.scriptsure.com/v3/diagnosis?sessiontoken=${token}`,
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                data: {
                    patientId: res.data.savedPatientObj.patientId,
                    encounterId: token,
                    conceptId: 'S93.4',
                    codingSystem: 0,
                    name: 'Headsup diagnosis'
                }
            };

            try {
                let diagnosisRes = await axios.request(diagnosis);
                console.log(diagnosisRes.data);
            } catch (diagnosisError) {
                console.error('Diagnosis Error:', diagnosisError.response ? diagnosisError.response.data : diagnosisError.message);
            }
            // Diagnosis Code End 27-05-24

            $("#complete_my_order").trigger('click');
            //window.location = 'https://ssu.scriptsure.com/chart/' + res.data.savedPatientObj.patientId + '?sessiontoken=' + token + '&darkmode=on';

        } catch (error) {
            alert('Error:', error.response ? error.response.data : error.message);
            console.error('Error:', error.response ? error.response.data : error.message);
        }
    }
  //Create Patient End
  const createPatient = () => {
    const encodedApiKey = encodeAPIKey(API_KEY, SECRET);
    console.log("Encoded API Key:", encodedApiKey);
    scriptSureAuthentication(API_KEY, encodedApiKey, EMAIL);
  }

function showLoader() {
    document.getElementById('loader').style.display = 'block';
}

function hideLoader() {
    document.getElementById('loader').style.display = 'none';
}
</script>

@endsection