<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\exprience;
use Illuminate\Support\Facades\Validator;

class ExprienceController extends Controller
{
    //get All
    public function index()
    {
        $exprience = exprience::with('user')->get();
        return response([
            'success' => true,
            'message' => 'List Semua data Pengalaman',
            'data' => $exprience
        ], 200);
    }

    //get by Id
    public function show($id)
    {
        $exprience = exprience::with('user')->find($id);

        return response([
            'success' => true,
            'message' => 'List Pengalaman Berdasarkan Id',
            'data' => $exprience
        ], 200);
    }

    //get by Id User
    public function showUser($id)
    {
        $exprience = exprience::with('user')->where('userId', $id)->get();

        return response([
            'success' => true,
            'message' => 'List Pengalan Berdasarkan UserId',
            'data' => $exprience
        ], 200);
    }

    //Add exprience
    public function store(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'jobTitle'      => 'required',
            'type'   => 'required',
            'company'   => 'required',
            'startDate'  => 'required',
            'endDate'    => 'required',
            'userId'    => 'required',  
        ], 
            [
                'jobTitle.required' => 'Masukkan Nama Pekerjaan !',
                'type.required' => 'Masukkan type Pekerjaan !',
                'company.required' => 'Masukkan Nama Perusahaan !',
                'startDate.required' => 'Masukkan Tanggal Mulai Pekerjaan !',
                'endDate.required' => 'Masukkan Tanggal Tamat Pekerjaan !',
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

            $exprience = exprience::create([
                'jobTitle'     => $req->input('jobTitle'),
                'type'   => $req->input('type'),
                'company'   => $req->input('company'),
                'startDate'   => $req->input('startDate'),
                'endDate'   => $req->input('endDate'),
                'userId'   => $req->input('userId'),
            ]);
            $newexprience = exprience::with('user')->find($exprience->id);


            if ($exprience) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data Pengalaman Berhasil Disimpan!',
                    'data' => $newexprience
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Pengalaman Gagal Disimpan!',
                ], 400);
            }
        }
    }

    //Update exprience
    public function update(Request $req, $id)
    {        
        $validator = Validator::make($req->all(),[
            'jobTitle'      => 'required',
            'type'   => 'required',
            'company'   => 'required',
            'startDate'  => 'required',
            'endDate'    => 'required',
            'userId'    => 'required',  
        ], 
            [
                'jobTitle.required' => 'Masukkan Nama Pekerjaan !',
                'type.required' => 'Masukkan type Pekerjaan !',
                'company.required' => 'Masukkan Nama Perusahaan !',
                'startDate.required' => 'Masukkan Tanggal Mulai Pekerjaan !',
                'endDate.required' => 'Masukkan Tanggal Tamat Pekerjaan !',
                'userId.required' => 'Masukkan userId Pekerjaan !',
            ]
        );
        if($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ],400);

        } else {

            $exprience = exprience::find($id);
            if (!empty($exprience)) {
                $exprience->jobTitle = $req->input('jobTitle');
                $exprience->type = $req->input('type');
                $exprience->company = $req->input('company');
                $exprience->startDate = $req->input('startDate');
                $exprience->endDate = $req->input('endDate');
                $exprience->userId = $req->input('userId');
                $exprience->update();        
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Tidak Ditemukan'
                ], 404);
            }
            
            $newexprience = exprience::with('user')->find($exprience->id);

            if ($exprience) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data Pengalaman Berhasil Diubah!',
                    'data' => $newexprience
                ], 200);            
            }else {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Pengalaman Gagal Diubah!',
                ], 400);
            }
        }
    }

    //Delete exprience
    public function delete($id)
    {
        $exprience = exprience::find($id);
        if (!empty($exprience)) {
            $exprience->delete();
            return response()->json([
                'success' => true,
                'message' => 'Data Pengalaman Berhasil Dihapus!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Tidak Ditemukan!',
            ], 404);
        }
    }
}
