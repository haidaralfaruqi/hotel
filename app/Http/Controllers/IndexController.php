<?php

namespace App\Http\Controllers;

use App\Models\Indexs;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ("index");
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
    public function show(Indexs $indexs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Indexs $indexs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Indexs $indexs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Indexs $indexs)
    {
        //
    }
}
