<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    

    public function showHotels()
    {
        // Ambil semua data hotel dari database
        $hotels = Hotel::all();

        // Kirim data hotel ke view 'admin.hotels.index'
        return view('admin.hotels.index', compact('hotels'));
    }


    public function index()
    {
        $hotels = Hotel::all();
        return view('admin.hotels.index', compact('hotels'));
    }

    public function edit($id)
    {
        $hotel = Hotel::findOrFail($id);
        return view('admin.hotels.edit', compact('hotel'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
        ]);

        $hotel = Hotel::findOrFail($id);
        $hotel->name = $request->name;
        $hotel->description = $request->description;
        $hotel->price = $request->price;
        $hotel->save();

        return redirect()->route('admin.hotels.index')->with('success', 'Hotel updated successfully');
    }

    public function destroy(Hotel $hotel)
    {
        $hotel->delete();

        return redirect()->route('admin.hotels.index')->with('success', 'Hotel deleted successfully');
    }

    public function create()
    {
        return view('admin.hotels.create');
    }
    
    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);

        // Buat hotel baru
        Hotel::create($validatedData);

        // Redirect ke halaman index hotels dengan pesan sukses
        return redirect()->route('admin.hotels.index')->with('success', 'Hotel created successfully!');
    }
}

