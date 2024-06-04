<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Heads Up – High Quality Generic ED Medication – Direct to You</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://unpkg.com/@coreui/coreui@2.1.16/dist/css/coreui.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
    <link href="{{ asset('/public/css/custom.css') }}" rel="stylesheet" />
    <link rel="shortcut icon" href="{{ url('public/quiz-assets/images/fav-sm.png')}}">
      <!-- App css -->
      <link href="{{ url('public/quiz-assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
      <link href="{{ url('public/quiz-assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
      <link href="{{ url('public/quiz-assets/css/app.min.css') }}" rel="stylesheet" type="text/css"  id="app-stylesheet" />
      <link href="{{ url('public/quiz-assets/css/quiz.css') }}" rel="stylesheet" type="text/css"  id="app-stylesheet" />
    @yield('styles')
</head>

<body class="authentication-bg" oncontextmenu="return false">
    <div class="app flex-row align-items-center">
        <div class="container">
            @yield("content")
        </div>
    </div>
    @yield('scripts')
    <script>
    document.addEventListener('contextmenu', function(e) {
      e.preventDefault();
    });
    </script>
</body>

</html>
