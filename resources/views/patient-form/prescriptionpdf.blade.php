<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prescription</title>
     <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 15px;
            margin: 20px; /* Added margin for better appearance */
        }
        hr {
            margin: 20px 0; /* Added margin around the HR element */
        }
        .head-section {
            display: flex;
            justify-content: space-between; /* To align left and right sections */
        }
        .head-section p {
            width: 100%; /* Adjusted width for better distribution */
            margin: 0; /* Removed default margin */
        }
        p img {
            display: block;
            margin: auto;
        }
        .mid-section {
            margin-top: 20px; /* Added margin for separation from the header */
        }
		p.right {
			text-align: right;
		}
        p.left {
			text-align: left;
		}
    </style>
</head>
<?php
$pdfText = strip_tags($prescription);
$pdfText = str_replace('&nbsp;', ' ', $pdfText);
?>
<body>
    <p style="text-align:center"><img src="{{url('public/quiz-assets/images/logo.svg')}}"></p>
    <hr>
    <div class="head-section">
    <p class="left" style="text-align: left;">Address: 432A, ADCD, New York, USA &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Prescribed By: HEADS UP
    <br>Date: {{date('Y-m-d')}}</p>
    <!--<p class="right" style="text-align: right;">Prescribed By: HEADS UP</p>-->
    </div>
    <hr>
    <div class="mid-section">
        {!! nl2br(e($pdfText)) !!}
    </div>
    <hr>
    <div class="footer-section">
       <p style="text-align:center">HEADS UP @2024</p>
    </div>
</body>
</html>
