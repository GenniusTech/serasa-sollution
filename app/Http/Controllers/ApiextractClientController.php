<?php

namespace App\Http\Controllers;

use App\Models\Extrato;
use App\Models\User;
use Illuminate\Http\Request;


class ApiextractClientController extends Controller
{
  

   public function extractClient ($id){


        $client = Extrato::where('user_id', $id)->get();
        return response()->json($client);
  
   }
    
    


}

