<?php

namespace App\Http\Controllers\Modulos;

use Auth;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use App\Model\Paciente;

class PacientesController extends Controller
{
    public $id_empresa;

    // Json
    public $json_eps;
    public $json_sexo;
    public $json_tipodoc;
    public $json_estado;
    public $json_zona;
    public $json_dpto;

    public function __construct()
    {
        $this->json_tipodoc = Config::get('constantes.tipo_documento');
        $this->json_sexo    = Config::get('constantes.sexo');
        $this->json_estado    = Config::get('constantes.estado');
        $this->json_zona    = Config::get('constantes.zona');
        $this->middleware('auth');
    } 
    
    public function beforeBuscar(Request $request){      
        return redirect()->route('modulos.pacientes.buscar', ['keyword' => $request->buscar ? $request->buscar : '']);
    }

    public function beforeVer(Request $request){      
        return redirect()->route('modulos.pacientes.ver', ['PacienteId' => $request->PacienteId ? $request->PacienteId : '0']);
    }

    public function beforeEditar(Request $request){      
        return redirect()->route('modulos.pacientes.editar', ['PacienteId' => $request->PacienteId ? $request->PacienteId : '0']);
    }

    

    public function update(Request $request, $id){
        $requestData = $request->all();
        $paciente = Paciente::findOrFail($id);
        $nombrepaciente = $paciente->name1." ".$paciente->surname1;
        $paciente->update($requestData);        
        return redirect('modulos/pacientes/listado')
                ->with('mensaje', "¡Los datos han sido actualizados satisfactoriamente!")
                ->with('nompaciente', $nombrepaciente);
    }

    public function insert(Request $request){

        $rules = [
            'name1' => 'required|min:2|max:50',
            'surname1' => 'required|min:2|max:50',
            'birthdate' => 'required|date|date_format:Y-m-d'
        ];
        
        $messages = [
            'name1.required' => 'Agrega primer nombre al paciente.',
            'surname1.required' => 'Agrega primer apellido del paciente.',
            'birthdate.required' => 'Asigne una fecha de nacimiento al paciente.',
            'name1.min' =>'El primer nombre del paciente debe contener al menos :min caracteres.',
            'name1.max' =>'El primer nombre del paciente no debe superar los :max caracteres.',
            'surname1.min' =>'El primer apellido del paciente debe contener al menos :min caracteres.',
            'surname1.max' =>'El primer apellido del paciente no debe superar los :max caracteres.'
        ];
        
        $this->validate($request, $rules, $messages);

        $requestData = $request->all();
        Paciente::create($requestData);
        $nombrepaciente = $request->name1." ".$request->surname1;
        return redirect('modulos/pacientes/listado')
                ->with('mensaje', "¡Se ha agregado satisfactoriamente!")
                ->with('nompaciente', $nombrepaciente);
    }

    public function editar( $PacienteId ){
        $paciente = Paciente::findOrFail( $PacienteId );
        self::queryEPS();
        self::queryDpto();
        $dptopac_area           = self::queryArea($PacienteId);
        $dptocontact_area       = self::contact_queryArea($PacienteId);
        $json_munipac           = self::queryMunicipio($dptopac_area);  
        $json_municontact       = self::queryMunicipio($dptocontact_area);  
        $json_area              = array( 'paciente' => $dptopac_area,       'contacto' => $dptocontact_area );
        $json_municipio         = array( 'paciente' => $json_munipac, 'contacto' => $json_municontact );         

        return view('modulos.pacientes.editar')
                ->with('paciente',          $paciente)
                ->with('json_sexo',         $this->json_sexo)
                ->with('json_tipodoc',      $this->json_tipodoc)
                ->with('json_eps',          $this->json_eps)
                ->with('json_zona',         $this->json_zona)
                ->with('json_estado',       $this->json_estado)
                ->with('json_area',         $json_area)
                ->with('json_dpto',         $this->json_dpto)                
                ->with('json_municipio',   $json_municipio);
    }



    public function crear(){
        $this->id_empresa = Session::get('id_empresa');
        $paciente = array();
        self::queryEPS();
        self::queryDpto();
        $dptopac_area           = self::queryArea(0);
        $dptocontact_area       = self::contact_queryArea(0);
        $json_munipac           = self::queryMunicipio($dptopac_area);  
        $json_municontact       = self::queryMunicipio($dptocontact_area);  
        $json_area              = array( 'paciente' => $dptopac_area,       'contacto' => $dptocontact_area );
        $json_municipio         = array( 'paciente' => $json_munipac, 'contacto' => $json_municontact );         

        return view('modulos.pacientes.crear')
                ->with('paciente',          $paciente)
                ->with('json_sexo',         $this->json_sexo)
                ->with('json_tipodoc',      $this->json_tipodoc)
                ->with('json_eps',          $this->json_eps)
                ->with('json_zona',         $this->json_zona)
                ->with('json_estado',       $this->json_estado)
                ->with('json_area',         $json_area)
                ->with('json_dpto',         $this->json_dpto)                
                ->with('json_municipio',   $json_municipio)
                ->with('id_empresa',       $this->id_empresa);
    }



    public function ver( $PacienteId ){
        $paciente = DB::select('select c.*,a.nomarea municipio,s.nomarea dpto,a2.nomarea municipio_contact,s2.nomarea dpto_contact,e.name eps '.
                              'from patients c '.
                                    'left join areas a on c.id_area=a.id ' .
                                    'left join areas s on a.padre=s.id '.
                                    'left join areas a2 on c.contact_city=a2.id ' .
                                    'left join areas s2 on a2.padre=s2.id '.
                                    'left join entidades e on c.id_eps = e.id '.
                               'where c.id=?', [$PacienteId]);
        return view('modulos.pacientes.ver', compact('paciente'));
    }


    public function listar(){
        $this->id_empresa = Session::get('id_empresa');
        $perPage=15;
        $patients = Paciente::from('patients as p')
                ->select('p.id','p.tipodoc','p.numdoc','p.name1','p.name2','p.surname1','p.surname2','p.state','a.nomarea as munic','d.nomarea as dpto')
                ->leftJoin('areas as a', 'p.id_Area', '=', 'a.id')
                ->leftJoin('areas as d', 'a.padre', '=', 'd.id')
                ->where('p.id_empresa', '=', "$this->id_empresa")
                ->orderBy('surname1', 'asc')
                ->orderBy('surname2', 'asc')
                ->orderBy('name1', 'asc')
                ->orderBy('name2', 'asc')
                ->paginate($perPage);

        return view('modulos.pacientes.listar', compact('patients'))->with('texto', '')->with('mensaje', '');
    }



    public function buscar($keyword){        
        $patients = self::buscarPaciente($keyword);
        return view('modulos.pacientes.listar', compact('patients'))->with('texto', $keyword);                    
    }


    public function buscarPaciente(Request $request){
        $keyword = $request->keyword;
        $this->id_empresa = Session::get('id_empresa');
        $perPage=15;
        $pacientes = Paciente::from('patients as p')
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
        return compact('pacientes');
    }

    public function queryEPS(){
        $this->json_eps = DB::select('select c.id, c.code, c.name from entidades c where c.estado = ? order by c.name ', ['AC']);
        $row = array();
        foreach ($this->json_eps as $ent_sel) {
            if(!empty($ent_sel->id)){
                $row[$ent_sel->id] = ucwords(mb_strtolower($ent_sel->name)) . ' (' . $ent_sel->code . ')';
            }            
        }
        $this->json_eps = $row;
    }


    //********************     AREA DEL PACIENTE       **************
    public function queryArea($PacienteId){
        $padre_dpto = DB::select('select padre from patients e left join areas a on e.id_area=a.id where e.id = ? ', [$PacienteId]);
        $id_padre = 3;
        if (!empty($padre_dpto)) {
            $id_padre = $padre_dpto['0']->padre;
        }
        return $id_padre;
    }

    // *****************    AREA DEL CONTACTO DE EMERGENCIAS      ****************
    public function contact_queryArea($PacienteId){
        $padre_dpto_contact = DB::select('select padre from patients e left join areas a on e.contact_city=a.id where e.id = ? ', [$PacienteId]);
        $id_padre = 3;
        if (!empty($padre_dpto_contact)) {
            $id_padre = $padre_dpto_contact['0']->padre;
        }
        return $id_padre;
    }

    // ******************  LISTAR DPTOS Y MUNICIPIOS   ***********************
    public function queryDpto() {       
        $this->json_dpto = DB::select("SELECT id, CONCAT(UPPER(LEFT(nomarea, 1)), LOWER(SUBSTRING(nomarea, 2))) AS nomarea FROM areas WHERE id_tipo = 2");
        $row = array();
        foreach ($this->json_dpto as $area_sel) {
            $row[$area_sel->id] = $area_sel->nomarea;
        }
        $this->json_dpto = $row;
    }

    public function queryMunicipio($dptopac_zona){
        $json = DB::select('select id, CONCAT(UPPER(LEFT(nomarea, 1)), LOWER(SUBSTRING(nomarea, 2))) AS nomarea from areas where id_tipo = 3 and padre = ?', [$dptopac_zona]);
        $row = array();
        foreach ($json as $area_sel) {
            $row[$area_sel->id] = $area_sel->nomarea;
        }
        return $row;
    }

    public function queryMunicipio_onchange(Request $request){
        $json_municipio_onchange = DB::select('select id, CONCAT(UPPER(LEFT(nomarea, 1)), LOWER(SUBSTRING(nomarea, 2))) AS nomarea from areas where id_tipo = 3 and padre = ?', [$request->dpto_zona]);
        $row = array();
        foreach ($json_municipio_onchange as $area_sel) {
            $row[] = array(
                            "id"      =>  $area_sel->id, 
                            "nomarea" =>  $area_sel->nomarea
                    );
        }
        $json_municipio_onchange = $row;
        return $json_municipio_onchange;
    }
}


