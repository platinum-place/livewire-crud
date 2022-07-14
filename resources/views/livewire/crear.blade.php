<div>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#crear_modal">
        Agregar producto
    </button>
    <div class="modal fade" id="crear_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registrar producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="submit">
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" type="text" wire:model="descripcion"
                                        placeholder="Descripcion" />
                                    <label for="descripcion">Descripcion</label>
                                </div>
                                @error('descripcion')
                                <span class="text-danger"> {{ $message }} </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input class="form-control" type="number" wire:model="cantidad"
                                        placeholder="Cantidad" />
                                    <label for="cantidad">Cantidad</label>
                                </div>
                                @error('cantidad')
                                <span class="text-danger"> {{ $message }} </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input class="form-control" type="number" wire:model="costo" placeholder="Costo"
                                        step=".01" />
                                    <label for="costo">Costo</label>
                                </div>
                                @error('costo')
                                <span class="text-danger"> {{ $message }} </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-success">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>