<x-mail::message>
# {{$seriesName}} criada

A série {{$seriesName}} com {{$seasonQtd}} e {{$episodesBySeason}} foi criada.
Acesse aqui:

<x-mail::button :url="''">
Ver série
</x-mail::button>

Obrigado,<br>
{{ config('app.name') }}
</x-mail::message>
