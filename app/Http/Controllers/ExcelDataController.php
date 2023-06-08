<?php

namespace App\Http\Controllers;

use App\Http\Requests\JsonCreateFromRequest;
use App\Jobs\ProcessJsonToExcelJob;
use Illuminate\Contracts\View\View;

class ExcelDataController extends Controller
{
    public function index(): View
    {
        if (auth()->user()) {
            $excels = auth()->user()->excels()->get();

            return view('excel', ['excels' => $excels]);
        }

        abort(404);
    }

    public function convert(JsonCreateFromRequest $request): View
    {
        ProcessJsonToExcelJob::dispatch(file_get_contents($request->json), $request->file_name, auth()->id());

        return view('success');
    }
}
