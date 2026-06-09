<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Elektronik
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('electronics.update', $electronic) }}"
                  class="bg-white p-6 rounded shadow">
                @csrf @method('PUT')
                <div class="mb-4">
                    <label class="block font-semibold mb-1">Nama Elektronik</label>
                    <input type="text" name="nama_barang"
                           class="w-full border rounded px-3 py-2"
                           value="{{ $electronic->nama_barang }}" required>
                    @error('nama_barang')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                </div>
                <div class="mb-4">
                    <label class="block font-semibold mb-1">Brand</label>
                    <input type="text" name="brand"
                           class="w-full border rounded px-3 py-2"
                           value="{{ $electronic->brand }}" required>
                    @error('brand')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                </div>
                <div class="mb-4">
                    <label class="block font-semibold mb-1">Stok</label>
                    <input type="number" name="stok"
                           class="w-full border rounded px-3 py-2"
                           value="{{ $electronic->stok }}" required>
                    @error('stok')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                </div>
                <div class="mb-4">
                    <label class="block font-semibold mb-1">Harga</label>
                    <input type="number" name="harga" step="0.01"
                           class="w-full border rounded px-3 py-2"
                           value="{{ $electronic->harga }}" required>
                    @error('harga')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                </div>
                <button type="submit"
                        class="bg-yellow-500 text-white px-4 py-2 rounded">
                    Update
                </button>
                <a href="{{ route('electronics.index') }}"
                   class="ml-2 text-gray-500">Batal</a>
            </form>
        </div>
    </div>
</x-app-layout>