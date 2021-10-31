@extends('layouts.app')

@section('content')

<div class="container-fluid">
        <div class="col-md-12 text-center bg bg-primary" style="height: 8px;"></div>
        <div class="col-md-12 text-center text-primary shadow-sm p-2 mb-2 bg-white rounded"><h3>PRZEDSIĘBIORCY - <span class="text-warning">KONTROLE</span></h3></div>
    <div class="p-2">
    <a href="przedsiebiorca/kontrole/new_harmo" role="button" class="btn btn-success btn-sm">Nowy harmonogram na rok @php $date = date('Y'); @endphp {{ \Carbon\Carbon::createFromDate($date)->addyear(1)->format('Y') }}</a>
    </div>
    <table class="table table-striped table-sm">
        <thead class="table-primary" style="font-weight:bold;">
            <tr>
              <th>Lp.</th>
              <th>Nr licencji</th>
              <th>Nazwa firmy</th>
              <th>Nazwa kontroli</th>
              <th>Data roz.</th>
              <th>Data zak.</th>
              <th>Ostatnia kontrola</th>
              <th>Miejscowość</th>
              <th>Gmina</th>
              <th>Telefon</th>
              <th colspan="4">Akcja</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
@endsection
