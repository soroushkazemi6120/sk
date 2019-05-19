<?php

namespace App\Http\Controllers\admin;

use App\article;
use App\Http\Requests\articlerequest;
use App\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class updatecontroller extends  AdminController
{

//    public function update(Request $request, article $article)
//    {
//        auth()->loginUsingId(1);
//        $imagesUrl = $this->uploadImages($request->file('images'));
//        auth()->user()->article()->update(array_merge([ 'images' => $imagesUrl],$request->all()));
//        return response([
//            'data'=>$imagesUrl,
//            'status'=>'ok'
//        ],200);
//    }article/update


    public function update2(articlerequest $request, Article $article)
    {
//
//        $imagesUrl = $this->uploadImages($request->file('images'));
//      auth()->user()->articles()->update(array_merge([ 'images' => $imagesUrl],$request->all()));
//
//        return response([
//            'data'=>$imagesUrl,
//            'status'=>'ok'
//        ],200);


      //  public function update(Request $request, $id) {
            //$request->validate([ 'first_name'=>'required', 'last_name'=>'required', 'email'=>'required' ]);
            $contact = Article::find($article);
            $contact->title = $request->get('title');
            $contact->description = $request->get('description');
            $contact->body = $request->get('body');
            $contact->images = $request->get('images');
            $contact->tags = $request->get('tags');
            $contact->slug = $request->get('slug');
            $contact->save();
            //return redirect('/contacts')->with('success', 'Contact updated!'); }





    }


    public function update(Permission $permission)
    {
        $this->validate(request() , [
            'name' => 'required',
            'label' => 'required'
        ]);
        $b=$permission->update(request()->all());
return response([
    'data'=>$b,
    'status'=>'ok'
],200);
    }
}
