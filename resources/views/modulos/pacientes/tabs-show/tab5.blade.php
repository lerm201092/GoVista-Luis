<div class="tab-pane pb-4  pt-4" id="tab_1">       
    <div class="row">
        <div class="col-md-6 pb-3">
            <div class="mat-div is-completed">
                <label for="first-name" class="mat-label">Apellidos del Padre</label>
                <input disabled type="text" class="mat-input" value="{{ ucwords(strtolower($paciente[0]->father_surname)) }}" >
            </div>
        </div>
        <div class="col-md-6 pb-3">
            <div class="mat-div is-completed">
                <label for="first-name" class="mat-label">Nombres del Padre</label>
                <input disabled type="text" class="mat-input" value="{{ ucwords(strtolower($paciente[0]->father_name)) }}">
            </div>
        </div>
        <div class="col-md-6 pb-3">
            <div class="mat-div is-completed">
                <label for="first-name " class="mat-label">Teléfono - Móvil</label>
                <input disabled type="text" class="mat-input" value="{{  $paciente[0]->father_phone  }}">
            </div>
        </div>
        <div class="col-md-6 pb-3">
            <div class="mat-div is-completed">
                <label for="first-name" class="mat-label">E-Mail</label>
                <input disabled type="text" class="mat-input"  value="{{ $paciente[0]->father_email }}">
            </div>
        </div>

        <div class="col-md-6 pb-3">
            <div class="mat-div is-completed">
                <label for="first-name" class="mat-label">Apellidos del Madre</label>
                <input disabled type="text" class="mat-input" value="{{ ucwords(strtolower($paciente[0]->mother_surname)) }}" >
            </div>
        </div>
        <div class="col-md-6 pb-3">
            <div class="mat-div is-completed">
                <label for="first-name" class="mat-label">Nombres del Madre</label>
                <input disabled type="text" class="mat-input" value="{{ ucwords(strtolower($paciente[0]->mother_name)) }}">
            </div>
        </div>
        <div class="col-md-6 pb-3">
            <div class="mat-div is-completed">
                <label for="first-name " class="mat-label">Teléfono - Móvil</label>
                <input disabled type="text" class="mat-input" value="{{ $paciente[0]->mother_phone }}">
            </div>
        </div>
        <div class="col-md-6 pb-3">
            <div class="mat-div is-completed">
                <label for="first-name" class="mat-label">E-Mail</label>
                <input disabled type="text" class="mat-input" value="{{ $paciente[0]->mother_email }}">
            </div>
        </div>
    </div>            
</div>