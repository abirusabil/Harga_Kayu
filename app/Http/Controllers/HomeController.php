<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
        $harga = Home::where('id',1)->first();;
        return view('dashboard',
            [
                "Harga_Terendah" => $harga->Harga_Terendah,
                "Harga_Tertinggi" => $harga->Harga_Tertinggi,
                "id" => $harga->id,
                "Item" =>$request
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Home $home)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Home $home)
    {
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Home $home)
    {
        

        $validatedData = $request->validate(
                [
                    'Harga_Terendah'=>'required',
                    'Harga_Tertinggi'=>'required'
                ]
            );
        
        // return $validatedData;

        Home::where('id',$home->id)->update($validatedData);
        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Home $home)
    {
        //
    }
}
