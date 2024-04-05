<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="grid grid-cols-1 gap-6">
                    @foreach($hotels as $hotel)
                        <a href="{{ route('pembelian') }}" class="block bg-gray-100 max-w-screen-lg w-full p-4 rounded-lg shadow-lg">
                            <div class="grid grid-cols-2 gap-4">
                                <img src="{{ $hotel->image }}" alt="{{ $hotel->name }}" class="w-full h-72 object-cover rounded-lg">
                                <div class="col-span-1">
                                    <h3 class="text-xl font-semibold">{{ $hotel->name }}</h3>
                                    <p class="text-gray-600">{{ $hotel->description }}</p>
                                    <p class="text-gray-600">Harga: ${{ $hotel->price }}</p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

</x-app-layout>
