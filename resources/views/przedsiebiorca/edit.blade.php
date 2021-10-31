@extends('layouts.app')

@section('content')
@php $id_dok = \App\DokumentyPrzed::all()->where('nr_dok','=',$_GET['nr_dok']); @endphp

@foreach($id_dok as $id)

@endforeach

<div class="container-fluid">
    <div class="col-md-12 text-center bg bg-primary" style="height: 8px;"></div>
    <div class="col-md-12 text-center text-primary shadow-sm p-2 mb-2 bg-white rounded"><h3>PRZEDSIĘBIORCY</h3></div>
<div class="p-2">


<div class="container">

<div class="p-2">

<div>
    <div class="card-header bg-success text-light">
   <strong>Edycja danych przedsiębiorcy</strong>
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
      <form method="post" action="{{ route('przedsiebiorca.update', $id->id_przed) }}">
        <div class="row">
              @csrf
               @method('PATCH')
          <div class="col-md-12 form-group">
              <label for="Nazwa firmy"><B>Nazwa firmy - zgodnie z CEIDG:</B></label>
              <input type="text" class="form-control" name="nazwa_firmy" value="{{$przedsiebiorca->nazwa_firmy}}" />
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 form-group">
              <label for="rodzaj">Rodzaj przedsiębiorcy:</label>
              <select class="form-control" name="id_osf" id="id_osf" >
                 @foreach($rodzaje as $rodzaj)
                     <option value="{{$rodzaj->id}}" @if($przedsiebiorca->id_osf == $rodzaj->id) selected @endif>{{$rodzaj->rodzaj}}</option>
                 @endforeach
              </select>
          </div>
          <div class="col-md-4 form-group">
              <label for="imie">Imię:</label>
              <input type="text" class="form-control" name="imie" value="{{$przedsiebiorca->imie}}"/>
          </div>
         <div class="col-md-4 form-group">
              <label for="nazwisko">Nazwisko:</label>
              <input type="text" class="form-control" name="nazwisko" value="{{$przedsiebiorca->nazwisko}}"/>
          </div>
        </div>
        <div class="row">

          <div class="col-md-3 form-group">
              <label for="adres">Adres:</label>
              <input type="text" class="form-control" name="adres" value="{{$przedsiebiorca->adres}}"/>
          </div>
          <div class="col-md-3 form-group">
              <label for="kod_p">Kod pocztowy:</label>
              <input type="text" class="form-control" name="kod_p" maxlength="6" placeholder="xx-xxx" value="{{$przedsiebiorca->kod_p}}"/>
          </div>
           <div class="col-md-3 form-group">
              <label for="miejscowosc">Miejscowość:</label>
              <input type="text" class="form-control" name="miejscowosc" value="{{$przedsiebiorca->miejscowosc}}"/>
          </div>
           <div class="col-md-3 form-group">
              <label for="gmina">Gmina:</label>
              <input type="text" class="form-control" name="gmina" value="{{$przedsiebiorca->gmina}}"/>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 form-group">
              <label for="nip">NIP:</label>
              <input type="text" class=" form-control" name="nip" maxlength="11" value="{{$przedsiebiorca->nip}}" />

          </div>
          <div class="col-md-6 form-group">
              <label for="regon">REGON:</label>
              <input type="text" class="form-control" name="regon" maxlength="9" value="{{$przedsiebiorca->regon}}"/>

          </div>
        </div>
        <div class="row">
          <div class="col-md-6 form-group">
              <label for="tel">Telefon:</label>
              <input type="text" class="form-control" name="telefon" maxlength="10" value="{{$przedsiebiorca->telefon}}"/>
          </div>
          <div class="col-md-6 form-group">
              <label for="tel">E-mail:</label>
              <input type="text" class="form-control" name="email" value="{{$przedsiebiorca->email}}"/>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 form-group">
              <label for="uwagi">Uwagi:</label>
              <textarea class="form-control" id="pp" name="uwagi" value="{{$przedsiebiorca->uwagi}}" />{{$przedsiebiorca->uwagi}}</textarea>
          </div>
        </div>
          <input type="hidden" name="id" value="{{$przedsiebiorca->id}}" />
          <button type="submit" class="btn btn-success">Zapisz zmiany przedsiębiorcy</button>
      </form>
      <br />
    </div>

  </div>



   <script type="text/javascript">
    tinymce.init({
      selector: '#zf',
      language: 'pl'
    });
    tinymce.init({
      selector: '#osz',
      language: 'pl'
    });
    tinymce.init({
      selector: '#bz',
      language: 'pl'
    });
    tinymce.init({
      selector: '#dk',
      language: 'pl'
    });
    tinymce.init({
      selector: '#pp',
      language: 'pl'
    });

    </script>
<div class="text-center"><a href="/przedsiebiorca/{{$id->id_przed}}/dokument/{{$id->nr_dok}}" role="button" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Szczegóły przedsiębiorcy</a></div>
</div>
@endsection
