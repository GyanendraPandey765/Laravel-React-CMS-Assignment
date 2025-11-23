<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Media;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class MediaController extends Controller
{
    // GET /media
    public function index()
    {
        return response()->json(Media::latest()->get());
    }

    // POST /media/upload
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:20480'  // 20MB
        ]);

        $file = $request->file('file');

        // store file
        $path = $file->store('uploads', 'public');

        // save in database
        $media = Media::create([
            'filename'      => basename($path),
            'original_name' => $file->getClientOriginalName(),
            'mime_type'     => $file->getClientMimeType(),
            'size'          => $file->getSize(),
            'path'          => $path,
            'user_id'       => Auth::id(),
        ]);

        return response()->json([
            'message' => 'Uploaded successfully',
            'media'   => $media
        ]);
    }

    // DELETE /media/{media}
    public function destroy(Media $media)
    {
        Storage::disk('public')->delete($media->path);
        $media->delete();

        return response()->json(['message' => 'Media deleted successfully']);
    }
}
