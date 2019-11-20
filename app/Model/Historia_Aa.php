<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Historia_Aa extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'histories_aa';

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
	protected $fillable =['id', 'id_histories', 'mo_est_aavl_oi_1', 'mo_est_aavl_oi_2', 'mo_est_aavl_oi_3', 'mo_est_aavl_oi_4', 'mo_est_aavl_oi_5',
                                                'mo_est_aavl_oi_6', 'mo_est_aavl_oi_7', 'mo_est_aavl_oi_8', 'mo_est_aavl_oi_9', 'mo_est_aavl_od_1', 
                                                'mo_est_aavl_od_2', 'mo_est_aavl_od_3', 'mo_est_aavl_od_4', 'mo_est_aavl_od_5', 'mo_est_aavl_od_6',
                                                'mo_est_aavl_od_7', 'mo_est_aavl_od_8', 'mo_est_aavl_od_9', 'mo_est_aavp_oi_1', 'mo_est_aavp_oi_2',
                                                'mo_est_aavp_oi_3', 'mo_est_aavp_oi_4', 'mo_est_aavp_oi_5', 'mo_est_aavp_oi_6', 'mo_est_aavp_oi_7',
                                                'mo_est_aavp_oi_8', 'mo_est_aavp_oi_9', 'mo_est_aavp_od_1', 'mo_est_aavp_od_2', 'mo_est_aavp_od_3',
                                                'mo_est_aavp_od_4', 'mo_est_aavp_od_5', 'mo_est_aavp_od_6', 'mo_est_aavp_od_7', 'mo_est_aavp_od_8',
                                                'mo_est_aavp_od_9','created_user','updated_user']; 
}
