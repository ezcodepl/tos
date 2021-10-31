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
                <strong>Edycja bazy eksploatacyjnej przedsiębiorcy</strong>
               </div>
              <div style="margin: 20px;">
              @foreach($baza as $bz)

               <form method="post" action="{{ route('baza.update', $bz->id) }}">
                 <div class="row">
                       @csrf
                       @method('PATCH')
                   <div class="col-md-8 form-group">
                        <label for="id_przed">Przedsiębiorca:</label>
                       <input type="text" class="form-control" name="nazwa_firmy" value="{{$przedsiebiorca->nazwa_firmy}}" disabled="disabled"/>
                       <input type="hidden""  name="id_przed" value="{{$przedsiebiorca->id}}"/>
                   </div>
                    <div class="col-md-4 form-group">
                       <label for="imie">Rodzaj:</label>
                        <select class="form-control" name="rodzaj" id="rodzaj" value="{{$bz->rodzaj}}" >

                          @if($bz->rodzaj =='1')
                               <option value="{{$bz->rodzaj}}">Miejsce postojowe</option>
                               <option value="2">Miejsce załadunku/rozładunku</option>
                               <option value="3">Konserwacja i naprawa</option>
                          @elseif($bz->rodzaj =="2")
                               <option value="{{$bz->rodzaj}}">Miejsce załadunku/rozładunku</option>
                               <option value="1">Miejsce postojowe</option>
                               <option value="3">Konserwacja i naprawa</option>
                          @elseif($bz->rodzaj =="3")
                               <option value="{{$bz->rodzaj}}">Konserwacja i naprawa</option>
                               <option value="1">Miejsce postojowe</option>
                               <option value="2">Miejsce załadunku/rozładunku</option>
                          @endif
                        </select>
                   </div>
                 </div>

                 <div class="row">

                   <div class="col-md-3 form-group">
                       <label for="adres">Adres:</label>
                       <input type="text" class="form-control" name="adres" value="{{$bz->adres}}" />
                   </div>
                   <div class="col-md-3 form-group">
                       <label for="kod_p">Kod pocztowy:</label>
                       <input type="text" class="form-control" name="kod_p" maxlength="6" placeholder="xx-xxx" value="{{$bz->kod_p}}" />
                   </div>
                    <div class="col-md-3 form-group">
                       <label for="miejscowosc">Miejscowość:</label>
                       <input type="text" class="form-control" name="miasto" value="{{$bz->miasto}}" />
                   </div>
                    <div class="col-md-3 form-group">
                       <label for="gmina">Gmina:</label>
                       <input type="text" class="form-control" name="gmina" value="{{$bz->gmina}}" />
                   </div>
                 </div>
                 @endforeach

                 <div class="row">
                   <div class="col-md-4 form-group">
                       <label for="wlasnosc">Własność:</label>
                       <select class="form-control" name="wlasnosc">
                        @if($bz->wlasnosc =='Tak')
                         <option value="{{$bz->wlasnosc}}">{{$bz->wlasnosc}}</option>
                         <option value="Nie">Nie</option>
                        @elseif($bz->wlasnosc =='Nie')
                         <option value="{{$bz->wlasnosc}}">{{$bz->wlasnosc}}</option>
                         <option value="Tak">Tak</option>
                        @endif
                       </select>
                   </div>
                   <div class="col-md-4 form-group">
                       <label for="tel">Umowa:</label>
                       <input type="text" class="form-control" name="umowa" value="{{$bz->umowa}}" @if($bz->wlasnosc == 'Tak') disabled @else  @endif />
                   </div>
                   <div class="col-md-4 form-group">
                       <label for="tel">Data umowy:</label>
                       <input type="date" class="form-control" name="dat_umowy" value="{{$bz->dat_umowy}}" @if($bz->wlasnosc == 'Tak') disabled @else  @endif />
                   </div>
                 </div>
                 <div class="row">
                   <div class="col-md-12 form-group">
                       <label for="uwagi">Uwagi:</label>
                       <textarea class="form-control" id="bz" name="uwagi" value="{{$bz->uwagi}}" />{{$bz->uwagi}}</textarea>
                   </div>
                 </div>
                <input type="hidden" name="id_dok" value="{{$id->id}}" />
                   <button type="submit" class="btn btn-success">Zapisz zmiany bazy</button>
               </form>
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
</div>

</div>
<div class="text-center"><a href="/przedsiebiorca/{{$id->id_przed}}/dokument/{{$id->nr_dok}}" role="button" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Szczegóły przedsiębiorcy</a></div>
</div>
@endsection


