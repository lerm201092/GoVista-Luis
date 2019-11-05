<div class="tab-pane pb-4  pt-4" id="tab_1">       
    <div class="row">
        <div class="col-md-6 pb-3">
            <div class="mat-div is-completed">
                <label for="first-name" class="mat-label">Apellidos del Padre</label>
                {{ Form::text('father_surname', ucwords(strtolower($paciente->father_surname)), array('class' => 'mat-input')) }}
            </div>
        </div>
        <div class="col-md-6 pb-3">
            <div class="mat-div is-completed">
                <label for="first-name" class="mat-label">Nombres del Padre</label>
                {{ Form::text('father_name', ucwords(strtolower($paciente->father_name)), array('class' => 'mat-input')) }}
            </div>
        </div>
        <div class="col-md-6 pb-3">
            <div class="mat-div is-completed">
                <label for="first-name " class="mat-label">Teléfono - Móvil</label>
                {{ Form::text('father_phone', ucwords(strtolower($paciente->father_phone)), array('class' => 'mat-input')) }}
            </div>
        </div>
        <div class="col-md-6 pb-3">
            <div class="mat-div is-completed">
                <label for="first-name" class="mat-label">E-Mail</label>
                {{ Form::text('father_email', strtolower($paciente->father_email), array('class' => 'mat-input')) }}
            </div>
        </div>

        <div class="col-md-6 pb-3">
            <div class="mat-div is-completed">
                <label for="first-name" class="mat-label">Apellidos del Madre</label>
                {{ Form::text('mother_surname', ucwords(strtolower($paciente->mother_surname)), array('class' => 'mat-input')) }}
            </div>
        </div>
        <div class="col-md-6 pb-3">
            <div class="mat-div is-completed">
                <label for="first-name" class="mat-label">Nombres del Madre</label>
                {{ Form::text('mother_name', ucwords(strtolower($paciente->mother_name)), array('class' => 'mat-input')) }}
            </div>
        </div>
        <div class="col-md-6 pb-3">
            <div class="mat-div is-completed">
                <label for="first-name " class="mat-label">Teléfono - Móvil</label>
                {{ Form::text('mother_phone', ucwords(strtolower($paciente->mother_phone)), array('class' => 'mat-input')) }}
            </div>
        </div>
        <div class="col-md-6 pb-3">
            <div class="mat-div is-completed">
                <label for="first-name" class="mat-label">E-Mail</label>
                {{ Form::text('mother_emailS', strtolower($paciente->mother_email), array('class' => 'mat-input')) }}
            </div>
        </div>
    </div>            
</div>