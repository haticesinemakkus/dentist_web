<?php

namespace App\Traits;

use Storage;

use Illuminate\Http\Request;

trait ImageTrait {

    public static function verifyAndUpload(Request $request, $fieldname = 'image', $directory = 'images' ) {

        if( $request->hasFile( $fieldname ) ) {

            if (!$request->file($fieldname)->isValid()) {
                return null;
            }

            $file = $request->file($fieldname);
			$image = md5(rand(1,999999) . date('ymdhis')) . '.' . strtolower($file->getClientOriginalExtension());
            if(env('APP_ENV') =='dev' || env('APP_ENV') =='local' ){
                $file->move( public_path("upload/$directory"), $image);
            }else{
                Storage::disk('ftp')->put("$directory/" . $image, fopen($file, 'r+'));
            }

            return $image;
        }

        return null;

    }

}
