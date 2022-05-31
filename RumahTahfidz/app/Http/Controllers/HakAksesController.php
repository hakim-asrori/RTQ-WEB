<?php

namespace App\Http\Controllers;

use App\Models\HakAkses;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class HakAksesController extends Controller
{
    public function index($id)
    {
        if ($id == 1) {
            abort(404);
        } else {
            $data = [
                'user' => User::where('id', $id)->first(),
            ];

            return view('app.super_admin.hak_akses.v_index', $data);
        }
    }

    public function store(Request $request)
    {
        $cek_hak_akses = HakAkses::where('id_role', $request->roleId)->where('id_user', $request->userId)->first();

        if ($cek_hak_akses) {
            HakAkses::where('id_role', $request->roleId)->where('id_user', $request->userId)->delete();

            return 1;
        } else {
            HakAkses::create([
                'id_role' => $request->roleId,
                'id_user' => $request->userId,
            ]);

            return 1;
        }
    }

    public function table($id)
    {
        $data = [
            'user' => User::where('id', $id)->first(),
            'role' => Role::orderBy('id', 'desc')->get()
        ];

        return view('app.super_admin.hak_akses.v_table', $data);
    }
}
