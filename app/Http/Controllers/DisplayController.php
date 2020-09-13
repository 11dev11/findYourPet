<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\SeenPet;
class DisplayController extends Controller
{

    function displaySeenPets(){
        
        $seenPets = SeenPetToDisplay::all();
        
        
        return view('located')->with(compact('seenPets'));
    }

    function searchLocatedPets( Request $request){
        
        if($request->chipNumber != null){
            
            $foundPetsBySearch = SeenPet::where('chipNumber', $request->chipNumber)->get();
            if(count($foundPetsBySearch)==0){
                $message = 'Nije pronađen nijedan ljubimac sa tim brojem čipa. Pokušajte sa dodatnim opcijama pretrage. Polje za broj čipa OSTAVITE PRAZNO.';
            }
            return view('search-results')->with(compact('foundPetsBySearch','message'));
            
            
        }else{
            
            $foundPetsBySearch = SeenPet::where('city_id', 'like', '%'.$request->city.'%')
                        ->where('animal_id', 'like', '%'.$request->animal.'%')
                        ->where('breed_id', 'like', '%'.$request->breed.'%')
                        ->get();
                        $a = [];
                        $ad = [];
                        $a1 = [];
                        $a2 = [];
                        $a3 = [];
                        $a4 = [];
                        $a5 = [];
                        $a6 = [];
                        $a7 = [];
                        $a8 = [];
                        foreach($foundPetsBySearch as $fp){
                            if($fp->furColor == $request->furColor){
                            $a1 += $fp;
                            }
                            if($fp->sex_id == $request->sex){
                                $a2 += $fp;
                             }
                            if($fp->eyecolor == $request->eyecolor){
                               $a3 += $fp;
                            } 
                            if($fp->furColor2 == $request->furColor2){
                                $a4 += $fp;
                            }
                            if($fp->size == $request->size){
                                $a5 += $fp;
                            }
                            if($fp->braceletColor == $request->braceletColor){
                                $a6 += $fp;
                            }
                            if($fp->castratedOrSterialized == $request->castratedOrSterialized){
                                $a7 += $fp;
                            }
                            if($fp->disability == $request->disability){
                                if($fp->disability == 0){
                                    $a8 += $fp;
                                }elseif($fp->disability == 1){
                                    $ad += $fp;
                                }
                            }
                            $a += $fp;
                        }
                        array_unshift($a, $a8, $a7, $a6, $a5, $a4, $a3, $a2, $a1, $ad);
                        $foundPetsBySearch = $a;
                return view('search-results')->with(compact('foundPetsBySearch'));
        }

    }
}
