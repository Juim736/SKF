<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Samsuddin Kadir Foundation</title>
    <link rel="stylesheet" href="{{ asset('/assets')}}/css/bootstrap-4.min.css">
    <!-- Font Icon -->
    <link rel="stylesheet" href="{{asset('/assets/login/')}}/fonts/material-icon/css/material-design-iconic-font.min.css">
    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('/assets/login/')}}/css/style.css">
    <style>
        .main-content{
            margin-top: 20px;
        }
        .error{
            color: red;
        }
    </style>
</head>
<body>

    @yield('main-content')
   
  <script src="{{ asset('/assets') }}/script/jquery3.min.js" type="text/javascript"></script>
  <script src="{{ asset('/assets')}}/script/jquery-validate.min.js" type="text/javascript"></script>

  <script>
      $(document).ready(function(){
        $('.close').click(function(){
            $(this).parent().hide();
        })
      });
  </script>
   @yield('footer_script')
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>