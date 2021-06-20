<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstituicaoController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PessoasController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\DescontoController;
use App\Http\Controllers\AlunoDescontoController;
use App\Http\Controllers\FaturaController;
use App\Http\Controllers\DividasController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\PagamentosController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Usuário
Route::post('/usuario/novo', [UsuarioController::class, 'store']);
Route::get('/usuario/listar', [UsuarioController::class, 'exibir']);
Route::post('/usuario/editar', [UsuarioController::class, 'update']);
Route::post('/usuario/login', [UsuarioController::class, 'login']);

// Instituição
Route::post('/instituicao/novo', [InstituicaoController::class, 'store']);
Route::get('/instituicao/listar', [InstituicaoController::class, 'showJson']);
Route::post('/instituicao/editar', [InstituicaoController::class, 'update']);

// Curso
Route::post('/curso/novo', [CursoController::class, 'store']);//->name('registrar-curso');
Route::get('/curso/listar', [CursoController::class, 'exibir']);
Route::post('/curso/editar', [CursoController::class, 'update']); //->name('alterar-curso');

// Pessoa
Route::post('/pessoa/novo', [PessoasController::class, 'store']);
Route::get('/pessoa/listar', [PessoasController::class, 'exibir']);
Route::post('/pessoa/editar', [PessoasController::class, 'update']);
Route::get('/pessoa/{id}', [PessoasController::class, 'getById']);
Route::get('/pessoa/usuario/{id}', [PessoasController::class, 'getByUserId']);

// Aluno
Route::post('/aluno/novo', [AlunoController::class, 'store']);
Route::get('/aluno/listar', [AlunoController::class, 'exibir']);
Route::post('/aluno/editar', [AlunoController::class, 'update']);

// Desconto
Route::post('/desconto/novo', [DescontoController::class, 'store']);
Route::get('/desconto/listar', [DescontoController::class, 'exibir']);
Route::post('/desconto/editar', [DescontoController::class, 'update']);

// Aluno Desconto
Route::post('/aluno/desconto/novo', [AlunoDescontoController::class, 'store']);
Route::get('/aluno/desconto/listar', [AlunoDescontoController::class, 'exibir']);
Route::post('/aluno/desconto/editar', [AlunoDescontoController::class, 'update']);

// Fatura
Route::post('/fatura/novo', [FaturaController::class, 'store']);
Route::get('/fatura/listar', [FaturaController::class, 'exibir']);
Route::get('/fatura/aluno/{id}', [FaturaController::class, 'getAluno']);
Route::post('/fatura/editar', [FaturaController::class, 'update']);

// Dividas
Route::post('/dividas/novo', [DividasController::class, 'store']);
Route::get('/dividas/listar', [DividasController::class, 'exibir']);
Route::get('/dividas/fatura/{id}', [DividasController::class, 'getByFatura']);
Route::post('/dividas/editar', [DividasController::class, 'update']);

// Status
Route::post('/status/novo', [StatusController::class, 'store']);
Route::get('/status/listar', [StatusController::class, 'exibir']);
Route::post('/status/editar', [StatusController::class, 'update']);

// Pagamentos
Route::post('/pagamentos/novo', [PagamentosController::class, 'store']);
Route::get('/pagamentos/listar', [PagamentosController::class, 'exibir']);
Route::post('/pagamentos/editar', [PagamentosController::class, 'update']);
