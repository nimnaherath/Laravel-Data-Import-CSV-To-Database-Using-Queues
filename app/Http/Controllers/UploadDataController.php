<?php

namespace App\Http\Controllers;

use App\Jobs\ImportDataProcess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\DB;

class UploadDataController extends Controller
{
    public function index()
    {
        $batches = DB::table('job_batches')->where('pending_jobs', '>', 0)->get();
        if (count($batches) > 0) {
            $id =  Bus::findBatch($batches[0]->id)->id;
            return view("welcome")
                ->with("id", $id);
        }
        else{
            return view("welcome")
                ->with("id", null);
        }
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

        return redirect()->route("view.process");
    }

    public function batch()
    {
        $batchId = request('id');
        return Bus::findBatch($batchId);
    }

    public function viewProcess()
    {
        $batches = DB::table('job_batches')->where('pending_jobs', '>', 0)->get();
        if (count($batches) > 0) {
            $id =  Bus::findBatch($batches[0]->id)->id;
            return view("process")
                ->with("id", $id);
        }
        else{
            return view("process")
                ->with("id", null);
        }
    }
}
