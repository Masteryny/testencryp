<?php

namespace App\Livewire;

use App\Models\Vehicle;
use Livewire\Component;

class Vehiculo extends Component
{
    public $openModal = false, $openModalEdit = false;

    public $tipo, $marca, $modelo;
    public $vehiculoSel;

    protected $rules = [
        'tipo' => 'required|min:3|string',
        'marca' => 'required|min:3',
        'modelo'  => 'required|min:3|integer'
    ];

    public function render()
    {
        $vehiculos = Vehicle::all();
        return view('livewire.vehiculo', compact('vehiculos'));
    }

    public function guardarVehiculo(){

        $this->validate();

        $vehiculo = Vehicle::create([
            'tipo' => $this->tipo,
            'marca' => $this->marca,
            'modelo' => $this->modelo
        ]);

        
        $this->tipo='';
        $this->marca='';
        $this->modelo='';
        

        $this->openModal = false;

    }

    public function mostrarVehiculo($id){

        $this->vehiculoSel = Vehicle::find($id);
        $this->tipo = $this->vehiculoSel->tipo;
        $this->marca = $this->vehiculoSel->marca;
        $this->modelo = $this->vehiculoSel->modelo;
        $this->openModalEdit = true;

    }

    public function updateVehiculo(){

        $this->validate();

        $this->vehiculoSel->tipo = $this->tipo;
        $this->vehiculoSel->marca = $this->marca;
        $this->vehiculoSel->modelo = $this->modelo;

        $this->vehiculoSel->save();

        $this->openModalEdit = false;

    }

    public function eliminarVehiculo($id){

        $vehiculo = Vehicle::find($id);

        $vehiculo->delete();

    }
}
