<?php

namespace App\Http\Controllers\Modulos;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use App\Model\Medico;
use App\Model\Cita;
use App\Model\Paciente;


class CitasController extends Controller{

    public $id_empresa;

    public function __construct(){    
        $this->middleware('auth');
    } 

    public function beforeVer(Request $request){      
        return redirect()->route('modulos.citas.ver', ['CitaId' => $request->CitaId ? $request->CitaId : '0']);
    }

    public function beforeEditar(Request $request){      
        return redirect()->route('modulos.citas.editar', ['CitaId' => $request->CitaId ? $request->CitaId : '0']);
    }



    public function listar(Request $request){
        $this->id_empresa = Session::get('id_empresa');
        $this->id_user    = Auth::user()->id;
        $id_medico = self::idMedico();

        $keyword = $request->get('search');
        $perPage = 10;


        $citas = Cita::from('appointments as a')
        ->select('a.id', 'a.id_patient', 'a.title', 'a.body', 'a.id_medico', 'a.state', 'a.start', 'a.end', 'm.name', 'p.name1', 'p.surname1')
        ->leftJoin('patients as p', 'a.id_patient', '=', 'p.id')
        ->leftJoin('medicos as m', 'a.id_medico', '=', 'm.id')
        ->where('a.id_empresa', '=', "$this->id_empresa")
        ->where('a.id_medico', '=', $id_medico)
        ->whereIn('a.state',['AC','IC'])
        ->where(function ($query) use($keyword) {
            $query->orWhere('title', 'LIKE', "%$keyword%")
                ->orWhere('m.name', 'LIKE', "%$keyword%")
                ->orWhere('p.name1', 'LIKE', "%$keyword%")
                ->orWhere('p.surname1', 'LIKE', "%$keyword%")
                ->orWhere('start', 'LIKE', "%$keyword%");
        })
        ->paginate($perPage);

        return view('modulos.citas.listar', compact('citas'));
    }

    public function ver( $CitaId){
        $cita = Cita::from('appointments as a')
                ->select('a.id', 'p.tipodoc', 'p.numdoc', 'p.name1', 'p.surname1', 'a.title', 'a.body', 'm.name', 'a.start', 'p.phone')
                ->leftJoin('patients as p', 'a.id_patient', 'p.id')
                ->leftJoin('medicos  as m', 'a.id_medico' , 'm.id')
                ->where('a.id',  '=', $CitaId)
                ->get()->first();
        return view('modulos.citas.ver', compact('cita'));        
    }

    public function editar( $CitaId ){
        $cita = Cita::from('appointments as a')
                ->select('a.id', 'p.tipodoc', 'p.numdoc', 'p.name1', 'p.surname1', 'a.title', 'a.body', 'm.name', 'a.start', 'p.phone')
                ->leftJoin('patients as p', 'a.id_patient', 'p.id')
                ->leftJoin('medicos  as m', 'a.id_medico' , 'm.id')
                ->where('a.id',  '=', $CitaId)
                ->get()->first();
        return view('modulos.citas.editar', compact('cita'));    
    }


    // FUNCION QUE DEVUELVE EL ID DEL MEDICO
    public function idMedico()
    {
        $this->id_empresa = Session::get('id_empresa');
        $data = Medico::select('id')
            ->where('id_user', '=', $this->id_user)
            ->orderBy('name', 'asc')->get();

        if($data->count()==0){
            return 0;
        }else{
            return $data[0]->id;
        }
    }
}


