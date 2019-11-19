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
 
class HistoriasController extends Controller{
    public $id_empresa;

    public function __construct(){    
        $this->middleware('auth');
    } 

    public function beforeCrear(Request $request){      
        return redirect()->route('modulos.historiaclinica.crear', ['CitaId' => $request->CitaId ? $request->CitaId : '0']);
    }

    public function crear($CitaId){
        return count(['id','historydate','id_empresa', 'id_appointment',
                    'am_desc', 'ana_motcon', 'ana_enfact', 'av_tiplen', 'av_color', 'av_filtro', 'av_usolen', 'av_esfera_oi',
                    'av_esfera_od', 'av_cilindro_oi', 'av_cilindro_od', 'av_eje_oi', 'av_eje_od', 'av_prisma_oi',
                    'av_prisma_od', 'av_base_oi', 'av_base_od', 'av_avc_cc_oi', 'av_avc_cc_od', 'av_avc_sc_oi',
                    'av_avc_sc_od', 'av_avl_cc_oi', 'av_avl_cc_od', 'av_avl_sc_oi', 'av_avl_sc_od', 'av_ojodom',
                    'av_manodom', 'av_angkap_oi', 'av_angkap_od', 'av_ppc_or', 'av_ppc_sf', 'av_fija_oi', 
                    'av_fija_od', 'av_ctest_lej', 'av_ctest_cer', 'av_distint', 'av_obser', 'fo_ofmeri1_oi',
                    'fo_ofmeri1_od', 'fo_ofmeri2_oi', 'fo_ofmeri2_od', 'fo_ofeje_oi', 'fo_ofeje_od', 'fo_ofobser_oi',
                    'fo_ofobser_od', 'fo_rettecusa', 'fo_retesf_oi', 'fo_retesf_od', 'fo_retcil_oi', 'fo_retcil_od',
                    'fo_reteje_oi', 'fo_reteje_od', 'fo_retcomp_oi', 'fo_retcomp_od', 'fo_retobserv_oi', 'fo_retobserv_od',
                    'fo_tsubesf_oi', 'fo_tsubesf_od', 'fo_tsubcil_oi', 'fo_tsubcil_od', 'fo_tsubeje_oi', 'fo_tsubeje_od',
                    'fo_tsubpris_oi', 'fo_tsubpris_od', 'fo_tsubadd_oi', 'fo_tsubadd_od', 'fo_tsubavc_vl_oi', 'fo_tsubavc_vl_od',
                    'fo_tsubavc_vp_oi', 'fo_tsubavc_vp_od', 'mo_lucesw', 'mo_dist', 'mo_ojosuprime', 'mo_bagolini',
                    'mo_cosen_cer', 'mo_cosen_lej', 'mo_esttest', 'mo_estrfnv_vl', 'mo_estrfnv_vp', 'mo_estrfp_vl',
                    'mo_estrfp_vp', 'mo_est_aavl_oi_1', 'mo_est_aavl_oi_2', 'mo_est_aavl_oi_3', 'mo_est_aavl_oi_4',
                    'mo_est_aavl_oi_5', 'mo_est_aavl_oi_6', 'mo_est_aavl_oi_7', 'mo_est_aavl_oi_8', 'mo_est_aavl_oi_9',
                    'mo_est_aavl_od_1', 'mo_est_aavl_od_2', 'mo_est_aavl_od_3', 'mo_est_aavl_od_4', 'mo_est_aavl_od_5',
                    'mo_est_aavl_od_6', 'mo_est_aavl_od_7', 'mo_est_aavl_od_8', 'mo_est_aavl_od_9', 'mo_est_aavp_oi_1',
                    'mo_est_aavp_oi_2', 'mo_est_aavp_oi_3', 'mo_est_aavp_oi_4', 'mo_est_aavp_oi_5', 'mo_est_aavp_oi_6',
                    'mo_est_aavp_oi_7', 'mo_est_aavp_oi_8', 'mo_est_aavp_oi_9', 'mo_est_aavp_od_1', 'mo_est_aavp_od_2',
                    'mo_est_aavp_od_3', 'mo_est_aavp_od_4', 'mo_est_aavp_od_5', 'mo_est_aavp_od_6', 'mo_est_aavp_od_7',
                    'mo_est_aavp_od_8', 'mo_est_aavp_od_9', 'mo_estnivvis_oi', 'mo_estnivvis_od', 'mo_esttecnica',
                    'mo_estflex_oi', 'mo_estflex_od', 'diag_principal', 'diag_rel_1', 'diag_rel_2', 'diag_rel_3',
                    'diag_compli', 'diag_finconsul','state','created_user','updated_user']);
        $this->id_empresa = Session::get('id_empresa');

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
                ->with(  'id_empresa', $this->id_empresa )
                ->with(  'edad', $edad )
                ->with( 'cita' , compact('cita'))
                ->with( 'fechaCita', $fechaCita );
    }
}