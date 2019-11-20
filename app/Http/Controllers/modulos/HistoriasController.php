<?php

namespace App\Http\Controllers\Modulos;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use App\Model\Medico;
use App\Model\Cita;
use App\Model\Paciente;
use App\Model\Historia;
use App\Model\Historia_Aa;

use Carbon\Carbon;
 
class HistoriasController extends Controller{
    public $id_empresa;
    public $id_user;
    public $rol_user;

    public function __construct(){    
        $this->middleware('auth');
    } 

    public function beforeCrear(Request $request){      
        return redirect()->route('modulos.historiaclinica.crear', ['CitaId' => $request->CitaId ? $request->CitaId : '0']);
    }

    public function listar(Request $request){
        $this->id_empresa = Session::get('id_empresa');
        $this->id_user    = Auth::user()->id;
        $this->rol_user   = Auth::user()->roluser;

        $keyword = $request->get('search');
        $perPage = 25;

        $historias = Historia::from('histories as h')
            ->select('h.id', 'h.historydate', 'p.surname1', 'p.surname2', 'p.name1', 'p.name2', 'm.name', 'h.state', 'p.tipodoc', 'p.numdoc', 'a.id_patient', 'm.name')
            ->leftJoin('medicos as m', 'h.id_medico', '=', 'm.id')
            ->leftJoin('appointments as a', 'h.id_appointment', '=', 'a.id')
            ->leftJoin('patients as p', 'a.id_patient', '=', 'p.id')
            ->where('h.id_empresa', '=', "$this->id_empresa")
            ->paginate($perPage);

        return view('modulos.historias.listar', compact('historias'))->with( 'texto', '')->with('medico');
    }

    public function crear($CitaId){
        $this->id_empresa = Session::get('id_empresa');
        $this->id_user    = Auth::user()->id;

        $medico = Medico::InfoMedico($this->id_user);
        $id_medico = $medico["id"];
        $cita = DB::select("SELECT p.tipodoc, p.numdoc, p.birthdate, ". 
                                    "CONCAT(p.name1, ' ', p.name2, ' ',p.surname1, ' ', p.surname2) AS paciente,".
                                    "p.birthdate,".
                                    "a.start ".
                                "FROM appointments a, patients p, medicos m ".
                                "WHERE  a.id = ? ".
                                    "AND a.id_patient = p.id ".
                                    "AND a.id_medico = m.id ", [$CitaId]);                           
        $cita = $cita[0];
        $fechaCita = new Carbon($cita->start);
        $fechaCita = $fechaCita->format('d-m-Y h:i');
        $edad = Carbon::parse($cita->birthdate)->age;

        return view('modulos.historias.crear')
                ->with( 'id_empresa', $this->id_empresa )
                ->with( 'edad',       $edad )
                ->with( 'cita' ,      compact('cita'))
                ->with( 'id_cita' ,   $CitaId )
                ->with( 'fechaCita',  $fechaCita )
                ->with( 'id_medico',  $id_medico );
    }

    public function insert(Request $request){
        date_default_timezone_set('America/Bogota');
        $requestData = $request->all();
        $requestData['historydate'] = Carbon::now();   
        $x = Historia::create($requestData);
        $requestData['id_histories'] = $x->id;        
        Historia_Aa::create($requestData);
        $cita = Cita::findOrFail($request->id_appointment);
        $NombrePaciente = Paciente::NombrePaciente($cita->id_patient);
        $cita->update(['state' => 'RE']);
        return redirect('modulos/citas/listado')
        ->with('mensaje', "¡Se ha generado la historia clinica satisfactoriamente!")
        ->with('nompaciente', $NombrePaciente );
    }
}