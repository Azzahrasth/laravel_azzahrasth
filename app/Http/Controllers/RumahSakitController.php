<?php
namespace App\Http\Controllers;

use App\Models\RumahSakit;
use Illuminate\Http\Request;

class RumahSakitController extends Controller
{
    public function index()
    {
        $data = RumahSakit::all();
        return view('admin.rumahsakit.index', compact('data'));
    }

    public function create()
    {
        return view('admin.rumahsakit.form');
    }

    public function store(Request $request)
    {
        RumahSakit::create($request->all());
        return redirect()->route('rumahsakit.index')->with('success', 'Data Rumah Sakit berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $rs = RumahSakit::findOrFail($id);
        return view('admin.rumahsakit.form', compact('rs'));
    }

    public function update(Request $request, $id)
    {
        $rs = RumahSakit::findOrFail($id);
        $rs->update($request->all());
        return redirect()->route('rumahsakit.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        RumahSakit::destroy($id);
        return response()->json(['success' => true]);
    }
}
?>