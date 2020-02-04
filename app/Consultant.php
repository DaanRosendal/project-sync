<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consultant extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    protected $fillable = ["name", "email", "password"];
}
