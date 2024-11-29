<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class DataController extends Controller
{
    function dataTampil(){
        $pythonPath = env('PYTHON_PATH', 'python'); // Default ke 'python' jika tidak ada di .env

        $process = new Process([$pythonPath, 'kode_python/read_csv.py', 'kode_python/pizza_sales.csv']);
        $process->run();

        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        $result = json_decode($process->getOutput(), true);

        return view('lihat_data', $result);
    }
}
