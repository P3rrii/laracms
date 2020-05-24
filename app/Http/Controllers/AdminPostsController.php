<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests\PostsCreateRequest;
use App\Http\Requests;
use App\Photo;  
use Illuminate\Support\Facades\Auth;
use App\Category;


class AdminPostsController extends Controller
{
    
    //The Route When we visit the index -> Admin/Posts
    public function index(){

        $posts = Post::all();

        return view('admin.posts.index',compact('posts'));
        
    }

   
    //The Route For Creating Posts
    public function create(){
  
        $categories = Category::lists('name')->all();
        
        return view('admin.posts.create', compact('categories'));

    }


    //The Route For Storing Posts
    public function store(PostsCreateRequest $request){

        $input = $request->all();
        $user=Auth::user();

        if($file = $request ->file('photo_id')){
            $name= time() . $file->getClientOriginalName();
            $file->move('images',$name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }

        $user->posts()->create($input);
        return redirect('/admin/posts');
        
    }


    //The Route For Editing Posts
    public function edit($id){
     
       $post = Post::findOrFail($id);

       $categories= Category::lists('name','id')->all();

       return view('admin.posts.edit', compact('post','categories'));

    }


    //The Route For Updating Posts
    public function update(Request $request, $id){
 
        $input= $request->all();

        if($file = $request ->file('photo_id')){

            $name= time() . $file->getClientOriginalName();
            $file->move('images',$name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }

        Auth::user()->posts()->whereId($id)->first()->update($input);

        return redirect('/admin/posts');
        
    }


    //The Route For Deleting Posts
    public function destroy($id){
       
        $post = Post::findOrFail($id);

        $post->delete();

        return redirect('/admin/posts');

    }


    //Function to Show a Specific Post
    public function post($id){
        $post = Post::findOrFail($id);

        $comments= $post->comments()->whereIsActive(1)->get();

        return view('post',compact('post','comments'));
        
    }


}
