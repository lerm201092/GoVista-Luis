<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Paciente extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'patients';

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
    protected $fillable = ['id', 'tipodoc', 'numdoc', 'name1', 'name2', 'surname1', 'surname2', 'email', 'birthdate',
        'sex', 'id_eps', 'address', 'phone', 'id_area', 'zone', 'contact_names', 'contact_surnames', 'contact_phone',
        'contact_city', 'father_name', 'father_surname', 'father_phone', 'father_email', 'mother_name', 'mother_surname',
        'mother_phone', 'mother_email', 'id_empresa', 'id_user', 'state', 'coin', 'star', 'created_user','updated_user'];

        

    //********************     NOMBRE DEL PACIENTE       **************
    public static function NombrePaciente($PacienteId){
        $resp = DB::select('select name1, surname1 from patients where id = ? ', [$PacienteId]);
        $NombrePaciente = $resp[0]->name1." ".$resp[0]->surname1;
        return $NombrePaciente;
    }

}
