<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;
    protected $table = 'review';
    protected $fillable = [
        'user_id',
        'komentar',
        'excerpt',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
