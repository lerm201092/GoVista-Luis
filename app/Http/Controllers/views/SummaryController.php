<?php

namespace App\Http\Controllers\Views;

use Auth;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Model\Medico;
use App\Model\Empresa;
use App\Model\Paciente;
use App\Model\Cita;
use App\Model\History;

use Session;
use Log;

class SummaryController extends Controller
{

    /* Atributos de la clase */
	public $menu_bar;
	public $id_user;
    public $rol_user;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->id_user = Auth::user()->id;
        $this->rol_user = Auth::user()->roluser;
        
        $id_medico = Medico::select('id')->where('id_user', '=', $this->id_user)->first();
        $id_empresa = Session::get('id_empresa');
        $id_paciente = self::idPaciente();


        if($this->rol_user == 3){

            $TotalCitasActivas     = Cita::select('id')
                                    ->where('id_medico', '=', $id_medico->id)
                                    ->where('id_empresa', "=", $id_empresa)
                                    ->where('state', '=', 'AC')->get()->count();

            $TotalPacientes         = Paciente::select('id')
                                    ->where('id_empresa', '=', $id_empresa)->get()->count();		
        
            $TotalPacientesActivos  = Paciente::select('id')
                                    ->where('id_empresa', '=', $id_empresa)
                                    ->where('state', '=', 'AC')->get()->count();	

            $TotalPacientesInactivos = Paciente::select('id')
                                    ->where('id_empresa', '=', $id_empresa)
                                    ->where('state', '=', 'IN')->get()->count();	
                                    
            $qty_exe                = History::from('histories as h')
                                    ->select('e.status', DB::raw('count(e.id_exercise) as cant'))
                                    ->leftJoin('history_exercises as e', 'h.id', '=', 'e.id_history')		
                                    ->where('h.id_medico', '=',  $id_medico->id)			 
                                    ->where('h.id_empresa', '=', $id_empresa)
                                    ->where('h.state', '=', 'AC')
                                    ->groupBy('e.status')
                                    ->pluck('cant', 'status');
                               
            $totalEjerciciosAsignados = 0;
            foreach ($qty_exe as $qty_exeValue) {	
                $totalEjerciciosAsignados = ($totalEjerciciosAsignados + $qty_exeValue);
            }	
            
            $totalEjerciciosActivos     = isset($qty_exe['AC'])? $qty_exe['AC'] : 0;
            $totalEjerciciosIncumplidos = isset($qty_exe['IN'])? $qty_exe['IN']: 0;
            $totalEjerciciosRealizados  = isset($qty_exe['OK'])? $qty_exe['OK']: 0;

            return view('Summary')
            ->with('CitasActivas', $TotalCitasActivas)
            ->with('TotalPacientes', $TotalPacientes)
            ->with('PacientesActivos', $TotalPacientesActivos)
            ->with('PacientesInactivos', $TotalPacientesInactivos)
            ->with('EjerciciosAsignados', $totalEjerciciosAsignados)
            ->with('EjerciciosActivos', $totalEjerciciosActivos)
            ->with('EjerciciosIncumplidos', $totalEjerciciosIncumplidos)
            ->with('EjerciciosRealizados', $totalEjerciciosRealizados) 
            ;

            // return Auth::user()->id_medico;
        }

        // return "HOLA";
        

   

        // return $TotalCitasActivas." - ".$TotalPacientes." - ".$TotalPacientesActivos." - ".$TotalPacientesInactivos." - ".$totalEjerciciosAsignados
        // ." - ".$totalEjerciciosActivos." - ".$totalEjerciciosIncumplidos." - ".$totalEjerciciosRealizados;        
    }

    public function idPaciente()
    {
        $data = Paciente::select('id')->where('id_user', '=', $this->id_user)->get();
        if($data->count()==0){ return 0; }else{ return $data[0]->id;  }
    }

}
