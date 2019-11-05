<div class="tab-pane pb-4 pt-4" id="tab_1">       
    <div class="row">
        <div class="col-md-9 pb-3">
            <div class="mat-div is-completed">
                <label for="first-name" class="mat-label">Entidad Promotora de Salud</label>
                {{ Form::select('id_eps', $json_eps, $paciente->id_eps, array('class' => 'mat-input')) }}
            </div>
        </div>
        <div class="col-md-3 pb-3">
            <div class="mat-div is-completed">
                <label for="first-name" class="mat-label">Estado</label>
                {{ Form::select('state', $json_estado, $paciente->state, array('class' => 'mat-input')) }}
            </div>
        </div>        
    </div>            
</div>