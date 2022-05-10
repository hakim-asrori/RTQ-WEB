<?php

namespace App\Http\Controllers;

use App\Models\Iuran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IuranController extends Controller
{
    public function validasi_admin_cabang()
    {
        $data = [
            "data_validasi" => Iuran::get()
        ];

        return view("app.administrator.iuran.v_index", $data);
    }

    public function simpan_validasi(Request $request)
    {
        foreach($request->id_santri as $data => $value) {
            Iuran::where("id_santri", $request->id_santri[$data])->update([
                "status_validasi" => 3,
                "id_users" => Auth::user()->id
            ]);
        }

        return redirect()->back();
    }
}
