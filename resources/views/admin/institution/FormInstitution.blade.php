@csrf
<!--  -->
{{-- <div>
    <label class="form-label" for="id">Codigo:</label>
    <input class="form-control" type="text" name="id" id="id" placeholder="Ingrese el codigo"
        value="{{ old('id', $institution) }}">
    @error('id')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror
</div> --}}
<!-- -->

<div>
    <label class="form-label" for="name">Nombre institución:</label>
    <input class="form-control" type="text" name="name" id="name" placeholder="Ingrese la institución"
        value="{{ old('name', $institution) }}">
    @error('name')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror
</div>



<div>
    <label class="form-label" for="rector">Rector:</label>
    <input class="form-control" type="text" name="rector" id="rector" placeholder="Rector"
        value="{{ old('rector', $institution) }}">
    @error('rector')
        <div class="text-small text-danger">{{ $message }}</div>|||||
    @enderror
</div>



<!-- -->
<div>
    <label class="form-label">Zona:</label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="zone" id="urbano" value="Urbano"
            @checked(old('zone', $institution)=='Urbano') checked>

        <label class="form-check-label" for="urbano">Urbano</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="zone" id="rural" value="Rural"
            @checked(old('zone', $institution) == 'Rural')>
        <label class="form-check-label" for="rural">Rural</label>
    </div>
    @error('zone')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror
</div>
<!--  -->

<!--  -->
<div>
    <label class="form-label" for="address">Dirección:</label>
    <input class="form-control" type="text" name="address" id="address" placeholder="Direccion"
        value="{{ old('address', $institution) }}">
    @error('address')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror
</div>
<!-- -->
<div>
    <label class="form-label" for="phone">Telefono:</label>
    <input class="form-control" type="text" name="phone" id="phone" placeholder="Telefono"
        value="{{ old('phone', $institution) }}">
    @error('phone')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror
</div>

<div>
    <label class="form-label" for="email">Email:</label>
    <input class="form-control" type="text" name="email" id="email" placeholder="Email"
        value="{{ old('email', $institution) }}">
    @error('email')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror
</div>
