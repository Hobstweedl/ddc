<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Note extends Model
{
    protected $guarded = [];

    public function notable()
    {
        return $this->morphTo();
    }

    public function createdFriendlyDateTime(Note $note)
    {
        return (Carbon::parse($note->created_at)->format('D\, M\. jS Y g:ia'));
    }
}
