
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('clave_cucop') }}</label>
    <div>
        {{ Form::text('clave_cucop', $salida->clave_cucop, ['class' => 'form-control' .
        ($errors->has('clave_cucop') ? ' is-invalid' : ''), 'placeholder' => 'Clave Cucop']) }}
        {!! $errors->first('clave_cucop', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">salida <b>clave_cucop</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('id_usuario') }}</label>
    <div>
        {{ Form::text('id_usuario', $salida->id_usuario, ['class' => 'form-control' .
        ($errors->has('id_usuario') ? ' is-invalid' : ''), 'placeholder' => 'Id Usuario']) }}
        {!! $errors->first('id_usuario', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">salida <b>id_usuario</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('id_area_administrativa') }}</label>
    <div>
        {{ Form::text('id_area_administrativa', $salida->id_area_administrativa, ['class' => 'form-control' .
        ($errors->has('id_area_administrativa') ? ' is-invalid' : ''), 'placeholder' => 'Id Area Administrativa']) }}
        {!! $errors->first('id_area_administrativa', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">salida <b>id_area_administrativa</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('cantidad_salida') }}</label>
    <div>
        {{ Form::text('cantidad_salida', $salida->cantidad_salida, ['class' => 'form-control' .
        ($errors->has('cantidad_salida') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad Salida']) }}
        {!! $errors->first('cantidad_salida', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">salida <b>cantidad_salida</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('fecha_salida') }}</label>
    <div>
        {{ Form::text('fecha_salida', $salida->fecha_salida, ['class' => 'form-control' .
        ($errors->has('fecha_salida') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Salida']) }}
        {!! $errors->first('fecha_salida', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">salida <b>fecha_salida</b> instruction.</small>
    </div>
</div>

    <div class="form-footer">
        <div class="text-end">
            <div class="d-flex">
                <a href="#" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-primary ms-auto ajax-submit">Submit</button>
            </div>
        </div>
    </div>
