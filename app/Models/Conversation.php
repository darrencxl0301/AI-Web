<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;

    protected $fillable = [
        'model_name',
        'user_message',
        'ai_response',
        'session_id',
        'metadata'
    ];

    protected $casts = [
        'metadata' => 'array'
    ];

    public function getResponseTimeAttribute()
    {
        return $this->metadata['response_time'] ?? null;
    }

    public function getTokensUsedAttribute()
    {
        return $this->metadata['tokens_used'] ?? null;
    }
}