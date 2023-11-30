<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
    use HasFactory;

    protected $with = ['user'];

    protected $fillable = [
        'email'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
