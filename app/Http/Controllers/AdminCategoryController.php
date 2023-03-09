<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.categories.index', [
            'categories' => Category::all()
        ]);
    }

    public function editCategories($slug){
        $category = Category::where('slug', $slug)->first();
        return view('dashboard.categories.edit', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.categories.create', [
            'categories' => Category::all()
        ]);
    }

    public function storeCategories(Request $request){
        
        $store = Category::create([
            'name' => $request->title,
            'slug' => $request->slug
        ]);

        if($store){
            return redirect('/dashboard/categories')->with('success', 'Categori ditambagkan');
        } else {    
            return redirect('/dashboard/categories')->with('error', 'Categori gagal ditambagkan');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'categories' => 'required|max:255',
            'slug' => 'required|unique:posts'
        ]);

        $validateData['user_id'] = auth()->user()->id;

        Category::create($validateData);

        return redirect('/dashboard/categories/')->with('success', 'New categories has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        
        return view('dashboard.posts.edit', [
            'categories' => $category,
            'slug' => Category::all()
        ]);
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category $category)
    {
            $rules = [
                'title' => 'required|max:255',
                'category_id' => 'required',
            ];
            if($request->slug != $category->slug) {
                $rules['slug'] = 'required|unique:posts';
            }
            $validateData = $request->validate($rules);
    
            $validateData['user_id'] = auth()->user()->id;
            
            Category::where('id', $category->id)
                    ->update($validateData);
    
            return redirect('/dashboard/categories/')->with('success', 'Categories has been updated!');
    }

    public function updateCategories(Request $request, $slug){
        
        $update = Category::where('slug', $slug)->update([
            'name' => $request->title,
            'slug' => $request->slug
        ]);

        if($update){
            return redirect('/dashboard/categories')->with('success', 'Category berhasil diupdate');
        } else {
            
            return redirect('/dashboard/categories')->with('error', 'Category gagal diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
        //
    }

    public function deleteCategories(Request $request){
        $deletepost = Post::where('id', $request->deleteName)->delete();
        $delete = Category::where('id', $request->deleteName)->delete();
        if($delete){
            return back()->with('error', 'berhasil menghapus category');
        } else {
            return back()->with('error', 'gagal menghapus category');
        }
    }

}
