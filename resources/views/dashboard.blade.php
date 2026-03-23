<x-layout>
    <main class="py-10 p-4">
        <h1>
            Dashboard
        </h1>

        <p>
            Bem vindo(a), {{ auth()->user()->name }}!
        </p>
    </main>
</x-layout>