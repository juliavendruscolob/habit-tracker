<x-layout>
    <main class="py-10 min-h-[calc(100vh-160px)]">
        <h1 class="font-bold text-4xl text-center">
            Dashboard
        </h1>

        <a href="{{ route('habits.create') }}" class="p-2 border-2 bg-white font-bold inline-block mb-4">
            Cadastrar hábito
        </a>

        @session('success')
            <div class="flex">
                <p class="bg-green-100 border-2 border-green-400 text-green-700 p-2 mb-4 rounded-lg shadow-sm">
                    {{ session('success') }}
                </p>
            </div>
        @endsession

        <p>
            Bem vindo(a), {{ auth()->user()->name }}!
        </p>

        <div>
            <h2 class="text-xl mt-4 mb-4">
                Listagem dos Hábitos
            </h2>
            <ul class="flex flex-col gap-2 list-disc list-inside">
                @forelse ($habits as $habit)
                    <li class="flex items-center gap-3 mb-2">
                        <span class="h-1.5 w-1.5 rounded-full bg-black flex-shrink-0"></span>

                        <span class="text-black">
                            {{ $habit->name }}
                        </span>

                        <a href="{{ route('habits.edit', $habit->id) }}"
                            class="bg-white text-blue-600 p-1 px-2 text-[10px] font-bold rounded border border-gray-200 shadow-sm">
                            Editar
                        </a>

                        <form action="{{ route('habits.destroy', $habit) }}" method="POST" class="flex items-center">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                class="bg-red-500 text-white p-1 px-2 text-[10px] font-bold rounded cursor-pointer hover:bg-red-600 transition-colors">
                                Apagar
                            </button>
                        </form>
                    </li>
                @empty
                @endforelse
            </ul>
        </div>
    </main>
</x-layout>