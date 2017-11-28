<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function family(){
        return $this->belongsTo(Family::class);
    }

    public function gender(){
        if ($this->Sex == 1) {
            return 'F';

        }elseif ($this->Sex == 2) {
            return 'M';
        }
    }
}
