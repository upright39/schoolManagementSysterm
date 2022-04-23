<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\UserProfileController;
use App\Http\Controllers\Backend\Setup\DesignationController;
use App\Http\Controllers\Backend\Setup\StudentYearController;
use App\Http\Controllers\Backend\Students\ExamsFeeController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentGroupController;
use App\Http\Controllers\Backend\Setup\StudentShiftController;
use App\Http\Controllers\Backend\Setup\AssignSubjectController;
use App\Http\Controllers\Backend\Students\MonthlyFeeController;
use App\Http\Controllers\Backend\Students\StudentRegController;
use App\Http\Controllers\Backend\Setup\StudentSubjectController;
use App\Http\Controllers\Backend\Employees\EmployeeRegController;
use App\Http\Controllers\Backend\Setup\StudentExamTypeController;
use App\Http\Controllers\Backend\Students\RollGenerateController;
use App\Http\Controllers\Backend\Employees\EmployeeLeaveController;
use App\Http\Controllers\Backend\Setup\FeeCategoryAmountController;
use App\Http\Controllers\Backend\Employees\EmployeeSalaryController;
use App\Http\Controllers\Backend\Setup\StudentFeeCategoryController;
use App\Http\Controllers\Backend\Students\RegistrationFeeController;

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
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

//logout route
Route::get('logout/user', [AdminController::class, 'Logout'])->name('logout_user');


Route::group(['middleware' => 'auth'], function () {

    //MANAGE USER ROUTE

    Route::prefix('users')->group(function () {
        Route::get('/veiw', [UserController::class, 'userVeiw'])->name('view_users');
        Route::get('/add', [UserController::class, 'addUser'])->name('add_user');
        Route::post('/store', [UserController::class, 'storeUser'])->name('store.user');
        Route::get('/edith/{id}', [UserController::class, 'edithUser'])->name('edith.user');
        Route::post('/update/{id}', [UserController::class, 'updateUser'])->name('update.user');
        Route::get('/delete/{id}', [UserController::class, 'deleteUser'])->name('user.delete');
    });

    Route::prefix('profile')->group(function () {

        Route::get('/veiw', [UserProfileController::class, 'veiwProfile'])->name('view.profile');
        Route::get('/edith', [UserProfileController::class, 'edithProfile'])->name('edith.profile');
        Route::post('/update', [UserProfileController::class, 'updateProfile'])->name('update.profile');
        Route::get('/password/edith', [UserProfileController::class, 'edithPassword'])->name('edithPassword');
        Route::post('/password/update', [UserProfileController::class, 'updatePassword'])->name('update.password');
    });


    Route::prefix('setups')->group(function () {

        Route::get('/student/class', [StudentClassController::class, 'veiwStudentClass'])->name('view.class');
        Route::get('/add/student/class', [StudentClassController::class, 'addStudentClass'])->name('add.class');
        Route::post('/store/student/class', [StudentClassController::class, 'storeStudentClass'])->name('store.class');
        Route::get('/edith/student/class/{id}', [StudentClassController::class, 'edithStudentClass'])->name('edith.class');
        Route::post('/update/student/class/{id}', [StudentClassController::class, 'updateStudentClass'])->name('update.class');
        Route::get('/delete/student/class/{id}', [StudentClassController::class, 'deleteStudentClass'])->name('delete.class');

        //students year routes

        Route::get('/student/year', [StudentYearController::class, 'veiwStudentYear'])->name('view.year');
        Route::get('/add/student/year', [StudentYearController::class, 'addStudentYear'])->name('add.year');
        Route::post('/store/student/year', [StudentYearController::class, 'storeStudentYear'])->name('store.year');
        Route::get('/edith/student/year/{id}', [StudentYearController::class, 'edithStudentYear'])->name('edith.year');
        Route::post('/update/student/year/{id}', [StudentYearController::class, 'updateStudentYear'])->name('update.year');
        Route::get('/delete/student/year/{id}', [StudentYearController::class, 'deleteStudentYear'])->name('delete.year');

        //students group routes

        Route::get('/student/group', [StudentGroupController::class, 'veiwStudentGroup'])->name('view.group');
        Route::get('/add/student/group', [StudentGroupController::class, 'addStudentGroup'])->name('add.group');
        Route::post('/store/student/group', [StudentGroupController::class, 'storeStudentGroup'])->name('store.group');
        Route::get('/edith/student/group/{id}', [StudentGroupController::class, 'edithStudentGroup'])->name('edith.group');
        Route::post('/update/student/group/{id}', [StudentGroupController::class, 'updateStudentGroup'])->name('update.group');
        Route::get('/delete/student/group/{id}', [StudentGroupController::class, 'deleteStudentGroup'])->name('delete.group');

        // students shifts routes

        Route::get('/student/shifts', [StudentShiftController::class, 'veiwStudentShift'])->name('view.shift');
        Route::get('/add/student/shifts', [StudentShiftController::class, 'addStudentShift'])->name('add.shift');
        Route::post('/store/student/shifts', [StudentShiftController::class, 'storeStudentShift'])->name('store.shift');
        Route::get('/edith/student/shifts/{id}', [StudentShiftController::class, 'edithStudentShift'])->name('edith.shift');

        Route::post('/update/student/shift/{id}', [StudentShiftController::class, 'UpdateStudentShift'])->name('update.shifts');

        Route::get('/delete/students/shifts/{id}', [StudentShiftController::class, 'deleteStudentShift'])->name('delete.shift');



        // students fee category routes

        Route::get('/student/category', [StudentFeeCategoryController::class, 'veiwStudentFeeCategory'])->name('view.feecategory');
        Route::get('/add/student/category', [StudentFeeCategoryController::class, 'addStudentFeeCategory'])->name('add.feecategory');

        Route::post('/store/student/category', [StudentFeeCategoryController::class, 'storeStudentFeeCategory'])->name('store.feecategory');

        Route::get('/edith/student/category/{id}', [StudentFeeCategoryController::class, 'edithStudentFeeCatigory'])->name('edith.feecategory');

        Route::post('/update/student/category/{id}', [StudentFeeCategoryController::class, 'updateStudentFeeCategory'])->name('update.feecategory');

        Route::get('/delete/student/category/{id}', [StudentFeeCategoryController::class, 'deleteStudentFeeCategory'])->name('delete.feecategory');


        // students fee category amount routes

        Route::get('/student/category/amount', [FeeCategoryAmountController::class, 'veiwFeeAmount'])->name('view.feecategoryamount');
        Route::get('/add/student/amount', [FeeCategoryAmountController::class, 'addFeeAmount'])->name('add.amount');
        Route::post('/store/student/amount', [FeeCategoryAmountController::class, 'storeFeeAmount'])->name('store.amount');
        Route::get('/edith/student/amount/{feecategory_id}', [FeeCategoryAmountController::class, 'edithFeeAmount'])->name('edith.amount');
        Route::post('/update/student/amount/{feecategory_id}', [FeeCategoryAmountController::class, 'updateFeeAmount'])->name('update.amount');

        Route::get('/details/student/amount/{feecategory_id}', [FeeCategoryAmountController::class, 'detailsFeeAmount'])->name('details_amount');

        // students exam type routes

        Route::get('/student/exam/type', [StudentExamTypeController::class, 'veiwStudentExamType'])->name('view.exam.type');

        Route::get('/add/student/examtype', [StudentExamTypeController::class, 'addStudentExamType'])->name('add.examtype');

        Route::post('/store/student/exam-type', [StudentExamTypeController::class, 'storeStudentExamType'])->name('store.exam.type');


        Route::get('/edith/student/exam/{id}', [StudentExamTypeController::class, 'edithStudentExamType'])->name('edith.exem.type');
        Route::post('/update/student/shifts/{id}', [StudentExamTypeController::class, 'updateStudentExamType'])->name('update.exam.type');

        Route::get('/delete/student/exam-type/{id}', [StudentExamTypeController::class, 'deleteStudentExamType'])->name('delete.exam.type');



        // students  subject routes
        Route::get('/student/subject', [StudentSubjectController::class, 'veiwStudentSubject'])->name('view.subject');
        Route::get('/add/student/subject', [StudentSubjectController::class, 'addStudentSubject'])->name('add.subject');
        Route::post('/store/student/subject', [StudentSubjectController::class, 'storeStudentSubject'])->name('store.subject');
        Route::get('/edith/student/subject/{id}', [StudentSubjectController::class, 'edithStudentSubject'])->name('edith.subject');
        Route::post('/update/student/subject/{id}', [StudentSubjectController::class, 'updateStudentSubject'])->name('update.subject');
        Route::get('/delete/student/subject/{id}', [StudentSubjectController::class, 'deleteStudentSubject'])->name('delete.subject');




        //student Assign Subject Routes

        Route::get('/student/asign/subject', [AssignSubjectController::class, 'veiwAssignSubject'])->name('view.assign.subject');

        Route::get('/add/asign/subject', [AssignSubjectController::class, 'addAssignSubject'])->name('add.assign.subject');

        Route::post('/store/asign/subject', [AssignSubjectController::class, 'storeAssignSubject'])->name('store.assign.subject');

        Route::get('/edith/asign/subject/{student_class_id}', [AssignSubjectController::class, 'edithAssignSubject'])->name('edith.asign.subject');

        Route::post('/update/asign/subject/{student_class_id}', [AssignSubjectController::class, 'UpdateAssignSubject'])->name('update.assign.subject');


        Route::get('/details/asign/subject/{student_class_id}', [AssignSubjectController::class, 'detailsAssignSubject'])->name('details.asign.subject');



        // students  designation routes

        Route::get('/student/designation', [DesignationController::class, 'veiwDesignation'])->name('view.designation');
        Route::get('/add/designation', [DesignationController::class, 'addDesignation'])->name('add.designation');
        Route::post('/store/designation', [DesignationController::class, 'storeDesignation'])->name('store.designation');
        Route::get('/edith/designation/{id}', [DesignationController::class, 'edithDesignation'])->name('edith.designation');
        Route::post('/update/designation/{id}', [DesignationController::class, 'updateDesignation'])->name('update.designation');
        Route::get('/delete/designation/{id}', [DesignationController::class, 'deleteDesignation'])->name('delete.designation');
    });

    //STUDENTS REGISTRATION ROUTES

    Route::prefix('students')->group(function () {
        Route::get('/veiw/registration', [StudentRegController::class, 'studentRegVeiw'])->name('view_students_reg');
        Route::get('/add/registration', [StudentRegController::class, 'addstudentReg'])->name('add_students_reg');
        Route::post('/store/registration', [StudentRegController::class, 'storeStudentReg'])->name('store_students_reg');
        Route::get('/class/year/search', [StudentRegController::class, 'SearchYearClass'])->name('year_class_search');

        Route::get('/edith/registration/{student_id}', [StudentRegController::class, 'StudentRegEdith'])->name('edith_students_reg');

        Route::post('/update/registration/{student_id}', [StudentRegController::class, 'updateStudentReg'])->name('update_students_reg');

        Route::get('/promote/student/{student_id}', [StudentRegController::class, 'PromoteStudent'])->name('promote_students_reg');

        Route::post('/store/promotion/{student_id}', [StudentRegController::class, 'StorePromoteStudent'])->name('store_promotion');

        Route::get('/datials/{student_id}', [StudentRegController::class, 'StudentDetails'])->name('details_students_reg');

        // ROLL GENERATE ROTES

        Route::get('/roll/generate/view', [RollGenerateController::class, 'VeiwRollGenerate'])->name('view_roll_generate');
        Route::get('/roll/getstudents', [RollGenerateController::class, 'GetStudents'])->name('student.registration.getstudents');

        Route::post('/roll/generate/store', [RollGenerateController::class, 'StoreRollGenerate'])->name('generate_roll_store');


        // STUDENTS REGISTRATION ROUTES
        Route::get('/student/registration/fee/view', [RegistrationFeeController::class, 'VeiwRegistrationFee'])->name('view_registration_fee');
        Route::get('/student/get/registration/fee', [RegistrationFeeController::class, 'GetStudentsFee'])->name('student.registration.fee.classwise.get');
        Route::get('/student/get/registration/payslip', [RegistrationFeeController::class, 'GetStudentsPayslip'])->name('student.registration.fee.payslip');


        // STUDENTS MONTHLY FEE ROUTES
        Route::get('/student/monthly/fee/view', [MonthlyFeeController::class, 'VeiwMonthlyFee'])->name('view_monthly_fee');
        Route::get('/get/monthly/paylist', [MonthlyFeeController::class, 'GetMonthlyPaylist'])->name('student.monthly.fee.payslist');
        Route::get('/student/monthly/fee/print', [MonthlyFeeController::class, 'GetMonthlyPayslips'])->name('monthly.fee.payslip');

        // STUDENTS EXAMS FEE ROUTES
        Route::get('/student/examtype/fee/view', [ExamsFeeController::class, 'VeiwExamsFee'])->name('view_examtype_fee');
        Route::get('/get/exam/paylist', [ExamsFeeController::class, 'GetExamsPaylist'])->name('student.exam.fee.payslist');

        Route::get('/student/exam/fee/print', [ExamsFeeController::class, 'GetExamsPayslips'])->name('examtype.fee.payslip');
    });





    Route::prefix('employees')->group(function () {

        Route::get('/registration/veiw', [EmployeeRegController::class, 'veiwEmployee'])->name('view_employees_reg');

        Route::get('/emp/registration/add', [EmployeeRegController::class, 'addEmployee'])->name('add_employees_reg');

        Route::post('/emp/registration/store', [EmployeeRegController::class, 'storeEmployee'])->name('store_employees_reg');

        Route::get('/emp/regis/edit/{id}', [EmployeeRegController::class, 'EdithEmployee'])->name('edith_employees_reg');

        Route::post('/emp/registration/update/{id}', [EmployeeRegController::class, 'StoreEmployees'])->name('update_emp_reg');

        Route::get('/emp/regis/details/{id}', [EmployeeRegController::class, 'DetailsEmployee'])->name('details_employees_reg');



        //EMPLOYEE SALARY ROUTE....

        Route::get('/emp/regis/salary', [EmployeeSalaryController::class, 'EmployeeSalaryView'])->name('view_employees_salary');

        Route::get('/emp/salary/increment/{id}', [EmployeeSalaryController::class, 'EmployeeSalaryIncrement'])->name('store_employees_salary');

        Route::post('/store/salary/increment/{id}', [EmployeeSalaryController::class, 'EmployeeSalaryIncrementStore'])->name('store_salary_increment');


        Route::get('/emp/salary/details/{id}', [EmployeeSalaryController::class, 'EmployeeSalaryDetails'])->name('employees_salary_log');




        //EMPLOYEE LEAVE ALL ROUTE....

        Route::get('/emp/leave/view', [EmployeeLeaveController::class, 'EmployeeLeaveView'])->name('view_employees_leave');

        Route::get('/emp/leave/add', [EmployeeLeaveController::class, 'EmployeeLeaveAdd'])->name('add_employees_leave');

        Route::post('/emp/leave/store', [EmployeeLeaveController::class, 'EmployeeLeaveStore'])->name('store_employee_leave');

        Route::get('/emp/leave/edith/{id}', [EmployeeLeaveController::class, 'EmployeeLeaveEdith'])->name('edith_employee_leave');


        Route::post('/empl/leave/store/{id}', [EmployeeLeaveController::class, 'EmployeeLeaveUpdate'])->name('update_employee_leave');

        Route::get('/empl/leave/delete/{id}', [EmployeeLeaveController::class, 'EmployeeLeaveDel'])->name('delete_employee_leave');
    });
});