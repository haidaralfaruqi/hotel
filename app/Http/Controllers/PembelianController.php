<?php

namespace App\Http\Controllers;

use App\Models\Pembelians;
use Illuminate\Http\Request;
use App\Models\Hotel;
use Illuminate\Support\Facades\Auth;


class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $hotels = Hotel::all();
        return view('pembelian', compact('user', 'hotels'));
    }


    public function process(Request $request)
    {
        // Validasi data yang diterima dari formulir
        $validatedData = $request->validate([
            'hotel' => 'required|exists:hotels,id',
            'checkin_date' => 'required|date',
            'checkout_date' => 'required|date|after:checkin_date',
            'payment_method' => 'required|in:Transfer Bank,Kartu Kredit,E-Wallet',
        ]);

        // Proses pembelian
        try {
            // Misalnya, menyimpan data pembelian ke dalam database
            $pembelian = new Pembelians();
            $pembelian->user_id = auth()->user()->id;
            $pembelian->hotel_id = $request->hotel;
            $pembelian->checkin_date = $request->checkin_date;
            $pembelian->checkout_date = $request->checkout_date;
            $pembelian->payment_method = $request->payment_method;
            // Hitung total harga berdasarkan tanggal check-in dan check-out
            $totalPrice = $this->calculateTotalPrice($request->checkin_date, $request->checkout_date);
            $pembelian->total_price = $totalPrice;
            $pembelian->save();

            // Redirect ke halaman dashboard dengan pesan sukses
            return redirect()->route('riwayat')->with('success', 'Pembelian berhasil diproses!');
        } catch (\Exception $e) {
            // Redirect kembali ke halaman pembelian dengan pesan error jika terjadi kesalahan
            return redirect()->route('pembelian')->with('error', 'Terjadi kesalahan saat memproses pembelian.');
        }
    }

    /**
     * Calculate total price based on check-in and check-out dates.
     */
    private function calculateTotalPrice($checkinDate, $checkoutDate)
    {
        // Misalnya, hitung harga berdasarkan durasi menginap
        // Anda dapat menyesuaikan metode ini sesuai kebutuhan bisnis Anda
        // Contoh sederhana: harga per malam dikalikan dengan jumlah malam
        $pricePerNight = 100; // Ganti dengan harga per malam dari database atau konfigurasi
        $checkin = new \DateTime($checkinDate);
        $checkout = new \DateTime($checkoutDate);
        $interval = $checkin->diff($checkout);
        $numberOfNights = $interval->days;

        return $pricePerNight * $numberOfNights;
    }

    public function edit(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            // Validasi data yang diterima dari formulir
            $validatedData = $request->validate([
                'hotel' => 'required|exists:hotels,id',
                'checkin_date' => 'required|date',
                'checkout_date' => 'required|date|after:checkin_date',
                'payment_method' => 'required|in:Transfer Bank,Kartu Kredit,E-Wallet',
            ]);

            try {
                // Misalnya, menyimpan data pembelian ke dalam database
                $pembelian = Pembelians::findOrFail($id);
                $pembelian->hotel_id = $request->hotel;
                $pembelian->checkin_date = $request->checkin_date;
                $pembelian->checkout_date = $request->checkout_date;
                $pembelian->payment_method = $request->payment_method;
                // Hitung total harga berdasarkan tanggal check-in dan check-out
                $totalPrice = $this->calculateTotalPrice($request->checkin_date, $request->checkout_date);
                $pembelian->total_price = $totalPrice;
                $pembelian->save();

                // Redirect ke halaman riwayat dengan pesan sukses
                return redirect()->route('pembelian')->with('success', 'Pembelian berhasil diperbarui!');
            } catch (\Exception $e) {
                // Redirect kembali ke halaman edit pembelian dengan pesan error jika terjadi kesalahan
                return redirect()->route('edit-pembelian', $id)->with('error', 'Terjadi kesalahan saat memperbarui pembelian.');
            }
        } else {
            // Jika bukan permintaan POST, tampilkan form edit
            // Ambil data pembelian berdasarkan ID
            $pembelian = Pembelians::findOrFail($id);
            
            // Ambil semua data hotel
            $hotels = Hotel::all();
            
            // Kirim data pembelian dan data hotel ke view
            return view('edit-pembelian', compact('pembelian', 'hotels'));
        }
    }

    public function update(Request $request, $id)
    {
        // Validasi data yang diterima dari formulir
        $validatedData = $request->validate([
            'hotel' => 'required|exists:hotels,id',
            'checkin_date' => 'required|date',
            'checkout_date' => 'required|date|after:checkin_date',
            'payment_method' => 'required|in:Transfer Bank,Kartu Kredit,E-Wallet',
        ]);

        try {
            // Misalnya, menyimpan data pembelian ke dalam database
            $pembelian = Pembelians::findOrFail($id);
            $pembelian->hotel_id = $request->hotel;
            $pembelian->checkin_date = $request->checkin_date;
            $pembelian->checkout_date = $request->checkout_date;
            $pembelian->payment_method = $request->payment_method;
            // Hitung total harga berdasarkan tanggal check-in dan check-out
            $totalPrice = $this->calculateTotalPrice($request->checkin_date, $request->checkout_date);
            $pembelian->total_price = $totalPrice;
            $pembelian->save();

            // Redirect ke halaman riwayat dengan pesan sukses
            return redirect()->route('riwayat')->with('success', 'Pembelian berhasil diperbarui!');
        } catch (\Exception $e) {
            // Redirect kembali ke halaman edit pembelian dengan pesan error jika terjadi kesalahan
            return back()->withInput()->with('error', 'Terjadi kesalahan saat memperbarui pembelian.');
        }
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
    public function show(Pembelians $pembelians)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembelians $pembelians)
    {
        //
    }
}
