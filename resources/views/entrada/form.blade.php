
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('clave_cucop') }}</label>
    <div>
        {{ Form::text('clave_cucop', $entrada->clave_cucop, ['class' => 'form-control' .
        ($errors->has('clave_cucop') ? ' is-invalid' : ''), 'placeholder' => 'Clave Cucop']) }}
        {!! $errors->first('clave_cucop', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">entrada <b>clave_cucop</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('id_proveedor') }}</label>
    <div>
        {{ Form::text('id_proveedor', $entrada->id_proveedor, ['class' => 'form-control' .
        ($errors->has('id_proveedor') ? ' is-invalid' : ''), 'placeholder' => 'Id Proveedor']) }}
        {!! $errors->first('id_proveedor', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">entrada <b>id_proveedor</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('cantidad_entrada') }}</label>
    <div>
        {{ Form::text('cantidad_entrada', $entrada->cantidad_entrada, ['class' => 'form-control' .
        ($errors->has('cantidad_entrada') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad Entrada']) }}
        {!! $errors->first('cantidad_entrada', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">entrada <b>cantidad_entrada</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('fecha_entrada') }}</label>
    <div>
        {{ Form::text('fecha_entrada', $entrada->fecha_entrada, ['class' => 'form-control' .
        ($errors->has('fecha_entrada') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Entrada']) }}
        {!! $errors->first('fecha_entrada', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">entrada <b>fecha_entrada</b> instruction.</small>
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
