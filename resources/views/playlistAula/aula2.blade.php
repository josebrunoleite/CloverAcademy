@extends('layouts.app')
{{-- @php
    $linksAulas = [
        'Aula 1 - Introdução' => route('pagina.aula1'),
        'Aula 2 - Programação Básica' => route('pagina.aula2'),
        'Aula 3 - Estruturas de Controle' => route('pagina.aula3'),
        'Aula 4 - Funções' => route('pagina.aula4'),
    ];
@endphp --}}
<script>
function adicionarComentario() {
    var commentText = document.getElementById('commentText').value;
    if (commentText.trim() !== '') {
        var commentList = document.querySelector('.comments');
        var newComment = document.createElement('li');
        newComment.className = 'comment';
        
        var userName = '{{ auth()->user()->name }}';
        newComment.textContent = userName + ': ' + commentText;
        
        commentList.appendChild(newComment);
        document.getElementById('commentText').value = '';
    }
}
</script>
 <style>
        .container {
            display: flex;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }


        .content {
            width: 75%;
            padding: 20px;
        }

        .video {
            width: 100%;
            height: auto;
        }
        .img-fid{
            max-width: 100% !important;
            height: 80% !important;

        }
        @media (max-width: 768px) {
        .mobi {
            display: flex;
            flex-direction: column;
        }

    }
    </style>
@section('content')
    <div class="container mobi d-flex justify-content-bebetween">
        <div class="sidebar" style="margin: 0 40px 0 0">
            <ul class="">
                <h2>Aulas</h2>
                <li><a href="?valor=https://www.youtube.com/embed/2g0o0lzQin8?si=s_Nd1eKwwE5suCtz" id="alterarImagem">Aula 1 - Introdução à Teoria dos Conjuntos</a></li>
                <li><a href="?valor=https://www.youtube.com/embed/emJh9J0VnM8?si=y-T3akAiW2xZp4Rt" id="alterarImagem">Aula 2 - TEORIA DOS CONJUNTOS PARA CONCURSOS - Operações e Diagrama de Venn</a></li>
                <li><a href="?valor=https://www.youtube.com/embed/ZZmPGJ6IRyU?si=BWOg59kXIt_1G_oN" id="alterarImagem">Aula 3 - CONJUNTOS | QUER QUE DESENHE | DESCOMPLICA</a></li>
            </ul>
        </div>
        <div class="content">
            <div class="container-fluid">
            <h1>Teoria dos Conjuntos</h1>
            <iframe width="800" height="450" class="img-fid" src="{{ $_GET['valor'] ?? 'https://www.youtube.com/embed/2g0o0lzQin8?si=s_Nd1eKwwE5suCtz'}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            <button type="button" class="btn mt-1 btn-dark">Favoritar</button>
            <div class="comments">
                <h3>Comentários</h3>
                <div class="comment-form">
                    <textarea id="commentText" placeholder="Digite seu comentário"></textarea>
                    <button onclick="adicionarComentario()">Adicionar Comentário</button>
                </div>
                <ul class="comments">
                    <li class="comment">Fulano: Muito bom esse vídeo!</li>
                    <li class="comment">Ciclano: Parabéns!</li>
                </ul>
            </div>
            </div>
        </div>
    </div>
@endsection
<style>

    .comments {
        list-style: none;
        padding: 0;
    }

    .comment {
        border: 1px solid #ccc;
        margin-bottom: 10px;
        padding: 10px;
    }

    .comment-form {
        margin-top: 20px;
    }

    .comment-form textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        resize: none;
    }

    .comment-form button {
        margin-top: 10px;
        padding: 5px 10px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
</style>