<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Process;

class AudioConverterController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function convert(Request $request)
    {
        $request->validate([
            'audio_file' => 'required|mimes:audio/mpeg,audio/wav '
        ]);

        $file = $request->file('audio_file');
        $fileName = 'converted_' . time() . '.mp3';

        $process = new Process([
            'ffmpeg',
            '-i', $file->getPathname(),
            '-codec:a', 'libmp3lame',
            Storage::path($fileName)
        ]);
        $process->run();

        return view('result', ['fileName' => $fineName]);
    }

    public function download($fileName)
    {
        $path = Storage::path($fileName);
        return response()->download($path);
    }
}
