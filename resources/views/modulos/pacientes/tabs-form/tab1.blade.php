<div class="tab-pane active pb-4 pt-4" id="tab_1">       
    <div class="row">
        <div class="col-lg-3 pb-3">
            <div class="mat-div is-completed    ">
                <label for="first-name" class="mat-label">Tipo Documento *</label>
                {{ Form::select('tipodoc', $json_tipodoc, $paciente->tipodoc, array('class' => 'mat-input')) }}
            </div>
        </div>
        <div class="col-lg-3 pb-3">
            <div class="mat-div is-completed    ">
                <label for="first-name" class="mat-label">No. Documento ID *</label>
                {{ Form::text('numdoc', ucwords(strtolower($paciente->numdoc)), array('class' => 'mat-input')) }}
            </div>
        </div>
        <div class="col-lg-6 pb-3">
            <div class="mat-div is-completed">
                <label for="first-name" class="mat-label">E-Mail *</label>
                {{ Form::email('email', strtolower($paciente->email), array('class' => 'mat-input')) }}
            </div>
        </div>
        <div class="col-lg-3 pb-3">
            <div class="mat-div is-completed">
                <label for="first-name " class="mat-label">Primer Apellido *</label>
                {{ Form::text('surname1', ucwords(strtolower($paciente->surname1)), array('class' => 'mat-input')) }}
            </div>
        </div>
        <div class="col-lg-3 pb-3">
            <div class="mat-div is-completed">
                <label for="first-name " class="mat-label">Segundo Apellido *</label>
                {{ Form::text('surname2', ucwords(strtolower($paciente->surname2)), array('class' => 'mat-input')) }}
            </div>
        </div>

        <div class="col-lg-3 pb-3">
            <div class="mat-div is-completed">
                <label for="first-name " class="mat-label">Primer Nombre *</label>
                {{ Form::text('name1', ucwords(strtolower($paciente->name1)), array('class' => 'mat-input')) }}
            </div>
        </div>
        <div class="col-lg-3 pb-3">
            <div class="mat-div is-completed">
                <label for="first-name " class="mat-label">Segundo Nombre</label>
                {{ Form::text('name2', ucwords(strtolower($paciente->name2)), array('class' => 'mat-input')) }}
            </div>
        </div>
        <div class="col-lg-3 pb-3">
            <div class="mat-div is-completed">
                <label for="first-name" class="mat-label">Fecha Nacimiento *</label>
                {{ Form::date('birthdate', ucwords(strtolower($paciente->birthdate)), array('class' => 'mat-input')) }}
            </div>
        </div>
        <div class="col-lg-3 pb-3">
            <div class="mat-div is-completed">
                <label for="first-name" class="mat-label">Sexo *</label>
                {{ Form::select('sex', $json_sexo, $paciente->sex, array('class' => 'mat-input')) }}
            </div>
        </div>
    </div>            
</div>