@extends('layouts.app')

@section('content')
<div class="container-fluid">
<div><br />
    <p style="font-size:1px;">{{$i=1}}</p>
    @foreach($dok as $dk)

    @endforeach
    @foreach($certyfikat as $oz)
      @if($oz->dat_umowy != null && $oz->dat_umowy < date('Y-m-d'))
      @php $nr_dok = \App\DokumentyPrzed::find($oz->id_dok_przed)->nr_dok; @endphp
         <div class="alert alert-danger">
            <strong>{{$i++}}</strong> - Nr dok: <strong>{{$nr_dok}}</strong> - {{$ilosc_bazy_po_terminie= \App\Przedsiebiorca::find($oz->id_przed)->nazwa_firmy}}
             - <strong> {{$oz->dat_umowy}} po terminie {{$dni = (strtotime($oz->dat_umowy) - strtotime(date('Y-m-d'))) / (60*60*24)}} dni</strong>
             <a role="button" class="btn btn-danger btn-sm text-light" href="{{ route('przedsiebiorca.show',$oz->id_przed.'/dokument/'.$nr_dok)}}">Podgląd</a>
          </div>

      @endif
    @endforeach
</div>
<div class="conteiner text-center">
    <a class="btn btn-primary" href="/przedsiebiorca" role="button">Powrót do listy przedsiębiorców</a>
</div>
@endsection
