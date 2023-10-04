<?php

namespace App\Livewire;

use App\Models\vehiculos;
use Livewire\Component;

class Autos extends Component
{
    public $openModal = false, $openModalEdit = false;
    public $TipoVehiculo, $Marca, $Modelo, $Año, $Kilometraje;
    public $vehiculoSel;

    public function render()
    {
        $vehiculos = vehiculos::all();
        return view('livewire.autos', compact('vehiculos'));
    }

    public function guardarVehiculo(){

        $vehiculo = vehiculos::create([
            'TipoVehiculo' => $this->TipoVehiculo,
            'Marca' => $this->Marca,
            'Modelo' => $this->Modelo,
            'Año' => $this->Año,
            'Kilometraje'=> $this->Kilometraje,
            'Estado'=> 1
        ]);

        $this->openModal = false;

    }
    public function mostrarVehiculo($id){

        $this->vehiculoSel = vehiculos::find($id);
        $this->TipoVehiculo = $this->vehiculoSel->TipoVehiculo;
        $this->Marca = $this->vehiculoSel->Marca;
        $this->Modelo = $this->vehiculoSel->Modelo;
        $this->Año = $this->vehiculoSel->Año;
        $this->Kilometraje = $this->vehiculoSel->Kilometraje;
        $this->openModalEdit = true;

    }

    public function updateVehiculo(){


        $this->vehiculoSel->TipoVehiculo = $this->TipoVehiculo;
        $this->vehiculoSel->Marca = $this->Marca;
        $this->vehiculoSel->Modelo = $this->Modelo;
        $this->vehiculoSel->Año = $this->Año;
        $this->vehiculoSel->Kilometraje = $this->Kilometraje;

        $this->vehiculoSel->save();

        $this->openModalEdit = false;

    }

    public function eliminarVehiculo($id){

        $vehiculo = vehiculos::find($id);

        $vehiculo->delete();

    }
}
