<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name', 'description', 'github_link', 'languages', 'slug', 'type_id'];
    use HasFactory;

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
