<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Declaratie extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'declaraties';

    protected $guarded = [];

    public function consultant(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kosten(){
        return $this->belongsToMany(Kost::class);
    }
}
