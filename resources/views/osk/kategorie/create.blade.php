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
            <div class="card-header bg-primary text-light">
              Nowa kategoria instruktora nauki jazdy
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('kategorie.store') }}">
                    @csrf
                <div class="row text-center">
                    <div class="col-md-2 checkbox">
                        A <input type="checkbox" name="kat_a" class="form-control" value="1" /><br />
                        Data: <input type="date" name="dat_a" class="form-control form-control-sm" />
                    </div>
                    <div class="col-md-2">
                        AM <input type="checkbox" name="kat_am" class="form-control" value="1" /><br />
                        Data: <input type="date" name="dat_am" class="form-control form-control-sm" />
                    </div>
                    <div class="col-md-2">
                        A1 <input type="checkbox" name="kat_a1" class="form-control" value="1" /><br />
                        Data: <input type="date" name="dat_a1" class="form-control form-control-sm" />
                    </div>
                    <div class="col-md-2">
                        A2 <input type="checkbox" name="kat_a2" class="form-control" value="1" /><br />
                        Data: <input type="date" name="dat_a2" class="form-control form-control-sm" />
                    </div>
                    <div class="col-md-2">
                        B <input type="checkbox" name="kat_b" class="form-control" value="1" /><br />
                        Data: <input type="date" name="dat_b" class="form-control form-control-sm" />
                    </div>
                    <div class="col-md-2">
                        B1 <input type="checkbox" name="kat_b1" class="form-control" value="1" /><br />
                        Data: <input type="date" name="dat_b1" class="form-control form-control-sm" />
                    </div>
                </div>
                <div class="row">
                    &nbsp;
                </div>
                <div class="row text-center">
                    <div class="col-md-2 checkbox">
                        BE <input type="checkbox" name="kat_be" class="form-control" value="1" /><br />
                        Data: <input type="date" name="dat_be" class="form-control form-control-sm" />
                    </div>
                    <div class="col-md-2">
                        C <input type="checkbox" name="kat_c" class="form-control" value="1" /><br />
                        Data: <input type="date" name="dat_c" class="form-control form-control-sm" />
                    </div>
                    <div class="col-md-2">
                        C1 <input type="checkbox" name="kat_c1" class="form-control" value="1" /><br />
                        Data: <input type="date" name="dat_c1" class="form-control form-control-sm" />
                    </div>
                    <div class="col-md-2">
                        C1E <input type="checkbox" name="kat_c1e" class="form-control" value="1" /><br />
                        Data: <input type="date" name="dat_c1e" class="form-control form-control-sm" />
                    </div>
                    <div class="col-md-2">
                        CE <input type="checkbox" name="kat_ce" class="form-control" value="1" /><br />
                        Data: <input type="date" name="dat_ce" class="form-control form-control-sm" />
                    </div>
                    <div class="col-md-2">
                        D <input type="checkbox" name="kat_d" class="form-control" value="1" /><br />
                        Data: <input type="date" name="dat_d" class="form-control form-control-sm" />
                    </div>
                </div>
                <div class="row">
                    &nbsp;
                </div>
                <div class="row text-center">
                    <div class="col-md-2 checkbox">
                        D1 <input type="checkbox" name="kat_d1" class="form-control" value="1" /><br />
                        Data: <input type="date" name="dat_d1" class="form-control form-control-sm" />
                    </div>
                    <div class="col-md-2">
                        D1E <input type="checkbox" name="kat_d1e" class="form-control" value="1" /><br />
                        Data: <input type="date" name="dat_d1e" class="form-control form-control-sm" />
                    </div>
                    <div class="col-md-2">
                        DE <input type="checkbox" name="kat_de" class="form-control" value="1" /><br />
                        Data: <input type="date" name="dat_de" class="form-control form-control-sm" />
                    </div>
                    <div class="col-md-2">
                        T <input type="checkbox" name="kat_t" class="form-control" value="1" /><br />
                        Data: <input type="date" name="dat_t" class="form-control form-control-sm" />
                    </div>
                    <div class="col-md-2">
                        T1 <input type="checkbox" name="kat_t1" class="form-control" value="1" /><br />
                        Data: <input type="date" name="dat_t1" class="form-control form-control-sm" />
                    </div>
                    
                </div>
                <div class="row">
                    &nbsp;
                </div>
                <div class="row">
                    <div class="col-md-12 checkbox">
                       <strong>Uwagi</strong><br />
                       <textarea name="uwagi" id="" class="form-control"></textarea>
                    </div>
                </div>
               
               
            </div>
            
            </div>
            <div class="row">
                <div class="col text-center">
                    <input type="hidden" name="id_inst" value="{{ $_GET['id_inst'] }}" />
                    <input type="hidden" name="nr_upr" value="{{ $_GET['nr_upr'] }}" />
                    <input type="submit"  class="btn btn-success btn-sm" value="Dodaj kategorie"> <a href="/instruktor" role="button" class="btn btn-primary btn-sm">Powrót</a>
                   </div>
            </div>
        </form>
        </div>
    </div>