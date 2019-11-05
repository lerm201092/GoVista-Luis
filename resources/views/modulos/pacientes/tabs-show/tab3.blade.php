<div class="tab-pane pb-4  pt-4" id="tab_1">       
    <div class="row">
        <div class="col-md-6 pb-3">
            <div class="mat-div is-completed    ">
                <label for="first-name" class="mat-label">Dirección</label>
                <input disabled type="text" class="mat-input" value="{{ $paciente[0]->address }}" >
            </div>
        </div>
        <div class="col-md-6 pb-3">
            <div class="mat-div is-completed">
                <label for="first-name" class="mat-label">Teléfono</label>
                <input disabled type="text" class="mat-input" value="{{ $paciente[0]->phone }}">
            </div>
        </div>
        <div class="col-md-6 pb-3">
            <div class="mat-div is-completed">
                <label for="first-name " class="mat-label">Zona</label>
                <input disabled type="text" class="mat-input" value=" {{ $paciente[0]->zone == 'U' ? 'Urbana' : 'Rural' }}">
            </div>
        </div>
        <div class="col-md-6 pb-3">
            <div class="mat-div is-completed">
                <label for="first-name" class="mat-label">Ciudad de Residencia</label>
                <input disabled type="text" class="mat-input"  value="{{ ucwords(strtolower($paciente[0]->municipio.' ( '.$paciente[0]->dpto.' )')) }}">
            </div>
        </div>
    </div>            
</div>