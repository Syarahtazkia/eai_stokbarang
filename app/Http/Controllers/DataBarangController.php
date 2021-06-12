<?php

namespace App\Http\Controllers;
use App\Models\DataBarang;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class DataBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $databarang = DataBarang::get();
        $response = [
            'message' => 'Show Data',
            'data' => $databarang
        ];
        return response()->json($response, Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $databarang = DataBarang::create($request->all());
            $response = [
                'message' => 'Data Penyimpanan Barang berhasil disimpan!',
                'data' => $databarang
            ];
            return response()->json($response, Response::HTTP_CREATED);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Data Gagal di Simpan ' . $e->errorinfo
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $databarang = DataBarang::findorFail($id);
        $response = [
            'message' => "Show Data By ID ",
            'data' => $databarang
        ];
        return response()->json($response, Response::HTTP_OK);
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
        $databarang = DataBarang::findorFail($id);
        try {
            $databarang->update($request->all());
            $response = [
                'message' => 'Data Barang Berhasil di Perbarui!',
                'data' => $databarang
            ];
            return response()->json($response, Response::HTTP_CREATED);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Data Gagal di Perbarui ' . $e->errorinfo
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deldatabarang =DataBarang::findorFail($id);
        try {
            $deldatabarang->delete();
            $response = [
                'message' => 'Data Berhasil di Hapus!'
            ];
            return response()->json($response , Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed to delete data!' . $e->errorInfo
            ]);
        }
    }
}
