
@extends('layouts.app')

@section('content')
<div class="container-fluid">
<div><br />
 <p style="font-size:1px;">{{$i=1}}</p>

  @foreach($zdolnosc as $zdl)
    @if($zdl->data_do != null && $zdl->data_do < date('Y-m-d'))

      @php $nr_dok = \App\DokumentyPrzed::find($zdl->id_dok_przed)->nr_dok; @endphp


       <div class="alert alert-danger">
          <strong>{{$i++}}</strong> - Nr dok: <strong>    {{$nr_dok}}   </strong> - {{$ilosc_zdlolnosci_po_terminie= \App\Przedsiebiorca::find($zdl->id_przed)->nazwa_firmy}}
           - <strong> {{$zdl->data_do}} po terminie {{$dni = (strtotime($zdl->data_do) - strtotime(date('Y-m-d'))) / (60*60*24)}} dni</strong> <a role="button" class="btn btn-danger btn-sm text-light" href="{{ route('przedsiebiorca.show',$zdl->id_przed.'/dokument/'.$nr_dok)}}">Podgląd</a>
        </div>
    @endif
  @endforeach
</div>
<div class="conteiner text-center">
    <a class="btn btn-primary" href="/przedsiebiorca" role="button">Powrót do listy przedsiębiorców</a>
</div>
@endsection
