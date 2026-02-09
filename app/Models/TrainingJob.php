<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingJob extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'base_model_id',
        'dataset_id',
        'job_name',
        'status',
        'hyperparameters',
        'progress',
        'fine_tuned_model_path',
        'started_at',
        'scheduled_duration',
        'error_message',
        'is_published',
        'admin_api_key',
        'system_prompt',
        'user_prompt',
    ];

    protected $casts = [
        'started_at' => 'datetime',
        'hyperparameters' => 'array',
    ];

    

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function baseModel() {
        return $this->belongsTo(BaseModel::class);
    }

    public function dataset() {
        return $this->belongsTo(Dataset::class);
    }
    // app/Models/TrainingJob.php


    public function calculateProgress()
    {
        if ($this->status !== 'running' || !$this->started_at || !$this->scheduled_duration) {
            return $this->progress;
        }

        preg_match('/(\d+)h\s+(\d+)m/', $this->scheduled_duration, $matches);
        $totalSeconds = ($matches[1] * 3600) + ($matches[2] * 60);

        if ($totalSeconds <= 0) return 100;

        $elapsedSeconds = $this->started_at->diffInSeconds(now());

        $percentage = round(($elapsedSeconds / $totalSeconds) * 100);

        return min($percentage, 99); 
    }
    // app/Models/TrainingJob.php

    


    // app/Models/TrainingJob.php

    protected $appends = ['total_seconds', 'remaining_seconds', 'current_epoch'];

    // app/Models/TrainingJob.php

    public function getTotalSecondsAttribute()
    {
        $duration = $this->scheduled_duration;
        if (!$duration) return 0;

        $hours = 0;
        $minutes = 0;

        if (preg_match('/(\d+)\s*h/i', $duration, $hMatches)) {
            $hours = (int)$hMatches[1];
        }
        if (preg_match('/(\d+)\s*m/i', $duration, $mMatches)) {
            $minutes = (int)$mMatches[1];
        }

        return ($hours * 3600) + ($minutes * 60);
    }

    public function getRemainingSecondsAttribute()
    {
        if (!$this->started_at || !$this->scheduled_duration) return 0;
        $elapsed = $this->started_at->diffInSeconds(now());
        $remaining = $this->total_seconds - $elapsed;
        return $remaining > 0 ? (int)$remaining : 0;
    }

    public function getCurrentEpochAttribute()
    {
        if ($this->status !== 'running' || !$this->started_at) return 1;
        $totalEpochs = $this->hyperparameters['epochs'] ?? 3;
        $totalSec = $this->total_seconds;
        if ($totalSec <= 0) return 1;

        $elapsed = $this->started_at->diffInSeconds(now());
        $epoch = floor($elapsed / ($totalSec / $totalEpochs)) + 1;
        return min($epoch, $totalEpochs);
    }
}