<div class="tab-pane active pb-4 pt-4" id="tab_1"> 
    <!-- LENSOMETRIA -->
    <div class="row border m-0 pb-4 mb-4">
        <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold">LENSOMETRIA<span onclick="$('#div_fil_1').toggle(); icono($(this))" class="fas fa-folder-minus" style="float: right; position: relative; right: 20px; top:5px;"></span></p>
        <div id="div_fil_1" style="width:95%; margin:0 auto">
            <!-- FILA 1 -->
            <div class="row p-0">   
                <div class="col-lg-3">
                    <div class="mat-div is-completed">
                    <label for="first-name" class="mat-label">Tipo de lentes</label>
                    {!! Form::text('av_tiplen', $historia->av_tiplen, array('class' => 'mat-input', 'disabled')) !!}
                    </div>
                </div>     
                <div class="col-lg-3">
                    <div class="mat-div is-completed">
                    <label for="first-name" class="mat-label">Color</label>
                    {!! Form::text('av_color', $historia->av_color, array('class' => 'mat-input', 'disabled' )) !!}
                    </div>
                </div>   
                <div class="col-lg-3">
                    <div class="mat-div is-completed">
                    <label for="first-name" class="mat-label">Filtro</label>
                    {!! Form::text('av_filtro', $historia->av_filtro, array('class' => 'mat-input', 'disabled')) !!}
                    </div>
                </div>     
                <div class="col-lg-3">
                    <div class="mat-div is-completed">
                    <label for="first-name" class="mat-label">Uso de lentes</label>
                    {!! Form::text('av_usolen', $historia->av_usolen, array('class' => 'mat-input', 'disabled' )) !!}
                    </div>
                </div>   
            </div>
        </div>
    </div>

    <!-- LENSOMETRIA -->    
    <div class="border m-0 pb-4">   
        <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold mb-0">AGUDEZA VISUAL<span onclick="$('#div_fil_2').toggle(); icono($(this));" class="fas fa-folder-minus" style="float: right; position: relative; right: 20px; top:5px;"></span></p>     
        <div id="div_fil_2" style="width:95%; margin:0 auto">
            <!-- FILA 1 -->
            <div class="row border p-0 pb-4 mt-4">             
                <div class="col-lg-2 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">ESFERA<br>(DIOPTRIAS)</p>
                    <div class="mat-div is-completed mx-2">
                        <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                    {!! Form::text('av_esfera_oi', $historia->av_esfera_oi, array('class' => 'mat-input', 'disabled')) !!}
                    </div>
                    <div class="mat-div is-completed mx-2">
                        <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                        {!! Form::text('av_esfera_od', $historia->av_esfera_od, array('class' => 'mat-input', 'disabled')) !!}
                    </div>
                </div>   

                <div class="col-lg-2 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">CILINDRO<br>&nbsp;</p>
                    <div class="mat-div is-completed mx-2">
                        <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                        {!! Form::text('av_cilindro_oi', $historia->av_cilindro_oi, array('class' => 'mat-input', 'disabled')) !!}
                    </div>
                    <div class="mat-div is-completed mx-2">
                        <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                        {!! Form::text('av_cilindro_od', $historia->av_cilindro_od, array('class' => 'mat-input', 'disabled')) !!}
                    </div>
                </div> 

                <div class="col-lg-2 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">EJE<br>&nbsp;</p>
                    <div class="mat-div is-completed mx-2">
                        <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                        {!! Form::text('av_eje_oi', $historia->av_eje_oi, array('class' => 'mat-input', 'disabled')) !!}
                    </div>
                    <div class="mat-div is-completed mx-2">
                        <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                        {!! Form::text('av_eje_od', $historia->av_eje_od, array('class' => 'mat-input', 'disabled')) !!}
                    </div>
                </div>   

                <div class="col-lg-2 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">PRISMA<br>&nbsp;</p>
                    <div class="mat-div is-completed mx-2">
                        <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                        {!! Form::text('av_prisma_oi', $historia->av_prisma_oi, array('class' => 'mat-input', 'disabled')) !!}
                    </div>
                    <div class="mat-div is-completed mx-2">
                        <label for="first-name" class="mat-label text-center text-center">Ojo Derecho</label>
                        {!! Form::text('av_prisma_od', $historia->av_prisma_od, array('class' => 'mat-input', 'disabled')) !!}
                    </div>
                </div>  

                <div class="col-lg-4 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">BASE<br>&nbsp;</p>
                    <div class="mat-div is-completed mx-2">
                        <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                        {!! Form::text('av_base_oi', $historia->av_base_oi, array('class' => 'mat-input', 'disabled')) !!}
                    </div>
                    <div class="mat-div is-completed mx-2">
                        <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                        {!! Form::text('av_base_od', $historia->av_base_od, array('class' => 'mat-input', 'disabled')) !!}
                    </div>
                </div> 
            </div>
            <!-- / FILA 1 -->

            <!-- FILA 2 -->
            <div class="row border p-0 pb-4 mt-4">             
                <div class="col-lg-5 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">AGUDEZA VISUAL DE CERCA</p>
                    <div class="row">                        
                        <div class="col-6 p-1">
                            <p class="col-12 text-center font-weight-bold mb-0 mt-3">CC</p>
                            <div class="mat-div is-completed mx-1">
                                <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                                {!! Form::text('av_avc_cc_oi', $historia->av_avc_cc_oi, array('class' => 'mat-input', 'disabled')) !!}
                            </div>
                            <div class="mat-div is-completed mx-1">
                                <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                                {!! Form::text('av_avc_cc_od', $historia->av_avc_cc_od, array('class' => 'mat-input', 'disabled')) !!}
                            </div>
                        </div>
                        <div class="col-6 p-1">
                            <p class="col-12 text-center font-weight-bold mb-0 mt-3">SC</p>
                            <div class="mat-div is-completed mx-1">
                                <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                                {!! Form::text('av_avc_sc_oi', $historia->av_avc_sc_oi, array('class' => 'mat-input', 'disabled')) !!}
                            </div>
                            <div class="mat-div is-completed mx-1">
                                <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                                {!! Form::text('av_avc_sc_od', $historia->av_avc_sc_od, array('class' => 'mat-input', 'disabled')) !!}
                            </div>
                        </div>
                    </div>                  
                </div>   

                <div class="col-lg-5 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">AGUDEZA VISUAL DE LEJOS</p>
                    <div class="row">                        
                        <div class="col-6 p-1">
                            <p class="col-12 text-center font-weight-bold mb-0 mt-3">CC</p>
                            <div class="mat-div is-completed mx-1">
                                <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                                {!! Form::text('av_avl_cc_oi', $historia->av_avl_cc_oi, array('class' => 'mat-input', 'disabled')) !!}
                            </div>
                            <div class="mat-div is-completed mx-1">
                                <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                                {!! Form::text('av_avl_cc_od', $historia->av_avl_cc_od, array('class' => 'mat-input', 'disabled')) !!}
                            </div>
                        </div>
                        <div class="col-6 p-1">
                            <p class="col-12 text-center font-weight-bold mb-0 mt-3">SC</p>
                            <div class="mat-div is-completed mx-1">
                                <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                                {!! Form::text('av_avl_sc_oi', $historia->av_avl_sc_oi, array('class' => 'mat-input', 'disabled')) !!}
                            </div>
                            <div class="mat-div is-completed mx-1">
                                <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                                {!! Form::text('av_avl_sc_od', $historia->av_avl_sc_od, array('class' => 'mat-input', 'disabled')) !!}
                            </div>
                        </div>
                    </div>                  
                </div>

                <div class="col-lg-2 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">AV PH</p>
                    <div class="row">                        
                        <div class="col-12 p-1">
                            <p class="col-12 text-center font-weight-bold mb-0 mt-3">&nbsp;</p>
                            <div class="mat-div is-completed mx-1">
                                <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                                {!! Form::text('av_avph_oi', $historia->av_avph_oi, array('class' => 'mat-input', 'disabled')) !!}
                            </div>
                            <div class="mat-div is-completed mx-1">
                                <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                                {!! Form::text('av_avph_od', $historia->av_avph_od, array('class' => 'mat-input', 'disabled')) !!}
                            </div>
                        </div>
                    </div>  
                </div>  
            </div>
            <!-- / FILA 2 -->

            <!-- FILA 3 -->
            <div class="row border p-0 pb-4 mt-4">             
                <div class="col-lg-5 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">ESTADO FORICO HABITUAL</p>
                    <div class="row">                        
                        <div class="col-6 p-1">
                            <p class="col-12 text-center font-weight-bold mb-0 mt-3">CC</p>
                            <div class="mat-div is-completed mx-1">
                                <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                                {!! Form::text('av_estforhab_cc_oi', $historia->av_estforhab_cc_oi, array('class' => 'mat-input', 'disabled')) !!}
                            </div>
                            <div class="mat-div is-completed mx-1">
                                <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                                {!! Form::text('av_estforhab_cc_od', $historia->av_estforhab_cc_od, array('class' => 'mat-input', 'disabled')) !!}
                            </div>
                        </div>
                        <div class="col-6 p-1">
                            <p class="col-12 text-center font-weight-bold mb-0 mt-3">SC</p>
                            <div class="mat-div is-completed mx-1">
                                <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                                {!! Form::text('av_estforhab_sc_oi', $historia->av_estforhab_sc_oi, array('class' => 'mat-input', 'disabled')) !!}
                            </div>
                            <div class="mat-div is-completed mx-1">
                                <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                                {!! Form::text('av_estforhab_sc_od', $historia->av_estforhab_sc_od, array('class' => 'mat-input', 'disabled')) !!}
                            </div>
                        </div>
                    </div>                  
                </div>   

                <div class="col-lg-5 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">ESTADO FORICO HABITUAL LEJOS</p>
                    <div class="row">                        
                        <div class="col-6 p-1">
                            <p class="col-12 text-center font-weight-bold mb-0 mt-3">CC</p>
                            <div class="mat-div is-completed mx-1">
                                <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                                {!! Form::text('av_estforhab_lej_cc_oi', $historia->av_estforhab_lej_cc_oi, array('class' => 'mat-input', 'disabled')) !!}
                            </div>
                            <div class="mat-div is-completed mx-1">
                                <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                                {!! Form::text('av_estforhab_lej_cc_od', $historia->av_estforhab_lej_cc_od, array('class' => 'mat-input', 'disabled')) !!}
                            </div>
                        </div>
                        <div class="col-6 p-1">
                            <p class="col-12 text-center font-weight-bold mb-0 mt-3">SC</p>
                            <div class="mat-div is-completed mx-1">
                                <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                                {!! Form::text('av_estforhab_lej_sc_oi', $historia->av_estforhab_lej_sc_oi, array('class' => 'mat-input', 'disabled')) !!}
                            </div>
                            <div class="mat-div is-completed mx-1">
                                <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                                {!! Form::text('av_estforhab_lej_sc_od', $historia->av_estforhab_lej_sc_od, array('class' => 'mat-input', 'disabled')) !!}
                            </div>
                        </div>
                    </div>                  
                </div>

                <div class="col-lg-2 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">&nbsp;</p>
                    <div class="row">                        
                        <div class="col-12 p-1">
                            <p class="col-12 text-center font-weight-bold mb-0 mt-3">&nbsp;</p>
                            <div class="mat-div is-completed mx-1">
                                <label for="first-name" class="mat-label text-center">OJO DOMINANTE</label>
                                {!! Form::text('av_ojodom', $historia->av_ojodom, array('class' => 'mat-input', 'disabled')) !!}
                            </div>
                            <div class="mat-div is-completed mx-1">
                                <label for="first-name" class="mat-label text-center">MANO DOMINANTE</label>
                                {!! Form::text('av_manodom', $historia->av_manodom, array('class' => 'mat-input', 'disabled')) !!}
                            </div>
                        </div>
                    </div>  
                </div>  
            </div>
            <!-- / FILA 3 -->

            <!-- FILA 4 -->
            <div class="row border p-0 pb-4 mt-4">             
                <div class="col-lg-6 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">ANGULO KAPPA</p>
                    <div class="row">                        
                        <div class="col-12 p-1">
                            <!-- <p class="col-12 text-center font-weight-bold mb-0 mt-3"></p> -->
                            <div class="mat-div is-completed mx-1">
                                <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                                {!! Form::text('av_angkap_oi', $historia->av_angkap_oi, array('class' => 'mat-input', 'disabled')) !!}
                            </div>
                            <div class="mat-div is-completed mx-1">
                                <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                                {!! Form::text('av_angkap_od', $historia->av_angkap_od, array('class' => 'mat-input', 'disabled')) !!}
                            </div>
                        </div>
                    </div>                  
                </div>   

                <div class="col-lg-6 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">PUNTO PROXIMO DE CONVERGENCIA (PPC)</p>
                    <div class="row">                        
                        <div class="col-12 p-1">
                            <!-- <p class="col-12 text-center font-weight-bold mb-0 mt-3"></p> -->
                            <div class="mat-div is-completed mx-1">
                                <label for="first-name" class="mat-label text-center">OR</label>
                                {!! Form::text('av_ppc_or', $historia->av_ppc_or, array('class' => 'mat-input', 'disabled')) !!}
                            </div>
                            <div class="mat-div is-completed mx-1">
                                <label for="first-name" class="mat-label text-center">SF</label>
                                {!! Form::text('av_ppc_sf', $historia->av_ppc_sf, array('class' => 'mat-input', 'disabled')) !!}
                            </div>
                        </div>
                    </div>                  
                </div>
            </div>
            <!-- / FILA 4 -->

            <!-- FILA 5 -->
            <div class="row border p-0 pb-4 mt-4">             
                <div class="col-lg-4 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">FIJACIÓN<br>&nbsp;</p>
                    <div class="row">                        
                        <div class="col-12 p-1">
                            <!-- <p class="col-12 text-center font-weight-bold mb-0 mt-3"></p> -->
                            <div class="mat-div is-completed mx-1">
                                <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                                {!! Form::text('av_fija_oi', $historia->av_fija_oi, array('class' => 'mat-input', 'disabled')) !!}
                            </div>
                            <div class="mat-div is-completed mx-1">
                                <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                                {!! Form::text('av_fija_od', $historia->av_fija_od, array('class' => 'mat-input', 'disabled')) !!}
                            </div>
                        </div>
                    </div>                  
                </div>   

                <div class="col-lg-4 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">COVER TEST<br>&nbsp;</p>
                    <div class="row">                        
                        <div class="col-12 p-1">
                            <!-- <p class="col-12 text-center font-weight-bold mb-0 mt-3"></p> -->
                            <div class="mat-div is-completed mx-1">
                                <label for="first-name" class="mat-label text-center">Lejos</label>
                                {!! Form::text('av_ctest_lej', $historia->av_ctest_lej, array('class' => 'mat-input', 'disabled')) !!}
                            </div>
                            <div class="mat-div is-completed mx-1">
                                <label for="first-name" class="mat-label text-center">Cerca</label>
                                {!! Form::text('av_ctest_cer', $historia->av_ctest_cer, array('class' => 'mat-input', 'disabled')) !!}
                            </div>
                        </div>
                    </div>                  
                </div>

                <div class="col-lg-4 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">DISTANCIA INTERPUPILAR<br>(MILIMETROS)</p>
                    <div class="row">                        
                        <div class="col-12 p-1">
                            <!-- <p class="col-12 text-center font-weight-bold mb-0 mt-3"></p> -->
                            <div class="mat-div is-completed mx-1">
                                <label for="first-name" class="mat-label text-center">&nbsp;</label>
                                {!! Form::text('av_distint', $historia->av_distint, array('class' => 'mat-input', 'disabled')) !!}
                            </div>
                        </div>
                    </div>                  
                </div>  
            </div>
            <!-- / FILA 5 -->

            <!-- FILA 6 -->
            <div class="row border p-0 pb-4 mt-4">           
                <div class="col-lg-12 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">OBSERVACIONES</p>
                    <div class="row">                        
                        <div class="col-12 p-1">
                            <!-- <p class="col-12 text-center font-weight-bold mb-0 mt-3"></p> -->
                            <div class="mat-div is-completed mx-1">
                                <label for="first-name" class="mat-label text-center">Detalle de observación</label>
                                {!! Form::text('av_obser', $historia->av_obser, array('class' => 'mat-input', 'disabled')) !!}
                            </div>
                        </div>
                    </div>                  
                </div>
            </div>
            <!-- / FILA 6 -->
        </div>          
    </div>
</div>