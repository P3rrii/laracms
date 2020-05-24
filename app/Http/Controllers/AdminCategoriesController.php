<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Category; 

class AdminCategoriesController extends Controller
{
    
    //Index - Main Page of the categories controller group.
    public function index(){

        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));

    }

    
    //Function to directly store Data on the Database
    public function store(Request $request){
        Category::create($request->all());
        return redirect('/admin/categories/'); 

    }


    //Function to Display Single Data on the browser
    public function show($id){
        //

    }


    //Function to Edit Database
    public function edit($id){
        
        $category = Category::findOrFail($id);

        return view('admin.categories.edit',compact('category'));

    }


    //Function to Update Database Data
    public function update(Request $request, $id){

        $category = Category::findOrFail($id);

        $category->update($request->all());

        return redirect('/admin/categories');
    }

    
    //Function To Delete Database Data
    public function destroy($id){
        Category::findOrFail($id)->delete();
        return redirect('/admin/categories');

    }
}
