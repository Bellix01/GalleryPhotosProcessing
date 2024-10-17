<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Album;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class imgDownloadController extends Controller
{
    public function download(Album $album, $id)
    {
        $media = $album->getMedia()->find($id);

        if (!$media) {
            abort(404); // Media item not found
        }

        $imageId = $media->id;
        $imageName = $media->file_name;

        $filePath = 'storage/'  . $imageId . '/' . $imageName;
    
        return response()->download(public_path($filePath), $imageName);

        return redirect()->route('albums.show');
    }
}
