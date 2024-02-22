<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{
    use HasFactory;
    protected $table = 'images';
    protected $fillable = [
        'user_id',
        'url',
    ];

    public function user() {//user yang menginput data image
        return $this->belongsTo(User::class, 'user_id');
    }
}
