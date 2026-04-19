<x-layout>
    <main class="py-10 p-4">
        <h1 class="font-bold text-4xl text-center">
            Dashboard
        </h1>

        <a href="{{ route('habit.create') }}" class="p-2 border-2 bg-white font-bold inline-block mb-4">
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

                    <li class="pl-4 text-black">
                        <span class="inline">
                            {{ $habit->name }}
                        </span>
                    </li>
                @empty
                    <p>
                        Ainda não há nenhum hábito cadastrado.
                    </p>
                    <a href="{{ route('habit.create') }}" class="bg-white p-2 border-2">
                        Cadastre um novo hábito
                    </a>
                @endforelse
            </ul>
        </div>
    </main>
</x-layout>