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
  <div class="card-header bg-primary text-light">
    Nowa kontrola przedsiębiorcy - @foreach($dok as $dk) {{$dk->nazwa}} Nr {{$dk->nr_dok}} @endforeach
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
      <form method="post" action="{{ route('kontrole.store') }}">
        <div class="row">
              @csrf

        </div>

        <div class="row">
          <div class="col-md-3 form-group">
              <label for="nazwa"><strong>Nazwa kontroli:</strong></label>
              <input type="text" class="form-control" name="nazwa" />
          </div>
           <div class="col-md-3 form-group">
              <label for="dat_roz">Data rozporzczęcia:</label>
              <input type="date" class="form-control" name="dat_roz"/>
          </div>
           <div class="col-md-3 form-group">
              <label for="dat_zak">Data zakończenia:</label>
              <input type="date" class="form-control" name="dat_zak"/>
          </div>
          <div class="col-md-3 form-group">
            <label for="dat_zawiad">Zawiadomienie:</label>
            <input type="date" class="form-control" name="dat_zawiad"/>
        </div>
        </div>


        <div class="row">
          <div class="col-md-4 form-group">
                <label for="nr_sprawy">Numer sprawy:</label>
                <input type="text" class="form-control" name="nr_sprawy" />
          </div>
          <div class="col-md-3 form-group">
              <label for="nr_upo">Numer upoważnienia:</label>
              <input type="text" class="form-control" name="nr_upo" />
          </div>
          <div class="col-md-5 form-group">
            <label for="kto">Osoba przeprowadzająca kontrolę:</label>
            <input type="text" class="form-control" name="kto" />
          </div>

        </div>

        <div class="row">
          <div class="col-md-12 form-group">
              <label for="uwagi">Uwagi:</label>
              <input type="text" class="form-control" name="uwagi"/>
          </div>
        </div>@foreach($dok as $dk)
            <input type="hidden" name="id_przed" value="{{$dk->id_przed}}" />
            <input type="hidden" name="id_dok_przed" value="{{$dk->id}}" />
            @endforeach
          <button type="submit" class="btn btn-primary">Dodaj nową kontrolę</button>
      </form>


  </div>
</div>
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
