
<div class="form-group mb-3">
    <label class="form-label"> Nombre del área</label>
    <div>
        {{ Form::text('nombre_area', $areasadmin->nombre_area, ['class' => 'form-control' .
        ($errors->has('nombre_area') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Area']) }}
        {!! $errors->first('nombre_area', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">areasadmin <b>nombre_area</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">Encargado del área</label>
    <div>
        {{ Form::text('nombre_encargado', $areasadmin->nombre_encargado, ['class' => 'form-control' .
        ($errors->has('nombre_encargado') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Encargado']) }}
        {!! $errors->first('nombre_encargado', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">areasadmin <b>nombre_encargado</b> instruction.</small>
    </div>
</div>

    <div class="form-footer">
        <div class="text-end">
            <div class="d-flex">
                <a href="#" class="btn btn-danger">Cancelar</a>
                <button type="submit" class="btn btn-primary ms-auto ajax-submit">Aceptar</button>
            </div>
        </div>
    </div>
