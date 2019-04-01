<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{config('app.name')}} - @yield('title')</title>

{{-- Styles --}}

<link rel="stylesheet" href="/css/app.css">

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ asset('js/jquery-3.3.1.min.js') }}" defer></script>
