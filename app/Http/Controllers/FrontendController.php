<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Shop;
use Hash;
class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function register()
    {
        return view('frontend.register');
    }
    public function signin()
    {
        return view('frontend.login');
    }
    public function vendor_register()
    {
        return view('frontend.vregister');
    }

    public function customer(Request $request)
    {  
         $request->validate([
            "name" => "required", "string", "max:255",
            "email" => "required", "string", "email", "max:255", "unique:users",
            "password" => "required", "string", "min:8", "confirmed",
        ]);

        $user=new User;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make('$request->password');
        $user->save();

        $user->assignRole('customer');

        return redirect()->route('main');
    }
    public function vendor(Request $request)
    { 
        // $request->validate([
        //     "name" => "required", "string", "max:255",
        //     "email" => "required", "string", "email", "max:255", "unique:users",
        //     "password" =>"required", "string", "min:8", "confirmed",
        //     "user_id"=>"required",
        //     "profile"=>"required",
        //     "phone"=>"required",
        //     "address"=>"required",
        // ]);

        $user=new User;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make('$request->password');
        $user->save();

        $user->assignRole('vendor');
        

        if($request->file()) {
            $fileName = time().'_'.$request->profile->getClientOriginalName(); // 1970 jan 1
            $filePath = $request->file('profile')->storeAs('shop_profile', $fileName, 'public');
            $path = 'storage/'.$filePath;
        }

        $shop=new Shop;
        $shop->user_id=$user->id;
        $shop->profile=$path;
        $shop->phoneno=$request->phone;
        $shop->address=$request->address;
        $shop->save();

        return redirect()->route('main');

    }
    
}
