<!DOCTYPE html>
<html>
<head>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
  <title>Hi</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <script src="{{asset("/js/all.js")}}"></script>
        <link href="{{asset("/css/all.css")}}" rel="stylesheet">
        <script src="{{asset("/vendor/tinymce/tinymce.min.js")}}"></script>


     <style>

            body {
              margin-bottom: $height-footer;
            }
            #footer {
              bottom: 0;
              width: 98.5%;
              position: absolute;
              height: $height-footer;

              .footer-block {
                margin: 20px;
              }
            }


     </style>
    </head>
    <body>
        <div>
                @include('sweetalert::alert')

            @yield('content')

        </div>

    </body>
</html>
