<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddPokemon extends Component
{
    public $nombre, $tipo, $pokemonid;

    protected $rules = [
        "nombre" => "required",
        "tipo" => "required",
    ];

    protected $messages = [
        "nombre.required" => "No es posible crear un pokemon sin un nombre",
        "tipo.required" => "Los pokemon siempre tienen un tipo",
    ];

    public function mount($id = null)
    {
        $this->pokemonid = $id;
        $file = file_get_contents(storage_path("app/db.json"));
        $json = json_decode($file, true);
        foreach ($json as $key => $value) {
            if ($key == $id) {
                $this->nombre = $value["nombre"];
                $this->tipo = $value["tipo"];
            }
        }
    }

    public function submit()
    {
        $this->validate();
        if (file_exists(storage_path("app/db.json"))) {
            $file = file_get_contents(storage_path("app/db.json"));
            $json = json_decode($file, true);

            if ($this->pokemonid != null) {
                $json[$this->pokemonid] = [
                    "nombre" => $this->nombre,
                    "tipo" => $this->tipo
                ];
                $this->reset(["nombre", "tipo"]);
                file_put_contents(storage_path("app/db.json"), json_encode($json));
                session()->flash("info_alert", "Pokemon " . $this->pokemonid . " actualizado");
                return redirect()->to("/");
            } else {
                $json[] = [
                    "nombre" => $this->nombre,
                    "tipo" => $this->tipo
                ];
                $this->reset(["nombre", "tipo"]);
                $this->emit("renderTable");
                file_put_contents(storage_path("app/db.json"), json_encode($json));
                session()->flash("success_alert", "Pokemon registrado");
            }
        } else {
            session()->flash("danger_alert", "No se encuentra el archivo db.json en la ruta storage/app");
        }
    }

    public function render()
    {
        return view('livewire.add-pokemon');
    }
}
