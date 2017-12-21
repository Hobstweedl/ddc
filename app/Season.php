<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Season extends Model
{
    use \Rutorika\Sortable\SortableTrait;

    protected static $sortableField = 'Order';
	protected $guarded = [];
	
    public function classes()
    {
    	return $this->hasMany(Classes::class);
    }

    public function sessions()
    {
        return $this->belongsToMany(Session::class);
    }

    public function archive()
    {
        $this->update(['Archived' => 1]);
    }

    public function isArchived()
    {
        if ($this->Archived == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function canEdit()
    {
        if ($this->classes->count() > 0) {
            return false;
        } else {
            return true;
        }
    }
}
