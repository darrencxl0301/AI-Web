<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dataset;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DatasetController extends Controller
{
    public function index(Request $request)
    {
        $query = Dataset::with('user');

        if (auth()->user()->isAdmin()) {
           
            if ($request->has('user_id')) {
                $query->where('user_id', $request->user_id);
            }
           
        } else {
            
            $query->where('user_id', auth()->id());
        }

        $files = $query->latest()->get();

        return view('data-upload', compact('files'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:51200', 
            'usage_type' => 'required|in:fine-tune,rag', 
        ]);

        $uploadedFile = $request->file('file');
        $filename = time() . '_' . $uploadedFile->getClientOriginalName();
        $path = $uploadedFile->storeAs('datasets', $filename, 'public');

        $dataset = Dataset::create([
            'user_id' => Auth::id(),
            'file_name' => $uploadedFile->getClientOriginalName(),
            'file_path' => $path,
            'file_type' => $uploadedFile->getClientMimeType(),
            'file_size' => $uploadedFile->getSize(),
            'usage_type' => $request->usage_type,
            'status' => 'pending',
        ]);

        if (str_contains($dataset->file_type, 'pdf')) {
            $dataset->update(['status' => 'processing']);
        }

        return response()->json([
            'message' => 'File uploaded successfully',
            'dataset' => $dataset,
            'formatted_size' => $dataset->formatted_size
        ]);
    }
    
    public function download(Dataset $dataset) {
        $path = $dataset->preprocessed_path ?? $dataset->file_path; 
        return Storage::download($path, $dataset->file_name);
    }
}