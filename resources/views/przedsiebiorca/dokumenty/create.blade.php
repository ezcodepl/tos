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
    <i class="fa fa-truck-monster fa-3x" style="color: #e0e0e0;"></i>&nbsp;&nbsp;
    <i class="far fa-arrow-alt-circle-right fa-3x" style="color: #e0e0e0;"></i>&nbsp;&nbsp;
    <i class="fa fa-truck-monster fa-3x" style="color: #e0e0e0;"></i>&nbsp;&nbsp;
    <i class="far fa-arrow-alt-circle-right fa-3x " style="color: #e0e0e0;"></i>&nbsp;&nbsp;
    <i class="fa fa-truck-monster fa-3x " style="color: #e0e0e0;"></i>&nbsp;&nbsp;
  </div>
<div class="card uper">
  <div class="card-header bg-primary text-light">
    Nowy Przedsiębiorca - Licencja / Zezwolenie / Zaświadczenie - KROK 2
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
      <form method="post" action="{{ route('dokumenty.store') }}">
        <div class="row">
              @csrf

          <div class="col-md-8 form-group">
              <label for="id_przed">Przedsiębiorca:</label>
              <select class="form-control" name="id_przed" id="id_przed">

                 @foreach($przedsiebiorca as $row)

                        <option value="{{$row->id}}">{{$row->nazwa_firmy}}, {{$row->adres}}, {{$row->miejscowosc}}, NIP: {{$row->nip}}</option>

                 @endforeach
              </select>
          </div>
           <div class="col-md-4 form-group">
              <label for="imie">Nazwa:</label>
               <select class="form-control" name="nazwa">
                 <option value="0"> </option>
                 <option value="Zezwolenie">Zezwolenie</option>
                 <option value="Licencja">Licencja</option>
                 <option value="Licencja">Licencja - spedycja</option>
                 <option value="Licencja 7-9">Licencja 7-9</option>
                 <option value="Licencja Posrednictwo">Licencja Pośrednictwo</option>
                 <option value="Zaswiadczenie">Zaświadczenie</option>
               </select>
          </div>
        </div>

        <div class="row">

          <div class="col-md-3 form-group">
              <label for="adres"><strong>Nr dokumentu:</strong></label>
              <input type="text" class="form-control" name="nr_dok"/>
          </div>
          <div class="col-md-3 form-group">
              <label for="rodz_dok">Rodzaj:</label>
              <select class="form-control" name="rodz_dok">
                <option value="osoby">osoby</option>
                <option value="rzeczy">rzeczy</option>
              </select>
          </div>
           <div class="col-md-3 form-group">
              <label for="miejscowosc">Nr druku:</label>
              <input type="text" class="form-control" name="nr_druku"/>
          </div>
           <div class="col-md-3 form-group">
              <label for="gmina">Nr sprawy:</label>
              <input type="text" class="form-control" name="nr_sprawy"/>
          </div>
        </div>


        <div class="row">
          <div class="col-md-4 form-group">
              <label for="tel">Data wniosku:</label>
              <input type="date" class="form-control" name="data_wn" />
          </div>
          <div class="col-md-4 form-group">
              <label for="tel">Data wydania:</label>
              <input type="date" class="form-control" name="data_wyd" />
          </div>
          <div class="col-md-4 form-group">
              <label for="tel">Data ważności:</label>
              <input type="date" class="form-control" name="data_waz" />
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 form-group">
              <label for="uwagi">Uwagi:</label>
              <input type="text" class="form-control" name="uwagi"/>
          </div>
        </div>
          <button type="submit" class="btn btn-success">Utwórz nowy dokument</button>
      </form>


  </div>
</div>
</div>
</div>
</div>
@endsection
