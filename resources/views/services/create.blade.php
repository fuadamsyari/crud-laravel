@extends('layouts.app')

@section('title', 'Tambah Service')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Tambah Service</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('services.store') }}" method="POST" class="bg-slate-100 w-1/2 mx-auto shadow-md rounded px-8 pt-3 pb-2 mb-4">
        @csrf

        <div >
            <label for="tanggal" class="block text-gray-700 text-sm font-bold mb-2">Tanggal:</label>
            <input type="date" name="tanggal" id="tanggal" class="shadow appearance-none border rounded w-1/4 py-2 px-3 text-gray-700" required>
        </div>

        <div >
            <label for="nama_customer" class="block text-gray-700 text-sm font-bold mb-2">Nama Customer:</label>
            <input type="text" name="nama_customer" id="nama_customer" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
        </div>

        <div >
            <label for="alamat_instansi" class="block text-gray-700 text-sm font-bold mb-2">Alamat/Instansi:</label>
            <input type="text" name="alamat_instansi" id="alamat_instansi" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
        </div>

        <div >
            <label for="unit" class="block text-gray-700 text-sm font-bold mb-2">Unit:</label>
            <input type="text" name="unit" id="unit" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
        </div>

        <div >
            <label for="unit_non_salary" class="block text-gray-700 text-sm font-bold mb-2">Unit Non-Salary:</label>
            <input type="text" name="unit_non_salary" id="unit_non_salary" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
        </div>

        <div >
            <label for="nominal_non_salary" class="block text-gray-700 text-sm font-bold mb-2">Nominal Non-Salary:</label>
            <input type="number" step="0.01" name="nominal_non_salary" id="nominal_non_salary" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
        </div>

        <div >
            <label for="pendapatan" class="block text-gray-700 text-sm font-bold mb-2">Pendapatan:</label>
            <input type="number" step="0.01" name="pendapatan" id="pendapatan" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
        </div>

        <div >
            <label for="keterangan" class="block text-gray-700 text-sm font-bold mb-2">Keterangan:</label>
            <textarea name="keterangan" id="keterangan" rows="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700"></textarea>
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Simpan
            </button>
            <a href="{{ route('services.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                Batal
            </a>
        </div>
    </form>
@endsection
