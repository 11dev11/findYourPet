<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Find Your Pet</title>

  <link href="{{ URL::asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- Custom fonts for this template -->
  <link href="{{ URL::asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('vendor/simple-line-icons/css/simple-line-icons.css') }}" rel="stylesheet" type="text/css">
  <!-- <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css"> -->
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&display=swap" rel="stylesheet">  <!-- Custom styles for this template -->
  <link href="{{ URL::asset('css/landing-page.min.css') }}" rel="stylesheet">

  <style type="text/css">

  body {
    background: #e6e6ff;
    padding-top: 10vh;
  }

  h1{
    font-family: 'Open Sans', sans-serif;
    font-weight: 400;

  }

  button, label{
    font-family: 'Open Sans', sans-serif;
  }
  

  #bgimg_masthead {
      background-image: url('img/dog_cover.jpg');
  }

  #chip_search {
    padding-bottom: 3vh;
  }

  .form-row {
    padding-bottom: 3vh;
  }

  #move_to_center, #mid {
    margin:auto;
  }

  
  .hover_grow {
    height: 15vh;
    width: 15vh;
    margin: auto;
  }
  .hover_grow:hover {
    height: 18vh;
    width: 18vh;
  }
  #correction_first_icon {
    height: 12vh;
    width: 12vh;
    margin: auto;
  }
  #correction_first_icon:hover {
    height: 15vh;
    width: 15vh;
  }

  .main_page_icon_link {
    color: black;
  }
  .main_page_icon_link:hover {
    text-decoration: none;
    color: gray;
  }

  .midnav_wrapper {
    display: flex;
    flex-flow: row;
    /* height: 20vh; */
    justify-content: space-around;
    padding-top: 2vh;
  }
 
  .decoration_removal:hover {
    text-decoration: none;
  }
  
  /* located pets page style */
  #located_page_form {
    width: 70vw;
    margin: auto;
  }
  .width-40 {
    width: 40%;
  }
  .bot-1{
    margin-bottom: 1vh;
  }
  .lable-text{
    margin-right: 5px;
    font-size: 1.2em;
  }
  .number-field{
    width: 31%;
  }
  .weak-text{
    color: gray;
  }
  #street-field{
    padding-left:17px;
  }


  /* not visible arrows in number form field */
  /* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
.none{
display: none;
}
  </style>


