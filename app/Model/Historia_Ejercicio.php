<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Historia_Ejercicio extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'history_exercises';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_history', 'id_exercise', 'observation', 'duration', 'session', 'session_ok', 'frequency', 'screen',
        'screen_left', 'screen_right','size', 'status', 'created_user','updated_user'];

}
