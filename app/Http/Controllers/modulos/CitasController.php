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

use Carbon\Carbon;
 
class CitasController extends Controller{

    public $id_empresa;
    public $json_estado;
    public $rol_user;

    public function __construct(){    
        $this->id_empresa = Session::get('id_empresa');
        $this->json_estado = Config::get('constantes.estado_cita');
        $this->middleware('auth');
    } 

    public function update(Request $request, $id){
        $requestData = $request->all();

        $fecha = new Carbon($request->start);       
        $requestData["start"] = $fecha->format('Y-m-d h:i');
        $cita = Cita::findOrFail($id);
        $NombrePaciente = Paciente::NombrePaciente($cita->id_patient);
        $cita->update($requestData);        
        return redirect('modulos/citas/listado')
                ->with('mensaje', "¡La cita ha sido modificada satisfactoriamente!")
                ->with('nompaciente', $NombrePaciente);                
    }

    public function insert(Request $request){
        $requestData = $request->all();
        $fecha = new Carbon($request->start);       
        $requestData["start"] = $fecha->format('Y-m-d h:i');
        Cita::create($requestData);
        $nombrepaciente = $request->nombrePaciente;
        return redirect('modulos/citas/listado')
                ->with('mensaje', "¡Se ha generado una nueva cita satisfactoriamente!")
                ->with('nompaciente', $nombrepaciente);
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
        $this->rol_user    = Auth::user()->roluser;
        $id_medico = self::idMedico();
        $id_paciente = self::idPaciente();

        $keyword = $request->get('search');
        $perPage = 10;

        if( $this->rol_user == 3 ) { // rol = Medico
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

            $json_citas = Cita::from('appointments as a')
            ->select('a.id', DB::raw("CONCAT(p.name1,' ', p.surname1) as title"), 'a.title as titulo' , 'a.body', 'a.start')
            ->leftJoin('patients as p', 'a.id_patient', 'p.id')
            ->leftJoin('medicos  as m', 'a.id_medico' , 'm.id')
            ->where('a.id_medico', '=', $id_medico)->get();
        }

        if( $this->rol_user == 4 ) { // rol = Paciente
            $citas = Cita::from('appointments as a')
            ->select('a.id', 'a.id_patient', 'a.title', 'a.body', 'a.id_medico', 'a.state', 'a.start', 'a.end', 'm.name', 'p.name1', 'p.surname1')
            ->leftJoin('patients as p', 'a.id_patient', '=', 'p.id')
            ->leftJoin('medicos as m', 'a.id_medico', '=', 'm.id')
            ->where('a.id_empresa', '=', "$this->id_empresa")
            ->where('a.id_patient', '=', $id_paciente)
            ->whereIn('a.state', ['AC'])
            ->where(function ($query) use($keyword) {
                $query->orWhere('title', 'LIKE', "%$keyword%")
                    ->orWhere('m.name', 'LIKE', "%$keyword%")
                    ->orWhere('p.name1', 'LIKE', "%$keyword%")
                    ->orWhere('p.surname1', 'LIKE', "%$keyword%")
                    ->orWhere('start', 'LIKE', "%$keyword%");
            })
            ->paginate($perPage);

            $json_citas = Cita::from('appointments as a')
            ->select('a.id', DB::raw("m.name as title"), 'a.title as titulo' , 'a.body', 'a.start')
            ->leftJoin('patients as p', 'a.id_patient', 'p.id')
            ->leftJoin('medicos  as m', 'a.id_medico' , 'm.id')
            ->where('a.id_patient', '=', $id_paciente)->get();
        }



        return view('modulos.citas.listar', compact('citas'))->with('json_citas', $json_citas);
    }

    public function crear(){
        $this->id_empresa = Session::get('id_empresa');
        $id_user = Auth::user()->id;
        $medico = Medico::InfoMedico($id_user);        

        return view('modulos.citas.crear')
                ->with('json_estado', $this->json_estado)
                ->with('id_empresa',  $this->id_empresa)
                ->with('medico', $medico);
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
            ->select('a.id', 'p.tipodoc', 'p.numdoc', 'p.name1', 'p.surname1', 'a.title', 'a.body', 'm.name', 'a.start', 'p.phone', 'a.state')
            ->leftJoin('patients as p', 'a.id_patient', 'p.id')
            ->leftJoin('medicos  as m', 'a.id_medico' , 'm.id')
            ->where('a.id',  '=', $CitaId)
            ->get()->first();
        
        $fecha = new Carbon($cita->start);      
        $fecha = $fecha->format('d-m-Y  h:i');

        return view('modulos.citas.editar', compact('cita'))
                ->with('fecha', $fecha)
                ->with('json_estado', $this->json_estado);    
    }


    // FUNCION QUE DEVUELVE EL ID DEL MEDICO
    public function idMedico(){
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

    // FUNCION QUE DEVUELVE EL ID DEL PACIENTE
    public function idPaciente(){
        $data = Paciente::select('id')
            ->where('id_user', '=', $this->id_user)->get();

        if($data->count()==0){
            return 0;
        }else{
            return $data[0]->id;
        }
    }


    public function buscarpaciente($keyword){
        $this->id_empresa = Session::get('id_empresa');
        $perPage=15;

        $patients = Paciente::from('patients as p')
                    ->select('p.id','p.tipodoc','p.numdoc','p.name1','p.name2','p.surname1','p.surname2','p.state','a.nomarea as munic','d.nomarea as dpto')
                    ->leftJoin('areas as a', 'p.id_Area', '=', 'a.id')
                    ->leftJoin('areas as d', 'a.padre', '=', 'd.id')
                    ->where('p.id', 'LIKE', "%$keyword%")
                    ->where('p.id_empresa', '=', "$this->id_empresa")
                    ->orWhere('tipodoc', 'LIKE', "%$keyword%")
                    ->orWhere('numdoc', 'LIKE', "%$keyword%")
                    ->orWhere('name1', 'LIKE', "%$keyword%")
                    ->orWhere('name2', 'LIKE', "%$keyword%")
                    ->orWhere('surname1', 'LIKE', "%$keyword%")
                    ->orWhere('surname2', 'LIKE', "%$keyword%")
                    ->orderBy('surname1', 'asc')
                    ->orderBy('surname2', 'asc')
                    ->orderBy('name1', 'asc')
                    ->orderBy('name2', 'asc')
                    ->paginate($perPage);    
    
        return $patients;
    }
}


