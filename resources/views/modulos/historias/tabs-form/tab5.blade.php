<div class="tab-pane active pb-4" id="tab_1">   
        <div id="div_fil_2" style="width:95%; margin:0 auto">
            <!-- FILA 1 -->
            <div class="row p-0 pb-4 mt-4">             
                <div class="col-lg-3 m-0 p-0">
                    <div class="mat-div mx-2">
                        <label for="first-name" class="mat-label">Luces Worth</label>
                        {!! Form::text('title', '', array('class' => 'mat-input', 'required' => 'required')) !!}
                    </div>
                </div>

                <div class="col-lg-3 m-0 p-0">
                    <div class="mat-div mx-2">
                        <label for="first-name" class="mat-label">Distancia (cm)</label>
                        {!! Form::text('title', '', array('class' => 'mat-input', 'required' => 'required')) !!}
                    </div>
                </div>

                <div class="col-lg-3 m-0 p-0">
                    <div class="mat-div mx-2">
                        <label for="first-name" class="mat-label">Ojo que suprime</label>
                        {!! Form::text('title', '', array('class' => 'mat-input', 'required' => 'required')) !!}
                    </div>
                </div>

                <div class="col-lg-3 m-0 p-0">
                    <div class="mat-div mx-2">
                        <label for="first-name" class="mat-label">Bagolini</label>
                        {!! Form::text('title', '', array('class' => 'mat-input', 'required' => 'required')) !!}
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
                    <div class="mat-div">
                        <label for="first-name" class="mat-label">Cerca</label>
                        {!! Form::text('title', '', array('class' => 'mat-input', 'required' => 'required')) !!}
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="mat-div">
                        <label for="first-name" class="mat-label">Lejos</label>
                        {!! Form::text('title', '', array('class' => 'mat-input', 'required' => 'required')) !!}
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
                    <div class="mat-div">
                        <label for="first-name" class="mat-label">Test Usado</label>
                        {!! Form::text('title', '', array('class' => 'mat-input', 'required' => 'required')) !!}
                    </div>
                </div>
            </div>
            <!-- / FILA 1 -->     

            <!-- FILA 2 -->
            <div class="row">             
                <div class="col-lg-6">
                    <div class="mat-div">
                        <label for="first-name" class="mat-label">RFNV VL</label>
                        {!! Form::text('title', '', array('class' => 'mat-input', 'required' => 'required')) !!}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mat-div">
                        <label for="first-name" class="mat-label">RFN VP</label>
                        {!! Form::text('title', '', array('class' => 'mat-input', 'required' => 'required')) !!}
                    </div>
                </div>
            </div>
            <!-- / FILA 2 -->        

            <!-- FILA 3 -->
            <div class="row">             
                <div class="col-lg-6">
                    <div class="mat-div">
                        <label for="first-name" class="mat-label">RFP VL</label>
                        {!! Form::text('title', '', array('class' => 'mat-input', 'required' => 'required')) !!}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mat-div">
                        <label for="first-name" class="mat-label">RFP VP</label>
                        {!! Form::text('title', '', array('class' => 'mat-input', 'required' => 'required')) !!}
                    </div>
                </div>
            </div>
            <!-- / FILA 3 -->        

            <!-- FILA 4 -->
            <div class="row mt-3">             
                <div class="col-lg-6">
                    <label for="first-name" style="font-size:14px; color: gray; font-weight:400">AA OI - VL</label>
                    <table class="col-12 table-bordered">
                        <?php 
                            for($i=0; $i<3; $i++){
                                echo "<tr>";
                                for($j=0; $j<3; $j++){
                        ?>
                                    <td>{!! Form::text('text'.($i+1).($j+1), '', array('class' => 'mat-input border-0 text-center', 'required' => 'required')) !!}</td>
                        <?php
                                }
                                echo "</tr>";
                            }
                        ?>
                    </table>
                </div>
                <div class="col-lg-6">
                    <label for="first-name" style="font-size:14px; color: gray; font-weight:400">AA OD - VL</label>
                    <table class="col-12 table-bordered">
                        <?php 
                            for($i=0; $i<3; $i++){
                                echo "<tr>";
                                for($j=0; $j<3; $j++){
                        ?>
                                    <td>{!! Form::text('text'.($i+1).($j+1), '', array('class' => 'mat-input border-0 text-center', 'required' => 'required')) !!}</td>
                        <?php
                                }
                                echo "</tr>";
                            }
                        ?>
                    </table>
                </div>                
            </div>
            <!-- / FILA 4 -->     

            <!-- FILA 5 -->
            <div class="row mt-3">             
                <div class="col-lg-6">
                    <label for="first-name" style="font-size:14px; color: gray; font-weight:400">AA OI - VP</label>
                    <table class="col-12 table-bordered">
                        <?php 
                            for($i=0; $i<3; $i++){
                                echo "<tr>";
                                for($j=0; $j<3; $j++){
                        ?>
                                    <td>{!! Form::text('text'.($i+1).($j+1), '', array('class' => 'mat-input border-0 text-center', 'required' => 'required')) !!}</td>
                        <?php
                                }
                                echo "</tr>";
                            }
                        ?>
                    </table>
                </div>
                <div class="col-lg-6">
                    <label for="first-name" style="font-size:14px; color: gray; font-weight:400">AA OD - VP</label>
                    <table class="col-12 table-bordered">
                        <?php 
                            for($i=0; $i<3; $i++){
                                echo "<tr>";
                                for($j=0; $j<3; $j++){
                        ?>
                                    <td>{!! Form::text('text'.($i+1).($j+1), '', array('class' => 'mat-input border-0 text-center', 'required' => 'required')) !!}</td>
                        <?php
                                }
                                echo "</tr>";
                            }
                        ?>
                    </table>
                </div>                
            </div>
            <!-- / FILA 5 -->

            <!-- FILA 6 -->
            <div class="row">             
                <div class="col-lg-6">
                    <div class="mat-div">
                        <label for="first-name" class="mat-label">Nivel visual OI</label>
                        {!! Form::text('title', '', array('class' => 'mat-input', 'required' => 'required')) !!}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mat-div">
                        <label for="first-name" class="mat-label">Nivel visual OD</label>
                        {!! Form::text('title', '', array('class' => 'mat-input', 'required' => 'required')) !!}
                    </div>
                </div>
            </div>
            <!-- / FILA 6 -->         

            <!-- FILA 7 -->
            <div class="row mt-3">             
                <div class="col-lg-12">
                    <div class="mat-div">
                        <label for="first-name" class="mat-label">Técnica</label>
                        {!! Form::text('title', '', array('class' => 'mat-input', 'required' => 'required')) !!}
                    </div>
                </div>
            </div>
            <!-- / FILA 7 -->

            <!-- FILA 8 -->
            <div class="row mt-3">             
                <div class="col-lg-6">
                    <div class="mat-div">
                        <label for="first-name" class="mat-label">Flexibidad OI</label>
                        {!! Form::text('title', '', array('class' => 'mat-input', 'required' => 'required')) !!}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mat-div">
                        <label for="first-name" class="mat-label">Flexibidad OD</label>
                        {!! Form::text('title', '', array('class' => 'mat-input', 'required' => 'required')) !!}
                    </div>
                </div>
            </div>
            <!-- / FILA 8 -->    
        </div>        
    </div> 
</div>