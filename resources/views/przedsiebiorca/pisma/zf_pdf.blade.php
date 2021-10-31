<!DOCTYPE html>
<html>
<head>
  <title>Wydruk pisma Zdolność Finansowa po terminie</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

     <style>
          body {
          font-family: DejaVu Sans;
          font-size: 12px;
          padding-left: .5in;
          padding-right: .5in;
          padding-top: .2in;
          padding-bottom: .3in;

          }

          ul, ul >li {
            list-style: none;
          }

          @page {
               margin: 0;
               size: 21cm 29.7cm;
            }

        </style>
</head>
<body>

  <div class="container" style="font-size: 13px;font-family: Arial;width:620px;">

    @php ini_set('max_execution_time', 0); // 0 = Unlimited
    @endphp
     <div></div>
     <div class="page">
        <div> <img src="{{public_path('/img/starostwo.png')}}" alt="profile Pic" width="620px;"></div>
          @foreach ($pisma as $ps)

            {{$ps->tresc}}

          @endforeach
     </div>

  </div>

</body>
</html>























