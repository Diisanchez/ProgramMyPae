@csrf
<!--  -->
{{-- <div>
    <label class="form-label" for="code">Codigo:</label>
    <input class="form-control" type="text" name="code" id="code" placeholder="Ingrese el codigo"
        value="{{ old('code', $remittance) }}">
    @error('code')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror
</div> --}}
<!-- -->
<div>
    <label class="form-label">Descripcion:</label>
    <textarea class="form-control" name="description" id="" cols="30" rows="10" disabled>{{ old('description', $remittance) }}</textarea>
    @error('description')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror
</div>
<!-- -->
<div>
    <label class="form-label" for="name">Instituciones:</label>
    <select class="form-control" name="institution_id" id="institution_id"disabled>
        <option value="0" selected>Seleccione una institución </option>
        <!-- old() función que obtiene el valor anterior en la recarga de un formulario
            o el valor asignado  -->
        @isset($institutions)
            @foreach ($institutions as $institution)
                <option value="{{ $institution->id }}"
                    @isset($remittance)
                        @selected(old('institution_id', $remittance) == $remittance->institution->id)
                    @else
                        @selected(old('institution_id', $remittance) == $institution->id)
                    @endisset>
                    {{ $institution->name }}
                </option>
            @endforeach
        @endisset
    </select>
    @error('institution_id')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror
</div>
<!--  -->

<!--  -->
<div>
    <label class="form-label" for="weight">Existencia:</label>
    <input class="form-control" type="number" name="stock" id="stock" value="{{ old('stock', $remittance) }}"
        placeholder="Existencias" disabled>
    @error('stock')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror
</div>
<!-- -->
<div>
    <label class="form-label" for="height">Cantidad de estudiantes:</label>
    <input class="form-control" type="number" name="numberStudent" id="numberStudent"
        value="{{ old('numberStudent', $remittance) }}" placeholder="Estudiante" disabled>
    @error('numberStudent')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror
</div>
<!-- imagen -->
<div>
    <label for="customFile" class="form-label">Imagen:</label>
    <div class="custom-file">

    </div>
    @error('image')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror
</div>

<br>
<div class="d-flex justify-content-center">
    <img name="image" id="preview-image-before-upload"
        src="@isset($remittance)
        {{ asset('storage/remittances/' . $remittance->image) }}
    @else
    {{ asset('img/upload-image.png') }}
    @endisset"
        alt="Previsualizar imagen" class="image-preview">
</div
