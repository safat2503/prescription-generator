<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModelTestingController;
use App\Http\Controllers\ExperimentsController;
use App\Http\Controllers\DashboardControLLer;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\MiscellaneousController;


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
/*
Route::get('/', function () {
    return view('welcome');
});

Route::get('/testMedicine', [ModelTestingController::class, 'testMedicine'])->name('test.medicine');
Route::get('/testDisease', [ModelTestingController::class, 'testAddDisease'])->name('test.add.disease');

Route::get('/getAllDiseases',[ModelTestingController::class, 'getAllDiseases']);

Route::get('/collections', [ExperimentsController::class, 'collectionDemo'])->name('laravel.collections');

Route::get('/collections-two-dim',[ExperimentsController::class, 'associatedArrayCollectionDemo'])->name('two.dimensional.array.col');
*/

Route::get('/dashboard', [DashboardControLLer::class, 'index'])->name('main.dashboard');


Route::get('/patient/registration',[PatientsController::class, 'register'])->name('register.patient');


Route::get('/patient/prescription',[PatientsController::class, 'prescription'])->name('prescription.patient');


Route::get('/patient/history',[PatientsController::class, 'medication'])->name('medication.patient');



Route::get('/medicines/medicine',[MedicineController::class, 'medicine'])->name('medicine.medicines');

Route::get('/medicines/medicine_details',[MedicineController::class, 'medicineDetail'])->name('medicine_details.medicines');


Route::get('/miscellaneous/disease',[MiscellaneousController::class, 'disease'])->name('disease.miscellaneous');

Route::post('/miscellaneous/disease', [MiscellaneousController::class, 'saveDisease'])->name('misc.disease.save');
Route::get('/miscellaneous/disease/edit/{disease}', [MiscellaneousController::class, 'diseaseEdit'])->name('diseae.miscellaneous.edit');
Route::post('/miscellaneous/disease/update', [MiscellaneousController::class, 'updateDisease'])->name('disease.miscellaneous.update');

Route::get('/miscellaneous/user',[MiscellaneousController::class, 'user'])->name('user.miscellaneous');

Route::get('/miscellaneous/report',[MiscellaneousController::class, 'report'])->name('report.miscellaneous');

Route::post('/patient/store',[PatientsController::class, 'store'])->name('patient.store');
Route::get('/patient/edit/{patient}', [PatientsController::class, 'edit'])->name('patient.edit');
Route::post('/patient/update', [PatientsController::class, 'update'])->name('patient.update');

Route::get('/lab/tests', [MiscellaneousController::class, 'labTestIndex'])->name('lab.test.index');
Route::post('/test/store', [MiscellaneousController::class, 'saveTest'])->name('lab.test.save');
Route::get('/lab/test/edit/{labTest}', [MiscellaneousController::class, 'labTestEdit'])->name('lab.test.edit');
Route::post('/lab/test/update', [MiscellaneousController::class, 'updateLabTest'])->name('lab.test.update');

Route::post('/add/medicine', [MedicineController::class, 'storeMedicine'])->name('medicine.store');

Route::get('/medicine/edit/{medicine}', [MedicineController::class, 'editMedicine'])->name('medicine.edit');

Route::post('/medicine/update', [MedicineController::class, 'updateMedicine'])->name('update.medicine');

Route::post('/add/medicine/detail', [MedicineController::class, 'saveMedicineDetail'])->name('add.medicine.detail');

Route::get('/medicine/detail/edit/{medicineDetail}', [MedicineController::class, 'editMedicineDetail'])->name('edit.medicine.detail');

Route::post('/medicine/detail/update', [MedicineController::class, 'updateMedicineDetails'])->name('update.medicine.details');

Route::get('/get/medicine/packing', [PatientsController::class, 'getMedicinePackings'])->name('get_medicine_packing');