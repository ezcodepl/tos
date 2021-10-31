@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="col-md-12 text-center bg bg-success" style="height: 8px;"></div>
    <div class="col-md-12 text-center text-success shadow-sm p-2 mb-2 bg-white rounded"><h3>OSK i INSTRUKTORZY - INSTRUKTORZY NAUKI JAZDY</h3></div>
    <div class="container text-center">
        
        <div class="row p-2"><a href="{{ route('instruktor.create') }}" role="button" class="btn btn-success btn-sm">Nowy instruktor</a></div>
        <div class="row">
            <table class="table table-striped table-sm text-center">
                <thead class="table-primary">
                    <th>Lp.</th>
                    <th>Nr instruktora</th>
                    <th>Poprzedni Nr</th>
                    <th>Legitymacja</th>
                    <th>Nazwisko</th>
                    <th>Imię</th>
                    <th>Badanie Lekarskie</th>
                    <th>Badanie Psychologiczne</th>
                    <th>Warsztaty</th>
                    <th>Akcja</th>
                </thead>
                <tbody>
                    @foreach($instruktor as $ins)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $ins->nr_upr }}</td>
                        <td>{{ $ins->p_nr_upr }}</td>
                        <td>{{ $ins->nr_leg }}</td>
                        <td>{{ $ins->nazwisko }}</td>
                        <td>{{ $ins->imie }}</td>
                        <td>{{ $ins->orz_lek }}</td>
                        <td>{{ $ins->orz_psy }}</td>
                        <td>{{ $ins->warsztaty }}</td>
                        <td>
                            <a href="#" role="button" class="btn btn-danger btn-sm"><i class="fas fa-user-slash"></i></a> 
                            <a href="{{ route('instruktor.show', ['instruktor'=>$ins->id, 'nr_upr'=>$ins->nr_upr]) }}" role="button" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a> 
                            <!-- , 'nr_upr'=>$ins->nr_upr -->
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col text-center"><a href="/osk" role="button" class="btn btn-primary btn-sm">Powrót</a></div>
    </div>