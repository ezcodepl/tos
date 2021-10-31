<!-- create.blade.php -->

@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;

  }
  .header-1 {
    background-color: #3399ff;
    color: #fff;
  }

</style>
<div class="container-fluid">
    <div class="col-md-12 text-center bg bg-primary" style="height: 8px;"></div>
    <div class="col-md-12 text-center text-primary shadow-sm p-2 mb-2 bg-white rounded"><h3>PRZEDSIĘBIORCY</h3></div>
<div class="p-2">
<div class="container">
  <div style="padding-top: 20px;margin: 0 auto; text-align: center;">
    <i class="fa fa-truck-monster fa-3x"></i>&nbsp;&nbsp;
    <i class="far fa-arrow-alt-circle-right fa-3x " ></i>&nbsp;&nbsp;
    <i class="fa fa-truck-monster fa-3x"></i>&nbsp;&nbsp;
    <i class="far fa-arrow-alt-circle-right fa-3x"></i>&nbsp;&nbsp;
    <i class="fa fa-truck-monster fa-3x"></i>&nbsp;&nbsp;
    <i class="far fa-arrow-alt-circle-right fa-3x"></i>&nbsp;&nbsp;
    <i class="fa fa-truck-monster fa-3x" style="color: #e0e0e0;"></i>&nbsp;&nbsp;
    <i class="far fa-arrow-alt-circle-right fa-3x " style="color: #e0e0e0;"></i>&nbsp;&nbsp;
    <i class="fa fa-truck-monster fa-3x " style="color: #e0e0e0;"></i>&nbsp;&nbsp;
  </div>
<div class="card uper">
  <div class="card-header bg-primary text-light">
    Nowy Przedsiebiorca - Baza Eksploatacyjna KROK 3
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
      <form method="post" action="{{ route('baza.store') }}">
        <div class="row">
              @csrf

          <div class="col-md-8 form-group">
              <label for="id_przed">Przedsiębiorca:</label>
              <select class="form-control" name="id_przed" id="id_przed">

                 @foreach($przedsiebiorca as $row)

                        <option value="{{$row->id}}">{{$row->nazwa_firmy}}, {{$row->adres}}, {{$row->miejscowosc}}, NIP: {{$row->nip}}</option>
                        @php $id_przed = $row->id; @endphp
                 @endforeach

              </select>
              @php $dok = \App\DokumentyPrzed::get()->last()->id; @endphp

            <input type="hidden" name="id_dok_przed" value="{{$dok}}" />

          </div>
           <div class="col-md-4 form-group">
              <label for="imie">Rodzaj:</label>
               <select class="form-control" name="rodzaj" id="rodzaj" >
                 <option value="0"> </option>
                 <option value="1">Miejsce postojowe</option>
                 <option value="2">Miejsce załadunku/rozładunku</option>
                 <option value="3">Konserwacja i naprawa</option>
               </select>
          </div>
        </div>

        <div class="row">

          <div class="col-md-3 form-group">
              <label for="adres">Adres:</label>
              <input type="text" class="form-control" name="adres"/>
          </div>
          <div class="col-md-3 form-group">
              <label for="kod_p">Kod pocztowy:</label>
              <input type="text" class="form-control" name="kod_p" maxlength="6" placeholder="xx-xxx"/>
          </div>
           <div class="col-md-3 form-group">
              <label for="miejscowosc">Miejscowość:</label>
              <input type="text" class="form-control" name="miasto"/>
          </div>
           <div class="col-md-3 form-group">
              <label for="gmina">Gmina:</label>
              <input type="text" class="form-control" name="gmina"/>
          </div>
        </div>


        <div class="row">
          <div class="col-md-4 form-group">
              <label for="wlasnosc">Własność:</label>
              <select class="form-control" name="wlasnosc">
                <option value="Tak">Tak</option>
                <option value="Nie">Nie</option>
              </select>
          </div>
          <div class="col-md-4 form-group">
              <label for="tel">Umowa:</label>
              <input type="text" class="form-control" name="umowa" />
          </div>
          <div class="col-md-4 form-group">
              <label for="tel">Data umowy:</label>
              <input type="text" class="form-control" name="dat_umowy" />
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 form-group">
              <label for="uwagi">Uwagi:</label>
              <input type="text" class="form-control" name="uwagi"/>
          </div>
        </div>

          <button type="submit" class="btn btn-success">Dodaj bazę eksploatacyjną</button>
      </form>
  </div>
</div>
</div>
</div>
</div>
@endsection
