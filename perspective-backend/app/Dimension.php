<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dimension extends Model
{
    //

    public function left(){
        return $this->belongsTo(Direction::class, 'direction_left_id');
    }

    public function right(){
        return $this->belongsTo(Direction::class, 'direction_right_id');
    }
}
