@extends('layouts.app')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center" style="height: 100%; margin: 0 auto;">
                <div class="col-md-6">
                    <!-- Formulário -->
                    
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Adicionar Nova Aula</h3>
                        </div>
                        
                            @if (session('error'))
                            <div class="card-header card-color-sucess">
                            <h3 class="card-title">{{ session('error') }}</h3>
                            </div>
                            @endif
                            @if (session('success'))
                            <div class="card-header card-color-sucess">
                            <h3 class="card-title">{{ session('success') }}</h3>
                        </div>
                            @endif
                       
                        <form action="{{ route('Aula.store') }}" method="post">
                            @csrf
                            @method('POST')
                            <div class="card-body">
                                <!-- Aula -->
                                <div class="form-group">
                                    <label for="nomeAula">Nome da Aula</label>
                                    <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Digite o nome da aula">
                                </div>
                                <!-- Vídeo -->
                                <div class="form-group">
                                    <label for="linkVideo">Link para o Vídeo</label>
                                    <input type="text" class="form-control" name="video" id="video" placeholder="Cole o link do vídeo">
                                </div>
                                <!-- Qual Tipo de Curso -->
                                    <div class="form-group">
                                        <label for="exampleSelect">Selecione uma opção:</label>
                                        <select class="form-control" name="curso" id="curso">
                                            <option value="Eletronica">Eletronica</option>
                                            <option value="Robotica">Robotica</option>
                                            <option value="Analise de Sistema">Analise de Sistema</option>
                                        </select>
                                    </div>
                                <!-- Descrição -->
                                <div class="form-group">
                                    <label for="summernote">Conteúdo</label>
                                    <textarea class="form-control" id="summernote" name="conteudo"></textarea>
                                </div>
                                    {{--<div class="form-group">
                                    <label for="conteudoSummernote">Conteúdo do Summernote</label>
                                    <textarea class="form-control" id="conteudoSummernote" name="conteudoSummernote"></textarea>
                                </div> --}}
                                <div class="form-group">
                                    <label for="comentarioAutor">Comentário do Autor</label>
                                    <textarea class="form-control" name="comentarioAutor" id="comentarioAutor" rows="4" name="comentarioAutor" placeholder="Digite o comentário do autor"></textarea>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
@section("styles")
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">

{{-- <script>
    $(document).ready(function() {
        $('#conteudoSummernote').summernote({
            height: 300, // Altura do editor
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['insert', ['link', 'picture', 'table', 'hr']],
                ['view', ['fullscreen', 'codeview']],
            ],
        });
    });
</script> --}}
<script>
    $('.summernote').summernote({
  height: 150,   //set editable area's height
  codemirror: { // codemirror options
    theme: 'monokai'
  }
});
</script>
@endsection
<style>
    .card-color-sucess {
        background-color: #ff00dd !important;
    }
</style>