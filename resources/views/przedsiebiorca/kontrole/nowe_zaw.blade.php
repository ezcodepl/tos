<!DOCTYPE html>
<html>
<head>
  <title>Zawiadomienie przedsiębiorcy o zamiarze przeprowadzenia kontroli</title>
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
                margin: 5px 5px 0 0;
            }
            @page {
               margin: 5px 5px 0 0;
            }
        </style>
</head>
<body>
    <div class="col-md-12 text-center bg bg-primary" style="height: 8px;"></div>
    <div class="col-md-12 text-center text-primary shadow-sm p-2 mb-2 bg-white rounded" style="font-family: arial;"><h3>PRZEDSIĘBIORCY - <span class="text-warning">KONTROLE</span></h3></div>

    @foreach($kontrole as $kt)
    @endforeach
    @foreach($dok as $dk)
    @endforeach
    <div class="text-center"><a class="btn btn-primary" style="font-family: Arial, Helvetica, sans-serif" href="{{route('kontrole.show', ['id_przed'=>$kt->id_przed, 'nr_dok'=>$dk->nr_dok])}}" role="button"><< Szczegóły przedsiębiorcy</a></div><br />
  <div class="container" style="font-size: 14px;font-family: Arial;width:900px;">

     <div><textarea class="form-control" id="pismo" name="tresc" style="height: 100%;">
     <div style="float:right;padding-top:20px;padding-right:40px;">Koszalin dn. {{ Carbon\Carbon::parse($kt->dat_zawiad)->format('d.m.Y') }} r.</div>
     <div style="text-align:left;margin-top:20px;clear:both;padding-left:40px;">{{ $kt->nr_sprawy}}</div>
     <div class="row col-4" style="float:right;margin-top: 20px;margin-right: 80px;width:250px;text-align:justify;">
     <strong>@foreach($przedsiebiorca as $pr){{$pr->nazwa_firmy}}<br/>{{$pr->adres}}<br />{{$pr->kod_p}} {{$pr->miejscowosc}}@endforeach</strong>
     </div>
            <div style="clear:both;">

                <p style="text-align: justify;padding-left:40px;padding-right:40px;padding-top:10px;">
                    Na podstawie art. 48 ustawy z dnia 6 marca 2018 r. o Prawo przedsiębiorców (Dz. U z 2018 r. poz. 646 z późn. zm.) w
                    związku art. 84 ust. 1, 2 i art. 85 ust. 1 - 4 ustawy z dnia 6 września 2001 r. o   transporcie drogowym
                    (Dz. U z 2019 r. poz. 58 z późn. zm.)
                </p>
            </div>
            <div class="row text-center" style="padding-left:40px;padding-bottom:10px;font-weight:bold;text-align:center;">ZAWIADAMIAM O ZAMIARZE PRZEPROWADZENIA KONTROLI <br />
                w dniach od {{$kt->dat_roz}} r. do {{$kt->dat_zak}} r.
                </div>
            <div style="padding-left:40px;padding-bottom:10px;text-align: justify;padding-right:40px;">
                w zakresie spełniania wymogów<sup>1)</sup> będących podstawą do posiadania „zezwolenia na wykonywanie zawodu
                przewoźnika drogowego”, wyrażonego licencją  <strong>nr @foreach($dok as $dk) {{$dk->nr_dok}}@endforeach</strong> udzieloną dnia {{$dk->data_wyd}} roku
                na wykonywanie krajowego transportu drogowego <strong>{{$dk->rodz_dok}}</strong>.
            </div>
            <div style="padding-left:40px;padding-bottom:10px;text-align: justify;padding-right:40px;">
                <span style="padding-left:30px;">&nbsp;</span>W ramach kontroli proszę o dostarczenie do Wydziału Komunikacji i Dróg Starostwa Powiatowego<sup>2)</sup>
                w Koszalinie ul. Racławicka 13, pokój nr 116, dokumentów, o których mowa w art. 7a
                ustawy o transporcie drogowym, w postaci: <br />
            </div>
            <div>

            <ul style="list-style: none;">
            <li>
                <p style="text-align: justify;padding-left:10px;padding-right:40px;padding-bottom:10px;">
                    <strong> - informację z Krajowego Rejestru Karnego, dotyczącą osoby prowadzącej
                      działalność gospodarczą i osoby zarządzającej transportem</strong>  lub uprawnionej na podstawie
                      umowy do wykonywania zadań zarządzającego transportem w imieniu przedsiębiorcy,
                      o niekaralności za przestępstwa w dziedzinach określonych w art. 6 ust. 1 lit. a
                      rozporządzenia (WE) nr 1071/2009;
                </p>
            </li>
            <li>
                <p style="text-align: justify;padding-left:10px;padding-right:40px;">
                    <strong> - oświadczenie o niekaralności,</strong>  dotyczące osoby prowadzącej działalność
                        gospodarczą i osoby zarządzającej transportem lub uprawnionej na podstawie
                        umowy do wykonywania zadań zarządzającego transportem w imieniu przedsiębiorcy,
                        za poważne naruszenie w dziedzinach określonych w art. 6 ust. 1 lit. b
                        rozporządzenia (WE) nr 1071/2009, w tym najpoważniejsze naruszenia określone
                        w załączniku IV rozporządzenia (WE) nr 1071/2009;

                </p>
            </li>
            <li style="margin-bottom: -20px;">
                <div style="text-align: justify;padding-left:10px;padding-right:40px;padding-bottom:0px;">
                    <strong> - </strong>informację: imię i nazwisko, adres zamieszkania oraz oświadczenie (zgodnie z art. 4 ust.1)
                        osoby zarządzającej transportem oraz kopię certyfikatu kompetencji zawodowych tej osoby,
                        że spełnia warunki, o których mowa w art. 4 ust. 2 lit. c  rozporządzenia (WE) nr 1071/2009;
                </div>
            </li>
            <div style="padding-left:30px;padding-right:40px;padding-bottom:0px;"><div style="border-bottom: solid 1px #000;width:300px;"></div></div>
            <div style="font-size:10px;text-align: justify;padding-left:40px;padding-right:40px;padding-bottom:5px;">
                1) Wymogi określone w artykułach  3,4,5,6,7 Rozporządzenia Parlamentu Europejskiego i Rady
                (WE) nr 1071/2009  z dnia 21 października 2009 r. ustanawiające wspólne zasady dotyczące
                warunków wykonywania zawodu przewoźnika drogowego i uchylające dyrektywę
                Rady 96/26/WE (Dz.U.UE.L.2009.300.51).<br /><br />
                2) Art. 51 ust.1. ustawy z dnia 6 marca 2018 r. Prawo przedsiębiorców. Kontrolę przeprowadza
                się w siedzibie przedsiębiorcy lub w miejscu wykonywania działalności gospodarczej oraz w
                godzinach pracy lub w czasie faktycznego wykonywania działalności gospodarczej przez
                przedsiębiorcę, ust. 3 Kontrola lub poszczególne czynności kontrolne, za zgodą kontrolowanego,
                mogą być przeprowadzane również w siedzibie organu kontroli, jeżeli może to usprawnić
                prowadzenie kontroli.


            </div>

            <li>
                <p style="text-align: justify;padding-left:40px;padding-right:40px;">
                    <strong> - </strong>oświadczenie przedsiębiorcy, że dysponuje bazą eksploatacyjną wraz
                    ze wskazaniem adresu bazy, jeżeli adres ten jest inny niż adres wskazany jako siedziba
                    lub miejsce zamieszkania oraz dokument stwierdzający własność lub prawo do dysponowania
                    gruntem, na którym znajduje się baza eksploatacyjna;
                </p>
            </li>
            <li>
                <p style="text-align: justify;padding-left:40px;padding-right:40px;">
                    <strong> - </strong>oświadczenie, że zatrudniani kierowcy spełniają warunki, o których mowa w art. 5
                    ust. 2 pkt 2 ustawy o transporcie drogowym lub oświadczenie o współpracy z osobami niezatrudnionymi
                    przez przedsiębiorcę, lecz wykonującymi osobiście przewóz na jego rzecz, spełniającymi warunki,
                    o których mowa w art. 5 ust. 2 pkt 2 tj. w stosunku do zatrudnionych przez przedsiębiorcę kierowców,
                    a także innych osób niezatrudnionych przez przedsiębiorcę, lecz wykonujących osobiście przewóz na jego
                    rzecz, nie orzeczono zakazu wykonywania zawodu kierowcy; wraz z przedstawieniem dokumentacji
                    potwierdzającej posiadanie przez Pana oraz zatrudnianych kierowców wymaganych kwalifikacji do
                    wykonywania przewozów drogowych objętych zezwoleniem

                </p>
            </li>
            <li>
                <p style="text-align: justify;padding-left:40px;padding-right:40px;">
                    <strong> - </strong>wykaz pojazdów zawierający następujące informacje:
                    1) markę, typ; 2) rodzaj/przeznaczenie;  3) numer rejestracyjny;  4) numer VIN;
                    wskazanie rodzaju tytułu prawnego do dysponowania pojazdem wraz
                    z kserokopiami dowodów rejestracyjnych, z aktualnymi badaniami technicznymi;

                </p>
            </li>
            <li>
                <p style="text-align: justify;padding-left:40px;padding-right:40px;">
                    <strong> - </strong>dokumenty potwierdzające spełnienie warunków, o których mowa
                    w art. 7 rozporządzenia (WE) nr 1071/2009 związane z wymogiem zdolności finansowej.
                    Przedsiębiorca musi być w stanie w każdym momencie roku finansowego spełnić swoje
                    zobowiązania finansowe. W tym celu przedsiębiorca wykazuje na podstawie poświadczonych
                    przez audytora lub odpowiednio upoważnioną osobę rocznych sprawozdań finansowych,
                    że co roku dysponuje kapitałem i rezerwami o wartości co  najmniej równej 9 000 EUR
                    w przypadku wykorzystywania tylko jednego pojazdu
                    i 5 000 EUR na każdy dodatkowy wykorzystywany pojazd.

                </p>
            </li>
            <li>
                <p style="text-align: justify;padding-left:40px;padding-right:40px;">
                    <strong> - </strong>książkę kontroli
                </p>
            </li>

        </ul>
            </div>
            <div>
                <p style="text-align: justify;padding-left:40px;padding-right:40px;"><strong>W drodze odstępstwa</strong> właściwy organ może zgodzić się lub wymagać, aby przedsiębiorca wykazał swoją zdolność
                finansową za pomocą zabezpieczenia, takiego jak gwarancja bankowa lub ubezpieczenie, w tym<strong> ubezpieczenie
                odpowiedzialności zawodowej</strong> z jednego lub kilku banków lub innych instytucji finansowych, w tym <strong>przedsiębiorstw
                ubezpieczeniowych</strong>, składających solidarną gwarancję za przedsiębiorstwo na kwoty określone przy posiadaniu pojazdów
                samochodowych przeznaczonych do transportu drogowego.
                </p>
                <p style="text-align: justify;padding-left:40px;padding-right:40px;">
                Wymagane dokumenty proszę przedłożyć w dniu <strong>3 czerwca 2019 r.</strong> w godz. <strong>8:00 do 10:00</strong>.  Niedostarczenie powyższych dokumentów
                we wskazanym terminie spowoduje kontrolę w siedzibie firmy przedsiębiorcy
                </p>
            </div>
            <div style="margin:0 auto;text-align:center;margin-top:60px;"><br /><strong>Uzasadnienie</strong><br />
            <p style="text-align: justify;padding-left:40px;padding-right:40px;">
                Obowiązek kontroli, nałożony na organ udzielający licencji, w zakresie spełniania wymogów będących
                podstawą jej wydania wynika z art. 84 ust. 1 i 2  ustawy o transporcie drogowym </p>
            <p style="text-align: justify;padding-left:40px;padding-right:40px;">
                <i>
                „Art. 84. 1. Organy udzielające zezwolenia na wykonywanie zawodu przewoźnika drogowego, licencji,
                zezwolenia lub wydające zaświadczenia o wykonywaniu przewozów na potrzeby własne są uprawnione do
                kontroli przedsiębiorcy w zakresie spełniania wymogów będących podstawą do wydania tych dokumentów.
                2. Kontrolę, o której mowa w ust. 1, przeprowadza się co najmniej raz na 5 lat.”
                </i>
            </p>
            </div>
            <div style="margin:0 auto;text-align:center;margin-top:20px;"><br /><strong>Pouczenie</strong><br />
                <p style="text-align: justify;padding-left:40px;padding-right:40px;">Jednocześnie informuję, że jeśli organ udzielający „zezwolenia na wykonywanie zawodu przewoźnika drogowego” wyrażonego licencją
                    na wykonywanie krajowego transportu drogowego rzeczy, stwierdzi  niespełnienie przez przedsiębiorcę wymogów będących podstawą
                    do wydania tego dokumentu, organ ten zawiesza lub cofa zezwolenie (licencję) na wykonywanie zawodu przewoźnika drogowego.</p>
                </div>
            <div style="text-align: justify;padding-left:40px;padding-right:40px;padding-top:30px;">
                <u><strong>W załączeniu do podpisania oświadczenia:</strong> </u> <br />
                    1. dotyczące siedziby / bazy eksploatacyjnej,<br />
                    2. osoby zarządzającej transportem/certyfikat kompetencji zawodowej,<br />
                    3. o niekaralności,<br />
                    4. dotyczące zatrudnionych kierowców,<br />
                    5. wykaz pojazdów.<br />
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
        <div style="padding-top: 1.5in;padding-left:40px;padding-right:40px;">
            <strong>UWAGA: wszelkie informacje można uzyskać pod nr telefonu 94 71 40 116
                lub w pokoju nr 115 w Wydziale Komunikacji i Dróg Starostwa Powiatowego w Koszalinie</strong>
        </div>
    </textarea></div>

  </div>

  <script type="text/javascript">
    tinymce.init({
      selector: '#pismo',
      plugins: "autoresize",
      language: 'pl',
      plugins: "print, autoresize"
    });

    </script>




    -->
</body>
</html>
























