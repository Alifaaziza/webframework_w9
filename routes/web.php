<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/program/{id?}', function ($id = null) {
    if ($id) {
        $programs = [
            '1' => ['name' => 'Program Reseller', 'description' => 'Program kemitraan reseller'],
            '2' => ['name' => 'Langganan Bulanan', 'description' => 'Program berlangganan bulanan'],
            '3' => ['name' => 'Program Kemitraan', 'description' => 'Program kemitraan usaha']
        ];
        
        $program = $programs[$id] ?? null;
        
        if ($program) {
            return view('program-detail', [
                'program' => $program,
                'id' => $id
            ]);
        }
    }
    
    return view('program');
})->name('program');

Route::prefix('team')->group(function () {
    Route::get('/', function () {
        return view('ourteam');
    })->name('ourteam');
    
    Route::get('/{id}', function ($id) {
        $teamMembers = [
            '1' => ['name' => 'Siti Rahayu', 'position' => 'Founder & CEO'],
            '2' => ['name' => 'Ahmad Fauzi', 'position' => 'Head of Production'],
            '3' => ['name' => 'Maya Sari', 'position' => 'Marketing Manager']
        ];
        
        $member = $teamMembers[$id] ?? null;
        
        if ($member) {
            return view('team-member', [
                'member' => $member,
                'id' => $id
            ]);
        }
        
        abort(404);
    })->name('team.member');
});

Route::get('/contact', function () {
    return view('contactus');
})->name('contactus');

Route::redirect('/about-us', '/about');

Route::resource('programs', ProgramController::class);
Route::resource('teams', TeamController::class);
Route::resource('contacts', ContactController::class);
Route::resource('pages', PageController::class);

Route::fallback(function () {
    return view('404');
});
