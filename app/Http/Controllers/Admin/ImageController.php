<?php

namespace App\Http\Controllers\Admin;

use App\Models\Image;
use Illuminate\Http\Request;
use App\Models\PartenaireLogo;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::select('id', 'name', 'path')->get();
        $logos = PartenaireLogo::all();
        return view('admin.pages.images', compact('images', 'logos'));
    }

    public function store(Request $request)
    {
        $image = Image::find($request->image_id);
        if (File::exists(public_path($image->path))) {
            File::delete(public_path($image->path));
        }
        $image->update(['path' => '']);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->extension();
            $destinationPath = 'assets/images/site/';
            $img = $image;
            $image->update([
                'path' => $destinationPath . '/' . $img->id . '.' . $ext
            ]);

            $request->file('image')->move($destinationPath, $img->id . '.' . $ext);

            return back()
                ->with('success', 'Image Upload successful');
        }
        return back()->with('error', 'Erreur survenue');
    }
}
