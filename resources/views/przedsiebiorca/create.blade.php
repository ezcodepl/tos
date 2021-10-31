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
<div class="container">
  <div style="padding-top: 20px;margin: 0 auto; text-align: center;">
    <i class="fa fa-truck-monster fa-3x"></i>&nbsp;&nbsp;
    <i class="far fa-arrow-alt-circle-right fa-3x " ></i>&nbsp;&nbsp;
    <i class="fa fa-truck-monster fa-3x" style="color: #e0e0e0;"></i>&nbsp;&nbsp;
    <i class="far fa-arrow-alt-circle-right fa-3x" style="color: #e0e0e0;"></i>&nbsp;&nbsp;
    <i class="fa fa-truck-monster fa-3x" style="color: #e0e0e0;"></i>&nbsp;&nbsp;
    <i class="far fa-arrow-alt-circle-right fa-3x" style="color: #e0e0e0;"></i>&nbsp;&nbsp;
    <i class="fa fa-truck-monster fa-3x" style="color: #e0e0e0;"></i>&nbsp;&nbsp;
    <i class="far fa-arrow-alt-circle-right fa-3x " style="color: #e0e0e0;"></i>&nbsp;&nbsp;
    <i class="fa fa-truck-monster fa-3x " style="color: #e0e0e0;"></i>&nbsp;&nbsp;
  </div>
<div class="card uper">

  <div class="card-header bg-primary text-light">
    Nowy Przedsiebiorca - KROK 1
  </div>
  <div class="card-body" >
        @include('flash-message')
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('przedsiebiorca.store') }}">
        <div class="row">
              @csrf

          <div class="col-md-12 form-group">
              <label for="Nazwa firmy"><B>Nazwa firmy - zgodnie z CEIDG:</B></label>
              <input type="text" class="form-control" name="nazwa_firmy"/>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 form-group">
              <label for="rodzaj">Rodzaj przedsiębiorcy:</label>
              <select class="form-control" name="id_osf" id="id_osf" >
                 @foreach($rodzaje as $rodzaj)
                     <option value="{{$rodzaj->id}}">{{$rodzaj->rodzaj}}</option>
                 @endforeach
              </select>
          </div>
          <div class="col-md-4 form-group">
              <label for="imie">Imię:</label>
              <input type="text" class="form-control" name="imie"/>
          </div>
         <div class="col-md-4 form-group">
              <label for="nazwisko">Nazwisko:</label>
              <input type="text" class="form-control" name="nazwisko"/>
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
              <input type="text" class="form-control" name="miejscowosc"/>
          </div>
           <div class="col-md-3 form-group">
              <label for="gmina">Gmina:</label>
              <input type="text" class="form-control" name="gmina"/>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 form-group">
              <label for="nip">NIP:</label>
              <input type="text" class=" form-control" name="nip" maxlength="11" placeholder="12345678910"/>
              <span><a href="https://prod.ceidg.gov.pl/CEIDG/CEIDG.Public.UI/Search.aspx" target="_blank">Podgląd w CEIGD</a></span>
          </div>
          <div class="col-md-6 form-group">
              <label for="regon">REGON:</label>
              <input type="text" class="form-control" name="regon" maxlength="9" placeholder="123456789"/>
               <span><a href="https://wyszukiwarkaregon.stat.gov.pl/appBIR/index.aspx" target="_blank">Podgląd w GUS</a></span>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 form-group">
              <label for="tel">Telefon:</label>
              <input type="text" class="form-control" name="telefon" maxlength="10" placeholder="888999888"/>
          </div>
          <div class="col-md-6 form-group">
              <label for="tel">E-mail:</label>
              <input type="text" class="form-control" name="email" placeholder="nazwa@firma.pl"/>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 form-group">
              <label for="uwagi">Uwagi:</label>
              <input type="text" class="form-control" name="uwagi"/>
          </div>
        </div>
          <button type="submit" class="btn btn-success">Utwórz nowego przedsiębiorcę</button>
      </form>
  </div>
</div>
</div>
@endsection
