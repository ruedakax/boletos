<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    //
    protected $table = 'eventos';
    protected $fillable = ['nombre','aforo'];
    
    public function asignaciones()
    {
        return $this->hasMany('App\Asignacion');
    }
}
