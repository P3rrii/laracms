<?php

namespace App\Http\Controllers;

use App\Comment;
use App\CommentReply;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class CommentRepliesController extends Controller
{
   
    //Showing All Replies
    public function index()
    {
        $replies = CommentReply::all();

        return view('admin.comments.replies.index',compact('replies'));

    }

    
    // Show the form for creating a new resource. We dont need that we have the create form in a page with the comments.
    public function create()
    {
        
    }


    public function store(Request $request)
    {
        
    }

    public function createReply(Request $request){
        
        $user = Auth::user();

        $data =[

            'comment_id'=>$request->comment_id,
            'author'=>$user->name,
            'email'=>$user->email,
            'photo'=>$user->photo->file,
            'body'=>$request->body

        ];

        CommentReply::create($data);

        $request->session()->flash('reply_message', 'Your reply has been submitted and is waiting for moderation');

        return redirect()->back();

    }

   
    public function show($id){
        
        $comment = Comment::findOrFail($id);

        $replies = $comment->replies;

        return view('admin.comments.replies.show',compact('replies'));


    }


    public function edit($id){
        
    }

  
    public function update(Request $request, $id){
        
        CommentReply::findOrFail($id)->update($request->all());

        return redirect()->back();

    }

    
    public function destroy($id){

        CommentReply::findOrFail($id)->delete();

        return redirect()->back();
        
    }
}
