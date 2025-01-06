    <?php

    use App\Http\Controllers\UserController;
    use Illuminate\Support\Facades\Route;
    
        Route::middleware(['auth'])->group(function(){
        Route::get('/', function () {return view('home'); })->name('home');
        route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');  
        route::get('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');   
        route::post('/users/create', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');    

    });



