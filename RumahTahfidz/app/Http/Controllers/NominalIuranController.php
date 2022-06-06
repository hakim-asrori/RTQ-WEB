<?php

namespace App\Http\Controllers;

use App\Models\NominalIuran;
use Illuminate\Http\Request;

class NominalIuranController extends Controller
{
    public function index()
    {
        $data = [
            "data_nominal_iuran" => NominalIuran::get()
        ];

        return view("app.super_admin.settings.nominal_iuran.v_index", $data);
    }

    public function store(Request $request)
    {
        NominalIuran::create($request->all());

        return back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Tambahkan', 'success');</script>"]);
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => NominalIuran::where("id", $request->id)->first()
        ];

        return view("app.super_admin.settings.nominal_iuran.v_edit", $data);
    }

    public function update(Request $request)
    {
        NominalIuran::where("id", $request->id)->update([
            "nominal" => $request->nominal
        ]);

        return back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Ubah', 'success');</script>"]);
    }

    public function destroy($id)
    {
        NominalIuran::where("id", $id)->delete();

        return back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Hapus', 'success');</script>"]);
    }
}