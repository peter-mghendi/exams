<?php

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;
use Psr\Http\Message\ServerRequestInterface;

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
    $categories = Question::with(['options'])->get()->groupBy('category');
    return view('index', ['categories' => $categories]);
})->name('home');

Route::get('/new', function () {
    $categories = Question::with(['options'])->get()->groupBy('category');
    return view('create');
})->name('new');

Route::post('/questions', function(Request $request) {
    $question = Question::create([
        'question' => $request->question,
        'category' => $request->category,
        'answer' => $request->answer,
    ]);

    $optionA = $question->options()->create([
        'option' => 'A',
        'text' => $request->option_a,
    ]);

    $optionB = $question->options()->create([
        'option' => 'B',
        'text' => $request->option_b,
    ]);

    $optionC = $question->options()->create([
        'option' => 'C',
        'text' => $request->option_c,
    ]);

    $optionD = $question->options()->create([
        'option' => 'D',
        'text' => $request->option_d,
    ]);

    redirect('/');
});