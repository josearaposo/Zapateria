<x-app-layout>
    <div class="w-1/2 mx-auto">
        <form method="POST" action="{{ route('carritos.store', ['zapato' => $zapato]) }}">
            @csrf
            <!-- Zapato-->
            <h1
                class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">
                Zapato: {{ $zapato->denominacion }}
            </h1>

            <!-- Cantidad -->
            <div>

                    <x-input-label for="cantidad" :value="'Cantidad'" />
                    <x-text-input id="cantidad" class="block mt-1 w-full" type="text" name="cantidad" :value="old('cantidad')"
                        required autofocus autocomplete="cantidad" />
                    <x-input-error :messages="$errors->get('cantidad')" class="mt-2" />

            </div>

            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('zapatos.index') }}">
                    <x-secondary-button class="ms-4">
                        Volver
                        </x-primary-button>
                </a>
                <x-primary-button class="ms-4">
                    Añadir
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
