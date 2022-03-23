<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if (Auth::user()->suspend == 'suspend') {
        //     abort(404);
        // } else {
        //     $cate = Category::all();
        //     return view('admin.category.homecategory', compact('cate'));
        // }

        $cate = Category::all();
            return view('admin.category.homecategory', compact('cate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.tambahcategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Category();

        $data->name = $request->get('name');

        $data->save();
        return redirect()->route('admin.cate.homeCate')->with('status', 'Data Category berhasil ditambahkan');
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
        $c = Category::find($id);
        return view('admin.category.editcategory', compact('c'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $cate)
    {
        $cate->name = $request->get('name');
        $cate->save();
        return redirect()->route('admin.cate.homeCate')->with('status', 'Data Category berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $cate)
    {
        try {
            $cate->delete();
            return redirect()->route('admin.cate.homeCate')->with('delete', 'Data Category Berhasil Dihapus');
        } catch (\PDOException $e) {
        }
    }
}
