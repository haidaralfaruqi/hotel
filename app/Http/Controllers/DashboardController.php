<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mendapatkan objek pengguna yang saat ini diautentikasi
        $user = Auth::user();

        // Memeriksa apakah pengguna adalah admin menggunakan metode isAdmin()
        if ($user && $user->isAdmin()) {
            // Redirect admin to admin dashboard
            return redirect()->route('admin.dashboard');
        }

        // Redirect regular users to their dashboard
        return view('user.dashboard');
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
    // public function show(Dashboards $dashboards)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(Dashboards $dashboards)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, Dashboards $dashboards)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Dashboards $dashboards)
    // {
    //     //
    // }
}
