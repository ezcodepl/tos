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
<div class="container-fluid" style="margin:0 auto;text-align:center;font-size:13px;">
    <div class="p-3"><a href="/" role="button" class="btn btn-primary"><i class="fa fa-home"></i>Home</a></div>
        <div class="row">

                <div class="col-md-3 text-left">
                    <div class="bg-warning p-3 text-center"><strong>Zdarzenia - zabezpieczenie finansowe</strong> </div>
                        <p style="font-size:1px;">{{$i=1}}</p>

                        @foreach($zdolnosc as $zdl)
                          @if($zdl->data_do < date('Y-m-d'))
                          @php $nr_dok = \App\DokumentyPrzed::find($zdl->id_dok_przed)->nr_dok; @endphp


                                    <div class="alert alert-danger">
                                        <strong>{{$i++}}</strong> - Nr dok: <strong>{{$nr_dok}}</strong> - {{$ilosc_zdlolnosci_po_terminie= \App\Przedsiebiorca::find($zdl->id_przed)->nazwa_firmy}}
                                        - <strong> {{$zdl->data_do}} po terminie {{$dni = (strtotime($zdl->data_do) - strtotime(date('Y-m-d'))) / (60*60*24)}} dni</strong>
                                         <a role="button" class="btn btn-danger btn-sm text-light" href="{{ route('przedsiebiorca.show', $zdl->id_przed.'/dokument/'.$nr_dok)}}">Podgląd</a>
                                    </div>

                          @endif
                        @endforeach
                                </div>
                <div class="col-md-3 text-left">
                        <div class="bg-warning p-3 text-center"><strong>Zdarzenia - osoba zarządzająca</strong></div>
                        <p style="font-size:1px;">{{$i=1}}</p>
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
                <div class="col-md-3 text-left">
                        <div class="bg-warning p-3 text-center"><strong>Zdarzenia - baza eksploatacyjna</strong></div>
                        <p style="font-size:1px;">{{$i=1}}</p>
                        @foreach($baza as $bz)
                            @if($bz->dat_umowy != null && $bz->dat_umowy < date('Y-m-d'))
                            @php $nr_dok = \App\DokumentyPrzed::find($bz->id_dok_przed)->nr_dok; @endphp
                            <div class="alert alert-danger">
                                <strong>{{$i++}}</strong> - Nr dok: <strong>{{$nr_dok}}</strong> - {{$ilosc_bazy_po_terminie= \App\Przedsiebiorca::find($bz->id_przed)->nazwa_firmy}}
                                - <strong> {{$bz->dat_umowy}} po terminie {{$dni = (strtotime($bz->dat_umowy) - strtotime(date('Y-m-d'))) / (60*60*24)}} dni</strong>
                                <a role="button" class="btn btn-danger btn-sm text-light" href="{{ route('przedsiebiorca.show',$bz->id_przed.'/dokument/'.$nr_dok)}}">Podgląd</a>
                                </div>

                            @endif
                        @endforeach
                            </div>
                <div class="col-md-3 text-left">
                                <div class="bg-warning p-3 text-center"><strong>Zdarzenia - wygaśnięcie licencji</strong></div>
                                <p style="font-size:1px;">{{$i=1}}</p>

                                @foreach($dok as $dk)
                                    @if($dk->data_waz != null && $dk->data_waz < date('Y-m-d'))

                                    <div class="alert alert-danger">
                                        <strong>{{$i++}}</strong> - Nr dok: <strong>{{$dk->nr_dok}}</strong> - {{$ilosc_lic_po_terminie= \App\Przedsiebiorca::find($dk->id_przed)->nazwa_firmy}}
                                        - <strong> {{$dk->data_waz}} po terminie {{$dni = (strtotime($dk->data_waz) - strtotime(date('Y-m-d'))) / (60*60*24)}} dni</strong>
                                        <a role="button" class="btn btn-danger btn-sm text-light" href="{{ route('przedsiebiorca.show',$dk->id_przed.'/dokument/'.$dk->nr_dok)}}">Podgląd</a>
                                        </div>

                                    @endif
                                @endforeach
                                    </div>
        </div>
</div>

@endsection
