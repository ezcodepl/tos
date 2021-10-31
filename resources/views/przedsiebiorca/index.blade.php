
@extends('layouts.app')

@section('content')
@php $id_dok = \App\DokumentyPrzed::all(); @endphp
@foreach($id_dok as $id)
 @php $nr_dok = $id->nr_dok; @endphp
@endforeach
<div class="container-fluid">
    <div class="col-md-12 text-center bg bg-primary" style="height: 8px;"></div>
    <div class="col-md-12 text-center text-primary shadow-sm p-2 mb-2 bg-white rounded"><h3>PRZEDSIĘBIORCY</h3></div>
<div class="p-2">
    <div class="row">
           <div class="col-md-6">
           @if(\App\Zdolnosc::where('data_do','<',date('Y-m-d'))->count() != 0)
            <a href="przedsiebiorca/zabezpieczenie/stare" role="button" class="btn btn-danger btn-sm" style="margin-bottom:5px;">
                Zabezpieczenie finansowe po terminie&nbsp;<span class="badge badge-light">{{$count = \App\Zdolnosc::where('data_do','<',date('Y-m-d'))->count()}}</span>
                <span class="sr-only">unread messages</span>
            </a>
            @else
            @endif

            @if(\App\Baza::where('dat_umowy','<',date('Y-m-d'))->count() != 0)
            <a href="przedsiebiorca/baza/stare" role="button" class="btn btn-danger btn-sm" style="margin-bottom:5px;">
                Umowa bazy po terminie&nbsp;<span class="badge badge-light">{{$count = \App\Baza::where('dat_umowy','<',date('Y-m-d'))->count()}}</span>
                <span class="sr-only">unread messages</span>
            </a>
            @else
            @endif

            @if(\App\Certyfikat::where('dat_umowy','<',date('Y-m-d'))->count() != 0)
            <a href="przedsiebiorca/zarzadzajacy/stare" role="button" class="btn btn-danger btn-sm" style="margin-bottom:5px;">
                Umowa z zarządzającym po terminie&nbsp;<span class="badge badge-light">{{$count = \App\Certyfikat::where('dat_umowy','<',date('Y-m-d'))->count()}}</span>
                <span class="sr-only">unread messages</span>
            </a>
            @else
            @endif

            @if(\App\DokumentyPrzed::where('data_waz','<',date('Y-m-d'))->count() != 0)
            <a href="przedsiebiorca/dokumenty/stare" role="button" class="btn btn-danger btn-sm" style="margin-bottom:5px;">
                Licencja wygasła&nbsp;<span class="badge badge-light">{{$count = \App\DokumentyPrzed::where('data_waz','<',date('Y-m-d'))->count()}}</span>
                <span class="sr-only">unread messages</span>
            </a>
            @else
            @endif

           </div>
           <div class="col-md-6 text-right">
              <span class="badge badge-warning" style="font-size:13px;"> L-O: {{$count = \App\DokumentyPrzed::where('rodz_dok','=','osoby')->where('nazwa','=','Licencja')->count()}}</span>
              <span class="badge badge-success" style="font-size:13px;"> L-R: {{$count = \App\DokumentyPrzed::where('rodz_dok','=','rzeczy')->where('nazwa','=','Licencja')->count()}}</span>
              <span class="badge badge-danger" style="font-size:13px;"> L-S: {{$count = \App\DokumentyPrzed::where('rodz_dok','=','rzeczy')->where('nazwa','=','Licencja Pośrednictwo')->count()}}</span>
              <span class="badge badge-secondary" style="font-size:13px;"> L 7-9: {{$count = \App\DokumentyPrzed::where('nazwa','=','Licencja 7-9')->count()}}</span>
              <span class="badge badge-warning" style="font-size:13px;"> Z-O: {{$count = \App\DokumentyPrzed::where('rodz_dok','=','osoby')->where('nazwa','=','Zezwolenie')->count()}}</span>
              <span class="badge badge-success" style="font-size:13px;"> Z-R: {{$count = \App\DokumentyPrzed::where('rodz_dok','=','rzeczy')->where('nazwa','=','Zezwolenie')->count()}}</span>
              <span class="badge badge-info" style="font-size:13px;"> P: {{$count = \App\DokumentyPrzed::where('rodz_dok','=','rzeczy')->where('nazwa','=','Licencja Pośrednictwo')->count()}}</span>
              <span class="badge badge-primary" style="font-size:13px;"> ZAŚ: {{$count = \App\DokumentyPrzed::where('nazwa','=','Zaświadczenie')->count()}}</span>
           </div>
    </div>
  <div class="">
    <div class="row card-body">
       <div class="col-md-3"><a href="przedsiebiorca/create" role="button" class="btn btn-success btn-sm">Nowy przedsiębiorca</a> <a href="przedsiebiorca/dokumenty/create" role="button" class="btn btn-success btn-sm">Nowy dokument</a></div>
       <div class="col-md-6">
           <form action="/search" method="get">
            <div class="input-group">
                @csrf
               <input type="search" name="search" class="form-control" placeholder="wpisz nr licencji, zezwolenia, zaświadczenia, nip, nazwisko, nazwę firmy">
               <div class="input-group-append">
                 <button class="btn btn-success btn-sm" type="submit">
                   <i class="fa fa-search"></i>
                 </button>
               </div>
             </div>
            </form>
        </div>
        <div class="col-md-3">
            <a class="btn btn-warning btn-sm" href="/kontrole" role="button" >Harmonogram kontroli</a>
            &nbsp; <a class="btn btn-info btn-sm" href="/raporty" role="button" >Raporty</a>
        </div>
    </div>

  </div>
 <div class="table-responsive">

    <div class="col-md-12">
       @if(empty($wyniki) or $wyniki ==0 )<div class='text-danger text-center col-md-12 p-2'> <strong>@if(!empty($brak)) {{$brak}} @else  @endif</strong></div>  @else <div class="bg text-center p-2 text-success">Znalezionych wyników: <strong>{{ $wyniki }}</strong></div>  @endif
    </div>

  <table class="table table-striped table-sm">
    <thead class="table-primary" style="font-weight:bold;">
        <tr>
          <th>Nr licencji</th>
          <th>Rodzaj</th>
          <th>Nazwa firmy</th>
          <th>Imię</th>
          <th>Nazwisko</th>
          <th>Adres</th>
          <th>Miejscowość</th>
          <th>NIP</th>
          <th>Telefon</th>
          <th colspan="4">Akcja</th>
        </tr>
    </thead>
    <tbody>
        @foreach($rodzaje as $petent)

        <tr>
            <td style="width:150px;" @foreach($id_dok as $id) @if($id->nr_dok == $petent->nr_dok) @if($id->status =="2") class="bg-warning" @elseif($id->status == '3') class="bg-danger text-light" @else  @endif @endif @endforeach >
              <strong>

                    @foreach($id_dok as $id)
                       @if($id->id == $petent->id)
                         {{$petent->nr_dok}}
                       @endif
                    @endforeach

              </strong></td>

            <td @foreach($id_dok as $id) @if($id->nr_dok == $petent->nr_dok) @if($id->status =="2") class="bg-warning" @elseif($id->status == '3') class="bg-danger text-light" @else  @endif @endif @endforeach >
               {{$petent->nazwa}} - {{$petent->rodz_dok}}
                <br />
                    @foreach($id_dok as $id)
                       @if($id->nr_dok == $petent->nr_dok && $id->status == '2')
                         <span class="text small p-0"><strong> {!!$id->powod!!} do </strong></span> <span class="badge badge-danger text-wrap">{{ \Carbon\Carbon::createFromDate($id->dat_zaw_do)->format('d-m-Y')}} r.</span>
                       @elseif($id->nr_dok == $petent->nr_dok && $id->status == '3')
                         <span class="text small p-0"><strong> {!!$id->powod!!} </strong></span>
                        @endif
                    @endforeach
            </td>
            <td style="width:280px;" @foreach($id_dok as $id) @if($id->nr_dok == $petent->nr_dok) @if($id->status =="2") class="bg-warning" @elseif($id->status == '3') class="bg-danger text-light" @else  @endif @endif @endforeach >{{$petent->nazwa_firmy}}</td>
            <td @foreach($id_dok as $id) @if($id->nr_dok == $petent->nr_dok) @if($id->status =="2") class="bg-warning" @elseif($id->status == '3') class="bg-danger text-light" @else  @endif @endif @endforeach >{{$petent->imie}}</td>
            <td @foreach($id_dok as $id) @if($id->nr_dok == $petent->nr_dok) @if($id->status =="2") class="bg-warning" @elseif($id->status == '3') class="bg-danger text-light" @else  @endif @endif @endforeach >{{$petent->nazwisko}}</td>
            <td @foreach($id_dok as $id) @if($id->nr_dok == $petent->nr_dok) @if($id->status =="2") class="bg-warning" @elseif($id->status == '3') class="bg-danger text-light" @else  @endif @endif @endforeach >{{$petent->adres}}</td>
            <td @foreach($id_dok as $id) @if($id->nr_dok == $petent->nr_dok) @if($id->status =="2") class="bg-warning" @elseif($id->status == '3') class="bg-danger text-light" @else  @endif @endif @endforeach >{{$petent->miejscowosc}}</td>
            <td @foreach($id_dok as $id) @if($id->nr_dok == $petent->nr_dok) @if($id->status =="2") class="bg-warning" @elseif($id->status == '3') class="bg-danger text-light" @else  @endif @endif @endforeach >{{$petent->nip}}</td>
            <td @foreach($id_dok as $id) @if($id->nr_dok == $petent->nr_dok) @if($id->status =="2") class="bg-warning" @elseif($id->status == '3') class="bg-danger text-light" @else  @endif @endif @endforeach >{{$petent->telefon}}</td>
            <td style="width:40px;text-align:center;">

                @foreach($id_dok as $id)

                  @if($id->nr_dok == $petent->nr_dok)

                  @if($id->status !="2")

                  @if($petent->nazwa == 'Licencja Pośrednictwo' or $petent->nazwa == 'Zaświadczenie')
                  <a  @if($id->status == '3')  style = "display:none;" @endif data-toggle="modal" data-id="{{$petent->nr_dok}}" role="button" class="openZawies btn btn-secondary btn-sm disabled" href="#zawies" title="Zawieszenie"><i class="fa fa-history"></i></a>

                  @else

                        <form  method="get" action="{{ route('zawies', ['id' => $id->id_przed, 'nr_dok' => $petent->nr_dok]) }}">
                        @csrf
                            <a  @if($id->status == '3')  style = "display:none;" @endif data-toggle="modal" data-id="{{$petent->nr_dok}}" role="button" class="openZawies btn btn-warning btn-sm" href="#zawies" title="Zawieszenie"><i class="fa fa-history"></i></a>
                        </form>
                    @endif
                  @else

                    <a  @if($id->status == '3')  style = "display:none;" @endif data-toggle="modal" data-id="{{$petent->nr_dok}}" role="button" class="openOdwies btn btn-success btn-sm" href="#odwies" title="Odwieś"><i class="fa fa-recycle"></i></a>
                  @endif
                 @endif
                @endforeach

            </td>
            <td style="width:30px;">
                @foreach($id_dok as $id)

                    @if($id->nr_dok == $petent->nr_dok)
                        @if($id->status =='3')
                        @else
                        <a data-toggle="modal" data-id="{{$petent->id}}" role="button" class="openRezygnuj btn btn-danger btn-sm"  href="#rezygnacja" title="Rezygnacja"><i class="fa fa-user-slash fa-1x"></a></td>
                        @endif
                    @endif
               @endforeach
            <td><a href="{{ route('show',['id'=>$petent->id, 'nr_dok'=>$petent->nr_dok])}}" class="btn btn-sm btn-primary" title="Podgląd"><i class="fa fa-eye"></a></td>
        </tr>
        @endforeach
    </tbody>
  </table>
  <div>{{ $rodzaje->links() }}</div>
  <div class="text-center"><a href="/" role="button" class="btn btn-primary"><i class="fas fa-home fa-lg"></i> Home </a></div>
</div>
<div>
</div>

     <div class="modal fade" id="zawies">
        <div class="modal-dialog" style="margin:0 auto;top:25%;">
          <div class="modal-content">
            @foreach($id_dok as $id)
            <form  method="POST" action="{{ route('zawies', ['id' => $id->id_przed, 'nr_dok' => $id->nr_dok] ) }}" >
            <!-- Modal Header -->
            @endforeach
            <div class="modal-header bg-warning">
              <h4 class="modal-title">Zawieszenie licencji / zezwolenia</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                @csrf
                @method('PATCH')
              Data zawieszenia od: <input class="form-control" type="date" id="dat_zaw" name="dat_zaw" /><br />
              Data zawieszenia do: <input class="form-control" type="date" id="dat_zaw_do" name="dat_zaw_do" /><br />
              Podaj powód zawieszenia: <textarea class="form-control" id="powod" name="powod"></textarea><br />
              @foreach($id_dok as $id)
                @php $nr_dok = $id->nr_dok; @endphp
                <input type="hidden" id="idz" name="nr_dok" value="{{$nr_dok}} " />
              @endforeach
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-dark" data-dismiss="modal">Zamknij</button>
              <button type="submit" class="btn btn-warning">Zawieś</button>

            </div>
           </form>

          </div>
        </div>
      </div>
      <script>
            $(document).on("click", ".openZawies", function () {
                  var zawId = $(this).data('id');
                  $(".modal-body #idz").val( zawId );

              });
         </script>

    <div class="modal fade" id="odwies">
        <div class="modal-dialog" style="margin:0 auto;top:25%;">
          <div class="modal-content">
            @foreach($id_dok as $id)
            <form  method="POST" action="{{ route('odwies', ['id' => $id->id_przed, 'nr_dok' => $nr_dok] ) }}" >
            <!-- Modal Header -->
            @endforeach
            <div class="modal-header bg-warning">
              <h5 class="modal-title">Przywrócenie po zawieszeniu licencji / zezwolenia</h5>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                @csrf
                @method('PATCH')
              Wprowadź datę odwieszenia: <input class="form-control" type="date"  name="dat_odw" /><br />
              @foreach($id_dok as $id)
              @php $nr_dok = $id->nr_dok; @endphp
              <input type="hidden" id="ido" name="nr_dok" value="{{$nr_dok}}" />
              @endforeach

            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-dark" data-dismiss="modal">Zamknij</button>
              <button type="submit" class="btn btn-success">Odwieś</button>

            </div>
           </form>

          </div>
        </div>
      </div>
      <script>
            $(document).on("click", ".openOdwies", function () {
                  var odwId = $(this).data('id');
                  $(".modal-body #ido").val( odwId );

              });
         </script>

        <div class="modal fade" id="rezygnacja">
            <div class="modal-dialog" style="margin:0 auto;top:25%;">
            <div class="modal-content">
                @foreach($id_dok as $id)
                <form  method="POST" action="{{ route('rezygnacja', ['id' => $id->id_przed, 'nr_dok' => $nr_dok] ) }}" >
                <!-- Modal Header -->
                @endforeach
                <div class="modal-header bg-danger text-light">
                <h5 class="modal-title">Rezygnacja - Wycofanie z licencji / zezwolenia</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    @csrf
                    @method('PATCH')
                Wprowadź datę z decyzji: <input class="form-control" type="date" id="dat_rez" name="dat_rez" /><br />
                Podaj powód rezygnacji/wycofania: <textarea class="form-control" id="powod" name="powod"></textarea><br />
                <input type="hidden" id="idr" name="id" value="@foreach($rodzaje as $petent) {{$petent->id}} @endforeach" />


                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-dismiss="modal">Zamknij</button>
                <button type="submit" class="btn btn-danger">Rezygnuj/Wycofaj</button>

                </div>
            </form>

            </div>
            </div>
        </div>
        <script>
                $(document).on("click", ".openRezygnuj", function () {
                    var rezId = $(this).data('id');
                    $(".modal-body #idr").val( rezId );

                });
            </script>

@endsection
