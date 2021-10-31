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
<div class="container">

  
	  <div class="card uper">

	  	<div  role="dialog" >
                  <div >
                    <div >
                      <div class="modal-header  bg-success">
                        <div class="card-header bg-success text-light" >
                           Edycja pojazdu przedsiębiorcy o  -
                             <span style="color:#000;font-size:15px;"> Nr licencji / zezwolenia:
                              
            
                             </span><span style="color: #fff;font-size:15px;">wydano dn.   r.</span>

                          </div>
                        <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        
                        
                       
                          <!-- Form add new car -->
                          <form method="post" action="{{ route('pojazdy.update', $cars->id) }}">
                            <div class="row">
                                  @csrf
                           		  @method('HEAD')
                               <div class="col-md-12 form-group">
                                  <label for="nr_rej"><strong>Numer rejestracyjny:</strong></label>
                                  <input type="text" class="form-control" name="nr_rej" value="{{$cars->nr_rej}}"/>
                              </div>
                             </div>

                            <div class="row">

                              <div class="col-md-4 form-group">
                                  <label for="nr_dok"><strong>Rodzaj pojazdu:</strong></label>
                                  <input type="text" class="form-control" name="rodzaj_poj" value="{{$cars->rodzaj_poj}}" />
                              </div>
                              <div class="col-md-4 form-group">
                                  <label for="kod_p"><strong>Marka:</strong></label>
                                  <input type="text" class="form-control" name="marka" value="{{$cars->marka}}" />
                              </div>
                               <div class="col-md-4 form-group">
                                  <label for="nr_druku"><strong>Nr VIN:</strong></label>
                                  <input type="text" class="form-control" name="nr_vin" maxlength="17" value="{{$cars->nr_vin}}" />
                              </div>

                            </div>


                            <div class="row">
                               <div class="col-md-4 form-group">
                                  <label for="nr_sprawy"><strong>DMC/OS:</strong></label>
                                  <input type="text" class="form-control" name="dmc" value="{{$cars->dmc}}" />
                              </div>
                              <div class="col-md-4 form-group">
                                  <label for="tel"><strong>Własność:</strong></label>
                                  <input type="text" class="form-control" name="wlasnosc" value="{{$cars->wlasnosc}}" />
                              </div>
                              <div class="col-md-4 form-group">
                                  <label for="tel"><strong>Data wprowadzenia:</strong></label>
                                  <input type="date" class="form-control" name="data_wpr" value="{{$cars->data_wpr}}" />
                              </div>

                            </div>
                            <div class="row">
                              <div class="col-md-12 form-group">
                                  <label for="uwagi"><strong>Uwagi:</strong></label>
                                  <input type="text" class="form-control" name="uwagi" value="{{$cars->uwagi}}" />
                              </div>
                            </div>
                            <input type="hidden" name="id_przed" value="" />
                            <input type="hidden" name="id_dok_przed" value="" />
                      </div>
                      <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
                        <button type="submit" class="btn btn-success">Zapisz zmiany</button>
                    
                      
                         </form>
                      </div>
                    </div>
                  </div>
                

                </div>

	  </div>
</div>
<div class="text-center"><a href="/przedsiebiorca" role="button" class="btn btn-primary"><i class="fas fa-home fa-lg"></i> Przedsiębiorcy </a></div>
</div>
@endsection