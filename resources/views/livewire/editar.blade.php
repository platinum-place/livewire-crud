<form wire:submit.prevent="submit">
    <div class="row mb-3">
        <div class="col-md-4">
            <div class="form-floating mb-3 mb-md-0">
                <input class="form-control" type="text" wire:model="descripcion" placeholder="Descripcion" />
                <label for="descripcion">Descripcion</label>
            </div>
            @error('descripcion')<span class="text-danger"> {{ $message }} </span>@enderror
        </div>
        <div class="col-md-4">
            <div class="form-floating">
                <input class="form-control" type="number" wire:model="cantidad" placeholder="Cantidad" />
                <label for="cantidad">Cantidad</label>
            </div>
            @error('cantidad')<span class="text-danger"> {{ $message }} </span>@enderror
        </div>
        <div class="col-md-4">
            <div class="form-floating">
                <input class="form-control" type="number" wire:model="costo" placeholder="Costo" step=".01" />
                <label for="costo">Costo</label>
            </div>
            @error('costo')<span class="text-danger"> {{ $message }} </span>@enderror
        </div>
    </div>
    <button type="submit" class="btn btn-success">Actualizar</button>
</form>