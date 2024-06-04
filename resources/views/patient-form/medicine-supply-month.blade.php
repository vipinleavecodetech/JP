@extends('layouts.main-patient-form')
@section('main-section')
<?php   
$form_session_id=Session::get('pat_uni_id'); 
$data = Illuminate\Support\Facades\DB::table('patient')->where('session_uni_id', $form_session_id)->first();

$subscriptionMonth =  $data->how_many_month_supply;
$medication_name = $data->selector35;
$medications = Illuminate\Support\Facades\DB::table('manage_preference')->where('medication_name', $medication_name)->first();
if ($medications) {
    $one_month_discount = $medications->price;
    $three_month_discount_one = $medications->price * 15 / 100;
    $three_month_discount = number_format($medications->price - $three_month_discount_one, 2);
    $six_month_discount_one = $medications->price * 20 / 100;
    $six_month_discount = number_format($medications->price - $six_month_discount_one, 2);
    $twelve_month_discount_one = $medications->price * 40 / 100;
    $twelve_month_discount = number_format($medications->price - $twelve_month_discount_one, 2);
} else {
    // Handle the case where no medication is found
}
?>
<section class="main-sects">
      <div class="container">
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-6">
            <div class="para-1">
              <h3>How many month(s) supply would you like ?</h3>
              <p>Save 40% by ordering a 12-month supply</p>
            </div>
            <div class="col-md-3"></div>
          </div>
        </div>
    </section>
    <section class="main-sects">
      <div class="container">
        <div class="row">
               <div class="col-md-3"></div>
     
       
          <div class="col-md-6 info-mid">
                  <form id="month_supply" name="month_supply" method="post" action="{{ route('orderSummary') }}">
             @csrf
           <input type="hidden" value={{$form_session_id}} name="session_uni_id">
            <div class="border-boxs-x">
              <div class="icon">
               <input type="radio" id="a-option41" value="3 Month" name="how_many_month_supply" <?php if($subscriptionMonth == '3 Month'){ echo "checked"; }?> >
              </div>
              <div class="buttun">
                <span class="our-most">Most Popular</span>
              </div>
              <h6>3 - <span>Month Supply</span>
              </h6>
              <p>Select a 3 month supply for 90 tablets of Genetic Cialis Daily.</p>
              <h5>
                <b>${{ $three_month_discount }}/Pill </b>
                <span>
                  <del>${{$medications->price}}</del>
                </span>
              </h5>
              <div class="buttun-1">
                <button>Save 15% Off</button>
              </div>
            </div>
            <div class="col-md-12 p-0">
              <div class="row p-0">
                <div class="col-md-6">
                  <div class="border-boxs-x">
                    <div class="icon">
                      <input type="radio" id="b-option41" value="1 Month" name="how_many_month_supply" <?php if($subscriptionMonth == '1 Month'){ echo "checked"; }?>>
                    </div>
                    <h6>1 - <span>Month Supply</span>
                    </h6>
                    <p>Select a 1 month supply for 30 tablets of Genetic Cialis Daily.</p>
                    <h5>
                      <b>${{ $medications->price }}/Pill </b>
                    </h5>
                    <div class="buttun-1">
                      <button>Save 0% Off</button>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="border-boxs-x">
                    <div class="icon">
                      <input type="radio" id="c-option41" value="6 Month" name="how_many_month_supply" <?php if($subscriptionMonth == '6 Month'){ echo "checked"; }?>>
                    </div>
                    <h6>6 - <span>Month Supply</span>
                    </h6>
                    <p>Select a 6 month supply for 180 tablets of Genetic Cialis Daily.</p>
                    <h5>
                      <b>${{$six_month_discount}}/Pill</b>
                      <span>
                          <del>${{ $medications->price }}</del>
                      </span>
                    </h5>
                    <div class="buttun-1">
                      <button>Save 20% Off</button>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="border-boxs-x">
                    <div class="icon">
                     <input type="radio" id="d-option41" value="12 Month" name="how_many_month_supply" <?php if($subscriptionMonth == '12 Month'){ echo "checked"; }?>>
                    </div>
                    <h6>12 - <span>Month Supply</span>
                    </h6>
                    <p>Select a 12 month supply for 360 tablets of Genetic Cialis Daily.</p>
                    <h5>
                      <b>${{$twelve_month_discount}} /Pill </b>
                      <span>
                        <del>${{ $medications->price }}</del>
                      </span>
                    </h5>
                    <div class="buttun-1">
                      <button>Save 40% Off</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="bt-shop mt-2">
              <div class="col-md-12 text-center p-0">
                <button class="m-auto btn btn-primary" type="submit">NEXT STEP FINALIZE TREATMENT <i class="fa-solid fa-chevron-right"></i>
                </button>
                <button class="m-auto btn btn-primary gray-btn" type="submit">
                  <a href="{{ url()->previous() }}" style="color:#000"><i class="fa-solid fa-chevron-left"></i> PREVIOUS STEP </a></button>
              </div>
            </div>
             </form>
          </div>
          <div class="col-md-3"></div>
         
        </div>
      </div>
    </section>

@endsection