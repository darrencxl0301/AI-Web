<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dataset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminDatasetController extends Controller
{

    public function updateStatus(Request $request, Dataset $dataset)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,completed,rejected',
            'admin_note' => 'nullable|string|max:1000',
            'preprocessed_file' => 'nullable|file|max:51200',
        ]);

        $updateData = [
            'status' => $request->status,
            'admin_note' => $request->admin_note,
        ];

        if ($request->hasFile('preprocessed_file')) {
            if ($dataset->preprocessed_path) {
                Storage::delete($dataset->preprocessed_path);
            }
            $path = $request->file('preprocessed_file')->store('datasets/preprocessed');
            $updateData['preprocessed_path'] = $path;
            
            $dataset->preprocessed_path = $path; 
        }

        $dataset->update($updateData);

        if ($request->status === 'completed' && $dataset->usage_type === 'rag') {
            
            $targetFile = storage_path('app/' . ($dataset->preprocessed_path ?? $dataset->file_path));
            $outputDir = storage_path('app/public/rag_indices/');
            $scriptPath = base_path('scripts/rag_processor.py'); 

            if (!file_exists($outputDir)) mkdir($outputDir, 0777, true);

            $command = "python \"{$scriptPath}\" \"{$targetFile}\" \"{$outputDir}\"";
            
            $result = \Illuminate\Support\Facades\Process::run($command);

            if ($result->successful()) {
                $indexName = 'public/rag_indices/' . $dataset->id . '.index';
                $dataset->update(['preprocessed_path' => $indexName]);
                
                \Log::info("RAG Index created: " . $indexName);
            }
        }

        return back()->with('success', "Dataset updated and synchronized.");
    }

    public function downloadOriginal(Dataset $dataset)
    {
        if (!Storage::exists($dataset->file_path)) {
            return back()->with('error', 'Original file not found on server.');
        }

        return Storage::download($dataset->file_path, "RAW_" . $dataset->file_name);
    }
}