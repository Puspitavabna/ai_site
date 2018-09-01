<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{

    public function tutorial()
    {
        return $this->belongsTo('App\Models\Tutorial');
    }
}