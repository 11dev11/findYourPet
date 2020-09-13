@extends('layout.pageslayout')
@section('content')

<div style="min-height:260px;margin-top:">
@forEach($foundPetsBySearch as $foundPetBySearch)
{{$foundPetBySearch->id}}<br>
{{ $foundPetBySearch->animal}}<br>
{{ $foundPetBySearch->city}}<br>
{{$foundPetBySearch->breed}}<br>
@endForeach
</div>
<div style="min-height:260px;margin-top:">

{{$message}}<br>


</div>

<!-- <form>
        <div  class="form-row" style="height:20vh">
        <div class="col-12 col-md-8 mb-2 mb-md-0" style="margin:auto; padding-top:4%">
                <h4> Niste pronasli svog ljubimca? Probajte sa izmenjenim kriterijumima pretrage.</h4>
                </div>     
        </div>
            
            


            <div class="form-row">
              <div class="col-12 col-md-6 mb-2 mb-md-0">
                <input type="text" class="form-control form-control-lg" placeholder="Rasa">
              </div>
              <div class="col-12 col-md-6">
                <input type="text" class="form-control form-control-lg" placeholder="Pol">
              </div>
              
            </div>
            <div class="form-row">
              <div class="col-12 col-md-6 mb-2 mb-md-0">
                <input type="text" class="form-control form-control-lg" placeholder="Lokacija">
              </div>
              <div class="col-12 col-md-6">
                <input type="text" class="form-control form-control-lg" placeholder="Boja krzna">
              </div>
              
            </div>
            <div class="form-row">
              <div class="col-12 col-md-6">
                <input type="text" class="form-control form-control-lg" placeholder="Boja ociju">
              </div>
              <div class="col-12 col-md-6">
                <input type="text" class="form-control form-control-lg" placeholder="Boja ogrlice">
              </div>
              
            </div>
            <div class="form-row">
              <div id="move_to_center" class="col-17 col-md-6">
                
                <select class="form-control" id="select_sterilization" placeholder="Boja ociju">
                  <option value="" disabled selected>Sterilisan/a</option>
                  <option value="true">Da</option>
                  <option value="false">Ne</option>
                </select>
              </div>

            </div>            

             
            <div  class="form-row">
              
                <div class="col-12 col-md-3"  style="margin:auto">
                <button type="submit" class="btn btn-block btn-lg btn-primary">Pretrazi</button>
                </div>

            </div>
          </form> -->