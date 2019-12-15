<?php

namespace App\Http\Controllers\Modulos;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\RedirectResponse;

use App\Model\Medico;
use App\Model\Cita;
use App\Model\Paciente;
use App\Model\Historia;
use App\Model\Historia_Aa;
use App\Model\Historia_Ejercicio;

use Carbon\Carbon;
 
class HistoriasController extends Controller{
    public $id_empresa;
    public $id_user;
    public $rol_user;
    public $amb_organic;
    public $amb_functional;
    public $fixation;
    public $treatment;
    public $affected_eye;
    public $pupils;
    public $respond_to;
    public $pupil_exam;
    public $visual_acuity;
    public $calendarJs;
    public $state;
    public $id_cita;
    public $frequency;
    public $screen;
    public $screen_eye;
    public $esfera_cilindro;
	public $eje;
	public $rips;
	public $cc;
	public $sc;
	public $ojoDominante;
	public $manoDominante;
	public $ho;
	public $ve;
	public $anguloKappa;
	public $LucesWorth;
    public $distanciaCM;
    public $OjoSuprime;
    public $Bagolini;
    public $PostImagenes;
    public $CorrespondenciaSensorial;
    public $TestUsado;
    public $angulo;

    public function __construct(){    
        $this->middleware('auth');
        $this->amb_organic = Config::get('constantes.amb_organic');
        $this->amb_functional = Config::get('constantes.amb_functional');
        $this->fixation = Config::get('constantes.fixation');
        $this->treatment = Config::get('constantes.treatment');
        $this->affected_eye = Config::get('constantes.affected_eye');
        $this->pupils = Config::get('constantes.pupils');
        $this->respond_to = Config::get('constantes.respond_to');
        $this->pupil_exam = Config::get('constantes.pupil_exam');
        $this->visual_acuity = Config::get('constantes.visual_acuity');
        $this->state = Config::get('constantes.estado');
        $this->frequency = Config::get('constantes.frequency');
        $this->screen = Config::get('constantes.screen');
        $this->screen_eye = Config::get('constantes.screen_eye');
        $this->esfera_cilindro = Config::get('constantes.esfera_cilindro');
		$this->eje = Config::get('constantes.eje');
		$this->rips = Config::get('constantes.rips');
		$this->cc = Config::get('constantes.cc');
		$this->sc = Config::get('constantes.sc');
		$this->ojoDominante = Config::get('constantes.ojoDominante');
		$this->manoDominante = Config::get('constantes.manoDominante');
		$this->ho = Config::get('constantes.ho');
		$this->ve = Config::get('constantes.ve');
		$this->anguloKappa = Config::get('constantes.anguloKappa');
		$this->LucesWorth = Config::get('constantes.LucesWorth');
		$this->distanciaCM = Config::get('constantes.distanciaCM');
		$this->OjoSuprime = Config::get('constantes.OjoSuprime');
        $this->Bagolini = Config::get('constantes.Bagolini');
	    $this->PostImagenes = Config::get('constantes.PostImagenes');
	    $this->CorrespondenciaSensorial = Config::get('constantes.CorrespondenciaSensorial');
	    $this->TestUsado = Config::get('constantes.TestUsado');
        $this->angulo = Config::get('constantes.angulo');
        $this->nosesiones = Config::get('constantes.nosesiones');
    } 

    public function beforeVer(Request $request){      
        return redirect()->route('modulos.historiaclinica.ver', ['HistoriaId' => $request->HistoriaId ? $request->HistoriaId : '0']);
    }

    public function beforeDashboard(Request $request){    
        return redirect()->route('modulos.historiaclinica.dashboard', ['PacienteId' => $request->PacienteId ? $request->PacienteId : '0']);
    }

    public function beforeCrear(Request $request){      
        return redirect()->route('modulos.historiaclinica.crear', ['CitaId' => $request->CitaId ? $request->CitaId : '0']);
    }
    
    public function agudeza_visual(Request $request){
        $campo = $request->campo;
        $PacienteId = 380;
        $consulta = "SELECT h.id, ".$campo.", h.historydate FROM histories h WHERE h.id_patient = ".$PacienteId." ORDER BY h.id ASC";
        $historia = DB::select($consulta, [$PacienteId]);
        return $historia;
    }    
    
    public function dashboard( $PacienteId ){
        $consulta =  "SELECT p.tipodoc, p.numdoc, p.name1, p.name2, p.surname1, p.surname2, 
                                                                            p.birthdate, 
                                                                            /* Cantidad de citas */
                                                                            (SELECT COUNT(*)
                                                                            FROM histories h2
                                                                                WHERE h2.id_patient = h.id_patient
                                                                            ) AS cant_citas,
                                                                            /* Ejercicios Activos */
                                                                            (SELECT COUNT(he.id) 
                                                                            FROM history_exercises he, histories h2
                                                                            WHERE he.id_history = h2.id
                                                                                AND he.status = 'AC'
                                                                                AND h2.id_patient = h.id_patient
                                                                            ) AS ejercicios_ac,
                                                                            /* Ejercicios Incumplidos */
                                                                            (SELECT COUNT(he.id) 
                                                                            FROM history_exercises he, histories h2
                                                                            WHERE he.id_history = h2.id
                                                                                AND he.status = 'IN'
                                                                                AND h2.id_patient = h.id_patient
                                                                            ) AS ejercicios_in,
                                                                            /* Fecha Maxima */
                                                                            ( SELECT MAX( h2.historydate )
                                                                            FROM histories h2 
                                                                            WHERE h2.id_patient  = h.id_patient
                                                                            ) AS fecha_max,
                                                                            /* Fecha Minima */
                                                                            ( SELECT MIN( h2.historydate )
                                                                            FROM histories h2 
                                                                            WHERE h2.id_patient  = h.id_patient
                                                                            ) AS fecha_min	                                                               
                    FROM histories h
                        LEFT JOIN patients p ON p.id = h.id_patient
                    WHERE h.id_patient = ?
                    LIMIT 1";



        $historia = DB::select($consulta, [$PacienteId]);
        $edad = 0;

        if($historia){
            $historia = $historia[0];        
            $fecha_min = $historia->fecha_min;
            $fecha_min = new Carbon($fecha_min);
            $fecha_max = $historia->fecha_max;
            $fecha_max = new Carbon($fecha_max);
    
            $historia->fecha_min =  $fecha_min->format('Y-m-d');
            $historia->fecha_max =  $fecha_max->format('Y-m-d');
            $edad = Carbon::parse($historia->birthdate)->age;
        }


        return view('modulos.historias.dashboard', compact('historia'))
                ->with('edad', $edad);
    }

    public function ver($HistoriaId){

        $historia = Historia::findOrFail($HistoriaId);
        $historia_aa = Historia_aa::where('id_histories', $HistoriaId)->firstOrFail(); 
        $historia_ejercicio = Historia_Ejercicio::where('id_history', $HistoriaId)->get();
        $paciente = Paciente::where('id', $historia->id_patient)->firstOrFail();
        $edad = Carbon::parse($paciente->birthdate)->age;
        return view('modulos.historias.ver', compact('historia'), compact('paciente'))
                ->with('historia_aa',   $historia_aa)
                ->with('edad',          $edad)
                ->with( 'rips'          , $this->rips )
                ->with( 'historia_ejercicio'  , $historia_ejercicio)
                ->with( 'visual_acuity'     , $this->visual_acuity );
    }

    public function listar(Request $request){
        $this->id_empresa = Session::get('id_empresa');
        $this->id_user    = Auth::user()->id;
        $this->rol_user   = Auth::user()->roluser;

        $keyword = $request->get('search');
        $perPage = 25;

        $historias = Historia::from('histories as h')
            ->select('p.id as pid', 'h.id', 'h.historydate', 'p.surname1', 'p.surname2', 'p.name1', 'p.name2', 'm.name', 'h.state', 'p.tipodoc', 'p.numdoc', 'a.id_patient', 'm.name')
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
        $cita = DB::select("SELECT p.id as id_paciente, p.tipodoc, p.numdoc, p.birthdate, ". 
                                    "CONCAT(p.name1, ' ', p.name2, ' ',p.surname1, ' ', p.surname2) AS paciente,".
                                    "p.birthdate,".
                                    "a.start ".
                                "FROM appointments a, patients p, medicos m ".
                                "WHERE  a.id = ? ".
                                    "AND a.id_patient = p.id ".
                                    "AND a.id_medico = m.id ", [$CitaId]);                           
        $cita = $cita[0];
        $fechaCita = new Carbon($cita->start);
        $id_paciente = $cita->id_paciente;
        $fechaCita = $fechaCita->format('d-m-Y h:i');
        $edad = Carbon::parse($cita->birthdate)->age;

        return view('modulos.historias.crear')
                ->with( 'id_empresa'        , $this->id_empresa )
                ->with( 'edad'              , $edad )
                ->with( 'cita'              , compact('cita'))
                ->with( 'id_cita'           , $CitaId )
                ->with( 'fechaCita'         , $fechaCita )
                ->with( 'id_medico'         , $id_medico )
                ->with( 'esfera_cilindro'   , $this->esfera_cilindro )
                ->with( 'eje'               , $this->eje )
                ->with( 'cc'                , $this->cc )
                ->with( 'sc'                , $this->sc )
                ->with( 'ho'                , $this->ho )
                ->with( 'ojoDominante'      , $this->ojoDominante )
                ->with( 'manoDominante'     , $this->manoDominante )
                ->with( 'anguloKappa'       , $this->anguloKappa )
                ->with( 'LucesWorth'        , $this->LucesWorth )
                ->with( 'distanciaCM'       , $this->distanciaCM )
                ->with( 'OjoSuprime'        , $this->OjoSuprime )
                ->with( 'Bagolini'          , $this->Bagolini )
                ->with( 'CorSensorial'      , $this->CorrespondenciaSensorial )
                ->with( 'TestUsado'         , $this->TestUsado )
                ->with( 'rips'              , $this->rips )
                ->with( 'visual_acuity'     , $this->visual_acuity )
                ->with( 'nosesiones'        , $this->nosesiones )
                ->with( 'id_paciente'       , $id_paciente )               
                ;
    }

    public function insert(Request $request){   
               
        // Validación de los campos
        $rules = [
            'av_base_oi' => 'max:4',
            'av_base_od' => 'max:4',
            'av_prisma_oi' => 'max:4',
            'av_prisma_od' => 'max:4',
            'av_tiplen' => 'max:50',
            'av_color' => 'max:50',
            'av_filtro' => 'max:50',
            'av_usolen' => 'max:50',
            'av_ppc_or' => 'max:4',
            'av_ppc_sf' => 'max:4',
            'av_fija_oi' => 'max:4',
            'av_fija_od' => 'max:4',
            'av_ctest_lej' => 'max:4',
            'av_ctest_cer' => 'max:4',
            'av_distint' => 'max:4',
            'fo_ofmeri1_oi' => 'max:4',
            'fo_ofmeri1_od' => 'max:4',
            'fo_ofmeri2_oi' => 'max:4',
            'fo_ofmeri2_od' => 'max:4',
            'fo_tsubpris_oi' => 'max:4',
            'fo_tsubpris_od' => 'max:4',
            'fo_tsubbase_oi' => 'max:4',
            'fo_tsubbase_od' => 'max:4'
        ];
        
        $messages = [
            'av_base_oi.max' => 'El campo [Base OI] en la pestaña de [Agudeza Visual] supera el numero maximo de Caracteres (:max).',
            'av_base_od.max' => 'El campo [Base OD] en la pestaña de [Agudeza Visual] supera el numero maximo de Caracteres (:max).',
            'av_prisma_oi.max' => 'El campo [Base OI] en la pestaña de [Agudeza Visual] supera el numero maximo de Caracteres (:max).',
            'av_prisma_od.max' => 'El campo [Base OD] en la pestaña de [Agudeza Visual] upera el numero maximo de Caracteres (:max).',
            'av_tiplen.max' => 'El campo [Tipo de lentes] en la pestaña de [Agudeza Visual] supera el numero maximo de Caracteres (:max).',
            'av_color.max' => 'El campo [Color] en la pestaña de [Agudeza Visual] supera el numero maximo de Caracteres (:max).',
            'av_filtro.max' => 'El campo [Filtro] en la pestaña de [Agudeza Visual] supera el numero maximo de Caracteres (:max).',
            'av_usolen.max' => 'El campo [Uso de lentes] en la pestaña de [Agudeza Visual] upera el numero maximo de Caracteres (:max).',
            'av_ppc_or.max' => 'El campo [PPC OR] en la pestaña de [Agudeza Visual] supera el numero maximo de Caracteres (:max).',
            'av_ppc_sf.max' => 'El campo [PPC SF] en la pestaña de [Agudeza Visual] upera el numero maximo de Caracteres (:max).',
            'av_fija_oi.max' => 'El campo [Fijacion OI] en la pestaña de [Agudeza Visual] supera el numero maximo de Caracteres (:max).',
            'av_fija_od.max' => 'El campo [Fijacion OD] en la pestaña de [Agudeza Visual] upera el numero maximo de Caracteres (:max).',
            'av_ctest_lej.max' => 'El campo [Cover Test OI] en la pestaña de [Agudeza Visual] supera el numero maximo de Caracteres (:max).',
            'av_ctest_cer.max' => 'El campo [Cover Test OD] en la pestaña de [Agudeza Visual] upera el numero maximo de Caracteres (:max).',
            'av_distint.max' => 'El campo [Distancia Interpupilar] en la pestaña de [Agudeza Visual] upera el numero maximo de Caracteres (:max).',
            'fo_ofmeri1_oi.max' => 'El campo [Meridiano 1 OI] en la pestaña de [Funcional Optomeria] supera el numero maximo de Caracteres (:max).',
            'fo_ofmeri1_od.max' => 'El campo [Meridiano 1 OD] en la pestaña de [Funcional Optomeria] supera el numero maximo de Caracteres (:max).',
            'fo_ofmeri2_oi.max' => 'El campo [Meridiano 2 OI] en la pestaña de [Funcional Optomeria] supera el numero maximo de Caracteres (:max).',
            'fo_ofmeri2_od.max' => 'El campo [Meridiano 2 OD] en la pestaña de [Funcional Optomeria] supera el numero maximo de Caracteres (:max).',
            'fo_tsubpris_oi.max' => 'El campo [Prisma OI] en la pestaña de [Funcional Optomeria] supera el numero maximo de Caracteres (:max).',
            'fo_tsubpris_od.max' => 'El campo [Prisma OD] en la pestaña de [Funcional Optomeria] supera el numero maximo de Caracteres (:max).',
            'fo_tsubbase_oi.max' => 'El campo [Base OI] en la pestaña de [Funcional Optomeria] upera el numero maximo de Caracteres (:max).',
            'fo_tsubbase_od.max' => 'El campo [Base OD] en la pestaña de [Funcional Optomeria] supera el numero maximo de Caracteres (:max).'
        ];
        
        $this->validate($request, $rules, $messages);
        // Asignacion de ejercicios
        $ejercicios = $request->id_exercise;    
        // Se verifica la hora
        date_default_timezone_set('America/Bogota');
        $requestData = $request->all();
        $requestData['historydate'] = Carbon::now();  
        // Se guarda el registro 
        $historia = Historia::create($requestData);
        $requestData['id_histories'] = $historia->id;        
        Historia_Aa::create($requestData);
        if($ejercicios){
            foreach ($ejercicios as $item) {
                $x = new Historia_Ejercicio(); 
                $x->id_history      = $historia->id;
                $x->id_exercise     = ($item+1);            
                $x->observation     = "Ejercicio ".($item+1);
                $x->size            = $request->size[$item];
                $x->duration        = $request->duration[$item];
                $x->session         = $request->sesion[$item];
                $x->status          = 'AC';
                $x->frequency       = '';
                $x->screen          = '';
                $x->screen_left     = '';
                $x->screen_right    = '';
                $x->screen_right    = '';          
                $x->save();
            }
        }  
        $cita = Cita::findOrFail($request->id_appointment);
        $NombrePaciente = Paciente::NombrePaciente($cita->id_patient);
        $cita->update(['state' => 'RE']);
        return redirect('modulos/citas/listado')
            ->with('mensaje', "¡Se ha generado la historia clinica satisfactoriamente!")
            ->with('nompaciente', $NombrePaciente );
    }

}