<?php

namespace App\Http\Controllers;

use App\Jobs\ImportDataProcess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;

class UploadDataController extends Controller
{
    public function index()
    {
        return view("welcome");
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv',
        ]);

        $data = file($request->file("file"));

        $chunks = array_chunk($data, 1000);

        $header = [];
        $batch  = Bus::batch([])->dispatch();

        foreach ($chunks as $key => $chunk) {
            $data = array_map('str_getcsv', $chunk);

            if ($key === 0) {
                $header = $data[0];
                unset($data[0]);
            }

            $batch->add(new ImportDataProcess($data, $header));
        }

        return $batch;
    }

    public function batch()
    {
        $batchId = request('id');
        return Bus::findBatch($batchId);
    }
}
