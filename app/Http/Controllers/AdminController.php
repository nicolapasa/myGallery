<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
class AdminController extends Controller
{

     //method to autorize access to a page without login if not auth you are redirect
     public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
 
        return view('admin.index')->with('posts', Gallery::orderBy('updated_at', 'DESC')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'image'=>'required|mimes:jpsg,png,gif,jpeg|max:50000'
        ]);
        $newImageName= uniqid() . '-' . $request->title . '.'. $request->image->extension();

       $request->image->move(public_path('img'), $newImageName);

       //$slug= SlugService::createSlug(Post::class, 'slug', $request->title);

       Gallery::create([
           'title'=>$request->title,
           'slug'=>$request->title,
           'description'=>$request->description,
           'image_path'=>$newImageName,
           'user_id'=>auth()->user()->id
       ]);


        return redirect('/admin')->with('message', 'Your post has been created');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.edit')->with('post', Gallery::where('id', $id)->first());
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
        $oldImageName= Gallery::where('id', $id)->first(['image_path'])->image_path;
        $validated= ['title'=>'required',
                'description'=>'required'];
        if(isset($request->image)) {
            $validated += ['image'=>'required|mimes:jpsg,png,gif,jpeg|max:50000'];
          
        }
    
        $request->validate($validated);
        $newImageName=  $oldImageName;
       if(isset($request->image)) {
        $newImageName= uniqid() . '-' . $request->input('title') . '.'. $request->image->extension();
        $request->image->move(public_path('img'), $newImageName);
     
       }
       
      

       Gallery::where('id', $id)->update([
            'title'=>$request->input('title'),
            'slug'=>$request->input('title'),
            'description'=>$request->input('description'),
            'image_path'=>$newImageName,
            'user_id'=>auth()->user()->id
        ]);

        return redirect('/admin')->with('message', 'Your post has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post =Gallery::where('id', $id);
        $post->delete();
        return redirect('/admin')->with('message', 'Your post has been deleted');
    }
}
