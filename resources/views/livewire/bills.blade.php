<div>

    <div class="text-center p-4">
        <h1 class="font-semibold text-3xl">Facturas Gastos</h1>
    </div>

    <div class="text-end">
        <button wire:click="$set('openModal', true)" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Crear Pagos Factura</button>
    </div>

    <div class="p-4">
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Id
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Codigo de Factura
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Fecha
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Cantidad de Galones
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Monto Total
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Estado
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Acciones
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($facturas as $factura)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">
                            {{$factura->id}}
                        </td>
                        <td class="px-6 py-4">
                            {{$factura->codigoFactura}}
                        </td>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$factura->fecha}}
                        </th>
                        <td class="px-6 py-4">
                            {{$factura->cantidadgalones}}
                        </td>
                        <td class="px-6 py-4">
                            {{$factura->montototal}}
                        </td>
                        <td class="px-6 py-4">
                            {{$factura->estado}}
                        </td>
                        <td class="px-6 py-4">
                            <x-button wire:click="mostrarFactura({{$factura->id}})">Editar</x-button>
                            <x-danger-button wire:click="eliminarFactura({{$factura->id}})">Eliminar</x-danger-button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
    </div>

    <!-- Main modal -->
    <x-dialog-modal wire:model="openModal">
        <x-slot name="title">
            Crear Registro Factura
        </x-slot>
        <x-slot name="content">
            <div class="py-4">
                <label>Codigo de Factura</label>
                <x-input wire:model="codigoFactura"></x-input>
                @error('codigoFactura') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="py-4">
                <label for="fecha">Fecha</label>
                <x-input type="date" id="fecha" wire:model="fecha"></x-input>
                @error('fecha') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="py-4">
                <label>Cantidad de Galones</label>
                <x-input wire:model="cantidadgalones"></x-input>
                @error('cantidadgalones') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="py-4">
                <label>Monto Total</label>
                <x-input wire:model="montototal"></x-input>
                @error('montototal') <span class="error">{{ $message }}</span> @enderror
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$set('openModal', false)">Cancelar</x-secondary-button>
            <x-button wire:click="guardarfactura">Guardar</x-button>
        </x-slot>

    </x-dialog-modal>

    <x-dialog-modal wire:model="openModalEdit">
        <x-slot name="title">
            Editar Vehiculo
        </x-slot>
        <x-slot name="content">
            <div class="py-4">
                <label>Codigo de Factura</label>
                <x-input wire:model="codigoFactura"></x-input>
                @error('codigoFactura') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="py-4">
                <label for="fecha">Fecha</label>
                <x-input type="date" id="fecha" wire:model="fecha"></x-input>
                @error('fecha') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="py-4">
                <label>Cantidad de Galones</label>
                <x-input wire:model="cantidadgalones"></x-input>
                @error('cantidadgalones') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="py-4">
                <label>Monto Total</label>
                <x-input wire:model="montototal"></x-input>
                @error('montototal') <span class="error">{{ $message }}</span> @enderror
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$set('openModalEdit', false)">Cancelar</x-secondary-button>
            <x-button wire:click="updateFactura">Guardar</x-button>
        </x-slot>

    </x-dialog-modal>



</div>