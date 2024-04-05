<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Pesanan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <form action="{{ route('admin.pesanan.update', $pembelian->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="hotel_id" class="block text-gray-700 text-sm font-bold mb-2">Nama Hotel:</label>
                        <select name="hotel_id" id="hotel_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" onchange="getHotelPrice()">
                            @foreach($hotels as $hotel)
                                <option value="{{ $hotel->id }}" data-price="{{ $hotel->price }}" {{ $pembelian->hotel_id == $hotel->id ? 'selected' : '' }}>{{ $hotel->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="hotel_price" class="block text-gray-700 text-sm font-bold mb-2">Harga:</label>
                        <input type="text" name="hotel_price" id="hotel_price" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $pembelian->hotel->price }}" readonly>
                    </div>
                    <div class="mb-4">
                        <label for="checkin_date" class="block text-gray-700 text-sm font-bold mb-2">Tanggal Check-in:</label>
                        <input type="date" name="checkin_date" id="checkin_date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $pembelian->checkin_date }}">
                    </div>
                    <div class="mb-4">
                        <label for="checkout_date" class="block text-gray-700 text-sm font-bold mb-2">Tanggal Check-out:</label>
                        <input type="date" name="checkout_date" id="checkout_date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $pembelian->checkout_date }}">
                    </div>
                    <div class="mb-4">
                        <label for="total_price" class="block text-gray-700 text-sm font-bold mb-2">Total Harga:</label>
                        <input type="text" name="total_price" id="total_price" value="{{ $pembelian->total_price }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4">
                        <label for="payment_method" class="block text-gray-700 text-sm font-bold mb-2">Metode Pembayaran:</label>
                        <select name="payment_method" id="payment_method" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="Transfer Bank" {{ $pembelian->payment_method == 'Transfer Bank' ? 'selected' : '' }}>Transfer Bank</option>
                            <option value="Kartu Kredit" {{ $pembelian->payment_method == 'Kartu Kredit' ? 'selected' : '' }}>Kartu Kredit</option>
                            <option value="E-Wallet" {{ $pembelian->payment_method == 'E-Wallet' ? 'selected' : '' }}>E-Wallet</option>
                            <!-- Tambahkan opsi lain sesuai kebutuhan Anda -->
                        </select>
                    </div>
                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Simpan</button>
                        <a href="{{ route('admin.pesanan.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">Batal</a>
                    </div>
                </form>

                <script>
                    function getHotelPrice() {
                        var hotelId = document.getElementById('hotel_id').value;
                        var hotelPrice = document.querySelector('option[value="' + hotelId + '"]').getAttribute('data-price');
                        document.getElementById('hotel_price').value = hotelPrice;
                        calculateTotalPrice();
                    }

                    function calculateTotalPrice() {
                        var checkinDate = new Date(document.getElementById('checkin_date').value);
                        var checkoutDate = new Date(document.getElementById('checkout_date').value);
                        var hotelPricePerNight = parseFloat(document.getElementById('hotel_price').value);

                        if (!isNaN(checkinDate.getTime()) && !isNaN(checkoutDate.getTime())) {
                            var timeDiff = Math.abs(checkoutDate.getTime() - checkinDate.getTime());
                            var nightCount = Math.ceil(timeDiff / (1000 * 3600 * 24)); // Calculate number of nights
                            var totalPrice = nightCount * hotelPricePerNight;
                            document.getElementById('total_price').value = totalPrice;
                        }
                    }

                    document.getElementById('checkin_date').addEventListener('change', calculateTotalPrice);
                    document.getElementById('checkout_date').addEventListener('change', calculateTotalPrice);
                </script>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
