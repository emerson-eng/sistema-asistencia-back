    <?php
    use App\Http\Controllers\Api\AuthController;
    use App\Http\Controllers\Api\AsistenciaController;
    use App\Http\Controllers\Api\GradoController;
    use App\Http\Controllers\Api\SeccionController;
    use App\Http\Controllers\Api\StudentController;
    use App\Http\Controllers\Api\TipoTrabajadorController;
    use App\Http\Controllers\Api\TrabajdorController;

    Route::post('login', [AuthController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('me', [AuthController::class, 'me']);
        Route::post('logout', [AuthController::class, 'logout']);
    });

    // SOLO ADMINISTRADOR (por ejemplo, gestión de maestros de datos)
    Route::middleware(['auth:sanctum', 'role:Administrador'])->group(function () {
        Route::apiResource('grados', GradoController::class);
        Route::apiResource('seccions', SeccionController::class);
        Route::apiResource('students', StudentController::class);
        Route::apiResource('tipo_trabajadors', TipoTrabajadorController::class);
        Route::apiResource('trabajadores', TrabajdorController::class);
    });

    // ADMINISTRADOR y AUXILIAR (por ejemplo, control de asistencias)
    Route::middleware(['auth:sanctum', 'role:Administrador,Auxiliar'])->group(function () {
        Route::apiResource('asistencias', AsistenciaController::class);
    });
