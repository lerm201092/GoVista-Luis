<div class="tab-pane pb-4  pt-4" id="tab_1">       
    <div class="row">
        <div class="col-md-6 pb-3">
            <div class="mat-div is-completed    ">
                <label for="first-name" class="mat-label">Dirección</label>
                {{ Form::text('address', ucwords(strtolower($paciente->address)), array('class' => 'mat-input')) }}
            </div>
        </div>
        <div class="col-md-6 pb-3">
            <div class="mat-div is-completed">
                <label for="first-name" class="mat-label">Teléfono</label>
                {{ Form::text('phone', ucwords(strtolower($paciente->phone)), array('class' => 'mat-input')) }}
            </div>
        </div>
        <div class="col-md-4 pb-3">
            <div class="mat-div is-completed">
                <label for="first-name" class="mat-label">Departamento</label>
                {{ Form::select('dpto_cmb', $json_dpto, $json_area['paciente'], array('class' => 'mat-input', 'id' => 'dpto_cmb', 'onchange' => 'onchange_dpto($(this))', 'munid_cmb' => 'munpac_cmb')) }}
            </div>
        </div>
        <div class="col-md-4 pb-3">
            <div class="mat-div is-completed">
                <label for="first-name" class="mat-label">Ciudad</label>
                {{ Form::select('id_area', $json_municipio['paciente'], $paciente->id_area, array('class' => 'mat-input', 'id' => 'munpac_cmb')) }}
            </div>
        </div>
        <div class="col-md-4 pb-3">
            <div class="mat-div is-completed">
                <label for="first-name " class="mat-label">Zona</label>
                {{ Form::select('zone', $json_zona, $paciente->zone, array('class' => 'mat-input')) }}
            </div>
        </div>

    </div>            
</div>