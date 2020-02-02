<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostFormRequest;
use App\Models\Post;
use foo\bar;
use Illuminate\Http\Request;
use Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Post::paginate(20);

        return view('posts.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostFormRequest $request)
    {

        $request->validated();



        if ($request->hasFile('image')) {

            Image::make($request->image)

                ->resize(400, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('/images/posts/'. $request->image->hashName() ));
        }

         $post =  Post::create($request->all());

         $post->image =   $request->image->hashName();

         $post->save();

        flash('تمت العمليه بنجاح')->success();


        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Post::findOrFail($id);


        return view('posts.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'title'     => 'required|min:2',
            'body'      => 'required|min:2',
            'image'     => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|numeric|exists:categories,id',
        ]);


        if ($request->hasFile('image')) {

            Image::make($request->image)

                ->resize(400, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('/images/posts/'. $request->image->hashName() ));
        }



        $record = Post::findOrFail($id);

        $record->update($request->all());



        $record->save();


        flash('تمت العمليه بنجاح')->success();


        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Post::findOrFail($id);

        $record->delete();

        flash('تمت العمليه بنجاح')->success();

        return back();
    }
}
