<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataController extends Controller
{
    public function showFormPendataan()
    {
        $menuItems = [
            ['id' => 'data1', 'name' => 'Data 1'],
            ['id' => 'data2', 'name' => 'Data 2'],
            ['id' => 'data3', 'name' => 'Data 3'],
            ['id' => 'data4', 'name' => 'Data 4'],
        ];

        return view('data', compact('menuItems'));
    }

    public function submitData(Request $request)
    {
        $menuItems = [
            'data1' => ['name' => 'Data 1'],
            'data2' => ['name' => 'Data 2'],
            'data3' => ['name' => 'Data 3'],
            'data4' => ['name' => 'Data 4'],
        ];

        $data = [
            'nik' => $request->input('nik'),
            'name' => $request->input('name'),
            'provinsi' => $request->input('provinsi'),
            'kota' => $request->input('kota'),
            'telpon' => $request->input('telpon'),
        ];

        // Lakukan validasi input di sini jika diperlukan

        return view('dashboardPenduduk', compact('data', 'menuItems'));
    }
}
