<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response,File;

use App\SeenPet;

class UploadController extends SelectOptionsController
{
    
    public function __construct(){
        parent::__construct();
    }

    public function uploadSeenPet(Request $request){
        
        request()->validate([
            'files' => 'image|mimes:jpeg,png,gif,svg:2048',
        ]);
           
        if ($files = $request->file('files')) {
            
            $destinationPath = public_path('images');
            
            $image = date('YmdHis').".".$files->getClientOriginalExtension();
            
            $files->move($destinationPath, $image);
            $insert['image'] = $image;
            
            //checking parameters
            if(is_int($request->animal) || $request->animal<0 || $request->animal>5 //!!change if ever animals>5
                || is_int($request->catBreed) || $request->catBreed === null
                || is_int($request->dogBreed) || $request->dogBreed === null

                || is_int($request->sex) || $request->sex === null
                || in_array($request->furColor, ['d','w','b','g','y','o','m', null], true) 
                || in_array($request->furColor2, ['d','w','b','g','y','o','m','n', null], true) 
                || in_array($request->eyeColor,['d','b','e','c','y','o','g','h', null],true) 
                || ctype_alnum($request->chip) || $request->chip === null
                || in_array($request->movedFromStreet,[1, 0, null], true)
                || ctype_alpha(str_replace(' ', '', $request->mover))
                || ctype_alnum($request->phoneNumber)
                || filter_var($request->email, FILTER_VALIDATE_EMAIL)
            ){
                //determine breed selection
                if($request->animal == 1){
                    $breed_id = $request->dogBreed;
                    $breed = $this->selectData['dogBreeds'][$request->dogBreed];
                }elseif($request->animal == 2){
                    $breed_id = $request->catBreed;
                    $breed = $this->selectData['catBreeds'][$request->catBreed];
                }else{
                    $breed_id = null;
                    $breed = null;
                }

                $animal = $this->selectData['animals'][$request->animal];
                $city = $this->selectData['cities'][$request->city];
                if($city === "Beograd"){
                $township = $this->selectData['townships'][$request->township];
                }else{
                    $township = null;
                }
                $sex = $this->selectData['sex'][$request->sex];
            }else{
                 redirect()->back('message', 'please fill all required fields');
            }
            
                
               
                 $user = 1;

                 
                
            $seenPet = SeenPet::create([
                'chipNumber'=>$request->chipNumber,
                'city_id'=>$request->city,
                'city'=>$city,
                'township_id'=>$request->township,
                'township'=>$township,
                'street'=>$request->street,
                'animal_id' => $request->animal,
                'animal'=>$animal,
                'breed_id'=>$breed_id,
                'breed'=>$breed,
                'sex_id'=>$sex,
                'sex' => $request->sex,
                'size' => $request->size,
                'furColor' => $request->furColor,
                'furColor2' => $request->furColor2,
                'eyeColor'=>$request->eyeColor,
                'castratedOrSterialized'=>$request->castratedOrSterialized,
                'movedFromStreet'=>$request->movedFromStreet,
                'mover'=>$request->mover,
                'moverPhone'=>$request->moverPhone,
                'moverEmail'=>$request->moverEmail,

                'found'=>false,

                'braceletColor'=>$request->braceletColor,
                'disability'=>$request->disability,
                'imagesURL' => $image,
                'user_id'=>$user,    
            ]);
            
                
                
            
               
            return "uspesno uploadovano sve".$seenPet->id;
            } else{
                // return redirect()->back()->with('success', 'Molimo uploadujte sliku');
                return back()->withInput()->withErrors(['Molimo uploadujte sliku', 'Molimo uploadujte sliku']);
            } 
        }
    }
 
    

        
