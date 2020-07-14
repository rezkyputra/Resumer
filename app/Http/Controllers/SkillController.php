<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\skill;
use Illuminate\Support\Facades\Validator;

class SkillController extends Controller
{
    //get All
    public function index()
    {
        $skill = skill::with('user')->get();
        return response([
            'success' => true,
            'message' => 'List Semua data skill',
            'data' => $skill
        ], 200);
    }

    //get by Id
    public function show($id)
    {
        $skill = skill::with('user')->find($id);

        return response([
            'success' => true,
            'message' => 'List skill Berdasarkan Id',
            'data' => $skill
        ], 200);
    }

    //get by Id User
    public function showUser($id)
    {
        $skill = skill::with('user')->where('userId', $id)->get();

        return response([
            'success' => true,
            'message' => 'List skill Berdasarkan UserId',
            'data' => $skill
        ], 200);
    }

    //Add skill
    public function store(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'name'  => 'required',
            'userId'      => 'required',
        ], 
            [
                'name.required' => 'Masukkan Skill Anda!',
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

            $skill = skill::create([
                'name'     => $req->input('name'),
                'userId'   => $req->input('userId'),
            ]);
            $newskill = skill::with('user')->find($skill->id);


            if ($skill) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data Berhasil Disimpan!',
                    'data' => $newskill
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Gagal Disimpan!',
                ], 400);
            }
        }
    }

    //Update skill
    public function update(Request $req, $id)
    {        
        $validator = Validator::make($req->all(),[
            'name'  => 'required',
            'userId'      => 'required',
        ], 
            [
                'name.required' => 'Masukkan Skill Anda!',
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

            $skill = skill::find($id);
            if (!empty($skill)) {
                $skill->name = $req->input('name');
                $skill->userId = $req->input('userId');
                $skill->update();        
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Tidak Ditemukan'
                ], 404);
            }
            
            $newskill = skill::with('user')->find($skill->id);

            if ($skill) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data Berhasil Diubah!',
                    'data' => $newskill
                ], 200);            
            }else {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Gagal Diubah!',
                ], 400);
            }
        }
    }

    //Delete skill
    public function delete($id)
    {
        $skill = skill::find($id);
        if (!empty($skill)) {
            $skill->delete();
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
