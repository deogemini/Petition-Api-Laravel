<?php

namespace App\Http\Controllers;

use App\Http\Resources\PetitionCollection;
use App\Http\Resources\PetitionResource;
use App\Models\Petition;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$petitions = Petition::all();

        //return view('petitions.index')->with('petitions',$petitions); this will used when we want to show data on the front-end
        //retun view of data from resource and collection way 1
        //return PetitionResource::collection($petitions);//this will also not show the version and the author name
        //return view of data direct from it's collection
        // return new PetitionCollection($petitions);
        return response()->json(new PetitionCollection(Petition::all()), Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $petition = Petition::create($request->only([
            'title', 'description', 'category', 'author', 'signees'
        ]));
        return new PetitionResource($petition);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Petition  $petition
     * @return \Illuminate\Http\Response
     */
    public function show(Petition $petition)
    {
        return new PetitionResource($petition); //this will help to pass an id in fetching specific data in an api
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Petition  $petition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Petition $petition)
    {
        //simple difference from store method
        $petition->update($request->only([
            'title', 'descriptions', 'category', 'author', 'signees'
        ]));
        return new PetitionResource($petition);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Petition  $petition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Petition $petition)
    {
        //delete an object from the json
        $petition->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT); //status after deleting  where by 204 == 'No content'
    }
}
