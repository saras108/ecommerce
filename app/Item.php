<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

        protected $fillable = [
        'store_id','brand_name','print','size',
        'cost', 'color','description', 'images','status','display'];
}
