<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;

class PhotoController extends Controller
{
    public function create($album_id) {
      return view('photos.create')->with('album_id', $album_id);
    }

    public function store(Request $request) {
      $this->validate($request, [
        'title'          =>  'required',
        'description'    =>  'required',
        'photo'   =>  'image|max:2999'
      ]);

      // Save Image

      // Get filename with extension
      $filenameWithExt = $request->file('photo')->getClientOriginalName();
      // Get just filename without extension
      $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
      // Get image extension
      $ext = $request->file('photo')->getClientOriginalExtension();
      // Create new filename
      $filenameToStore = $filename.'_'.time().'.'.$ext;
      // Upload image
      $path = $request->file('photo')->storeAs('public/photos/'.$request->input('album_id'), $filenameToStore);

      // Create Album
      $photo = new Photo;

      $photo->album_id = $request->input('album_id');
      $photo->title = $request->input('title');
      $photo->description = $request->input('description');
      $photo->size = $request->file('photo')->getClientSize();
      $photo->photo = $filenameToStore;

      $photo->save();
      return redirect('/albums/'.$request->input('album_id'))->with('success', 'Photo uploaded');
    }
}
