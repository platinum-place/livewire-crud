<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Crear extends Component
{
    public $descripcion, $cantidad, $costo;

    protected $rules = [
        "descripcion" => "required",
        "cantidad" => "required",
        "costo" =>  "required",
    ];

    protected $messages = [
        "descripcion.required" => "Es necesario registrar una descriocion breve",
        "cantidad.required" => "Es necesario una cantidad",
        "costo.required" => "Es necesario tener un costo del producto",
    ];

    public function submit()
    {
        $this->validate();
        if (file_exists(storage_path("app/db.json"))) {
            $file = file_get_contents(storage_path("app/db.json"));
            $json = json_decode($file, true);
            $json[] = [
                "descripcion" => $this->descripcion,
                "cantidad" => $this->cantidad,
                "costo" => $this->costo,
            ];

            $this->reset();

            $this->dispatchBrowserEvent('alerta');
            $this->emit("renderTable");

            file_put_contents(storage_path("app/db.json"), json_encode($json));
        }
    }

    public function render()
    {
        return view('livewire.crear');
    }
}
