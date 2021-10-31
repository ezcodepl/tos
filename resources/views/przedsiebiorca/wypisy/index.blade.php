
@extends('layouts.app')

@section('content')

<div class="container-fluid">
        <div class="col-md-12 text-center bg bg-primary" style="height: 8px;"></div>
        <div class="col-md-12 text-center text-primary shadow-sm p-2 mb-2 bg-white rounded"><h3>PRZEDSIĘBIORCY</h3></div>
    <div class="p-2">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<div class="container">
    <div class="card uper">

  <div class="card-header bg-dark text-light" >
   Wypisy z   @foreach($dok as $dk){{$dk->nazwa}}@endforeach -
     <span style="color: #00ddff;font-size:16px;"> Nr:

         {{ $dk->nr_dok }}

     </span><span style="color: #fff;font-size:16px;">wydano dn. {{ $dk->data_wyd}}   r.</span>

  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
       <div class="row">

          <div class="col-md-4">
              <div style="font-weight: bold;">{{$przedsiebiorca->nazwa_firmy }} <br />{{$przedsiebiorca->adres}}<br />{{$przedsiebiorca->kod_p}} {{$przedsiebiorca->miejscowosc}}</div>
              <p><strong>Rodzaj:</strong>@if($przedsiebiorca->id_osf=='1')
               Osoba fizyczna
              @elseif($przedsiebiorca->id_osf=='2')
               Sp. z o.o.
              @elseif($przedsiebiorca->id_osf=='3')
               Sp. z o.o. Sp. K.
              @elseif($przedsiebiorca->id_osf=='4')
               Sp. J.
              @elseif($przedsiebiorca->id_osf=='5')
               Sp. C.
              @endif</p>
          </div>
          <div class="col-md-4">
            <div><strong>NIP:</strong> {{$przedsiebiorca->nip}}</div>
              <div><strong>REGON:</strong> {{$przedsiebiorca->regon}}</div>

          </div>
          <div class="col-md-4">
            <span class="badge badge-success" style="font-size:14px;">Stan na dzień: @if(empty($stan->data_wyd)) brak danych @else {{$stan->data_wyd}} @endif r.</span>
            <br /><br /><a href="{{ url('/przedsiebiorca/' . $dk->id_przed. '/dokument/' . $dk->nr_dok. '/wypisyPDF/') }}" target="_blank" role="button" class="btn btn-warning">Wypisy PDF</a>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#nowyWypis">Dodaj nowy wypis</button>
                                     <!-- Modal -->
                        <div class="modal fade" id="nowyWypis" tabindex="-1" role="dialog" aria-labelledby="nowyWypisCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header  bg-dark">
                                <div class="card-header bg-dark text-light" >
                                    Lista wypisów przedsiębiorcy
                                    <span style="color: #00ddff;font-size:16px;"> {{$dk->nazwa}} o Nr: {{ $dk->nr_dok }}

                                    </span><span style="color: #fff;font-size:16px;">wydano dn. {{ $dk->data_wyd}}   r.</span>

                                    </div>
                                <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Form add new car -->
                                        <form method="post" action="{{ route('wypisy.store') }}">
                                    <div class="row">
                                            @csrf
                                        <div class="col-md-4 form-group">
                                            <label for="nr_wyp"><strong>Numer wypisu:</strong></label>
                                            <input type="text" class="form-control" name="nr_wyp"/>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="nr_druk"><strong>Nr druku:</strong></label>
                                            <input type="text" class="form-control" name="nr_druku"/>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="id_dok_przed"><strong>Nr dokumentu:</strong></label>
                                            <input type="text" class="form-control" name="_id_dok_przed" placeholder="{{$dk->nr_dok}}" disabled="disabled" />
                                            <input type="hidden" class="form-control" name="id_dok_przed" value="{{$dk->nr_dok}}" />
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="col-md-6 form-group">
                                         <label for="nazwa"><strong>Nazwa dokumentu:</strong></label>
                                         <input type="text" class="form-control" name="_nazwa" value="{{$dk->nazwa}}" disabled="disabled" />
                                         <input type="hidden" class="form-control" name="nazwa" value="{{$dk->nazwa}}" />
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="nazwa_wyp"><strong>Rodzaj dokuemntu:</strong></label>
                                            <input type="text" class="form-control" name="_nazwa" value="{{$dk->rodz_dok}}" disabled="disabled" />
                                            <input type="hidden" class="form-control" name="rodzaj_wyp" value="{{$dk->rodz_dok}}" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 form-group">
                                            <label for="data_wn"><strong>Data wniosku:</strong></label>
                                            <input type="date" class="form-control" name="data_wn"/>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="data_wyd"><strong>Data wydania:</strong></label>
                                            <input type="date" class="form-control" name="data_wyd" />
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="nr_sprawy"><strong>Numer sprawy:</strong></label>
                                            <input type="text" class="form-control" name="nr_sprawy" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <label for="uwagi"><strong>Uwagi:</strong></label>
                                            <input type="text" class="form-control" name="uwagi"/>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id_przed" value="{{$dk->id_przed}}" />
                                    <input type="hidden" name="id_dok_przed" value="{{$dk->id}}" />
                                </div>
                                <div class="modal-footer">

                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
                                <button type="submit" class="btn btn-success">Dodaj</button>
                                </form>
                                </div>
                            </div>
                            </div>


                        </div>
          </div>
       </div>
       <div class="row">
         <div class="col-md-12 text-center">
          <span style="font-size: 20px;"> <strong>WYPISY</strong></span>
         </div>
         <div class="col-md-12 text-center">

         </div>
         <div class="col-md-12">
        <table class="table table-bordered table-striped table-sm">
         <thead class="table-primary text-center" style="font-weight:bold;">
              <tr>
                <td>Nr wypisu</td>
                <td>Nr druku</td>
                <td>Nr dokumentu</td>
                <td>Nazwa</td>
                <td>Rodzaj wypisu</td>
                <td>Data wniosku</td>
                <td>Data wydania</td>

                <td colspan="3">Akcja</td>
              </tr>
          </thead>
          <tbody class="text-center">
             @if(count($wypisy) > 0)

              @foreach($wypisy as $wp)
              <tr>
                  <td  @if($wp->status=='2') class="bg-danger text-light" @else  @endif>{{$wp->nr_wyp}}<br /> <span style="font-size: 11px;color: yellow">{{$wp->dat_dep_wp}}</span></td>
                  <td  @if($wp->status=='2') class="bg-danger text-light" @else  @endif>{{$wp->nr_druku}}</td>
                  <td>@foreach($dok as $dk) {{$dk->nr_dok}} @endforeach</td>
                  <td>{{$wp->nazwa}}</td>

                  <td>{{$wp->rodzaj_wyp}}</td>
                  <td>{{$wp->data_wn}}</td>
                  <td>{{$wp->data_wyd}}</td>

                  <td>
                    <button class="btn btn-success carID"  data-toggle="modal" data-id="{{$wp->id}}" data-nr_wyp="{{$wp->nr_wyp}}" data-nr_druku="{{$wp->nr_druku}}" data-nr_sprawy="{{$wp->nr_sprawy}}" data-data_wn="{{$wp->data_wn}}" data-data_wyd="{{$wp->data_wyd}}" data-uwagi="{{$wp->uwagi}}" data-target="#editModal" alt="Edycja" ><i class="fa fa-edit"></i></button>
                  <td>
                    <button class="btn btn-danger" onclick="deleteData({{$wp->id}})"><i class="fa fa-trash"></i></button>

                  </td>
                  <td>
                    @if($wp->status=='1')
                     <a data-toggle="modal" data-id="{{$wp->id}}" role="button" class="open-AddBookDialog btn btn-danger btn-sm" href="#depozyt">Depozyt</a>
                    @else
                     <a data-toggle="modal" data-id="{{$wp->id}}" role="button" class="open-AddBookDialog btn btn-success btn-sm" href="#depozytwyd">Wydaj</a>
                    @endif
                 </td>
              </tr>

              @endforeach

              @else
                 <div class="row">Brak wypisów</div>
              @endif
          </tbody>
        </table>
                               <!-- Modal -->
                  <div class="modal fade" id="edycjaWypis" tabindex="-1" role="dialog" aria-labelledby="editWypisCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header  bg-success">
                                <div class="card-header bg-success text-light" >
                                    Lista wypisów przedsiębiorcy z {{$dk->nazwa}}
                                    <span style="color: #000;font-size:16px;"> Nr :

                                        {{ $dk->nr_dok }}

                                    </span><span style="color: #fff;font-size:16px;">wydano dn. {{ $dk->data_wyd}}   r.</span>


                                    </div>
                                <button type="button" class="close text-light" data-dismiss="modal" aria-label="Zamknij">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Form add new car -->
                                 <form method="post" action="{{ route('wypisy.update', 'idwyp') }}">
                                    <div class="row">
                                            @csrf
                                             @method('PATCH')
                                        <div class="col-md-4 form-control">
                                            <label for="nr_wyp"><strong>Numer wypisu:</strong></label>
                                            <input type="text" class="form-control" id="nr_wyp" name="nr_wyp" value="{{$wp->nr_wyp}}" />
                                        </div>
                                        <div class="col-md-4 form-control">
                                            <label for="nr_druk"><strong>Nr druku:</strong></label>
                                            <input type="text" class="form-control" name="nr_druku" id="nr_druku" />
                                        </div>
                                        <div class="col-md-4 form-control">
                                            <label for="id_dok_przed"><strong>Nr dokumentu:</strong></label>
                                            <input type="text" class="form-control" name="_id_dok_przed" placeholder="{{$dk->nr_dok}}" disabled="disabled" />
                                            <input type="hidden" class="form-control" name="nr_dok" value="{{$dk->nr_dok}}" />
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="col-md-6 form-control">
                                         <label for="nazwa"><strong>Nazwa dokumentu:</strong></label>
                                         <input type="text" class="form-control" name="_nazwa" value="{{$dk->nazwa}}" disabled="disabled" />
                                         <input type="hidden" class="form-control" name="nazwa" value="{{$dk->nazwa}}" />
                                        </div>
                                        <div class="col-md-6 form-control">
                                            <label for="nazwa_wyp"><strong>Rodzaj dokuemntu:</strong></label>
                                            <input type="text" class="form-control" name="_nazwa" value="{{$dk->rodz_dok}}" disabled="disabled" />
                                            <input type="hidden" class="form-control" name="rodzaj_wyp" value="{{$dk->rodz_dok}}" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 form-control">
                                            <label for="data_wn"><strong>Data wniosku:</strong></label>
                                            <input type="date" class="form-control" name="data_wn" id="data_wn" value="{{$wp->data_wn}}" />
                                        </div>
                                        <div class="col-md-4 form-control">
                                            <label for="data_wyd"><strong>Data wydania:</strong></label>
                                            <input type="date" class="form-control" name="data_wyd" id="data_wyd" value="{{$wp->data_wyd}}" />
                                        </div>
                                        <div class="col-md-4 form-control">
                                            <label for="nr_sprawy"><strong>Numer sprawy:</strong></label>
                                            <input type="text" class="form-control" name="nr_sprawy" id="nr_sprawy" value="{{$wp->nr_sprawy}}" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 form-control">
                                            <label for="uwagi"><strong>Uwagi:</strong></label>
                                            <input type="text" class="form-control" name="uwagi" id="uwagi" value="{{$wp->uwagi}}" />
                                        </div>
                                    </div>

                                    <input type="hidden" name="id_przed" value="{{$dk->id_przed}}" />

                                    <input type="hidden" name="idwyp" id="idwyp" value="{{$wp->id}}" />
                                </div>
                                <div class="modal-footer">

                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
                                <button type="submit" class="btn btn-success">Zapisz zmiany</button>
                                </form>
                                </div>


                            </div>
                            </div>


                        </div>

                        <!-- The Modal -->
             <div class="modal" id="depozyt">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <form  method="POST" action="{{ route('depozyt', ['id', 'nr_dok'=>$dk->nr_dok] ) }}" >
                    <!-- Modal Header -->
                    <div class="modal-header bg-danger text-light">
                      <h4 class="modal-title">Dodanie wypis do depozytu</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        @csrf
                        @method('PATCH')
                      Wprowadź datę depozytu: <input type="date" id="dat_dep_wp" name="dat_dep_wp" />
                      <input type="hidden" id="idw" name="id" value="{{$wp->id}}" />
                      <input type="hidden" name="id_przed" value="{{$dk->id_przed}}" />
                      <input type="hidden" name="id_dok_przed" value="{{$dk->id}}" />
                      <input type="hidden" name="nr_wyp" value="{{$wp->nr_wyp}}" />
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-dark" data-dismiss="modal">Zamknij</button>
                      <button type="submit" class="btn btn-danger">Depozyt</button>

                    </div>
                   </form>
                  </div>
                </div>
              </div>
              <script>
                    $(document).on("click", ".open-AddBookDialog", function () {
                          var myBookId = $(this).data('id');
                          $(".modal-body #idw").val( myBookId );

                      });
                 </script>

                         <!-- The Modal -->
             <div class="modal" id="depozytwyd">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <form  method="POST" action="{{ route('depozytwyd', ['id', 'nr_dok'=>$dk->nr_dok]) }}" >
                        <!-- Modal Header -->
                        <div class="modal-header bg-success text-light">
                          <h4 class="modal-title">Wydanie z depozytu</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            @csrf
                            @method('PATCH')
                          Wprowadź datę depozytu: <input type="date" id="dat_dep_wyd" name="dat_dep_wyd" />
                          <input type="hidden" id="idwyd" name="id" value="{{$wp->id}}" />
                          <input type="hidden" name="id_przed" value="{{$dk->id_przed}}" />
                          <input type="hidden" name="id_dok_przed" value="{{$dk->id}}" />
                        <input type="hidden" name="nr_wyp" value="{{$wp->nr_wyp}}" />
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                          <button type="button" class="btn btn-dark" data-dismiss="modal">Zamknij</button>
                          <button type="submit" class="btn btn-success">Wydaj</button>

                        </div>
                       </form>
                      </div>
                    </div>
                  </div>
                  <script>
                        $(document).on("click", ".open-AddBookDialog", function () {
                              var wydId = $(this).data('id');
                              $(".modal-body #idwyd").val( wydId );
                              // As pointed out in comments,
                              // it is unnecessary to have to manually call the modal.
                              // $('#addBookDialog').modal('show');
                          });
                     </script>

         </div>
       </div>
 </div>
<div><a class="btn btn-primary" href="/przedsiebiorca/{{$przedsiebiorca->id}}/dokument/{{$dk->nr_dok}}" role="button"><i class="fa fa-arrow-left"></i> Szczegóły przedsiębiorcy</a></div><br />
</div>
</div>

                                <script type="text/javascript">
                                     $(".carID").click(function () {
                                        var idwyp = $(this).attr('data-id');
                                        var nr_wyp = $(this).attr('data-nr_wyp');
                                        var nr_druku = $(this).attr('data-nr_druku');
                                        var nr_sprawy = $(this).attr('data-nr_sprawy');
                                        var data_wn = $(this).attr('data-data_wn');
                                        var data_wyd = $(this).attr('data-data_wyd');
                                        var uwagi = $(this).attr('data-uwagi');

                                        $("#idwyp").val(idwyp);
                                        $('#nr_wyp').val(nr_wyp);
                                        $('#nr_druku').val(nr_druku);
                                        $('#nr_sprawy').val(nr_sprawy);
                                        $('#data_wn').val(data_wn);
                                        $('#data_wyd').val(data_wyd);
                                        $('#uwagi').val(uwagi);

                                        $('#edycjaWypis').modal('show');
                                    });

                                    //method delete wypis
                                    function deleteData(id) {
                                        swal.fire({
                                            title: "Usunąć wypis?",
                                            text: "Upewnij się czy chcesz usunąć wypis!",
                                            type: "warning",
                                            showCancelButton: !0,
                                            confirmButtonText: "Tak, usuń go!",
                                            cancelButtonText: "Nie, anuluj!",
                                            reverseButtons: !0
                                        }).then(function (e) {

                                            if (e.value === true) {
                                                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                                                $.ajax({
                                                    type: 'POST',
                                                    url: "{{url('/destroy')}}/" + id,
                                                    data: {_token: CSRF_TOKEN},
                                                    dataType: 'JSON',
                                                    success: function (results) {

                                                        if (results.success === true) {
                                                            swal.fire("Usunięto!", results.message, "success");
                                                            location.reload();
                                                        } else {
                                                            swal.fire("Błąd!", results.message, "error");
                                                            location.reload();
                                                        }
                                                    }
                                                });

                                            } else {
                                                e.dismiss;
                                            }

                                        }, function (dismiss) {
                                            return false;
                                        })
                                    }
                                    </script>
    </div>
