<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\portfolio;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        $project=portfolio::with('type','tecnologies')->get();
        
        return(response()->json($response =[
            'success'=>true,
            'results'=>$project,
        ]));
    }
}
