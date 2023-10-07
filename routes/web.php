<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    /* User Mod */
    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('aula', [\App\Http\Controllers\UserController::class, 'aula'])->name('aula.index');

    /* modder */
    Route::get('formulario', [App\Http\Controllers\HomeController::class, 'formulario'])->name('formulario');
   
    /* Curso Mod */
    Route::get('cursos', [App\Http\Controllers\CursoController::class, 'cursoHome'])->name('cursoHome');
    Route::get('cursosCreate', [App\Http\Controllers\CursoController::class, 'showCreateCurso'])->name('CreateCurso.show');
    Route::get('cursosDelete/{id}', [App\Http\Controllers\ProfController::class, 'deleteCurso'])->name('DeleteCurso.show');
    Route::get('cursosDelete/{id}', [App\Http\Controllers\ProfController::class, 'deleteCurso'])->name('DeleteCurso.show');

    route::post('cursosStoreN', [App\Http\Controllers\CursoController::class, 'StoreCurso'])->name('Curso.store');
    /* Profile Mod */
    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::get('another', [\App\Http\Controllers\ProfileController::class, 'anotherShow'])->name('another.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    /* Admin */
    Route::get('homeAdmin', [\App\Http\Controllers\AdminController::class, 'homeAdmin'])->name('Admin.home');

    /* Prof */
    Route::get('homeProf', [\App\Http\Controllers\ProfController::class, 'homeProf'])->name('Prof.home');
    Route::get('criarAula', [\App\Http\Controllers\ProfController::class, 'criarAula'])->name('Aula.create');
    /* Prova */
    Route::get('criarProva', [\App\Http\Controllers\ProfController::class, 'criarProva'])->name('Prova.create');
    Route::get('tabelaAula', [\App\Http\Controllers\ProfController::class, 'showQuestao'])->name('Aula.tabela');
    
    /* Arrumar Curso*/
    Route::get('alterarLiberado/{id}', [\App\Http\Controllers\AdminController::class, 'alterarLiberado'])->name('Curso.alterar');
    /* Aula */
    Route::post('storeAula', [\App\Http\Controllers\CursoController::class, 'storeAula'])->name('Aula.store');
    Route::get('deleteAula/{id}', [\App\Http\Controllers\CursoController::class, 'deleteAula'])->name('Aula.delete');
    Route::get('editAula/{id}', [\App\Http\Controllers\CursoController::class, 'showEditAula'])->name('Aula.editShow');
    Route::post('editAula2', [\App\Http\Controllers\CursoController::class, 'editAula'])->name('Aula.edit');
    /* Questao */
    Route::post('storeQuestao', [\App\Http\Controllers\CursoController::class, 'storeQuestao'])->name('Questao.store');
    /* Tabela */
    Route::get('tabelaAula', [\App\Http\Controllers\CursoController::class, 'showAula'])->name('Aula.tabela');
    route::get('tabelaCursoPend', [\App\Http\Controllers\AdminController::class, 'tabelaCursoPend'])->name('CursoPend.tabela');
    Route::get('tabelaAulas', [\App\Http\Controllers\ProfController::class, 'showAula'])->name('Aula.tabela2');

    /* Pagamento */
    Route::get('carrinho', [\App\Http\Controllers\PagamentoController::class, 'homeCarrinho'])->name('carrinho.home');
    /* Pessoal */
    Route::get('aula1', [\App\Http\Controllers\CursoController::class, 'aula01'])->name('aula1.index');
    Route::get('aula2', [\App\Http\Controllers\CursoController::class, 'aula02'])->name('aula2.index');
    Route::get('aula3', [\App\Http\Controllers\CursoController::class, 'aula03'])->name('aula3.index');
    Route::get('aula4', [\App\Http\Controllers\CursoController::class, 'aula04'])->name('aula4.index');
    Route::get('aula5', [\App\Http\Controllers\CursoController::class, 'aula05'])->name('aula5.index');

});
