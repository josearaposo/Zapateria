<x-app-layout>
    <section class="bg-white dark:bg-gray-900">
        {{-- Contenido de cambios --}}
        <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Codigo
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Denominacion
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Precio
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Cantidad
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Total
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuario->carritos as $carrito)
                        <br>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                                {{ $carrito->zapato->codigo }}

                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                                {{ $carrito->zapato->denominacion }}

                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                                {{ $carrito->zapato->precio }}

                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <form action="{{ route('carritos.sumar', ['carrito' => $carrito]) }}" method="POST">
                                    @csrf

                                    <x-primary-button class="bg-red-500">
                                        +
                                    </x-primary-button>
                                </form>
                                {{ $carrito->cantidad }}
                                <form action="{{ route('carritos.restar', ['carrito' => $carrito]) }}" method="POST">
                                    @csrf

                                    <x-primary-button class="bg-red-500">
                                        -
                                    </x-primary-button>
                                </form>
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                                {{ $carrito->cantidad * $carrito->zapato->precio }}

                            </th>

                        </tr>
                        <td class="px-6 py-4">
                            <form action="{{ route('carritos.destroy', ['carrito' => $carrito]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <x-primary-button class="bg-red-500">
                                    Borrar
                                </x-primary-button>
                            </form>
                        </td>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="flex items-center justify-end mt-4">
            <a href="{{ route('carritos.vaciar') }}">
                <x-secondary-button class="ms-4">
                    Vaciar Carro
                    </x-primary-button>
            </a>
            <a href="{{ route('carritos.comprar') }}">
                <x-secondary-button class="ms-4">
                    Comprar
                    </x-primary-button>
            </a>
        </div>
    </section>
</x-app-layout>
