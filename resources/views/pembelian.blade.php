<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pembelian') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('process-pembelian') }}" method="POST">
                        @csrf
                        <div>
                            <h3 class="text-lg font-semibold mb-4">Informasi Pembelian:</h3>
                            <div class="mb-4">
                                <label for="hotel" class="block inline-block">Nama Hotel:</label>
                                <select id="hotel" name="hotel" class="form-select w-full">
                                    <option value="">Pilih Hotel</option>
                                    @foreach($hotels as $hotel)
                                    <option value="{{ $hotel->id }}" data-price="{{ $hotel->price }}">{{ $hotel->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="price" class="block inline-block">Harga Hotel:</label>
                                <input type="text" id="price" name="price" class="form-input w-full" readonly>
                            </div>

                            <div class="mb-4">
                                <label for="checkin_date" class="block inline-block">Tanggal Check-in:</label>
                                <input type="date" id="checkin_date" name="checkin_date" class="form-input w-full">
                            </div>

                            <div class="mb-4">
                                <label for="checkout_date" class="block inline-block">Tanggal Check-out:</label>
                                <input type="date" id="checkout_date" name="checkout_date" class="form-input w-full">
                            </div>

                            <div class="mb-4">
                                <label for="total_price" class="block inline-block">Total Harga:</label>
                                <input type="text" id="total_price" name="total_price" class="form-input w-full" readonly>
                            </div>

                            <div class="mb-4">
                                <label for="payment_method" class="block inline-block">Metode Pembayaran:</label>
                                <select id="payment_method" name="payment_method" class="form-select w-full">
                                    <option value="Transfer Bank">Transfer Bank</option>
                                    <option value="Kartu Kredit">Kartu Kredit</option>
                                    <option value="E-Wallet">E-Wallet</option>
                                </select>
                            </div>
                        </div>
                        <div class="mt-6">
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Submit Pembelian</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
    document.getElementById('hotel').addEventListener('change', function() {
        var selectedHotel = this.options[this.selectedIndex];
        var price = parseFloat(selectedHotel.getAttribute('data-price'));
        document.getElementById('price').value = price;
        updateTotalPrice();
    });

    document.getElementById('checkin_date').addEventListener('change', updateTotalPrice);
    document.getElementById('checkout_date').addEventListener('change', updateTotalPrice);

    function updateTotalPrice() {
        var price = parseFloat(document.getElementById('price').value);
        var checkinDate = new Date(document.getElementById('checkin_date').value);
        var checkoutDate = new Date(document.getElementById('checkout_date').value);
        
        // Menghitung selisih waktu dalam milidetik
        var differenceInMilliseconds = checkoutDate - checkinDate;
        // Mengonversi milidetik menjadi jam dan membulatkannya ke atas
        var differenceInHours = Math.ceil(differenceInMilliseconds / (1000 * 60 * 60));
        
        // Menghitung total harga berdasarkan harga hotel dan jumlah jam
        var totalPrice = price * differenceInHours / 24;

        document.getElementById('total_price').value = totalPrice.toFixed(2);
    }
</script>


</x-app-layout>
