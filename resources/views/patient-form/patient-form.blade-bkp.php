@extends('layouts.main-patient-form')
 @section('main-section')
<style>
   input#get_start {min-width: 160px;width: auto;background: #27AE60;font-weight: bold;color: white;border: 0 none;border-radius: 1px;cursor: pointer;padding: 16px;margin: 14px 20px;text-decoration: none;font-size: 20px;}
   .get-start {text-align: center;margin: 30px;padding: 5px;}
</style>
         <div class="content-page ml-0">
            <div class="content">
               <div class="container-fluid">
                  <!-- start page title -->
                  <div class="row">
                     <div class="col-12">
                        <div class="page-title-box">
                           <div class="page-title-right" style="display:block">
                              <ol class="breadcrumb m-0">
                                 <li class="breadcrumb-item">
                                   <a href="{{ url('/') }}" class="logo-dark">
                                      <span class="logo-sm">
                                         <img src="{{ url('public/quiz-assets/images/logo.svg') }}" alt="" height="24" >
                                      </span>
                                   </a></li>
                                 <li class="breadcrumb-item active">Quiz</li>
                              </ol>
                           </div>
                           <h4 class="page-title">Quiz</h4>
                        </div>
                     </div>
                  </div>
                  <!-- end page title --> 
                  <div class="row" id="get_start_div">
                     <div class="col-12">
                         <div class="card-box">
                         <div class="get-start">
                             <h4>Click on the Get Started button to fill in your information for the prescription.</h4>
                             <input type="button" name="get_start" id="get_start" class="action-button" value="Get Start" />
                         </div>
                         </div>
                      </div>
                  </div>
                  
                  <div class="row" id="form-quiz" style="display:none">
                     <div class="col-12">
                        <ul id="progressbar">
                           <li class="active"></li>
                           <li></li>
                           <li></li>
                           <li></li>
                           <li></li>
                           <li></li>
                           <li></li>
                           <li></li>
                           <li></li>
                           <li></li>
                           <li></li>
                           <li></li>
                           <li></li>
                           <li></li>
                           <li></li>
                           <li></li>
                           <li></li>
                           <li></li>
                           <li></li>
                           <li></li>
                           <li></li>
                           <li></li>
                           <li></li>
                           <li></li>
                           <li></li>
                           <li></li>
                           <li></li>
                           <li></li>
                           <li></li>
                           <li></li>
                           <li></li>
                           <li></li>
                           <li></li>
                           <li></li>
                           <li></li>
                           <li></li>
                           <li></li>
                        </ul>
                        <div class="card-box">
                           <form id="msform" action="{{ route('submitForm') }}" method="POST" enctype="multipart/form-data">
                              <!-- progressbar -->
                              <!-- fieldsets -->
                             @csrf
                              <fieldset>
                                 <h2 class="fs-title mb-4">What's your first name?</h2>
                                  <input type="text" name="fname" id="fname"/>
                                  <p class="step1_error"></p>
                                 <input type="button" name="next" class="step1 next action-button" value="Next" />
                                
                                 <!--<input type="button" name="next" class="nextval action-button" value="Next" />-->
                              </fieldset>

                               <fieldset>
                                 <h2 class="fs-title mb-4">What's your Last name?</h2>
                                       <input type="text" name="lname" id="lname"/>
                                       <p class="step2_error"></p>
                                 <input type="button" name="previous" class="previous action-button" value="Previous" />
                                 <input type="button" name="next" class="step2  action-button" value="Next" />
                              </fieldset>

                               <fieldset>
                                 <h2 class="fs-title mb-4">Please enter the phone number </h2>
                                       <input type="tel" name="phone" id="phone"/>
                                       <p class="step3_error"></p>
                                 <input type="button" name="previous" class="previous action-button" value="Previous" />
                                 <input type="button" name="next" class="step3 action-button" value="Next" />
                              </fieldset>

                              <fieldset>
                                 <h2 class="fs-title mb-4">What's your Email Address</h2>
                                       <input type="email" name="email" id="email"/>
                                <p class="step4_error"></p>
                                 <input type="button" name="previous" class="previous action-button" value="Previous" />
                                 <input type="button" name="next" class="step4 action-button" value="Next" />
                              </fieldset>


                              <fieldset>
                                 <h2 class="fs-title">What is your gender?</h2>
                                 <h3 class="fs-subtitle">Sex assigned at birth (Male or Female)</h3>
                                 <ul class="radio-boxs">
                                    <li>
                                       <input type="radio" id="m-gender" value="Male" name="gender">
                                       <label for="m-gender">Male</label>
                                       <div class="check">
                                       </div>
                                    </li>
                                    <li>
                                       <input type="radio" id="f-gender" value="Female" name="gender">
                                       <label for="f-gender">Female</label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                 </ul>
                                 
                                 <p class="step5_error"></p>
                                  <input type="button" name="previous" class="previous action-button" value="Previous" />
                                 <input type="button" name="next" class="step5 action-button" value="Next Step" />
                              </fieldset>

                                 <fieldset>
                                 <h2 class="fs-title mb-4">What is your date of birth?</h2>
                                 <div class="row">
                                    <div class="col-md-4">
                                        <select id="dob_month" name="month">
                                            <option value="">Select month</option>
                                            <option value="01">January</option>
                                            <option value="02">February</option>
                                            <option value="03">March</option>
                                            <option value="04">April</option>
                                            <option value="05">May</option>
                                            <option value="06">June</option>
                                            <option value="07">July</option>
                                            <option value="08">August</option>
                                            <option value="09">September</option>
                                            <option value="10">October</option>
                                            <option value="11">November</option>
                                            <option value="12">December</option>
                                        </select>
                                        <!--<input type="text" name="month" id="dob_month" placeholder="Month" />-->
                                    </div>
                                    <div class="col-md-4">
                                        <select id="dob_day" name="day">
                                            <option value="">Select day</option>
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
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="25">25</option>
                                            <option value="26">26</option>
                                            <option value="27">27</option>
                                            <option value="28">28</option>
                                            <option value="29">29</option>
                                            <option value="30">30</option>
                                            <option value="31">31</option>
                                        </select>
                                       <!--<input type="text" name="day" id="dob_day" placeholder="Day" />-->
                                    </div>
                                    <div class="col-md-4">
                                        <select id="dob_year" name="year">
                                            <option value="">Select Year</option>
                                        </select>
                                       <!--<input type="text" name="year" id="dob_year" placeholder="Year" />-->
                                    </div>
                                 </div>
                                 <p class="step6_error"></p>
                                 <input type="button" name="previous" class="previous action-button" value="Previous" />
                                 <input type="button" name="next" class="step6 action-button" value="Next" />
                              </fieldset>
                            

                              <fieldset>
                                 <h2 class="fs-title">How did your ED begin? Select the one that best describes your ED. </h2>
                                 <!-- <h3 class="fs-subtitle">Your answers are kept 100% safe & private.</h3> -->
                                 <ul class="radio-boxs">
                                    <li>
                                       <input type="radio" id="f-option1" value="Gradually but has worsened overtime" name="selector1">
                                       <label for="f-option1">Gradually but has worsened overtime </label>
                                       <div class="check"></div>
                                    </li>
                                    <li>
                                       <input type="radio" id="s-option1" value="Suddenly, with a new partner" name="selector1">
                                       <label for="s-option1">Suddenly, with a new partner </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                    <li>
                                       <input type="radio" id="t-option1" value="Suddenly, with same partner" name="selector1">
                                       <label for="t-option1">Suddenly, with same partner </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                    <li>
                                       <input type="radio" id="g-option1" value="I do not recall" name="selector1">
                                       <label for="g-option1">I do not recall </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                 </ul>
                                  <p class="step7_error"></p>
                                 <input type="button" name="previous" class="previous action-button" value="Previous" />
                                 <input type="button" name="next" class="step7 action-button" value="Next Step" />
                              </fieldset>

                               <fieldset>
                                 <h2 class="fs-title">What effect, if any, has your sex problems had on your partner relationships? </h2>
                                 <!-- <h3 class="fs-subtitle">Your answers are kept 100% safe & private.</h3> -->
                                 <ul class="radio-boxs">
                                    <li>
                                       <input type="radio" id="f-option2" value="No Effect" name="selector2">
                                       <label for="f-option2">No Effect  </label>
                                       <div class="check"></div>
                                    </li>
                                    <li>
                                       <input type="radio" id="s-option2" value="Little effect" name="selector2">
                                       <label for="s-option2">Little effect  </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                    <li>
                                       <input type="radio" id="t-option2" value="Moderate effect" name="selector2">
                                       <label for="t-option2">Moderate effect  </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                    <li>
                                       <input type="radio" id="g-option2" value="Large effect" name="selector2">
                                       <label for="g-option2">Large effect </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                 </ul>
                                  <p class="step8_error"></p>
                                  <input type="button" name="previous" class="previous action-button" value="Previous" />
                                 <input type="button" name="next" class="step8 action-button" value="Next Step" />
                              </fieldset>


                               <fieldset>
                                 <h2 class="fs-title">How satisfied have you been with your sex life in the past 6 months? </h2>
                                 <!-- <h3 class="fs-subtitle">Your answers are kept 100% safe & private.</h3> -->
                                 <ul class="radio-boxs">
                                    <li>
                                       <input type="radio" id="f-option3" value="Not at all" name="selector3">
                                       <label for="f-option3">Not at all  </label>
                                       <div class="check"></div>
                                    </li>
                                    <li>
                                       <input type="radio" id="s-option3" value="A little bit" name="selector3">
                                       <label for="s-option3">A little bit   </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                    <li>
                                       <input type="radio" id="t-option3" value="Somewhat" name="selector3">
                                       <label for="t-option3">Somewhat   </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                     <li>
                                       <input type="radio" id="h-option3" value="Quiet a bit" name="selector3">
                                       <label for="h-option3">Quiet a bit </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                    <li>
                                       <input type="radio" id="g-option3" value="Very" name="selector3">
                                       <label for="g-option3">Very  </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                 </ul>
                                 <p class="step9_error"></p>
                                  <input type="button" name="previous" class="previous action-button" value="Previous" />
                                 <input type="button" name="next" class="step9 action-button" value="Next Step" />
                              </fieldset>

                              
                              <fieldset>
                                 <h2 class="fs-title">Do you have any of the following medical conditions?  </h2>
                                 <h3 class="fs-subtitle">Select all that apply:</h3>
                                 <ul class="radio-boxs checkbox_boxs">
                                    <li>
                                       <input type="checkbox" id="a-option4" value="Heart disease" name="selector4[]">
                                       <label for="a-option4">Heart disease </label>
                                       <div class="check"></div>
                                    </li>
                                    <li>
                                       <input type="checkbox" id="b-option4" value="Diabetes" name="selector4[]">
                                       <label for="b-option4">Diabetes   </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                    <li>
                                       <input type="checkbox" id="c-option4" value="Hyperlipidemia" name="selector4[]">
                                       <label for="c-option4"> Hyperlipidemia   </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                     <li>
                                       <input type="checkbox" id="d-option4" value="Vascular disease" name="selector4[]">
                                       <label for="d-option4">Vascular disease</label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                    <li>
                                       <input type="checkbox" id="e-option4" value="Emotional problems" name="selector4[]">
                                       <label for="e-option4">Emotional problems  </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>

                                    <li>
                                       <input type="checkbox" id="f-option4" value="Kidney disease" name="selector4[]">
                                       <label for="f-option4">Kidney disease  </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                    <li>
                                       <input type="checkbox" id="g-option4" value="Trauma or injury to: penis, pelvis, perineum, testes, or rectum" name="selector4[]">
                                       <label for="g-option4">Trauma or injury to: penis, pelvis, perineum, testes, or rectum  </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                    <li>
                                       <input type="checkbox" id="h-option4" value="Prostate problems" name="selector4[]">
                                       <label for="h-option4">Prostate problems </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                    <li>
                                       <input type="checkbox" id="i-option4" value="Urinary problems" name="selector4[]">
                                       <label for="i-option4">Urinary problems  </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                    <li>
                                       <input type="checkbox" id="j-option4" value="Sleep apnea" name="selector4[]">
                                       <label for="j-option4">Sleep apnea  </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                    <li>
                                       <input type="checkbox" id="k-option4" value="Chronic fatigue or weakness" name="selector4[]">
                                       <label for="k-option4">Chronic fatigue or weakness  </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li> 
                                    <li>
                                       <input type="checkbox" id="l-option4" value="Joint pains" name="selector4[]">
                                       <label for="l-option4">Joint pains </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                    <li>
                                       <input type="checkbox" id="m-option4" value="None of the above" name="selector4[]">
                                       <label for="m-option4">None of the above  </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                    <li>
                                       <input type="checkbox" id="n-option4" value="Other" name="selector4[]">
                                       <label for="n-option4">Other  </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>

                                  <li class="cust_opt_design cust_4opt">
                                       <h3 class=" fs-subtitle n-option4txt">Please list your other medical conditions:</h3>
                                        <textarea id="n_option4_textarea4" name="n_option4_textarea4" class="form-control textarea4"></textarea>
                                   </li>
                                 
                                 </ul>
                                 <p class="step10_error"></p>
                                 <p class="step10_errors"></p>
                                  <input type="button" name="previous" class="previous action-button" value="Previous" />
                                 <input type="button" name="next" class="step10 action-button" value="Next Step" />
                              </fieldset>


                              <fieldset>
                                 <h2 class="fs-title">Have you seen your primary care doctor within the past 3 years?  </h2>
                                 <!-- <h3 class="fs-subtitle">Your answers are kept 100% safe & private.</h3> -->
                                 <ul class="radio-boxs">
                                    <li>
                                       <input type="radio" id="f-option5" value="Yes" name="selector5">
                                       <label for="f-option5">Yes   </label>
                                       <div class="check"></div>
                                    </li>
                                    <li>
                                       <input type="radio" id="s-option5" value="No" name="selector5">
                                       <label for="s-option5">No    </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                  
                                 </ul>
                                 <p class="step11_error"></p>
                                  <input type="button" name="previous" class="previous action-button" value="Previous" />
                                 <input type="button" name="next" class="step11 action-button" value="Next Step" />
                              </fieldset>


                              <fieldset>
                                 <h2 class="fs-title">Are all of your medical issues being appropriately treated by your primary care provider?   </h2>
                                 <!-- <h3 class="fs-subtitle">Your answers are kept 100% safe & private.</h3> -->
                                 <ul class="radio-boxs">
                                    <li>
                                       <input type="radio" id="f-option6" value="Yes" name="selector6">
                                       <label for="f-option6">Yes </label>
                                       <div class="check"></div>
                                    </li>
                                    <li>
                                       <input type="radio" id="s-option6" value="No" name="selector6">
                                       <label for="s-option6">No</label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                    
                                    <li class="cust_opt_design cust_6opt">
                                       <h3 class=" fs-subtitle n-option6txt">Please explain your medical issues not currently being treated by your primary care provider</h3>
                                       <textarea value="" id="n_option6_textarea6" name="n_option6_textarea6" class="form-control textarea4 "></textarea>
                                   </li>

                                 </ul>
                                 
                                 <p class="step12_error"></p>
                                  <input type="button" name="previous" class="previous action-button" value="Previous" />
                                 <input type="button" name="next" class="step12 action-button" value="Next Step" />
                              </fieldset>


                                <fieldset>
                                 <h2 class="fs-title">With sexual stimulation can you…?  </h2>
                                 <!-- <h3 class="fs-subtitle">Your answers are kept 100% safe & private.</h3> -->
                                 <ul class="radio-boxs">
                                    <li>
                                       <input type="radio" id="a-option7" value="Initiate an erection" name="selector7">
                                       <label for="a-option7">Initiate an erection    </label>
                                       <div class="check"></div>
                                    </li>
                                    <li>
                                       <input type="radio" id="b-option7" value="Maintain an erection" name="selector7">
                                       <label for="b-option7">Maintain an erection     </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                     <li>
                                       <input type="radio" id="c-option7" value="Neither initiate nor maintain an erection" name="selector7">
                                       <label for="c-option7">Neither initiate nor maintain an erection     </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                  
                                 </ul>
                                 <p class="step13_error"></p>
                                  <input type="button" name="previous" class="previous action-button" value="Previous" />
                                 <input type="button" name="next" class="step13 action-button" value="Next Step" />
                              </fieldset>

                              <fieldset>
                                 <h2 class="fs-title">How satisfied are you with the rigidity of your erection during sexual activity?  </h2>
                                 <!-- <h3 class="fs-subtitle">Your answers are kept 100% safe & private.</h3> -->
                                 <ul class="radio-boxs">
                                    <li>
                                       <input type="radio" id="a-option8" value="Not at all" name="selector8">
                                       <label for="a-option8">Not at all    </label>
                                       <div class="check"></div>
                                    </li>
                                    <li>
                                       <input type="radio" id="b-option8" value="A little bit" name="selector8">
                                       <label for="b-option8"> A little bit    </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                     <li>
                                       <input type="radio" id="c-option8" value="Somewhat" name="selector8">
                                       <label for="c-option8">Somewhat     </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                     <li>
                                       <input type="radio" id="d-option8" value="Quite a bit" name="selector8">
                                       <label for="d-option8">Quite a bit      </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                     <li>
                                       <input type="radio" id="e-option8" value="Very" name="selector8">
                                       <label for="e-option8"> Very      </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                  
                                 </ul>
                                 <p class="step14_error"></p>
                                  <input type="button" name="previous" class="previous action-button" value="Previous" />
                                 <input type="button" name="next" class="step14 action-button" value="Next Step" />
                              </fieldset>


                              <fieldset>
                                 <h2 class="fs-title">How satisfied have you been with your ability to keep your erections as long as you wanted over the past six months, in general? </h2>
                                 <!-- <h3 class="fs-subtitle">Your answers are kept 100% safe & private.</h3> -->
                                 <ul class="radio-boxs">
                                    <li>
                                       <input type="radio" id="a-option9" value="Not at all" name="selector9">
                                       <label for="a-option9">Not at all    </label>
                                       <div class="check"></div>
                                    </li>
                                    <li>
                                       <input type="radio" id="b-option9" value="A little bit" name="selector9">
                                       <label for="b-option9"> A little bit    </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                     <li>
                                       <input type="radio" id="c-option9" value="Somewhat" name="selector9">
                                       <label for="c-option9">Somewhat     </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                     <li>
                                       <input type="radio" id="d-option9" value="Quite a bit" name="selector9">
                                       <label for="d-option9">Quite a bit      </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                     <li>
                                       <input type="radio" id="e-option9" value="Very" name="selector9">
                                       <label for="e-option9"> Very      </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                  
                                 </ul>
                                 <p class="step15_error"></p>
                                  <input type="button" name="previous" class="previous action-button" value="Previous" />
                                 <input type="button" name="next" class="step15 action-button" value="Next Step" />
                              </fieldset>


                              <fieldset>
                                 <h2 class="fs-title">Have you taken any of the following as treatment for erectile dysfunction?   </h2>
                                 <h3 class="fs-subtitle">Select all that apply:</h3>
                                 <ul class="radio-boxs checkbox_boxs">
                                    <li>
                                       <input type="checkbox" id="a-option10" value="Sildenafil (Viagra)" name="selector10[]">
                                       <label for="a-option10">Sildenafil (Viagra) </label>
                                       <div class="check"></div>
                                    </li>
                                    <li>
                                       <input type="checkbox" id="b-option10" value="Tadalafil (Adcirca, Cialis)" name="selector10[]">
                                       <label for="b-option10">Tadalafil (Adcirca, Cialis)   </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                    <li>
                                       <input type="checkbox" id="c-option10" value="Vardenafil (Levitra, Staxyn),Avanafil (Stendra)" name="selector10[]">
                                       <label for="c-option10">Vardenafil (Levitra, Staxyn),Avanafil (Stendra)   </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                     <li>
                                       <input type="checkbox" id="d-option10" value="Testosterone Replacement" name="selector10[]">
                                       <label for="d-option10">Testosterone Replacement</label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                    <li>
                                       <input type="checkbox" id="e-option10" value="Injections" name="selector10[]">
                                       <label for="e-option10">Injections  </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>

                                    <li>
                                       <input type="checkbox" id="f-option10" value="Surgery or use of Pumps" name="selector10[]">
                                       <label for="f-option10">Surgery or use of Pumps </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                    <li>
                                       <input type="checkbox" id="g-option10" value="Shock wave therapy" name="selector10[]">
                                       <label for="g-option10">Shock wave therapy   </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                    <li>
                                       <input type="checkbox" id="h-option10" value="Intraurethural therapy (MUSE)" name="selector10[]">
                                       <label for="h-option10">Intraurethural therapy (MUSE) </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                  
                                       <li>
                                       <input type="checkbox" id="i-option10" value="Other Treatment" name="selector10[]">
                                       <label for="i-option10">Other Treatment  </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
 
                                    </li>

                                      <li class="cust_opt_design cust_10opt">
                                       <h3 class=" fs-subtitle n-option4txt">Please list and describe:</h3>
                                      
                                       <textarea id="j-option10" name="i_option10_textarea10" class="form-control textarea10"></textarea>
                                   </li>


                                    <li>
                                       <input type="checkbox" id="k-option10" value="No I have never used any medication, supplement or behavioral modification to treat ED" name="selector10[]">
                                       <label for="k-option10">No I have never used any medication, supplement or behavioral modification to treat ED  </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                  
                                 
                                 </ul>
                                 <p class="step16_error"></p>
                                  <input type="button" name="previous" class="previous action-button" value="Previous" />
                                 <input type="button" name="next" class="step16 action-button" value="Next Step" />
                              </fieldset>


                               <fieldset>
                                 <h2 class="fs-title mb-4">If you have had treatment listed above for ED, please explain for each if the treatment was effective and provide dosage if applicable. Write NA if it does not apply to you. </h2>
                                <textarea value="" name="selector11"  id="a-option11" class="form-control textarea11"></textarea>

                                 <p class="step17_error"></p>
                                 <input type="button" name="previous" class="previous action-button" value="Previous" />
                                 <input type="button" name="next" class="step17 action-button" value="Next Step" />
                              </fieldset>

                               <fieldset>
                                 <h2 class="fs-title">Are you on any medications? Include any medicines (e.g., Lipitor, Zyrtec, ibuprofen), herbs, vitamins, or dietary supplements that you have taken in the past 2 weeks, even if you are not taking them today. </h2>
                                 <!-- <h3 class="fs-subtitle">Your answers are kept 100% safe & private.</h3> -->
                                 <ul class="radio-boxs">
                                    <li>
                                       <input type="radio" id="a-option12" value="No" name="selector12">
                                       <label for="a-option12">No </label>
                                       <div class="check"></div>
                                    </li>
                                    <li>
                                       <input type="radio" id="b-option12" value="Yes" name="selector12">
                                       <label for="b-option12">Yes</label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                    
                                    <li class="cust_opt_design cust_12opt">
                                       <h3 class=" fs-subtitle n-option12txt">Please list the current medications that you are taking</h3>
                                       <textarea value="" id="n_option12_textarea12" name="n_option12_textarea12" class="form-control textarea12 "></textarea>
                                   </li>

                                 </ul>
                                 <p class="step18_error"></p>
                                  <input type="button" name="previous" class="previous action-button" value="Previous" />
                                 <input type="button" name="next" class="step18 action-button" value="Next Step" />
                              </fieldset>


                            <fieldset>
                                 <h2 class="fs-title">Do you have any allergies? Include any allergies to food, dyes, prescription or over-the-counter medicines (e.g., antibiotics, allergy medications), herbs, vitamins, supplements, or anything else.</h2>
                                 <!-- <h3 class="fs-subtitle">Your answers are kept 100% safe & private.</h3> -->
                                 <ul class="radio-boxs">
                                    <li>
                                       <input type="radio" id="a-option13" value="Yes" name="selector13">
                                       <label for="a-option13">Yes, please explain</label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                    <li class="cust_opt_design cust_13opt">
                                       <h3 class=" fs-subtitle n-option13txt">Please list the current medications that you are taking</h3>
                                       <textarea value="" id="n_option13_textarea13" name="n_option13_textarea13" class="form-control textarea4 "></textarea>
                                   </li>
                                    <li>
                                       <input type="radio" id="b-option13" value="No" name="selector13">
                                       <label for="b-option13">No </label>
                                       <div class="check"></div>
                                    </li>                                 
                                    
                                 </ul>

                                 <p class="step19_error"></p>
                                  <input type="button" name="previous" class="previous action-button" value="Previous" />
                                 <input type="button" name="next" class="step19 action-button" value="Next Step" />
                              </fieldset>


                              <fieldset>
                                 <h2 class="fs-title">In the last three months, have you taken any of the following drugs?  </h2>
                                 <h3 class="fs-subtitle">Select all that apply:</h3>
                                 <ul class="radio-boxs checkbox_boxs">
                                    <li>
                                       <input type="checkbox" id="a-option14" value="Clarithromycin" name="selector14[]">
                                       <label for="a-option14">Clarithromycin</label>
                                       <div class="check"></div>
                                    </li>
                                    <li>
                                       <input type="checkbox" id="b-option14" value="Diltiazem" name="selector14[]">
                                       <label for="b-option14">Diltiazem </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                    <li>
                                       <input type="checkbox" id="c-option14" value="Erythromycin" name="selector14[]">
                                       <label for="c-option14">Erythromycin </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                     <li>
                                       <input type="checkbox" id="d-option14" value="Itraconazole" name="selector14[]">
                                       <label for="d-option14">Itraconazole</label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                    <li>
                                       <input type="checkbox" id="e-option14" value="Ketoconazole" name="selector14[]">
                                       <label for="e-option14">Ketoconazole  </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>

                                    <li>
                                       <input type="checkbox" id="f-option14" value="Ritonavir" name="selector14[]">
                                       <label for="f-option14">Ritonavir </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                    <li>
                                       <input type="checkbox" id="g-option14" value="Verapamil" name="selector14[]">
                                       <label for="g-option14">Verapamil   </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                    <li>
                                       <input type="checkbox" id="h-option14" value="Doxazosin mesylate (Cardura)" name="selector14[]">
                                       <label for="h-option14">Doxazosin mesylate (Cardura) </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                  
                                    <li>
                                       <input type="checkbox" id="i-option14" value="Prazosin hydrochloride (Minipress)" name="selector14[]">
                                       <label for="i-option14">Prazosin hydrochloride (Minipress)  </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                   
                                    </li>
                                    <li>
                                       <input type="checkbox" id="j-option14" value="Terazosin hydrochloride (Hytrin)" name="selector14[]">
                                       <label for="j-option14">Terazosin hydrochloride (Hytrin) </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                     <li>
                                       <input type="checkbox" id="k-option14" value="Hormones" name="selector14[]">
                                       <label for="k-option14">Hormones </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                     <li>
                                       <input type="checkbox" id="l-option14" value="Sedatives" name="selector14[]">
                                       <label for="l-option14">Sedatives </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                     <li>
                                       <input type="checkbox" id="m-option14" value="Ulcer medications" name="selector14[]">
                                       <label for="m-option14">Ulcer medications</label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                     <li>
                                       <input type="checkbox" id="n-option14" value="None of the above" name="selector14[]">
                                       <label for="n-option14">None of the above </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                  
                                 
                                 </ul>
                                 <p class="step20_error"></p>
                                  <input type="button" name="previous" class="previous action-button" value="Previous" />
                                 <input type="button" name="next" class="step20 action-button" value="Next Step" />
                              </fieldset>


                                <fieldset>
                                 <h2 class="fs-title mb-4">If said yes to any of the drugs in question 13, please provide more details for each:  </h2>
                                <textarea value="" name="selector15"  id="a-option15" class="form-control textarea15"></textarea>
                                <p class="step21_error"></p>
                                 <input type="button" name="previous" class="previous action-button" value="Previous" />
                                 <input type="button" name="next" class="step21 action-button" value="Next Step" />
                              </fieldset>


                               <fieldset>
                                 <h2 class="fs-title">Have you ever been prescribed nitrates/nitroglycerin? </h2>
                                 <!-- <h3 class="fs-subtitle">Your answers are kept 100% safe & private.</h3> -->
                                 <ul class="radio-boxs">
                                    <li>
                                       <input type="radio" id="a-option16" value="No" name="selector16">
                                       <label for="a-option16">No </label>
                                       <div class="check"></div>
                                    </li>
                                    <li>
                                       <input type="radio" id="b-option16" value="Yes" name="selector16">
                                       <label for="b-option16">Yes</label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                    
                                    <li class="cust_opt_design cust_16opt">
                                       <h3 class=" fs-subtitle n-option16txt">Please provide as much detail as possible. When was the last time you were prescribed nitrates/nitroglycerin? </h3>
                                       <textarea id="n_option16_textarea16" name="n_option16_textarea16" class="form-control textarea16 "></textarea>
                                   </li>

                                 </ul>
                                 <p class="step22_error"></p>
                                  <input type="button" name="previous" class="previous action-button" value="Previous" />
                                 <input type="button" name="next" class="step22 action-button" value="Next Step" />
                              </fieldset>


                               <fieldset>
                                 <h2 class="fs-title">In the past several months, have you had any of the following: </h2>
                                 <h3 class="fs-subtitle">Select all that apply:</h3>
                                 <ul class="radio-boxs checkbox_boxs">
                                    <li>
                                       <input type="checkbox" id="a-option17" value="Chest Pain" name="selector17[]">
                                       <label for="a-option17">Chest Pain</label>
                                       <div class="check"></div>
                                    </li>
                                    <li>
                                       <input type="checkbox" id="b-option17" value="Passing Out" name="selector17[]">
                                       <label for="b-option17">Passing Out </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                    <li>
                                       <input type="checkbox" id="c-option17" value="Dizziness/Seizure" name="selector17[]">
                                       <label for="c-option17">Dizziness/Seizure </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                     <li>
                                       <input type="checkbox" id="d-option17" value="Shortness of breath or trouble breathing" name="selector17[]">
                                       <label for="d-option17">Shortness of breath or trouble breathing </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                    <li>
                                       <input type="checkbox" id="e-option17" value="Abnormal heartbeat" name="selector17[]">
                                       <label for="e-option17">Abnormal heartbeat   </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>

                                    <li>
                                       <input type="checkbox" id="f-option17" value="None of the above" name="selector17[]">
                                       <label for="f-option17">None of the above </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                    
                                 
                                 </ul>
                                   <p class="step23_error"></p>
                                  <input type="button" name="previous" class="previous action-button" value="Previous" />
                                 <input type="button" name="next" class="step23 action-button" value="Next Step" />
                              </fieldset>


                              <fieldset>
                                 <h2 class="fs-title">Have you had any surgeries?</h2>
                                 <!-- <h3 class="fs-subtitle">Your answers are kept 100% safe & private.</h3> -->
                                 <ul class="radio-boxs">
                                    <li>
                                       <input type="radio" id="a-option18" value="No" name="selector18">
                                       <label for="a-option18">No </label>
                                       <div class="check"></div>
                                    </li>
                                    <li>
                                       <input type="radio" id="b-option18" value="Yes" name="selector18">
                                       <label for="b-option18">Yes</label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                    
                                    <li class="cust_opt_design cust_18opt">
                                       <h3 class=" fs-subtitle n-option18txt">Please list all surgeries you've had</h3>
                                       <textarea value="" id="n_option18_textarea18" name="n_option18_textarea18" class="form-control textarea18 "></textarea>
                                   </li>

                                 </ul>
                                 <p class="step24_error"></p>
                                  <input type="button" name="previous" class="previous action-button" value="Previous" />
                                 <input type="button" name="next" class="step24 action-button" value="Next Step" />
                              </fieldset>


                               <fieldset>
                                 <h2 class="fs-title">Is there a family history of any of the following?</h2>
                                 <!-- <h3 class="fs-subtitle">Your answers are kept 100% safe & private.</h3> -->
                                 <ul class="radio-boxs">
                                    <li>
                                       <input type="radio" id="a-option19" value="Cardiovascular disease" name="selector19">
                                       <label for="a-option19">Cardiovascular disease</label>
                                       <div class="check"></div>
                                    </li>
                                    <li>
                                       <input type="radio" id="b-option19" value="Unexplained sudden death" name="selector19">
                                       <label for="b-option19">Unexplained sudden death</label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                    <li>
                                       <input type="radio" id="c-option19" value="None of the above" name="selector19">
                                       <label for="c-option19">None of the above</label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>

                                 </ul>
                                 <p class="step25_error"></p>
                                  <input type="button" name="previous" class="previous action-button" value="Previous" />
                                 <input type="button" name="next" class="step25 action-button" value="Next Step" />
                              </fieldset>

                              <fieldset>
                                 <h2 class="fs-title mb-4">If answered A or B for question 18, please provide more detail below. If you chose C, please write NA.  </h2>
                                 <h3 class="fs-subtitle">Please provide details of family history of cardiovascular disease or unexplained sudden death (family members, relationship, age of onset)</h3>
                                <textarea value="" name="selector20"  id="a-option20" class="form-control textarea20"></textarea>
                                <p class="step26_error"></p>
                                 <input type="button" name="previous" class="previous action-button" value="Previous" />
                                 <input type="button" name="next" class="step26 action-button" value="Next Step" />
                              </fieldset>

                               <fieldset>
                                 <h2 class="fs-title">Over the past two weeks how often have felt little or no pleasure in activities you usually enjoy?</h2>
                                 <!-- <h3 class="fs-subtitle">Your answers are kept 100% safe & private.</h3> -->
                                 <ul class="radio-boxs">
                                    <li>
                                       <input type="radio" id="a-option21" value="Not at all" name="selector21">
                                       <label for="a-option21">Not at all</label>
                                       <div class="check"></div>
                                    </li>
                                    <li>
                                       <input type="radio" id="b-option21" value="Several days" name="selector21">
                                       <label for="b-option21">Several days</label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                    <li>
                                       <input type="radio" id="c-option21" value="More than half the days" name="selector21">
                                       <label for="c-option21">More than half the days</label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                     <li>
                                       <input type="radio" id="d-option21" value="Nearly every day" name="selector21">
                                       <label for="d-option21">Nearly every day</label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>

                                 </ul>
                                 <p class="step27_error"></p>
                                  <input type="button" name="previous" class="previous action-button" value="Previous" />
                                 <input type="button" name="next" class="step27 action-button" value="Next Step" />
                              </fieldset>


                              <fieldset>
                                 <h2 class="fs-title">Over the past two weeks how often have feltdown, depressed, or hopeless?</h2>
                                 <!-- <h3 class="fs-subtitle">Your answers are kept 100% safe & private.</h3> -->
                                 <ul class="radio-boxs">
                                    <li>
                                       <input type="radio" id="a-option22" value="Not at all" name="selector22">
                                       <label for="a-option22">Not at all</label>
                                       <div class="check"></div>
                                    </li>
                                    <li>
                                       <input type="radio" id="b-option22" value="Several days" name="selector22">
                                       <label for="b-option22">Several days</label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                    <li>
                                       <input type="radio" id="c-option22" value="More than half the days" name="selector22">
                                       <label for="c-option22">More than half the days</label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                     <li>
                                       <input type="radio" id="d-option22" value="Nearly every day" name="selector22">
                                       <label for="d-option22">Nearly every day</label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>

                                 </ul>
                                 <p class="step28_error"></p>
                                  <input type="button" name="previous" class="previous action-button" value="Previous" />
                                 <input type="button" name="next" class="step28 action-button" value="Next Step" />
                              </fieldset>

                              <fieldset>
                                 <h2 class="fs-title">Over the past two weeks how often have felt nervous, anxious, on edge, or worrying too much? </h2>
                                 <!-- <h3 class="fs-subtitle">Your answers are kept 100% safe & private.</h3> -->
                                 <ul class="radio-boxs">
                                    <li>
                                       <input type="radio" id="a-option23" value="Not at all" name="selector23">
                                       <label for="a-option23">Not at all</label>
                                       <div class="check"></div>
                                    </li>
                                    <li>
                                       <input type="radio" id="b-option23" value="Several days" name="selector23">
                                       <label for="b-option23">Several days</label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                    <li>
                                       <input type="radio" id="c-option23" value="More than half the days" name="selector23">
                                       <label for="c-option23">More than half the days</label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                     <li>
                                       <input type="radio" id="d-option23" value="Nearly every day" name="selector23">
                                       <label for="d-option23">Nearly every day</label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>

                                 </ul>
                                 <p class="step29_error"></p>
                                  <input type="button" name="previous" class="previous action-button" value="Previous" />
                                 <input type="button" name="next" class="step29 action-button" value="Next Step" />
                              </fieldset>


                              <fieldset>
                                 <h2 class="fs-title">Which of the following apply to you?  </h2>
                                 <h3 class="fs-subtitle">Select all that apply:</h3>
                                 <ul class="radio-boxs checkbox_boxs">
                                    <li>
                                       <input type="checkbox" id="a-option24" value="I get less than 2 hours of exercise per week" name="selector24[]">
                                       <label for="a-option24">I get less than 2 hours of exercise per week</label>
                                       <div class="check"></div>
                                    </li>
                                    <li>
                                       <input type="checkbox" id="b-option24" value="I do not eat as healthy as I would like" name="selector24[]">
                                       <label for="b-option24">I do not eat as healthy as I would like </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                    <li>
                                       <input type="checkbox" id="c-option24" value="I smoke or use tobacco" name="selector24[]">
                                       <label for="c-option24">I smoke or use tobacco (e.g., chewing tobacco, snuff)</label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                     <li>
                                       <input type="checkbox" id="d-option24" value="I use other nicotine containing products" name="selector24[]">
                                       <label for="d-option24">I use other nicotine containing products (e.g., vaping) </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                    <li>
                                       <input type="checkbox" id="e-option24" value="I get less than 7 hours of sleep per night, on average" name="selector24[]">
                                       <label for="e-option24">I drink more than 2 alcoholic drinks per day </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>

                                    <li>
                                       <input type="checkbox" id="f-option24" value="I get less than 7 hours of sleep per night, on average" name="selector24[]">
                                       <label for="f-option24">I get less than 7 hours of sleep per night, on average </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>

                                    <li>
                                       <input type="checkbox" id="g-option24" value="I am 20+ pounds overweight" name="selector24[]">
                                       <label for="g-option24">I'm 20+ pounds overweight </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>

                                    <li>
                                       <input type="checkbox" id="h-option24" value="I am frequently under a lot of stress" name="selector24[]">
                                       <label for="h-option24">I am frequently under a lot of stress </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>

                                    <li>
                                       <input type="checkbox" id="i-option24" value="None apply to me" name="selector24[]">
                                       <label for="i-option24">None apply to me</label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                    
                                 
                                 </ul>
                                 <p class="step30_error"></p>
                                  <input type="button" name="previous" class="previous action-button" value="Previous" />
                                 <input type="button" name="next" class="step30 action-button" value="Next Step" />
                              </fieldset>


                              <fieldset>
                                 <h2 class="fs-title">In The Last Three Months, Have You Used Any Of The Following Drugs Recreationally?</h2>
                                 <!-- <h3 class="fs-subtitle">Your answers are kept 100% safe & private.</h3> -->
                                 <ul class="radio-boxs">
                                    <li>
                                       <input type="radio" id="a-option25" value="Cocaine" name="selector25">
                                       <label for="a-option25">Cocaine</label>
                                       <div class="check"></div>
                                    </li>
                                    <li>
                                       <input type="radio" id="b-option25" value="Poppers or Rush" name="selector25">
                                       <label for="b-option25">Poppers or Rush</label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                    <li>
                                       <input type="radio" id="c-option25" value="Opiates/Heroin" name="selector25">
                                       <label for="c-option25">Opiates/Heroin</label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                     <li>
                                       <input type="radio" id="d-option25" value="Methamphetamine" name="selector25">
                                       <label for="d-option25">Methamphetamine</label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>

                                      <li>
                                       <input type="radio" id="e-option25" value="Molly (MDMA)" name="selector25">
                                       <label for="e-option25">Molly (MDMA)</label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>

                                    <li>
                                       <input type="radio" id="f-option25" value="Other" name="selector25" value="Other">
                                       <label for="f-option25">Other</label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>

                                     <li class="cust_opt_design cust_25opt">
                                       <h3 class=" fs-subtitle n-option25txt">Please provide more details here </h3>
                                       <textarea value="" id="n_option25_textarea25" name="n_option25_textarea25" class="form-control textarea25 "></textarea>
                                     </li>

                                      <li>
                                       <input type="radio" id="g-option25" value="None" name="selector25">
                                       <label for="g-option25">None </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>

                                 </ul>
                                 <p class="step31_error"></p>
                                  <input type="button" name="previous" class="previous action-button" value="Previous" />
                                 <input type="button" name="next" class="step31 action-button" value="Next Step" />
                              </fieldset>


                               <fieldset>
                                 <h2 class="fs-title">Have you had elevated Blood pressure in the past 6 months?</h2>
                                 <!-- <h3 class="fs-subtitle">Your answers are kept 100% safe & private.</h3> -->
                                 <ul class="radio-boxs">
                                    <li>
                                       <input type="radio" id="a-option26" value="No" name="selector26">
                                       <label for="a-option26">No </label>
                                       <div class="check"></div>
                                    </li>
                                    <li>
                                       <input type="radio" id="b-option26" value="Yes" name="selector26">
                                       <label for="b-option26">Yes</label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                    
                                    <li class="cust_opt_design cust_26opt">
                                       <h3 class=" fs-subtitle n-option26txt">Please provide more details</h3>
                                       <textarea value="" id="n_option26_textarea26" name="n_option26_textarea26" class="form-control textarea26 "></textarea>
                                   </li>

                                 </ul>
                                  <p class="step32_error"></p>
                                  <input type="button" name="previous" class="previous action-button" value="Previous" />
                                 <input type="button" name="next" class="step32 action-button" value="Next Step" />
                              </fieldset>


                               <fieldset>
                                 <h2 class="fs-title">Enter your blood pressure reading taken within the last 6 months</h2>
                                 <!-- <h3 class="fs-subtitle">Your answers are kept 100% safe & private.</h3> -->
                                 <ul class="radio-boxs">
                                    <li>
                                       <input type="radio" id="a-option27" value="Low – Normal (120/80 or lower)" name="selector27">
                                       <label for="a-option27">Low – Normal (120/80 or lower)</label>
                                       <div class="check"></div>
                                    </li>
                                    <li>
                                       <input type="radio" id="b-option27" value="Above Normal (121/80 - 129/80)" name="selector27">
                                       <label for="b-option27">Above Normal (121/80 - 129/80)</label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                    <li>
                                       <input type="radio" id="c-option27" value="High (130/80 - 139/89)" name="selector27">
                                       <label for="c-option27">High (130/80 - 139/89)</label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                     <li>
                                       <input type="radio" id="d-option27" value="Higher (140/90 or greater)" name="selector27">
                                       <label for="d-option27">Higher (140/90 or greater)</label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>

                                 </ul>
                                 <p class="step33_error"></p>
                                  <input type="button" name="previous" class="previous action-button" value="Previous" />
                                 <input type="button" name="next" class="step33 action-button" value="Next Step" />
                              </fieldset>


                               <fieldset>
                                 <h2 class="fs-title">Have you experienced any of the following conditions? </h2>
                                 <h3 class="fs-subtitle">Select all that apply:</h3>
                                 <ul class="radio-boxs checkbox_boxs">
                                    <li>
                                       <input type="checkbox" id="a-option28" value="Enlarged prostate" name="selector28[]">
                                       <label for="a-option28">Enlarged prostate</label>
                                       <div class="check"></div>
                                    </li>
                                    <li>
                                       <input type="checkbox" id="b-option28" value="Weight gain / management" name="selector28[]">
                                       <label for="b-option28">Weight gain / management </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                    <li>
                                       <input type="checkbox" id="c-option28" value="Sleep / insomnia" name="selector28[]">
                                       <label for="c-option28">Sleep / insomnia</label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                     <li>
                                       <input type="checkbox" id="d-option28" value="Hair loss" name="selector28[]">
                                       <label for="d-option28">Hair loss </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                    <li>
                                       <input type="checkbox" id="e-option28" value="Low testosterone" name="selector28[]">
                                       <label for="e-option28">Low testosterone </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>

                                    <li>
                                       <input type="checkbox" id="f-option28" value="Blood sugar / diabetes" name="selector28[]">
                                       <label for="f-option28">Blood sugar / diabetes </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>

                                    <li>
                                       <input type="checkbox" id="g-option28" value="LAcne / Rosceca / Hyperpigmentation" name="selector28[]">
                                       <label for="g-option28">Acne / Rosceca / Hyperpigmentation </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>

                                    <li>
                                       <input type="checkbox" id="h-option28" value="Joint Issues" name="selector28[]">
                                       <label for="h-option28">Joint Issues</label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>

                                    <li>
                                       <input type="checkbox" id="i-option28" value="Toe nail fungus" name="selector28[]">
                                       <label for="i-option28">Toe nail fungus</label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                    
                                      <li>
                                       <input type="checkbox" id="j-option28" value="Pain management" name="selector28[]">
                                       <label for="j-option28">Pain management</label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                    

                                      <li>
                                       <input type="checkbox" id="k-option28" value="None" name="selector28[]">
                                       <label for="k-option28">None</label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                    
                                 
                                 </ul>
                                 <p class="step34_error"></p>
                                  <input type="button" name="previous" class="previous action-button" value="Previous" />
                                 <input type="button" name="next" class="step34 action-button" value="Next Step" />
                              </fieldset>


                               <fieldset>
                                 <h2 class="fs-title">Do you have any extra information to share with your doctor? </h2>
                                 <!-- <h3 class="fs-subtitle">Your answers are kept 100% safe & private.</h3> -->
                                 <ul class="radio-boxs">
                                    <li>
                                       <input type="radio" id="a-option29" value="No" name="selector29">
                                       <label for="a-option29">No </label>
                                       <div class="check"></div>
                                    </li>
                                    <li>
                                       <input type="radio" id="b-option29" value="Yes" name="selector29">
                                       <label for="b-option29">Yes</label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                    
                                    <li class="cust_opt_design cust_29opt">
                                       <h3 class=" fs-subtitle n-option29txt">Please provide details you would like to share with the doctor</h3>
                                       <textarea value="" id="n_option29_textarea29" name="n_option29_textarea29" class="form-control textarea29 "></textarea>
                                   </li>

                                 </ul>
                                 <p class="step35_error"></p>
                                  <input type="button" name="previous" class="previous action-button" value="Previous" />
                                 <input type="button" name="next" class="step35 action-button" value="Next Step" />
                              </fieldset>


                              <fieldset>
                                 <h2 class="fs-title">What is your treatment preference? </h2>
                                 <!-- <h3 class="fs-subtitle">Your answers are kept 100% safe & private.</h3> -->
                                 <ul class="radio-boxs">
                                    <li>
                                       <input type="radio" id="a-option30" value="25mg Sildenafil, the generic version of Viagra" name="selector30">
                                       <label for="a-option30">25mg Sildenafil, the generic version of Viagra</label>
                                       <div class="check"></div>
                                    </li>
                                    <li>
                                       <input type="radio" id="b-option30" value="50mg Sildenafil, the generic version of Viagra" name="selector30">
                                       <label for="b-option30">50mg Sildenafil, the generic version of Viagra.</label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                    <li>
                                       <input type="radio" id="c-option30" value="100mg Sildenafil, the generic version of Viagra" name="selector30">
                                       <label for="c-option30">100mg Sildenafil, the generic version of Viagra.</label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>
                                     <li>
                                       <input type="radio" id="d-option30" value="2.5mg Daily Tadalafil, the generic version of Cialis" name="selector30">
                                       <label for="d-option30">2.5mg Daily Tadalafil, the generic version of Cialis </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>

                                      <li>
                                       <input type="radio" id="e-option30" value="5mg Daily Tadalafil, the generic version of Cialis" name="selector30">
                                       <label for="e-option30">5mg Daily Tadalafil, the generic version of Cialis </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>

                                    <li>
                                       <input type="radio" id="f-option30" value="10mg Tadalafil, the generic version of Cialis" name="selector30" value="Other">
                                       <label for="f-option30">10mg Tadalafil, the generic version of Cialis </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>

                                      <li>
                                       <input type="radio" id="g-option30" value="20mg Tadalafil, the generic version of Cialis" name="selector30">
                                       <label for="g-option30">20mg Tadalafil, the generic version of Cialis  </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>

                                     <li>
                                       <input type="radio" id="h-option30" value="I am not sure" name="selector30">
                                       <label for="h-option30">I am not sure   </label>
                                       <div class="check">
                                          <div class="inside"></div>
                                       </div>
                                    </li>

                                 </ul>
                                 <p class="step36_error"></p>
                                  <input type="button" name="previous" class="previous action-button" value="Previous" />
                                 <input type="button" name="next" class="step36 action-button" value="Next Step" />
                              </fieldset>


                              <fieldset>
                                 <h2 class="fs-title">Identity Verification  </h2>
                                 <!-- <h3 class="fs-subtitle">Your answers are kept 100% safe & private.</h3> -->
                                 <ul class="radio-boxs file-boxs upload-file">
                                    <li>
                                       <input type="file" id="a-option31" name="facePicture" onchange="previewImage1()">
                                       <label for="a-option31">Submit picture of your face: Upload picture  </label>
                                       <img id="imagePreview1" src="#" alt="Image Preview" style="display:none;width:30%"/>
                                    </li>
                                    <li>
                                       <input type="file" id="b-option31" name="uploadId" onchange="previewImage2()">
                                       <label for="b-option31">Submit picture of your government issues ID: Upload ID   </label>
                                       <img id="imagePreview2" src="#" alt="Image Preview" style="display:none;width:30%"/>
                                    </li>
                                     
                                 </ul>
                                 <p class="step37_error"></p>
                                 <a href ="javascript:void(0);" name="submit_demo" class="demo_btn btn btn-success"  />Submit</a>
                                 <input type="submit" name="submit" class="next action-button btnn_or" value="Submit" />
                              </fieldset>

                             
                           </form>
                        </div>
                     </div>
                  </div>
                  <!-- end row -->
               </div>
               <!-- end container-fluid -->
            </div>
            <!-- end content -->
            <!-- Footer Start -->
            <footer class="footer ml-0 l-0">
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-md-12">
                        2023 &copy; Rexmd
                     </div>
                  </div>
               </div>
            </footer>
            <!-- end Footer -->
         </div>
         <!-- ============================================================== -->
         <!-- End Page content -->
         <!-- ============================================================== -->
      </div>

      <!-- model -->
      <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="myCenterModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h2 class="fs-title mt-5 text-center">No recommended treatment</h2>
                                    <p class="sub-header text-center">
                                        our health is our priority. To determine the most appropriate care for you, I would like you to be seen in person by a primary care provider or Urologist to further discuss your health history and symptoms. Thank you for trusting us with your care.
                                    </p>
                                    <h5 class="header-title text-center mb-4">Did you make a mistake answering?</h5>
                                    <div class="button-list my-model">
                                        <div class="button-list">
                                            <button class="btn btn-success waves-effect"> Change Your Answers </button>
                                            <button class="btn btn-white waves-effect">  Call us at (866) 294-3772 </button>
                                            
                                        </div>
                                    </div>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
 <script>
        const yearSelect = document.getElementById('dob_year');
        const startYear = 1950;  // Adjust this to set the start year
        const endYear = new Date().getFullYear();  // Get the current year as the end year

        // Generate year options and add them to the dropdown
        for (let year = startYear; year <= endYear; year++) {
            const option = document.createElement('option');
            option.value = year;
            option.textContent = year;
            yearSelect.appendChild(option);
        }
        
        function previewImage1() {
            const imageInput = document.getElementById('a-option31');
            const imagePreview = document.getElementById('imagePreview1');
        
            if (imageInput.files && imageInput.files[0]) {
                const reader = new FileReader();
        
                reader.onload = function (e) {
                    imagePreview.src = e.target.result;
                };
        
                reader.readAsDataURL(imageInput.files[0]);
                imagePreview.style.display = "block";
            } else {
                imagePreview.src = '#'; // Clear the preview if no image is selected
            }
        }

        function previewImage2() {
            const imageInput = document.getElementById('b-option31');
            const imagePreview = document.getElementById('imagePreview2');
        
            if (imageInput.files && imageInput.files[0]) {
                const reader = new FileReader();
        
                reader.onload = function (e) {
                    imagePreview.src = e.target.result;
                };
        
                reader.readAsDataURL(imageInput.files[0]);
                imagePreview.style.display = "block";
            } else {
                imagePreview.src = '#'; // Clear the preview if no image is selected
            }
        }

    </script>

<script>
// $(document).ready(function () {
//     $('#msform').submit(function (e) {
//         e.preventDefault();

//         var formData = $(this).serialize();
//         console.log(formData);
//         $.ajax({
//             type: 'POST',
//             url: "{{ route('submitForm') }}",
//             data: formData,
//             dataType: 'json',
//             success: function (response) {
//                 //Handle the success response
//                 window.location.href = "/thank-you";
//             },
//             error: function (xhr, status, error) {
//                 //Handle errors, e.g., display error messages.
//                 console.error(xhr.responseText);
//             }
//         });
//     });
// });
 
$('body').on('click', '#get_start', function () {
    $("#form-quiz").show();
    $("#get_start_div").hide();
});   



// prevent enter
$(document).ready(function() {
  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
});
</script>

@endsection