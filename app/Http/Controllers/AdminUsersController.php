<?php

namespace App\Http\Controllers;

use App\User;
use App\Photo;
use App\Role;
use App\Http\Requests\UsersRequest;
use App\Http\Requests\UsersEditRequest;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Session;

use App\Http\Requests;

class AdminUsersController extends Controller
{
    
    //Function for index.
    public function index()
    {

        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    
    //Function to create something in the database.
    public function create()
    {
        $roles = Role::lists('name','id')->all();

        return view('admin.users.create',compact('roles'));
    }


    //Function to store something in the database
    public function store(UsersRequest $request)
    {
        
        if(trim($request->password)==''){

            $input = $request->except('password');
        }
        
        else{

            $input = $request ->all();
            $input['password'] = bcrypt($request->password);

        }
    

        if($file= $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path('images'),$name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;

        }

        User::create($input);

        return redirect('/admin/users');
        
    }

  
    //Function to display something from the database on the page
    public function show($id)
    {
        return view('admin.users.show');
    }


    //Function to edit something in the database.
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::lists('name','id') ->all();

        return view('admin.users.edit', compact('user','roles'));
    }

    
    //Function to update something in the database.
    public function update(UsersEditRequest $request, $id)
    {
        $user = User::findOrFail($id);


        if(trim($request->password)==''){

            $input = $request->except('password');
        }
        
        else{
            
            $input = $request ->all();
            $input['password'] = bcrypt($request->password);

        }

        if($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path('images'),$name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }

        $user->update($input);

        return redirect('/admin/users');
    }


    //Function to delete something in the database.
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if(file_exists(public_path() . $user->photo->file)){
            unlink(public_path() . $user->photo->file);
        }

        $user->delete();

        Session::flash('deleted_user', 'The User Has Been Deleted');

        return redirect('/admin/users');
    }
}
