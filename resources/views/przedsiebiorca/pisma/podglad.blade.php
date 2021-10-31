<!DOCTYPE html>
<html>
<head>
  <title>Gotowe pismo Zdolność Finansowa po terminie</title>
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

  <div><a href="{{url('przedsiebiorca/pisma/zf_pdf', $przedsiebiorca->id)}}" target="_blank" role="button" class="btn btn-warning">Wydrukuj pismo w PDF</a></div>
     <div> <img src="{{URL::asset('/img/starostwo.png')}}" alt="profile Pic" width="900px;"></div>
     <div><textarea class="form-control" id="pismo" name="uwagi" style="height: 100%;">

            {{$ps->tresc}}
    </textarea></div>

  </div>

  <script type="text/javascript">
     tinymce.init({
      selector: '#pismo',
      language: 'pl',
      readonly: 1,
      plugins: "print, autoresize"

    });

    </script>

</body>
</html>























