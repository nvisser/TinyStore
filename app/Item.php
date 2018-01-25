<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'price',
    ];

    /**
     * This really ought to be an integer in the JSON output.
     *
     * @var array
     */
    protected $casts = ['price' => 'int'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [

    ];
}