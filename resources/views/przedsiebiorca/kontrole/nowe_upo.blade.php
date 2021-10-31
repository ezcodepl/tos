<!DOCTYPE html>
<html>
<head>
  <title>Upoważnienie do przeprowadzenia kontroli przedsiębiorcy</title>
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
                font-size: 11px;
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
  <div class="container" style="font-size: 12px;font-family: Arial;width:900px;">

     <div><textarea class="form-control" id="pismo" name="tresc" style="height: 100%;">
     <div style="float:right;padding-top:20px;padding-right:40px;">Koszalin dn. {{ Carbon\Carbon::parse($kt->dat_zawiad)->format('d.m.Y') }} r.</div>
     <div style="text-align:left;margin-top:20px;clear:both;padding-left:40px;">{{ $kt->nr_sprawy}}</div>
     <div class="row text-center" style="padding-left:40px;padding-bottom:10px;margin-top:30px;font-weight:bold;text-align:center;">U P O W A Ż N I E N I E &nbsp;&nbsp; Nr {{$kt->nr_upo}}</div>

            <div style="clear:both;">

                <p style="text-align: justify;padding-left:40px;padding-right:40px;padding-top:10px;">
                    Na podstawie art. 45, art. 48, art. 49 ustawy z dnia 6 marca 2018 r. - Prawo przedsiębiorców  (Dz.U. z 2019 r., poz. 1292)
                    w związku z art. 84 i 85 ustawy z dnia 6 września 2001 r.  o transporcie drogowym (Dz. U. z 2020 r. poz. 2140 z późn. zm.)
                </p>
            </div>
            <div style="padding-left:40px;padding-bottom:10px;text-align: center;padding-right:40px;">
                <p><strong>upoważniam</strong></p>
            </div>
            <div style="padding-left:40px;padding-bottom:10px;text-align: justify;padding-right:40px;">
                Pana <strong>Ernesta Zając</strong> zatrudnionego na stanowisku Głównego Specjalisty w Wydziale Komunikacji i Dróg Starostwa Powiatowego w
                Koszalinie legitymującego się legitymacją służbową nr 2/2018 wydaną dnia 6.09.2018 roku,
            </div>
            <div style="padding-left:40px;padding-bottom:10px;text-align: justify;padding-right:40px;">
                <p>do przeprowadzenia kontroli u przedsiębiorcy:</p>
            </div>
            <div class="row col-4" style="text-align:center;padding-bottom: 20px;">
                <strong>@foreach($przedsiebiorca as $pr){{$pr->nazwa_firmy}}<br/>{{$pr->adres}}<br />{{$pr->kod_p}} {{$pr->miejscowosc}}@endforeach</strong>
            </div>
            <div style="padding-left:40px;padding-bottom:10px;text-align: justify;padding-right:40px;">
                <p>Kontrola będzie dotyczyć:</p>
            </div>
            <div style="padding-left:40px;padding-bottom:40px;text-align: justify;padding-right:40px;">
                spełniania wymogów będących podstawą do wydania zezwolenia na wykonywanie zawodu przewoźnika
                 drogowego, wyrażonego licencją nr <strong>nr @foreach($dok as $dk) {{$dk->nr_dok}}@endforeach</strong> udzielonej
                 dnia {{Carbon\Carbon::parse($dk->data_wyd)->format('d.m.Y')}} roku na wykonywanie krajowego transportu drogowego osób,
                    w zakresie określonym w zawiadomieniu o zamiarze przeprowadzenia kontroli z dnia
                    {{Carbon\Carbon::parse($kt->dat_zawiad)->format('d.m.Y')}} roku nr {{$kt->nr_sprawy}}.

            </div>
            <div style="padding-left:40px;padding-bottom:10px;text-align: justify;padding-right:40px;">
                <p><strong>Data rozpoczęcia kontroli: {{Carbon\Carbon::parse($kt->dat_roz)->format('d.m.Y')}} r.</strong></p>
            </div>
            <div style="padding-left:40px;padding-bottom:150px;text-align: justify;padding-right:40px;">
                <p><strong>Przewidywana data zakończenia kontroli:  {{Carbon\Carbon::parse($kt->dat_zak)->format('d.m.Y')}} r. </strong></p>
            </div>


            <div>
                <p style="text-align: justify;padding-left:40px;padding-right:40px;">Pouczenie o prawach i obowiązkach kontrolowanego wynikających z
                    ustawy z dnia 6 marca 2018 r. Prawo przedsiębiorców (Dz. U. z 2019 r., poz. 1292)
                </p>
            </div>
            <div style="text-align: justify;padding-left:40px;padding-right:40px;padding-top:20px;">
                <u>Kontrolowany ma prawo do: </u> <br /><br />
                1.	Wskazania na piśmie, że przeprowadzane czynności kontrolne zakłócają w sposób istotny jego działalność gospodarczą (art. 52).<br />
                2.	Wniesienia sprzeciwu wobec podjęcia i wykonywania przez organy kontroli czynności z
                naruszeniem przepisów ustawy z dnia 6 marca 2018 r. Prawo przedsiębiorców w zakresie:<br />
                <p style="text-align: justify;padding-left:40px;padding-right:40px;">
                    1)	zawiadamiania o zamiarze wszczęcia kontroli (art. 48),<br />
                    2)	przeprowadzania kontroli po okazaniu legitymacji i doręczeniu upoważnienia (art. 49), <br />
                    3)	informowania przedsiębiorcy o jego prawach i obowiązkach w przypadku wszczęcia kontroli po okazaniu legitymacji (art. 49), <br />
                    4)	wykonania czynności kontrolnych w obecności kontrolowanego lub osoby przez niego upoważnionej (art. 50), <br />
                    5)	miejsca przeprowadzania kontroli (art. 51),<br />
                    6)	zakazu równoczesności kontroli (art. 54), <br />
                    7)	ograniczenia czasu trwania kontroli (art. 55),<br />
                    8)	wyłączenia możliwości przeprowadzenia ponownej kontroli przez ten sam organ (art. 58). <br /><br />
                </p>
            </div>
            <div style="text-align: justify;padding-left:40px;padding-right:40px;padding-top:20px;">
                <u>Kontrolowany ma obowiązek: </u> <br /><br />
                1.	Pisemnego wskazania osoby upoważnionej do reprezentowania go w trakcie kontroli, <br />
                w szczególności w czasie jego nieobecności (art. 50 ust. 3).<br />
                2.	Niezwłocznie okazać kontrolującemu książkę kontroli albo kopię odpowiednich jej fragmentów lub wydruki z systemu informatycznego, w którym prowadzona jest książka kontroli, poświadczone przez siebie za zgodność z wpisem w książce kontroli (art. 57 ust. 6 i 7).

            </div>
        <div style="padding-top: .5in;padding-left:40px;padding-right:40px;">
            Oświadczam, iż zapoznałem się z treścią pouczenia i odebrałem 1 egz. upoważnienia
        </div>
        <div style="float: right;padding-top: .5in;padding-left:40px;padding-right:40px;">
            ..............................................<br />
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;(data i podpis)

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
























