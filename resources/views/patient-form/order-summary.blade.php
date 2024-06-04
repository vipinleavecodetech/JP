@extends('layouts.main-patient-form')
@section('main-section')
<?php   
$form_session_id = Session::get('pat_uni_id');

$month_supply = $patient_form_data->how_many_month_supply;
$month_num = preg_replace('/[^0-9]/', '', $month_supply);
$how_many_time_per_month = preg_replace('/[^0-9]/', '', $patient_form_data->selector34);
$no_of_tab = $how_many_time_per_month*$month_num;

$medication_name = $patient_form_data->selector35;
$medications = Illuminate\Support\Facades\DB::table('manage_preference')->where('medication_name', $medication_name)->first();


if ($medications) {
    if($month_num == 1){
        $DiscountedPrice1 = 0.00;
        $DiscountedPrice = 0.00;
        $TotalPrice1 = $medications->price;
        $TotalPrice = $no_of_tab * $TotalPrice1;
    }else if($month_num == 3){
        $DiscountedPrice1 = $medications->price * 15 / 100;
        $DiscountedPrice = $no_of_tab * $DiscountedPrice1;
        $TotalPrice1 = number_format($medications->price, 2);
        $TotalPrice = $no_of_tab * $TotalPrice1;
    }else if($month_num == 6){
        $DiscountedPrice1 = $medications->price * 20 / 100;
        $DiscountedPrice = $no_of_tab * $DiscountedPrice1;
        $TotalPrice1 = number_format($medications->price, 2);
        $TotalPrice = $no_of_tab * $TotalPrice1;
    }else if($month_num == 12){
        $DiscountedPrice1 = $medications->price * 40 / 100;
        $DiscountedPrice = $no_of_tab * $DiscountedPrice1;
        $TotalPrice1 = number_format($medications->price, 2);
        $TotalPrice = $no_of_tab * $TotalPrice1;
    }
}



// $DiscountedPrice = $no_of_tab * $supply_price;
// //echo "<br>";
// $ActualPrice = $no_of_tab * 3.00;
// //echo "<br>";
// $totalDiscount = $ActualPrice-$DiscountedPrice;
// //die();
?>
<style>
    .main-sects .my-first-box .para-2 h2 {
        text-align: center;
    }
    .main-sects .my-first-box .para-2 h2 span {
        color: #d54040;
        display: block;
    }
    .para-bet
    {
      display: flex !important;
      flex-wrap: nowrap !important;
    }
    .contact-details__info {
    position: relative;
    display: block;
    margin-top: 15px;
    }
    .list-unstyled {
        padding-left: 0;
        list-style: none;
    }
    .contact-details__info li {
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
    }
    .contact-details__info li .icon {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        -webkit-transition: all 500ms ease;
        transition: all 500ms ease;
    }
    .contact-details__info li .icon img  
    {
      width: 25px;
       object-fit: cover;
    }
    ul.list-unstyled.contact-details__info .text p {
        font-weight: 700;
        margin-bottom: 0;
        font-size: 9px;
        line-height: 1.2em;
    }
    .contact-details__info li .text {
        margin-left:3px;
    }
    .contact-details__info li .text h6 {
        margin-bottom: 5px;
        margin-top: 0;
    }
    .down-content {
        text-align: center;
    }
    p.color-red {
        margin-bottom: 25px;
        color: #df3333;
        font-weight: 500;
    }
    .down-content h3 {
        color: #df3333;
        font-weight: 600;
    }
    .down-content span {
        color: #1b1b3b;
    }
    .contact-details__info li .icon-leftbar {
        height: 60px;
        width: 60px;
        background-color: #7332e7;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        -webkit-transition: all 500ms ease;
        transition: all 500ms ease;
        border-radius: 50%;
    }
    .contact-details__info li + li {
        margin-top: 20px;
    }
    .icon-leftbar img  
    {
      width: 30px !important;
      object-fit: cover;
    }
    span.color-red {
      color: #df3333;
    }
    .text.text-leftbar p {
        font-size: 14px !important;
        font-weight: 400 !important;
    }
    .left-side-h.text-center h3  
    {
       color: #df3333;
       font-weight: 700;
    }
    .left-side-h.text-center span 
    {
        color: #1b1b3b;
        font-weight: 700;
    }
    .left-side-h.text-center p {
        font-size: 16px;
    }
    .div-block-5 {
        grid-column-gap: 28px;
        grid-row-gap: 28px;
        text-align: center;
        background-color: #eee;
        border-radius: 50%;
        flex-flow: column;
        justify-content: center;
        align-items: center;
         width: 130px;
        height: 130px;
        margin-left: auto;
        margin-right: auto;
        padding: 40px;
        display: flex;
    }
    .div-block-7 img  
    {
      width: 120px;
      object-fit: cover;
    }
    .video-box {
        position: absolute;
        top: 56px;
        left: 150px;
    }
    .video-box .btn-box {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
       width: 87px;
        height: 87px;
        background-color:#09080814;
        border-radius: 50%;
    }
    .play-now {
        position: relative;
        display: block;
        z-index: 9;
        -webkit-transition: all 300ms ease;
        transition: all 300ms ease;
    }
    .video-box .btn-box .icon {
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        color: #fff
        width: 79px;
        height: 79px;
        line-height: 79px;
        font-size: 15px;
        border-radius: 50%;
        margin: 0 auto;
        background-color: transparent;
        border: 2px solid var(--theme-color-light);
        -webkit-transition: all 300ms ease;
        transition: all 300ms ease;
    }
    .btn-box img 
    {
    width: 25px;
    object-fit: cover;
    }

    .testim {
        width: 100%;
        position: relative;
        top: 15%;
        -webkit-transform: translatey(0%);
        -moz-transform: translatey(0%);
        -ms-transform: translatey(0%);
        -o-transform: translatey(0%);
        transform: translatey(0%);
    }

    .testim .wrap {
        position: relative;
        width: 100%;
        max-width: 1020px;
        padding: 10px 20px 20px;
        margin: auto;
    }

    .testim .arrow {
        display: block;
        position: absolute;
        color: #eee;
        cursor: pointer;
        font-size: 2em;
        top: 50%;
        -webkit-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        -moz-transform: translateY(-50%);
        -o-transform: translateY(-50%);
        transform: translateY(-50%);
        -webkit-transition: all .3s ease-in-out;    
        -ms-transition: all .3s ease-in-out;    
        -moz-transition: all .3s ease-in-out;    
        -o-transition: all .3s ease-in-out;    
        transition: all .3s ease-in-out;
        padding: 5px;
        z-index: 22222222;
    }

    .testim .arrow:before {
        cursor: pointer;
    }

    .testim .arrow:hover {
        color: #ea830e;
    }
        

    .testim .arrow.left {
        left: 10px;
    }

    .testim .arrow.right {
        right: 10px;
    }

    .testim .dots {
        text-align: center;
        position: absolute;
        width: 100%;
        bottom: 0px;
        left: 0;
        display: block;
        z-index: 3333;
        height: 12px;
    }

    .testim .dots .dot {
        list-style-type: none;
        display: inline-block;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        border: 1px solid #eee;
        margin: 0 10px;
        cursor: pointer;
        -webkit-transition: all .5s ease-in-out;    
        -ms-transition: all .5s ease-in-out;    
        -moz-transition: all .5s ease-in-out;    
        -o-transition: all .5s ease-in-out;    
        transition: all .5s ease-in-out;
        position: relative;
    }

    .testim .dots .dot.active,
    .testim .dots .dot:hover {
        background: #ea830e;
        border-color: #ea830e;
    }

    .testim .dots .dot.active {
        -webkit-animation: testim-scale .5s ease-in-out forwards;   
        -moz-animation: testim-scale .5s ease-in-out forwards;   
        -ms-animation: testim-scale .5s ease-in-out forwards;   
        -o-animation: testim-scale .5s ease-in-out forwards;   
        animation: testim-scale .5s ease-in-out forwards;   
    }
        
    .testim .cont {
        position: relative;
        overflow: hidden;
    }

    .testim .cont > div {
        text-align: center;
        position: absolute;
        top: 0;
        left: 0;
        padding: 0 0 20px 0;
        opacity: 0;
    }

    .testim .cont > div.inactive {
        opacity: 1;
    }
        

    .testim .cont > div.active {
        position: relative;
        opacity: 1;
    }
        

    .testim .cont div .img img {
        display: block;
        width: 100px;
        height: 100px;
        margin: auto;
        border-radius: 50%;
    }

    .testim .cont div h2 {
        color: #ea830e;
        font-size: 1em;
        margin: 0px 0;
    }

    .testim .cont div p {
        font-size: 1.15em;
        color: #000;
        width: 80%;
        margin: auto;
    }

    .testim .cont div.active .img img {
        -webkit-animation: testim-show .5s ease-in-out forwards;            
        -moz-animation: testim-show .5s ease-in-out forwards;            
        -ms-animation: testim-show .5s ease-in-out forwards;            
        -o-animation: testim-show .5s ease-in-out forwards;            
        animation: testim-show .5s ease-in-out forwards;            
    }

    .testim .cont div.active h2 {
        -webkit-animation: testim-content-in .4s ease-in-out forwards;    
        -moz-animation: testim-content-in .4s ease-in-out forwards;    
        -ms-animation: testim-content-in .4s ease-in-out forwards;    
        -o-animation: testim-content-in .4s ease-in-out forwards;    
        animation: testim-content-in .4s ease-in-out forwards;    
    }

    .testim .cont div.active p {
        -webkit-animation: testim-content-in .5s ease-in-out forwards;    
        -moz-animation: testim-content-in .5s ease-in-out forwards;    
        -ms-animation: testim-content-in .5s ease-in-out forwards;    
        -o-animation: testim-content-in .5s ease-in-out forwards;    
        animation: testim-content-in .5s ease-in-out forwards;    
    }

    .testim .cont div.inactive .img img {
        -webkit-animation: testim-hide .5s ease-in-out forwards;            
        -moz-animation: testim-hide .5s ease-in-out forwards;            
        -ms-animation: testim-hide .5s ease-in-out forwards;            
        -o-animation: testim-hide .5s ease-in-out forwards;            
        animation: testim-hide .5s ease-in-out forwards;            
    }

    .testim .cont div.inactive h2 {
        -webkit-animation: testim-content-out .4s ease-in-out forwards;        
        -moz-animation: testim-content-out .4s ease-in-out forwards;        
        -ms-animation: testim-content-out .4s ease-in-out forwards;        
        -o-animation: testim-content-out .4s ease-in-out forwards;        
        animation: testim-content-out .4s ease-in-out forwards;        
    }
    .info-mid.box-shade.top-roll {
        transform: scale(1.15);
        margin-top: 50px;
        z-index: 9;
        position: relative;
        background: #f7f9fa;
    }
    .testim .cont div.inactive p {
        -webkit-animation: testim-content-out .5s ease-in-out forwards;    
        -moz-animation: testim-content-out .5s ease-in-out forwards;    
        -ms-animation: testim-content-out .5s ease-in-out forwards;    
        -o-animation: testim-content-out .5s ease-in-out forwards;    
        animation: testim-content-out .5s ease-in-out forwards;    
    }
    .img-responsive{
        max-width: 100%;
    }

    @-webkit-keyframes testim-scale {
        0% {
            -webkit-box-shadow: 0px 0px 0px 0px #eee;
            box-shadow: 0px 0px 0px 0px #eee;
        }

        35% {
            -webkit-box-shadow: 0px 0px 10px 5px #eee;        
            box-shadow: 0px 0px 10px 5px #eee;        
        }

        70% {
            -webkit-box-shadow: 0px 0px 10px 5px #ea830e;        
            box-shadow: 0px 0px 10px 5px #ea830e;        
        }

        100% {
            -webkit-box-shadow: 0px 0px 0px 0px #ea830e;        
            box-shadow: 0px 0px 0px 0px #ea830e;        
        }
    }

    @-moz-keyframes testim-scale {
        0% {
            -moz-box-shadow: 0px 0px 0px 0px #eee;
            box-shadow: 0px 0px 0px 0px #eee;
        }

        35% {
            -moz-box-shadow: 0px 0px 10px 5px #eee;        
            box-shadow: 0px 0px 10px 5px #eee;        
        }

        70% {
            -moz-box-shadow: 0px 0px 10px 5px #ea830e;        
            box-shadow: 0px 0px 10px 5px #ea830e;        
        }

        100% {
            -moz-box-shadow: 0px 0px 0px 0px #ea830e;        
            box-shadow: 0px 0px 0px 0px #ea830e;        
        }
    }

    @-ms-keyframes testim-scale {
        0% {
            -ms-box-shadow: 0px 0px 0px 0px #eee;
            box-shadow: 0px 0px 0px 0px #eee;
        }

        35% {
            -ms-box-shadow: 0px 0px 10px 5px #eee;        
            box-shadow: 0px 0px 10px 5px #eee;        
        }

        70% {
            -ms-box-shadow: 0px 0px 10px 5px #ea830e;        
            box-shadow: 0px 0px 10px 5px #ea830e;        
        }

        100% {
            -ms-box-shadow: 0px 0px 0px 0px #ea830e;        
            box-shadow: 0px 0px 0px 0px #ea830e;        
        }
    }

    @-o-keyframes testim-scale {
        0% {
            -o-box-shadow: 0px 0px 0px 0px #eee;
            box-shadow: 0px 0px 0px 0px #eee;
        }

        35% {
            -o-box-shadow: 0px 0px 10px 5px #eee;        
            box-shadow: 0px 0px 10px 5px #eee;        
        }

        70% {
            -o-box-shadow: 0px 0px 10px 5px #ea830e;        
            box-shadow: 0px 0px 10px 5px #ea830e;        
        }

        100% {
            -o-box-shadow: 0px 0px 0px 0px #ea830e;        
            box-shadow: 0px 0px 0px 0px #ea830e;        
        }
    }

    @keyframes testim-scale {
        0% {
            box-shadow: 0px 0px 0px 0px #eee;
        }

        35% {
            box-shadow: 0px 0px 10px 5px #eee;        
        }

        70% {
            box-shadow: 0px 0px 10px 5px #ea830e;        
        }

        100% {
            box-shadow: 0px 0px 0px 0px #ea830e;        
        }
    }

    @-webkit-keyframes testim-content-in {
        from {
            opacity: 0;
            -webkit-transform: translateY(100%);
            transform: translateY(100%);
        }
        
        to {
            opacity: 1;
            -webkit-transform: translateY(0);        
            transform: translateY(0);        
        }
    }

    @-moz-keyframes testim-content-in {
        from {
            opacity: 0;
            -moz-transform: translateY(100%);
            transform: translateY(100%);
        }
        
        to {
            opacity: 1;
            -moz-transform: translateY(0);        
            transform: translateY(0);        
        }
    }

    @-ms-keyframes testim-content-in {
        from {
            opacity: 0;
            -ms-transform: translateY(100%);
            transform: translateY(100%);
        }
        
        to {
            opacity: 1;
            -ms-transform: translateY(0);        
            transform: translateY(0);        
        }
    }

    @-o-keyframes testim-content-in {
        from {
            opacity: 0;
            -o-transform: translateY(100%);
            transform: translateY(100%);
        }
        
        to {
            opacity: 1;
            -o-transform: translateY(0);        
            transform: translateY(0);        
        }
    }

    @keyframes testim-content-in {
        from {
            opacity: 0;
            transform: translateY(100%);
        }
        
        to {
            opacity: 1;
            transform: translateY(0);        
        }
    }

    @-webkit-keyframes testim-content-out {
        from {
            opacity: 1;
            -webkit-transform: translateY(0);
            transform: translateY(0);
        }
        
        to {
            opacity: 0;
            -webkit-transform: translateY(-100%);        
            transform: translateY(-100%);        
        }
    }

    @-moz-keyframes testim-content-out {
        from {
            opacity: 1;
            -moz-transform: translateY(0);
            transform: translateY(0);
        }
        
        to {
            opacity: 0;
            -moz-transform: translateY(-100%);        
            transform: translateY(-100%);        
        }
    }

    @-ms-keyframes testim-content-out {
        from {
            opacity: 1;
            -ms-transform: translateY(0);
            transform: translateY(0);
        }
        
        to {
            opacity: 0;
            -ms-transform: translateY(-100%);        
            transform: translateY(-100%);        
        }
    }

    @-o-keyframes testim-content-out {
        from {
            opacity: 1;
            -o-transform: translateY(0);
            transform: translateY(0);
        }
        
        to {
            opacity: 0;
            transform: translateY(-100%);        
            transform: translateY(-100%);        
        }
    }

    @keyframes testim-content-out {
        from {
            opacity: 1;
            transform: translateY(0);
        }
        
        to {
            opacity: 0;
            transform: translateY(-100%);        
        }
    }

    @-webkit-keyframes testim-show {
        from {
            opacity: 0;
            -webkit-transform: scale(0);
            transform: scale(0);
        }
        
        to {
            opacity: 1;
            -webkit-transform: scale(1);       
            transform: scale(1);       
        }
    }

    @-moz-keyframes testim-show {
        from {
            opacity: 0;
            -moz-transform: scale(0);
            transform: scale(0);
        }
        
        to {
            opacity: 1;
            -moz-transform: scale(1);       
            transform: scale(1);       
        }
    }

    @-ms-keyframes testim-show {
        from {
            opacity: 0;
            -ms-transform: scale(0);
            transform: scale(0);
        }
        
        to {
            opacity: 1;
            -ms-transform: scale(1);       
            transform: scale(1);       
        }
    }

    @-o-keyframes testim-show {
        from {
            opacity: 0;
            -o-transform: scale(0);
            transform: scale(0);
        }
        
        to {
            opacity: 1;
            -o-transform: scale(1);       
            transform: scale(1);       
        }
    }

    @keyframes testim-show {
        from {
            opacity: 0;
            transform: scale(0);
        }
        
        to {
            opacity: 1;
            transform: scale(1);       
        }
    }

    @-webkit-keyframes testim-hide {
        from {
            opacity: 1;
            -webkit-transform: scale(1);       
            transform: scale(1);       
        }
        
        to {
            opacity: 0;
            -webkit-transform: scale(0);
            transform: scale(0);
        }
    }

    @-moz-keyframes testim-hide {
        from {
            opacity: 1;
            -moz-transform: scale(1);       
            transform: scale(1);       
        }
        
        to {
            opacity: 0;
            -moz-transform: scale(0);
            transform: scale(0);
        }
    }

    @-ms-keyframes testim-hide {
        from {
            opacity: 1;
            -ms-transform: scale(1);       
            transform: scale(1);       
        }
        
        to {
            opacity: 0;
            -ms-transform: scale(0);
            transform: scale(0);
        }
    }

    @-o-keyframes testim-hide {
        from {
            opacity: 1;
            -o-transform: scale(1);       
            transform: scale(1);       
        }
        
        to {
            opacity: 0;
            -o-transform: scale(0);
            transform: scale(0);
        }
    }

    @keyframes testim-hide {
        from {
            opacity: 1;
            transform: scale(1);       
        }
        
        to {
            opacity: 0;
            transform: scale(0);
        }
    }

    @media all and (max-width: 300px) {
      body {
        font-size: 14px;
      }
    }

    @media all and (max-width: 500px) {
      .testim .arrow {
        font-size: 1.5em;
      }
      
      .testim .cont div p {
        line-height: 25px;
      }

    }
</style>
   <section class="main-sects">
   	<div class="container">
   		<div class="row">
   			<div class="col-md-3">
   			</div>
   			<div class="col-md-6">
   				<div class="para-1">
   					<h3><strong class="c-1">Congrats!</strong><b>You`ve Scored the lowest price <i class="fa-solid fa-lock-open"></i></b></h3>
   					<p>Join your treatment is reserved for 00:00:11</p>  				
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
   			<div class="col-md-4">
          <div class="info-mid box-shade our-bhind">
             <div class="left-side-h text-center">             
            <h3><span>Quick. Simple.</span><br>Safe. Convenint.</h3>
           
               <p>No waiting rooms, no trips to the<br> doctor, no insurance or co-pays. </p>
            </div>
      
               <ul class="list-unstyled contact-details__info">
                <li>
                  <div class="icon icon-leftbar">
                    <img src="{{ url('public/quiz-assets/images/money-bag.png') }}" alt="">
                  </div>
                  <div class="text text-leftbar">
                    <h6>The <span class="color-red">Lowest Price</span></h6>
                    <p>Per Pill, Guaranteed</p>
                  </div>
                </li>
                <li>
                  <div class="icon icon-leftbar">
                    <img src="{{ url('public/quiz-assets/images/management-service.png') }}" alt="">
                  </div>
                  <div class="text text-leftbar">
                    <h6> The <span class="color-red">Personalized</span></h6>
                   <p>Telehealth Review</p>
                  </div>
                </li>
                <li>
                  <div class="icon icon-leftbar">
                  <img src="{{ url('public/quiz-assets/images/medical-record.png') }}" alt="">
                  </div>
                  <div class="text text-leftbar">
                    <h6> Branded &amp; Generic </h6>
                  <p><span class="color-red">Treatments </span>for Men</p>
                  
                  </div>
                </li>
                 <li>
                  <div class="icon icon-leftbar">
                   <img src="{{ url('public/quiz-assets/images/delivery-truck.png') }}" alt="">
                  </div>
                  <div class="text text-leftbar ">
                    <h6> Free <span class="color-red">Delivery </span></h6>
                 <p>Direct From the Phamacy</p>
                  
                  </div>
                </li>
                 <li>
                  <div class="icon icon-leftbar">
                   <img src="{{ url('public/quiz-assets/images/medicine.png') }}" alt="">
                  </div>
                  <div class="text text-leftbar">

                    <h6> Contined <span class="color-red">Medical </span></h6>
                 <p>Telehealth Support</p>
                  
                  </div>
                </li>
              </ul>
                <p>INCLUDED WITH ALL PRESCRIPTION</p>
              <div class="down-content">

          <h3><span>More Than Just</span> ED Treatments</h3>
          <p>Your prescription comes with free medical guidance,<br>Message your Rex MD physician anytime without co-<br>pays or waiting rooms.</p>
        </div>
        <div class="div-block-5">
                    <div class="div-block-7">
                      <img src="{{ url('public/quiz-assets/images/doctor.jpg') }}" alt="" class="img-responsive">
                    </div>
                </div>
   			</div>
      </div>
   			<div class="col-md-4">
   		<form action="{{ route('patientShippingInformation') }}" method="post">
   		    @csrf
          <div class="info-mid box-shade">
   				<div class="para-2">
            <div class="left-side-h">
   					<p>ORDER DETAILS</p>  				
   					<h2><b>{{ $patient_form_data->selector35 }}<br>{{ $patient_form_data->selector33 }}</b></h2>
   					<div class="one-side-text">
   					<span>{{$month_num}} Month Supply, {{ $patient_form_data->selector34 }} tablets<br>Every {{$month_num}} month</span> </div>
   					</div>
                      <img src="{{ $medications->image }}">
                      <input type="hidden" name="medician_image" value="{{ $medications->image }}">
   				</div>
   	          <div class="para-3">
   					<p>ORDER SUMMARY</p>
   				
   					<table class="form-tab">
   						<tr class="table-1">
   							<td>Free Physician Consult <!--<del>($40 Value)</del>--></td>
   							<td class="table-td"><b>FREE</b></td>
   						</tr>
   						<tr>
   							<td>Shipping <!--<del>($14 Value)</del>-->
   							</td>
   							<td class="table-td"><b>FREE</b></td>
   						</tr>
   						{{--<tr>
   							<td>Testosterone Support</td>
   							<td class="table-td"><b>FREE</b></td>
   						</tr>--}}
   						<tr>
   							<td>Product Total</td>
   							<td class="table-td"><b>${{$TotalPrice}}</b></td>
   						</tr>
   						<tr>
   							<td class="danger">Discount</td>
   							<td class="danger table-td"><b>-${{$DiscountedPrice}}</b></td>
   							<input type="hidden" name="total_discount" value="{{$DiscountedPrice}}">
   						</tr>
   						<tr class="table-2">
   							<td class="danger-1">Today`s Discounted Total</td>
   							<td class="danger-2 table-td"><sup>USD</sup>{{ $TotalPrice-$DiscountedPrice }}</td>
                            <input type="hidden" name="total_amount" value="{{ $TotalPrice-$DiscountedPrice }}">
   						</tr>

   					</table>

   				</div>
   				 <div class="bt-shop">
                          <div class="col-md-12 text-center p-0">
                                <button type="submit" class="m-auto btn btn-primary" type="submit">NEXT STEP <i class="fa-solid fa-chevron-right"></i></button>
                                
                                <button class="m-auto btn btn-primary gray-btn" type="submit"><a href="{{ route('medicineSupply') }}" style="color:#000"><i class="fa-solid fa-chevron-left"></i> PREVIOUS STEP</a></button>
                                
                            </div>
                        </div>
                         <div class="images-content text-center">
           
                   <img src="{{ url('public/quiz-assets/images/trustpilot.png') }}" alt="">
        </div>
        <div class="row">
          <div class="col-md-4">
            <ul class="list-unstyled contact-details__info">
                <li>
                  <div class="icon">
                        <img src="{{ url('public/quiz-assets/images/prescription.png') }}" alt="">

                   
                  </div>
                  <div class="text">
                    <p>U.S. LICENSED PHARMACY</p>
                   
                  </div>
                </li>
              </ul>
          </div>
           <div class="col-md-4">
               <ul class="list-unstyled contact-details__info">
                <li>
                  <div class="icon">
                        <img src="{{ url('public/quiz-assets/images/medical-symbol.png') }}" alt="">
                  </div>
                  <div class="text">
                    <p>HEALTHCARE MADE SIMPLE</p>
              
                  </div>
                </li>
              </ul>
          </div>
           <div class="col-md-4">
               <ul class="list-unstyled contact-details__info">
                <li>
                  <div class="icon">
                        <img src="{{ url('public/quiz-assets/images/doctor.png') }}" alt="">
                  </div>
                  <div class="text">
                    <p>U.S.LICENSED PHYSICIANS</p>
                  </div>
                </li>
              </ul>
          </div>
        </div>
        <div class="down-content">
          <p class="color-red">Important Safety Information</p>
          <h3><span>Satisfacation</span> Guaranted</h3>
          <p>Improve your symptoms & lifestyle, worry-free</p>
        </div>
                        </div>
        </form>
   			</div>
   			<div class="col-md-4">
          <div class="info-mid box-shade our-bhind">
          <div class="right-side-bar">
            <div class="right-side-bar-image">
              <img src="{{ url('public/quiz-assets/images/doctor.jpg') }}" alt="" class="img-responsive">
            </div>
           <div class="video-box">
<div class="btn-box">
<a href="" class="play-now lightbox-image" data-fancybox="gallery" data-caption="">
<img src="{{ url('public/quiz-assets/images/play.png') }}" alt="">
</a>
</div>
</div>
          </div>
          <div class="down-content">
          <h3><span>Lowest ED Prices...</span> <br>Guaranted</h3>
         
        </div>
         <p>We've cut out the middleman so we can provide the exact same meds cheaper than any competitor or we'll match it..</p>
          <div class="icon-image-right text-center">
            <img src="{{ url('public/quiz-assets/images/tablet.png') }}" alt="">
          </div>
          <section id="testim" class="testim">
<!--         <div class="testim-cover"> -->
            <div class="wrap">

                <span id="right-arrow" class="arrow right fa fa-chevron-right"></span>
                <span id="left-arrow" class="arrow left fa fa-chevron-left "></span>
                <ul id="testim-dots" class="dots">
                    <li class="dot active"></li><!--
                    --><li class="dot"></li><!--
                    --><li class="dot"></li><!--
                    --><li class="dot"></li><!--
                    --><li class="dot"></li>
                </ul>
                <div id="testim-content" class="cont">
                    
                    <div class="active">
                       
                        <h2>R. A. Rao</h2>
                        <span><i class="fa fa-star-o" aria-hidden="true"></i>
                          <i class="fa fa-star-o" aria-hidden="true"></i>
                          <i class="fa fa-star-o" aria-hidden="true"></i>
                          <i class="fa fa-star-o" aria-hidden="true"></i>
                          <i class="fa fa-star-o" aria-hidden="true"></i>
                        </span>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>                    
                    </div>

                    <div>
                     
                        <h2>Aman Singh</h2>
                        <span><i class="fa fa-star-o" aria-hidden="true"></i>
                          <i class="fa fa-star-o" aria-hidden="true"></i>
                          <i class="fa fa-star-o" aria-hidden="true"></i>
                          <i class="fa fa-star-o" aria-hidden="true"></i>
                          <i class="fa fa-star-o" aria-hidden="true"></i>
                        </span>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>                    
                    </div>

                    <div>
                     
                        <h2>Sara Chakraborty</h2>
                        <span><i class="fa fa-star-o" aria-hidden="true"></i>
                          <i class="fa fa-star-o" aria-hidden="true"></i>
                          <i class="fa fa-star-o" aria-hidden="true"></i>
                          <i class="fa fa-star-o" aria-hidden="true"></i>
                          <i class="fa fa-star-o" aria-hidden="true"></i>
                        </span>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>                    
                    </div>

                    <div>
              
                        <h2>Aryan Sidana</h2>
                        <span><i class="fa fa-star-o" aria-hidden="true"></i>
                          <i class="fa fa-star-o" aria-hidden="true"></i>
                          <i class="fa fa-star-o" aria-hidden="true"></i>
                          <i class="fa fa-star-o" aria-hidden="true"></i>
                          <i class="fa fa-star-o" aria-hidden="true"></i>
                        </span>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>                    
                    </div>

                    <div>
                       
                        <h2>Aadriti Jha</h2>
                        <span><i class="fa fa-star-o" aria-hidden="true"></i>
                          <i class="fa fa-star-o" aria-hidden="true"></i>
                          <i class="fa fa-star-o" aria-hidden="true"></i>
                          <i class="fa fa-star-o" aria-hidden="true"></i>
                          <i class="fa fa-star-o" aria-hidden="true"></i>
                        </span>

                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>                    
                    </div>

                </div>

            </div>
<!--         </div> -->
    </section>
     <div class="down-content mt-200">
          <h3><span>The</span> Best Choice <span>for <br> ED Meds Online</span></h3>
        </div>
         <div class="div-block-5">
                    <div class="div-block-7">
                      <img src="{{ url('public/quiz-assets/images/doctor.jpg') }}" alt="" class="img-responsive">
                    </div>
                </div>
   			</div>
   		</div>
   		   	</div>
   		   	</div>
   </section>

@endsection