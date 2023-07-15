<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\portfolio;
use App\Models\type;
use App\Http\Requests\StoreportfolioRequest;
use App\Http\Requests\UpdateportfolioRequest;
use App\Models\Tecnology;
use Illuminate\Support\Facades\Storage;


use function PHPSTORM_META\type;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolios=Portfolio::all();
        return view('admin.projects.portfolio-show-all',compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = type::all();
        $tecnologies = Tecnology::all();
        return view('admin.projects.create',compact('types','tecnologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreportfolioRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreportfolioRequest $request)
    {
        $data = $request->validated();

        if($request->hasFile('image')){

            $img_path= storage::put('uploads', $data['image']);
            $data['image'] = $img_path;
        }
        
        $newPortfolio = new Portfolio();
        $newPortfolio->fill($data);
        $newPortfolio->save();
        $newPortfolio->Tecnologies()->sync( $data['tecnologies'] );
        return to_route("admin.portfolio.show", $newPortfolio);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function show(portfolio $portfolio)
    {
        return view('admin.projects.show', compact('portfolio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function edit(portfolio $portfolio)
    {
        $types = type::all();
        $tecnologies = Tecnology::all();
        return view('admin.projects.edit',compact('portfolio','types','tecnologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateportfolioRequest  $request
     * @param  \App\Models\portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateportfolioRequest $request, portfolio $portfolio )
    {

        $data = $request->validated();

        if($request->hasFile('image')){

            $img_path= storage::put('uploads', $data['image']);
            
            $data['image'] = $img_path;

    

            $portfolio->fill($data);
            $portfolio->Tecnologies()->sync( $data['tecnologies'] );
            $portfolio->update();

        }
        return to_route("admin.portfolio.show", $portfolio);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy(portfolio $portfolio)
    {
        //
    }
}
