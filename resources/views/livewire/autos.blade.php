<div>

    <div class="text-center p-4">
        <h1 class="font-semibold text-3xl">Vehiculos</h1>
    </div>

    <div class="text-end">
        <button wire:click="$set('openModal', true)" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Crear Vehiculo</button>
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
                        Tipo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Marca
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Modelo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Año
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kilometraje
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Acciones
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($vehiculos as $vehiculo)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">
                            {{$vehiculo->id}}
                        </td>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$vehiculo->TipoVehiculo}}
                        </th>
                        <td class="px-6 py-4">
                            {{$vehiculo->Marca}}
                        </td>
                        <td class="px-6 py-4">
                            {{$vehiculo->Modelo}}
                        </td>
                        <td class="px-6 py-4">
                            {{$vehiculo->Año}}
                        </td>
                        <td class="px-6 py-4">
                            {{$vehiculo->Kilometraje}}
                        </td>
                        <td class="px-6 py-4">
                            <x-button wire:click="mostrarVehiculo({{$vehiculo->id}})">Editar</x-button>
                            <x-danger-button wire:click="eliminarVehiculo({{$vehiculo->id}})">Eliminar</x-danger-button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
    </div>

    <!-- Main modal -->
    <x-dialog-modal wire:model="openModal">
        <x-slot name="title">
            Crear Vehiculo
        </x-slot>
        <x-slot name="content">
            <div class="py-4">
                <label>Tipo</label>
                <x-input wire:model="TipoVehiculo"></x-input>
                @error('TipoVehiculo') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="py-4">
                <label>Marca</label>
                <x-input wire:model="Marca"></x-input>
                @error('Marca') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="py-4">
                <label>Modelo</label>
                <x-input wire:model="Modelo"></x-input>
                @error('Modelo') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="py-4">
                <label>Año</label>
                <x-input wire:model="Año"></x-input>
                @error('Año') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="py-4">
                <label>Kilometraje</label>
                <x-input wire:model="Kilometraje"></x-input>
                @error('Kilometraje') <span class="error">{{ $message }}</span> @enderror
            </div>

        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$set('openModal', false)">Cancelar</x-secondary-button>
            <x-button wire:click="guardarVehiculo">Guardar</x-button>
        </x-slot>

    </x-dialog-modal>

    <x-dialog-modal wire:model="openModalEdit">
        <x-slot name="title">
            Editar Vehiculo
        </x-slot>
        <x-slot name="content">
            <div class="py-4">
                <label>Tipo</label>
                <x-input wire:model="TipoVehiculo"></x-input>
                @error('TipoVehiculo') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="py-4">
                <label>Marca</label>
                <x-input wire:model="Marca"></x-input>
                @error('Marca') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="py-4">
                <label>Modelo</label>
                <x-input wire:model="Modelo"></x-input>
                @error('Modelo') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="py-4">
                <label>Año</label>
                <x-input wire:model="Año"></x-input>
                @error('Año') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="py-4">
                <label>Kilometraje</label>
                <x-input wire:model="Kilometraje"></x-input>
                @error('Kilometraje') <span class="error">{{ $message }}</span> @enderror
            </div>

        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$set('openModalEdit', false)">Cancelar</x-secondary-button>
            <x-button wire:click="updateVehiculo">Guardar</x-button>
        </x-slot>

    </x-dialog-modal>



</div>