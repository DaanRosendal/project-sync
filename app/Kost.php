<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kost extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'kosten';

    public function declaraties(){
        return $this->belongsToMany(Declaratie::class);
    }
}
