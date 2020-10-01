<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand=Brand::all();
        return view('backend.brand.index',compact('brand'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.brand.create');
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
            "name" =>"required",
            "logo" =>"required"
        ]);

       // if include file, upload
        if($request->file()) {
            $fileName = time().'_'.$request->logo->getClientOriginalName(); // 1970 jan 1
            $filePath = $request->file('logo')->storeAs('brand_logo', $fileName, 'public');
            $path ='storage/'.$filePath;
        }

        // data store
        $brand = new Brand;
        $brand->name = $request->name;
        $brand->logo = $path;
        $brand->save();

        // return redirect
        return redirect()->route('brand.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        return view('backend.brand.detail',compact("brand"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('backend.brand.edit',compact("brand"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            "name" =>"required",
            "logo" =>"sometimes"
        ]);

       // if include file, upload
        if($request->file()) {
            $fileName = time().'_'.$request->logo->getClientOriginalName(); // 1970 jan 1
            $filePath = $request->file('logo')->storeAs('brand_logo', $fileName, 'public');
            $path ='storage/'.$filePath;
        }else{
            $path=$request->oldlogo;
        }

        // data store
        
        $brand->name = $request->name;
        $brand->logo = $path;
        $brand->save();

        // return redirect
        return redirect()->route('brand.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route('brand.index');
    }
}
