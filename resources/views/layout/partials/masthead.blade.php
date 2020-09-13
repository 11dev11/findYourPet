<style>
 
.margin-a{

  margin:auto;
}
.el-wid{
  width:45%;
  margin-right:auto;
  margin-right:2%;

  background-color:#e6f2ff;
  font-size: 1.2em;
}
.el-wid:active{
  background-color:#e6f2ff;
}

option{
  background-color:#e6f2ff;
}
option:checked{
  background-color:#8adcf2;
}
 #welcome-text{
  text-shadow: 0px 0px 17px black;
  width: 100vw;
  padding-bottom: 3vh;
 }
 #welcome-text h1{
  font-size: 2.86em;
 }
  #chip{
    display: table-cell;
    vertical-align: middle;
    height: 50px;
  }
  #chip-label{
    vertical-align:middle;
    font-size: 2em;;
    margin-right:2vw;
    text-shadow: 0px 0px 13px black;
  }
  #chip-number{
    height:75%;
    width:20vw;
    border:none;
    border-radius:10px;
    box-shadow: 0px 0px 10px black;
    background-color:#e6f2ff;
  }
  #submit-search-button{
    display: table-cell;
    vertical-align: middle;
    width: 59vw;
    height:auto;
  }
  #search{
    box-shadow: 0px 0px 10px black;
  }
  #advanced_search{
    box-shadow: 0px 0px 20px #001933;
    
  }
  #show_hide{
    background: rgba(102, 102, 102, .3);
    width:50vw;
    height:auto;
    padding:10%;
    margin:auto;
    border:none;
    border-radius:5px;
    box-shadow: 0px 0px 20px #001933;
  }
  
</style>
<header id="bgimg_masthead" class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto" id="welcome-text">
          <h1 class="mb-6">Ukoliko tražite svog ljubimca,<br> proverite da li ga je neko već pronašao</h1>
        </div>
        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
          
          {!! Form::open(['action' => 'DisplayController@searchLocatedPets', 'method' => 'POST', 'name'=>'searchForm','onsubmit'=>'return validateForm()', 'enctype'=> 'multipart/form-data', 'class' => 'form', 'id' => 'home_page_form']) !!}   
          @csrf
            <div  class="form-row">
              <div class="col-12 col-md-9 mb-2 mb-md-0" id="chip">
                
          {!! Form::label('text', 'Broj čipa', ['class' => 'lable-text', 'id'=>'chip-label']) !!}
          {!! Form::number('chipNumber', 'chipNumber', ['class' => 'number-field chip-number-field', 'id'=>'chip-number']) !!}
              </div>
              <div class="col-12 col-md-3" id="submit-search-button">
                <button type="submit" class="btn btn-block btn-lg btn-primary" id="search" >Pretraži</button>
              </div>
              
            </div>
            <div  class="form-row">
              <div id="mid" class="col-18 col-md-8">
                <button type="button" id="advanced_search" class="btn btn-block btn-lg btn-secondary" onclick="showHide()">Još opcija</button>              
              </div>
            </div>
            
            <div id="show_hide" class="none" > 
            
<script>
window.onload=function(){
  var x = document.getElementById("show_hide").style.display = "none";
  
}
</script>

            <div class="form-row margin-a">

              {!! Form::select('animal', $selectData['animals'], null, ['class' => 'form-control bot-1 el-wid', 'onchange' => 'showBreeds(this);', 'placeholder' => 'Vrsta životinje']) !!}

              {!! Form::select('dogBreed', $selectData['dogBreeds'], null, ['class' => 'form-control el-wid bot-1 none ', 'id'=>'dogBreeds',   'placeholder' => 'Rasa']) !!}

              {!! Form::select('catBreed', $selectData['catBreeds'], null, ['class' => 'form-control bot-1 none el-wid', 'id'=>'catBreeds',  'placeholder' => 'Rasa']) !!}

              {!! Form::select('sex', $selectData['sex'], null, ['class' => 'form-control bot-1 none el-wid', 'id'=>'sex', 'id'=>'sex', 'placeholder' => 'Pol']) !!}

            </div>

            <div class="form-row margin-a">
              {!! Form::select('city', $selectData['cities'], null, ['class' => 'form-control el-wid bot-1', 'onchange' => 'showTownships(this)', 'placeholder' => 'Grad']) !!}

              
              {!! Form::select('township', $selectData['townships'], null, ['class' => 'form-control none el-wid bot-1', 'id'=>'townships', 'placeholder' => 'Opština']) !!}

              
            </div>
<script>
function showTownships(city) {
  var citySelected = city.options[city.selectedIndex].innerHTML
      if(citySelected === "Beograd"){
        document.getElementById('townships').style.display = "block";
        
      }else{  
        document.getElementById('townships').style.display = "none";
      }   
}
</script>           
            
            <div class="form-row margin-a">
              
                
              {!! Form::select('furColor', $selectData['furColor'], null, ['class' => 'form-control none el-wid bot-1', 'id'=>'furColor', 'placeholder' => 'Boja krzna']) !!}
              {!! Form::select('furColor2', $selectData['furColor2'], null, ['class' => 'form-control none el-wid bot-1', 'id'=>'furColor2', 'placeholder' => 'Boja šara']) !!}
              
            
            </div> 
            <div class="form-row margin-a">
                
            {!! Form::select('eyeColor', $selectData['eyeColor'], null, ['class' => 'form-control none el-wid bot-1', 'id'=>'eyeColor', 'placeholder' => 'Boja očiju']) !!}
              {!! Form::select('braceletColor', $selectData['braceletColor'], null, ['class' => 'form-control none el-wid bot-1', 'id'=>'braceletColor', 'placeholder' => 'Boja ogrlice']) !!}
              
            </div>   

            <div class="form-row margin-a">

                
              {!! Form::select('castratedOrSterialized', $selectData['castratedOrSterialized'], null, ['class' => 'form-control none bot-1 el-wid', 'id'=>'sterialized', 'placeholder' => 'Kastracija/Sterilizacija']) !!}
              {!! Form::select('disability', $selectData['disability'], null, ['class' => 'form-control none el-wid bot-1', 'id'=>'disability', 'placeholder' => 'Invaliditet']) !!}
              
              
             
            </div>  
            <script>
function showBreeds(animal) {
  var animalSelected = animal.options[animal.selectedIndex].innerHTML
      if(animalSelected === "Pas"){
        document.getElementById('catBreeds').style.display = "none";
        document.getElementById('dogBreeds').style.display = "block";
        document.getElementById('furColor').style.display = "block";
        document.getElementById('furColor2').style.display = "block";
        document.getElementById('eyeColor').style.display = "block";
        document.getElementById('sterialized').style.display = "block";
        document.getElementById('braceletColor').style.display = "block";
        document.getElementById('disability').style.display = "block";
        document.getElementById('sex').style.display = "block";

      }else{  
          if(animalSelected === "Mačka"){
            document.getElementById('dogBreeds').style.display = "none";
            document.getElementById('catBreeds').style.display = "block";
            document.getElementById('furColor').style.display = "block";
            document.getElementById('furColor2').style.display = "block";
            document.getElementById('eyeColor').style.display = "block";
            document.getElementById('sterialized').style.display = "block";
            document.getElementById('braceletColor').style.display = "block";
            document.getElementById('disability').style.display = "block";
            document.getElementById('sex').style.display = "block";

          }else{
            document.getElementById('dogBreeds').style.display = "none";
            document.getElementById('catBreeds').style.display = "none";
            document.getElementById('furColor').style.display = "none";
            document.getElementById('furColor2').style.display = "none";
            document.getElementById('eyeColor').style.display = "none";
            document.getElementById('sterialized').style.display = "none";
            document.getElementById('braceletColor').style.display = "none";
            document.getElementById('disability').style.display = "none";
            document.getElementById('sex').style.display = "none";


          } 
      } 

}
</script>
            {!! Form::close() !!}
                    
<script>

    function showHide() {
      
          var x = document.getElementById('show_hide');
          
                  if (x.style.display === "none") {
                    x.style.display = "block";
                  } else {
                    x.style.display = "none";
                  }
                  
            }
  function validateForm() {
  
  var y = document.forms["searchForm"]["chipNumber"].value;
  if(y == ""){
      if (document.forms["searchForm"]["animal"].value == "") {
        alert("Morate selektovati vrstu zivotinje");
        return false;
      }
      if (document.forms["searchForm"]["city"].value == "") {
        alert("Morate selektovati grad");
        return false;
      }
      if (document.forms["searchForm"]["sex"].value == "") {
        alert("Morate selektovati pol");
        return false;
      }
      if(document.forms["searchForm"]["animal"].value == "1" || document.forms["searchForm"]["animal"].value == "2"){
            if (document.forms["searchForm"]["dogBreed"].value == "" && document.forms["searchForm"]["catBreed"].value == "") {
              alert("Morate selektovati rasu zivotinje");
              return false;
            }
          }
    }
}
</script>

            </div> 
            

          </form>

            
        </div>
      </div>
    </div>
  </header>
