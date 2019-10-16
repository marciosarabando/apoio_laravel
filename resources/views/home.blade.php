@extends('layouts.app')

@section('content')

<div class="container">
<br>
<center>
    <p>
        Olá, seja bem vindo!
        {{ Auth::user()->cargo->nome }} {{ Auth::user()->nm_guerra }}
    </p>
</center>

</div>
@endsection
