<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Album;
use App\Models\User;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;


class AlbumController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $albums = Album::all();
        $user = Auth::user();
        $albums=$user->albums;
        return view('albums.index', compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('albums.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Get the currently authenticated user
        $user = Auth::user();
        Album::create([
            'title' => $request->title,
            'user_id'=>$user->id
        ]);
        // // Associate the album with the user

        return redirect()->route('albums.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        $photos = $album->getMedia();
        return view('albums.show', compact('album', 'photos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        return view('albums.edit', compact('album'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Album $album)
    {
        $album->update([
            'title' => $request->title
        ]);
        return redirect()->route('albums.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        $images= $album->getMedia();
        foreach($images as $image){
            deleteData($image->id);
        }
        $album->delete();
        return redirect()->back();
    }

    public function upload(Request $request, Album $album)
    {
        foreach($request->file('image') as $image) {
            $media= $album->addMedia($image)->toMediaCollection();
            $imageUrl= $media->getUrl();
            $imageUrl = str_replace('http://127.0.0.1:8000', '', $imageUrl);
            $mediaId = $media->id;
            $flaskEndpoint = "http://127.0.0.1:5000/store_data";

            $data = array(
                'key1' => $imageUrl,
                'key2' => $mediaId
            );
            $ch = curl_init($flaskEndpoint);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            $response = curl_exec($ch);
            if (curl_errno($ch)) {
                echo 'Curl error: ' . curl_error($ch);
            }
            curl_close($ch);
        }
        return redirect()->back();
    }

    public function showImage(Album $album, $id)
    {
        $media = $album->getMedia();
        $image = $media->where('id', $id)->first();
        return view('albums.image-show', compact('album', 'image'));
    }

    

    public function destroyImage(Album $album, $id)
    {
        $media = $album->getMedia();
        $image = $media->where('id', $id)->first();
        deleteData($id);
        $image->delete();

        return redirect()->back();
    }
    // show page of retrive feedback of an existing image:
    public function showQuery(Album $album, $id)
    {
        $media = $album->getMedia();
        $image = $media->where('id', $id)->first();

        return view('albums.showQueryImg', compact('album', 'image'));
    }

    
    // show page of retrive feedback of a new image:
    public function showToQuery(Album $album)
    {
        $user = Auth::user();
        $albums=$user->albums;
        $ids= [];
        foreach($albums as $dd){
            foreach($dd->getMedia() as $image)
                $ids[]= $image->id;
        }
        $photos='';
        file_put_contents('../datastore/test.txt', json_encode($ids));
        return view('albums.showToQuery', compact('album','photos'));
    }
}
function deleteData($id){
    $content = file_get_contents('../datastore/data.txt');
    $lines = explode("\n", $content);
    $outputLines = [];
    $i = 0;
    while ($i < count($lines)) {
        $line = $lines[$i];
        if (intval($line) == $id) {
            $i += 4;
        } else {
            $outputLines[] = $line;
            $i++;
        }
    }
    $outputContent = implode("\n", $outputLines);
    file_put_contents('../datastore/data.txt', $outputContent);


// function retrieveImages(Album $album)
//     {
//         $content = file_get_contents('../datastore/test.txt');
//         $line = explode("\n", $content);
//         file_put_contents('../datastore/tt.txt', 'ffffff');
//         $media = $album->getMedia();
//         // $photo = $media->where('id', $id)->first();
//         return view('albums.image-show', compact('album', 'photo'));
//     }

function retrieveImages(Album $album)
    {
        $content = file_get_contents('../datastore/test.txt');
        $ids = json_decode($content);

        $photos = [];
        foreach ($ids as $id) {
            $media = $album->getMedia()->where('id', $id)->first();
            if ($media) {
                $photos[] = $media;
            }
        }

        return view('albums.image-show', compact('album', 'photos'));
    }

}
