<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="flex justify-center">
    <div class="bg-gray-100 max-w-screen-lg w-full p-4 rounded-lg shadow-lg">
        <div class="flex space-x-4 overflow-x-auto">
            <div class="bg-white w-64 p-4 rounded-lg cursor-pointer" onclick="reserveHotel('hotel1')">
                <img src="https://www.kayak.co.id/rimg/himg/d0/cc/07/expediav2-334942-269765724-646228.jpg?width=1366&height=768&crop=true" alt="Hotel 1" class="w-full h-32 object-cover rounded-lg mb-2">
                <h3 class="text-xl font-semibold">Hotel 1</h3>
                <p class="text-gray-600">Deskripsi Hotel 1</p>
                <p class="text-gray-600">Harga: $100</p>
            </div>
          
            <!-- Tambahkan 2 kotak hotel lainnya sesuai kebutuhan -->
        </div>
    </div>
</div>

    
</x-app-layout>
