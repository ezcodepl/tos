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
    @foreach($dok as $dk)
    @endforeach
    @foreach($przedsiebiorca as $row)
    <div class="row p-2" style="margin:0 auto;text-align:center;">Przedsiębiorca:&nbsp;<strong>{{$row->nazwa_firmy}}</strong></div>
    @endforeach

<div class="card uper">
  <div class="card-header bg-primary text-light">
  Szczegóły kontroli przedsiębiorcy - {{$dk->nazwa}} Nr {{$dk->nr_dok}}
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
      <form>
        <div class="row">
          <div class="col-md-3 form-group">
              <label for="nazwa"><strong>Nazwa kontroli:</strong></label>
          <input type="text" class="form-control" name="nazwa" value="{{$kt->nazwa}}" disabled />
          </div>
           <div class="col-md-3 form-group">
              <label for="dat_roz">Data rozporzczęcia:</label>
              <input type="date" class="form-control" name="dat_roz" value="{{$kt->dat_roz}}" disabled  />
          </div>
           <div class="col-md-3 form-group">
              <label for="dat_zak">Data zakończenia:</label>
              <input type="date" class="form-control" name="dat_zak" value="{{$kt->dat_zak}}" disabled  />
          </div>
          <div class="col-md-3 form-group">
            <label for="dat_zawiad">Zawiadomienie / Upoważnienie:</label>
            <input type="date" class="form-control" name="dat_zawiad" value="{{$kt->dat_zawiad}}" disabled  />
        </div>
        </div>


        <div class="row">
          <div class="col-md-4 form-group">
                <label for="nr_sprawy">Numer sprawy:</label>
                <input type="text" class="form-control" name="nr_sprawy" value="{{$kt->nr_sprawy}}" disabled  />
          </div>
          <div class="col-md-3 form-group">
              <label for="nr_upo">Numer upoważnienia:</label>
              <input type="text" class="form-control" name="nr_upo" value="{{$kt->nr_upo}}" disabled  />
          </div>
          <div class="col-md-5 form-group">
            <label for="kto">Osoba przeprowadzająca kontrolę:</label>
            <input type="text" class="form-control" name="kto" value="{{$kt->kto}}" disabled  />
          </div>

        </div>
        <div class="row">
            <div class="col-md-4 form-group">
                  <label for="wynik">Wynik kontroli:</label>
                  <input type="text" class="form-control" name="wynik" value="{{$kt->wynik}}" disabled  />
            </div>
            <div class="col-md-4 form-group">
                <label for="dat_zal">Data zaleceń pokontrolnych:</label>
                <input type="date" class="form-control" name="dat_zal" value="{{$kt->dat_zal}}" disabled  />
            </div>
          </div>
        <div class="row">
            <div class="col-md-12 form-group">
                <label for="zalecenia"><strong>Zalecenia pokontrolne:</strong></label>
                <input id="nk" type="text" class="form-control" name="zalecenia" value="{{$kt->zalecenia}}" disabled  />
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 form-group">
                  <label for="wyn_pokont">Wynik po zalceniach:</label>
                  <input type="text" class="form-control" name="wyn_pokont" value="{{$kt->wyn_pokont}}" disabled  />
            </div>
            <div class="col-md-4 form-group">
                <label for="dat_ost_kont">Data ostatniej kontroli:</label>
                <input type="date" class="form-control" name="dat_ost_kont" value="{{$kt->dat_ost_kont}}" disabled  />
            </div>
        </div>
        <div class="row">
          <div class="col-md-12 form-group">
              <label for="uwagi">Uwagi:</label>
              <input type="text" class="form-control" name="uwagi" value="{{$kt->uwagi}}" disabled />
          </div>
        </div>
      </form>

      @endforeach

  </div>

</div>

@foreach($kontrole as $kt)

<br />
<div class="text-center"><a class="btn btn-primary" href="{{route('kontrole.show', ['id_przed'=>$kt->id_przed, 'nr_dok'=>$dk->nr_dok])}}" role="button"><i class="fa fa-arrow-left"></i> Szczegóły przedsiębiorcy</a></div><br />
@endforeach
</div>
</div>
</div>
