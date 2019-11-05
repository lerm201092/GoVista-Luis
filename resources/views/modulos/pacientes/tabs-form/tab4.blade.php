<div class="tab-pane pb-4  pt-4" id="tab_1">       
    <div class="row">
        <div class="col-lg-6 pb-3">
            <div class="mat-div is-completed">
                <label for="first-name" class="mat-label">Apellidos</label>
                {{ Form::text('contact_surnames', ucwords(strtolower($paciente->contact_surnames)), array('class' => 'mat-input')) }}
            </div>
        </div>
        <div class="col-lg-6 pb-3">
            <div class="mat-div is-completed">
                <label for="first-name" class="mat-label">Nombres</label>
                {{ Form::text('contact_names', ucwords(strtolower($paciente->contact_names)), array('class' => 'mat-input')) }}
            </div>
        </div>
        <div class="col-lg-4 pb-3">
            <div class="mat-div is-completed">
                <label for="first-name " class="mat-label">Departamento</label>
                {{ Form::select('dptocontact_cmb', $json_dpto, $json_area['contacto'], array('class' => 'mat-input', 'id' => 'dptocontact_cmb', 'onchange' => 'onchange_dpto($(this))', 'munid_cmb' => 'muncontact_cmb')) }}
            </div>
        </div>
        <div class="col-lg-4 pb-3">
            <div class="mat-div is-completed">
                <label for="first-name" class="mat-label">Ciudad</label>
                {{ Form::select('contact_city', $json_municipio['contacto'], $paciente->contact_city, array('class' => 'mat-input', 'id' => 'muncontact_cmb')) }}
            </div>
        </div>
        <div class="col-lg-4 pb-3">
            <div class="mat-div is-completed">
                <label for="first-name" class="mat-label">Teléfono</label>
                {{ Form::text('contact_phone', ucwords(strtolower($paciente->contact_phone)), array('class' => 'mat-input')) }}
            </div>
        </div>
    </div>            
</div>