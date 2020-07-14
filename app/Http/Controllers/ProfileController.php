<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\profile;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    //get All
    public function index()
    {
        $profile = profile::with('user')->get();
        return response([
            'success' => true,
            'message' => 'List Semua data profile',
            'data' => $profile
        ], 200);
    }

    //get by Id
    public function show($id)
    {
        $profile = profile::with('user')->find($id);

        return response([
            'success' => true,
            'message' => 'List profile Berdasarkan Id',
            'data' => $profile
        ], 200);
    }

    //get by Id User
    public function showUser($id)
    {
        $profile = profile::with('user')->where('userId', $id)->get();

        return response([
            'success' => true,
            'message' => 'List profile Berdasarkan UserId',
            'data' => $profile
        ], 200);
    }

    //Add profile
    public function store(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'hobby'  => 'required',
            'gender'  => 'required',
            'country'  => 'required',
            'summary' => 'required',
            'address'  => 'required',
            'placeOfBirth'  => 'required',
            'dateOfBirth'  => 'required',
            'userId'      => 'required',
        ], 
            [
                'hobby.required' => 'Masukkan Hobby Anda!',
                'gender.required' => 'Masukkan Jenis Kelamain anda!',
                'country.required' => 'Masukkan Kota Tempat Tingal Anda!',
                'summary.required' => 'Masukkan Rincian Tentang Anda!',
                'address.required' => 'Masukkan Alamat!',
                'placeOfBirth.required' => 'Masukkan Tempat Tinggal Anda !',
                'dateOfBirth.required' => 'Masukkan Tanggal Lahir Anda !',
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

            $profile = profile::create([
                'hobby'     => $req->input('hobby'),
                'gender'     => $req->input('gender'),
                'country'     => $req->input('country'),
                'address'     => $req->input('address'),
                'img'     => $req->input('img'),
                'placeBorn'     => $req->input('placeBorn'),
                'bornDate'     => $req->input('bornDate'),
                'linkGit'     => $req->input('linkGit'),
                'linkFace'     => $req->input('linkFace'),
                'linkLinked'     => $req->input('linkLinked'),
                'linkTwitter'     => $req->input('linkTwitter'),
                'userId'   => $req->input('userId'),
            ]);
            $newprofile = profile::with('user')->find($profile->id);


            if ($profile) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data Berhasil Disimpan!',
                    'data' => $newprofile
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Gagal Disimpan!',
                ], 400);
            }
        }
    }

    //Update profile
    public function update(Request $req, $id)
    {        
        $validator = Validator::make($req->all(),[
            'hobby'  => 'required',
            'gender'  => 'required',
            'country'  => 'required',
            'address'  => 'required',
            'img'  => 'required',
            'placeBorn'  => 'required',
            'bornDate'  => 'required',
            'userId'      => 'required',
        ], 
            [
                'hobby.required' => 'Masukkan Hobby Anda!',
                'gender.required' => 'Masukkan Jenis Kelamain anda!',
                'country.required' => 'Masukkan Kota Tempat Tingal Anda!',
                'address.required' => 'Masukkan Alamat!',
                'img.required' => 'Upload Gambar Anda!',
                'placeBorn.required' => 'Masukkan Tempat Tinggal Anda !',
                'bornDate.required' => 'Masukkan Tanggal Lahir Anda !',
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

            $profile = profile::find($id);
            if (!empty($profile)) {
                $profile->hobby = $req->input('hobby');
                $profile->gender = $req->input('gender');
                $profile->country = $req->input('country');
                $profile->address = $req->input('address');
                $profile->img = $req->input('img');
                $profile->placeBorn = $req->input('placeBorn');
                $profile->bornDate = $req->input('bornDate');
                $profile->linkGit = $req->input('linkGit');
                $profile->linkFace = $req->input('linkFace');
                $profile->linkLinked = $req->input('linkLinked');
                $profile->linkTwitter = $req->input('linkTwitter');
                $profile->userId = $req->input('userId');
                $profile->update();        
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Tidak Ditemukan'
                ], 404);
            }
            
            $newprofile = profile::with('user')->find($profile->id);

            if ($profile) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data Berhasil Diubah!',
                    'data' => $newprofile
                ], 200);            
            }else {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Gagal Diubah!',
                ], 400);
            }
        }
    }

    //Delete profile
    public function delete($id)
    {
        $profile = profile::find($id);
        if (!empty($profile)) {
            $profile->delete();
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
