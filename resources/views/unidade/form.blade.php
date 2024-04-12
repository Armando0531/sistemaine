
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('unidad_medida') }}</label>
    <div>
        {{ Form::text('unidad_medida', $unidade->unidad_medida, ['class' => 'form-control' .
        ($errors->has('unidad_medida') ? ' is-invalid' : ''), 'placeholder' => 'Unidad Medida']) }}
        {!! $errors->first('unidad_medida', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">unidade <b>unidad_medida</b> instruction.</small>
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
