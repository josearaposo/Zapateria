<x-app-layout>
    <div class="relative overflow-x-auto w-3/4 mx-auto shadow-md sm:rounded-lg">
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
                </tr>
            </thead>
            <tbody>
                @foreach ($zapatos as $zapato)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a class="text-blue-500 blue" href="{{ route('zapatos.show', $zapato) }}">
                                {{$zapato->codigo }}
                            </a>
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a class="text-blue-500 blue" href="{{ route('zapatos.show', $zapato) }}">
                                {{$zapato->denominacion }}
                            </a>
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a class="text-blue-500 blue" href="{{ route('zapatos.show', $zapato) }}">
                                {{$zapato->precio}}
                            </a>
                        </th>

                        <td class="px-6 py-4">
                            <a href="{{ route('carritos.create', ['zapato' => $zapato]) }}"
                                class="font-medium text-green-600 dark:text-green-500 hover:underline">
                                <x-primary-button>
                                    Añadir al carrito
                                </x-primary-button>
                            </a>
                        </td>
                        <td class="px-6 py-4">
                            <form action="{{ route('zapatos.destroy', ['zapato' => $zapato]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <x-primary-button class="bg-red-500">
                                    Borrar
                                </x-primary-button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <form action="{{ route('zapatos.create') }}" class="flex justify-center mt-4 mb-4">
            <x-primary-button class="bg-green-500 mb-2">Insertar un nuevo zapato</x-primary-button>
        </form>
    </div>
</x-app-layout>
