<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DownloadController extends Controller
{
    public function downloads($filename)
    {
        $path = storage_path('app/public/images/' . $filename);

        if (!File::exists($path)) {
            abort(404);
        }

        $headers = [
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];
        //return redirect()->back();
        return response()->download($path, $filename, $headers);
    }
}
