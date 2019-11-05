<div class="tab-pane active pb-4 pt-4" id="tab_1">       
    <div class="row">
        <div class="col-md-6 pb-3">
            <div class="mat-div is-completed    ">
                <label for="first-name" class="mat-label">Identificación</label>
                <input disabled type="text" class="mat-input" value="{{ '('.$paciente[0]->tipodoc.') '.$paciente[0]->numdoc }}" >
            </div>
        </div>
        <div class="col-md-6 pb-3">
            <div class="mat-div is-completed">
                <label for="first-name" class="mat-label">E-Mail</label>
                <input disabled type="text" class="mat-input" value="{{ strtolower($paciente[0]->email) }}">
            </div>
        </div>
        <div class="col-md-6 pb-3">
            <div class="mat-div is-completed">
                <label for="first-name " class="mat-label">Apellidos</label>
                <input disabled type="text" class="mat-input" value="{{ ucwords(strtolower($paciente[0]->surname1.' '.$paciente[0]->surname2)) }}">
            </div>
        </div>

        <div class="col-md-6 pb-3">
            <div class="mat-div is-completed">
                <label for="first-name" class="mat-label">Nombres</label>
                <input disabled type="text" class="mat-input"  value="{{ ucwords(strtolower($paciente[0]->name1.' '.$paciente[0]->name2)) }}">
            </div>
        </div>
        <div class="col-md-6 pb-3">
            <div class="mat-div is-completed">
                <label for="first-name" class="mat-label">Fecha Nacimiento</label>
                <input disabled type="text" class="mat-input" value="{{ $paciente[0]->birthdate }}">
            </div>
        </div>
        <div class="col-md-6 pb-3">
            <div class="mat-div is-completed">
                <label for="first-name" class="mat-label">Sexo</label>
                <input disabled type="text" class="mat-input" value=" {{ $paciente[0]->sex == 'M' ? 'Masculino' : 'Femenino' }}">
            </div>
        </div>
    </div>            
</div>