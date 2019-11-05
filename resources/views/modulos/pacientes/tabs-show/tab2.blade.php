<div class="tab-pane pb-4 pt-4" id="tab_1">       
    <div class="row">
        <div class="col-md-9 pb-3">
            <div class="mat-div is-completed">
                <label for="first-name" class="mat-label">Entidad Promotora de Salud</label>
                <input disabled type="text" class="mat-input" value="{{ ucwords(strtolower($paciente[0]->eps)) }}" >
            </div>
        </div>
        <div class="col-md-3 pb-3">
            <div class="mat-div is-completed">
                <label for="first-name" class="mat-label">Estado</label>
                <input disabled type="text" class="mat-input" value="{{ ( $paciente[0]->state='AC' ) ? 'Activo' : 'Inactivo' }}">
            </div>
        </div>        
    </div>            
</div>