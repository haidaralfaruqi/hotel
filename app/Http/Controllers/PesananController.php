<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembelians;
use App\Models\Hotel;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembelians = Pembelians::all();
        return view('admin.pesanan.index', compact('pembelians'));
    }

    public function edit($id)
    {
        $pembelian = Pembelians::findOrFail($id);
        $hotels = Hotel::all();
        return view('admin.pesanan.edit', compact('pembelian', 'hotels'));
    }


    public function update(Request $request, $id)
    {
        $pembelian = Pembelians::findOrFail($id);
        
        // Update the purchase with the new data
        $pembelian->total_price = $request->total_price;
        $pembelian->payment_method = $request->payment_method;
        
        // Save the updated purchase
        $pembelian->save();

        return redirect()->route('admin.pesanan.index')->with('success', 'Pesanan berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $pembelian = Pembelians::findOrFail($id);
        $pembelian->delete();
        return redirect()->route('admin.pesanan.index')->with('success', 'Pesanan berhasil dihapus.');
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
    public function show(string $id)
    {
        //
    }

}
