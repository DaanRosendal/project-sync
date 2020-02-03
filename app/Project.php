<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['naam'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'projecten';
}
