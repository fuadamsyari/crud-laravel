<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Models\Service;
use NumberFormatter;
use Carbon\Carbon;


class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // menampilkan tabel utama
        $services = Service::all();
        // Format penampilan
        foreach ($services as $service) {
            // format tanggal
            $service->formatted_tanggal = Carbon::createFromFormat('Y-m-d', $service->tanggal)->format('d-m-Y');
            // format keuangan
            $formatter = new NumberFormatter('id_ID', NumberFormatter::CURRENCY);
            $service->formatted_pendapatan = $formatter->formatCurrency($service->pendapatan, 'IDR');
            $service->formatted_nominal_non_salary = $formatter->formatCurrency($service->nominal_non_salary, 'IDR');
        }
        return view('services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // menampilkan form tambah data
        return view('services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'tanggal' => 'required|date',
            'nama_customer' => 'required|string|max:255',
            'alamat_instansi' => 'required|string|max:255',
            'unit' => 'required|string|max:255',
            'unit_non_salary' => 'nullable|string|max:255',
            'nominal_non_salary' => 'nullable|numeric',
            'pendapatan' => 'required|numeric',
            'keterangan' => 'nullable|string',
        ]);

        // Simpan data ke database
        Service::create($request->all());

        // Redirect ke halaman daftar service
        return redirect()->route('services.index')->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        // Ambil data berdasarkan ID
        $service = Service::findOrFail($id);

        // Kirim data ke view
        return view('services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        // Validasi input
        $request->validate([
            'tanggal' => 'required|date',
            'nama_customer' => 'required|string|max:255',
            'alamat_instansi' => 'required|string|max:255',
            'unit' => 'required|string|max:255',
            'unit_non_salary' => 'nullable|integer',
            'nominal_non_salary' => 'nullable|numeric',
            'pendapatan' => 'required|numeric',
            'keterangan' => 'nullable|string',
        ]);

        // Cari data berdasarkan ID dan update
        $service = Service::findOrFail($id);
        $service->update($request->all());

        // Redirect ke halaman daftar service
        return redirect()->route('services.index')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // Cari data berdasarkan ID
        $service = Service::findOrFail($id);

        // Hapus data
        $service->delete();

        // Redirect ke halaman daftar service
        return redirect()->route('services.index')->with('success', 'Data berhasil dihapus.');
    }
}
