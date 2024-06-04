@extends('layouts.main-patient-form')
@section('main-section')

<section class="main-sects">
  <div class="container">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <div class="para-1">
          <h3>Where would uot like us to ship your <br> Prescription ? </h3>
        </div>
        <div class="stepwizard">
          <div class="stepwizard-row setup-panel d-flex justify-content-around">
            <div class="stepwizard-step col-auto" style="
                           text-align: center;
                           ">
              <a href="#" class="selected-btn btn btn-circle btn-success">
                <i class="fa-solid fa-n"></i>
              </a>
              <span class="tag-icon">Free Telehealth Visit</span>
            </div>
            <div class="stepwizard-step col-auto">
              <a href="#" class=" btn btn-circle btn-white" disabled="disabled">
                <i class="fa-solid fa-hand-holding-medical"></i>
              </a>
              <span class="tag-icon">Discreet Packaging</span>
            </div>
            <div class="stepwizard-step col-auto">
              <a href="#" class=" btn btn-circle btn-white" disabled="disabled">
                <i class="fa-solid fa-truck-moving"></i>
              </a>
              <span class="tag-icon">Free Expedited Rush Shipping</span>
            </div>
          </div>
        </div>
        <div class="col-md-3"></div>
      </div>
    </div>
</section>
<section class="main-sects">
  <div class="container">
    <form method="post" action="{{ route('patientShippingDetailsStore') }}" id="ShippingForm">
    @csrf
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6 info-mid">
        <div class="para-2">
          <h2>SHIPPING INFORMATION</h2>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-6">
                <div class="input-btn">
                  <input type="hidden" name="patient_id" value="{{ $patient_form_data->id }}">
                  <legend class="v-1">First Name</legend>
                  <input type="text" id="first_name" name="first_name" value="<?php if(@$PatientShippingAddress->first_name !=''){echo $PatientShippingAddress->first_name; }else{ echo $patient_form_data->fname; } ?>" placeholder="John" required readonly>
                </div>
              </div>
              <div class="col-md-6">
                <div class="input-btn">
                  <legend class="v-1">Last Name</legend>
                  <input type="text" id="last_name" name="last_name" value="<?php if(@$PatientShippingAddress->last_name !=''){echo $PatientShippingAddress->last_name; }else{ echo $patient_form_data->lname; } ?>" placeholder="Deo" required readonly>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row d-1">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-12">
                <div class="input-btn">
                  <legend class="v-1">Address</legend>
                  <input type="text" id="address_one" name="address_one" placeholder="Address" value="{{ @$PatientShippingAddress->address_one }}" required maxlength="35">
                  <span class="address_one_error" style="color:red;margin:12px;"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row d-1">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-12">
                <div class="input-btn">
                  <legend class="v-1">Apartment, Suite ,etc (Optional)</legend>
                  <input type="text" id="address_two" name="address_two" placeholder="Apartment, Suite" value="{{ @$PatientShippingAddress->address_two }}" maxlength="35">
                  <span class="address_two_error" style="color:red;margin:12px;"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row d-1">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-6">
                <div class="input-btn">
                  <legend class="v-1">Country</legend>
                  <select name="country" id="country">
                    <option value="US" <?php if(@$PatientShippingAddress->country=="America"){ echo "selected"; } ?> >America</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="input-btn">
                  <legend class="v-1">Select State</legend>
                  <select name="state" id="state">
                    <option value="AL" <?php if(@$PatientShippingAddress->state=="AL"){ echo "selected"; } ?> >Alabama</option>
                    <option value="AK" <?php if(@$PatientShippingAddress->state=="AK"){ echo "selected"; } ?> >Alaska</option>
                    <option value="AZ" <?php if(@$PatientShippingAddress->state=="AZ"){ echo "selected"; } ?> >Arizona</option>
                    <option value="AR" <?php if(@$PatientShippingAddress->state=="AR"){ echo "selected"; } ?> >Arkansas</option>
                    <option value="CA" <?php if(@$PatientShippingAddress->state=="CA"){ echo "selected"; } ?> >California</option>
                    <option value="CO" <?php if(@$PatientShippingAddress->state=="CO"){ echo "selected"; } ?> >Colorado</option>
                    <option value="CT" <?php if(@$PatientShippingAddress->state=="CT"){ echo "selected"; } ?> >Connecticut</option>
                    <option value="DE" <?php if(@$PatientShippingAddress->state=="DE"){ echo "selected"; } ?> >Delaware</option>
                    <option value="DC" <?php if(@$PatientShippingAddress->state=="DC"){ echo "selected"; } ?> >District of Columbia</option>
                    <option value="FL" <?php if(@$PatientShippingAddress->state=="FL"){ echo "selected"; } ?> >Florida</option>
                    <option value="GA" <?php if(@$PatientShippingAddress->state=="GA"){ echo "selected"; } ?> >Georgia</option>
                    <option value="HI" <?php if(@$PatientShippingAddress->state=="HI"){ echo "selected"; } ?> >Hawaii</option>
                    <option value="ID" <?php if(@$PatientShippingAddress->state=="ID"){ echo "selected"; } ?> >Idaho</option>
                    <option value="IL" <?php if(@$PatientShippingAddress->state=="IL"){ echo "selected"; } ?> >Illinois</option>
                    <option value="IN" <?php if(@$PatientShippingAddress->state=="IN"){ echo "selected"; } ?> >Indiana</option>
                    <option value="IA" <?php if(@$PatientShippingAddress->state=="IA"){ echo "selected"; } ?> >Iowa</option>
                    <option value="KS" <?php if(@$PatientShippingAddress->state=="KS"){ echo "selected"; } ?> >Kansas</option>
                    <option value="KY" <?php if(@$PatientShippingAddress->state=="KY"){ echo "selected"; } ?> >Kentucky </option>
                    <option value="LA" <?php if(@$PatientShippingAddress->state=="LA"){ echo "selected"; } ?> >Louisiana</option>
                    <option value="ME" <?php if(@$PatientShippingAddress->state=="ME"){ echo "selected"; } ?> >Maine</option>
                    <option value="MT" <?php if(@$PatientShippingAddress->state=="MT"){ echo "selected"; } ?> >Montana</option>
                    <option value="NE" <?php if(@$PatientShippingAddress->state=="NE"){ echo "selected"; } ?> >Nebraska</option>
                    <option value="NV" <?php if(@$PatientShippingAddress->state=="NV"){ echo "selected"; } ?> >Nevada</option>
                    <option value="NH" <?php if(@$PatientShippingAddress->state=="NH"){ echo "selected"; } ?> >New Hampshire</option>
                    <option value="NJ" <?php if(@$PatientShippingAddress->state=="NJ"){ echo "selected"; } ?> >New Jersey</option>
                    <option value="NM" <?php if(@$PatientShippingAddress->state=="NM"){ echo "selected"; } ?> >New Mexico</option>
                    <option value="NY" <?php if(@$PatientShippingAddress->state=="NY"){ echo "selected"; } ?> >New York</option>
                    <option value="NC" <?php if(@$PatientShippingAddress->state=="NC"){ echo "selected"; } ?> >North Carolina</option>
                    <option value="ND" <?php if(@$PatientShippingAddress->state=="ND"){ echo "selected"; } ?> >North Dakota</option>
                    <option value="OH" <?php if(@$PatientShippingAddress->state=="OH"){ echo "selected"; } ?> >Ohio</option>
                    <option value="OK" <?php if(@$PatientShippingAddress->state=="OK"){ echo "selected"; } ?> >Oklahoma</option>
                    <option value="OR" <?php if(@$PatientShippingAddress->state=="OR"){ echo "selected"; } ?> >Oregon</option>
                    <option value="MD" <?php if(@$PatientShippingAddress->state=="MD"){ echo "selected"; } ?> >Maryland</option>
                    <option value="MA" <?php if(@$PatientShippingAddress->state=="MA"){ echo "selected"; } ?> >Massachusetts</option>
                    <option value="MI" <?php if(@$PatientShippingAddress->state=="MI"){ echo "selected"; } ?> >Michigan</option>
                    <option value="MN" <?php if(@$PatientShippingAddress->state=="MN"){ echo "selected"; } ?> >Minnesota</option>
                    <option value="MS" <?php if(@$PatientShippingAddress->state=="MS"){ echo "selected"; } ?> >Mississippi</option>
                    <option value="MO" <?php if(@$PatientShippingAddress->state=="MD"){ echo "selected"; } ?> >Missouri</option>
                    <option value="PA" <?php if(@$PatientShippingAddress->state=="PA"){ echo "selected"; } ?> >Pennsylvania</option>
                    <option value="RI" <?php if(@$PatientShippingAddress->state=="RI"){ echo "selected"; } ?> >Rhode Island</option>
                    <option value="SC" <?php if(@$PatientShippingAddress->state=="SC"){ echo "selected"; } ?> >South Carolina</option>
                    <option value="SD" <?php if(@$PatientShippingAddress->state=="SD"){ echo "selected"; } ?> >South Dakota</option>
                    <option value="TN" <?php if(@$PatientShippingAddress->state=="TN"){ echo "selected"; } ?> >Tennessee</option>
                    <option value="TX" <?php if(@$PatientShippingAddress->state=="TX"){ echo "selected"; } ?> >Texas</option>
                    <option value="UT" <?php if(@$PatientShippingAddress->state=="UT"){ echo "selected"; } ?> >Utah</option>
                    <option value="VT" <?php if(@$PatientShippingAddress->state=="VT"){ echo "selected"; } ?> >Vermont</option>
                    <option value="VA" <?php if(@$PatientShippingAddress->state=="VA"){ echo "selected"; } ?> >Virginia</option>
                    <option value="WA" <?php if(@$PatientShippingAddress->state=="WA"){ echo "selected"; } ?> >Washington</option>
                    <option value="WV" <?php if(@$PatientShippingAddress->state=="WV"){ echo "selected"; } ?> >West Virginia</option>
                    <option value="WI" <?php if(@$PatientShippingAddress->state=="WI"){ echo "selected"; } ?> >Wisconsin</option>
                    <option value="WY" <?php if(@$PatientShippingAddress->state=="WY"){ echo "selected"; } ?> >Wyoming</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row d-1">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-6">
                <div class="input-btn">
                  <legend class="v-1">City</legend>
                  <input type="text" id="city" name="city" placeholder="City" value="{{ @$PatientShippingAddress->city }}" required maxlength="35">
                   <span class="city_error" style="color:red;margin:12px;display:none;"></span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="input-btn">
                  <legend class="v-1">Zip Code</legend>
                  <input type="text" id="zip_code" name="zip_code" placeholder="Zip Code" value="{{ @$PatientShippingAddress->zip_code }}" required maxlength="9">
                  <span class="zip_code_error" style="color:red;margin:12px;display:none;"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="check">
          <input type="checkbox" id="scales" name="scales" checked required/>
          <label for="scales">Text me shipment updates and notification consistent width the <a href="">Terms</a>
          </label>
        </div>
        <div class="bt-shop">
          <div class="col-md-12 text-center p-0">
            <button class="m-auto btn btn-primary" type="submit">PROCEED To FINAL STEP <i class="fa-solid fa-chevron-right"></i>
            </button>
            <button class="m-auto btn btn-primary gray-btn" type="submit">
              <a href="{{ route('orderSummaryDetail') }}" style="color:#000"><i class="fa-solid fa-chevron-left"></i> PREVIOUS STEP </a></button>
          </div>
        </div>
      </div>
      <div class="col-md-3"></div>
    </div>
     </form>
  </div>
</section>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
$(document).ready(function() {
    $("#ShippingForm").submit(function(event) {
        var isValid = true;

        // Clear previous error messages
        $('.address_one_error').html("");
        $('.address_two_error').html("");
        $('.city_error').html("");

        // Validate Address
        var addressOne = $("#address_one").val();
        if (addressOne.length > 35) {
            $('.address_one_error').html("Address cannot exceed 35 characters.");
            isValid = false;
        }

        // Validate Apartment, Suite, etc.
        var addressTwo = $("#address_two").val();
        if (addressTwo.length > 35) {
            $('.address_two_error').html("Apartment, Suite, etc. cannot exceed 35 characters.");
            isValid = false;
        }

        // Validate City
        var city = $("#city").val();
        if (city.length > 35) {
            $('.city_error').show();
            $('.city_error').html("City cannot exceed 35 characters.");
            isValid = false;
        }

        // Validate Zip Code
        var zipCode = $("#zip_code").val();
        var zipCodeRegex = /^\d{5}$|^\d{9}$/; // 5 or 9 numerical characters
        if (!zipCodeRegex.test(zipCode)) {
            $('.zip_code_error').show();
            $('.zip_code_error').html("Zip Code must be 5 or 9 numerical characters.");
            isValid = false;
        }else{
            $('.zip_code_error').hide();
        }

        // If any validation fails, prevent form submission
        if (!isValid) {
            event.preventDefault();
        }
    });
});
</script>

@endsection