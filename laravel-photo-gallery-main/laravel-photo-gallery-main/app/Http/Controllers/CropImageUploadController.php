<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use App\Models\Album;
use App\Models\User;
use Illuminate\Http\Request;

class CropImageUploadController extends Controller
{
  
    
    public function showToCropImage(Album $album, $id)
    {
        $media = $album->getMedia();
        
        $image = $media->where('id', $id)->first();
        
        return view('albums.image-crop', compact('album', 'image'));
    }


  public function cropImage(Request $request, Album $album, $imageId)
    {
        // Get the cropped image file from the request
        $croppedImageFile = $request->file('croppedImage');

        // Save the cropped image to the media collection
        $album->addMedia($croppedImageFile)->toMediaCollection();

        return response()->json(['success' => true]);
    }



}