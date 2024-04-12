
<div class="form-group mb-3">
    <label class="form-label">Nombre del proveedor</label>
    <div>
        {{ Form::text('nombre_prove', $proveedore->nombre_prove, ['class' => 'form-control' .
        ($errors->has('nombre_prove') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Prove']) }}
        {!! $errors->first('nombre_prove', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">proveedore <b>nombre_prove</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">Dirección</label>
    <div>
        {{ Form::text('direccion', $proveedore->direccion, ['class' => 'form-control' .
        ($errors->has('direccion') ? ' is-invalid' : ''), 'placeholder' => 'Direccion']) }}
        {!! $errors->first('direccion', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">proveedore <b>direccion</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">Correo electrónico</label>
    <div>
        {{ Form::text('email', $proveedore->email, ['class' => 'form-control' .
        ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
        {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">proveedore <b>email</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">Teléfono</label>
    <div>
        {{ Form::text('telefono', $proveedore->telefono, ['class' => 'form-control' .
        ($errors->has('telefono') ? ' is-invalid' : ''), 'placeholder' => 'Telefono']) }}
        {!! $errors->first('telefono', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">proveedore <b>telefono</b> instruction.</small>
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
