<?php

//Route::redirect('/login', 'admin');
Route::redirect('/home', 'admin');
Auth::routes(['register' => false]);

Route::view('/', 'patient-form.patient-form');

Route::post('/submit-form', 'PatientFormController@store')->name('submitForm'); 

Route::get('/{id}/patient-details', 'PatientFormController@details')->name('patiantDetails'); 

Route::get('/{encrypted_submission}/patient-details-global', 'PatientFormController@detailsGlobal')->name('patiantDetailsGlobal');

Route::view('/thank-you', 'patient-form.thankyou');

Route::view('/medicine-supply-month', 'patient-form.medicine-supply-month')->name('medicineSupply');


Route::post('/order-summary', 'PatientFormController@orderSummary')->name('orderSummary');
Route::get('/order-summary-detail', 'PatientFormController@orderSummaryDetail')->name('orderSummaryDetail'); 

Route::post('/patient-shipping-information', 'PatientFormController@patientShippingInformation')->name('patientShippingInformation'); 
Route::get('/patient-shipping-details', 'PatientFormController@patientShippingDetails')->name('patientShippingDetails'); 

Route::post('/patient-shipping-details-store', 'PatientFormController@patientShippingDetailsStore')->name('patientShippingDetailsStore'); 
Route::get('/patient-payment-view', 'PatientFormController@patientPaymentView')->name('patientPaymentView'); 

Route::get('/getPrescriptionData/{templateId}', 'PatientFormController@getPrescriptionData')->name('getPrescriptionData');

// Route::view('/order-summary', 'patient-form.order-summary');

// Route::view('/', 'patient-form.patient-shipping-information');

//Route::view('/payment-form', 'payment');

//Route::get('/payment/{encrypted_patient}', 'PaymentController@showPaymentForm')->name('payment.patient');
//Route::post('/payment', 'PaymentController@processPayment');


// Route::get('/subscribe/{encrypted_patient}', 'PaymentController@showPaymentForm')->name('payment.patient');
// Route::post('/subscribe', 'PaymentController@processSubscription')->name('payment.subscribe');
// Route::get('/manage-subscription', 'PaymentController@manageSubscription');
// Route::get('/cancel-subscription/{encrypted_patient}', 'PaymentController@cancelSubscription')->name('subscription.cancel');
// Route::get('/reactivate-subscription/{encrypted_patient}', 'PaymentController@reActivateSubscription')->name('subscription.reactivate');
// Route::get('/add-card', 'PaymentController@addPaymentMethod');
// Route::get('/default-card', 'PaymentController@setDefaultPaymentMethod');
// Route::view('/payment-thankyou', 'payment-thankyou');

//Authorize Payment //
Route::get('/subscribe/{encrypted_patient}', 'AuthorizePaymentController@showPaymentForm')->name('payment.patient');
Route::post('/subscribe', 'AuthorizePaymentController@processSubscriptionAuthorised')->name('payment.subscribe');
Route::get('/manage-subscription', 'AuthorizePaymentController@manageSubscription');
Route::get('/cancel-subscription/{encrypted_patient}', 'AuthorizePaymentController@cancelSubscriptionAuthorised')->name('subscription.cancel');
Route::get('/reactivate-subscription/{encrypted_patient}', 'AuthorizePaymentController@reActivateSubscription')->name('subscription.reactivate');
Route::get('/add-card', 'AuthorizePaymentController@addPaymentMethod');
Route::get('/default-card', 'AuthorizePaymentController@setDefaultPaymentMethod');
Route::view('/payment-thankyou', 'payment-thankyou');

//Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
    Route::get('logout', 'Auth\LoginController@logout')->name('admin.logout');
    Route::get('/', 'Admin\HomeController@index')->name('home');
    
    //Route::view('/', 'home');
    // Permissions
    Route::delete('permissions/destroy', 'Admin\PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'Admin\PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'Admin\RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'Admin\RolesController');

    // Users
    Route::delete('users/destroy', 'Admin\UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'Admin\UsersController');

    // Services
    Route::delete('services/destroy', 'Admin\ServicesController@massDestroy')->name('services.massDestroy');
    Route::resource('services', 'ServicesController');

    // Employees
    Route::delete('employees/destroy', 'Admin\EmployeesController@massDestroy')->name('employees.massDestroy');
    Route::post('employees/media', 'Admin\EmployeesController@storeMedia')->name('employees.storeMedia');
    Route::resource('employees', 'Admin\EmployeesController');
    
    // Patients
    /*Route::delete('patients/destroy', 'Admin\EmployeesController@massDestroy')->name('employees.massDestroy');
    Route::post('patients/media', 'Admin\EmployeesController@storeMedia')->name('employees.storeMedia');*/
    Route::resource('patients', 'Admin\PatientController');
    Route::get('patients/{id}/patient-details', 'PatientFormController@details')->name('patients.patiantEdit'); 
    Route::post('patients/{id}/prescription-update', 'PatientFormController@prescription_update')->name('patients.prescriptionUpdate'); 
    Route::post('patients/{id}/patient-update', 'PatientFormController@update')->name('patients.patiantUpdate'); 
    
    // Patients User
    Route::resource('user-patients', 'Admin\PatientUsersController'); 
    Route::get('user-patients/{id}/invoice', 'Admin\PatientUsersController@invoice')->name('patients.patientInvoice');
    Route::get('user-patients/{id}/invoice-mail', 'Admin\PatientUsersController@sendInvoice')->name('patients.patientInvoiceMail');
    
    // Card Details
    Route::resource('cards', 'Admin\CardDetailsController'); 

    // Clients
    Route::delete('clients/destroy', 'Admin\ClientsController@massDestroy')->name('clients.massDestroy');
    Route::resource('clients', 'Admin\ClientsController');

    // Appointments
    Route::delete('appointments/destroy', 'Admin\AppointmentsController@massDestroy')->name('appointments.massDestroy');
    Route::resource('appointments', 'Admin\AppointmentsController');
    
    // Transactions
    
    Route::resource('transactions', 'Admin\TransactionsController');
    Route::delete('transactions/destroy', 'Admin\TransactionsController@massDestroy')->name('transactions.massDestroy');
    
    // For Prescription
    
    Route::resource('manage-prescriptions', 'Admin\PrescriptionTemplateController');
    Route::get('add-prescription', 'Admin\PrescriptionTemplateController@addPrescription')->name('manage-prescription.add');
    Route::post('submit-prescription', 'Admin\PrescriptionTemplateController@submitPrescription')->name('manage-prescription.store');
    Route::get('show-prescription/{id}/', 'Admin\PrescriptionTemplateController@showPrescription')->name('manage-prescription.show');
    Route::get('edit-prescription/{id}/', 'Admin\PrescriptionTemplateController@editPrescription')->name('manage-prescription.edit');
    Route::post('update-prescription/{id}/', 'Admin\PrescriptionTemplateController@updatePrescription')->name('manage-prescription.update');
    Route::get('manage-prescriptions/{id}/delete/', 'Admin\PrescriptionTemplateController@PrescriptionDestroy')->name('manage-prescription.delete');

    // For Medication Prefrence

    Route::resource('manage-preferences', 'Admin\ManagePreferenceController');
    Route::get('add-preferences', 'Admin\ManagePreferenceController@createPreference')->name('preferences.add');
    Route::post('submit-preferences', 'Admin\ManagePreferenceController@submitPreference')->name('preferences.store');
    Route::get('show-preferences/{id}/', 'Admin\ManagePreferenceController@showPreference')->name('preferences.show');
    Route::get('edit-preferences/{id}/', 'Admin\ManagePreferenceController@editPreference')->name('preferences.edit');
    Route::post('update-preferences/{id}/', 'Admin\ManagePreferenceController@updatePreference')->name('preferences.update');
    Route::get('manage-preferences/{id}/delete/', 'Admin\ManagePreferenceController@PreferenceDestroy')->name('preferences.delete');
    

    
    
    // Manage Setting
    Route::get('manage-setting/', 'Admin\ManageSettingController@index')->name('manage-setting.settingEdit'); 
    Route::put('manage-setting/{id}/update-setting', 'Admin\ManageSettingController@setting_update')->name('manage-setting.settingUpdate'); 

    Route::POST('system-calendar', 'Admin\SystemCalendarController@index')->name('systemCalendar');
});
