<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coffee extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'coffee';

    public function addToCartsUser(){
       return $this->belongsToMany(User::class);
    }

    public function count():Attribute
    {
        return Attribute::make(
            get:fn(string $value) => (int) $value
        );
    }
}
