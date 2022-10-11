<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentController extends Controller
{

    public function downloadfile($fileID)
    {

        $file = storage_path('tqf/' . $fileID);
        return response()->download($file);
    }
}
