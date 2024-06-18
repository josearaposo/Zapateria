
<x-app-layout>
    <div class="w-1/2 mx-auto">
        <form method="POST" action="{{ route('zapatos.update', ['zapato' => $zapato]) }}">
            @csrf
            @method('PUT')

            <!-- Codigo -->
            <div>
                <x-input-label for="codigo" :value="'Codigo del zapato'" />
                <x-text-input id="codigo" class="block mt-1 w-full" type="text" name="codigo" :value="old('codigo', $zapato->codigo)"
                    required autofocus autocomplete="codigo" />
                <x-input-error :messages="$errors->get('codigo')" class="mt-2" />
            </div>
            <!-- Denominacion -->
            <div>
                <x-input-label for="denominacion" :value="'Denominacion del zapato'" />
                <x-text-input id="denominacion" class="block mt-1 w-full" type="text" name="denominacion" :value="old('denominacion', $zapato->denominacion)"
                    required autofocus autocomplete="denominacion" />
                <x-input-error :messages="$errors->get('denominacion')" class="mt-2" />
            </div>

            <!-- Precio -->
            <div>
                <x-input-label for="precio" :value="'Precio del zapato'" />
                <x-text-input id="precio" class="block mt-1 w-full" type="text" name="precio" :value="old('precio', $zapato->precio)"
                    required autofocus autocomplete="precio" />
                <x-input-error :messages="$errors->get('precio')" class="mt-2" />
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
