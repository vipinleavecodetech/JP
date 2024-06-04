<?php
if (isset($_POST['submit'])) {

    if (empty($_POST['name'])) {
        $errors[] = 'Name cannot be empty!';
    } else {
        $name = $_POST['name'];
    }

    if (empty($_POST['number'])) {
        $errors[] = 'Number cannot be empty!';
    } else {
        $number = $_POST['number'];
    }

    if (empty($_POST['email'])) {
        $errors[] = 'Email cannot be empty!';
    } else {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) == false) {
            $errors[] = "Invalid Email Format";
        } else {
            $email = $_POST['email'];
        }
    }

    if (empty($_POST['message'])) {
        $errors[] = 'Message cannot be empty!';
    } else {
        $messages = $_POST['message'];
    }

    if (empty($errors)) {
        $to = '123@goodhorizons.com';
        $subject = 'Message via Buckinghamshire Pest Control';
        $headers = "From: New msg ! <admin@forwardwebsites.com> \r\n";
        $headers = "To: <enquiries@buckinghamshirepestcontrol.com> \r\n";
        $headers = "Bcc: <chrispemble@gmail.com> \r\n";
        $headers .= "Reply-To:" . $email . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $message = '<html><body>';
        $message .= '<br/>Hi,<br/>You have a new message via your website, details are as follows:<br><br>
        Name: ' . $name . ' <br>
        Number: ' . $number . ' <br>
        Email: ' . $email . ' <br>
        Message: ' . $messages . ' <br>
        ';
        $message .= '<table rules="all" style="border:none" cellpadding="10">';
        $message .= "</table>";
        $message .= "</body><br/><br/></html>";

        if (mail($to, $subject, $message, $headers)) {
            $msgs[] = "Mail sent!";
            header('location: https://www.buckinghamshirepestcontrol.com/thank-you/');
        } else {
            $errors[] = 'Email could not be sent!';
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <!-- Include jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Include reCAPTCHA library -->
    <!-- <script src="https://www.google.com/recaptcha/api.js" async defer></script> -->
    <script src="https://www.google.com/recaptcha/api.js"></script>
      <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 500px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
        }

        .text-danger {
            color: red;
        }

        .text-center {
            text-align: center;
        }

        input[type="submit"], button[type="button"]{
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="button"]{
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover, button[type="button"]:hover {
            background-color: #45a049;
        }
        .allcap {
            display: flex;
            gap: 20px;
        }
        .cap-left {
            width: 60%;
        }
        .cap-right {
            width: 40%;
            float: right;
            margin-top: 14px;
        }
    </style>
</head>
<body>
<div class="container">
<form id="myForm" name="myForm" action="" method="post" accept-charset="utf-8" autocomplete="off">
    <div class="form-group">
        <label for="name">Your Name</label>
        <input name="name" type="text" class="form-control" id="name" required>
    </div>
    <div class="form-group">
        <label for="email">Email Address</label>
        <input required name="email" type="email" class="form-control" id="email">
        <span id="email_error" class="text-danger"></span>
    </div>
    <div class="form-group">
        <label for="number">Phone Number</label>
        <input required name="number" type="number" class="form-control" id="number">
    </div>
    <div class="form-group">
        <label for="message">Message</label>
        <textarea name="message" class="form-control" id="message" rows="6" required></textarea>
        <span id="message_err" class="text-danger"></span>
    </div>

    <!-- <div class="form-group">
        <div class="g-recaptcha" data-sitekey="6LcNIrkpAAAAACOmIjfllKbUryPOaLr3btfRvaLz" data-callback="recaptchaCallback" required></div>
        <span id="captcha_err" class="text-danger"></span>
    </div> -->

    <div class="form-group allcap">
        <div class="cap-left">
            <label for="captcha_question" id="captcha_question"></label>
            <input type="text" name="captcha" id="captcha" class="form-control" required>
            <input type="hidden" name="captcha_answer" id="captcha_answer">
            <span id="captcha_err" class="text-danger"></span>
        </div>
        <div class="cap-right">
            <button type="button" onclick="generateCaptcha()">Generate CAPTCHA</button>
        </div>
    </div>

    <div class="form-group">
        <input type="submit" name="submit" value="Submit">
    </div>
</form>
</div>
</div>

<script>
    function generateCaptcha() {
        // Generate two random numbers between 1 and 10
        var num1 = Math.floor(Math.random() * 10) + 1;
        var num2 = Math.floor(Math.random() * 10) + 1;

        // Choose a random operator
        var operators = ['+', '-', '*']; // You can add more operators if needed
        var operator = operators[Math.floor(Math.random() * operators.length)];

        // Generate the captcha question
        var question = num1 + ' ' + operator + ' ' + num2;

        // Calculate the answer
        var answer;
        switch (operator) {
            case '+':
                answer = num1 + num2;
                break;
            case '-':
                answer = num1 - num2;
                break;
            case '*':
                answer = num1 * num2;
                break;
        }

        // Display the question
        document.getElementById('captcha_question').textContent = question;

        // Store the answer in a hidden input field
        document.getElementById('captcha_answer').value = answer;
    }
</script>

 <script>
        window.onload = generateCaptcha;
    </script>

<script>
    $(document).ready(function() {
        $('#myForm').on('submit', function(event) {
            var emailInput = $("#email").val();
            var emailError = $("#email_error");

            if (emailInput.trim() === "") {
                emailError.text("Email address is required.");
                event.preventDefault();
            } else if (!validateEmail(emailInput)) {
                emailError.text("Invalid email address.");
                event.preventDefault();
            } else {
                emailError.text("");
            }

            var messageInput = $("#message").val();
            if (messageInput.length <= 10) {
                $("#message_err").text("Message should be at least 10 characters!");
                event.preventDefault();
            } else {
                $("#message_err").text("");
            }

            // var response = grecaptcha.getResponse();
            // if (response.length === 0) {
            //     $("#captcha_err").text("Please complete the reCAPTCHA.");
            //     event.preventDefault();
            // } else {
            //     $("#captcha_err").text("");
            // }
            var captcha_answer = $("#captcha_answer").val();
            var user_answer = $("#captcha").val();
            if (user_answer !== captcha_answer) {
                $("#captcha_err").text("Incorrect answer");
                event.preventDefault();
            } else {
                $("#captcha_err").text("");
            } 
        });

        function validateEmail(email) {
            // Email validation regex pattern
            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailPattern.test(email);
        }
    });
</script>

</body>
</html>
