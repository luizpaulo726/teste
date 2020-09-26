<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>santri</title>

        <!-- jQuery library -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="{{asset('static/css/w3.css')}}">
    <link rel="stylesheet" href="{{asset('static/css/santri.css')}}">
    <link rel="stylesheet" href="{{asset('static/css/toastr.css')}}">

    <link rel="stylesheet" href="{{asset('static/css-awesome/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('static/css-awesome/regular.css')}}">

    <link rel="stylesheet" href="{{asset('static/css-awesome/solid.css')}}">
    <link rel="stylesheet" href="{{asset('static/css-awesome/svg-with-js.css')}}">
    <link rel="stylesheet" href="{{asset('static/css-awesome/v4-shims.css')}}">


   

    <style>
      #login {
        max-width: 95%;
        margin: auto;
        width: 380px;
        margin-top: 5%;
      }

      #logo-cliente {
        max-width: 100%;
        margin: auto;
        width: 700px;    
      }

      #logo-santri {
        max-width: 50%;
        margin: auto;
        width: 380px;    
      }
    </style>

  </head>
  <body>


     @hasSection('body')  
        @yield('body')
    @endif  

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    
    <script src="{{asset('static/js/toastr.min.js')}}"></script>

    @hasSection('javascript')
     @yield('javascript')
    @endif   

  </body>
</html>