<div class="tab-pane pb-4  pt-4" id="tab_1">       
    <div class="row">
        <div class="col-md-6 pb-3">
            <div class="mat-div is-completed">
                <label for="first-name" class="mat-label">Apellidos</label>
                <input disabled type="text" class="mat-input" value="{{ ucwords(strtolower($paciente[0]->contact_surnames)) }}" >
            </div>
        </div>
        <div class="col-md-6 pb-3">
            <div class="mat-div is-completed">
                <label for="first-name" class="mat-label">Nombres</label>
                <input disabled type="text" class="mat-input" value="{{ ucwords(strtolower($paciente[0]->contact_names)) }}">
            </div>
        </div>
        <div class="col-md-6 pb-3">
            <div class="mat-div is-completed">
                <label for="first-name " class="mat-label">Ciudad</label>
                <input disabled type="text" class="mat-input" value="{{ ucwords(strtolower($paciente[0]->municipio_contact.' ( '.$paciente[0]->dpto_contact.' )')) }}">
            </div>
        </div>
        <div class="col-md-6 pb-3">
            <div class="mat-div is-completed">
                <label for="first-name" class="mat-label">Teléfono</label>
                <input disabled type="text" class="mat-input"  value="{{ $paciente[0]->contact_phone }}">
            </div>
        </div>
    </div>            
</div>