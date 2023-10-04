<?php

namespace App\Livewire;

use App\Models\viajes;
use Livewire\Component;

class Journeys extends Component
{
    public $openModal = false, $openModalEdit = false;
    public $id_conductores, $fecha, $horasalida, $kilometrajesalida, $horallegada, $kilometrajellegada, $id_lugares,
    $id_facturas_gastos,  $objetivovisita, $estado;
    public $journeySel;

    public function render()
    {
        $viajes = viajes::all();
        return view('livewire.journey',compact('viajes'));
    }


    
    public function guardarViaje(){

        $viaje = viajes::create([
            'id_conductores' => $this->id_conductores,
            'fecha' => $this->fecha,
            'horasalida' => $this->horasalida,
            'kilometrajesalida' => $this->kilometrajesalida,
            'horallegada'=> $this->horallegada,
            'kilometrajellegada'=> $this->kilometrajellegada,
            'id_lugares'=> $this->id_lugares,
            'id_facturas_gastos'=> $this->id_facturas_gastos,
            'objetivovisita'=> $this->objetivovisita,
            'Estado'=> 1
        ]);

        $this->openModal = false;

    }
    public function mostrarViaje($id){

        $this->journeySel = viajes::find($id);
        $this->id_conductores = $this->journeySel->id_conductores;
        $this->fecha = $this->journeySel->fecha;
        $this->horasalida = $this->journeySel->horasalida;
        $this->kilometrajesalida = $this->journeySel->kilometrajesalida;
        $this->horallegada = $this->journeySel->horallegada;
        $this->kilometrajellegada = $this->journeySel->kilometrajellegada;
        $this->id_facturas_gastos = $this->journeySel->id_facturas_gastos;
        $this->objetivovisita = $this->journeySel->objetivovisita;
        $this->openModalEdit = true;

    }

    public function updateViajes(){


        $this->journeySel->id_conductores = $this->id_conductores;
        $this->journeySel->fecha = $this->fecha;
        $this->journeySel->horasalida = $this->horasalida;
        $this->journeySel->kilometrajesalida = $this->kilometrajesalida;
        $this->journeySel->horallegada = $this->horallegada;
        $this->journeySel->kilometrajellegada = $this->kilometrajellegada;
        $this->journeySel->id_facturas_gastos = $this->id_facturas_gastos;
        $this->journeySel->objetivovisita = $this->objetivovisita;
        
        $this->journeySel->save();

        $this->openModalEdit = false;

    }
    
    public function eliminarViajes($id){

        $viaje = viajes::find($id);
        $viaje->delete();

    }

}
