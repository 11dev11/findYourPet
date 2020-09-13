@extends('layout.pageslayout')
@section('content')

<section style="margin-top:8vh;padding:4vh;">



@foreach($seenPets as $seenPet)

{{$seenPet->chipNumber}}<br>
 {{$seenPet->city}}<br>
  {{$seenPet->township}}<br>
   {{$seenPet->street}} <br>
   {{$seenPet->animal}}<br>
    {{$seenPet->breed}}<br>

 {{$seenPet->sex}}<br>
 {{$seenPet->movedFromStreet}} <br>
        {{$seenPet->mover}} <br>
        {{$seenPet->phone}}<br>
         {{$seenPet->email}}<br>

        <img src="{{asset('images/'.$seenPet->imagesURL)}}" height="250px" width="auto"><br>
        {{$seenPet->user_id}} <br>

@endForeach



</section>

@endsection