<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\UserProfileController;

// Route::get('/', function () {
//     return view('welcome');
// });







Route::middleware('auth')->group(function () {
    // Admin All Route
    Route::controller(UserProfileController::class)->group(function () {
        Route::get('/logout', 'destroy')->name('logout');
        Route::get('/profile', 'Profile')->name('profile');
        Route::get('/edit/profile', 'EditProfile')->name('edit.profile');
        Route::post('/store/profile', 'StoreProfile')->name('store.profile');
        Route::get('/change/password', 'ChangePassword')->name('change.password');
        Route::post('/update/password', 'UpdatePassword')->name('update.password');
    });

    // Pages Route 
    Route::get('insights/{id}', [StoryController::class, 'wordDetails'])
        ->name('story.worddata');
    Route::resource('story', StoryController::class);
    Route::resource('quiz', QuizController::class);
    Route::get('mcq-quiz', [QuizController::class, 'mcqTest'])->name('mcq');
    Route::get('moc-mcq-quiz', [QuizController::class, 'mocMcqTest'])->name('moc_mcq');
    Route::get('quiz/dragdrop/{id}', [QuizController::class, 'dragDrop'])
        ->name('quiz.drag_deop');
    Route::get('quiz/word-meaning-builder/{id}', [QuizController::class, 'meaningBuilder'])
        ->name('quiz.meaning_builder');
    Route::get('quiz/quiz-builder/{id}', [QuizController::class, 'storyQuizBuilder'])
        ->name('quiz.quiz_builder');
    Route::resource('setting', SettingController::class);
});



Route::get('/', [HomepageController::class, 'index'])->middleware(['auth'])->name('home');

require __DIR__ . '/auth.php';


// Route::get('/contact', function () {
//     return view('contact');
// });
