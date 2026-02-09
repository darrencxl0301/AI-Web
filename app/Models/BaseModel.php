<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    protected $fillable = ['name', 'slug', 'provider', 'description', 'is_active'];
}