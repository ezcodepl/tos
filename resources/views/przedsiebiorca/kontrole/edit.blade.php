<!-- create.blade.php -->

@extends('layouts.app')

@section('content')
<style>

  .header-1 {
    background-color: #3399ff;
    color: #fff;
  }

</style>
<div class="container-fluid">
    <div class="col-md-12 text-center bg bg-primary" style="height: 8px;"></div>
    <div class="col-md-12 text-center text-primary shadow-sm p-2 mb-2 bg-white rounded"><h3>PRZEDSIĘBIORCY - <span class="text-warning">KONTROLE</span></h3></div>
  <div class="p-2">
<div class="container">

<div class="card uper">
  <div class="card-header bg-success text-light">
    Edycja kontroli przedsiębiorcy - Nr
  </div>
  <div class="card-body" >
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
    @foreach($kontrole as $kt)
    <form method="post" action="{{route('kontrole.update', $kt->id)}}">
        <div class="row">
              @csrf
              @method('PATCH')
        </div>

        <div class="row">
          <div class="col-md-3 form-group">
              <label for="nazwa"><strong>Nazwa kontroli:</strong></label>
          <input type="text" class="form-control" name="nazwa" value="{{$kt->nazwa}}" />
          </div>
           <div class="col-md-3 form-group">
              <label for="dat_roz">Data rozporzczęcia:</label>
              <input type="date" class="form-control" name="dat_roz" value="{{$kt->dat_roz}}" />
          </div>
           <div class="col-md-3 form-group">
              <label for="dat_zak">Data zakończenia:</label>
              <input type="date" class="form-control" name="dat_zak" value="{{$kt->dat_zak}}" />
          </div>
          <div class="col-md-3 form-group">
            <label for="dat_zawiad">Zawiadomienie:</label>
            <input type="date" class="form-control" name="dat_zawiad" value="{{$kt->dat_zawiad}}" />
        </div>
        </div>


        <div class="row">
          <div class="col-md-4 form-group">
                <label for="nr_sprawy">Numer sprawy:</label>
                <input type="text" class="form-control" name="nr_sprawy" value="{{$kt->nr_sprawy}}"  />
          </div>
          <div class="col-md-3 form-group">
              <label for="nr_upo">Numer upoważnienia:</label>
              <input type="text" class="form-control" name="nr_upo" value="{{$kt->nr_upo}}"  />
          </div>
          <div class="col-md-5 form-group">
            <label for="kto">Osoba przeprowadzająca kontrolę:</label>
            <input type="text" class="form-control" name="kto" value="{{$kt->kto}}"  />
          </div>

        </div>
        <div class="row">
            <div class="col-md-4 form-group">
                  <label for="wynik">Wynik kontroli:</label>
                  <input type="text" class="form-control" name="wynik" value="{{$kt->wynik}}"  />
            </div>
            <div class="col-md-4 form-group">
                <label for="dat_zal">Data zaleceń pokontrolnych:</label>
                <input type="date" class="form-control" name="dat_zal" value="{{$kt->dat_zal}}"  />
            </div>
          </div>
        <div class="row">
            <div class="col-md-12 form-group">
                <label for="zalecenia"><strong>Zalecenia pokontrolne:</strong></label>
                <input id="nk" type="text" class="form-control" name="zalecenia" value="{{$kt->zalecenia}}"  />
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 form-group">
                  <label for="wyn_pokont">Wynik po zalceniach:</label>
                  <input type="text" class="form-control" name="wyn_pokont" value="{{$kt->wyn_pokont}}"  />
            </div>
            <div class="col-md-4 form-group">
                <label for="dat_ost_kont">Data ostatniej kontroli:</label>
                <input type="date" class="form-control" name="dat_ost_kont" value="{{$kt->dat_ost_kont}}"  />
            </div>
        </div>
        <div class="row">
          <div class="col-md-12 form-group">
              <label for="uwagi">Uwagi:</label>
              <input type="text" class="form-control" name="uwagi" value="{{$kt->uwagi}}" />
          </div>
        </div>
            <input type="hidden" name="id_przed" value="{{$kt->id_przed}}" />
            <input type="hidden" name="id_dok_przed" value="{{$kt->id_dok_przed}}" />
          <button type="submit" class="btn btn-success">Zapisz dane</button>
      </form>
      @endforeach

  </div>

</div>
@foreach($dok as $dk)
@endforeach
<br />
<div class="text-center"><a class="btn btn-primary" href="{{route('kontrole.show', ['id'=>$kt->id_przed, 'nr_dok'=>$dk->nr_dok])}}" role="button"><i class="fa fa-arrow-left"></i> Szczegóły przedsiębiorcy</a></div><br />
</div>
</div>
</div>

<script type="text/javascript">
tinymce.init({
      selector: '#nk',
      language: 'pl'
    });
</script>
@endsection
