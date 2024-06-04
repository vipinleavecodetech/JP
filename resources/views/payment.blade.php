@extends('layouts.main-patient-form')
@section('main-section')
<style type="text/css">
   form#msform.full-size {
        width: 100%;
    }
    form#msform.full-size h2, form#msform.full-size h3 {
        text-align: left;
    }
    ul.mlr-0 {
        margin-left: -10px;
        margin-right: -10px;
    }
    ul.radio-boxs li.cust_opt_design {
           display: block !important;
       }
    .danger{
        color:red;
    }
</style>
<!--<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>	-->
<!--<script src="https://js.stripe.com/v3/"></script>-->

<!--------------Main Section----------------->
<!--<section class="line-tag">
   <div class="container-fluid">
      <div class="row">
        <div class="col-12">
            <div class="flex min-h-[34px] items-center justify-center bg-black py-0 sm:min-h-[30px]"><div class="ml-2 flex-none whitespace-nowrap sm:ml-0 sm:pr-0"><svg width="13" height="16" viewBox="0 0 13 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="inline -mt-1 inline"><path id="Vector" d="M10.9501 3.48356L7.09051 0.528776C6.53914 0.0971787 5.71205 0.0971787 5.16068 0.528776L1.28269 3.48356C0.657798 3.96495 0.308594 4.64556 0.308594 5.39255V14.6387C0.308594 15.3857 0.988623 15.9999 1.79731 15.9999H10.4355C11.2626 15.9999 11.9426 15.3857 11.9426 14.6387V5.39255C11.9426 4.64556 11.575 3.96495 10.9501 3.48356ZM10.8215 14.6221C10.8215 14.8213 10.6377 14.9707 10.4355 14.9707H1.79731C1.57676 14.9707 1.41134 14.8047 1.41134 14.6221V5.39255C1.41134 4.94433 1.63189 4.52936 1.99947 4.24716L5.85909 1.29237C5.93262 1.24257 6.02451 1.20937 6.11643 1.20937C6.20831 1.20937 6.30019 1.24257 6.37373 1.29237L10.2517 4.24716C10.6193 4.52936 10.8399 4.94433 10.8399 5.39255V14.6221H10.8215Z" fill="white"></path><path id="Vector_2" d="M6.11504 6.78725C7.19939 6.78725 8.08159 5.99045 8.08159 5.01104C8.08159 4.03166 7.19939 3.23486 6.11504 3.23486C5.03064 3.23486 4.14844 4.03166 4.14844 5.01104C4.14844 5.99045 5.03064 6.78725 6.11504 6.78725ZM6.11504 4.24745C6.59287 4.24745 6.97886 4.59607 6.97886 5.02764C6.97886 5.45925 6.59287 5.80784 6.11504 5.80784C5.63716 5.80784 5.25121 5.45925 5.25121 5.02764C5.25121 4.59607 5.63716 4.24745 6.11504 4.24745Z" fill="white"></path><path id="Vector_3" d="M8.87303 7.96533H7.95406C7.82541 7.96533 7.71514 8.01511 7.6416 8.11474L3.23061 13.3935C3.17548 13.4765 3.23061 13.5761 3.34089 13.5761H4.25985C4.3885 13.5761 4.49877 13.5263 4.57231 13.4267L8.9833 8.14791C9.03845 8.08153 8.9833 7.96533 8.87303 7.96533Z" fill="white"></path><path id="Vector_4" d="M5.32627 9.30991C5.32627 8.54632 5.06897 7.93213 4.003 7.93213C2.937 7.93213 2.67969 8.54632 2.67969 9.30991C2.67969 10.0735 2.937 10.6877 4.003 10.6877C5.06897 10.7043 5.32627 10.0735 5.32627 9.30991ZM3.65378 9.30991C3.65378 8.94472 3.65378 8.66251 4.003 8.66251C4.35219 8.66251 4.35219 8.96132 4.35219 9.30991C4.35219 9.6751 4.35219 9.9573 4.003 9.9573C3.65378 9.97391 3.65378 9.6751 3.65378 9.30991Z" fill="white"></path><path id="Vector_5" d="M8.22956 10.8872C7.16359 10.8872 6.90625 11.5014 6.90625 12.265C6.90625 13.0286 7.16359 13.6428 8.22956 13.6428C9.31395 13.6428 9.55287 13.0286 9.55287 12.265C9.55287 11.5014 9.29557 10.8872 8.22956 10.8872ZM8.22956 12.929C7.88038 12.929 7.88038 12.6302 7.88038 12.2816C7.88038 11.9164 7.88038 11.6342 8.22956 11.6342C8.57878 11.6342 8.57878 11.933 8.57878 12.2816C8.57878 12.6302 8.57878 12.929 8.22956 12.929Z" fill="white"></path></svg><span class="mx-[.1rem] font-roboto text-[13px] font-semibold leading-[11px] text-red-700"> Fall Special </span><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACEAAAATCAYAAAAeVmTJAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAI2SURBVHgBtZVNSFVBFIDnhi0KjAcSLaJ6FQRCkOCqCCtpZUVtCiLo9UNYBglBiyL6WRVtMqqNERSCoIgICoILnyiKiCAiKIjiSkFxIW78QRy/wztXx4fv3bmiBz7m3Dk/98ydM3MD4ynW2oMMt+EyzMIiFMN6EASvzH4LBTyAAbgOBVm2GqjwzJOANKTc+QKPwI8Mx+ASK17bwWUExoyf1EAXrBtfoYBKGIYgh70M7nvmKoUpuAJJ4ys4j0N1HnvC+Of6L9sAT7NtByJiZRtKcxnZngXjV0CSoQx6YcKZPyFjVE/8hrc4H2as5aUdZndSBRJbQo4mbe7vsIBeGBmN0yPothmZgQa4kcdfTkC1nChnTnrhSdgLjH/gkzxnn5SoYiT5PajXgqayG0z2G4bgjDbiUbioc4/VJ6Wxku/1thx6F5z1LEhWMA9jzlxFWBichlE4CT+g3fGbgK9wR04dPAwNVfDMxBD8P+gXOQVHtICU2prhs+qTcE71cpgOT5UWfCtUWkxMIeYFLKkufTOoeokWJ3nvShFOTCOknefnofIrVnNsJfgHf1Xvg5vOi9pU/+YUd81uXViyFZWb/aB7VGRiiK5yszE1R6CN+wZq9esktCnlqxWr7/FQdxOumJhCTCtccJ7T8FOLK4KXNsZtKglWY/gW6icu38EW+TPMl1hWcdXDT1ZZB+fNXovcDdBjc/zZbOav9wXe2cz1vecS6IuSDO9hGebUJr1yCPqhkzvfe9viygY20m1B+yktYgAAAABJRU5ErkJggg==" class="inline"></div><div class="mx-2 py-1 font-roboto text-[11px] font-bold leading-3 tracking-normal text-white sm:ml-1 sm:mr-0 sm:flex-none sm:p-0"><span class="mx-1">|</span><span>Free Prescription + Free Rush Delivery.</span></div></div>
        </div></div>
    </div>
</section>-->

<div class="content-page ml-0" id="quizDetails">
<?php //echo "<pre>"; print_r($patient); echo "</pre>";?>
    <div class="content">
       <div class="container-fluid">
          <!-- start page title -->
          <div class="row">
             <div class="col-12">
                <div class="page-title-box">
                   <div class="page-title-right">
                      <ol class="breadcrumb m-0">
                         <li class="breadcrumb-item"><a href="javascript: void(0);">Rexmd</a></li>
                         <li class="breadcrumb-item active">Quiz</li>
                      </ol>
                   </div>
                   <h4 class="page-title">Payment</h4>
                </div>
             </div>
          </div>
          <!-- end page title --> 
            <div class="card-box">
               <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">Complete Your Subscription</div>
                            <div class="card-body">
                                <div class="row">
                                        <div class="col-12">
                                        <div class="form-group">
                                            <label for="name">Name: {{ @$patient_form_data->fname }} {{ @$patient_form_data->lname }}</label><br>
                                            <label for="amount">Payable Amount: ${{$patient_form_data->total_amount}}</label>
                                        </div>
                                        </div>
                                    </div>
                                <form action="{{ route('payment.subscribe') }}" method="post" id="payment-form">
                                    @csrf
                                    <div id="card-element">
                                    <div class="row">
                                        <div class="col-12">
                                        <div class="form-group">
                                            <label for="card_number">Card Number</label>
                                            <input type="text" id="card_number" value="4242424242424242" name="card_number" class="form-control" placeholder="Card Number" required>
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
                                        <div class="col-4">
                                        <div class="form-group">
                                            <label for="cvc">CVC</label>
                                            <input type="text" id="cvc" name="cvc" value="123" class="form-control" placeholder="Ex:123" required>
                                        </div>
                                        </div>
                                        </div>
                                        </div>   
                                        <div class="col-12">
                                        <?php 
                                        $how_many_time_per_month = preg_replace('/[^0-9]/', '', $patient_form_data->selector34); 
                                        $interval = 30*$how_many_time_per_month;
                                        ?>
                                        <input type="hidden" name="patient_id" value="{{$patient_form_data->patient_id}}">
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
                                        <input type="hidden" name="country" value="{{$PatientShippingAddress->country}}">
                                        <input type="hidden" name="zip" value="{{$PatientShippingAddress->zip_code}}">
                                        <button type="button" id="pay" class="btn btn-success" style="margin: auto;display: block;">Pay Now</button>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
             </div>
          </div>
       <!-- end container-fluid -->
    </div>
    <!-- end content -->
    <!-- Footer Start -->
    <footer class="footer ml-0 l-0">
       <div class="container-fluid">
          <div class="row">
             <div class="col-md-12">
                2023 © Rexmd
             </div>
          </div>
       </div>
    </footer>
    <!-- end Footer -->
 </div>
<!--------------Main Section End------------->
<script>
// Using Stripe.js to handle card input and generate a token
var stripe = Stripe("{{ config('services.stripe.key') }}");

var elements = stripe.elements();
var card = elements.create('card', {
    hidePostalCode: true, // Hide ZIP code
});

card.mount('#card-element');

var form = document.getElementById('payment-form');

form.addEventListener('submit', function(event) {
    event.preventDefault();

    stripe.createPaymentMethod({
        type: 'card',
        card: card
    }).then(function(result) {
        if (result.error) {
            var errorElement = document.getElementById('card-errors');
            errorElement.textContent = result.error.message;
        } else {
            // PaymentMethod is created, send it to your server for processing
            var paymentMethod = result.paymentMethod;

            // Add the PaymentMethod ID to a hidden input field
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', paymentMethod.id);
            form.appendChild(hiddenInput);

            // Submit the form to your Laravel route for processing
            form.submit();
        }
    });
});
</script>
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

@endsection