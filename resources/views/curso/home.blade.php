@extends('layouts.app')
@php
    $image = 'https://media.discordapp.net/attachments/945334195461447791/1129585612979195974/98177127_p0.jpg';
    $outraVariavel = "
    <div class='card' style='width: 250px;'>
        <img src='{$image}'  class='card-img-top' alt='Imagem'>
        <div class='card-body'>
            <h5 class='card-title'>Nome do Card 1</h5>
            <p class='card-text'>Valor do Card 1</p>
        </div>
    </div>";
@endphp

<style>
    .hr {
        border: 10px solid black;
    }

    .custom-card {
        min-width: 10rem;
        max-width: 30rem;
        border: 1px solid #ccc;
        border-radius: 10px;
        transition: transform 0.2s;
    }

    .custom-card:hover {
        transform: translateY(-5px);
    }

    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }

    .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
    }

    .bi {
        vertical-align: -.125em;
        fill: currentColor;
    }

    .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
    }

    .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
    }

    .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
    }

    .bd-mode-toggle {
        z-index: 1500;
    }

    .bd-mode-toggle .dropdown-menu .active .bi {
        display: block !important;
    }
</style>

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.min.js"></script>

    {{-- <div class="content-wrapper"> --}}
    <section class="content">
        <div class="container-fluid">
            <!-- Primeira linha com 4 cards -->

            <div class="container-fluid">
                <div class="col-12 text-center">
                    <h2>Cursos Recomendados</h2>
                </div>

                {{-- @dd($cursos); --}}
                <div class="row">
                    {{--  @for ($i = 0; $i < 4; $i++) --}}

                    @foreach ($cursos as $curso)
                        <div class="card shadow-sm" style="max-width: 40%; max-height: 20%; margin: 10px">
                            <title>{{ $curso->nome }}</title>
                            <img src="{{ asset('curso/' . $curso->img) }}" alt=""
                                style="max-width: 100%; max-height: 120px;">

                            <div class="card-body">
                                <h5 class="card-title">{{ $curso->nome }}.</h5>
                                <p class="card-text">{{ $curso->duracio ?? 'sem descrição' }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="{{$curso->valor}}">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                    </div>
                                </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{-- #endfor --}}
                </div>
            </div>
        </div>

    </section>

    {{-- </div> --}}
@endsection
