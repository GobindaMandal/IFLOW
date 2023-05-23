<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Backend\PurchaseOrderController;
use App\Http\Controllers\Backend\ReceiveController;
use App\Http\Controllers\Backend\RequisitionController;
use App\Http\Controllers\Backend\IssueController;
use App\Http\Controllers\Backend\ItemController;
use App\Http\Controllers\Backend\AllocationController;
use App\Http\Controllers\Backend\OfficeController;
use App\Http\Controllers\Backend\SupplierController;
use App\Http\Controllers\Backend\UserCreateController;
use App\Http\Controllers\Backend\ReportController;

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

Route::get('/iflow', function () {
    return view('welcome');
});

// User
Route::get('/login', [UserController::class,'login'])->name("login")->middleware("alreadyLoggedIn");
Route::post('/loginuser', [UserController::class,'loginuser'])->name("login.user");
Route::get('/dashboard', [UserController::class,'dashboard'])->name("dashboard")->middleware('isLoggedIn');
Route::get('/logout', [UserController::class,'logout'])->name("logout");

// admin
// Route::get('/dashboard', function () {
//     return view('backend.dashboard');
// })->middleware('isLoggedIn')->name("dashboard");

Route::group(['prefix'=>'/purchaseorder'],function(){
    // Purchase Order
    Route::get('/add', [PurchaseOrderController::class,'add'])->name("purchaseorder.add")->middleware('isLoggedIn');
    Route::post('/store', [PurchaseOrderController::class,'store'])->name("purchaseorder.store")->middleware('isLoggedIn');
    Route::get('/show', [PurchaseOrderController::class,'show'])->name("purchaseorder.show")->middleware('isLoggedIn');
    Route::get('/edit/{id}', [PurchaseOrderController::class,'edit'])->name("purchaseorder.edit")->middleware('isLoggedIn');
    Route::post('/update/{id}', [PurchaseOrderController::class,'update'])->name("purchaseorder.update")->middleware('isLoggedIn');
    Route::get('/delete/{id}', [PurchaseOrderController::class,'delete'])->name("purchaseorder.delete")->middleware('isLoggedIn');
    // Purchase Order Detail
    Route::post('/storedtl/{id}', [PurchaseOrderController::class,'storedtl'])->name("purchaseorder.storedtl");
    Route::get('/editdtl/{id}', [PurchaseOrderController::class,'editdtl'])->name("purchaseorder.editdtl")->middleware('isLoggedIn');
    Route::post('/updatedtl/{id}', [PurchaseOrderController::class,'updatedtl'])->name("purchaseorder.updatedtl");
    Route::get('/deletedtl/{id}', [PurchaseOrderController::class,'deletedtl'])->name("purchaseorder.deletedtl")->middleware('isLoggedIn');
});

Route::group(['prefix'=>'/receive'],function(){
    // Receive
    Route::get('/add', [ReceiveController::class,'add'])->name("receive.add")->middleware('isLoggedIn');
    Route::post('/store', [ReceiveController::class,'store'])->name("receive.store");
    Route::get('/show', [ReceiveController::class,'show'])->name("receive.show")->middleware('isLoggedIn');
    Route::get('/edit/{id}', [ReceiveController::class,'edit'])->name("receive.edit");
    Route::post('/update/{id}', [ReceiveController::class,'update'])->name("receive.update");
    Route::get('/delete/{id}', [ReceiveController::class,'delete'])->name("receive.delete");
    // Receive Order Detail
    Route::post('/storedtl/{id}', [ReceiveController::class,'storedtl'])->name("receive.storedtl");
    Route::post('/editdtl/{id}', [ReceiveController::class,'editdtl'])->name("receive.editdtl")->middleware('isLoggedIn');
    Route::post('/updatedtl/{id}', [ReceiveController::class,'updatedtl'])->name("receive.updatedtl");
    Route::get('/deletedtl/{id}', [ReceiveController::class,'deletedtl'])->name("receive.deletedtl")->middleware('isLoggedIn');
});

Route::group(['prefix'=>'/requisition'],function(){
    // Requisition
    Route::get('/add', [RequisitionController::class,'add'])->name("requisition.add")->middleware('isLoggedIn');
    Route::post('/store', [RequisitionController::class,'store'])->name("requisition.store");
    Route::get('/show', [RequisitionController::class,'show'])->name("requisition.show")->middleware('isLoggedIn');
    Route::get('/edit/{id}', [RequisitionController::class,'edit'])->name("requisition.edit");
    Route::post('/update/{id}', [RequisitionController::class,'update'])->name("requisition.update");
    Route::get('/delete/{id}', [RequisitionController::class,'delete'])->name("requisition.delete");
    // Requisition Detail
    Route::post('/storedtl/{id}', [RequisitionController::class,'storedtl'])->name("requisition.storedtl");
    Route::get('/editdtl/{id}', [RequisitionController::class,'editdtl'])->name("requisition.editdtl")->middleware('isLoggedIn');
    Route::post('/updatedtl/{id}', [RequisitionController::class,'updatedtl'])->name("requisition.updatedtl");
    Route::get('/deletedtl/{id}', [RequisitionController::class,'deletedtl'])->name("requisition.deletedtl")->middleware('isLoggedIn');
});

Route::group(['prefix'=>'/issue'],function(){
    // Issue
    Route::get('/add', [IssueController::class,'add'])->name("issue.add")->middleware('isLoggedIn');
    Route::post('/store', [IssueController::class,'store'])->name("issue.store");
    Route::get('/show', [IssueController::class,'show'])->name("issue.show")->middleware('isLoggedIn');
    Route::get('/edit/{id}', [IssueController::class,'edit'])->name("issue.edit");
    Route::post('/update/{id}', [IssueController::class,'update'])->name("issue.update");
    Route::get('/delete/{id}', [IssueController::class,'delete'])->name("issue.delete");
    // Issue Detail
    Route::get('/allocNo/{id}', [IssueController::class,'allocNo']);
    Route::post('/storedtl/{id}', [IssueController::class,'storedtl'])->name("issue.storedtl");
    Route::get('/editdtl/{id}', [IssueController::class,'editdtl'])->name("issue.editdtl")->middleware('isLoggedIn');
    Route::post('/updatedtl/{id}', [IssueController::class,'updatedtl'])->name("issue.updatedtl");
    Route::get('/deletedtl/{id}', [IssueController::class,'deletedtl'])->name("issue.deletedtl")->middleware('isLoggedIn');
});

Route::group(['prefix'=>'/item'],function(){
    // Major
    Route::get('/addmajor', [ItemController::class,'addmajor'])->name("major.add")->middleware('isLoggedIn');
    Route::post('/majorstore', [ItemController::class,'majorstore'])->name("major.store");
    Route::get('/majorshow', [ItemController::class,'majorshow'])->name("major.show")->middleware('isLoggedIn');
    Route::get('/edit/{id}', [ItemController::class,'edit'])->name(".edit");
    Route::post('/update/{id}', [ItemController::class,'update'])->name(".update");
    Route::get('/delete/{id}', [ItemController::class,'delete'])->name(".delete");
    // Major Sub
    Route::get('/addmajorsub/{id}', [ItemController::class,'addmajorsub'])->name("majorsub.add")->middleware('isLoggedIn');
    Route::post('/majorsubstore', [ItemController::class,'majorsubstore'])->name("majorsub.store");
    Route::get('/show', [ItemController::class,'show'])->name(".show")->middleware('isLoggedIn');
    Route::get('/edit/{id}', [ItemController::class,'edit'])->name(".edit");
    Route::post('/update/{id}', [ItemController::class,'update'])->name(".update");
    Route::get('/delete/{id}', [ItemController::class,'delete'])->name(".delete");
    // Minor Sub
    Route::get('/addminorsub/{id}', [ItemController::class,'addminorsub'])->name("minorsub.add")->middleware('isLoggedIn');
    Route::post('/minorsubstore', [ItemController::class,'minorsubstore'])->name("minorsub.store");
    Route::get('/show', [ItemController::class,'show'])->name(".show")->middleware('isLoggedIn');
    Route::get('/edit/{id}', [ItemController::class,'edit'])->name(".edit");
    Route::post('/update/{id}', [ItemController::class,'update'])->name(".update");
    Route::get('/delete/{id}', [ItemController::class,'delete'])->name(".delete");
    // Item
    Route::get('/additem/{id}', [ItemController::class,'additem'])->name("item.add")->middleware('isLoggedIn');
    Route::post('/itemstore', [ItemController::class,'itemstore'])->name("item.store");
    Route::get('/show', [ItemController::class,'show'])->name(".show")->middleware('isLoggedIn');
    Route::get('/edit/{id}', [ItemController::class,'edit'])->name(".edit");
    Route::post('/update/{id}', [ItemController::class,'update'])->name(".update");
    Route::get('/delete/{id}', [ItemController::class,'delete'])->name(".delete");
    // Item detail
    Route::post('/updatedtl/{id}', [ItemController::class,'updatedtl'])->name("item.updatedtl");
    Route::get('/deletedtl/{id}', [ItemController::class,'deletedtl'])->name("item.deletedtl")->middleware('isLoggedIn');
});

Route::group(['prefix'=>'/office'],function(){
    // Office
    Route::get('/treeadd', [OfficeController::class,'treeadd'])->name("office.treeadd")->middleware('isLoggedIn');
    Route::get('/add/{id}', [OfficeController::class,'add'])->name("office.add")->middleware('isLoggedIn');
    Route::post('/store/{id}', [OfficeController::class,'store'])->name("office.store");
    Route::get('/show', [OfficeController::class,'show'])->name("office.show")->middleware('isLoggedIn');
    Route::get('/edit/{id}', [OfficeController::class,'edit'])->name("office.edit");
    Route::post('/update/{id}', [OfficeController::class,'update'])->name("office.update");
    Route::get('/delete/{id}', [OfficeController::class,'delete'])->name("office.delete");
});

Route::group(['prefix'=>'/supplier'],function(){
    // Supplier
    Route::get('/add', [SupplierController::class,'add'])->name("supplier.add")->middleware('isLoggedIn');
    Route::post('/store', [SupplierController::class,'store'])->name("supplier.store");
    Route::get('/show', [SupplierController::class,'show'])->name("supplier.show")->middleware('isLoggedIn');
    Route::get('/edit/{id}', [SupplierController::class,'edit'])->name("supplier.edit");
    Route::post('/update/{id}', [SupplierController::class,'update'])->name("supplier.update");
    Route::get('/delete/{id}', [SupplierController::class,'delete'])->name("supplier.delete");
    // Supplier Detail
    Route::get('/supplier_product/{id}', [SupplierController::class,'supplier_product'])->name("supplier.supplier_product");
    Route::get('/majorsub/{id}', [SupplierController::class,'majorsub']);
    Route::get('/minorsub/{id}', [SupplierController::class,'minorsub']);
    Route::get('/item/{id}', [SupplierController::class,'item']);
    Route::get('/itemCN/{id}', [SupplierController::class,'itemCN']);
    Route::post('/storedtl/{id}', [SupplierController::class,'storedtl'])->name("supplier.storedtl");
    Route::get('/editdtl/{id}', [SupplierController::class,'editdtl'])->name("supplier.editdtl")->middleware('isLoggedIn');
    Route::post('/updatedtl/{id}', [SupplierController::class,'updatedtl'])->name("supplier.updatedtl");
    Route::get('/deletedtl/{id}', [SupplierController::class,'deletedtl'])->name("supplier.deletedtl")->middleware('isLoggedIn');
});

Route::group(['prefix'=>'/allocation'],function(){
    // Allocation
    Route::get('/add', [AllocationController::class,'add'])->name("allocation.add")->middleware('isLoggedIn');
    Route::get('/getPoNo/{id}', [AllocationController::class,'getPoNo']);
    Route::post('/store', [AllocationController::class,'store'])->name("allocation.store");
    Route::get('/show', [AllocationController::class,'show'])->name("allocation.show")->middleware('isLoggedIn');
    Route::get('/edit/{id}', [AllocationController::class,'edit'])->name("allocation.edit");
    Route::get('/showreport/{id}', [AllocationController::class,'showreport'])->name("allocation.showreport");
    Route::get('/details/{id}/{id2?}', [AllocationController::class,'details'])->name("allocation.details");
    Route::post('/update/{id}', [AllocationController::class,'update'])->name("allocation.update");
    Route::get('/delete/{id}', [AllocationController::class,'delete'])->name("allocation.delete");
    // Allocation Detail
    Route::get('/office/{id}/{id2?}', [AllocationController::class,'office']);
    Route::get('/item/{id}', [AllocationController::class,'item']);
    Route::get('/quantity/{id}', [AllocationController::class,'quantity']);
    Route::post('/storedtl/{id}/{id2?}', [AllocationController::class,'storedtl'])->name("allocation.storedtl");
    Route::post('/updatedtl/{id}', [AllocationController::class,'updatedtl'])->name("allocation.updatedtl");
    Route::get('/deletedtl/{id}', [AllocationController::class,'deletedtl'])->name("allocation.deletedtl")->middleware('isLoggedIn');
});

Route::group(['prefix'=>'/usercreate'],function(){
    // User
    Route::get('/add', [UserCreateController::class,'add'])->name("usercreate.add")->middleware('isLoggedIn');
    Route::post('/store', [UserCreateController::class,'store'])->name("usercreate.store");
    Route::get('/show', [UserCreateController::class,'show'])->name("usercreate.show")->middleware('isLoggedIn');
    Route::get('/edit/{id}', [UserCreateController::class,'edit'])->name("usercreate.edit");
    Route::post('/update/{id}', [UserCreateController::class,'update'])->name("usercreate.update");
    Route::get('/delete/{id}', [UserCreateController::class,'delete'])->name("usercreate.delete");
    // User Detail
    Route::post('/storedtl/{id}', [UserCreateController::class,'storedtl'])->name("usercreate.storedtl");
    Route::get('/editdtl/{id}', [UserCreateController::class,'editdtl'])->name("usercreate.editdtl")->middleware('isLoggedIn');
    Route::post('/updatedtl/{id}', [UserCreateController::class,'updatedtl'])->name("usercreate.updatedtl");
    Route::get('/deletedtl/{id}', [UserCreateController::class,'deletedtl'])->name("usercreate.deletedtl")->middleware('isLoggedIn');
});

Route::group(['prefix'=>'/report'],function(){
    // Report
    Route::get('/purchaseOrderDetails', [ReportController::class,'purchaseOrderDetails'])->name("purchaseOrderDetails")->middleware('isLoggedIn');
    Route::post('/showPurchaseOrderDetails', [ReportController::class,'showPurchaseOrderDetails'])->name("showPurchaseOrderDetails")->middleware('isLoggedIn');
    Route::get('/purchaseOrderSummary', [ReportController::class,'purchaseOrderSummary'])->name("purchaseOrderSummary")->middleware('isLoggedIn');
    Route::post('/showpurchaseOrderSummary', [ReportController::class,'showpurchaseOrderSummary'])->name("showpurchaseOrderSummary")->middleware('isLoggedIn');
    
    Route::get('/receiveDetails', [ReportController::class,'receiveDetails'])->name("receiveDetails")->middleware('isLoggedIn');
    Route::post('/showreceiveDetails', [ReportController::class,'showreceiveDetails'])->name("showreceiveDetails")->middleware('isLoggedIn');
    Route::get('/receiveSummary', [ReportController::class,'receiveSummary'])->name("receiveSummary")->middleware('isLoggedIn');
    Route::post('/showreceiveSummary', [ReportController::class,'showreceiveSummary'])->name("showreceiveSummary")->middleware('isLoggedIn');
    
    Route::get('/requisitionDetails', [ReportController::class,'requisitionDetails'])->name("requisitionDetails")->middleware('isLoggedIn');
    Route::post('/showrequisitionDetails', [ReportController::class,'showrequisitionDetails'])->name("showrequisitionDetails")->middleware('isLoggedIn');
    Route::get('/requisitionSummary', [ReportController::class,'requisitionSummary'])->name("requisitionSummary")->middleware('isLoggedIn');
    Route::post('/showrequisitionSummary', [ReportController::class,'showrequisitionSummary'])->name("showrequisitionSummary")->middleware('isLoggedIn');

    Route::get('/allocationDetails', [ReportController::class,'allocationDetails'])->name("allocationDetails")->middleware('isLoggedIn');
    Route::post('/showallocationDetails', [ReportController::class,'showallocationDetails'])->name("showallocationDetails")->middleware('isLoggedIn');
    Route::get('/allocationSummary', [ReportController::class,'allocationSummary'])->name("allocationSummary")->middleware('isLoggedIn');
    Route::post('/showallocationSummary', [ReportController::class,'showallocationSummary'])->name("showallocationSummary")->middleware('isLoggedIn');

    Route::get('/issueDetails', [ReportController::class,'issueDetails'])->name("issueDetails")->middleware('isLoggedIn');
    Route::post('/showissueDetails', [ReportController::class,'showissueDetails'])->name("showissueDetails")->middleware('isLoggedIn');
    Route::get('/issueSummary', [ReportController::class,'issueSummary'])->name("issueSummary")->middleware('isLoggedIn');
    Route::post('/showissueSummary', [ReportController::class,'showissueSummary'])->name("showissueSummary")->middleware('isLoggedIn');
});