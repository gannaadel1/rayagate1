<?php 
namespace App\Http\Traits\Api;
use Illuminate\Support\Facades\Storage;

trait UploadMedia{
    public static function upload($fileValidated,$path){
        $vidName = rand(1,100000). now()->format('YmdHis') .$fileValidated->getClientOriginalName();
        return $fileValidated->storeAs($path, $vidName, 'public');
    }
    public static function updateMedia($media,$path,$storagePath)
    {
        $storagePath='public/'.$storagePath;
        if(Storage::exists($storagePath)){
            Storage::delete($storagePath);
        }
        return self::upload($media, $path);
    }
    public static function deleteMedia($storagePath)
    {
        $storagePath='public/'.$storagePath;
        if(Storage::exists($storagePath)){
            Storage::delete($storagePath);
        }
    }
} 
