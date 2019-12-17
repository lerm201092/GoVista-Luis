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

use App\User;
use App\Model\Medico;
use App\Model\Cita;
use App\Model\Paciente;
use App\Model\Historia;
use App\Model\Historia_Aa;
use App\Model\Historia_Ejercicio;
use App\Model\Historia_Ejercicio_Detalle;

use Carbon\Carbon;

class HistoriasEjerciciosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */

    public $id_empresa;
    public $menu_bar;
    public $id_user;
    public $rol_user;

    public function __construct()
    {
        $this->menu_bar = Config::get('constantes.sidebar_medico');
        $this->menu_bar[4] = 'active';
    }

    public function listar(Request $request){
        $this->id_user = Auth::user()->id;
        $this->rol_user = Auth::user()->roluser;
        $perPage = 25;
        $this->id_empresa = Session::get('id_empresa');

        $id_paciente = self::idPaciente();

        if($this->rol_user==4){
            $historias = Historia::from('histories as h')
            ->select('he.id', 'h.id_appointment', 'h.historydate', 'm.name', 'he.observation' ,'he.duration', 'he.session',  'he.session_ok')
            ->leftJoin('history_exercises as he', 'h.id', '=', 'he.id_history')
            ->leftJoin('medicos as m', 'h.id_medico', '=', 'm.id')            
            ->where('h.id_patient', '=', $id_paciente)
            ->paginate($perPage);
        }
        return view('modulos.ejercicios.listar', compact('historias'))
            ->with('id_paciente',$id_paciente)
            ->with('rol_user',$this->rol_user);
    }

    public function beforePlay(Request $request){
        return redirect()->route('modulos.ejercicios.playexercise', ['id' => $request->id ? $request->id : '0']);
    }

    public function playexercise(Request $request, $id)
    {

        $id = \Crypt::decrypt($id);
        $history_exercise = Historia_Ejercicio::findOrFail($id);
        $id_paciente = self::idPaciente();
        $paciente = Paciente::findOrFail($id_paciente);
        $UserName = Auth::user()->nombres.' '.Auth::user()->apellidos;
        $id_exercice = $history_exercise->id;
        $id_his = $history_exercise->id_history;
        $nExercise = $history_exercise->id_exercise;
        $duracion = $history_exercise->duration;
        $setSize = $history_exercise->size;;
        $difi = "FACIL";
        $eyel = $history_exercise->screen_left;
        $eyer = $history_exercise->screen_right;
        $status = $history_exercise->status;
        $Edad = 0;
        $coins = $paciente->coin;
        $starts = $paciente->star;

        return view('modulos.ejercicios.playexercise', compact('history_exercise'))
            ->with('id_exercice', $id_exercice)
            ->with('exercise', $nExercise)
            ->with('duracion', $duracion)
            ->with('id_his', $id_his)
            ->with('difi', $difi)
            ->with('eyel', $eyel)
            ->with('eyer', $eyer)
            ->with('status', $status)
            ->with('size', $setSize)
            ->with('username', $UserName)
            ->with('edad', $Edad)
            ->with('coins', $coins)
            ->with('starts', $starts)
            ->with('id_paciente',$id_paciente)
			->with('id',$id);
    }


    public function saveExerciceId(Request $request)
    {
        //if our chosen id and products table prod_cat_id col match the get first 100 data
        //$request->id here is the id of our chosen option id
        $data = [];

        if($request->has('id') && $request->has('duration') && $request->has('status') ){
            $keywordId = $request->id;
            $duration = $request->duration;
            $status = $request->status;
            $coins = $request->coins;
            $stars = $request->stars;
            $progress = $request->progress;
            $failure = $request->failure;

            $aDataHistory_exercises_detail = array();
            $aDataHistory_exercises_detail['id'] = $keywordId;
            $aDataHistory_exercises_detail['duracion'] = $duration;
            $aDataHistory_exercises_detail['status'] = $status;
            $aDataHistory_exercises_detail['coin'] = $coins;
            $aDataHistory_exercises_detail['star'] = $stars;
            $aDataHistory_exercises_detail['failure'] = $failure;
            $aDataHistory_exercises_detail['progress'] = $progress;

            Historia_Ejercicio_Detalle::create($aDataHistory_exercises_detail);

            if(strcmp($status, "OK")==0){
                $history_Exercises = Historia_Ejercicio::findOrFail($keywordId);			
                $aDataHistory_Exercises = array();
                $aDataHistory_Exercises['id'] = $keywordId;
                $aDataHistory_Exercises['session_ok'] = $history_Exercises->session_ok + 1;
                $aDataHistory_Exercises['updated_user'] = Auth::user()->username;	
                
                $sessiones = Auth::user()->total_sessiones - 1;
                if($sessiones < 0 ){ $sessiones = 0; }
                
				User::where('id','=',Auth::user()->id)->update(array( 'total_sessiones' => ($sessiones) )); // restar la sesion				
                if( $history_Exercises->session == ($history_Exercises->session_ok + 1) ){
                    $aDataHistory_Exercises['status'] = "OK";
                }
                $history_Exercises->update($aDataHistory_Exercises);				          
            }
            $data = Historia_Ejercicio::select('id','id_history','id_exercise','observation')
                ->where('id', '=', "$keywordId")->get();
        }
        return response()->json($data);//then sent this data to ajax success
    }

    public function idPaciente(){
        $data = Paciente::select('id')
            ->where('id_user', '=', Auth::user()->id)->get();
        if($data->count()==0){
            return 0;
        }else{
            return $data[0]->id;
        }
    }

}
