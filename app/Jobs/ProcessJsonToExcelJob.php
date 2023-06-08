<?php

namespace App\Jobs;

use App\Models\ExcelData;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Spatie\SimpleExcel\SimpleExcelWriter;

class ProcessJsonToExcelJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public string|false $file,
        public string $fileName,
        public mixed $userId
    ) {
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        if (! $this->file) {
            return;
        }
        try {
            $pathToStoreFile = storage_path('app'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'excels');
            if (! is_dir($pathToStoreFile)) {
                mkdir($pathToStoreFile);
            }

            $jsonData = json_decode($this->file);
            $fileNameWithExtension = Str::random(14).'.xlsx';
            $excel = SimpleExcelWriter::create($pathToStoreFile.DIRECTORY_SEPARATOR.$fileNameWithExtension)
                ->addHeader(['Name', 'Email', 'Phone', 'Address']);

            foreach ($jsonData as $json) {
                $excel->addRow([$json->name, $json->email, $json->phone, $json->address]);
            }

            $excel->close();

            ExcelData::create([
                'user_id' => $this->userId,
                'title' => $this->fileName,
                'file_name' => $fileNameWithExtension,
            ]);
        } catch (\Exception $e) {
            Log::warning('Error while generating excel file. Trace:- '.$e->getMessage());
        }
    }
}
