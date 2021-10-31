<!DOCTYPE html>
<html>
<head>
  <title>Wypisy z licencji / zezwolenia</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      <style>
            /** Define the margins of your page **/
            body {
          font-family: DejaVu Sans;
          font-size: 12px;
          margin: 10px 10px 0 0;
      }
            @page {
               margin: 10px 10px 0 0;

            }

        </style>
</head>
<body>

<div class="container">
<div class="card uper">

  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div>
    @endif
       <div class="row">
        <div style="text-align: right;">Stan na dzień: @if(empty($stan->data_wyd)) brak danych @else {{$stan->data_wyd}} @endif r.</div>
        <div style="margin-left: 10px;">
          <div>
              <div style="font-weight: bold;">{{$przedsiebiorca->nazwa_firmy }} <br />{{$przedsiebiorca->adres}}<br />{{$przedsiebiorca->kod_p}} {{$przedsiebiorca->miejscowosc}}
                <br />
              <strong>NIP</strong>: {{$przedsiebiorca->nip}}
              </div>
              <p><strong>Rodzaj:</strong>@if($przedsiebiorca->id_osf=='1')
               Osoba fizyczna
              @elseif($przedsiebiorca->id_osf=='2')
               Sp. z o.o.
              @elseif($przedsiebiorca->id_osf=='3')
               Sp. z o.o. Sp. K.
              @elseif($przedsiebiorca->id_osf=='4')
               Sp. J.
              @elseif($przedsiebiorca->id_osf=='5')
               Sp. C.
              @endif</p>

          </div>

        </div>
       </div>
         <div class="row">
             @foreach($dok as $dk)

             @endforeach
           <div class="text-center">
             @if($dk->nazwa == 'Zezwolenie')
             <span style="font-size:16px;font-weight: bold;"> Wypisy z zezwolenia </span> <br/>
             @elseif($dk->nazwa == 'Licencja')
             <span style="font-size:16px;font-weight: bold;"> Wypisy z licencji </span> <br/>
             @elseif($dk->nazwa == 'Licencja osób 7-9')
             <span style="font-size:16px;font-weight: bold;"> Wypisy z licencji osób 7-9</span> <br/>
             @elseif($dk->nazwa == 'Zaświadczenie')
             <span style="font-size:16px;font-weight: bold;"> Wypisy z zaświadczenia </span> <br/>
             @endif
             <span style="font-size:13px;font-weight: bold;"> Nr:  {{ $dk->nr_dok }}</span>
          </div>
        </div>
        <div class="row">&nbsp;</div>
         <div class="col-md-12">

        <table class="table table-bordered table-striped table-sm">
         <thead class="table-primary text-center" style="font-weight:bold;">
              <tr>
                <td style="width:55px;">Nr wypisu</td>
                <td style="width:65px;">Nr druku</td>
                <td style="width:90px;">Nazwa</td>
                <td style="width:75px;">Rodzaj wypisu</td>
                <td style="width:75px;">Data wniosku</td>
                <td style="width:75px;">Data wydania</td>
              </tr>
          </thead>
          <tbody class="text-center">

              @foreach($wypisy as $wp)
              <tr>
                <td  @if($wp->status=='2') class="bg-danger text-light" @else  @endif>{{$wp->nr_wyp}}<br /> <span style="font-size: 10px;color: #ffe100;">{{$wp->dat_dep_wp}}</span></td>
                <td  @if($wp->status=='2') class="bg-danger text-light" @else  @endif>{{$wp->nr_druku}}</td>
                  <td>{{$wp->nazwa}}</td>
                  <td>{{$wp->rodzaj_wyp}}</td>
                  <td>{{$wp->data_wn}}</td>
                  <td>{{$wp->data_wyd}}</td>

              </tr>
              @endforeach
          </tbody>
        </table>

         </div>
       </div>
 </div>

</div>
</div>
</body>
</html>
