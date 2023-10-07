<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use App\Models\cursos;
use App\Models\provas;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\DB;
use App\Models\Questaos;
use Nette\Utils\Image;

class CursoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function cursoHome(){
        $cursos = cursos::where('liberado', 'true')->get();
        return view('curso.home', compact('cursos'));
    }
    public function showEditAula($id){
        $presenca = auth()->user()->name;
        $aula = Aula::find($id)->where('presenca', $presenca);
        return view('prof.editar.editarAula', compact('aula'));
    }
    public function aula01(){
        return view('playlistAula.aula1');
    }
    public function aula02(){
        return view('playlistAula.aula2');
    }
    public function aula03(){
        return view('playlistAula.aula3');
    }
    public function aula04(){
        return view('playlistAula.aula4');
    }
    public function aula05(){
        return view('playlistAula.aula5');
    }
    public function storeAula(Request $request){
        $presenca = auth()->user()->name;
        //@dd($request->all());
        try {
            $request->validate([
                'titulo' => 'required',
                'video' => 'required',
                'comentarioAutor' => 'required',
            ]);
            Aula::create([
                'titulo' => $request->titulo ?? 'Aula',
                'video' => $request->video ?? 'https://www.youtube.com/embed/1q7g5iYJxqA',
                'curso' => $request->curso ?? "Curso Eltronica",
                'comentarioautor' => $request->comentarioautor,
                'presenca' => $presenca,
            ]);
            return redirect()->back()->with('success', 'Aula criada com sucesso!');
        } catch (\Throwable) {
            return redirect()->back()->with('error', 'Aula não criada co sucesso!!');
        }
    }
    public function editAula(Request $request)
    {
        $presenca = auth()->user()->name;

        //@dd($request->all(), $user);
        try {
            $request->validate([
                'titulo' => 'required',
                'video' => 'required',
            ]);
            $user = Aula::findorfail($request->id);
            $user->update([
                'titulo' => $request->titulo,
                'video' => $request->video,
                'curso' => $request->curso,
                'comentarioautor' => $request->comentarioautor,
                'presenca' => $presenca,
            ]);



            return redirect()->back()->with('success', 'Aula Alterado com sucesso!');
        } catch (\Throwable) {
            return redirect()->back()->with('error', 'Aula não Alterado com sucesso!!');
        }
    }
    public function showAula()
    {
        $aulas = Questaos::all();
        return view('tabelas.tabelasProva', compact('aulas'));
    }
    public function deleteAula($id)
    {
        $aula = Aula::findorfail($id);
        $aula->delete();
        return redirect()->back()->with('success', 'Aula deletada com sucesso!');
    }
    public function storeQuestao(Request $request)
    {
        // $presenca = auth()->user()->name;

        try {
            $request->validate([
                'curso' => 'required',
                'questao' => 'required',
                'resposta' => 'required',
            ]);
            Questaos::create([
                'curso' => $request->curso,
                'questao' => $request->questao,
                'resposta' => $request->resposta,
            ]);
            return redirect()->back()->with('success', 'Questão criada com sucesso!');
        } catch (\Throwable) {
            return redirect()->back()->with('error', 'Questão não criada com sucesso!');
        }
    }
    public function showQuestao()
    {
        $questaos = Questaos::all();
        return view('tabelas.tabelasQuestao', compact('questaos'));
    }
    public function deleteQuestao($id)
    {
        $questao = Questaos::findorfail($id);
        $questao->delete();
        return redirect()->back()->with('success', 'Questão deletada com sucesso!');
    }
    public function showEditQuestao($id)
    {
        $questao = Questaos::find($id);
        return view('prof.editar.editarQuestao', compact('questao'));
    }
    public function editQuestao(Request $request)
    {
        $presenca = auth()->user()->name;

        //@dd($request->all(), $user);
        try {
            $request->validate([
                'curso' => 'required',
                'questao' => 'required',
                'resposta' => 'required',
            ]);
            $user = Questaos::findorfail($request->id);
            $user->update([
                'curso' => $request->curso,
                'questao' => $request->questao,
                'resposta' => $request->resposta,
            ]);
            return redirect()->back()->with('success', 'Questão Alterado com sucesso!');
        } catch (\Throwable) {
            return redirect()->back()->with('error', 'Questão não Alterado com sucesso!!');
        }
    }
    public function showCreateCurso()
    {
        $questaos = Questaos::all();
        $provas = provas::all();
        return view('prof.criacao.criarCurso', compact('questaos', 'provas'));
    }
    public function StoreCurso(Request $request){
        $autor = auth()->user()->name;
        $selectedData = json_decode(request('selectedData'), true);
        $imagem = $request->file('img');
        //@dd($request->all());
        $nomeImagem = time() . '.' . $imagem->getClientOriginalExtension();
        $imagem->move(public_path('curso'), $nomeImagem);
        /*echo 'olá';
        $verd = $request->validate([
            'nome' => 'required',
            'curso' => 'required',
            'tipo' => 'required',
            'valor' => 'required',
            'duracio'=> 'required',
            'selectedData' => 'required',
        ]);
        echo '222';*/
        //@dd($request->all(),$caminhoImagem,$nomeImagem, $verd);
         try { 
            /* $request->validate([
                'liberado' => 'required',
                'curso' => 'required',
                'valor' => 'required',
                'tipo' => 'required',
                'duracio'=> 'required',
                'aula' => 'required',
                'referencia' => 'required',
                'autor' => 'required',
                'img' => 'required',

            ]); */
            DB::table('cursos')->insert([
                'liberado' => $request->liberado ?? 'false',
                'nome' => $request->curso,
                'valor' => $request->valor,
                'tipo' => $request->tipo,
                'duracio' => $request->duracio,
                'aula' => json_encode($selectedData),
                'referencia' => $request->referencia,
                'autor' => $autor,
                'img' => $nomeImagem,
            ]);
          return redirect()->back()->with('success', 'Curso criada com sucesso!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Curso não criada com sucesso!!', $th);
        } 
    }
}
