<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\award;
use Illuminate\Support\Facades\Validator;

class AwardController extends Controller
{
    
    //get All
    public function index()
    {
        $awards = award::with('users')->get();
        return response([
            'success' => true,
            'message' => 'List Semua Award',
            'data' => $awards
        ], 200);
    }

    //get by Id
    public function show($id)
    {
        $award = award::with('users')->find($id);

        return response([
            'success' => true,
            'message' => 'List Award Berdasarkan Id',
            'data' => $award
        ], 200);
    }

    //get by Id User
    public function showUser($id)
    {
        $award = award::with('users')->where('userId', $id)->get();
        return response([
            'success' => true,
            'message' => 'List Award Berdasarkan USerId',
            'data' => $award
        ], 200);
    }

    //AddAward
    public function store(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'name'      => 'required',
            'company'   => 'required',
            'startDate'  => 'required',
            'endDate'    => 'required',
            'userId'    => 'required',  
        ], 
            [
                'name.required' => 'Masukkan Name Award !',
                'company.required' => 'Masukkan Company Award !',
                'startDate.required' => 'Masukkan dari tanggal !',
                'endDate.required' => 'Masukkan Sampai tanggal !',
                'userId.required' => 'Masukkan UserId Award !',
            ]
        );
        if($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ],400);

        } else {

            $award = award::create([
                'name'     => $req->input('name'),
                'company'   => $req->input('company'),
                'startDate'   => $req->input('startDate'),
                'endDate'   => $req->input('endDate'),
                'userId'   => $req->input('userId'),
            ]);
            $newaward = award::with('users')->find($award->id);


            if ($award) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data Award Berhasil Disimpan!',
                    'data' => $newaward
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Award Gagal Disimpan!',
                ], 400);
            }
        }
    }

    //Update Award
    public function update(Request $req, $id)
    {        
        $validator = Validator::make($req->all(),[
            'name'      => 'required',
            'company'   => 'required',
            'startDate'  => 'required',
            'endDate'    => 'required',
            'userId'    => 'required',  
        ], 
            [
                'name.required' => 'Masukkan Name Award !',
                'company.required' => 'Masukkan Company Award !',
                'startDate.required' => 'Masukkan dari Tanngal !',
                'endDate.required' => 'Masukkan sampai Tanggal !',
                'userId.required' => 'Masukkan UserId Award !',
            ]
        );
        if($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ],400);

        } else {

            $award = award::find($id);
            if (!empty($award)) {
                $award->name = $req->input('name');
                $award->company = $req->input('company');
                $award->startDate = $req->input('startDate');
                $award->endDate = $req->input('endDate');
                $award->userId = $req->input('userId');
                $award->update();        
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Tidak Ditemukan'
                ], 404);
            }
            
            $newaward = award::with('users')->find($award->id);

            if ($award) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data Award Berhasil Diubah!',
                    'data' => $newaward
                ], 200);            
            }else {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Award Gagal Diubah!',
                ], 400);
            }
        }
    }

    //Delete Award
    public function delete($id)
    {
        $award = award::find($id);
        if (!empty($award)) {
            $award->delete();
            return response()->json([
                'success' => true,
                'message' => 'Data award Berhasil Dihapus!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data award Tidak Ditemukan!',
            ], 404);
        }
    }
}
