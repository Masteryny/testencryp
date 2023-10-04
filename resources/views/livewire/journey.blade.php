<div>

    <div class="text-center p-4">
        <h1 class="font-semibold text-3xl">Viajes</h1>
    </div>

    <div class="text-end">
        <button wire:click="$set('openModal', true)" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Crear Viajes</button>
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
                        Conductor
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Fecha
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Hora Salida
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kilometraje Salida
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Hora Llegada
                    </th>
                    <th scope="col" class="px-6 py-3">
                        kilometrajellegada
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Lugar
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Facturas Gastos
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Objetivos de la Visita
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Acciones
                    </th>
                </tr>
                </thead>
                <tbody>
                    @foreach($viajes as $viaje)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">
                            {{$viaje->id}}
                        </td>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$viaje->id_conductores}}
                        </th>
                        <td class="px-6 py-4">
                            {{$viaje->fecha}}
                        </td>
                        <td class="px-6 py-4">
                            {{$viaje->horasalida}}
                        </td>
                        <td class="px-6 py-4">
                            {{$viaje->kilometrajesalida}}
                        </td>
                        <td class="px-6 py-4">
                            {{$viaje->horallegada}}
                        </td>
                        <td class="px-6 py-4">
                            {{$viaje->kilometrajellegada}}
                        </td>
                        <td class="px-6 py-4">
                            {{$viaje->id_lugares}}
                        </td>
                        <td class="px-6 py-4">
                            {{$viaje->id_facturas_gastos}}
                        </td>
                        <td class="px-6 py-4">
                            {{$viaje->objetivovisita}}
                        </td>
                        <td class="px-6 py-4">
                            <x-button wire:click="mostrarViaje({{$viaje->id}})">Editar</x-button>
                            <x-danger-button wire:click="eliminarViajes({{$viaje->id}})">Eliminar</x-danger-button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
    </div>

    <!-- Main modal -->
    <x-dialog-modal wire:model="openModal">
        <x-slot name="title">
            Crear Viaje
        </x-slot>
        <x-slot name="content">
            <div class="py-4">
                <label>Conductor</label>
                <x-input wire:model="id_conductores"></x-input>
                @error('id_conductores') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="py-4">
                <label for="fecha">Fecha</label>
                <x-input type="date" id="fecha" wire:model="fecha"></x-input>
                @error('fecha') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="py-4">
                <label for="horasalida">Hora de Salida</label>
                <x-input type="time" id="horasalida" wire:model="horasalida"></x-input>
                @error('horasalida') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="py-4">
                <label>Kilometraje de Salida</label>
                <x-input wire:model="kilometrajesalida"></x-input>
                @error('kilometrajesalida') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="py-4">
                <label for="horallegada">Hora de Llegada</label>
                <x-input type="time" id="horallegada" wire:model="horallegada"></x-input>
                @error('horallegada') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="py-4">
                <label>Kilometraje de Llegada</label>
                <x-input wire:model="kilometrajellegada"></x-input>
                @error('kilometrajellegada') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="py-4">
                <label>Lugar</label>
                <x-input wire:model="id_lugares"></x-input>
                @error('id_lugares') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="py-4">
                <label>Facturas</label>
                <x-input wire:model="id_facturas_gastos"></x-input>
                @error('id_facturas_gastos') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="py-4">
                <label>Objetvio de la Visita</label>
                <x-input wire:model="objetivovisita"></x-input>
                @error('objetivovisita') <span class="error">{{ $message }}</span> @enderror
            </div>

        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$set('openModal', false)">Cancelar</x-secondary-button>
            <x-button wire:click="guardarViaje">Guardar</x-button>
        </x-slot>

    </x-dialog-modal>

    <x-dialog-modal wire:model="openModalEdit">
        <x-slot name="title">
            Editar Vehiculo
        </x-slot>
        <x-slot name="content">
            <div class="py-4">
                <label>Conductor</label>
                <x-input wire:model="id_conductores"></x-input>
                @error('id_conductores') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="py-4">
                <label for="fecha">Fecha</label>
                <x-input type="date" id="fecha" wire:model="fecha"></x-input>
                @error('fecha') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="py-4">
                <label for="horasalida">Hora de Salida</label>
                <x-input type="time" id="horasalida" wire:model="horasalida"></x-input>
                @error('horasalida') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="py-4">
                <label>Kilometraje de Salida</label>
                <x-input wire:model="kilometrajesalida"></x-input>
                @error('kilometrajesalida') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="py-4">
                <label for="horallegada">Hora de Llegada</label>
                <x-input type="time" id="horallegada" wire:model="horallegada"></x-input>
                @error('horallegada') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="py-4">
                <label>Kilometraje de Llegada</label>
                <x-input wire:model="kilometrajellegada"></x-input>
                @error('kilometrajellegada') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="py-4">
                <label>Lugar</label>
                <x-input wire:model="id_lugares"></x-input>
                @error('id_lugares') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="py-4">
                <label>Facturas</label>
                <x-input wire:model="id_facturas_gastos"></x-input>
                @error('id_facturas_gastos') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="py-4">
                <label>Objetvio de la Visita</label>
                <x-input wire:model="objetivovisita"></x-input>
                @error('objetivovisita') <span class="error">{{ $message }}</span> @enderror
            </div>

        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$set('openModalEdit', false)">Cancelar</x-secondary-button>
            <x-button wire:click="updateViajes">Guardar</x-button>
        </x-slot>

    </x-dialog-modal>



</div>