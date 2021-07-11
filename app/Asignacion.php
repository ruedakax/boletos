<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignacion extends Model
{
    //
    protected $table = 'asignaciones';
    protected $fillable = ['users_id','evento_id','boleta'];

    public function usuarios()
    {
        return $this->belongsTo('App\User');
    }

    public function eventos()
    {
        return $this->belongsTo('App\Evento');
    }
}
