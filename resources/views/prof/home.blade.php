@extends('layouts.app')
@php
    $image = 'https://media.discordapp.net/attachments/945334195461447791/1154583427824238632/f8bf176f15f443de90971e6eef0b33a1.png';
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

    .tamanho {
        width: 80%;
    }

    .mxter {
        margin: 0 auto;
    }
    @media (max-width: 768px) {
    .mobi {
        display: flex;
        flex-direction: column !important;
    }
    }
</style>



@section('content')
    <div>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark d-flex justify-content-around">
                <div>
                  {{-- <a class="navbar-brand" href="#"></a>--}}
                    <a href="{{route('CreateCurso.show')}}" class="btn btn-success m-1">Requisitar Um Novo Curso</a>
                    <a href="{{route('CursoPend.tabela')}}" class="btn btn-info m-1">Andamento do Curso</a>
                </div>
                <div class="align-content-end ">
                    
                    <a href="{{route('Aula.create')}}" class="btn btn-info m-1">Criar Curso</a>
                    <a href="#" class="btn btn-danger m-1">Sair</a>
                </div>
            </nav>
        </div>
    </div>
    @php
    @endphp
    {{-- <div class="content-wrapper"> --}}
    <section class="content">
        <div class="container-fluid">
            <!-- Primeira linha com 4 cards -->
            <div class="">
                <div class="col-12 text-center mt-1">
                    <h2>Painel Do Professor</h2>
                    <div class="d-flex justify-content-center mt-1 flex-wrap">
                        @foreach ($cursos as $curso)
                        <div class="card tamanho">
                            <div class="card-body">
                                <div class="d-flex mobi justify-content-around ">
                                    <img src="{{ asset('curso/' . $curso->img) }}" style="width: 250px; height: 114px">
                                    <div>
                                        <p class="card-text">
                                        <div>

                                            Nome: {{$curso->nome}}

                                            <br>

                                            Professor: {{$curso->autor}}

                                            <br>

                                            tipo: {{$curso->tipo}}
                                            </p>
                                        </div>
                                        </p>
                                    </div>
                                    <div>
                                        <p class="card-text">
                                        <div>

                                            Duranção: {{$curso->duracio ?? 'Sem nenhuma aula'}}

                                            <br>

                                            Q.Alunos: {{$curso->possui ?? 'Ninguem Comprou'}}

                                            <br>

                                            Ultima Atualização: {{$curso->tipo}}

                                        </div>
                                        </p>
                                    </div>
                                    <div>
                                        <div class="text-center">
                                            @if ($curso->liberado === 'true')
                                                <a href="{{ url('alterarLiberado', $curso->id) }}"
                                                    class="btn btn-warning">Curso Liberado</a>
                                            @else
                                                <a href="#"
                                                    class="btn btn-primary">Curso Não Liberado</a>
                                            @endif
                                            <br>
                                            <a href="#" class="btn btn-success m-1">Informaçãos</a>
                                            <br>
                                            <a href="{{url('cursosDelete', $curso->id )}}" class="btn btn-danger m-1">Excluir</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        @endforeach
        

                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    {{-- </div> --}}
@endsection
