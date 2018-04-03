<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActorPivot extends Model
{
    protected $table = 'matter_actor_lnk';
    public $timestamps = false;
    protected $hidden = ['creator', 'updated', 'updater'];
    protected $guarded = ['id', 'creator', 'updated', 'updater'];
}
