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
            <div class="card-header bg-success text-light">
              Edycja danych instruktora nauki jazdy
            </div>
            <div class="card-body">
              <form method="post" action="{{ route('instruktor.update', $instruktor->id) }}">
                @csrf
                @method('PATCH')
                 <div class="row">
                   <div class="col-md-12 form-group">
                     <label for="">Wybierz Ośrodek Szkolenia Kierowców, w którym zatrudniony jest instruktor</label>
                     <select class="form-control form-control-sm" name="id_osk">
                       <option value="" selected>wybierz jeżeli ośrodek szkolenia kierowców znajduje się na terenie powiatu, innaczej pozostaw to pole</option>
                       <option value="{{ $instruktor->id_osk }}">{{ $instruktor->id_osk }}</option>
                     </select>
                   </div>
                 </div>
                 <div class="row"> 
                    <div class="col-md-3 form-group">
                            <label for="nr_upr"><strong>Nr Instruktora</strong></label>
                             <input id="nr_upr" class="form-control" type="text" name="nr_upr" value="{{ $instruktor->nr_upr }}" />
                     </div>
                     <div class="col-md-3 form-group">
                       <label for="p_nr_upr">Poprzedni Nr Instruktora</label>
                       <input id="p_nr_upr" class="form-control" type="text" name="p_nr_upr" value="{{ $instruktor->p_nr_upr }}" />
                     </div>
                     <div class="col-md-3 form-group">
                       <label for="dat_w">Data wydania</label>
                       <input id="dat_w" class="form-control" type="date" name="dat_w" value="{{ $instruktor->dat_w }}" />
                     </div>
                     <div class="col-md-3l form-group">
                       <label for="pesel">Pesel</label>
                       <input id="pesel" class="form-control" type="text" name="pesel" maxlength="11" value="{{ $instruktor->pesel }}" />
                     </div>
                 </div>
                 <div class="row">
                   <div class="col-md-4 form-group">
                     <label for="imie">Imię</label>
                     <input id="imie" class="form-control" type="text" name="imie" value="{{ $instruktor->imie }}" />
                   </div>
                   <div class="col-md-4 form-group">
                     <label for="nazwisko">Nazwisko</label>
                     <input id="nazwisko" class="form-control" type="text" name="nazwisko" value="{{ $instruktor->nazwisko }}" />
                   </div>
                   <div class="col-md-4 form-group">
                     <label for="adres">Adres</label>
                     <input id="adres" class="form-control" type="text" name="adres" value="{{ $instruktor->adres }}" />
                   </div>
                 </div>
                 <div class="row">
                   <div class="col-md-4 form-group">
                     <label for="nr_leg">Nr Legitymacji</label>
                     <input id="nr_leg" class="form-control" type="text" name="nr_leg" value="{{ $instruktor->nr_leg }}" />
                   </div>
                   <div class="col-md-4 form-group">
                     <label for="p_nr_leg">Poprzedni nr legitymacji</label>
                     <input id="p_nr_leg" class="form-control" type="text" name="p_nr_leg" value="{{ $instruktor->p_nr_leg }}" />
                   </div>
                   <div class="col-md-4 form-group">
                     <label for="dat_w_leg">Data wydania legitymacji</label>
                     <input id="dat_w_leg" class="form-control" type="date" name="dat_w_leg" value="{{ $instruktor->dat_w_leg }}" />
                   </div>
                 </div>
                 <div class="row">
                   <div class="col-md-4 form-group">
                     <label for="warsztaty">Warsztaty</label>
                     <input id="warsztaty" class="form-control" type="text" name="warsztaty" value="{{ $instruktor->warsztaty }}" />
                   </div>
                   <div class="col-md-4 form-group">
                     <label for="orz_lek">Orzeczenie Lekarskie</label>
                     <input id="orz_lek" class="form-control" type="date" name="orz_lek" value="{{ $instruktor->orz_lek }}" />
                   </div>
                   <div class="col-md-4 form-group">
                     <label for="orz_psy">Orzeczenie Psychologiczne</label>
                     <input id="orz_psy" class="form-control" type="date" name="orz_psy" value="{{ $instruktor->orz_psy }}" />
                   </div>
                 </div>
                 <div class="row">
                   <div class="col-md-4 form-group">
                     <label for="dat_skr"><strong>Data Skreślenia</strong></label>
                     <input id="dat_skr" class="form-control" type="date" name="dat_skr" value="{{ $instruktor->dat_skr }}" />
                   </div>
                   <div class="col-md-8">
                     <label for="powod">Powód skreślenia</label>
                     <input id="powod" class="form-control" type="text" name="powod" value="{{ $instruktor->powod }}" />
                   </div>
                 </div>
                 <div class="row">
                   <div class="col-md-6 form-group">
                     <label for="tel">Telefon</label>
                     <input id="tel" class="form-control" type="text" name="tel" value="{{ $instruktor->tel }}" />
                   </div>
                   <div class="col-md-6 form-group">
                     <label for="email">E-mail</label>
                     <input id="email" class="form-control" type="text" name="email" value="{{ $instruktor->email }}" />
                   </div>
                 </div>
                 <div class="row">
                   <div class="col-md-12 form-group">
                     <label for="uwagi">Uwagi</label>
                     <textarea id="uwagi" class="form-control" name="uwagi">{{ $instruktor->uwagi }}</textarea>
                   </div>
                 </div>
                
                
                
            </div>
            

    </div>
    <div class="col text-center">
        <input type="hidden" name="id" value="{{ $instruktor->id }}" />
        <input type="submit"  class="btn btn-success btn-sm" value="Zapisz zmiany"> <a href="/instruktor/{{ $instruktor->id }}" role="button" class="btn btn-primary btn-sm">Powrót</a>
       </div></form>