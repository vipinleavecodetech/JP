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
</style>
<script>
// Disable user input on all elements
function disableInputElements() {
  var elements = document.querySelectorAll('input, textarea, select, button');
  elements.forEach(function(element) {
    element.setAttribute('disabled', 'true');
  });
}
window.onload = disableInputElements;
</script>
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
<?php //echo "<pre>"; print_r($patient); echo "</pre>";die();?>
    <div class="content">
       <div class="container-fluid">
          <!-- start page title -->
          <div class="row">
             <div class="col-12">
                <div class="page-title-box" style="display:block">
                   <div class="page-title-right">
                      <ol class="breadcrumb m-0">
                         <li class="breadcrumb-item">
                             <a href="{{ url('/') }}" class="logo-dark">
                                      <span class="logo-sm">
                                         <img src="{{ url('public/quiz-assets/images/logo.svg') }}" alt="" height="24" >
                                      </span>
                                   </a></li>
                         <!-- <li class="breadcrumb-item active">Quiz</li> -->
                      </ol>
                   </div>
                   @if(Auth::check())
                   <h4 class="page-title"><button class="btn btn-success" onclick="history.back()">Go Back</button></h4>
                   @else
                   <h4 class="page-title">Quiz</h4>
                   @endif
                </div>
             </div>
          </div>
          <!-- end page title -->  
                     <?php
                     if(count($prescription_detail)>0)
                     { ?>
                    <div class="container-fluid cust_pres">
                        <div class="row">
                            <div class="col-lg-12">
                                <p><b>Your Prescription</b></p>
                                @foreach($prescription_detail as $prescription_details)
                                <div class="pres_detail">
                                    <p class="created_date">{{ $prescription_details->created_at; }}</p>
                                    <p class="prescription_detail">{{ strip_tags($prescription_details->prescription_detail); }}</p>
                                </div>
                                @endforeach
                               
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    
                   <form id="msform" class="full-size" action="{{ route('admin.patients.patiantUpdate', $patient->id) }}" method="post" enctype="multipart/form-data">
                       @csrf
                      <!-- progressbar -->
                      <!-- fieldsets -->
                      <div class="row">
                         <div class="col-sm-6">
                         <h2 class="fs-title mb-4">What's your first name?</h2>
                               <input type="text" name="fname" value="{{ $patient->fname ?? '' }}">
                         </div>
                       <div class="col-sm-6">
                         <h2 class="fs-title mb-4">What's your Last name?</h2>
                               <input type="text" name="lname" value="{{ $patient->lname ?? '' }}">

                      </div>

                       <div class="col-sm-6">
                         <h2 class="fs-title mb-4">Please enter the phone number </h2>
                               <input type="tel" name="phone" value="{{ $patient->phone ?? '' }}">
                      </div>

                      <div class="col-sm-6">
                         <h2 class="fs-title mb-4">What's your Email Address</h2>
                               <input type="email" name="email" value="{{ $patient->email ?? '' }}">

                      </div>


                      <div class="col-12">
                         <h2 class="fs-title">What is your gender?</h2>
                         <h3 class="fs-subtitle">Sex assigned at birth (Male or Female)</h3>
                         <ul class="row radio-boxs mlr-0">
                            <div class="col-sm-6">
                               <li>
                                  <input type="radio" id="f-gender" name="gender" value="Male" <?php if($patient->gender == 'Male'){ echo 'checked'; } ?>>
                                  <label for="f-gender">Male</label>
                                  <div class="check"></div>
                               </li>
                            </div>
                            <div class="col-sm-6">
                                  <li>
                                  <input type="radio" id="s-gender" name="gender" value="Female" <?php if($patient->gender == 'Female'){ echo 'checked'; } ?>>
                                  <label for="s-gender">Female</label>
                                  <div class="check">
                                     <div class="inside"></div>
                                  </div>
                               </li>
                            </div>
                         </ul>
                          
                         
                      </div>
                         <div class="col-12">
                         <h2 class="fs-title mb-4">What is your date of birth?</h2>
                         <div class="row">
                            <div class="col-md-4">
                               <input type="text" name="month" value="{{ $patient->month ?? '' }}" placeholder="Month">
                            </div>
                            <div class="col-md-4">
                               <input type="text" name="day" value="{{ $patient->day ?? '' }}" placeholder="Day">
                            </div>
                            <div class="col-md-4">
                               <input type="text" name="year" value="{{ $patient->year ?? '' }}" placeholder="Year">
                            </div>
                         </div>
                      </div>
                    

                      <div class="col-12">
                         <h2 class="fs-title">How did your ED begin? Select the one that best describes your ED. </h2>
                         <!-- <h3 class="fs-subtitle">Your answers are kept 100% safe & private.</h3> -->
                         <ul class="row radio-boxs mlr-0">
                            <div class="col-sm-6">
                               <li>
                                  <input type="radio" id="f-option1" name="selector1" value="Gradually but has worsened overtime" <?php if($patient->selector1 == 'Gradually but has worsened overtime'){ echo 'checked'; } ?>>
                                  <label for="f-option1">Gradually but has worsened overtime </label>
                                  <div class="check"></div>
                               </li>
                            </div>
                            <div class="col-sm-6">
                               <li>
                                  <input type="radio" id="s-option1" name="selector1" value="Suddenly, with a new partner" <?php if($patient->selector1 == 'Suddenly, with a new partner'){ echo 'checked'; } ?>>
                                  <label for="s-option1">Suddenly, with a new partner </label>
                                  <div class="check">
                                     <div class="inside"></div>
                                  </div>
                               </li>
                            </div>
                            <div class="col-sm-6">
                               <li>
                                  <input type="radio" id="t-option1" name="selector1" value="Suddenly, with same partner" <?php if($patient->selector1 == 'Suddenly, with same partner'){ echo 'checked'; } ?>>
                                  <label for="t-option1">Suddenly, with same partner </label>
                                  <div class="check">
                                     <div class="inside"></div>
                                  </div>
                               </li>
                            </div>
                            <div class="col-sm-6">
                               <li>
                                  <input type="radio" id="g-option1" name="selector1" value="I do not recall" <?php if($patient->selector1 == 'I do not recall'){ echo 'checked'; } ?>>
                                  <label for="g-option1">I do not recall </label>
                                  <div class="check">
                                     <div class="inside"></div>
                                  </div>
                               </li>
                            </div>
                         </ul>
                      </div>

                       <div class="col-12">
                         <h2 class="fs-title">What effect, if any, has your sex problems had on your partner relationships? </h2>
                         <!-- <h3 class="fs-subtitle">Your answers are kept 100% safe & private.</h3> -->
                         <ul class="row radio-boxs mlr-0">
                            <div class="col-sm-6">
                            <li>
                               <input type="radio" id="f-option2" name="selector2" value="No Effect" <?php if($patient->selector2 == 'No Effect'){ echo 'checked'; } ?>>
                               <label for="f-option2">No Effect  </label>
                               <div class="check"></div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="radio" id="s-option2" name="selector2" value="Little effect" <?php if($patient->selector2 == 'Little effect'){ echo 'checked'; } ?>>
                               <label for="s-option2">Little effect  </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="radio" id="t-option2" name="selector2" value="Moderate effect" <?php if($patient->selector2 == 'Moderate effect'){ echo 'checked'; } ?>>
                               <label for="t-option2">Moderate effect  </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="radio" id="g-option2" name="selector2" value="Large effect" <?php if($patient->selector2 == 'Large effect'){ echo 'checked'; } ?>>
                               <label for="g-option2">Large effect </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         </ul>
                      </div>


                       <div class="col-12">
                         <h2 class="fs-title">How satisfied have you been with your sex life in the past 6 months? </h2>
                         <!-- <h3 class="fs-subtitle">Your answers are kept 100% safe & private.</h3> -->
                         <ul class="row radio-boxs mlr-0">
                            <div class="col-sm-6">
                            <li>
                               <input type="radio" id="f-option3" name="selector3" value="Not at all" <?php if($patient->selector3 == 'Not at all'){ echo 'checked'; } ?>>
                               <label for="f-option3">Not at all  </label>
                               <div class="check"></div>
                            </li>
                         </div>
                            <div class="col-sm-6">
                            <li>
                               <input type="radio" id="s-option3" name="selector3" value="A little bit" <?php if($patient->selector3 == 'A little bit'){ echo 'checked'; } ?>>
                               <label for="s-option3">A little bit   </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>

                            <div class="col-sm-6">
                            <li>
                               <input type="radio" id="t-option3" name="selector3" value="Somewhat" <?php if($patient->selector3 == 'Somewhat'){ echo 'checked'; } ?>>
                               <label for="t-option3">Somewhat   </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>

                            <div class="col-sm-6">
                             <li>
                               <input type="radio" id="h-option3" name="selector3" value="Quiet a bit" <?php if($patient->selector3 == 'Quiet a bit'){ echo 'checked'; } ?>>
                               <label for="h-option3">Quiet a bit </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>

                            <div class="col-sm-6">
                            <li>
                               <input type="radio" id="g-option3" name="selector3" value="Very" <?php if($patient->selector3 == 'Very'){ echo 'checked'; } ?>>
                               <label for="g-option3">Very  </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         </ul>
                          
                         
                      </div>

                      
                      <div class="col-12">
                         <h2 class="fs-title">Do you have any of the following medical conditions?  </h2>
                         <h3 class="fs-subtitle">Select all that apply:</h3>
                         <ul class="radio-boxs checkbox_boxs row mlr-0">
                            <div class="col-sm-6">
                            <li>
                               <input type="checkbox" id="a-option4" name="selector4[]" value="Heart disease" <?php foreach(json_decode($patient->selector4) as $selector4){ if($selector4 == 'Heart disease'){ echo 'checked'; }  } ?>>
                               <label for="a-option4">Heart disease </label>
                               <div class="check"></div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="checkbox" id="b-option4" name="selector4[]" value="Diabetes" <?php foreach(json_decode($patient->selector4) as $selector4){ if($selector4 == 'Diabetes'){ echo 'checked'; }  }?>>
                               <label for="b-option4">Diabetes   </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="checkbox" id="c-option4" name="selector4[]" value="Hyperlipidemia" <?php foreach(json_decode($patient->selector4) as $selector4){ if($selector4 == 'Hyperlipidemia'){ echo 'checked'; }  }?>>
                               <label for="c-option4"> Hyperlipidemia   </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                             <li>
                               <input type="checkbox" id="d-option4" name="selector4[]" value="Vascular disease" <?php foreach(json_decode($patient->selector4) as $selector4){ if($selector4 == 'Vascular disease'){ echo 'checked'; }  }?>>
                               <label for="d-option4">Vascular disease</label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="checkbox" id="e-option4" name="selector4[]" value="Emotional problems" <?php foreach(json_decode($patient->selector4) as $selector4){ if($selector4 == 'Emotional problems'){ echo 'checked'; }  }?>>
                               <label for="e-option4">Emotional problems  </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="checkbox" id="f-option4" name="selector4[]" value="Kidney disease" <?php foreach(json_decode($patient->selector4) as $selector4){ if($selector4 == 'Kidney disease'){ echo 'checked'; }  }?>>
                               <label for="f-option4">Kidney disease  </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="checkbox" id="g-option4" name="selector4[]" value="Trauma or injury to: penis, pelvis, perineum, testes, or rectum" <?php foreach(json_decode($patient->selector4) as $selector4){ if($selector4 == 'Trauma or injury to: penis, pelvis, perineum, testes, or rectum'){ echo 'checked'; }  }?>>
                               <label for="g-option4">Trauma or injury to: penis, pelvis, perineum, testes, or rectum  </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="checkbox" id="h-option4" name="selector4[]" value="Prostate problems" <?php foreach(json_decode($patient->selector4) as $selector4){ if($selector4 == 'Prostate problems'){ echo 'checked'; }  }?>>
                               <label for="h-option4">Prostate problems </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="checkbox" id="i-option4" name="selector4[]" value="Urinary problems" <?php foreach(json_decode($patient->selector4) as $selector4){ if($selector4 == 'Urinary problems'){ echo 'checked'; }  }?>>
                               <label for="i-option4">Urinary problems  </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="checkbox" id="j-option4" name="selector4[]" value="Sleep apnea" <?php foreach(json_decode($patient->selector4) as $selector4){ if($selector4 == 'Sleep apnea'){ echo 'checked'; }  }?>>
                               <label for="j-option4">Sleep apnea  </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="checkbox" id="k-option4" name="selector4[]" value="Chronic fatigue or weakness" <?php foreach(json_decode($patient->selector4) as $selector4){ if($selector4 == 'Chronic fatigue or weakness'){ echo 'checked'; }  }?>>
                               <label for="k-option4">Chronic fatigue or weakness  </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="checkbox" id="l-option4" name="selector4[]" value="Joint pains" <?php foreach(json_decode($patient->selector4) as $selector4){ if($selector4 == 'Joint pains'){ echo 'checked'; }  }?>>
                               <label for="l-option4">Joint pains </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="checkbox" id="m-option4" name="selector4[]" value="None of the above" <?php foreach(json_decode($patient->selector4) as $selector4){ if($selector4 == 'None of the above'){ echo 'checked'; }  }?>>
                               <label for="m-option4">None of the above  </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="checkbox" id="n-option4" name="selector4[]" value="Other" <?php foreach(json_decode($patient->selector4) as $selector4){ if($selector4 == 'Other'){ echo 'checked'; } }?>>
                               <label for="n-option4">Other   </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                          <li class="cust_opt_design cust_4opt" style="display: none;">
                               <h3 class=" fs-subtitle n-option4txt">Please list your other medical conditions:</h3>
                                <textarea id="n_option4_textarea4" name="n_option4_textarea4" class="form-control textarea4">{{ $patient->n_option4_textarea4 ?? '' }}</textarea>
                           </li>
                        </div>
                     </ul>
                      </div>


                      <div class="col-12">
                         <h2 class="fs-title">Have you seen your primary care doctor within the past 3 years?  </h2>
                         <!-- <h3 class="fs-subtitle">Your answers are kept 100% safe & private.</h3> -->
                         <ul class="radio-boxs row mlr-0">
                            <div class="col-sm-6">
                            <li>
                               <input type="radio" id="f-option5" name="selector5" value="Yes" <?php if($patient->selector5 == 'Yes'){ echo 'checked'; }?>>
                               <label for="f-option5">Yes   </label>
                               <div class="check"></div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="radio" id="s-option5" name="selector5" value="No" <?php if($patient->selector5 == 'No'){ echo 'checked'; }?>>
                               <label for="s-option5">No    </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                          </div>
                         </ul>
                      </div>


                      <div class="col-12">
                         <h2 class="fs-title">Are all of your medical issues being appropriately treated by your primary care provider?   </h2>
                         <!-- <h3 class="fs-subtitle">Your answers are kept 100% safe & private.</h3> -->
                         <ul class="radio-boxs row mlr-0">
                            <div class="col-sm-6">
                            <li>
                               <input type="radio" id="f-option6" name="selector6" value="Yes" <?php if($patient->selector6 == 'Yes'){ echo 'checked'; }?>>
                               <label for="f-option6">Yes </label>
                               <div class="check"></div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="radio" id="s-option6" name="selector6" value="No" <?php if($patient->selector6 == 'No'){ echo 'checked'; }?>>
                               <label for="s-option6">No</label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                            <li class="cust_opt_design cust_6opt" style="display: none;">
                               <h3 class=" fs-subtitle n-option6txt">Please explain your medical issues not currently being treated by your primary care provider</h3>
                               <textarea id="n_option6_textarea6" name="n_option6_textarea6" class="form-control textarea4 ">{{ $patient->n_option6_textarea6 ?? '' }}</textarea>
                           </li>
                        </div>
                         </ul>
                      </div>


                        <div class="col-12">
                         <h2 class="fs-title">With sexual stimulation can you…?  </h2>
                         <!-- <h3 class="fs-subtitle">Your answers are kept 100% safe & private.</h3> -->
                         <ul class="radio-boxs row mlr-0">
                            <div class="col-sm-6">
                            <li>
                               <input type="radio" id="a-option7" name="selector7" value="Initiate an erection" <?php if($patient->selector7 == 'Initiate an erection'){ echo 'checked'; }?>>
                               <label for="a-option7">Initiate an erection    </label>
                               <div class="check"></div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="radio" id="b-option7" name="selector7" value="Maintain an erection" <?php if($patient->selector7 == 'Maintain an erection'){ echo 'checked'; }?>>
                               <label for="b-option7">Maintain an erection     </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                             <li>
                               <input type="radio" id="c-option7" name="selector7" value="Neither initiate nor maintain an erection" <?php if($patient->selector7 == 'Neither initiate nor maintain an erection'){ echo 'checked'; }?>>
                               <label for="c-option7">Neither initiate nor maintain an erection     </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                          </div>
                         </ul>
                          
                         
                      </div>

                      <div class="col-12">
                         <h2 class="fs-title">How satisfied are you with the rigidity of your erection during sexual activity?  </h2>
                         <!-- <h3 class="fs-subtitle">Your answers are kept 100% safe & private.</h3> -->
                         <ul class="radio-boxs row mlr-0">
                            <div class="col-sm-6">
                            <li>
                               <input type="radio" id="a-option8" name="selector8" value="Not at all" <?php if($patient->selector8 == 'Not at all'){ echo 'checked'; }?>>
                               <label for="a-option8">Not at all    </label>
                               <div class="check"></div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="radio" id="b-option8" name="selector8" value="A little bit" <?php if($patient->selector8 == 'A little bit'){ echo 'checked'; }?>>
                               <label for="b-option8"> A little bit    </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                             <li>
                               <input type="radio" id="c-option8" name="selector8" value="Somewhat" <?php if($patient->selector8 == 'Somewhat'){ echo 'checked'; }?>>
                               <label for="c-option8">Somewhat     </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                             <li>
                               <input type="radio" id="d-option8" name="selector8" value="Quite a bit" <?php if($patient->selector8 == 'Quite a bit'){ echo 'checked'; }?>>
                               <label for="d-option8">Quite a bit      </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                             <li>
                               <input type="radio" id="e-option8" name="selector8" value="Very" <?php if($patient->selector8 == 'Very'){ echo 'checked'; }?>>
                               <label for="e-option8"> Very      </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                          </div>
                         </ul>
                      </div>


                      <div class="col-12">
                         <h2 class="fs-title">How satisfied have you been with your ability to keep your erections as long as you wanted over the past six months, in general? </h2>
                         <!-- <h3 class="fs-subtitle">Your answers are kept 100% safe & private.</h3> -->
                         <ul class="radio-boxs row mlr-0">
                            <div class="col-sm-6">
                            <li>
                               <input type="radio" id="a-option9" name="selector9" value="Not at all" <?php if($patient->selector9 == 'Not at all'){ echo 'checked'; }?>>
                               <label for="a-option9">Not at all    </label>
                               <div class="check"></div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="radio" id="b-option9" name="selector9" value="A little bit" <?php if($patient->selector9 == 'A little bit'){ echo 'checked'; }?>>
                               <label for="b-option9"> A little bit    </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                             <li>
                               <input type="radio" id="c-option9" name="selector9" value="Somewhat" <?php if($patient->selector9 == 'Somewhat'){ echo 'checked'; }?>>
                               <label for="c-option9">Somewhat     </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                             <li>
                               <input type="radio" id="d-option9" name="selector9" value="Quite a bit" <?php if($patient->selector9 == 'Quite a bit'){ echo 'checked'; }?>>
                               <label for="d-option9">Quite a bit      </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                             <li>
                               <input type="radio" id="e-option9" name="selector9" value="Very" <?php if($patient->selector9 == 'Very'){ echo 'checked'; }?>>
                               <label for="e-option9"> Very      </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                          </div>
                         </ul>
                          
                         
                      </div>


                      <div class="col-12">
                         <h2 class="fs-title">Have you taken any of the following as treatment for erectile dysfunction?   </h2>
                         <h3 class="fs-subtitle">Select all that apply:</h3>
                         <ul class="radio-boxs checkbox_boxs row mlr-0">
                            <div class="col-sm-6">
                            <li>
                               <input type="checkbox" id="a-option10" name="selector10[]" value="Sildenafil (Viagra)" <?php foreach(json_decode($patient->selector10) as $selector10){if($selector10 == 'Sildenafil (Viagra)'){ echo 'checked'; } }?>>
                               <label for="a-option10">Sildenafil (Viagra) </label>
                               <div class="check"></div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="checkbox" id="b-option10" name="selector10[]" value="Tadalafil (Adcirca, Cialis)" <?php foreach(json_decode($patient->selector10) as $selector10){if($selector10 == 'Tadalafil (Adcirca, Cialis)'){ echo 'checked'; } }?>>
                               <label for="b-option10">Tadalafil (Adcirca, Cialis)   </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="checkbox" id="c-option10" name="selector10[]" value="Vardenafil (Levitra, Staxyn),Avanafil (Stendra)" <?php foreach(json_decode($patient->selector10) as $selector10){if($selector10 == 'Vardenafil (Levitra, Staxyn),Avanafil (Stendra)'){ echo 'checked'; } }?>>
                               <label for="c-option10">Vardenafil (Levitra, Staxyn),Avanafil (Stendra)   </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                             <li>
                               <input type="checkbox" id="d-option10" name="selector10[]" value="Testosterone Replacement" <?php foreach(json_decode($patient->selector10) as $selector10){if($selector10 == 'Testosterone Replacement'){ echo 'checked'; } }?>>
                               <label for="d-option10">Testosterone Replacement</label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="checkbox" id="e-option10" name="selector10[]" value="Injections" <?php foreach(json_decode($patient->selector10) as $selector10){if($selector10 == 'Injections'){ echo 'checked'; } }?>>
                               <label for="e-option10">Injections  </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="checkbox" id="f-option10" name="selector10[]" value="Surgery or use of Pumps" <?php foreach(json_decode($patient->selector10) as $selector10){if($selector10 == 'Surgery or use of Pumps'){ echo 'checked'; } }?>>
                               <label for="f-option10">Surgery or use of Pumps </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="checkbox" id="g-option10" name="selector10[]" value="Shock wave therapy" <?php foreach(json_decode($patient->selector10) as $selector10){if($selector10 == 'Shock wave therapy'){ echo 'checked'; } }?>>
                               <label for="g-option10">Shock wave therapy   </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="checkbox" id="h-option10" name="selector10[]" value="Intraurethural therapy (MUSE)" <?php foreach(json_decode($patient->selector10) as $selector10){if($selector10 == 'Intraurethural therapy (MUSE)'){ echo 'checked'; } }?>>
                               <label for="h-option10">Intraurethural therapy (MUSE) </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                          </div>
                          <div class="col-sm-6">
                               <li>
                               <input type="checkbox" id="i-option10" name="selector10[]" value="Other Treatment" <?php foreach(json_decode($patient->selector10) as $selector10){if($selector10 == 'Other Treatment'){ echo 'checked'; } }?>>
                               <label for="i-option10">Other Treatment: Please list and describe:  </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>

                               <textarea value="" id="i_option10_textarea10" name="i_option10_textarea10" class="form-control textarea10 hide">{{ $patient->i_option10_textarea10 ?? '' }}</textarea>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="checkbox" id="j-option10" name="selector10[]" value="No I have never used any medication, supplement or behavioral modification to treat ED" <?php foreach(json_decode($patient->selector10) as $selector10){if($selector10 == 'No I have never used any medication, supplement or behavioral modification to treat ED'){ echo 'checked'; } }?>>
                               <label for="j-option10">No I have never used any medication, supplement or behavioral modification to treat ED  </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                          </ul>
                          
                         
                      </div>


                       <div class="col-12">
                         <h2 class="fs-title mb-4">If you have had treatment listed above for ED, please explain for each if the treatment was effective and provide dosage if applicable. Write NA if it does not apply to you. </h2>
                        <textarea value="" name="selector11" id="a-option11" class="form-control textarea11">{{ $patient->selector11 ?? '' }}</textarea>
                      </div>

                       <div class="col-12">
                         <h2 class="fs-title">Are you on any medications? Include any medicines (e.g., Lipitor, Zyrtec, ibuprofen), herbs, vitamins, or dietary supplements that you have taken in the past 2 weeks, even if you are not taking them today. </h2>
                         <!-- <h3 class="fs-subtitle">Your answers are kept 100% safe & private.</h3> -->
                         <ul class="radio-boxs row mlr-0">
                            <div class="col-sm-6">
                            <li>
                               <input type="radio" id="a-option12" name="selector12" value="No" <?php if($patient->selector12 == 'No'){ echo 'checked'; }?>>
                               <label for="a-option12">No </label>
                               <div class="check"></div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="radio" id="b-option12" name="selector12" value="Yes" <?php if($patient->selector12 == 'Yes'){ echo 'checked'; }?>>
                               <label for="b-option12">Yes</label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                            <li class="cust_opt_design cust_12opt" style="display: none;">
                               <h3 class=" fs-subtitle n-option12txt">Please list the current medications that you are taking</h3>
                               <textarea id="n_option12_textarea12" name="n_option12_textarea12" class="form-control textarea12 ">{{ $patient->n_option12_textarea12 ?? '' }}</textarea>
                           </li>
                        </div>
                         </ul>
                          
                         
                      </div>


                    <div class="col-12">
                         <h2 class="fs-title">Do you have any allergies? Include any allergies to food, dyes, prescription or over-the-counter medicines (e.g., antibiotics, allergy medications), herbs, vitamins, supplements, or anything else.</h2>
                         <!-- <h3 class="fs-subtitle">Your answers are kept 100% safe & private.</h3> -->
                         <ul class="radio-boxs row mlr-0">
                            <div class="col-sm-6">
                            <li>
                               <input type="radio" id="a-option13" name="selector13" value="Yes, please explain" <?php if($patient->selector13 == 'Yes, please explain'){ echo 'checked'; }?>>
                               <label for="a-option13">Yes, please explain</label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                            <li class="cust_opt_design cust_13opt" style="display: none;">
                               <h3 class=" fs-subtitle n-option13txt">Please list the current medications that you are taking</h3>
                               <textarea value="" id="n_option13_textarea13" name="n_option13_textarea13" class="form-control textarea4 ">{{ $patient->n_option13_textarea13 ?? '' }}</textarea>
                           </li>
                        </div>
                        <div class="col-sm-6">
                            <li>
                               <input type="radio" id="b-option13" name="selector13" value="No" <?php if($patient->selector13 == 'No'){ echo 'checked'; }?>>
                               <label for="b-option13">No </label>
                               <div class="check"></div>
                            </li>                                 
                            </div>
                         </ul>
                          
                         
                      </div>


                      <div class="col-12">
                         <h2 class="fs-title">In the last three months, have you taken any of the following drugs?  </h2>
                         <h3 class="fs-subtitle">Select all that apply:</h3>
                         <ul class="radio-boxs checkbox_boxs row mlr-0">
                            <div class="col-sm-6">
                            <li>
                               <input type="checkbox" id="a-option14" name="selector14[]" value="Clarithromycin" <?php foreach(json_decode($patient->selector14) as $selector14){if($selector14 == 'Clarithromycin'){ echo 'checked'; } }?>>
                               <label for="a-option14">Clarithromycin</label>
                               <div class="check"></div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="checkbox" id="b-option14" name="selector14[]" value="Diltiazem" <?php foreach(json_decode($patient->selector14) as $selector14){if($selector14 == 'Diltiazem'){ echo 'checked'; } }?>>
                               <label for="b-option14">Diltiazem </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="checkbox" id="c-option14" name="selector14[]" value="Erythromycin" <?php foreach(json_decode($patient->selector14) as $selector14){if($selector14 == 'Erythromycin'){ echo 'checked'; } }?>>
                               <label for="c-option14">Erythromycin </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                             <li>
                               <input type="checkbox" id="d-option14" name="selector14[]" value="Itraconazole" <?php foreach(json_decode($patient->selector14) as $selector14){if($selector14 == 'Itraconazole'){ echo 'checked'; } }?>>
                               <label for="d-option14">Itraconazole</label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="checkbox" id="e-option14" name="selector14[]" value="Ketoconazole" <?php foreach(json_decode($patient->selector14) as $selector14){if($selector14 == 'Ketoconazole'){ echo 'checked'; } }?>>
                               <label for="e-option14">Ketoconazole  </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="checkbox" id="f-option14" name="selector14[]" value="Ritonavir" <?php foreach(json_decode($patient->selector14) as $selector14){if($selector14 == 'Ritonavir'){ echo 'checked'; } }?>>
                               <label for="f-option14">Ritonavir </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="checkbox" id="g-option14" name="selector14[]" value="Verapamil" <?php foreach(json_decode($patient->selector14) as $selector14){if($selector14 == 'Verapamil'){ echo 'checked'; } }?>>
                               <label for="g-option14">Verapamil   </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="checkbox" id="h-option14" name="selector14[]" value="Doxazosin mesylate (Cardura)" <?php foreach(json_decode($patient->selector14) as $selector14){if($selector14 == 'Doxazosin mesylate (Cardura)'){ echo 'checked'; } }?>>
                               <label for="h-option14">Doxazosin mesylate (Cardura) </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                          </div>
                          <div class="col-sm-6">
                            <li>
                               <input type="checkbox" id="i-option14" name="selector14[]" value="Prazosin hydrochloride (Minipress)" <?php foreach(json_decode($patient->selector14) as $selector14){if($selector14 == 'Prazosin hydrochloride (Minipress)'){ echo 'checked'; } }?>>
                               <label for="i-option14">Prazosin hydrochloride (Minipress)  </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                           
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="checkbox" id="j-option14" name="selector14[]" value="Terazosin hydrochloride (Hytrin)" <?php foreach(json_decode($patient->selector14) as $selector14){if($selector14 == 'Terazosin hydrochloride (Hytrin)'){ echo 'checked'; } }?>>
                               <label for="j-option14">Terazosin hydrochloride (Hytrin) </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                             <li>
                               <input type="checkbox" id="k-option14" name="selector14[]" value="Hormones" <?php foreach(json_decode($patient->selector14) as $selector14){if($selector14 == 'Hormones'){ echo 'checked'; } }?>>
                               <label for="k-option14">Hormones </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                             <li>
                               <input type="checkbox" id="l-option14" name="selector14[]" value="Sedatives" <?php foreach(json_decode($patient->selector14) as $selector14){if($selector14 == 'Sedatives'){ echo 'checked'; } }?>>
                               <label for="l-option14">Sedatives </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                             <li>
                               <input type="checkbox" id="m-option14" name="selector14[]" value="Ulcer medications" <?php foreach(json_decode($patient->selector14) as $selector14){if($selector14 == 'Ulcer medications'){ echo 'checked'; } }?>>
                               <label for="m-option14">Ulcer medications</label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                             <li>
                               <input type="checkbox" id="n-option14" name="selector14[]" value="None of the above" <?php foreach(json_decode($patient->selector14) as $selector14){if($selector14 == 'None of the above'){ echo 'checked'; } }?>>
                               <label for="n-option14">None of the above </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                          </ul>
                          
                         
                      </div>


                        <div class="col-12">
                         <h2 class="fs-title mb-4">If said yes to any of the drugs in question 13, please provide more details for each:  </h2>
                        <textarea value="" name="selector15" id="a-option15" class="form-control textarea15">{{ $patient->selector15 ?? '' }}</textarea>
                      </div>


                       <div class="col-12">
                         <h2 class="fs-title">Have you ever been prescribed nitrates/nitroglycerin? </h2>
                         <!-- <h3 class="fs-subtitle">Your answers are kept 100% safe & private.</h3> -->
                         <ul class="radio-boxs row mlr-0">
                            <div class="col-sm-6">
                            <li>
                               <input type="radio" id="a-option16" name="selector16" value="No" <?php if($patient->selector16 == 'No'){ echo 'checked'; }?>>
                               <label for="a-option16">No </label>
                               <div class="check"></div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="radio" id="b-option16" name="selector16" value="Yes" <?php if($patient->selector16 == 'Yes'){ echo 'checked'; }?>>
                               <label for="b-option16">Yes</label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                            <li class="cust_opt_design cust_16opt" style="display: none;">
                               <h3 class=" fs-subtitle n-option16txt">Please provide as much detail as possible. When was the last time you were prescribed nitrates/nitroglycerin? </h3>
                               <textarea value="" id="n_option16_textarea16" name="n_option16_textarea16" class="form-control textarea16 ">{{ $patient->n_option16_textarea16 ?? '' }}</textarea>
                           </li>
                        </div>
                         </ul>
                          
                         
                      </div>


                       <div class="col-12">
                         <h2 class="fs-title">In the past several months, have you had any of the following: </h2>
                         <h3 class="fs-subtitle">Select all that apply:</h3>
                         <ul class="radio-boxs checkbox_boxs row mlr-0">
                            <div class="col-sm-6">
                            <li>
                               <input type="checkbox" id="a-option17" name="selector17[]" value="Chest Pain" <?php foreach(json_decode($patient->selector17) as $selector17){if($selector17 == 'Chest Pain'){ echo 'checked'; } }?>>
                               <label for="a-option17">Chest Pain</label>
                               <div class="check"></div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="checkbox" id="b-option17" name="selector17[]" value="Passing Out" <?php foreach(json_decode($patient->selector17) as $selector17){if($selector17 == 'Yes'){ echo 'Passing Out'; } }?>>
                               <label for="b-option17">Passing Out </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="checkbox" id="c-option17" name="selector17[]" value="Dizziness/Seizure" <?php foreach(json_decode($patient->selector17) as $selector17){if($selector17 == 'Dizziness/Seizure'){ echo 'checked'; } }?>>
                               <label for="c-option17">Dizziness/Seizure </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                             <li>
                               <input type="checkbox" id="d-option17" name="selector17[]" value="Shortness of breath or trouble breathing" <?php foreach(json_decode($patient->selector17) as $selector17){if($selector17 == 'Shortness of breath or trouble breathing'){ echo 'checked'; } }?>>
                               <label for="d-option17">Shortness of breath or trouble breathing </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="checkbox" id="e-option17" name="selector17[]" value="Abnormal heartbeat" <?php foreach(json_decode($patient->selector17) as $selector17){if($selector17 == 'Abnormal heartbeat'){ echo 'checked'; } }?>>
                               <label for="e-option17">Abnormal heartbeat   </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="checkbox" id="f-option17" name="selector17[]" value="None of the above" <?php foreach(json_decode($patient->selector17) as $selector17){if($selector17 == 'None of the above'){ echo 'checked'; } }?>>
                               <label for="f-option17">None of the above </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                            </ul>
                          
                         
                      </div>


                      <div class="col-12">
                         <h2 class="fs-title">Have you had any surgeries?</h2>
                         <!-- <h3 class="fs-subtitle">Your answers are kept 100% safe & private.</h3> -->
                         <ul class="radio-boxs row mlr-0">
                            <div class="col-sm-6">
                            <li>
                               <input type="radio" id="a-option18" name="selector18" value="No" <?php if($patient->selector18 == 'No'){ echo 'checked'; }?>>
                               <label for="a-option18">No </label>
                               <div class="check"></div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="radio" id="b-option18" name="selector18" value="Yes" <?php if($patient->selector18 == 'Yes'){ echo 'checked'; }?>>
                               <label for="b-option18">Yes</label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                            <li class="cust_opt_design cust_18opt" style="display: none;">
                               <h3 class=" fs-subtitle n-option18txt">Please list all surgeries you've had</h3>
                               <textarea value="" id="n_option18_textarea18" name="n_option18_textarea18" class="form-control textarea18 ">{{ $patient->n_option18_textarea18 ?? '' }}</textarea>
                           </li>
                        </div>
                         </ul>
                          
                         
                      </div>


                       <div class="col-12">
                         <h2 class="fs-title">Is there a family history of any of the following?</h2>
                         <!-- <h3 class="fs-subtitle">Your answers are kept 100% safe & private.</h3> -->
                         <ul class="radio-boxs row mlr-0">
                            <div class="col-sm-6">
                            <li>
                               <input type="radio" id="a-option19" name="selector19" value="Cardiovascular disease" <?php if($patient->selector19 == 'Cardiovascular disease'){ echo 'checked'; }?>>
                               <label for="a-option19">Cardiovascular disease</label>
                               <div class="check"></div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="radio" id="b-option19" name="selector19" value="Unexplained sudden death" <?php if($patient->selector19 == 'Unexplained sudden death'){ echo 'checked'; }?>>
                               <label for="b-option19">Unexplained sudden death</label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="radio" id="c-option19" name="selector19" value="None of the above" <?php if($patient->selector19 == 'None of the above'){ echo 'checked'; }?>>
                               <label for="c-option19">None of the above</label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         </ul>
                          
                         
                      </div>

                      <div class="col-12">
                         <h2 class="fs-title mb-4">If answered A or B for question 18, please provide more detail below. If you chose C, please write NA.  </h2>
                         <h3 class="fs-subtitle">Please provide details of family history of cardiovascular disease or unexplained sudden death (family members, relationship, age of onset)</h3>
                        <textarea value="" name="selector20" id="a-option20" class="form-control textarea20">{{ $patient->selector20 ?? '' }}</textarea>
                      </div>

                       <div class="col-12">
                         <h2 class="fs-title">Over the past two weeks how often have felt little or no pleasure in activities you usually enjoy?</h2>
                         <!-- <h3 class="fs-subtitle">Your answers are kept 100% safe & private.</h3> -->
                         <ul class="radio-boxs row mlr-0">
                            <div class="col-sm-6">
                            <li>
                               <input type="radio" id="a-option21" name="selector21" value="Not at all" <?php if($patient->selector21 == 'Not at all'){ echo 'checked'; }?>>
                               <label for="a-option21">Not at all</label>
                               <div class="check"></div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="radio" id="b-option21" name="selector21" value="Several days" <?php if($patient->selector21 == 'Several days'){ echo 'checked'; }?>>
                               <label for="b-option21">Several days</label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="radio" id="c-option21" name="selector21" value="More than half the days" <?php if($patient->selector21 == 'More than half the days'){ echo 'checked'; }?>>
                               <label for="c-option21">More than half the days</label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                             <li>
                               <input type="radio" id="d-option21" name="selector21" value="Nearly every day" <?php if($patient->selector21 == 'Nearly every day'){ echo 'checked'; }?>>
                               <label for="d-option21">Nearly every day</label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         </ul>
                          
                         
                      </div>


                      <div class="col-12">
                         <h2 class="fs-title">Over the past two weeks how often have feltdown, depressed, or hopeless?</h2>
                         <!-- <h3 class="fs-subtitle">Your answers are kept 100% safe & private.</h3> -->
                         <ul class="radio-boxs row mlr-0">
                            <div class="col-sm-6">
                            <li>
                               <input type="radio" id="a-option22" name="selector22" value="Not at all" <?php if($patient->selector22 == 'Not at all'){ echo 'checked'; }?>>
                               <label for="a-option22">Not at all</label>
                               <div class="check"></div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="radio" id="b-option22" name="selector22" value="Several days" <?php if($patient->selector22 == 'Several days'){ echo 'checked'; }?>>
                               <label for="b-option22">Several days</label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="radio" id="c-option22" name="selector22" value="More than half the days" <?php if($patient->selector22 == 'More than half the days'){ echo 'checked'; }?>>
                               <label for="c-option22">More than half the days</label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                             <li>
                               <input type="radio" id="d-option22" name="selector22" value="Nearly every day" <?php if($patient->selector22 == 'Nearly every day'){ echo 'checked'; }?>>
                               <label for="d-option22">Nearly every day</label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         </ul>
                          
                         
                      </div>

                      <div class="col-12">
                         <h2 class="fs-title">Over the past two weeks how often have felt nervous, anxious, on edge, or worrying too much? </h2>
                         <!-- <h3 class="fs-subtitle">Your answers are kept 100% safe & private.</h3> -->
                         <ul class="radio-boxs row mlr-0">
                            <div class="col-sm-6">
                            <li>
                               <input type="radio" id="a-option23" name="selector23" value="Not at all" <?php if($patient->selector23 == 'Not at all'){ echo 'checked'; }?>>
                               <label for="a-option23">Not at all</label>
                               <div class="check"></div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="radio" id="b-option23" name="selector23" value="Several days" <?php if($patient->selector23 == 'Several days'){ echo 'checked'; }?>>
                               <label for="b-option23">Several days</label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="radio" id="c-option23" name="selector23" value="More than half the days" <?php if($patient->selector23 == 'More than half the days'){ echo 'checked'; }?>>
                               <label for="c-option23">More than half the days</label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                             <li>
                               <input type="radio" id="d-option23" name="selector23" value="Nearly every day" <?php if($patient->selector23 == 'Nearly every day'){ echo 'checked'; }?>>
                               <label for="d-option23">Nearly every day</label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         </ul>
                          
                         
                      </div>


                      <div class="col-12">
                         <h2 class="fs-title">Which of the following apply to you?  </h2>
                         <h3 class="fs-subtitle">Select all that apply:</h3>
                         <ul class="radio-boxs checkbox_boxs row mlr-0">
                            <div class="col-sm-6">
                            <li>
                               <input type="checkbox" id="a-option24" name="selector24[]" value="I get less than 2 hours of exercise per week" <?php foreach(json_decode($patient->selector24) as $selector24){if($selector24 == 'I get less than 2 hours of exercise per week'){ echo 'checked'; } }?>>
                               <label for="a-option24">I get less than 2 hours of exercise per week</label>
                               <div class="check"></div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="checkbox" id="b-option24" name="selector24[]" value="I do not eat as healthy as I would like" <?php foreach(json_decode($patient->selector24) as $selector24){if($selector24 == 'I do not eat as healthy as I would like'){ echo 'checked'; } }?>>
                               <label for="b-option24">I do not eat as healthy as I would like </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="checkbox" id="c-option24" name="selector24[]" value="I smoke or use tobacco" <?php foreach(json_decode($patient->selector24) as $selector24){if($selector24 == 'I smoke or use tobacco'){ echo 'checked'; } }?>>
                               <label for="c-option24">I smoke or use tobacco (e.g., chewing tobacco, snuff)</label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                             <li>
                               <input type="checkbox" id="d-option24" name="selector24[]" value="I use other nicotine containing products" <?php foreach(json_decode($patient->selector24) as $selector24){if($selector24 == 'I use other nicotine containing products'){ echo 'checked'; } }?>>
                               <label for="d-option24">I use other nicotine containing products (e.g., vaping) </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="checkbox" id="e-option24" name="selector24[]" value="I drink more than 2 alcoholic drinks per day" <?php foreach(json_decode($patient->selector24) as $selector24){if($selector24 == 'I drink more than 2 alcoholic drinks per day'){ echo 'checked'; } }?>>
                               <label for="e-option24">I drink more than 2 alcoholic drinks per day </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="checkbox" id="f-option24" name="selector24[]" value="I get less than 7 hours of sleep per night, on average" <?php foreach(json_decode($patient->selector24) as $selector24){if($selector24 == 'I get less than 7 hours of sleep per night, on average'){ echo 'checked'; } }?>>
                               <label for="f-option24">I get less than 7 hours of sleep per night, on average </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="checkbox" id="g-option24" name="selector24[]" value="I am 20+ pounds overweight" <?php foreach(json_decode($patient->selector24) as $selector24){if($selector24 == 'I am 20+ pounds overweight'){ echo 'checked'; } }?>>
                               <label for="g-option24">I'm 20+ pounds overweight </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="checkbox" id="h-option24" name="selector24[]" value="I am frequently under a lot of stress" <?php foreach(json_decode($patient->selector24) as $selector24){if($selector24 == 'I am frequently under a lot of stress'){ echo 'checked'; } }?>>
                               <label for="h-option24">I am frequently under a lot of stress </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="checkbox" id="i-option24" name="selector24[]" value="None apply to me" <?php foreach(json_decode($patient->selector24) as $selector24){if($selector24 == 'None apply to me'){ echo 'checked'; } }?>>
                               <label for="i-option24">None apply to me</label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                            </ul>
                          
                         
                      </div>


                      <div class="col-12">
                         <h2 class="fs-title">In The Last Three Months, Have You Used Any Of The Following Drugs Recreationally?</h2>
                         <!-- <h3 class="fs-subtitle">Your answers are kept 100% safe & private.</h3> -->
                         <ul class="radio-boxs row mlr-0">
                            <div class="col-sm-6">
                            <li>
                               <input type="radio" id="a-option25" name="selector25" value="Cocaine" <?php if($patient->selector25 == 'Cocaine'){ echo 'checked'; }?>>
                               <label for="a-option25">Cocaine</label>
                               <div class="check"></div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="radio" id="b-option25" name="selector25" value="Poppers or Rush" <?php if($patient->selector25 == 'Poppers or Rush'){ echo 'checked'; }?>>
                               <label for="b-option25">Poppers or Rush</label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="radio" id="c-option25" name="selector25" value="Opiates/Heroin" <?php if($patient->selector25 == 'Opiates/Heroin'){ echo 'checked'; }?>>
                               <label for="c-option25">Opiates/Heroin</label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                             <li>
                               <input type="radio" id="d-option25" name="selector25" value="Methamphetamine" <?php if($patient->selector25 == 'Methamphetamine'){ echo 'checked'; }?>>
                               <label for="d-option25">Methamphetamine</label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                              <li>
                               <input type="radio" id="e-option25" name="selector25" value="Molly (MDMA)" <?php if($patient->selector25 == 'Molly (MDMA)'){ echo 'checked'; }?>>
                               <label for="e-option25">Molly (MDMA)</label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="radio" id="f-option25" name="selector25" value="Other" <?php if($patient->selector25 == 'Other'){ echo 'checked'; }?>>
                               <label for="f-option25">Other</label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                             <li class="cust_opt_design cust_25opt" style="display: none;">
                               <h3 class=" fs-subtitle n-option25txt">Please provide more details here </h3>
                               <textarea value="" id="n_option25_textarea25" name="n_option25_textarea25" class="form-control textarea25 ">{{ $patient->n_option25_textarea25 ?? '' }}</textarea>
                             </li>
                          </div>
                          <div class="col-sm-6">
                              <li>
                               <input type="radio" id="g-option25" name="selector25" value="Other" <?php if($patient->selector25 == 'None'){ echo 'checked'; }?>>
                               <label for="g-option25">None </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         </ul>
                          
                         
                      </div>


                       <div class="col-12">
                         <h2 class="fs-title">Have you had elevated Blood pressure in the past 6 months?</h2>
                         <!-- <h3 class="fs-subtitle">Your answers are kept 100% safe & private.</h3> -->
                         <ul class="radio-boxs row mlr-0">
                            <div class="col-sm-6">
                            <li>
                               <input type="radio" id="a-option26" name="selector26" value="No" <?php if($patient->selector26 == 'No'){ echo 'checked'; }?>>
                               <label for="a-option26">No </label>
                               <div class="check"></div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="radio" id="b-option26" name="selector26" value="Yes" <?php if($patient->selector26 == 'Yes'){ echo 'checked'; }?>>
                               <label for="b-option26">Yes</label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                            <li class="cust_opt_design cust_26opt" style="display: none;">
                               <h3 class=" fs-subtitle n-option26txt">Please provide more details</h3>
                               <textarea id="n_option26_textarea26" name="n_option26_textarea26" class="form-control textarea26 ">{{ $patient->n_option26_textarea26 ?? '' }}</textarea>
                           </li>
                        </div>
                         </ul>
                          
                         
                      </div>


                       <div class="col-12">
                         <h2 class="fs-title">Enter your blood pressure reading taken within the last 6 months</h2>
                         <!-- <h3 class="fs-subtitle">Your answers are kept 100% safe & private.</h3> -->
                         <ul class="radio-boxs row mlr-0">
                            <div class="col-sm-6">
                            <li>
                               <input type="radio" id="a-option27" name="selector27" value="Low – Normal (120/80 or lower)" <?php if($patient->selector27 == 'Low – Normal (120/80 or lower)'){ echo 'checked'; }?>>
                               <label for="a-option27">Low – Normal (120/80 or lower)</label>
                               <div class="check"></div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="radio" id="b-option27" name="selector27" value="Above Normal (121/80 - 129/80)" <?php if($patient->selector27 == 'Above Normal (121/80 - 129/80)'){ echo 'checked'; }?>>
                               <label for="b-option27">Above Normal (121/80 - 129/80)</label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="radio" id="c-option27" name="selector27" value="High (130/80 - 139/89)" <?php if($patient->selector27 == 'High (130/80 - 139/89)'){ echo 'checked'; }?>>
                               <label for="c-option27">High (130/80 - 139/89)</label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                             <li>
                               <input type="radio" id="d-option27" name="selector27" value="Higher (140/90 or greater)" <?php if($patient->selector27 == 'Higher (140/90 or greater)'){ echo 'checked'; }?>>
                               <label for="d-option27">Higher (140/90 or greater)</label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         </ul>
                          
                         
                      </div>


                       <div class="col-12">
                         <h2 class="fs-title">Have you experienced any of the following conditions? </h2>
                         <h3 class="fs-subtitle">Select all that apply:</h3>
                         <ul class="radio-boxs checkbox_boxs row mlr-0">
                            <div class="col-sm-6">
                            <li>
                               <input type="checkbox" id="a-option28" name="selector28[]" value="Enlarged prostate" <?php foreach(json_decode($patient->selector28) as $selector28){if($selector28 == 'Enlarged prostate'){ echo 'checked'; } }?>>
                               <label for="a-option28">Enlarged prostate</label>
                               <div class="check"></div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="checkbox" id="b-option28" name="selector28[]" value="Weight gain / management" <?php foreach(json_decode($patient->selector28) as $selector28){if($selector28 == 'Weight gain / management'){ echo 'checked'; } }?>>
                               <label for="b-option28">Weight gain / management </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="checkbox" id="c-option28" name="selector28[]" value="Sleep / insomnia" <?php foreach(json_decode($patient->selector28) as $selector28){if($selector28 == 'Sleep / insomnia'){ echo 'checked'; } }?>>
                               <label for="c-option28">Sleep / insomnia</label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                             <li>
                               <input type="checkbox" id="d-option28" name="selector28[]" value="Hair loss" <?php foreach(json_decode($patient->selector28) as $selector28){if($selector28 == 'Hair loss'){ echo 'checked'; } }?>>
                               <label for="d-option28">Hair loss </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="checkbox" id="e-option28" name="selector28[]" value="Low testosterone" <?php foreach(json_decode($patient->selector28) as $selector28){if($selector28 == 'Low testosterone'){ echo 'checked'; } }?>>
                               <label for="e-option28">Low testosterone </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="checkbox" id="f-option28" name="selector28[]" value="Blood sugar / diabetes" <?php foreach(json_decode($patient->selector28) as $selector28){if($selector28 == 'Blood sugar / diabetes'){ echo 'checked'; } }?>>
                               <label for="f-option28">Blood sugar / diabetes </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="checkbox" id="g-option28" name="selector28[]" value="Acne / Rosceca / Hyperpigmentation" <?php foreach(json_decode($patient->selector28) as $selector28){if($selector28 == 'Acne / Rosceca / Hyperpigmentation'){ echo 'checked'; } }?>>
                               <label for="g-option28">Acne / Rosceca / Hyperpigmentation </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="checkbox" id="h-option28" name="selector28[]" value="Joint Issues" <?php foreach(json_decode($patient->selector28) as $selector28){if($selector28 == 'Joint Issues'){ echo 'checked'; } }?>>
                               <label for="h-option28">Joint Issues</label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="checkbox" id="i-option28" name="selector28[]" value="Toe nail fungus" <?php foreach(json_decode($patient->selector28) as $selector28){if($selector28 == 'Toe nail fungus'){ echo 'checked'; } }?>>
                               <label for="i-option28">Toe nail fungus</label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                            </div>
                            <div class="col-sm-6">
                              <li>
                               <input type="checkbox" id="j-option28" name="selector28[]" value="Pain management" <?php foreach(json_decode($patient->selector28) as $selector28){if($selector28 == 'Pain management'){ echo 'checked'; } }?>>
                               <label for="j-option28">Pain management</label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                            </div>
                            <div class="col-sm-6">
                              <li>
                               <input type="checkbox" id="k-option28" name="selector28[]" value="None" <?php foreach(json_decode($patient->selector28) as $selector28){if($selector28 == 'None'){ echo 'checked'; } }?>>
                               <label for="k-option28">None</label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                            </ul>
                          
                         
                      </div>


                       <div class="col-12">
                         <h2 class="fs-title">Do you have any extra information to share with your doctor? </h2>
                         <!-- <h3 class="fs-subtitle">Your answers are kept 100% safe & private.</h3> -->
                         <ul class="radio-boxs row mlr-0">
                            <div class="col-sm-6">
                            <li>
                               <input type="radio" id="a-option29" name="selector29" value="No" <?php if($patient->selector29 == 'No'){ echo 'checked'; }?>>
                               <label for="a-option29">No </label>
                               <div class="check"></div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="radio" id="b-option29" name="selector29" value="Yes" <?php if($patient->selector29 == 'Yes'){ echo 'checked'; }?>>
                               <label for="b-option29">Yes</label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                            <li class="cust_opt_design cust_29opt" style="display: none;">
                               <h3 class=" fs-subtitle n-option29txt">Please provide details you would like to share with the doctor</h3>
                               <textarea id="n_option29_textarea29" name="n_option29_textarea29" class="form-control textarea29 ">{{ $patient->n_option29_textarea29 ?? '' }}</textarea>
                           </li>
                        </div>
                         </ul>
                          
                      </div>


                      <div class="col-12">
                         <h2 class="fs-title">What is your treatment preference? </h2>
                         <!-- <h3 class="fs-subtitle">Your answers are kept 100% safe & private.</h3> -->
                         <ul class="radio-boxs row mlr-0">
                            <div class="col-sm-6">
                            <li>
                               <input type="radio" id="a-option30" name="selector30" value="25mg Sildenafil, the generic version of Viagra" <?php if($patient->selector30 == '25mg Sildenafil, the generic version of Viagra'){ echo 'checked'; }?>>
                               <label for="a-option30">25mg Sildenafil, the generic version of Viagra</label>
                               <div class="check"></div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="radio" id="b-option30" name="selector30" value="50mg Sildenafil, the generic version of Viagra" <?php if($patient->selector30 == '50mg Sildenafil, the generic version of Viagra'){ echo 'checked'; }?>>
                               <label for="b-option30">50mg Sildenafil, the generic version of Viagra.</label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="radio" id="c-option30" name="selector30" value="100mg Sildenafil, the generic version of Viagra" <?php if($patient->selector30 == '100mg Sildenafil, the generic version of Viagra'){ echo 'checked'; }?>>
                               <label for="c-option30">100mg Sildenafil, the generic version of Viagra.</label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                             <li>
                               <input type="radio" id="d-option30" name="selector30" value="2.5mg Daily Tadalafil, the generic version of Cialis" <?php if($patient->selector30 == '2.5mg Daily Tadalafil, the generic version of Cialis'){ echo 'checked'; }?>>
                               <label for="d-option30">2.5mg Daily Tadalafil, the generic version of Cialis </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                              <li>
                               <input type="radio" id="e-option30" name="selector30" value="5mg Daily Tadalafil, the generic version of Cialis" <?php if($patient->selector30 == '5mg Daily Tadalafil, the generic version of Cialis'){ echo 'checked'; }?>>
                               <label for="e-option30">5mg Daily Tadalafil, the generic version of Cialis </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="radio" id="f-option30" name="selector30" value="10mg Tadalafil, the generic version of Cialis" <?php if($patient->selector30 == '10mg Tadalafil, the generic version of Cialis'){ echo 'checked'; }?>>
                               <label for="f-option30">10mg Tadalafil, the generic version of Cialis </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                              <li>
                               <input type="radio" id="g-option30" name="selector30" value="20mg Tadalafil, the generic version of Cialis" <?php if($patient->selector30 == '20mg Tadalafil, the generic version of Cialis'){ echo 'checked'; }?>>
                               <label for="g-option30">20mg Tadalafil, the generic version of Cialis  </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         <div class="col-sm-6">
                             <li>
                               <input type="radio" id="h-option30" name="selector30" value="I am not sure" <?php if($patient->selector30 == 'I am not sure'){ echo 'checked'; }?>>
                               <label for="h-option30">I am not sure   </label>
                               <div class="check">
                                  <div class="inside"></div>
                               </div>
                            </li>
                         </div>
                         </ul>
                          
                         
                      </div>


                      <div class="col-12">
                         <h2 class="fs-title">Identity Verification  </h2>
                         <!-- <h3 class="fs-subtitle">Your answers are kept 100% safe & private.</h3> -->
                         <ul class="radio-boxs file-boxs upload-file row mlr-0">
                         <div class="col-sm-6">
                            <li>
                               <input type="file" id="a-option31" name="facePicture">
                               <label for="a-option31">Submit picture of your face: Upload picture  </label>
                               <img src="{{ url('/') }}/{{ $patient->facePicture ?? '' }}" width="10%">
                            </li>
                      </div>
                         <div class="col-sm-6">
                            <li>
                               <input type="file" id="b-option31" name="uploadId">
                               <label for="b-option31">Submit picture of your government issues ID: Upload ID   </label>
                               <img src="{{ url('/') }}/{{ $patient->uploadId ?? '' }}" width="10%">
                            </li>
                      </div>

                         </ul>
                      </div>

                     
                </div>
          <!-- end row -->
                   </form>
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
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>	
@if(@$_GET['action']=='view')
<script>
$(document).ready(function(){
     $("input").attr("readonly", true);
     $("textarea").attr("readonly", true);
     $("input").attr('disabled', 'true');
})
</script>
@endif


<script>
$('body').on('click', '#get_start', function () {
    $("#form-quiz").show();
    $("#get_start_div").hide();
});   
</script>
<script type="text/javascript">
$(document).ready(function () {

$('.cust_4opt').hide();
$('.cust_6opt').hide();
$('.cust_12opt').hide();
$('.cust_13opt').hide();
$('.cust_16opt').hide();
$('.cust_18opt').hide();
$('.cust_25opt').hide();
$('.cust_26opt').hide();
$('.cust_29opt').hide();


// For 4th Quiz
$('#n-option4').on('click', function(){
$('.cust_4opt').toggle();
});
// For 4th Quiz

// For 6th Quiz

$('#s-option6').on('click', function(){
$('.cust_6opt').show();
});

$('#f-option6').on('click', function(){
$('.cust_6opt').hide();
});
// For 6th Quiz

// For 10th Quiz
$('#i-option10').on('click', function(){
$('#i-option10_textarea10').toggle();
});
// For 10th Quiz

// For 12th Quiz

$('#b-option12').on('click', function(){
$('.cust_12opt').show();
});

$('#a-option12').on('click', function(){
$('.cust_12opt').hide();
});
// For 12th Quiz

// For 13th Quiz

$('#a-option13').on('click', function(){
$('.cust_13opt').show();
});

$('#b-option13').on('click', function(){
$('.cust_13opt').hide();
});
// For 13th Quiz

// For 16th Quiz

$('#b-option16').on('click', function(){
$('.cust_16opt').show();
});

$('#a-option16').on('click', function(){
$('.cust_16opt').hide();
});
// For 16th Quiz


// For 16th Quiz

$('#b-option18').on('click', function(){
$('.cust_18opt').show();
});

$('#a-option18').on('click', function(){
$('.cust_18opt').hide();
});
// For 16th Quiz


// For 25th Quiz
$('#f-option25').on('click', function(){
$('.cust_25opt').show();
});

$('#a-option25,#b-option25,#c-option25,#d-option25,#e-option25,#g-option25').on('click', function(){
$('.cust_25opt').hide();
});


// For 26th Quiz

$('#b-option26').on('click', function(){
$('.cust_26opt').show();
});

$('#a-option26').on('click', function(){
$('.cust_26opt').hide();
});
// For 26th Quiz

// For 29th Quiz

$('#b-option29').on('click', function(){
$('.cust_29opt').show();
});

$('#a-option29').on('click', function(){
$('.cust_29opt').hide();
});
// For 29th Quiz

});


document.getElementById('yourFormId').addEventListener('keydown', function (e) {
    // Check if the pressed key is Enter (key code 13)
    if (e.key === 'Enter' || e.keyCode === 13) {
        // Prevent the default form submission behavior
        e.preventDefault();
    }
});
</script>
@endsection