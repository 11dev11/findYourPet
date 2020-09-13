@extends('layout.pageslayout')
@section('content')

   <section style="margin-top:8vh;padding:4vh;">
   {!! Form::open(['route' => 'uploadSeenPet', 'method' => 'POST','name' => 'uploadForm', 'onsubmit'=>'return validateSearchForm()', 'enctype'=> 'multipart/form-data', 'class' => 'form', 'id' => 'located_page_form']) !!}   
   @csrf
        {!! Form::label('text', 'Broj cipa', ['class' => 'lable-text']) !!}
        {!! Form::number('chipNumber', 'chipNumber', ['class' => 'number-field chip-number-field']) !!}

        {!! Form::select('city', $selectData['cities'], null, ['class' => 'form-control width-40 bot-1', 'onchange' => 'showTownship(this)', 'placeholder' => 'Grad']) !!}

        {!! Form::select('township', $selectData['townships'], null, ['class' => 'form-control none width-40 bot-1', 'id'=>'township', 'placeholder' => 'Opstina']) !!}
<script type="text/javascript">


function showTownship(selectedCity){
    var selectedCityName = selectedCity.options[selectedCity.selectedIndex].innerHTML;
    if(selectedCityName === "Beograd"){
        document.getElementById('township').style.display = "block";
    }else{
        document.getElementById('township').style.display = "none";
    }

    
}

</script>
        {!! Form::text('street', '', ['class'=>'form-control width-40 bot-1 weak-text', 'id'=>'street-field', 'placeholder'=>'Unesite ulicu', "onfocus"=>"this.placeholder = ''", "onblur"=>"this.placeholder = 'Unesi ulicu'"]) !!}

        {!! Form::select('animal', $selectData['animals'], null, ['class' => 'form-control width-40 bot-1', 'onchange' => 'show(this);', 'placeholder' => 'Vrsta zivotinje']) !!}




        {!! Form::select('catBreed', $selectData['catBreeds'], "Rasa", ['class' => 'form-control width-40 bot-1 none', 'id'=>'catBreeds', 'placeholder' => 'Rasa']) !!}
        
        {!! Form::select('dogBreed', $selectData['dogBreeds'], "Rasa", ['class' => 'form-control width-40 bot-1 none', 'id'=>'dogBreeds', 'placeholder' => 'Rasa']) !!}

        {!! Form::select('sex', $selectData['sex'], "Pol", ['class' => 'form-control width-40 bot-1', 'id'=>'sex', 'placeholder' => 'Pol']) !!}

        {!! Form::select('size', $selectData['size'], "Velicina", ['class' => 'form-control none width-40 bot-1 none', 'id'=>'size', 'placeholder' => 'Velicina']) !!}

        {!! Form::select('furColor', $selectData['furColor'], "Boja krzna", ['class' => 'form-control none width-40 bot-1', 'id' => 'furColor', 'placeholder' => 'Boja krzna']) !!}

        {!! Form::select('furColor2', $selectData['furColor2'], "Boja sara", ['class' => 'form-control none width-40 bot-1', 'id' => 'furColor2', 'placeholder' => 'Boja sara']) !!}
        
        {!! Form::select('eyeColor', $selectData['eyeColor'], "Boja ociju", ['class' => 'form-control none width-40 bot-1','id'=>'eyeColor', 'placeholder' => 'Boja ociju']) !!}
        
        {!! Form::select('castratedOrSterialized', $selectData['castratedOrSterialized'], "Kastriran/Sterilisan", ['class' => 'form-control none width-40 bot-1', 'id'=>'sterialized', 'placeholder' => 'Kastriran/Sterilisan']) !!}
<script>
function show(animalSelected){
    var animalSelectedName = animalSelected.options[animalSelected.selectedIndex].innerHTML
    if(animalSelectedName === 'Pas'){
        document.getElementById('catBreeds').style.display = "none";
        document.getElementById('dogBreeds').style.display = "block";
        document.getElementById('size').style.display = "block";
        document.getElementById('furColor').style.display = "block";
        document.getElementById('furColor2').style.display = "block";
        document.getElementById('eyeColor').style.display = "block";
        document.getElementById('sterialized').style.display = "block";
        document.getElementById('bracletColor').style.display = "block";
        
    }else {if(animalSelectedName  === 'Mačka'){
        document.getElementById('dogBreeds').style.display = "none";
        document.getElementById('catBreeds').style.display = "block";
        document.getElementById('size').style.display = "none";
        document.getElementById('furColor').style.display = "block";
        document.getElementById('furColor2').style.display = "block";
        document.getElementById('eyeColor').style.display = "block";
        document.getElementById('sterialized').style.display = "block";
        document.getElementById('bracletColor').style.display = "block";
        
    }else{
        document.getElementById('catBreeds').style.display = "none";
        document.getElementById('dogBreeds').style.display = "none";
        document.getElementById('size').style.display = "none";
        document.getElementById('furColor').style.display = "none";
        document.getElementById('furColor2').style.display = "none";
        document.getElementById('eyeColor').style.display = "none";
        document.getElementById('sterialized').style.display = "none";
        document.getElementById('bracletColor').style.display = "none";
    }}

        
} 

</script>
        {!! Form::select('movedFromStreet', $selectData['movedFromStreet'], "Sklonjen sa ulice", ['class' => 'form-control width-40 bot-1', 'onchange' =>'showWhereMovedFields(this)', 'placeholder' => 'Sklonjen sa ulice']) !!}
<script>

function showWhereMovedFields(isShowingFields){
    if(isShowingFields.value == 1){
        document.getElementById('whereMovedFields').style.display = "block";
    }else{
        if(isShowingFields.value == 0){
            document.getElementById('whereMovedFields').style.display = "none";
        }
        
    }
}
</script>
        
        <div id="whereMovedFields" class="none">
        {!! Form::label('text', 'Unesi kontakt podatke', ['class' => 'lable-text width-40 bot-1']) !!}<br>
        {!! Form::text('mover', '',['placeholder'=>'Ime', 'onfocus'=>'this.placeholder = ""', 'onblur'=>'this.placeholder = "Ime"']) !!}
        {!! Form::number('moverPhone', '', ['class' => 'number-field', 'placeholder'=>'Broj telefona', 'onfocus'=>'this.placeholder = ""', 'onblur'=>'this.placeholder = "Broj telefona"']) !!}
        {!! Form::email('moverEmail', '', ['class' => 'email-field width-40 bot-1','placeholder'=>'email@email.com', 'onfocus'=>'this.placeholder = ""', 'onblur'=>'this.placeholder = "email@email.com"']) !!}       
         </div>

        {!! Form::select('braceletColor', $selectData['braceletColor'], null, ['class' => 'form-control width-40 bot-1', 'id'=>'braceletColor', 'placeholder' => 'Boja ogrlice']) !!}
               {!! Form::select('disability', $selectData['disability'], null, ['class' => 'form-control width-40 bot-1', 'placeholder' => 'Invaliditet']) !!}
        
        
        
        


               @if (\Session::has('errors'))
    <div class="alert alert-success" style="color: red; width:28vw;">
        @if($errors->any())
        <h4>{{$errors->first()}}</h4>
        @endif
    </div>
@endif
            {!! Form::file('files', $attributes = ['id' => 'files', 'type' => 'file']) !!}
            <script>
  
</script>      
        {!! Form::submit('Upload') !!}
    {!! Form::close() !!}

<script>
function validateSearchForm() {
  
  var y = document.forms["uploadForm"]["chipNumber"].value;
  if(y == ""){
      if (document.forms["uploadForm"]["animal"].value == "") {
        alert("Molimo selektujte vrstu životinje");
        return false;
      }
      if (document.forms["uploadForm"]["city"].value == "") {
        alert("Molimo selektujte grad");
        return false;
      }
      if (document.forms["uploadForm"]["city"].value == "0") {
        if (document.forms["uploadForm"]["township"].value == "") {
        alert("Molimo selektujte opštinu");
        return false;
      }
      }
      
      if(document.forms["uploadForm"]["animal"].value == "1"){
                if (document.forms["uploadForm"]["dogBreed"].value == "") {
                alert("Molimo selektujte rasu životinje");
                return false;
                }
                            if (document.forms["uploadForm"]["sex"].value == "") {
                    alert("Molimo selektujte pol");
                    return false;
                }
                if (document.forms["uploadForm"]["size"].value == "") {
                alert("Morate selektovati velicinu");
                return false;
            }
                        if (document.forms["uploadForm"]["furColor"].value == "") {
                    alert("Molimo selektujte boju krzna");
                    return false;
                }
                if (document.forms["uploadForm"]["furColor2"].value == "") {
                    alert("Molimo selektujte boju šara. Ukoliko pas nema šare selektujte opciju 'nema'. Ukoliko je šaren sa više od dve boje selektujte boju krzna sa 'šarena' i boju šara sa 'tri ili više boja'. Što preciznije unesete svaki podatak, to ćete više pomoći životinji koja se izgubila.");
                    return false;
                }
          }
       
        if(document.forms["uploadForm"]["animal"].value == "2") {
            
                if (document.forms["uploadForm"]["catBreed"].value == "") {
                alert("Molimo selektujte rasu mačke");
                return false;
                }
                            if (document.forms["uploadForm"]["sex"].value == "") {
                    alert("Molimo selektujte pol");
                    return false;
                }
                        if (document.forms["uploadForm"]["furColor"].value == "") {
                            alert("Molimo selektujte boju krzna");
                    return false;
                }
                if (document.forms["uploadForm"]["furColor2"].value == "") {
                    alert("Molimo selektujte boju šara. Ukoliko mačka nema šare selektujte opciju 'nema'. Ukoliko je šarena sa više od dve boje selektujte boju krzna sa 'šarena' i boju šara sa 'tri ili više boja'. Što preciznije unesete svaki podatak, to ćete više pomoći životinji koja se izgubila.");
                    return false;
                }
          }
      
      if (document.forms["uploadForm"]["movedFromStreet"].value == "") {
        alert("Molimo selektujte da li je životinja sklonjena sa ulice");
        return false;
      }
      if (document.forms["uploadForm"]["movedFromStreet"].value == "1"){
        if (document.forms["uploadForm"]["mover"].value == "") {
        alert("Molimo unesite ime osobe koja je sklonila životinju");
        return false;
        }
    
      }
      if (document.forms["uploadForm"]["mover"].value != ""){
        if(document.forms["uploadForm"]["moverPhone"].value == "" && document.forms["uploadForm"]["moverEmail"].value == ""){
            alert("Molimo unesite neki od kontakt podataka osobe koja je sklonila životinju");
            return false;
        }
    
      }
    }
}
</script>
</section>

@endsection
