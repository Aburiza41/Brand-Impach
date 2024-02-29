<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Middleware\AdminMiddleware as Admin;

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

Route::get('/dashboard', function () {
    // Get Chart Data
    $data = \App\Models\Chart::paginate(10);
    // Debgging
    // dd($data);   

    // Sumber
    // Count Sumber of Whatapps
    $whatapps = $data->where('sumber', 'whatapps')->count();
    // Count Sumber of Facebook
    $facebook = $data->where('sumber', 'facebook')->count();
    // Count Sumber of Instagram
    $instagram = $data->where('sumber', 'instagram')->count();
    // Count Sumber of Iklan
    $iklan = $data->where('sumber', 'iklan')->count();

    // Convert Data to Array for Chart
    // Bar Chart
    $BarChartData = [
        'labels' => ["Whatapps", "Facebook", "Instagram", "Iklan"],
        'datasets' => [
            [
                'label' => "Sumber",
                'data' => [$whatapps, $facebook, $instagram, $iklan],
                'backgroundColor' => [
                    'rgb(255, 99, 132)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                ],
                'borderWidth' => 1
            ]
        ]
    ];

    // Line Chart
    $LineChartData = [
        'labels' => ["Whatapps", "Facebook", "Instagram", "Iklan"],
        'datasets' => [
            [
                'label' => "Sumber",
                'data' => [$whatapps, $facebook, $instagram, $iklan],
                'backgroundColor' => 'rgb(255, 99, 132)',
                'borderColor' => 'rgb(255, 99, 132)',
                'borderWidth' => 1
            ]
        ]
    ];

    // Pie Chart 
    $PieChartData = [
        'labels' => ["Whatapps", "Facebook", "Instagram", "Iklan"],
        'datasets' => [
            [
                'label' => "Sumber",
                'data' => [$whatapps, $facebook, $instagram, $iklan],
                'backgroundColor' => [
                    'rgb(255, 99, 132)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                ],
                'hoverOffset' => 4
            ]
        ]
    ];

    // Alert
    // Alert::success('Selamat Datang', 'Anda Berhasil Login ' . Auth::user()->name);

    return view('dashboard', compact('data', 'BarChartData', 'LineChartData', 'PieChartData'));
})->middleware(['auth', 'verified', Admin::class])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
