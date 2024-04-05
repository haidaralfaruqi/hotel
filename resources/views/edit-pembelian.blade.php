<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Pembelian') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Form untuk mengedit pembelian -->
                    <form action="{{ route('update-pembelian', $pembelian->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div>
                            <h3 class="text-lg font-semibold mb-4">Informasi Pembelian:</h3>
                            <div class="mb-4">
                                <label for="hotel" class="block">Nama Hotel:</label>
                                <select id="hotel" name="hotel" class="form-select w-full" onchange="getHotelPrice()">
                                    <option value="">Pilih Hotel</option>
                                    @foreach($hotels as $hotel)
                                        <option value="{{ $hotel->id }}" data-price="{{ $hotel->price }}" {{ $pembelian->hotel_id == $hotel->id ? 'selected' : '' }}>{{ $hotel->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="price" class="block">Harga Hotel:</label>
                                <input type="text" id="hotel_price" name="hotel_price" class="form-input w-full" readonly value="{{ $pembelian->hotel->price ?? '' }}">
                            </div>

                            <div class="mb-4">
                                <label for="checkin_date" class="block">Tanggal Check-in:</label>
                                <input type="date" id="checkin_date" name="checkin_date" class="form-input w-full" value="{{ $pembelian->checkin_date }}" onchange="calculateTotalPrice()">
                            </div>

                            <div class="mb-4">
                                <label for="checkout_date" class="block">Tanggal Check-out:</label>
                                <input type="date" id="checkout_date" name="checkout_date" class="form-input w-full" value="{{ $pembelian->checkout_date }}" onchange="calculateTotalPrice()">
                            </div>

                            <div class="mb-4">
                                <label for="total_price" class="block">Total Harga:</label>
                                <input type="text" id="total_price" name="total_price" class="form-input w-full" readonly value="{{ $pembelian->total_price }}">
                            </div>
                            
                            <div class="mb-4">
                                <label for="payment_method" class="block">Metode Pembayaran:</label>
                                <select id="payment_method" name="payment_method" class="form-select w-full">
                                    <option value="Transfer Bank" {{ $pembelian->payment_method == 'Transfer Bank' ? 'selected' : '' }}>Transfer Bank</option>
                                    <option value="Kartu Kredit" {{ $pembelian->payment_method == 'Kartu Kredit' ? 'selected' : '' }}>Kartu Kredit</option>
                                    <option value="E-Wallet" {{ $pembelian->payment_method == 'E-Wallet' ? 'selected' : '' }}>E-Wallet</option>
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
        function getHotelPrice() {
            var hotelId = document.getElementById('hotel').value;
            var hotelPrice = document.querySelector('option[value="' + hotelId + '"]').getAttribute('data-price');
            document.getElementById('hotel_price').value = hotelPrice;
            calculateTotalPrice(); // Memanggil fungsi calculateTotalPrice() setelah memperbarui harga hotel
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
    </script>

</x-app-layout>
