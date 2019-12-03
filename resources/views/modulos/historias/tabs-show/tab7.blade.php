<div class="tab-pane active pb-4 pt-4" id="tab_1">       
    <div class="row">
        <div class="col-12">
            <table class="col-12">
                <thead>
                    <tr style="border-bottom: 3px solid #dea5e8;">
                        <th class="text-center">Nombre Ejercicio</th>
                        <th class="text-center">N° Sesiones</th>
                        <th class="text-center">Tamaño</th>
                        <th class="text-center">Tiempo (Minutos)</th>
                    </tr>
                </thead>
                <tbody>


                    @for ($i = 0; $i < 13; $i++)
                        <?php $aux = ""; $j=$i+1; $session = ""; $size = "";  $duration = ""; ?>
                        @foreach($historia_ejercicio as $array)
                            @if($j == $array->id_exercise)
                                <?php 
                                    $aux        = "checked"; 
                                    $session    = $array->session;
                                    $size       = $array->size;
                                    $duration   = $array->duration;
                                ?>

                            @endif
                        @endforeach
                        <tr class='border border-top-0 border-right-0 border-left-0'>
                            <td class="px-1 py-3">
                                <div class="form-check">
                                    <label class="form-check-label pt-4">
                                        <input disabled <?=($aux)?> type="checkbox" class="form-check-input mr-2" value="<?=($i)?>" style="width:25px; height:25px;margin-top:-2px;">&nbsp;&nbsp;&nbsp;Ejecicio <?=($i+1)?>
                                    </label>
                                </div>
                            </td>
                            <td class="px-1 py-3 text-center">
                                <div class="mat-div is-completed">
                                    <label for="first-name" class="mat-label"></label>
                                    {!! Form::text('title', $session, array('class' => 'mat-input text-center', 'disabled')) !!}
                                </div>
                            </td>
                            <td class="px-1 py-3 text-center">
                                <div class="mat-div is-completed">
                                    <label for="first-name" class="mat-label"></label>
                                    {{ Form::select('size['.$i.']', $visual_acuity , $size, array('class' => 'mat-input text-center', 'disabled')) }}
                                </div>
                            </td>
                            <td class="px-1 py-3 text-center">
                                <div class="mat-div is-completed">
                                    <label for="first-name" class="mat-label"></label>
                                    {!! Form::text('title', $duration, array('class' => 'mat-input  text-center', 'disabled')) !!}
                                </div>
                            </td>
                        </tr>
                    @endfor
                </tbody>

            </table>
        </div>     
    </div>            
</div>