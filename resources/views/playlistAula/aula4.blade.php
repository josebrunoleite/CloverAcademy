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
                <li><a href="?valor=https://www.youtube.com/embed/vETPkwrDwQI?si=Zz6yBVNc1DQRvc-v-9" id="alterarImagem">Aula 1 - RACIOCÍNIO LÓGICO - PROPOSIÇÕES E TABELA VERDADE</a></li>
                <li><a href="?valor=https://www.youtube.com/embed/i8jbzEWEOYk?si=MPkEJX0wgQStnzaW" id="alterarImagem">Aula 2 - LÓGICA: CONECTIVOS LÓGICOS</a></li>
                <li><a href="?valor=https://www.youtube.com/embed/EmIGLGUO7cY?si=htZxlEzR32sF2Rlr" id="alterarImagem">Aula 3 - Decorando a tabela verdade com o Joselias. Raciocínio Lógico.</a></li>
                <li><a href="?valor=https://www.youtube.com/embed/SV7TL0hxmIQ?si=Y0SBxdhQKu6CJgsJ" id="alterarImagem">Aula 4 - Estruturas de Controle</a></li>
                <li><a href="?valor=https://www.youtube.com/embed/0su3MyulVSo?si=NtKyvA--GHt430U_" id="alterarImagem">Aula 5 - Funções</a></li>
            </ul>
        </div>
        <div class="content">
            <div class="container-fluid">
            <h1>Tebela Verdade</h1>
            <iframe width="800" height="450" class="img-fid" src="{{ $_GET['valor'] ?? 'https://www.youtube.com/embed/vETPkwrDwQI?si=Zz6yBVNc1DQRvc-v-9'}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            <div class="comments">
                <h3>Comentários</h3>
                <div class="comment-form">
                    <textarea id="commentText" placeholder="Digite seu comentário"></textarea>
                    <button onclick="adicionarComentario()">Adicionar Comentário</button>
                </div>
                <ul class="comments">

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