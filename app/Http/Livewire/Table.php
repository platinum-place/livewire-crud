<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Table extends Component
{
    public $cantidad, $total, $json = [];

    protected $listeners = ["renderTable" => '$refresh'];

    public function delete($id)
    {
        $file = file_get_contents(storage_path("app/db.json"));
        $json = json_decode($file, true);
        unset($json[$id]);
        file_put_contents(storage_path("app/db.json"), json_encode($json));
        $this->dispatchBrowserEvent('alerta2');
    }

    public function render()
    {
        if (file_exists(storage_path("app/db.json"))) {
            $file = file_get_contents(storage_path("app/db.json"));
            $this->json = json_decode($file, true);
        }
        return view('livewire.table', [
            "json" => $this->json
        ]);
    }
}
