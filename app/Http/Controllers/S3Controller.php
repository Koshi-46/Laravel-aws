<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class S3Controller extends Controller
{
   /**
    * S3へのアップロード 
    */
   public function uploadS3(Request $request)
   {

     $request->validate(
            [
                'file' => 'required|file',
            ]
        );

        // S3へファイルをアップロード
        $result = Storage::disk('s3')->put('/', $request->file('file'));

        // アップロードの成功判定
        if ($result) {
            return 'アップロード成功';
        }else {
            return 'アップロード失敗';
        }
   }
}