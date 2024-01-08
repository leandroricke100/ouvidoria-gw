@php
    $css = '';

    if (isset($cor)) {
        $css = 'color:' . $cor . ';';
    }

@endphp

<script></script>


<button class="botao" style="{{ $css }}">{{ $texto ?? 'Sem título' }}</button>


@include('components.botao', [
    'cor' => 'red',
    'texto' => 'Acessar',
    'link' => 'https://google.com.br',
])
