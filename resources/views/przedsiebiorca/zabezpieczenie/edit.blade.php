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
                <div class="card-header bg-success text-light" >
                <strong>Edycja zabezpieczenia finansowego</strong>
               </div>
               <div style="margin: 20px;padding-top: 1px;">
               @foreach($zdf as $zf)
               <form method="post" action="{{ route('zabezpieczenie.update', $zf->id) }}">
                    <div class="row" >
                            @csrf
                            @method('PATCH')
                        <div class="col-md-8 form-group">
                            <label for="id_przed">Przedsiębiorca:</label>
                            <input type="text" class="form-control" name="nazwa_firmy" value="{{$przedsiebiorca->nazwa_firmy}}" disabled="disabled"/>
                            <input type="hidden""  name="id_przed" value="{{$przedsiebiorca->id}}"/>

                        </div>
                        <div class="col-md-4 form-group">
                                <label for="imie">Numer:</label>
                             <input type="text" class="form-control" name="numer" value="{{$zf->numer}}" />
                            </div>
                    </div>

                    <div class="row">
                            <div class="col-md-4 form-group">
                               <label for="imie">Nazwa:</label>
                            <input type="text" class="form-control" name="nazwa" value="{{$zf->nazwa}}" />
                           </div>
                           <div class="col-md-4 form-group">
                               <label for="adres">Data od:</label>
                               <input type="date" class="form-control" name="data_od" value="{{$zf->data_od}}" />
                           </div>
                           <div class="col-md-4 form-group">
                               <label for="">Data do:</label>
                               <input type="date" class="form-control" name="data_do" value="{{$zf->data_do}}" />
                           </div>

                         </div>

                         <div class="row">

                          <div class="col-md-4 form-group">
                               <label for="miejscowosc">Na ile pojazdów:</label>
                               <input type="text" class="form-control" name="ile_poj" value="{{$zf->ile_poj}}" />
                           </div>
                            <div class="col-md-4 form-group">
                               <label for="gmina">Suma zabezpieczenia w &euro;:</label>
                               <input type="text" class="form-control" name="suma_zab" value="{{$zf->suma_zab}}" />
                           </div>
                            <div class="col-md-4 form-group">
                               <label for="gmina">Status</label>
                               @if($zf->status == '1' && $zf->data_do > date('Y-m-d'))
                                    <select name="status" class="form-control bg-success text-light">
                                            <option value="{{$zf->status}}">Ważne</option>
                                    </select>
                                    @else
                                    <select name="status" class="form-control bg-danger text-light">
                                         <option value="{{$zf->status}}"> Nieważne</option>
                                    </select>
                                @endif
                           </div>
                         </div>
                    <div class="row">
                      <div class="col-md-12 form-group">
                          <label for="uwagi">Uwagi:</label>
                          <textarea class="form-control" id="zf" name="uwagi" value="{{$zf->uwagi}}" />{{$zf->uwagi}}</textarea>
                      </div>
                    </div>

                    @endforeach

                      <button type="submit" class="btn btn-success">Zapisz zmiany zabezpieczenia</button>
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
