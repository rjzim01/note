<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [];
    // protected $guarded = [];

    public function noteCreator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
