<div class="tab-pane active pb-4 pt-4" id="tab_1">       
    <div class="row">
        <div class="col-12">
            <table class="col-12">
                <thead>
                    <tr style="border-bottom: 3px solid #dea5e8;">
                        <th class="text-center">Nombre Ejercicio</th>
                        <th class="text-center">N° Sesiones</th>
                        <th class="text-center">Tamaño</th>
                        <th class="text-center">Tiempo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        for($i=0; $i < 13; $i++){
                            echo "<tr class='border border-top-0 border-right-0 border-left-0'>";
                    ?>
                        <td class="px-1 py-3">
                            <div class="form-check">
                                <label class="form-check-label pt-4">
                                    <input type="checkbox" class="form-check-input mr-2" value="" style="width:25px; height:25px;margin-top:-2px;">&nbsp;&nbsp;&nbsp;Ejecicio <?=($i+1)?>
                                </label>
                            </div>
                        </td>
                        <td class="px-1 py-3 text-center">
                            <div class="mat-div">
                                <label for="first-name" class="mat-label"> . . . </label>
                                {!! Form::text('title', null, array('class' => 'mat-input')) !!}
                            </div>
                        </td>
                        <td class="px-1 py-3 text-center">
                            <div class="mat-div">
                                <label for="first-name" class="mat-label"> . . . </label>
                                {!! Form::text('title', null, array('class' => 'mat-input')) !!}
                            </div>
                        </td>
                        <td class="px-1 py-3 text-center">
                            <div class="mat-div">
                                <label for="first-name" class="mat-label"> . . . </label>
                                {!! Form::text('title', null, array('class' => 'mat-input')) !!}
                            </div>
                        </td>
                    <?php
                            echo "</tr>";
                        }
                    ?>
                </tbody>

            </table>
        </div>     
    </div>            
</div>