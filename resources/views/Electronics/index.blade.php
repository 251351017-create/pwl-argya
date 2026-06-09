@extends('layouts.app')
@push('css')

@endpush
@section('header')
{{ __(' Daftar Elektronik') }}
@endsection
@section('content')
       
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

           @if(auth()->user()->hasRole('manager'))
            <a href="{{ route('electronics.create') }}"
               class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">
                + Tambah Elektronik
            </a>
            @endif

            <table class="w-full bg-white rounded shadow">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-3 text-left">ID</th>
                        <th class="p-3 text-left">Nama Elektronik</th>
                        <th class="p-3 text-left">Brand</th>
                        <th class="p-3 text-left">Stok</th>
                        <th class="p-3 text-left">Harga</th>
                        <th class="p-3 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($electronics as $electronic)
                    <tr class="border-t">
                        <td class="p-3">{{ $electronic->id }}</td>
                        <td class="p-3">{{ $electronic->nama_barang }}</td>
                        <td class="p-3">{{ $electronic->brand }}</td>
                        <td class="p-3">{{ $electronic->stok }}</td>
                        <td class="p-3">Rp {{ number_format($electronic->harga,0,',','.') }}</td>
                        <td class="p-3 flex gap-2">
                            @if(auth()->user()->hasRole('manager'))
                            <a href="{{ route('electronics.edit', $electronic) }}"
                               class="bg-yellow-400 text-white px-3 py-1 rounded text-sm">
                               Edit
                            </a>
                            @endif
                            @if(auth()->user()->hasRole('manager'))
                            <form method="POST" action="{{ route('electronics.destroy', $electronic) }}">
                                @csrf @method('DELETE')
                                <button class="bg-red-500 text-white px-3 py-1 rounded text-sm"
                                    onclick="return confirm('Yakin hapus?')">
                                    Hapus
                                </button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="p-3 text-center">Belum ada data</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
@push('js')

@endpush


