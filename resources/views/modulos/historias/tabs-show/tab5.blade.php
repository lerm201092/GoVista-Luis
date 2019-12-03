<div class="tab-pane active pb-4" id="tab_1">   
        <div id="div_fil_2" style="width:95%; margin:0 auto">
            <!-- FILA 1 -->
            <div class="row p-0 pb-4 mt-4">             
                <div class="col-lg-3 m-0 p-0">
                    <div class="mat-div is-completed mx-2">
                        <label for="first-name" class="mat-label">Luces Worth</label>
                        {!! Form::text('mo_lucesw', $historia->mo_lucesw, array('class' => 'mat-input', 'disabled')) !!}
                    </div>
                </div>

                <div class="col-lg-3 m-0 p-0">
                    <div class="mat-div is-completed mx-2">
                        <label for="first-name" class="mat-label">Distancia (cm)</label>
                        {!! Form::text('mo_dist', $historia->mo_dist, array('class' => 'mat-input', 'disabled')) !!}
                    </div>
                </div>

                <div class="col-lg-3 m-0 p-0">
                    <div class="mat-div is-completed mx-2">
                        <label for="first-name" class="mat-label">Ojo que suprime</label>
                        {!! Form::text('mo_ojosuprime', $historia->mo_ojosuprime, array('class' => 'mat-input', 'disabled')) !!}
                    </div>
                </div>

                <div class="col-lg-3 m-0 p-0">
                    <div class="mat-div is-completed mx-2">
                        <label for="first-name" class="mat-label">Bagolini</label>
                        {!! Form::text('mo_bagolini', $historia->mo_bagolini, array('class' => 'mat-input', 'disabled')) !!}
                    </div>
                </div>
            </div>
             <!-- / FILA 1 -->           
    </div>   

    <!-- RETINOSCOPIA  -->
    <div class="border m-0 pb-4 mt-4">   
        <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold mb-0">CORRESPONDENCIA SENSORIAL<span onclick="$('#div_fil_2').toggle(); icono($(this));" class="fas fa-folder-minus" style="float: right; position: relative; right: 20px; top:5px;"></span></p>     
        <div id="div_fil_2" style="width:95%; margin:0 auto">
            <div class="row">
                <div class="col-lg-6">
                    <div class="mat-div is-completed">
                        <label for="first-name" class="mat-label">Cerca</label>
                        {!! Form::text('mo_cosen_cer', $historia->mo_cosen_cer, array('class' => 'mat-input', 'disabled')) !!}
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="mat-div is-completed">
                        <label for="first-name" class="mat-label">Lejos</label>
                        {!! Form::text('mo_cosen_lej', $historia->mo_cosen_lej, array('class' => 'mat-input', 'disabled')) !!}
                    </div>
                </div>
            </div>             
        </div>        
    </div>   

      <!-- RETINOSCOPIA  -->
    <div class="border m-0 pb-4 mt-4">   
        <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold mb-0">ESTEREOPSIS<span onclick="$('#div_fil_2').toggle(); icono($(this));" class="fas fa-folder-minus" style="float: right; position: relative; right: 20px; top:5px;"></span></p>     
        <div id="div_fil_2" style="width:95%; margin:0 auto">
            <!-- FILA 1 -->
            <div class="row">             
                <div class="col-lg-12">
                    <div class="mat-div is-completed">
                        <label for="first-name" class="mat-label">Test Usado</label>
                        {!! Form::text('mo_esttest', $historia->mo_esttest, array('class' => 'mat-input', 'disabled')) !!}
                    </div>
                </div>
            </div>
            <!-- / FILA 1 -->     

            <!-- FILA 2 -->
            <div class="row">             
                <div class="col-lg-6">
                    <div class="mat-div is-completed">
                        <label for="first-name" class="mat-label">RFNV VL</label>
                        {!! Form::text('mo_estrfnv_vl', $historia->mo_estrfnv_vl, array('class' => 'mat-input', 'disabled')) !!}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mat-div is-completed">
                        <label for="first-name" class="mat-label">RFN VP</label>
                        {!! Form::text('mo_estrfnv_vp', $historia->mo_estrfnv_vp, array('class' => 'mat-input', 'disabled')) !!}
                    </div>
                </div>
            </div>
            <!-- / FILA 2 -->        

            <!-- FILA 3 -->
            <div class="row">             
                <div class="col-lg-6">
                    <div class="mat-div is-completed">
                        <label for="first-name" class="mat-label">RFP VL</label>
                        {!! Form::text('mo_estrfp_vl', $historia->mo_estrfp_vl, array('class' => 'mat-input', 'disabled')) !!}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mat-div is-completed">
                        <label for="first-name" class="mat-label">RFP VP</label>
                        {!! Form::text('mo_estrfp_vp', $historia->mo_estrfp_vp, array('class' => 'mat-input', 'disabled')) !!}
                    </div>
                </div>
            </div>
            <!-- / FILA 3 -->        

            <!-- FILA 4 -->
            <div class="row mt-3">             
                <div class="col-lg-6">
                    <label for="first-name" style="font-size:14px; color: gray; font-weight:400">AA OI - VL</label>
                    <table class="col-12 table-bordered">
                        <tr>
                            <td><input type="text" disabled class="mat-input border-0 text-center" value="{{ $historia_aa->mo_est_aavl_oi_1 }}" /></td>    
                            <td><input type="text" disabled class="mat-input border-0 text-center" value="{{ $historia_aa->mo_est_aavl_oi_2 }}" /></td> 
                            <td><input type="text" disabled class="mat-input border-0 text-center" value="{{ $historia_aa->mo_est_aavl_oi_3 }}" /></td> 
                        </tr>
                        <tr>
                            <td><input type="text" disabled class="mat-input border-0 text-center" value="{{$historia_aa->mo_est_aavl_oi_4}}" /></td>    
                            <td><input type="text" disabled class="mat-input border-0 text-center" value="{{$historia_aa->mo_est_aavl_oi_5}}" /></td> 
                            <td><input type="text" disabled class="mat-input border-0 text-center" value="{{$historia_aa->mo_est_aavl_oi_6}}" /></td> 
                        </tr>
                        <tr>
                            <td><input type="text" disabled class="mat-input border-0 text-center" value="{{$historia_aa->mo_est_aavl_oi_7}}" /></td>    
                            <td><input type="text" disabled class="mat-input border-0 text-center" value="{{$historia_aa->mo_est_aavl_oi_8}}" /></td> 
                            <td><input type="text" disabled class="mat-input border-0 text-center" value="{{$historia_aa->mo_est_aavl_oi_9}}" /></td> 
                        </tr>
                    </table>
                </div>
                <div class="col-lg-6">
                    <label for="first-name" style="font-size:14px; color: gray; font-weight:400">AA OD - VL</label>
                    <table class="col-12 table-bordered">
                        <tr>
                            <td><input type="text" disabled class="mat-input border-0 text-center" value="{{ $historia_aa->mo_est_aavl_od_1 }}" /></td>    
                            <td><input type="text" disabled class="mat-input border-0 text-center" value="{{ $historia_aa->mo_est_aavl_od_2 }}" /></td> 
                            <td><input type="text" disabled class="mat-input border-0 text-center" value="{{ $historia_aa->mo_est_aavl_od_3 }}" /></td> 
                        </tr>
                        <tr>
                            <td><input type="text" disabled class="mat-input border-0 text-center" value="{{$historia_aa->mo_est_aavl_od_4}}" /></td>    
                            <td><input type="text" disabled class="mat-input border-0 text-center" value="{{$historia_aa->mo_est_aavl_od_5}}" /></td> 
                            <td><input type="text" disabled class="mat-input border-0 text-center" value="{{$historia_aa->mo_est_aavl_od_6}}" /></td> 
                        </tr>
                        <tr>
                            <td><input type="text" disabled class="mat-input border-0 text-center" value="{{$historia_aa->mo_est_aavl_od_7}}" /></td>    
                            <td><input type="text" disabled class="mat-input border-0 text-center" value="{{$historia_aa->mo_est_aavl_od_8}}" /></td> 
                            <td><input type="text" disabled class="mat-input border-0 text-center" value="{{$historia_aa->mo_est_aavl_od_9}}" /></td> 
                        </tr>
                    </table>
                </div>                
            </div>
            <!-- / FILA 4 -->     

            <!-- FILA 5 -->
            <div class="row mt-3">             
                <div class="col-lg-6">
                    <label for="first-name" style="font-size:14px; color: gray; font-weight:400">AA OI - VP</label>
                    <table class="col-12 table-bordered">
                        <tr>
                            <td><input type="text" disabled class="mat-input border-0 text-center" value="{{ $historia_aa->mo_est_aavp_oi_1 }}" /></td>    
                            <td><input type="text" disabled class="mat-input border-0 text-center" value="{{ $historia_aa->mo_est_aavp_oi_2 }}" /></td> 
                            <td><input type="text" disabled class="mat-input border-0 text-center" value="{{ $historia_aa->mo_est_aavp_oi_3 }}" /></td> 
                        </tr>
                        <tr>
                            <td><input type="text" disabled class="mat-input border-0 text-center" value="{{$historia_aa->mo_est_aavp_oi_4}}" /></td>    
                            <td><input type="text" disabled class="mat-input border-0 text-center" value="{{$historia_aa->mo_est_aavp_oi_5}}" /></td> 
                            <td><input type="text" disabled class="mat-input border-0 text-center" value="{{$historia_aa->mo_est_aavp_oi_6}}" /></td> 
                        </tr>
                        <tr>
                            <td><input type="text" disabled class="mat-input border-0 text-center" value="{{$historia_aa->mo_est_aavp_oi_7}}" /></td>    
                            <td><input type="text" disabled class="mat-input border-0 text-center" value="{{$historia_aa->mo_est_aavp_oi_8}}" /></td> 
                            <td><input type="text" disabled class="mat-input border-0 text-center" value="{{$historia_aa->mo_est_aavp_oi_9}}" /></td> 
                        </tr>
                    </table>
                </div>
                <div class="col-lg-6">
                    <label for="first-name" style="font-size:14px; color: gray; font-weight:400">AA OD - VP</label>
                    <table class="col-12 table-bordered">
                        <tr>
                            <td><input type="text" disabled class="mat-input border-0 text-center" value="{{ $historia_aa->mo_est_aavp_od_1 }}" /></td>    
                            <td><input type="text" disabled class="mat-input border-0 text-center" value="{{ $historia_aa->mo_est_aavp_od_2 }}" /></td> 
                            <td><input type="text" disabled class="mat-input border-0 text-center" value="{{ $historia_aa->mo_est_aavp_od_3 }}" /></td> 
                        </tr>
                        <tr>
                            <td><input type="text" disabled class="mat-input border-0 text-center" value="{{$historia_aa->mo_est_aavp_od_4}}" /></td>    
                            <td><input type="text" disabled class="mat-input border-0 text-center" value="{{$historia_aa->mo_est_aavp_od_5}}" /></td> 
                            <td><input type="text" disabled class="mat-input border-0 text-center" value="{{$historia_aa->mo_est_aavp_od_6}}" /></td> 
                        </tr>
                        <tr>
                            <td><input type="text" disabled class="mat-input border-0 text-center" value="{{$historia_aa->mo_est_aavp_od_7}}" /></td>    
                            <td><input type="text" disabled class="mat-input border-0 text-center" value="{{$historia_aa->mo_est_aavp_od_8}}" /></td> 
                            <td><input type="text" disabled class="mat-input border-0 text-center" value="{{$historia_aa->mo_est_aavp_od_9}}" /></td> 
                        </tr>
                    </table>
                </div>                
            </div>
            <!-- / FILA 5 -->

            <!-- FILA 6 -->
            <div class="row">             
                <div class="col-lg-6">
                    <div class="mat-div is-completed">
                        <label for="first-name" class="mat-label">Nivel visual OI</label>
                        {!! Form::text('mo_estnivvis_oi', $historia->mo_estnivvis_oi, array('class' => 'mat-input', 'disabled')) !!}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mat-div is-completed">
                        <label for="first-name" class="mat-label">Nivel visual OD</label>
                        {!! Form::text('mo_estnivvis_od', $historia->mo_estnivvis_od, array('class' => 'mat-input', 'disabled')) !!}
                    </div>
                </div>
            </div>
            <!-- / FILA 6 -->         

            <!-- FILA 7 -->
            <div class="row mt-3">             
                <div class="col-lg-12">
                    <div class="mat-div is-completed">
                        <label for="first-name" class="mat-label">Técnica</label>
                        {!! Form::text('mo_esttecnica', $historia->mo_esttecnica, array('class' => 'mat-input', 'disabled')) !!}
                    </div>
                </div>
            </div>
            <!-- / FILA 7 -->

            <!-- FILA 8 -->
            <div class="row mt-3">             
                <div class="col-lg-6">
                    <div class="mat-div is-completed">
                        <label for="first-name" class="mat-label">Flexibidad OI</label>
                        {!! Form::text('mo_estflex_oi', $historia->mo_estflex_oi, array('class' => 'mat-input', 'disabled')) !!}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mat-div is-completed">
                        <label for="first-name" class="mat-label">Flexibidad OD</label>
                        {!! Form::text('mo_estflex_od', $historia->mo_estflex_od, array('class' => 'mat-input', 'disabled')) !!}
                    </div>
                </div>
            </div>
            <!-- / FILA 8 -->    
        </div>        
    </div> 
</div>