<!DOCTYPE html>
<html>
<head>

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>T.O.S ver. 1.0</title>
  <title>Hi</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>

            <div class="container" style="font-size: 30px;">
                <div class="text-center" style="margin: 0 auto;"><img src="img/logo.jpg" style="height:250px;padding: 20px;" /></div>
                <div class="row" style="margin-top: 80px;">
                   <div class="col-md-4">
                       <div>
                            @php
                            $zdolnosc = \App\Zdolnosc::where('data_do','<',date('Y-m-d'))->count();
                            $os_zarzzdajaca = \App\Certyfikat::where('dat_umowy','<',date('Y-m-d'))->count();
                            $baza = \App\Baza::where('dat_umowy','<',date('Y-m-d'))->count();
                            $lic = \App\DokumentyPrzed::where('data_waz','<',date('Y-m-d'))->count();
                           @endphp
                        @if($zdolnosc> 0 or $os_zarzzdajaca > 0 or $baza > 0 or $lic >0)
                         <a href="przedsiebiorca/zdarzenia" role="button" class="btn btn-danger" style="margin-bottom:5px;">
                         Zdarzenia&nbsp;<span class="badge badge-light">{{ $zdarzenia = $zdolnosc + $os_zarzzdajaca + $baza + $lic}}</span>
                        <span class="sr-only">unread messages</span>
                        @else
                            <div>
                                &nbsp;
                             </div>
                        @endif

                         </a>
                       </div>
                       <a href="/przedsiebiorca" role="button" class="btn btn-primary" style="font-size:30px;">PRZEDSIĘBIORCY</a>
                   </div>
                   <div class="col-md-4">
                        <div>
                           &nbsp;
                        </div>
                        <a href="/osk" role="button" class="btn btn-success" style="font-size:30px;">OSK i INTRUKTORZY</a></div>
                   <div class="col-md-4">
                        <div>
                           &nbsp;
                         </div>
                        <a href="/skp" role="button" class="btn btn-warning" style="font-size:30px;">SKP i DIAGNOŚCI</a></div>
                </div>
            </div>
            <div style="margin: 0 auto;padding-top: 40px;" class="row">
                <p class="bg-primary col-md-4" style="height:8px;"></p>
                <p class="bg-success col-md-4" style="height:8px;"></p>
                <p class="bg-warning col-md-4" style="height:8px;"></p>
            </div>

    </body>
</html>
