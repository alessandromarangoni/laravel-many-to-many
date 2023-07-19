<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\portfolio;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        $projects = portfolio::with('type','tecnologies')->get();
        
        return(response()->json($response =[
            'success'=>true,
            'results'=>$projects,
        ]));
    }

    public function show($id){
        $project = portfolio::find($id);
        
        return(response()->json($response =[
            'success'=>true,
            'results'=>$project,
        ]));
    }

    // public function show($id){
    //     $project = portfolio::with('type','tecnologies')->find($id);
        
    //     $response = [
    //         "success" => true,
    //         "results" => $project
    //     ];

    //     return response()->json($response);
    // }

}
