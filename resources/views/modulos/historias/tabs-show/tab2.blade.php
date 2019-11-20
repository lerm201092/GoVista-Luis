<div class="tab-pane active pb-4 pt-4" id="tab_1">       
    <div class="row">
        <div class="col-md-6">
            <div class="mat-div is-completed">
            <label for="first-name" class="mat-label">Motivo de consulta</label>
            {!! Form::textarea('ana_motcon', null, array('class' => 'mat-input', 'rows' => 3, 'cols' => 54, 'style' => 'resize:none' )) !!}
            </div>
        </div>     
        <div class="col-md-6">
            <div class="mat-div is-completed">
            <label for="first-name" class="mat-label">Enfermedad actual</label>
            {!! Form::textarea('ana_enferact', null, array('class' => 'mat-input', 'rows' => 3, 'cols' => 54, 'style' => 'resize:none' )) !!}
            </div>
        </div>   
    </div>            
</div>