Editar
<x-app-layout>
    <div class="w-1/2 mx-auto">
        <form method="POST" action="{{ route('zapatos.update', ['zapato' => $zapato]) }}">
            @csrf
            @method('PUT')

            <!-- Codigo -->
            <div>
                <x-input-label for="marca" :value="'Marca del zapato'" />
                <x-text-input id="marca" class="block mt-1 w-full" type="text" name="marca" :value="old('marca', $zapato->marca)"
                    required autofocus autocomplete="marca" />
                <x-input-error :messages="$errors->get('marca')" class="mt-2" />
            </div>
            <!-- Denominacion -->
            <div>
                <x-input-label for="modelo" :value="'Modelo del zapato'" />
                <x-text-input id="modelo" class="block mt-1 w-full" type="text" name="modelo" :value="old('modelo', $zapato->modelo)"
                    required autofocus autocomplete="modelo" />
                <x-input-error :messages="$errors->get('modelo')" class="mt-2" />
            </div>

            <!-- Precio -->
            <div>
                <x-input-label for="modelo" :value="'Modelo del zapato'" />
                <x-text-input id="modelo" class="block mt-1 w-full" type="text" name="modelo" :value="old('modelo', $zapato->modelo)"
                    required autofocus autocomplete="modelo" />
                <x-input-error :messages="$errors->get('modelo')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('zapatos.index') }}">
                    <x-secondary-button class="ms-4">
                        Volver
                        </x-primary-button>
                </a>
                <x-primary-button class="ms-4">
                    Editar
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
