<header class="bg-white border-b-2 flex items-center justify-between p-4">
    <a href="{{ route('habits.index') }}" class="habit-btn habit-shadow-lg px-2 py-1 habit-orange bg-habit-orange">
        HT
    </a>

    <div class="flex items-center gap-4">
        github

        @auth
            <form action={{ route('auth.logout') }} method="POST" class="inline">
                @csrf
                <button type="submit" class="habit-shadow-lg habit-btn p-2 border-2">
                    Sair
                </button>
            </form>
        @endauth

        @guest
            <div class="flex gap-2">

                <a href={{ route('auth.register') }} class="p-2 habit-shadow-lg bg-white">
                    Registrar
                </a>

                <a href={{ route('auth.login') }} class="p-2 habit-shadow-lg bg-habit-orange">
                    Login
                </a>
            </div>
        @endguest
    </div>
</header>