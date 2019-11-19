<div class="tab-pane active pb-4 pt-0" id="tab_1">       
       <!-- RETINOSCOPIA  -->
       <div class="border m-0 pb-4 mt-4">   
        <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold mb-0">CAUSA EXTERNA<span onclick="$('#div_fil_2').toggle(); icono($(this));" class="fas fa-folder-minus" style="float: right; position: relative; right: 20px; top:5px;"></span></p>     
        <div id="div_fil_2" style="width:95%; margin:0 auto">
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="mat-div">
                        <label for="first-name" class="mat-label">Diagnostico Principal</label>
                        {!! Form::text('title', '', array('class' => 'mat-input', 'required' => 'required')) !!}
                    </div>
                </div>

                <div class="col-12 mb-4">
                    <div class="mat-div">
                        <label for="first-name" class="mat-label">Diagnostico Relacional 1</label>
                        {!! Form::text('title', '', array('class' => 'mat-input', 'required' => 'required')) !!}
                    </div>
                </div>

                <div class="col-12 mb-4">
                    <div class="mat-div">
                        <label for="first-name" class="mat-label">Diagnostico Relacional 2</label>
                        {!! Form::text('title', '', array('class' => 'mat-input', 'required' => 'required')) !!}
                    </div>
                </div>

                <div class="col-12 mb-4">
                    <div class="mat-div">
                        <label for="first-name" class="mat-label">Diagnostico Relacional 3</label>
                        {!! Form::text('title', '', array('class' => 'mat-input', 'required' => 'required')) !!}
                    </div>
                </div>

                <div class="col-12 mb-4">
                    <div class="mat-div">
                        <label for="first-name" class="mat-label">Complicación</label>
                        {!! Form::text('title', '', array('class' => 'mat-input', 'required' => 'required')) !!}
                    </div>
                </div>

                <div class="col-12 mb-4">
                    <div class="mat-div">
                        <label for="first-name" class="mat-label">Finalidad de consulta</label>
                        {!! Form::text('title', '', array('class' => 'mat-input', 'required' => 'required')) !!}
                    </div>
                </div>
            </div>             
        </div>        
    </div>     
</div>