<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// 🚀 添加下面这一行
use Illuminate\Support\Facades\Storage; 

class Dataset extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'file_name', 
        'file_path', 
        'file_type', 
        'file_size',
        'usage_type',    
        'status', 
        'admin_note', 
        'preprocessed_path'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function getActiveFilePathAttribute()
    {
        return $this->preprocessed_path ?? $this->file_path;
    }

    public function getFormattedSizeAttribute()
    {
        $path = $this->active_file_path;
        
        if (!$path || !Storage::exists($path)) return 'N/A';
        
        $bytes = Storage::size($path);
        $units = ['B', 'KB', 'MB', 'GB'];
        for ($i = 0; ($bytes > 1024 && $i < count($units) - 1); $i++) $bytes /= 1024;
        return round($bytes, 2) . ' ' . $units[$i];
    }
}