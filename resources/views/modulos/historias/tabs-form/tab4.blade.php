<div class="tab-pane active pb-4 pt-4" id="tab_1"> 
    <div class="border m-0 pb-4">   
        <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold mb-0">OFTALMOMETRIA<span onclick="$('#div_fil_2').toggle(); icono($(this));" class="fas fa-folder-minus" style="float: right; position: relative; right: 20px; top:5px;"></span></p>     
        <div id="div_fil_2" style="width:95%; margin:0 auto">
            <!-- FILA 1 -->
            <div class="row border p-0 pb-4 mt-4">             
                <div class="col-lg-3 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">MERIDIANO 1</p>
                    <div class="mat-div mx-2">
                        <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                    {!! Form::text('fo_ofmeri1_oi', '', array('class' => 'mat-input', 'required' => 'required')) !!}
                    </div>
                    <div class="mat-div mx-2">
                        <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                        {!! Form::text('fo_ofmeri1_od', '', array('class' => 'mat-input', 'required' => 'required')) !!}
                    </div>
                </div>

                <div class="col-lg-3 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">MERIDIANO 2</p>
                    <div class="mat-div mx-2">
                        <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                    {!! Form::text('fo_ofmeri2_oi', '', array('class' => 'mat-input', 'required' => 'required')) !!}
                    </div>
                    <div class="mat-div mx-2">
                        <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                        {!! Form::text('fo_ofmeri2_od', '', array('class' => 'mat-input', 'required' => 'required')) !!}
                    </div>
                </div>

                <div class="col-lg-3 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">EJE</p>
                    <div class="mat-div mx-2">
                        <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                    {!! Form::text('fo_ofeje_oi', '', array('class' => 'mat-input', 'required' => 'required')) !!}
                    </div>
                    <div class="mat-div mx-2">
                        <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                        {!! Form::text('fo_ofeje_od', '', array('class' => 'mat-input', 'required' => 'required')) !!}
                    </div>
                </div>

                <div class="col-lg-3 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">OBSERVACIONES</p>
                    <div class="mat-div mx-2">
                        <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                    {!! Form::text('fo_ofobser_oi', '', array('class' => 'mat-input', 'required' => 'required')) !!}
                    </div>
                    <div class="mat-div mx-2">
                        <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                        {!! Form::text('fo_ofobser_od', '', array('class' => 'mat-input', 'required' => 'required')) !!}
                    </div>
                </div>
            </div>
             <!-- / FILA 1 -->           
        </div>
    </div>   

    <!-- RETINOSCOPIA  -->
    <div class="border m-0 pb-4 mt-4">   
        <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold mb-0">RETINOSCOPIA<span onclick="$('#div_fil_2').toggle(); icono($(this));" class="fas fa-folder-minus" style="float: right; position: relative; right: 20px; top:5px;"></span></p>     
        <div id="div_fil_2" style="width:95%; margin:0 auto">
            <div class="col-12 mat-div mx-2">
                <label for="first-name" class="mat-label">Tecnica Usada</label>
                {!! Form::text('fo_rettecusa', '', array('class' => 'mat-input', 'required' => 'required')) !!}
            </div>
            <!-- FILA 1 -->
            <div class="row border p-0 pb-4 mt-4">             
                <div class="col-lg-2 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">ESFERA</p>
                    <div class="mat-div mx-2">
                        <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                        {!! Form::text('fo_retesf_oi', '', array('class' => 'mat-input', 'required' => 'required')) !!}
                    </div>
                    <div class="mat-div mx-2">
                        <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                        {!! Form::text('fo_retesf_od', '', array('class' => 'mat-input', 'required' => 'required')) !!}
                    </div>
                </div>

                <div class="col-lg-2 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">CILINDRO</p>
                    <div class="mat-div mx-2">
                        <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                    {!! Form::text('fo_retcil_oi', '', array('class' => 'mat-input', 'required' => 'required')) !!}
                    </div>
                    <div class="mat-div mx-2">
                        <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                        {!! Form::text('fo_retcil_od', '', array('class' => 'mat-input', 'required' => 'required')) !!}
                    </div>
                </div>

                <div class="col-lg-2 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">EJE</p>
                    <div class="mat-div mx-2">
                        <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                    {!! Form::text('fo_reteje_oi', '', array('class' => 'mat-input', 'required' => 'required')) !!}
                    </div>
                    <div class="mat-div mx-2">
                        <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                        {!! Form::text('fo_reteje_od', '', array('class' => 'mat-input', 'required' => 'required')) !!}
                    </div>
                </div>

                <div class="col-lg-2 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">COMPENSADA</p>
                    <div class="mat-div mx-2">
                        <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                        {!! Form::text('fo_retcomp_oi', '', array('class' => 'mat-input', 'required' => 'required')) !!}
                    </div>
                    <div class="mat-div mx-2">
                        <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                        {!! Form::text('fo_retcomp_od', '', array('class' => 'mat-input', 'required' => 'required')) !!}
                    </div>
                </div>

                <div class="col-lg-4 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">OBSERVACIONES</p>
                    <div class="mat-div mx-2">
                        <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                        {!! Form::text('fo_retobserv_oi', '', array('class' => 'mat-input', 'required' => 'required')) !!}
                    </div>
                    <div class="mat-div mx-2">
                        <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                        {!! Form::text('fo_retobserv_od', '', array('class' => 'mat-input', 'required' => 'required')) !!}
                    </div>
                </div>
            </div>
             <!-- / FILA 1 -->           
        </div>        
    </div>   

      <!-- RETINOSCOPIA  -->
    <div class="border m-0 pb-4 mt-4">   
        <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold mb-0">TIPO SUBJETIVO<span onclick="$('#div_fil_2').toggle(); icono($(this));" class="fas fa-folder-minus" style="float: right; position: relative; right: 20px; top:5px;"></span></p>     
        <div id="div_fil_2" style="width:95%; margin:0 auto">
            <!-- FILA 1 -->
            <div class="row border p-0 pb-4 mt-4">             
                <div class="col-lg-3 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">ESFERA</p>
                    <div class="mat-div mx-2">
                        <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                        {!! Form::text('fo_tsubesf_oi', '', array('class' => 'mat-input', 'required' => 'required')) !!}
                    </div>
                    <div class="mat-div mx-2">
                        <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                        {!! Form::text('fo_tsubesf_od', '', array('class' => 'mat-input', 'required' => 'required')) !!}
                    </div>
                </div>

                <div class="col-lg-3 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">CILINDRO</p>
                    <div class="mat-div mx-2">
                        <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                        {!! Form::text('fo_tsubcil_oi', '', array('class' => 'mat-input', 'required' => 'required')) !!}
                    </div>
                    <div class="mat-div mx-2">
                        <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                        {!! Form::text('fo_tsubcil_od', '', array('class' => 'mat-input', 'required' => 'required')) !!}
                    </div>
                </div>

                <div class="col-lg-3 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">EJE</p>
                    <div class="mat-div mx-2">
                        <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                        {!! Form::text('fo_tsubeje_oi', '', array('class' => 'mat-input', 'required' => 'required')) !!}
                    </div>
                    <div class="mat-div mx-2">
                        <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                        {!! Form::text('fo_tsubeje_od', '', array('class' => 'mat-input', 'required' => 'required')) !!}
                    </div>
                </div>

                <div class="col-lg-3 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">PRISMA</p>
                    <div class="mat-div mx-2">
                        <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                        {!! Form::text('fo_tsubpris_oi', '', array('class' => 'mat-input', 'required' => 'required')) !!}
                    </div>
                    <div class="mat-div mx-2">
                        <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                        {!! Form::text('fo_tsubpris_od', '', array('class' => 'mat-input', 'required' => 'required')) !!}
                    </div>
                </div>
            </div>
            <!-- / FILA 1 -->           

            <!-- FILA 2 -->
            <div class="row border p-0 pb-4 mt-4">             
                <div class="col-lg-3 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">BASE</p>
                    <div class="mat-div mx-2">
                        <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                        {!! Form::text('title', '', array('class' => 'mat-input', 'required' => 'required')) !!}
                    </div>
                    <div class="mat-div mx-2">
                        <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                        {!! Form::text('title', '', array('class' => 'mat-input', 'required' => 'required')) !!}
                    </div>
                </div>

                <div class="col-lg-3 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">ADD</p>
                    <div class="mat-div mx-2">
                        <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                        {!! Form::text('fo_tsubadd_oi', '', array('class' => 'mat-input', 'required' => 'required')) !!}
                    </div>
                    <div class="mat-div mx-2">
                        <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                        {!! Form::text('fo_tsubadd_od', '', array('class' => 'mat-input', 'required' => 'required')) !!}
                    </div>
                </div>

                <div class="col-lg-3 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">AVCC VL</p>
                    <div class="mat-div mx-2">
                        <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                        {!! Form::text('fo_tsubavc_vl_oi', '', array('class' => 'mat-input', 'required' => 'required')) !!}
                    </div>
                    <div class="mat-div mx-2">
                        <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                        {!! Form::text('fo_tsubavc_vl_od', '', array('class' => 'mat-input', 'required' => 'required')) !!}
                    </div>
                </div>

                <div class="col-lg-3 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">AVCC VP</p>
                    <div class="mat-div mx-2">
                        <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                        {!! Form::text('fo_tsubavc_vp_oi', '', array('class' => 'mat-input', 'required' => 'required')) !!}
                    </div>
                    <div class="mat-div mx-2">
                        <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                        {!! Form::text('fo_tsubavc_vp_od', '', array('class' => 'mat-input', 'required' => 'required')) !!}
                    </div>
                </div>
            </div>
             <!-- / FILA 2 -->   
        </div>        
    </div> 
</div>