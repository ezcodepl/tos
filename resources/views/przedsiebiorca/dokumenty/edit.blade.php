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

<div >

    <div class="card-header bg-success text-light">
       <strong>Edycja dokumentu przedsiębiorcy</strong>
      </div>
     <div style="margin: 20px;">
     
       @foreach($dok as $id)
      <form method="post" action="{{ route('dokumenty.update', ['dokumenty'=>$id->id]) }}">
        <div class="row">
              @csrf
              @method('PATCH')
          <div class="col-md-8 form-group">
              <label for="id_przed">Przedsiębiorca:</label>
              <input type="text" class="form-control" name="nazwa_firmy" value="{{$przedsiebiorca->nazwa_firmy}}" disabled="disabled"/>
              <input type="hidden""  name="id_przed" value="{{$przedsiebiorca->id}}"/>
          </div>

           <div class="col-md-4 form-group">
              <label for="nazwa">Nazwa dokumentu:</label>
              <select class="form-control" name="nazwa">
                @if($id->nazwa =='Zezwolenie')
                    <option value="{{$id->nazwa}}">{{$id->nazwa}} </option>
                    <option value="Licencja">Licencja</option>
                    <option value="Licencja spedycja">Licencja - spedycja</option>
                    <option value="Licencja 7-9">Licencja 7-9</option>
                    <option value="Licencja Pośrednictwo">Licencja Pośrednictwo</option>
                    <option value="Zaświadczenie">Zaświadczenie</option>
                @elseif($id->nazwa =='Licencja')
                    <option value="{{$id->nazwa}}">{{$id->nazwa}} </option>
                    <option value="Zezwolenie">Zezwolenie</option>
                    <option value="Licencja spedycja">Licencja - spedycja</option>
                    <option value="Licencja 7-9">Licencja 7-9</option>
                    <option value="Licencja Pośrednictwo">Licencja Pośrednictwo</option>
                    <option value="Zaświadczenie">Zaświadczenie</option>
                @elseif($id->nazwa =='Licencja spedycja')
                    <option value="{{$id->nazwa}}">{{$id->nazwa}} </option>
                    <option value="Zezwolenie">Zezwolenie</option>
                    <option value="Licencja">Licencja</option>
                    <option value="Licencja 7-9">Licencja 7-9</option>
                    <option value="Licencja Pośrednictwo">Licencja Pośrednictwo</option>
                    <option value="Zaświadczenie">Zaświadczenie</option>
                @elseif($id->nazwa =='Licencja 7-9')
                    <option value="{{$id->nazwa}}">{{$id->nazwa}} </option>
                    <option value="Zezwolenie">Zezwolenie</option>
                    <option value="Licencja">Licencja</option>
                    <option value="Licencja">Licencja - spedycja</option>
                    <option value="Licencja Pośrednictwo">Licencja Pośrednictwo</option>
                    <option value="Zaświadczenie">Zaświadczenie</option>
                @elseif($id->nazwa =='Licencja Pośrednictwo')
                    <option value="{{$id->nazwa}}">{{$id->nazwa}} </option>
                    <option value="Zezwolenie">Zezwolenie</option>
                    <option value="Licencja">Licencja</option>
                    <option value="Licencja">Licencja - spedycja</option>
                    <option value="Licencja 7-9">Licencja 7-9</option>
                    <option value="Zaświadczenie">Zaświadczenie</option>
                @elseif($id->nazwa =='Zaświadczenie')
                    <option value="{{$id->nazwa}}">{{$id->nazwa}} </option>
                    <option value="Zezwolenie">Zezwolenie</option>
                    <option value="Licencja">Licencja</option>
                    <option value="Licencja">Licencja - spedycja</option>
                    <option value="Licencja 7-9">Licencja 7-9</option>
                    <option value="Licencja Pośrednictwo">Licencja Pośrednictwo</option>
                @endif
              </select>
          </div>
          @endforeach
        </div>

        <div class="row">

          <div class="col-md-3 form-group">
              <label for="adres"><strong>Nr dokumentu:</strong></label>
              <input type="text" class="form-control" name="nr_dok" value="{{$id->nr_dok}}" />
          </div>
          <div class="col-md-3 form-group">
            <label for="nr-dok-porzed"><strong>Poprzedni Nr dokumentu:</strong></label>
            <input type="text" class="form-control" name="p_nr_dok" value="{{$id->p_nr_dok}}" />
        </div>
          <div class="col-md-3 form-group">
            <label for="rodz_dok">Rodzaj:</label>
            <select class="form-control" name="rodz_dok">
             @if($id->rodz_dok == 'osoby')
               <option value="{{ $id->rodz_dok }}">{{ $id->rodz_dok }}</option>
               <option value="rzeczy">rzeczy</option>
             @elseif($id->rodz_dok == 'rzeczy')
               <option value="{{ $id->rodz_dok }}">{{ $id->rodz_dok }}</option>
               <option value="osoby">osoby</option>
             @endif
            </select>
          </div>
           <div class="col-md-3 form-group">
              <label for="miejscowosc">Nr druku:</label>
              <input type="text" class="form-control" name="nr_druku" value="{{$id->nr_druku}}" />
          </div>

        </div>
        <div class="row">
         <div class="col-md-3 form-group">
                <label for="gmina">Nr sprawy:</label>
                <input type="text" class="form-control" name="nr_sprawy" value="{{$id->nr_sprawy}}" />
        </div>
          <div class="col-md-3 form-group">
              <label for="tel">Data wniosku:</label>
              <input type="date" class="form-control" name="data_wn" value="{{$id->data_wn}}" />
          </div>
          <div class="col-md-3 form-group">
              <label for="tel">Data wydania:</label>
              <input type="date" class="form-control" name="data_wyd" value="{{$id->data_wyd}}" />
          </div>
          <div class="col-md-3 form-group">
              <label for="tel">Data ważności:</label>
              <input type="date"  name="data_waz" value="{{$id->data_waz}}" @if($id->data_waz < date('Y-m-d')) class="form-control bg-danger text-light" @else class="form-control bg-success text-light" @endif  />
          </div>
        </div>
        <div class="row">
           <div class="col-md-12 form-group">
                <label for="uwagi">@if(!empty($id->powod)) <span class="text-danger"><strong>Powód: (dotyczny zawieszenia / rezygnacji)</strong></span> @else Powód: (dotyczny zawieszenia / rezygnacji) @endif</label>
                <textarea class="form-control" id="pw" name="powod" value="{{$id->powod}}" />{{$id->powod}}</textarea>
            </div>
        </div>
        <div class="row">
          <div class="col-md-12 form-group">
              <label for="uwagi">Uwagi:</label>
              <textarea class="form-control" id="dk" name="uwagi" value="{{$id->uwagi}}" />{{$id->uwagi}}</textarea>
          </div>
        </div>
          <button type="submit" class="btn btn-success">Zapisz zmiany dokumentów</button>
      </form>
     </div>
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
    tinymce.init({
      selector: '#pw',
      language: 'pl'
    });
    </script>
<div class="text-center"><a href="/przedsiebiorca/{{$id->id_przed}}/dokument/{{$id->nr_dok}}" role="button" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Szczegóły przedsiębiorcy</a></div>
</div>
@endsection
