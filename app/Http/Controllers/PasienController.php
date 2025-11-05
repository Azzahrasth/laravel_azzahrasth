<?php
namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\RumahSakit;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index(Request $request)
    {
        $rumahsakit_id = $request->rumah_sakit_id;
        $rumahSakits = RumahSakit::all();

        $pasiens = Pasien::with('rumahSakit')
            ->when($rumahsakit_id, fn($q) => $q->where('rumah_sakit_id', $rumahsakit_id))
            ->get();

        return view('admin.pasien.index', compact('pasiens', 'rumahSakits', 'rumahsakit_id'));
    }

    public function create()
    {
        $rumahSakits = RumahSakit::all();
        return view('admin.pasien.form', compact('rumahSakits'));
    }

    public function store(Request $request)
    {
        Pasien::create($request->all());
        return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $pasien = Pasien::findOrFail($id);
        $rumahSakits = RumahSakit::all();
        return view('admin.pasien.form', compact('pasien', 'rumahSakits'));
    }

    public function update(Request $request, $id)
    {
        $pasien = Pasien::findOrFail($id);
        $pasien->update($request->all());
        return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Pasien::destroy($id);
        return response()->json(['success' => true]);
    }
}
?>