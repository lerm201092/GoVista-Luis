<div class="tab-pane active pb-4 pt-4" id="tab_1"> 
    <!-- LENSOMETRIA -->
    <div class="row border m-0 pb-4 mb-4">
        <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold">LENSOMETRIA<span onclick="$('#div_fil_1').toggle(); icono($(this))" class="fas fa-folder-minus" style="float: right; position: relative; right: 20px; top:5px;"></span></p>
        <div id="div_fil_1" style="width:95%; margin:0 auto">
            <!-- FILA 1 -->
            <div class="row p-0">   
                <div class="col-lg-3">
                    <div class="mat-div">
                    <label for="first-name" class="mat-label">Tipo de lentes</label>
                    {!! Form::text('av_tiplen', null, array('class' => 'mat-input')) !!}
                    </div>
                </div>     
                <div class="col-lg-3">
                    <div class="mat-div">
                    <label for="first-name" class="mat-label">Color</label>
                    {!! Form::text('av_color', null, array('class' => 'mat-input' )) !!}
                    </div>
                </div>   
                <div class="col-lg-3">
                    <div class="mat-div">
                    <label for="first-name" class="mat-label">Filtro</label>
                    {!! Form::text('av_filtro', null, array('class' => 'mat-input')) !!}
                    </div>
                </div>     
                <div class="col-lg-3">
                    <div class="mat-div">
                    <label for="first-name" class="mat-label">Uso de lentes</label>
                    {!! Form::text('av_usolen', null, array('class' => 'mat-input' )) !!}
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
                    <div class="mat-div mx-2">
                        <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                    {!! Form::text('av_esfera_oi', null, array('class' => 'mat-input')) !!}
                    </div>
                    <div class="mat-div mx-2">
                        <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                        {!! Form::text('av_esfera_od', null, array('class' => 'mat-input')) !!}
                    </div>
                </div>   

                <div class="col-lg-2 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">CILINDRO<br>&nbsp;</p>
                    <div class="mat-div mx-2">
                        <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                        {!! Form::text('av_cilindro_oi', null, array('class' => 'mat-input')) !!}
                    </div>
                    <div class="mat-div mx-2">
                        <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                        {!! Form::text('av_cilindro_od', null, array('class' => 'mat-input')) !!}
                    </div>
                </div> 

                <div class="col-lg-2 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">EJE<br>&nbsp;</p>
                    <div class="mat-div mx-2">
                        <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                        {!! Form::text('av_eje_oi', null, array('class' => 'mat-input')) !!}
                    </div>
                    <div class="mat-div mx-2">
                        <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                        {!! Form::text('av_eje_od', null, array('class' => 'mat-input')) !!}
                    </div>
                </div>   

                <div class="col-lg-2 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">PRISMA<br>&nbsp;</p>
                    <div class="mat-div mx-2">
                        <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                        {!! Form::text('av_prisma_oi', null, array('class' => 'mat-input')) !!}
                    </div>
                    <div class="mat-div mx-2">
                        <label for="first-name" class="mat-label text-center text-center">Ojo Derecho</label>
                        {!! Form::text('av_prisma_od', null, array('class' => 'mat-input')) !!}
                    </div>
                </div>  

                <div class="col-lg-4 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">BASE<br>&nbsp;</p>
                    <div class="mat-div mx-2">
                        <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                        {!! Form::text('av_base_oi', null, array('class' => 'mat-input')) !!}
                    </div>
                    <div class="mat-div mx-2">
                        <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                        {!! Form::text('av_base_od', null, array('class' => 'mat-input')) !!}
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
                            <div class="mat-div mx-1">
                                <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                                {!! Form::text('av_avc_cc_oi', null, array('class' => 'mat-input')) !!}
                            </div>
                            <div class="mat-div mx-1">
                                <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                                {!! Form::text('av_avc_cc_od', null, array('class' => 'mat-input')) !!}
                            </div>
                        </div>
                        <div class="col-6 p-1">
                            <p class="col-12 text-center font-weight-bold mb-0 mt-3">SC</p>
                            <div class="mat-div mx-1">
                                <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                                {!! Form::text('av_avc_sc_oi', null, array('class' => 'mat-input')) !!}
                            </div>
                            <div class="mat-div mx-1">
                                <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                                {!! Form::text('av_avc_sc_od', null, array('class' => 'mat-input')) !!}
                            </div>
                        </div>
                    </div>                  
                </div>   

                <div class="col-lg-5 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">AGUDEZA VISUAL DE LEJOS</p>
                    <div class="row">                        
                        <div class="col-6 p-1">
                            <p class="col-12 text-center font-weight-bold mb-0 mt-3">CC</p>
                            <div class="mat-div mx-1">
                                <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                                {!! Form::text('av_avl_cc_oi', null, array('av_avl_cc_oi' => 'mat-input')) !!}
                            </div>
                            <div class="mat-div mx-1">
                                <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                                {!! Form::text('av_avl_cc_od', null, array('av_avl_cc_od' => 'mat-input')) !!}
                            </div>
                        </div>
                        <div class="col-6 p-1">
                            <p class="col-12 text-center font-weight-bold mb-0 mt-3">SC</p>
                            <div class="mat-div mx-1">
                                <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                                {!! Form::text('av_avl_sc_oi', null, array('class' => 'mat-input')) !!}
                            </div>
                            <div class="mat-div mx-1">
                                <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                                {!! Form::text('av_avl_sc_od', null, array('class' => 'mat-input')) !!}
                            </div>
                        </div>
                    </div>                  
                </div>

                <div class="col-lg-2 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">AV PH</p>
                    <div class="row">                        
                        <div class="col-12 p-1">
                            <p class="col-12 text-center font-weight-bold mb-0 mt-3">&nbsp;</p>
                            <div class="mat-div mx-1">
                                <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                                {!! Form::text('av_avph_oi', null, array('class' => 'mat-input')) !!}
                            </div>
                            <div class="mat-div mx-1">
                                <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                                {!! Form::text('av_avph_od', null, array('class' => 'mat-input')) !!}
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
                            <div class="mat-div mx-1">
                                <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                                {!! Form::text('av_estforhab_cc_oi', null, array('class' => 'mat-input')) !!}
                            </div>
                            <div class="mat-div mx-1">
                                <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                                {!! Form::text('av_estforhab_cc_od', null, array('class' => 'mat-input')) !!}
                            </div>
                        </div>
                        <div class="col-6 p-1">
                            <p class="col-12 text-center font-weight-bold mb-0 mt-3">SC</p>
                            <div class="mat-div mx-1">
                                <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                                {!! Form::text('av_estforhab_sc_oi', null, array('class' => 'mat-input')) !!}
                            </div>
                            <div class="mat-div mx-1">
                                <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                                {!! Form::text('av_estforhab_sc_od', null, array('class' => 'mat-input')) !!}
                            </div>
                        </div>
                    </div>                  
                </div>   

                <div class="col-lg-5 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">ESTADO FORICO HABITUAL LEJOS</p>
                    <div class="row">                        
                        <div class="col-6 p-1">
                            <p class="col-12 text-center font-weight-bold mb-0 mt-3">CC</p>
                            <div class="mat-div mx-1">
                                <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                                {!! Form::text('av_estforhab_lej_cc_oi', null, array('class' => 'mat-input')) !!}
                            </div>
                            <div class="mat-div mx-1">
                                <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                                {!! Form::text('av_estforhab_lej_cc_od', null, array('class' => 'mat-input')) !!}
                            </div>
                        </div>
                        <div class="col-6 p-1">
                            <p class="col-12 text-center font-weight-bold mb-0 mt-3">SC</p>
                            <div class="mat-div mx-1">
                                <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                                {!! Form::text('av_estforhab_lej_sc_oi', null, array('class' => 'mat-input')) !!}
                            </div>
                            <div class="mat-div mx-1">
                                <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                                {!! Form::text('av_estforhab_lej_sc_od', null, array('class' => 'mat-input')) !!}
                            </div>
                        </div>
                    </div>                  
                </div>

                <div class="col-lg-2 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">&nbsp;</p>
                    <div class="row">                        
                        <div class="col-12 p-1">
                            <p class="col-12 text-center font-weight-bold mb-0 mt-3">&nbsp;</p>
                            <div class="mat-div mx-1">
                                <label for="first-name" class="mat-label text-center">OJO DOMINANTE</label>
                                {!! Form::text('av_ojodom', null, array('class' => 'mat-input')) !!}
                            </div>
                            <div class="mat-div mx-1">
                                <label for="first-name" class="mat-label text-center">MANO DOMINANTE</label>
                                {!! Form::text('av_manodom', null, array('class' => 'mat-input')) !!}
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
                            <div class="mat-div mx-1">
                                <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                                {!! Form::text('av_angkap_oi', null, array('class' => 'mat-input')) !!}
                            </div>
                            <div class="mat-div mx-1">
                                <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                                {!! Form::text('av_angkap_od', null, array('class' => 'mat-input')) !!}
                            </div>
                        </div>
                    </div>                  
                </div>   

                <div class="col-lg-6 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">PUNTO PROXIMO DE CONVERGENCIA (PPC)</p>
                    <div class="row">                        
                        <div class="col-12 p-1">
                            <!-- <p class="col-12 text-center font-weight-bold mb-0 mt-3"></p> -->
                            <div class="mat-div mx-1">
                                <label for="first-name" class="mat-label text-center">OR</label>
                                {!! Form::text('av_ppc_or', null, array('class' => 'mat-input')) !!}
                            </div>
                            <div class="mat-div mx-1">
                                <label for="first-name" class="mat-label text-center">SF</label>
                                {!! Form::text('av_ppc_sf', null, array('class' => 'mat-input')) !!}
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
                            <div class="mat-div mx-1">
                                <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                                {!! Form::text('av_fija_oi', null, array('class' => 'mat-input')) !!}
                            </div>
                            <div class="mat-div mx-1">
                                <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                                {!! Form::text('av_fija_od', null, array('class' => 'mat-input')) !!}
                            </div>
                        </div>
                    </div>                  
                </div>   

                <div class="col-lg-4 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">COVER TEST<br>&nbsp;</p>
                    <div class="row">                        
                        <div class="col-12 p-1">
                            <!-- <p class="col-12 text-center font-weight-bold mb-0 mt-3"></p> -->
                            <div class="mat-div mx-1">
                                <label for="first-name" class="mat-label text-center">Lejos</label>
                                {!! Form::text('av_ctest_lej', null, array('class' => 'mat-input')) !!}
                            </div>
                            <div class="mat-div mx-1">
                                <label for="first-name" class="mat-label text-center">Cerca</label>
                                {!! Form::text('av_ctest_cer', null, array('class' => 'mat-input')) !!}
                            </div>
                        </div>
                    </div>                  
                </div>

                <div class="col-lg-4 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">DISTANCIA INTERPUPILAR<br>(MILIMETROS)</p>
                    <div class="row">                        
                        <div class="col-12 p-1">
                            <!-- <p class="col-12 text-center font-weight-bold mb-0 mt-3"></p> -->
                            <div class="mat-div mx-1">
                                <label for="first-name" class="mat-label text-center">&nbsp;</label>
                                {!! Form::text('av_distint', null, array('class' => 'mat-input')) !!}
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
                            <div class="mat-div mx-1">
                                <label for="first-name" class="mat-label text-center">Detalle de observación</label>
                                {!! Form::text('av_obser', null, array('class' => 'mat-input')) !!}
                            </div>
                        </div>
                    </div>                  
                </div>
            </div>
            <!-- / FILA 6 -->
        </div>          
    </div>
</div>