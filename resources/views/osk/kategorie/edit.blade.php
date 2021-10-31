@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="col-md-12 text-center bg bg-success" style="height: 8px;"></div>
    <div class="col-md-12 text-center text-success shadow-sm p-2 mb-2 bg-white rounded"><h3>OSK i INSTRUKTORZY - INSTRUKTORZY NAUKI JAZDY</h3></div>
    <div class="container">
        <div class="card uper">
          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
            </ul>
          </div><br />
        @endif
            <div class="card-header bg-success text-light ">
              Edycja kategorii instruktora nauki jazdy o numerze uprawnienia NR {{ $kat->nr_upr }}
            </div>
            <div class="card-body font-weight-bold">
                <form method="post" action="{{ route('kategorie.update' , $kat->id) }}">
                    @csrf
                   
                <div class="row text-center">
                    <div class="col-md-2 checkbox">
                        A <input type="checkbox" name="kat_a" class="form-control" @if($kat->kat_a >0) checked="checked" value="{{ $kat->kat_a }}" @else checked="" value="" @endif /><br />
                        Data: <input type="date" name="dat_a" @if(!$kat) @elseif($kat->dat_a >0) value="{{ $kat->dat_a }}" @else @endif class="form-control form-control-sm" />
                    </div>
                    <div class="col-md-2">
                        AM <input type="checkbox" name="kat_am" class="form-control" @if(!$kat) @elseif($kat->kat_am >0) checked value="{{ $kat->kat_am }}" @else  value="1" @endif /><br />
                        Data: <input type="date" name="dat_am" @if(!$kat) @elseif($kat->dat_am >0) value="{{ $kat->dat_am }}" @else @endif class="form-control form-control-sm" />
                    </div>
                    <div class="col-md-2">
                        A1 <input type="checkbox" name="kat_a1" class="form-control" @if(!$kat) @elseif($kat->kat_a1 >0) checked value="{{ $kat->kat_a1 }}" @else  value="1" @endif /><br />
                        Data: <input type="date" name="dat_a1" @if(!$kat) @elseif($kat->dat_a1 >0) value="{{ $kat->dat_a1 }}" @else @endif class="form-control form-control-sm" />
                    </div>
                    <div class="col-md-2">
                        A2 <input type="checkbox" name="kat_a2" class="form-control" @if(!$kat) @elseif($kat->kat_a2 >0) checked value="{{ $kat->kat_a2 }}" @else  value="1" @endif /><br />
                        Data: <input type="date" name="dat_a2" @if(!$kat) @elseif($kat->dat_a2 >0) value="{{ $kat->dat_a2 }}" @else @endif class="form-control form-control-sm" />
                    </div>
                    <div class="col-md-2">
                        B <input type="checkbox" name="kat_b" class="form-control" @if(!$kat) @elseif($kat->kat_b >0) checked value="{{ $kat->kat_b }}" @else  value="1" @endif  /><br />
                        Data: <input type="date" name="dat_b" @if(!$kat) @elseif($kat->dat_b >0) value="{{ $kat->dat_b }}"  @else @endif class="form-control form-control-sm" />
                    </div>
                    <div class="col-md-2">
                        B1 <input type="checkbox" name="kat_b1" class="form-control" @if(!$kat) @elseif($kat->kat_b1 >0) checked value="{{ $kat->kat_b1 }}" @else  value="1" @endif /><br />
                        Data: <input type="date" name="dat_b1" @if(!$kat) @elseif($kat->dat_b1 >0) value="{{ $kat->dat_b1 }}" @else @endif class="form-control form-control-sm" />
                    </div>
                </div>
                <div class="row">
                    &nbsp;
                </div>
                <div class="row text-center">
                    <div class="col-md-2 checkbox">
                        BE <input type="checkbox" name="kat_be" class="form-control" @if(!$kat) @elseif($kat->kat_be >0) checked value="{{ $kat->kat_be }}" @else  value="1" @endif /><br />
                        Data: <input type="date" name="dat_be" @if(!$kat) @elseif($kat->dat_be >0) value="{{ $kat->dat_be }}" @else @endif class="form-control form-control-sm" />
                    </div>
                    <div class="col-md-2">
                        C <input type="checkbox" name="kat_c" class="form-control" @if(!$kat) @elseif($kat->kat_c >0) checked value="{{ $kat->kat_c }}" @else  value="1" @endif /><br />
                        Data: <input type="date" name="dat_c" @if(!$kat) @elseif($kat->dat_c >0) value="{{ $kat->dat_c }}" @else @endif class="form-control form-control-sm" />
                    </div>
                    <div class="col-md-2">
                        C1 <input type="checkbox" name="kat_c1" class="form-control" @if(!$kat) @elseif($kat->kat_c1 >0) checked value="{{ $kat->kat_c1 }}" @else  value="1" @endif /><br />
                        Data: <input type="date" name="dat_c1" @if(!$kat) @elseif($kat->dat_c1 >0) value="{{ $kat->dat_c1 }}" @else @endif class="form-control form-control-sm" />
                    </div>
                    <div class="col-md-2">
                        C1E <input type="checkbox" name="kat_c1e" class="form-control" @if(!$kat) @elseif($kat->kat_c1e >0) checked value="{{ $kat->kat_c1e }}" @else  value="1" @endif /><br />
                        Data: <input type="date" name="dat_c1e" @if(!$kat) @elseif($kat->dat_c1e >0) value="{{ $kat->dat_c1e }}" @else @endif class="form-control form-control-sm" />
                    </div>
                    <div class="col-md-2">
                        CE <input type="checkbox" name="kat_ce" class="form-control" @if(!$kat) @elseif($kat->kat_ce >0) checked value="{{ $kat->kat_ce }}" @else value="1" @endif /><br />
                        Data: <input type="date" name="dat_ce" @if(!$kat) @elseif($kat->dat_ce >0) value="{{ $kat->dat_ce }}"  @else @endif class="form-control form-control-sm" />
                    </div>
                    <div class="col-md-2">
                        D <input type="checkbox" name="kat_d" class="form-control" @if(!$kat) @elseif($kat->kat_d >0) checked value="{{ $kat->kat_d }}" @else value="1" @endif /><br />
                        Data: <input type="date" name="dat_d" @if(!$kat) @elseif($kat->dat_d >0) value="{{ $kat->dat_d }}" @else @endif class="form-control form-control-sm" />
                    </div>
                </div>
                <div class="row">
                    &nbsp;
                </div>
                <div class="row text-center">
                    <div class="col-md-2 checkbox">
                        D1 <input type="checkbox" name="kat_d1" class="form-control" @if(!$kat) @elseif($kat->kat_d1 >0) checked value="{{ $kat->kat_d1 }}" @else value="1" @endif /><br />
                        Data: <input type="date" name="dat_d1" @if(!$kat) @elseif($kat->dat_d1 >0) value="{{ $kat->dat_d1 }}" @else @endif class="form-control form-control-sm" />
                    </div>
                    <div class="col-md-2">
                        D1E <input type="checkbox" name="kat_d1e" class="form-control" @if(!$kat) @elseif($kat->kat_d1e >0) checked value="{{ $kat->kat_d1e }}" @else value="1" @endif /><br />
                        Data: <input type="date" name="dat_d1e" @if(!$kat) @elseif($kat->dat_d1e >0) value="{{ $kat->dat_d1e }}" @else @endif class="form-control form-control-sm" />
                    </div>
                    <div class="col-md-2">
                        DE <input type="checkbox" name="kat_de" class="form-control" @if(!$kat) @elseif($kat->kat_de >0) checked value="{{ $kat->kat_de }}" @else value="1" @endif /><br />
                        Data: <input type="date" name="dat_de" @if(!$kat) @elseif($kat->dat_de >0) value="{{ $kat->dat_de }}" @else @endif class="form-control form-control-sm" />
                    </div>
                    <div class="col-md-2">
                        T <input type="checkbox" name="kat_t" class="form-control" @if(!$kat) @elseif($kat->kat_t >0) checked value="{{ $kat->kat_t }}" @else value="1" @endif /><br />
                        Data: <input type="date" name="dat_t" @if(!$kat) @elseif($kat->dat_t >0) value="{{ $kat->dat_t }}" @else @endif class="form-control form-control-sm" />
                    </div>
                    <div class="col-md-2">
                        T1 <input type="checkbox" name="kat_t1" class="form-control" @if(!$kat) @elseif($kat->kat_t1 >0) checked value="{{ $kat->kat_t1 }}" @else value="1" @endif /><br />
                        Data: <input type="date" name="dat_t1" @if(!$kat) @elseif($kat->dat_t1 >0) value="{{ $kat->dat_t1 }}" @else @endif class="form-control form-control-sm" />
                    </div>
                    
                </div>
                <div class="row">
                    &nbsp;
                </div>
                <div class="row">
                    <div class="col-md-12 checkbox">
                       <strong>Uwagi</strong><br />
                       <textarea name="uwagi" class="form-control" >{{ $kat->uwagi }}</textarea>
                    </div>
                </div>
               
               
            </div>
            
            </div>
            <div class="row">
                <div class="col text-center">
                    <input type="hidden" name="id_inst" value="{{ $kat->id_inst }}" />
                    <input type="submit"  class="btn btn-success btn-sm" value="Zapisz zmiany"> <a href="/instruktor/{{ $kat->id_inst }}" role="button" class="btn btn-primary btn-sm">Powrót</a>
                   </div>
            </div>
        </form>
        </div>
    </div>