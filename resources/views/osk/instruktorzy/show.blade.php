@extends('layouts.app')

@section('content')



<div class="container-fluid">
    <div class="col-md-12 text-center bg bg-success" style="height: 8px;"></div>
    <div class="col-md-12 text-center text-success shadow-sm p-2 mb-2 bg-white rounded"><h3>OSK i INSTRUKTORZY - INSTRUKTORZY NAUKI JAZDY</h3></div>
    <div class="container">
        <div class="card uper">  
          <div class="card-header bg-dark text-light">
           <div class="row">
            <div class="col-md-6">
              Szczegółowe dane instruktora: <span class="text-success font-weight-bold"> Nr {{ $instruktor->nr_upr }} </span> {{ $instruktor->imie }} {{ $instruktor->nazwisko }}
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ route('instruktor.edit', ['instruktor'=>$instruktor->id, 'nr_upr'=>$instruktor->nr_upr]) }}" class="btn btn-success btn-sm">Edytuj</a>
            </div>
           </div>
          </div>
          <div class="card-body">
            <div class="row">
                <div class="col-md-3 form-group">
                    <strong>Dane Instruktora</strong><br />
                    {{ $instruktor->imie }} {{ $instruktor->nazwisko }}<br />
                    {{ $instruktor->adres }} <br />
                    <strong>Telefon: </strong>{{ $instruktor->tel }} <br />
                    PESEL: {{ $instruktor->pesel }}
                </div>
                <div class="col-md-3 form-group">
                    <strong>Badania lekarskie</strong><br />
                    <span class="badge badge-success"> {{ $instruktor->orz_lek }}</span>
                </div>
                <div class="col-md-3 form-group">
                    <strong>Badania psychologiczne</strong><br />
                    <span class="badge badge-success"> {{ $instruktor->orz_psy }}</span>
                </div>
                <div class="col-md-3 form-group">
                    <strong>Legitymacja</strong><br />
                    Numer: {{ $instruktor->nr_leg }} <br />
                    Wydano: {{ $instruktor->dat_w_leg }}<br />
                    Ważność: <span class="badge badge-success"> {{ $instruktor->dat_w }}</span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 form-group">
                   <strong>Data wpisu do ewidencji</strong><br />
                   {{ $instruktor->dat_w }}
                </div>
                <div class="col-md-3 form-group">
                   <strong>Warsztaty</strong> <br />
                   {{ $instruktor->warsztaty }}
                </div>
                <div class="col-md-3 form-group">
                    <strong>Skreślony</strong> <br />
                    {{ $instruktor->dat_skr }}
                 </div>
                 <div class="col-md-3 form-group">
                    <strong>Powód</strong> <br />
                    {{ $instruktor->powod }}
                 </div>
            </div>
          
          </div>
        </div>
        
      
        @if($kategoria->count() == 0)
                  <div class="card uper">
                    <div class="card-header bg-warning">
                    <div class="row">
                        <div class="col-md-6">
                            Kategorie uprawnień instruktora: 
                        </div>
                        <div class="col-md-6 text-right">                           
                             <a href="{{ route('kategorie.create', ['id_inst'=>$instruktor->id, 'nr_upr'=>$instruktor->nr_upr]) }}" class="btn btn-primary btn-sm">Dodaj kategorię</a>
                        </div>
                    </div>
        @else
                @foreach($kategoria as $kat)

                <div class="card uper">
                    <div class="card-header bg-warning">
                    <div class="row">
                        <div class="col-md-6">
                            Kategorie uprawnień instruktora: 
                        </div>
                        <div class="col-md-6 text-right">
                           
                            @if($instruktor->id == $kat->id_inst && $instruktor->nr_upr == $kat->nr_upr) 

                                @if($kat) <a href="{{ route('kategorie.edit', ['kategorie'=>$kat->id, 'nr_upr'=>$instruktor->nr_upr]) }}" class="btn btn-success btn-sm">Edytuj kategorię</a> @else @endif
                            @else 

                                  @if($kat) @else <a href="{{ route('kategorie.create', ['nr_upr'=>$instruktor->nr_upr]) }}" class="btn btn-primary btn-sm">Dodaj kategorię</a> @endif

                            @endif

                        </div>
                    </div>
                    </div>
                    <div class="card-body">
                        <div class="row text-center">
                            <div class="col-md-2 checkbox">
                            A <input type="checkbox" class="form-control" disabled @if(!$kat) @elseif($kat->kat_a > 0) checked @else value="2" @endif /><br />
                            @if(!$kat) @elseif($kat->dat_a) <span class="badge badge-success">  Data: {{ $kat->dat_a }} </span> @else Data: ----- @endif
                            </div>
                            <div class="col-md-2">
                                AM <input type="checkbox" class="form-control" disabled @if(!$kat) @elseif($kat->kat_am == 1) checked @else @endif /><br />
                                @if(!$kat) @elseif($kat->dat_am) <span class="badge badge-success"> Data: {{ $kat->dat_am }} </span> @else Data: ----- @endif
                            </div>
                            <div class="col-md-2">
                                A1 <input type="checkbox" class="form-control" disabled @if(!$kat) @elseif($kat->kat_a1 == 1) checked @else @endif /><br />
                                @if(!$kat) @elseif($kat->dat_a1) <span class="badge badge-success"> Data: {{ $kat->dat_a1 }} </span> @else Data: ----- @endif
                            </div>
                            <div class="col-md-2">
                                A2 <input type="checkbox" class="form-control" disabled @if(!$kat) @elseif($kat->kat_a2 == 1) checked @else @endif /><br />
                                @if(!$kat) @elseif($kat->dat_a2) <span class="badge badge-success"> Data: {{ $kat->dat_a2 }} </span> @else Data: ----- @endif
                            </div>
                            <div class="col-md-2">
                                B <input type="checkbox" class="form-control" disabled @if(!$kat) @elseif($kat->kat_b == 1) checked @else @endif /><br />
                                @if(!$kat) @elseif($kat->dat_b) <span class="badge badge-success"> Data: {{ $kat->dat_b }} </span> @else Data: ----- @endif
                            </div>
                            <div class="col-md-2">
                                B1 <input type="checkbox" class="form-control" disabled @if(!$kat) @elseif($kat->kat_b1 == 1) checked @else @endif /><br />
                                @if(!$kat) @elseif($kat->dat_b1) <span class="badge badge-success"> Data: {{ $kat->dat_b1 }} </span> @else Data: ----- @endif
                            </div>
                        </div>
                        <div class="row">
                            &nbsp;
                        </div>
                        <div class="row text-center">
                            <div class="col-md-2 checkbox">
                                BE <input type="checkbox" class="form-control" disabled @if(!$kat) @elseif($kat->kat_be == 1) checked @else @endif /><br />
                                @if(!$kat) @elseif($kat->dat_be)<span class="badge badge-success"> Data: {{ $kat->dat_be }}</span> @else Data: ----- @endif
                            </div>
                            <div class="col-md-2">
                                C <input type="checkbox" class="form-control" disabled @if(!$kat) @elseif($kat->kat_c == 1) checked @else @endif /><br />
                                @if(!$kat) @elseif($kat->dat_c) <span class="badge badge-success">Data: {{ $kat->dat_c }}</span> @else Data: ----- @endif
                            </div>
                            <div class="col-md-2">
                                C1 <input type="checkbox" class="form-control" disabled @if(!$kat) @elseif($kat->kat_c1 == 1) checked @else @endif /><br />
                                @if(!$kat) @elseif($kat->dat_c1) <span class="badge badge-success">Data: {{ $kat->dat_c1 }}</span> @else Data: ----- @endif
                            </div>
                            <div class="col-md-2">
                                C1E <input type="checkbox" class="form-control" disabled @if(!$kat) @elseif($kat->kat_c1e == 1) checked @else @endif /><br />
                                @if(!$kat) @elseif($kat->dat_c1e) Data: {{ $kat->dat_c1e }} @else Data: ----- @endif
                            </div>
                            <div class="col-md-2">
                                CE <input type="checkbox" class="form-control" disabled @if(!$kat) @elseif($kat->kat_ce == 1) checked @else @endif /><br />
                                @if(!$kat) @elseif($kat->dat_ce) <span class="badge badge-success">Data: {{ $kat->dat_ce }} </span>@else Data: ----- @endif
                            </div>
                            <div class="col-md-2">
                                D <input type="checkbox" class="form-control" disabled @if(!$kat) @elseif($kat->kat_d == 1) checked @else @endif /><br />
                                @if(!$kat) @elseif($kat->dat_d)<span class="badge badge-success"> Data: {{ $kat->dat_d }} </span> @else Data: ----- @endif
                            </div>
                        </div>
                        <div class="row">
                            &nbsp;
                        </div>
                        <div class="row text-center">
                            <div class="col-md-2 checkbox">
                                D1 <input type="checkbox" class="form-control" disabled @if(!$kat) @elseif($kat->kat_d1 == 1) checked @else @endif /><br />
                                @if(!$kat) @elseif($kat->dat_d1) Data: {{ $kat->dat_d1 }} @else Data: ----- @endif
                            </div>
                            <div class="col-md-2">
                                D1E <input type="checkbox" class="form-control" disabled @if(!$kat) @elseif($kat->kat_d1e == 1) checked @else @endif  /><br />
                                @if(!$kat) @elseif($kat->dat_d1e) Data: {{ $kat->dat_d1e }} @else Data: ----- @endif
                            </div>
                            <div class="col-md-2">
                                DE <input type="checkbox" class="form-control" disabled @if(!$kat) @elseif($kat->kat_de == 1) checked @else @endif /><br />
                                @if(!$kat) @elseif($kat->dat_de) Data: {{ $kat->dat_de }} @else Data: ----- @endif
                            </div>
                            <div class="col-md-2">
                                T <input type="checkbox" class="form-control" disabled @if(!$kat) @elseif($kat->kat_t == 1) checked @else @endif /><br />
                                @if(!$kat) @elseif($kat->dat_t) Data: {{ $kat->dat_t }} @else Data: ----- @endif
                            </div>
                            <div class="col-md-2">
                                T1 <input type="checkbox" class="form-control" disabled @if(!$kat) @elseif($kat->kat_t1 == 1) checked @else @endif /><br />
                                @if(!$kat) @elseif($kat->dat_t1) Data: {{ $kat->dat_t1 }} @else Data: ----- @endif
                            </div>
                        
                            
                        </div>
                        <div class="row">
                            &nbsp;
                        </div>
                        <div class="row">
                            <div class="col-md-12 checkbox">
                            <strong>Uwagi</strong><br />
                            {{ $instruktor->uwagi }}
                            </div>
                        </div>
                    
                    </div>
                    @endforeach
        @endif

      
    

       
        
        </div>
        <div class="container">
            <div class="row ">
                <a href="/instruktor" class="btn btn-primary">Powrót do listy instruktorów</a>
            </div>
         </div>
    </div>
    </div>
