<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PhotoStoreRequest;
use App\Models\Photo;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhotoStoreRequest $request)
    {
     try{
         $image_name=Str::random(32).".".$request->image->getClientOriginalExtension();
         Photo::create(['name'=>$request->name,'image'=>$image_name]);
         Storage::disk('public')->put($image_name,file_get_contents($request->image));
         return ApiTrait::successMessage('Image Added Successfully', 201);


     }catch (\Exception $e){
         return ApiTrait::errorMessage([], 'Message went really wrong!', 404);
     }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {
        //
    }
}
