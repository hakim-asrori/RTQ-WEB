<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $data = [
            "data_kelas" => Kelas::all()
        ];

        return view("app.super_admin.kelas.v_index", $data);
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => Kelas::where("id", $request->id)->first()
        ];

        return view("app.super_admin.kelas.v_edit", $data);
    }

    public function store(Request $request)
    {
        Kelas::create($request->all());

        return redirect()->back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil di Tambah', 'success')</script>");
    }

    public function update(Request $request)
    {
        Kelas::where("id", $request->id)->update([
            "nama_kelas" => $request->nama_kelas
        ]);

        return redirect()->back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil di Ubah', 'success')</script>");
    }

    public function destroy($id)
    {
        Kelas::where("id", $id)->delete();

        return redirect()->back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil di Hapus', 'success')</script>");
    }
}