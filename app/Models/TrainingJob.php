<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingJob extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'model_type',
        'dataset_name',
        'status',
        'progress',
        'loss',
        'accuracy',
        'epochs',
        'batch_size',
        'started_at',
        'completed_at',
        'error_message',
        'metrics'
    ];

    protected $casts = [
        'started_at' => 'datetime',
        'completed_at' => 'datetime',
        'metrics' => 'array'
    ];

    public function getStatusColorAttribute()
    {
        return match($this->status) {
            'completed' => 'success',
            'running' => 'info',
            'failed' => 'error',
            'queued' => 'warning',
            default => 'secondary'
        };
    }

    public function getDurationAttribute()
    {
        if (!$this->started_at || !$this->completed_at) {
            return null;
        }
        
        return $this->started_at->diffForHumans($this->completed_at, true);
    }
}