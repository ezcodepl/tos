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
    <i class="fa fa-truck-monster fa-3x"></i>&nbsp;&nbsp;
    <i class="far fa-arrow-alt-circle-right fa-3x"></i>&nbsp;&nbsp;
    <i class="fa fa-truck-monster fa-3x"></i>&nbsp;&nbsp;
    <i class="far fa-arrow-alt-circle-right fa-3x"></i>&nbsp;&nbsp;
    <i class="fa fa-truck-monster fa-3x"></i>&nbsp;&nbsp;
    <i class="far fa-arrow-alt-circle-right fa-3x "></i>&nbsp;&nbsp;
    <i class="fa fa-truck-monster fa-3x " style="color: #e0e0e0;"></i>&nbsp;&nbsp;
  </div>
<div class="card uper">
  <div class="card-header bg-primary text-light">
    Nowy Przedsiebiorca - Zabezpieczenie finansowe KROK 5
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
      <form method="post" action="{{ route('zabezpieczenie.store') }}">
        <div class="row">
              @csrf

          <div class="col-md-8 form-group">
              <label for="id_przed">Przedsiębiorca:</label>
             <select class="form-control" name="id_przed" id="id_przed">

                 @foreach($przedsiebiorca as $row)

                        <option value="{{$row->id}}">{{$row->nazwa_firmy}}, {{$row->adres}}, {{$row->miejscowosc}}, NIP: {{$row->nip}}</option>

                 @endforeach
              </select>
              @php $dok = \App\DokumentyPrzed::get()->last()->id; @endphp

              <input type="hidden" name="id_dok_przed" value="{{$dok}}" />
          </div>
          <div class="col-md-4 form-group">

            <label for="">Numer polisy:</label>
            <input type="text" class="form-control" name="numer" />
         </div>
        </div>

        <div class="row">
           <div class="col-md-4 form-group">
              <label for="imie">Nazwa:</label>
              <input type="text" class="form-control" name="nazwa"/>
          </div>
          <div class="col-md-4 form-group">
              <label for="adres">Data od:</label>
              <input type="date" class="form-control" name="data_od"/>
          </div>
          <div class="col-md-4 form-group">
              <label for="">Data do:</label>
              <input type="date" class="form-control" name="data_do" />
          </div>

        </div>

        <div class="row">

         <div class="col-md-4 form-group">
              <label for="miejscowosc">Na ile pojazdów:</label>
              <input type="text" class="form-control" name="ile_poj"/>
          </div>
           <div class="col-md-4 form-group">
              <label for="gmina">Suma zabezpieczenia w &euro;:</label>
              <input type="text" class="form-control" name="suma_zab"/>
          </div>

              <input type="hidden" class="form-control" name="status" value="1"/>

        </div>
        <div class="row">
          <div class="col-md-12 form-group">
              <label for="uwagi">Uwagi:</label>
              <input type="text" class="form-control" name="uwagi"/>
          </div>
        </div>

          <button type="submit" class="btn btn-success">Dodaj zabezpieczenie finansowe</button>
      </form>
  </div>
</div>
</div>
@endsection
