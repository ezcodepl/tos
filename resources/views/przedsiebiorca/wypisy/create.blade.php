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
  
<div class="card uper">
  <div class="card-header bg-primary text-light">
    Wypisy -  @foreach($dok as $dk){{$dk->nazwa}}@endforeach
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
      <form method="post" action="{{ route('wypisy.store') }}">
        <div class="row">
              @csrf

          <div class="col-md-8 form-group">
              <label for="id_przed">Przedsiębiorca:</label>
              <select class="form-control" disabled="disabled">

                 @foreach($przedsiebiorca as $row)

                        <option value="{{$row->id}}">{{$row->nazwa_firmy}}, {{$row->adres}}, {{$row->miejscowosc}}, NIP: {{$row->nip}}</option>

                 @endforeach
              </select>
              <input type="hidden" name="id_przed" value="{{$row->id}}" />
          </div>
           <div class="col-md-4 form-group" style="margin-top: 35px;">
            @foreach($dok as $dk)
              <p><strong>{{$dk->nazwa}}: {{$dk->nr_dok}}</strong></p>
              <input type="hidden" name="nazwa" value="{{$dk->nazwa}}" />
              <input type="hidden" name="id_dok_przed" value="{{$dk->id}}" />
            @endforeach
          </div>
        </div>

        <div class="row">

          <div class="col-md-4 form-group">
              <label for="nr_dok"><strong>Nr wypisu:</strong></label>
              <input type="text" class="form-control" name="nr_wyp"/>
          </div>
          <div class="col-md-4 form-group">
              <label for="kod_p">Rodzaj:</label>
              <input type="text" class="form-control" name="rodzaj_wyp" maxlength="6" placeholder="osoby/rzeczy"/>
          </div>
           <div class="col-md-4 form-group">
              <label for="nr_druku">Nr druku:</label>
              <input type="text" class="form-control" name="nr_druku"/>
          </div>
          
        </div>


        <div class="row">
           <div class="col-md-4 form-group">
              <label for="nr_sprawy">Nr sprawy:</label>
              <input type="text" class="form-control" name="nr_sprawy"/>
          </div>
          <div class="col-md-4 form-group">
              <label for="tel">Data wniosku:</label>
              <input type="date" class="form-control" name="data_wn" />
          </div>
          <div class="col-md-4 form-group">
              <label for="tel">Data wydania:</label>
              <input type="date" class="form-control" name="data_wyd" />
          </div>
          
        </div>
        <div class="row">
          <div class="col-md-12 form-group">
              <label for="uwagi">Uwagi:</label>
              <input type="text" class="form-control" name="uwagi"/>
          </div>
        </div>
          <button type="submit" class="btn btn-success">Dodaj nowy wypis</button>
      </form>

      
  </div>
</div>
</div>
@endsection