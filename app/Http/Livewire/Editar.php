<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Editar extends Component
{
    public $descripcion, $cantidad, $costo;

    public $productoid;

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

    public function mount($productoid)
    {
        $this->productoid = $productoid;
        $file = file_get_contents(storage_path("app/db.json"));
        $json = json_decode($file, true);
        $this->descripcion = $json[$productoid]["descripcion"];
        $this->cantidad = $json[$productoid]["cantidad"];
        $this->costo = $json[$productoid]["costo"];
    }

    public function submit()
    {
        $this->validate();
        if (file_exists(storage_path("app/db.json"))) {
            $file = file_get_contents(storage_path("app/db.json"));
            $json = json_decode($file, true);
            $json[$this->productoid] = [
                "descripcion" => $this->descripcion,
                "cantidad" => $this->cantidad,
                "costo" => $this->costo,
            ];

            $this->dispatchBrowserEvent('alerta3');
            $this->emit("renderTable");

            file_put_contents(storage_path("app/db.json"), json_encode($json));
        }
    }

    public function render()
    {
        return view('livewire.editar');
    }
}
