<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BroughtItem extends Model
{
    protected $dates = [
    'created_at',
    'updated_at',
    // your other new column
];
}
