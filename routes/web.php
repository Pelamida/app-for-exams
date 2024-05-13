<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
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

Route::get('/', [MainController::class, 'home']);

Route::get('/subject', [MainController::class, 'subject'])->name('subject');
Route::post('/subject/check', [MainController::class, 'subject_check']);

Route::get('/subject/{id}', [MainController::class, 'showOneSubject'])->name('subject-one');
Route::get('/subject/{id}/update', [MainController::class, 'updateSubject'])->name('subject-update');
Route::post('/subject/{id}/update', [MainController::class, 'updateSubjectName'])->name('subject-updatename');
Route::get('/subject/{id}/delete', [MainController::class, 'deleteSubject'])->name('subject-delete');
Route::post('/subject/{id}/check', [MainController::class, 'subjectOne_check'])->name('subjectOne-check');

Route::get('/subject/{id}/updateans', [MainController::class, 'updateAnswer'])->name('answer-update');
Route::post('/subject/{id}/updateans', [MainController::class, 'updateAnswerName'])->name('answer-updatename');
Route::get('/subject/{id}/deleteans', [MainController::class, 'deleteAnswer'])->name('answer-delete');

Route::get('/tests', [MainController::class, 'tests'])->name('tests');
Route::get('/tests/{id}', [MainController::class, 'testOneSubject'])->name('test-one');
