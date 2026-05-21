@props([
    'content' => 'Salvar',
    'class' => 'btn btn-primary w-full normal-case font-semibold',
])

<button @class([$class])
        type="submit">

    {{ $content }}

</button>
