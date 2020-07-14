<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\education;
use Illuminate\Support\Facades\Validator;

class EducationController extends Controller
{
    //get All
    public function index()
    {
        $education = education::with('user')->get();
        return response([
            'success' => true,
            'message' => 'List Semua data Pendidikan',
            'data' => $education
        ], 200);
    }

    //get by Id
    public function show($id)
    {
        $education = education::with('user')->find($id);

        return response([
            'success' => true,
            'message' => 'List Pendidikan Berdasarkan Id',
            'data' => $education
        ], 200);
    }

     //get by Id User
     public function showUser($id)
     {
         $education = education::with('user')->where('userId', $id)->get();
 
         return response([
             'success' => true,
             'message' => 'List Pendidikan Berdasarkan UserId',
             'data' => $education
         ], 200);
     }

    //Add Education
    public function store(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'name'      => 'required',
            'majors'   => 'required',
            'startDate'  => 'required',
            'endDate'    => 'required',
            'userId'    => 'required',  
        ], 
            [
                'name.required' => 'Masukkan Nama Pendidkan !',
                'majors.required' => 'Masukkan Jurusan Pendidikan !',
                'startDate.required' => 'Masukkan Tanggal Mulai Pendidikan !',
                'endDate.required' => 'Masukkan Tanggal Tamat Pendidikan !',
                'userId.required' => 'Masukkan userId Pendidikan !',
            ]
        );
        if($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ],400);

        } else {

            $education = education::create([
                'name'     => $req->input('name'),
                'majors'   => $req->input('majors'),
                'startDate'   => $req->input('startDate'),
                'endDate'   => $req->input('endDate'),
                'userId'   => $req->input('userId'),
            ]);
            $neweducation = education::with('user')->find($education->id);


            if ($education) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data Pendidikan Berhasil Disimpan!',
                    'data' => $neweducation
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Pendidikan Gagal Disimpan!',
                ], 400);
            }
        }
    }

    //Update Education
    public function update(Request $req, $id)
    {        
        $validator = Validator::make($req->all(),[
            'name'      => 'required',
            'majors'   => 'required',
            'startDate'  => 'required',
            'endDate'    => 'required',
            'userId'    => 'required',  
        ], 
            [
                'name.required' => 'Masukkan Nama Pendidkan !',
                'majors.required' => 'Masukkan Jurusan Pendidikan !',
                'startDate.required' => 'Masukkan Tanggal Mulai Pendidikan !',
                'endDate.required' => 'Masukkan Tanggal Tamat Pendidikan !',
                'userId.required' => 'Masukkan userId Pendidikan !',
            ]
        );
        if($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ],400);

        } else {

            $education = education::find($id);
            if (!empty($education)) {
                $education->name = $req->input('name');
                $education->majors = $req->input('majors');
                $education->startDate = $req->input('startDate');
                $education->endDate = $req->input('endDate');
                $education->userId = $req->input('userId');
                $education->update();        
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Tidak Ditemukan'
                ], 404);
            }
            
            $neweducation = education::with('user')->find($education->id);

            if ($education) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data Pendidikan Berhasil Diubah!',
                    'data' => $neweducation
                ], 200);            
            }else {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Pendidikan Gagal Diubah!',
                ], 400);
            }
        }
    }

    //Delete Education
    public function delete($id)
    {
        $education = education::find($id);
        if (!empty($education)) {
            $education->delete();
            return response()->json([
                'success' => true,
                'message' => 'Data Pendidikan Berhasil Dihapus!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Tidak Ditemukan!',
            ], 404);
        }
    }
}
