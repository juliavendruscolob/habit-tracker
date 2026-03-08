<p>
    Olá, {{ $name }}
</p>
<p>
    Meus hábitos são:
</p>
<ui>
    @foreach ($habits as $habit)
        <li>
            {{ $habit }}
        </li>
    @endforeach
</ui>