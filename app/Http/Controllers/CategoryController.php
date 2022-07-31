<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.index')->with(compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(StoreCategoryRequest $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required'],
            'icon' => ['required']
        ]);
        $newCategory = new Category();
        if($request->hasFile('icon')){
            $request->validate([
                'icon' =>'image|mimes:jpeg,bmp,png,jpg'
            ]);
            $imageName = 'brand_'. Str::studly($request->get('name')) . '.' .$request->file('icon')->extension();
            $request->file('icon')->move(public_path('images/brands'), $imageName);
            $newCategory->icon = $imageName;
        }

        $newCategory->name = $request->get('name');
        $newCategory->slug = Str::slug($request->get('name'));
        $newCategory->description = $request->get('description');;
        $newCategory->save();

        return redirect('/dashboard/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brand = Category::whereid($id)->first();
        $products = Product::query()->wherecategory_id($id)->wherepublished(1)->get();

        return view('categories.show')->with(compact('brand','products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($category)
    {
        $cat = Category::query()->whereid($category)->first();
        return view('categories.edit')->with(compact('cat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request)
    {
        $category = Category::query()->whereid($request->get('id'))->first();
        $category->name = $request->get('name');
        $category->slug = Str::slug($request->get('name'));
        $category->description = $request->get('description');
        if($request->hasFile('icon')){
            $request->validate([
                'icon' =>'image|mimes:jpeg,bmp,png,jpg'
            ]);
            $imageName = 'brand_'. $request->get('name') . '.' .$request->file('icon')->extension();
            $request->file('icon')->move(public_path('images/brands'), $imageName);
            $category->icon = $imageName;
        }
        $category->save();

        return redirect(url('/dashboard/categories'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $category = Category::whereid($id);
                $category->delete();

                return redirect(url('/dashboard/categories'));
    }
}
