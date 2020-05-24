<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;
use App\Comment;

class PostCommentController extends Controller {

    //Applying the middleware for admin on the construction of the class so we can exclude the 'store' which allows the user to create comments.
    public function __construct(){
        
        $this->middleware('admin')->except('store');

    }


    public function index(){

        $comments = Comment::all();

        return view('admin.comments.index',compact('comments'));
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {

        $user = Auth::user();

        $data =[

            'post_id'=>$request->post_id,
            'author'=>$user->name,
            'email'=>$user->email,
            'photo'=>$user->photo->file,
            'body'=>$request->body

        ];

        Comment::create($data);

        $request->session()->flash('comment_message', 'Your comment has been submitted and is waiting for moderation');

        return redirect()->back();
    }

    
    public function show($id){
        $post = Post::findOrFail($id);

        $comments = $post->comments;

        return view('admin.comments.show', compact('comments'));
    }

   
    public function edit($id)
    {
        
    }

  
    public function update(Request $request, $id)
    {
        Comment::findOrFail($id)->update($request->all());

        return redirect('/admin/comments');
    }

    
    public function destroy($id)
    {
        Comment::findOrFail($id)->delete();

        return redirect()->back();
    }
}
