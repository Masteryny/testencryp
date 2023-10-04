<?php

namespace App\Livewire;

use App\Models\facturas_gastos;
use Livewire\Component;

class Bills extends Component
{
    public $openModal = false, $openModalEdit = false;
    public $codigoFactura, $fecha, $cantidadgalones, $montototal;
    public $facturaSel;
    public function render()
    {
        $facturas=facturas_gastos::all();
        return view('livewire.bills',compact('facturas'));
    }

    public function guardarfactura(){

        $factura = facturas_gastos::create([
            'codigoFactura' => $this->codigoFactura,
            'fecha' => $this->fecha,
            'cantidadgalones' => $this->cantidadgalones,
            'montototal' => $this->montototal,
            'estado'=> 1,
        ]);
        $this->openModal = false;

        }
        public function mostrarFactura($id){

            $this->facturaSel = facturas_gastos::find($id);
            $this->codigoFactura = $this->facturaSel->codigoFactura;
            $this->fecha = $this->facturaSel->fecha;
            $this->cantidadgalones = $this->facturaSel->cantidadgalones;
            $this->montototal = $this->facturaSel->montototal;
            $this->openModalEdit = true;
    
        }

        public function updateFactura(){

            $this->facturaSel->codigoFactura = $this->codigoFactura;
            $this->facturaSel->fecha = $this->fecha;
            $this->facturaSel->cantidadgalones = $this->cantidadgalones;
            $this->facturaSel->montototal = $this->montototal;
            $this->facturaSel->save();
    
            $this->openModalEdit = false;
    
        }

        public function eliminarFactura($id){

            $factura = facturas_gastos::find($id);
            $factura->delete();
    
        }
}