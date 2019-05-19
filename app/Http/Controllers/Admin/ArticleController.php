<?php

namespace App\Http\Controllers\admin;

use App\article;
use App\Http\Controllers\Controller;
use App\Http\Requests\articlerequest;
use Illuminate\Http\Request;

class ArticleController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article=Article::latest()->paginate(3);
        return response([
            'data'=>$article,
            'status'=>'OK'
        ],200);
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
    public function store(articlerequest $request)
    {
      //  auth()->loginUsingId(1);

//        $imagesUrl = $this->uploadImages($request->file('images'));
//        $article->create(array_merge([ 'images' => $imagesUrl],$request->all()));
        $imagesUrl = $this->uploadImages($request->file('images'));
        auth()->user()->article()->create(array_merge([ 'images' => $imagesUrl],$request->all()));
        return response([
            'data'=>$imagesUrl,
            'status'=>'ok'
        ],200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, article $article)
    {
//        $file = $request->file('images');
//        $inputs = $request->all();
//
//        if($file) {
//            $inputs['images'] = $this->uploadImages($request->file('images'));
//        }
//
//        $article->update($inputs);
//        return response([
//            'data'=>'ok',
//            'status'=>'update shod'
//        ],200);


//       // auth()->loginUsingId(1);
//        $imagesUrl = $this->uploadImages($request->file('images'));
//        auth()->user()->article()->update(array_merge([ 'images' => $imagesUrl],$request->all()));
//        return response([
//            'data'=>$imagesUrl,
//            'status'=>'ok'
//        ],200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\article  $article
     * @return \Illuminate\Http\Response
     */
    public function delete(article $article)
    {
       // auth()->loginUsingId(1);

        auth()->user()->article()->delete();
      //  $article->
        return response([
            'data'=>'ok',
            'status'=>'hazf shod'
        ],200);
    }

}
