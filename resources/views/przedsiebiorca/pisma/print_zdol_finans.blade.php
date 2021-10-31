<!DOCTYPE html>
<html>
<head>
  <title>Wydruk pisma - zdolność finansowa po terminie</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="{{asset("/vendor/tinymce/tinymce.min.js")}}"></script>
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

    @foreach($pisma as $ps)

    @endforeach


  <div class="container" style="font-size: 14px;font-family: Arial;width:900px;">
    <form action="{{ url('przedsiebiorca/pisma/podglad', $przedsiebiorca->id)}}" method="post">
        @csrf
        <input type="hidden" name="data_p" value="{{$_GET['data_p']}}" />
        <input type="hidden" name="nr_sprawy" value="{{$_GET['nr_sprawy']}}" />
     <div><!--<input class="btn btn-success" type="submit" value="Zapisz zmiany" />--></div>
     <div> <img src="{{URL::asset('/img/starostwo.png')}}" alt="profile Pic" width="900px;"></div>
     <div><textarea class="form-control" id="pismo" name="tresc" style="height: 100%;">
     <div style="float:right;padding-top:30px;padding-right:40px;">Koszalin dn. {{$data_p = $_GET['data_p']}} r.</div>
     <div style="text-align:left;margin-top:30px;clear:both;padding-left:40px;">{{ $nr_sprawy = $_GET['nr_sprawy']}}</div>
     <div class="row col-4" style="float:right;margin-top: 20px;margin-right: 80px;width:250px;text-align:justify;">
     <strong>{{$przedsiebiorca->nazwa_firmy}}<br/>{{$przedsiebiorca->adres}}<br />{{$przedsiebiorca->kod_p}} {{$przedsiebiorca->miejscowosc}}</strong>
     </div>
            <div style="clear:both;">
                <br /><br />
                <p style="text-align: justify;padding-left:40px;padding-right:40px;"><span style="padding-left:50px;">&nbsp;</span>Starosta Koszaliński
                    na podstawie  art. 83 ust. 1 ustawy z dnia 6 września 2001 r. o transporcie drogowym (Dz. U. z 2019 r., poz. 2140 z późn. zm.) oraz
                    § 2 ust. 3 rozporządzenia Ministra Infrastruktury i Rozwoju z dnia 8 września 2014 roku w sprawie danych i informacji, które
                    przewoźnik drogowy jest obowiązany przekazywać do organu w związku z prowadzoną działalnością w zakresie przewozu
                    drogowego (Dz.U. z 2014 r., poz.1217) nakłada na Pana obowiązek <strong> przedłożenia w terminie 21 dni od dnia
                        otrzymania tego pisma</strong>, dokumentów potwierdzających spełnienie wymagań ustawowych do
                        otrzymanego „zezwolenia na wykonywanie zawodu przewoźnika drogowego” wyrażonego  licencją:</p>
            </div>
            <div style="padding-left:40px;">
                <strong>nr @foreach($dok as $dk) {{$dk->nr_dok}}@endforeach</strong> udzieloną dnia {{$dk->data_wyd}} roku na wykonywanie krajowego transportu drogowego {{$dk->rodz_dok}}. tj.:
            </div>
            <div>
                <br />
            <ul style="list-style: none;">
            <li>
            <p style="text-align: justify;padding-left:40px;padding-right:40px;"><strong>1)</strong> dokumenty potwierdzające spełnienie warunków, o których mowa w art. 7 rozporządzenia (WE) nr 1071/2009 związane z
                wymogiem zdolności finansowej. Przedsiębiorca musi być w stanie w każdym momencie roku finansowego spełnić swoje zobowiązania
                finansowe. W tym celu przedsiębiorca wykazuje na podstawie poświadczonych przez audytora lub odpowiednio upoważnioną osobę
                rocznych sprawozdań finansowych, że co roku dysponuje kapitałem i rezerwami o wartości co  najmniej równej 9 000 EUR w
                przypadku wykorzystywania tylko jednego pojazdu i 5 000 EUR na każdy dodatkowy wykorzystywany pojazd.</p>
            </li>
            <li>
            <p style="text-align: justify;padding-left:40px;padding-right:40px;">
            <strong>2)</strong> wykaz pojazdów zawierający następujące informacje:
            5) markę, typ; 2) rodzaj/przeznaczenie;  3) numer rejestracyjny;  4) numer
                VIN; wskazanie rodzaju tytułu prawnego do dysponowania pojazdem wraz
                z kserokopiami dowodów rejestracyjnych, z aktualnymi badaniami
                technicznymi;</p>
            </li>
        </ul>
            </div>
            <div>
                <p style="text-align: justify;padding-left:40px;padding-right:40px;"><strong>W drodze odstępstwa</strong> właściwy organ może zgodzić się lub wymagać, aby przedsiębiorca wykazał swoją zdolność
                finansową za pomocą zabezpieczenia, takiego jak gwarancja bankowa lub ubezpieczenie, w tym<strong> ubezpieczenie
                odpowiedzialności zawodowej</strong> z jednego lub kilku banków lub innych instytucji finansowych, w tym <strong>przedsiębiorstw
                ubezpieczeniowych</strong>, składających solidarną gwarancję za przedsiębiorstwo na kwoty określone przy posiadaniu pojazdów
                samochodowych przeznaczonych do transportu drogowego.</p>
            </div>
            <div style="margin:0 auto;text-align:center;"><strong>Pouczenie</strong></div>
            <div>
            <p style="text-align: justify;padding-left:40px;padding-right:40px;">Jednocześnie informuję, że jeśli organ udzielający „zezwolenia na wykonywanie zawodu przewoźnika drogowego” wyrażonego licencją
                na wykonywanie krajowego transportu drogowego rzeczy, stwierdzi  niespełnienie przez przedsiębiorcę wymogów będących podstawą
                do wydania tego dokumentu, organ ten zawiesza lub cofa zezwolenie (licencję) na wykonywanie zawodu przewoźnika drogowego.</p>
            </div>
        <div style="padding-top: .5in;padding-left:40px;padding-right:40px;">
            <strong>Otrzymuje:</strong>
        </div>
        <div>
            <ul style="list-style: none;">
            <li> 1. Adresat</li>
            <li> 2. a/a</li>
            </ul>
        </div>
        <div style="padding-top: 2.5in;padding-left:40px;padding-right:40px;">
            <strong>UWAGA: wszelkie informacje można uzyskać pod nr telefonu 94 71 40 116 lub w pokoju nr 115 w Wydziale Komunikacji i Dróg Starostwa Powiatowego w Koszalinie</strong>
        </div>
    </textarea></div>

   </form>
    <div class="row"><a class="btn btn-primary" href="/przedsiebiorca/{{ $dk->id_przed }}/dokument/{{ $dk->nr_dok }}">Powrót do szczegółowych danych przedsiębiorcy</a></div>
  </div>


  <script type="text/javascript">
    tinymce.init({
      selector: '#pismo',
      plugins: "autoresize",
      language: 'pl',
      plugins: "print, autoresize"
    });

    </script>

</body>
</html>























