@extends('layouts.app')

@section('title', 'Daftar Service')

@section('content')
    {{-- Start Tabel Service --}}
    <div class="container   mx-auto ">
        <h1 class=" my-8 text-3xl">Daftar Service</h1>
        <a class=" font-bold text-white ml-7 mt-8 px-2 py-2 text-md bg-cyan-500 rounded-lg transition duration-300 animate hover:bg-cyan-600 hover:ring-1 ring-slate-400"  href="{{ route('services.create') }}">Tambah Service</a>
        @if (session('success'))
        <div class="bg-green-100 text-green-700 w-80 mx-auto p-3 rounded-lg my-4">
            {{ session('success') }}
        </div>
        @endif

        <table class="table-auto w-full  mt-7 border-collapse border border-slate-400">
            <thead>
                <tr class="border  border-slate-300 ">
                    <th class="border w-auto h-auto border-slate-300 py-2 px-5 bg-slate-200">No</th>
                    <th class="border w-auto h-auto border-slate-300 py-2 px-5 bg-slate-200">Tanggal</th>
                    <th class="border w-auto h-auto border-slate-300 py-2 px-5 bg-slate-200">Nama Customer</th>
                    <th class="border w-auto h-auto border-slate-300 py-2 px-5 bg-slate-200">Alamat/Instansi</th>
                    <th class="border w-auto h-auto border-slate-300 py-2 px-5 bg-slate-200">Unit</th>
                    <th class="border w-auto h-auto border-slate-300 py-2 px-5 bg-slate-200">Unit NonSalary</th>
                    <th class="border w-auto h-auto border-slate-300 py-2 px-5 bg-slate-200">Nominal NonSalary</th>
                    <th class="border w-auto h-auto border-slate-300 py-2 px-5 bg-slate-200">Pendapatan</th>
                    <th class="border w-auto h-auto border-slate-300 py-2 px-5 bg-slate-200">Keterangan</th>
                    <th class="border w-auto h-auto border-slate-300 py-2 px-5 bg-slate-200">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($services as $service)
                <tr class=" border  border-slate-300  ">
                    <td class=" w-auto h-auto border border-slate-300 py-2 px-5">1</td>
                    <td class=" w-auto h-auto border border-slate-300 py-2 px-5">{{ $service->formatted_tanggal }}</td>
                    <td class=" w-auto h-auto border border-slate-300 py-2 px-5">{{ $service->nama_customer }}</td>
                    <td class=" w-auto h-auto border border-slate-300 py-2 px-5">{{ $service->alamat_instansi }}</td>
                    <td class=" w-auto h-auto border border-slate-300 py-2 px-5">{{ $service->unit }}</td>
                    <td class=" w-auto h-auto border border-slate-300 py-2 px-5">{{ $service->unit_non_salary }}</td>
                    <td class=" w-auto h-auto border border-slate-300 py-2 px-5">{{ $service->formatted_nominal_non_salary }}</td>
                    <td class=" w-auto h-auto border border-slate-300 py-2 px-5">{{ $service->formatted_pendapatan }}</td>
                    <td class=" w-auto h-auto border border-slate-300 py-2 px-5">{{ $service->keterangan }}</td>
                    <td class=" w-auto h-auto  border-slate-300 py-2 px-5 flex flex-nowrap   ">
                        <a class="rounded-tl-lg rounded-bl-lg  bg-green-500 px-3 py-1 text-sm font-bold text-white transition duration-300 animation hover:bg-green-600 hover:ring-1 ring-slate-400 " href="{{ route('services.edit', $service->id) }}">Edit</a>
                        <form action="{{ route('services.destroy', $service->id) }}" method="POST" style="display:inline;" class="rounded-tr-lg rounded-br-lg bg-red-500 px-3 py-1 text-sm font-bold text-white transition duration-300 animation hover:bg-red-600 hover:ring-1 ring-slate-400 ">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- End Tabel Service --}}
@endsection
