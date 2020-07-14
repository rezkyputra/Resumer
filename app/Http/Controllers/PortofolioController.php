<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\portofolio;
use Illuminate\Support\Facades\Validator;

class PortofolioController extends Controller
{
    //get All
    public function index()
    {
        $portofolio = portofolio::with('user')->get();
        return response([
            'success' => true,
            'message' => 'List Semua data portofolio',
            'data' => $portofolio
        ], 200);
    }

    //get by Id
    public function show($id)
    {
        $portofolio = portofolio::with('user')->find($id);

        return response([
            'success' => true,
            'message' => 'List Portofolio Berdasarkan Id',
            'data' => $portofolio
        ], 200);
    }

    //get by Id User
    public function showUser($id)
    {
        $portofolio = portofolio::with('user')->where('userId', $id)->get();

        return response([
            'success' => true,
            'message' => 'List Portofolio Berdasarkan UserId',
            'data' => $portofolio
        ], 200);
    }

    //Add portofolio
    public function store(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'name'  => 'required',
            'img'  => 'required',
            'linkDemo'  => 'required',
            'linkRepo'  => 'required',
            'desc'  => 'required',
            'userId'      => 'required',
        ], 
            [
                'name.required' => 'Masukkan Nama Portofolio!',
                'img.required' => 'Masukkan Gambar Portofolio!',
                'linkDemo.required' => 'Masukkan LinkDemo!',
                'linkRepo.required' => 'Masukkan linkRepo!',
                'desc.required' => 'Masukkan Keterangan!',
                'userId.required' => 'Masukkan userId !',
            ]
        );
        if($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ],400);

        } else {

            $portofolio = portofolio::create([
                'name'     => $req->input('name'),
                'img'     => $req->input('img'),
                'linkDemo'     => $req->input('linkDemo'),
                'linkRepo'     => $req->input('linkRepo'),
                'desc'     => $req->input('desc'),
                'userId'   => $req->input('userId'),
            ]);
            $newportofolio = portofolio::with('user')->find($portofolio->id);


            if ($portofolio) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data Berhasil Disimpan!',
                    'data' => $newportofolio
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Gagal Disimpan!',
                ], 400);
            }
        }
    }

    //Update portofolio
    public function update(Request $req, $id)
    {        
        $validator = Validator::make($req->all(),[
            'name'  => 'required',
            'img'  => 'required',
            'linkDemo'  => 'required',
            'linkRepo'  => 'required',
            'desc'  => 'required',
            'userId'      => 'required',
        ], 
            [
                'name.required' => 'Masukkan Nama Portofolio!',
                'img.required' => 'Masukkan Gambar Portofolio!',
                'linkDemo.required' => 'Masukkan LinkDemo!',
                'linkRepo.required' => 'Masukkan linkRepo!',
                'desc.required' => 'Masukkan Keterangan!',
                'userId.required' => 'Masukkan userId !',
            ]
        );
        if($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ],400);

        } else {

            $portofolio = portofolio::find($id);
            if (!empty($portofolio)) {
                $portofolio->name = $req->input('name');
                $portofolio->img = $req->input('img');
                $portofolio->linkDemo = $req->input('linkDemo');
                $portofolio->linkRepo = $req->input('linkRepo');
                $portofolio->desc = $req->input('desc');
                $portofolio->userId = $req->input('userId');
                $portofolio->update();        
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Tidak Ditemukan'
                ], 404);
            }
            
            $newportofolio = portofolio::with('user')->find($portofolio->id);

            if ($portofolio) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data Berhasil Diubah!',
                    'data' => $newportofolio
                ], 200);            
            }else {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Gagal Diubah!',
                ], 400);
            }
        }
    }

    //Delete portofolio
    public function delete($id)
    {
        $portofolio = portofolio::find($id);
        if (!empty($portofolio)) {
            $portofolio->delete();
            return response()->json([
                'success' => true,
                'message' => 'Data Berhasil Dihapus!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Tidak Ditemukan!',
            ], 404);
        }
    }
}
