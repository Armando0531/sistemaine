
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('nombre_articulo') }}</label>
    <div>
        {{ Form::text('nombre_articulo', $producto->nombre_articulo, ['class' => 'form-control' .
        ($errors->has('nombre_articulo') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Articulo']) }}
        {!! $errors->first('nombre_articulo', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">producto <b>nombre_articulo</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('descripcion') }}</label>
    <div>
        {{ Form::text('descripcion', $producto->descripcion, ['class' => 'form-control' .
        ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
        {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">producto <b>descripcion</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">{{ Form::label('id_categoria', 'Categoría') }}</label>
    <div>
        {{ Form::select('id_categoria', $categorias, $producto->id_categoria, ['class' => 'form-control' . ($errors->has('id_categoria') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione una categoría']) }}
        {!! $errors->first('id_categoria', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

<div class="form-group mb-3">
    <label class="form-label">{{ Form::label('unidad_medida_id', 'Unidad de Medida') }}</label>
    <div>
        {{ Form::select('unidad_medida_id', $unidadesMedida, $producto->unidad_medida_id, ['class' => 'form-control' . ($errors->has('unidad_medida_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione una unidad de medida']) }}
        {!! $errors->first('unidad_medida_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('fecha_vencimiento') }}</label>
    <div>
        {{ Form::text('fecha_vencimiento', $producto->fecha_vencimiento, ['class' => 'form-control' .
        ($errors->has('fecha_vencimiento') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Vencimiento']) }}
        {!! $errors->first('fecha_vencimiento', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">producto <b>fecha_vencimiento</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('clave_cucop') }}</label>
    <div>
        {{ Form::text('clave_cucop', $producto->clave_cucop, ['class' => 'form-control' .
        ($errors->has('clave_cucop') ? ' is-invalid' : ''), 'placeholder' => 'Clave Cucop', 'maxlength' => '13']) }}
        {!! $errors->first('clave_cucop', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">producto <b>clave_cucop</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('cantidad') }}</label>
    <div>
        {{ Form::text('cantidad', $producto->cantidad, ['class' => 'form-control' .
        ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
        {!! $errors->first('cantidad', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">producto <b>cantidad</b> instruction.</small>
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
