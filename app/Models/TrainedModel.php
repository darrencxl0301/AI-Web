<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainedModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'base_model_id',
        'status',
    ];
}

