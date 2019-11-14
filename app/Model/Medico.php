<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Medico extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'medicos';

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
    protected $fillable = ['id', 'name', 'address', 'specialty', 'phone', 'email', 'id_empresa', 'id_area', 'estado','created_user','updated_user'];

    public static function InfoMedico($id_user){
        $resp = DB::select('select id, name from medicos where id_user = ? ', [$id_user]);        
        $medico = array( 'id' => $resp[0]->id, 'nombre' => $resp[0]->name );
        return $medico;
    }
}
