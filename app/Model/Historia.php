<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Historia extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'histories';

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
	protected $fillable =['id','historydate','id_empresa', 'id_medico','id_patient', 'id_appointment',
    'am_desc', 'ana_motcon', 'ana_enferact', 'av_tiplen', 'av_color', 'av_filtro', 'av_usolen', 'av_esfera_oi',
    'av_esfera_od', 'av_cilindro_oi', 'av_cilindro_od', 'av_eje_oi', 'av_eje_od', 'av_prisma_oi',
    'av_prisma_od', 'av_base_oi', 'av_base_od', 'av_avc_cc_oi', 'av_avc_cc_od', 'av_avc_sc_oi',
    'av_avc_sc_od', 'av_avl_cc_oi', 'av_avl_cc_od', 'av_avl_sc_oi', 'av_avl_sc_od', 'av_avph_oi', 'av_avph_od', 'av_estforhab_cc_oi',  
    'av_estforhab_cc_od', 'av_estforhab_sc_oi',  'av_estforhab_sc_od',  'av_estforhab_lej_cc_oi',  'av_estforhab_lej_cc_od', 
    'av_estforhab_lej_sc_oi', 'av_estforhab_lej_sc_od','av_ojodom',
    'av_manodom', 'av_angkap_oi', 'av_angkap_od', 'av_ppc_or', 'av_ppc_sf', 'av_fija_oi', 
    'av_fija_od', 'av_ctest_lej', 'av_ctest_cer', 'av_distint', 'av_obser', 'fo_ofmeri1_oi',
    'fo_ofmeri1_od', 'fo_ofmeri2_oi', 'fo_ofmeri2_od', 'fo_ofeje_oi', 'fo_ofeje_od', 'fo_ofobser_oi',
    'fo_ofobser_od', 'fo_rettecusa', 'fo_retesf_oi', 'fo_retesf_od', 'fo_retcil_oi', 'fo_retcil_od',
    'fo_reteje_oi', 'fo_reteje_od', 'fo_retcomp_oi', 'fo_retcomp_od', 'fo_retobserv_oi', 'fo_retobserv_od',
    'fo_tsubesf_oi', 'fo_tsubesf_od', 'fo_tsubcil_oi', 'fo_tsubcil_od', 'fo_tsubeje_oi', 'fo_tsubeje_od',
    'fo_tsubpris_oi', 'fo_tsubpris_od', 'fo_tsubbase_oi', 'fo_tsubbase_od', 'fo_tsubadd_oi', 'fo_tsubadd_od', 'fo_tsubavc_vl_oi', 'fo_tsubavc_vl_od',
    'fo_tsubavc_vp_oi', 'fo_tsubavc_vp_od', 'mo_lucesw', 'mo_dist', 'mo_ojosuprime', 'mo_bagolini',
    'mo_cosen_cer', 'mo_cosen_lej', 'mo_esttest', 'mo_estrfnv_vl', 'mo_estrfnv_vp', 'mo_estrfp_vl',
    'mo_estrfp_vp', 'mo_estnivvis_oi', 'mo_estnivvis_od', 'mo_esttecnica',
    'mo_estflex_oi', 'mo_estflex_od', 'diag_principal', 'diag_rel_1', 'diag_rel_2', 'diag_rel_3',
    'diag_compli', 'diag_finconsul','state','created_user','updated_user']; 


}
