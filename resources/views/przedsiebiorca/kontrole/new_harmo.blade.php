@extends('layouts.app')

@section('content')

<div class="container-fluid">
        <div class="col-md-12 text-center bg bg-primary" style="height: 8px;"></div>
        <div class="col-md-12 text-center text-primary shadow-sm p-2 mb-2 bg-white rounded"><h3>PRZEDSIĘBIORCY - <span class="text-warning">KONTROLE</span></h3></div>
    <div class="p-2 text-center">
        <div class="text-success" style="font-size:20px;"><strong>Nowy harmonogram kontroli na {{$newyear}}</strong></div>
    </div>

    <table class="table table-striped table-sm table-bordered" style="width:70%;margin:0 auto;">
        <thead class="table-primary" style="font-weight:bold;">
            <tr>
              <th>Lp.</th>
              <th class="text-center"><input type="checkbox" id="checkAll"  /></th>
              <th>Nazwa firmy</th>
              <th>Gmina</th>
              <th class="text-center">Kontrola</th>
              <th class="text-center">Termin</th>
            </tr>
        </thead>
        <tbody>


            @foreach($dok as $dk)
             <tr>
                <td>{{$loop->iteration}}</td>
                <td class="text-center"><input type="checkbox" name="id[]" value="{{$dk->id}}" /></td>
                <td style="width:350px;">{{$dk->nazwa_firmy}} <br />{{$dk->adres}} <br />{{$dk->kod_p}} {{$dk->miejscowosc}} <br /> {{$dk->nazwa}} Nr:<strong>{{$dk->nr_dok}}</strong> </td>
                <td>{{$dk->gmina}}</td>
                <td style="width:300px;text-center">Spełnienie wymagań posiadania zezwolenia na wykonywanie zawodu przewoźnika drogowego</td>
                <td class="text-center"><strong>luty - listopad <br /> @php echo date('Y'); @endphp</strong></td>
             </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
  $('#checkAll').click(function () {
     $('input:checkbox').prop('checked', this.checked);
 });
</script>
@endsection
