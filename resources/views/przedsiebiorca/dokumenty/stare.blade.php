@extends('layouts.app')

@section('content')
<div class="container-fluid">
<div><br />
    <p style="font-size:1px;">{{$i=1}}</p>
    @foreach($dok as $dk)

        @if($dk->data_waz != null && $dk->data_waz < date('Y-m-d'))


        <div class="alert alert-danger">
            <strong>{{$i++}}</strong> - Nr dok: <strong>{{$dk->nr_dok}}</strong> - {{$ilosc_bazy_po_terminie= \App\Przedsiebiorca::find($dk->id_przed)->nazwa_firmy}}
        - <strong> {{$dk->data_waz}} po terminie {{$dni = (strtotime($dk->data_waz) - strtotime(date('Y-m-d'))) / (60*60*24)}} dni  </strong>
            <a role="button" class="btn btn-danger btn-sm text-light" href="{{ route('przedsiebiorca.show',$dk->id_przed.'/dokument/'.$dk->nr_dok)}}">Podgląd</a>
            </div>

        @endif
    @endforeach
</div>
<div class="conteiner text-center">
    <a class="btn btn-primary" href="/przedsiebiorca" role="button">Powrót do listy przedsiębiorców</a>
</div>
@endsection
