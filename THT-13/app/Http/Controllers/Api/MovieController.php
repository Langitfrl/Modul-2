<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Movie::orderBy('judul', 'asc')->get();
        return response()->json([
            'status' => true,
            'message' => 'Data ditemukan',
            'data' => $data
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataMovie = new Movie;

        $rules = [
            'judul' => 'required',
            'tahun' => 'required',
            'sinopsis' => 'required'
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => 'Gagal memasukkan data',
                'data'=>$validator->errors()
            ]);
        }

        $dataMovie->judul = $request->judul;
        $dataMovie->tahun = $request->tahun;
        $dataMovie->sinopsis = $request->sinopsis;

        $post = $dataMovie->save();

        return response()->json([
            'status' => true,
            'message' => 'Sukses memasukkan data'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Movie::find($id);
        if($data){
            return response() -> json([
                'status' => true,
                'message' => 'Data ditemukan',
                'data' => $data
            ], 200);
        }
        else{
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dataMovie = Movie::find($id);
        if(empty($dataMovie)){
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $rules = [
            'judul' => 'required',
            'tahun' => 'required',
            'sinopsis' => 'required'
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => 'Gagal melakukan update data',
                'data'=>$validator->errors()
            ]);
        }

        $dataMovie->judul = $request->judul;
        $dataMovie->tahun = $request->tahun;
        $dataMovie->sinopsis = $request->sinopsis;

        $post = $dataMovie->save();

        return response()->json([
            'status' => true,
            'message' => 'Sukses melakukan update data'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dataMovie = Movie::find($id);
        if(empty($dataMovie)){
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $post = $dataMovie->delete();

        return response()->json([
            'status' => true,
            'message' => 'Sukses menghapus data'
        ]);
    }
}
