<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;

class AlbumController extends Controller
{
    public function index() {
      $data = array(
        'title'    =>    'Gallery Albums',
        'albums'   =>    Album::with('Photos')->get()
      );
      return view('albums.index')->with($data);
    }

    public function create() {
      return view('albums.create')->with('title', 'Create Album');
    }

    public function store(Request $request) {
      $this->validate($request, [
        'name'          =>  'required',
        'decription'    =>  'required',
        'cover_image'   =>  'image|max:2999'
      ]);

      // Save Image

      // Get filename with extension
      $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
      // Get just filename without extension
      $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
      // Get image extension
      $ext = $request->file('cover_image')->getClientOriginalExtension();
      // Create new filename
      $filenameToStore = $filename.'_'.time().'.'.$ext;
      // Upload image
      $path = $request->file('cover_image')->storeAs('public/album_covers', $filenameToStore);

      // Create Album
      $album = new Album;

      $album->name = $request->input('name');
      $album->description = $request->input('description');
      $album->cover_image = $filenameToStore;

      $album->save();
      return redirect('/albums')->with('success', 'Album created');
    }

    public function show($id) {
      $data = array(
        'title'    =>  'Mercedes-Benz',
        'album'    =>  Album::with('Photos')->find($id)
      );
      return view('albums.show')->with($data);
    }
}
