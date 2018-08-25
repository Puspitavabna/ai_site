<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizResult extends Model
{

    public function topic()
    {
        return $this->hasMany('App\Models\QuizTopic');
    }
}