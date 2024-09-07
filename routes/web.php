<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ProductRoiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\AgentListController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\UserCouponController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\OrderTrackingController;
use App\Http\Controllers\Frontend\CompareController;
use App\Http\Controllers\Frontend\ReviewController;

use App\Http\Controllers\backend\SettingController;
use App\Http\Controllers\backend\SliderController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\SubCategoryController;
use App\Http\Controllers\backend\SubSubCategoryController;
use App\Http\Controllers\backend\PagesController;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\backend\BlogController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\BannerController;
use App\Http\Controllers\backend\CouponController;
use App\Http\Controllers\backend\AdminOrderController;

use App\Http\Controllers\backend\CommissionController;
use App\Http\Controllers\backend\BalanceAdminController;
use App\Http\Controllers\backend\DepositeAdminProductController;
use App\Http\Controllers\backend\PackageController;
use App\Http\Controllers\backend\RefferelController;
use App\Http\Controllers\backend\GenerationController;
use App\Http\Controllers\backend\AdminCashoutController;
use App\Http\Controllers\backend\AdminUserListController;
use App\Http\Controllers\backend\AdminNotificationController;
use App\Http\Controllers\backend\ReportController;
use App\Http\Controllers\backend\SubscribeController;
use App\Http\Controllers\backend\CheckoutNoticeController;
use App\Http\Controllers\backend\CheckoutSettingController;
use App\Http\Controllers\backend\CountryDataController;
use App\Http\Controllers\backend\RoleController;
use App\Http\Controllers\backend\AgentController;
use App\Http\Controllers\backend\AdminProductCashoutController;
use App\Http\Controllers\backend\AdminRankController;
use App\Http\Controllers\backend\HotDealsController;
use App\Http\Controllers\backend\ManagementController;



use App\Http\Controllers\userpanel\BalanceController;
use App\Http\Controllers\userpanel\DepositeProductController;
use App\Http\Controllers\userpanel\NotificationController;
use App\Http\Controllers\userpanel\UserGenerationController;
use App\Http\Controllers\userpanel\TransferController;
use App\Http\Controllers\userpanel\UserRefferelController;
use App\Http\Controllers\userpanel\CashoutController;
use App\Http\Controllers\userpanel\IdUpgradeController;
use App\Http\Controllers\userpanel\TeamController;
use App\Http\Controllers\userpanel\RankController;
use App\Http\Controllers\userpanel\UserOrderController;
use App\Http\Controllers\userpanel\UserTreeController;
use App\Http\Controllers\userpanel\ProductCashoutController;

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





/*================== Start Frontend All Route ==============*/
Route::get('/', [FrontendController::class, 'index'])->name('home');

/*================== Multi Language All Routes =================*/
Route::get('/language/bangla', [LanguageController::class, 'Bangla'])->name('bangla.language');
Route::get('/language/english', [LanguageController::class, 'English'])->name('english.language');

/* =============== Product Details Show ============= */
Route::get('product-details/{slug}',[FrontendController::class, 'productDetails'])->name('product.details');

/* =============== Product view all Show ============= */
Route::get('product-view-all',[FrontendController::class, 'productViewAll'])->name('product.view.all');


/* =============== Start Product View Modal With Ajax ============== */
Route::get('/product/view/modal/{id}',[FrontendController::class,'ProductViewAjax']);

/* ============ Start Add To Cart Store Data With Ajax  ============= */
Route::post('/cart/data/store/{id}',[CartController::class, 'AddToCart'])->name('cart.add');

/* ============  Add to cart store data For Product Details Page With Ajax ============= */
Route::post('/dcart/product/details/store/{id}', [CartController::class, 'AddToCartDetails'])->name('cart.details.add');

/* ============ Start Mini Cart With Ajax  ============= */
Route::get('/product/mini/cart',[CartController::class,'AddMiniCart'])->name('minicart.add');
Route::get('/minicart/product-remove/{rowId}',[CartController::class,'RemoveMiniCart'])->name('minicart.remove');

/* ============ Cart Show   ============= */
Route::get('/cart',[CartController::class,'index'])->name('cart.show');
/* ============ Cart Get Product   ============= */
Route::get('/get-cart-product', [CartController::class, 'getCartProduct'])->name('getcart.product');

/* ============  Cart Increment  ============= */
Route::get('/cart-increment/{rowId}', [CartController::class, 'cartIncrement'])->name('cart.decrement');
/* ============  Cart Decrement  ============= */
Route::get('/cart-decrement/{rowId}', [CartController::class, 'cartDecrement'])->name('cart.decrement');
/* ============ Cart Remove   ============= */
Route::get('/cart-remove/{rowId}', [CartController::class, 'removeCartProduct'])->name('cart.remove');

/* ================= START COUPON OPTIONS ====================== */
Route::post('/coupon-apply',[UserCouponController::class, 'CouponApply']);
Route::get('/coupon-calculation', [UserCouponController::class, 'CouponCalculation']);
Route::get('/coupon-remove', [UserCouponController::class, 'CouponRemove']);
/* ================= END COUPON OPTIONS ====================== */

/* ============  Get Cart Checkout Product   ============= */
Route::get('/checkout',[CheckoutController::class,'index'])->name('checkout');
/* ============ Get Cart Checkout Product   ============= */

/* ============  Start Page Options   ============= */
Route::get('/page/{slug}',[FrontendController::class, 'pageAbout'])->name('page.about');
/* ============  End Page Options   ============= */

/* ============  Start Blog Options   ============= */
Route::get('/single-blog/{slug}',[FrontendController::class, 'pageBlog'])->name('blog.details');
/* ============  End Blog Options   ============= */

/*================   START DIVISION WITH DISTRICT/UPAZILA/UNION ROUTE   ==================*/
Route::get('/division-district/ajax/{division_id}',[CheckoutController::class,'getdivision'])->name('division.ajax');
Route::get('/district-upazilla/ajax/{district_id}',[CheckoutController::class,'getupazilla'])->name('upazilla.ajax');
Route::get('/upazilla-union/ajax/{upazilla_id}',[CheckoutController::class,'getunion'])->name('union.ajax');
/*================   END DIVISION WITH DISTRICT/UPAZILA/UNION ROUTE   ==================*/

/* =============== Start Payment Getway All Route ============= */
Route::post('/checkout/payment',[CheckoutController::class,'payment'])->name('checkout.payment');
Route::post('/checkout/store',[CheckoutController::class,'store'])->name('checkout.store');
Route::get('/checkout/success/{id}',[CheckoutController::class,'show'])->name('checkout.success');
/* =============== End Payment Getway All Route ============= */

/* =============== Start Category WiseProduct Show Route ============= */
Route::get('/category/product/{slug}', [FrontendController::class, 'CatWiseProduct'])->name('product.category');
Route::get('/subcategory/product/{slug}', [FrontendController::class, 'SubCatWiseProduct'])->name('product.subcategory');
Route::get('/childcategory/product/{slug}', [FrontendController::class, 'ChildCatWiseProduct'])->name('product.childcategory');
/* =============== End Category WiseProduct Show Route ============= */

/* =============== Product Search  ============= */
Route::post('/product/search', [FrontendController::class, 'productSearch'])->name('product.search');
/* =============== Advance Search ============= */
Route::post('search-product', [FrontendController::class, 'advanceProduct']);

/* =============== Management List ============= */
Route::get('/management/list/home', [FrontendController::class, 'ManagementList'])->name('home.management.index');
Route::get('/management/royal/list/home', [FrontendController::class, 'ManagementRoyalList'])->name('home.royal.index');
Route::get('/management/founder/list/home', [FrontendController::class, 'ManagementFounderList'])->name('home.founder.index');
Route::get('/agent/list/home', [FrontendController::class, 'AgentHomeList'])->name('home.agent.index');

/* =============== User Order Tracking Search ============= */
Route::get('/user/track/order', [OrderTrackingController::class, 'UserTrackOrder'])->name('user.track.order');
Route::post('/order/tracking', [OrderTrackingController::class, 'OrderTracking'])->name('order.tracking');

/* =============== User return order ============= */
Route::post('/return/order/{order_id}', [OrderTrackingController::class, 'ReturnOrder'])->name('return.order');
Route::get('/return/order/page', [OrderTrackingController::class, 'ReturnOrderPage'])->name('return.order.page');

/* =============== User subscribe route ============= */
Route::post('/subscribe/store', [FrontendController::class, 'SubsStore'])->name('subs.store');


/* ================ START ADD TO COMPARE WITH AJAX ============== */
Route::get('/compare',[CompareController::class, 'index'])->name('compare');
Route::get('/compare/reset',[CompareController::class, 'reset'])->name('compare.reset');
Route::post('/compare/addToCompare/{id}',[CompareController::class, 'addToCompare'])->name('compare.addToCompare');
/* ================ END ADD TO COMPARE WITH AJAX ============== */


/* =============== Start Customer Review Controller  ============= */
Route::post('/store/review',[ReviewController::class, 'store'])->name('store.review');
/* =============== End Customer Review Controller  ============= */

// register username check //
Route::get('/check/register/refer/{username}', [UserController::class, 'checkRegisterUsername']);
// register refer by check //
Route::get('check/register/refer/by/user/{referby}', [UserController::class, 'checkRegisterReferBy']);
// register placement by check //
Route::get('check/register/placement/{placement_id}', [UserController::class, 'RegisterPlacement']);

/// User Dashboard
Route::middleware(['auth'])->group(function() {

    Route::get('/dashboard', [UserController::class, 'UserDashboard'])->name('dashboard');
    Route::post('/user/profile/store', [UserController::class, 'UserProfileStore'])->name('user.profile.store');
    Route::get('/user/logout', [UserController::class, 'UserLogout'])->name('user.logout');
    Route::post('/user/update/password', [UserController::class, 'UserUpdatePassword'])->name('user.update.password');



    // start user convert all route //
    Route::get("/user/reffer/convert",[HomeController::class,'refferConvert'])->name('user.refer.convert');
    Route::get("/user/roc/convert",[HomeController::class,'rocConvert'])->name('user.roc.convert');
    Route::get("/user/generation/convert",[HomeController::class,'genConvert'])->name('user.generation.convert');
    // end user convert all route //

    // start user team count all route //
    Route::get("/user/team/index",[TeamController::class,'index'])->name('user.team.index');
    Route::get("/user/team/view/{id}",[TeamController::class,'view'])->name('user.team.view');
    Route::get("/user/team/bettings/{id}",[TeamController::class,'viewBettings'])->name('user.team.view.bettings');
    // end user team count all route //

    /* ================== start user placement count all route ================= */
    Route::get("/user/placement/index",[TeamController::class,'placement_index'])->name('user.placement.index');
    Route::get("/user/placement/view/{id}",[TeamController::class,'placement_view'])->name('user.placement.view');
    Route::get("/user/placement/genaration",[TeamController::class,'genaration_view'])->name('user.placement.genatation.index');
    /* ================== end user placement count all route ================= */

    Route::get("/user/dashboard",[HomeController::class,'index'])->name('user.home');
    Route::get("/user/logout",[HomeController::class,'UserLogout'])->name('user.logout');

    Route::get('/user/blank/page', [HomeController::class, 'blank'])->name('user.blank.page');

    // user balance request route //
    Route::get("/balance/request",[BalanceController::class,'index'])->name('balance.request.index');
    Route::post("/balance/request/store",[BalanceController::class,'store'])->name('balance.request.store');
    Route::get("/balance/request/show",[BalanceController::class,'balanceList'])->name('user.balance.request.list');

    // start user balance request all method show route //
    Route::get('/balance/usd/request', [BalanceController::class, 'usd'])->name('user.balance.usd.request');
    Route::get('/balance/bkash/request', [BalanceController::class, 'bkash'])->name('user.balance.bkash.request');
    Route::get('/balance/flexiload/request', [BalanceController::class, 'flexiload'])->name('user.balance.flexiload.request');
    Route::post('/balance/flexiload/store', [BalanceController::class, 'flexiloadStore'])->name('user.balance.flexiload.store');
    Route::get('/balance/nagad/request', [BalanceController::class, 'nagad'])->name('user.balance.nagad.request');
    Route::get('/balance/rocket/request', [BalanceController::class, 'rocket'])->name('user.balance.rocket.request');
    // end user balance request all method show route //

    // start user deposite product stock request all method show route //
    Route::get('/deposite/bkash/request', [DepositeProductController::class, 'bkash'])->name('user.deposite.bkash.request');
    Route::get('/deposite/nagad/request', [DepositeProductController::class, 'nagad'])->name('user.deposite.nagad.request');
    Route::get('/deposite/bank/request', [DepositeProductController::class, 'bank'])->name('user.deposite.bank.request');
    Route::post("/deposite/request/store",[DepositeProductController::class,'store'])->name('deposite.request.store');
    Route::get("/deposite/request/show",[DepositeProductController::class,'depositeList'])->name('user.deposite.request.list');
    // end user deposite product stock request all method show route //

    // user buy package route //
    Route::get("/buy/package/create",[BalanceController::class,'create'])->name('buy.package.create');
    Route::get('/packageInfo/user/{id}', [BalanceController::class, "buyPackageAjax"])->name('buyPackage.user');
    Route::post('/buy/package/store/{id}', [BalanceController::class, 'buyPackageUser'])->name('buy.package.store');
    Route::get('/buy/package/report', [BalanceController::class, 'buyPackageReport'])->name('user.buy.package.report');


    // user buy package id upgrade route //
    Route::get("/user/id/upgrade",[IdUpgradeController::class,'create'])->name('user.id.upgrade');
    Route::get('/user/package/IdUpgrade/{id}', [IdUpgradeController::class, "buyPackageAjax"])->name('buyPackageId.user');

    Route::post('/buy/id/upgrade/store/{id}', [IdUpgradeController::class, 'buyPackageUser'])->name('buy.id.upgrade.store');

    Route::get('/buy/package/report', [BalanceController::class, 'buyPackageReport'])->name('user.buy.package.report');


    // user roc report route //
    Route::get("/user/roc/report/show",[BalanceController::class,'roc'])->name('user.roc.report');
    Route::get("/user/roc/report/delete/{id}",[BalanceController::class,'rocDelete'])->name('user.roc.report.delete');


    // user profile all route //
    Route::get("/user/profile/view",[HomeController::class,'profileView'])->name('user.profile.view');
    Route::get("/user/profile/edit",[HomeController::class,'profileEdit'])->name('user.profile.edit');
    Route::post("/user/profile/update/{id}",[HomeController::class,'profileUpdate'])->name('user.profile.update');

    // user password change route //
    Route::get("/user/password/change",[HomeController::class,'UserChangePassword'])->name('user.password.change');
    Route::post("/user/password/update",[HomeController::class,'UserUpdatePassword'])->name('user.update.password');

    // user show notification all route //
    Route::get("/notification/index",[NotificationController::class,'index'])->name('user.notification');

    // user generation/refferel show all route //
    Route::get('/user/generation/index', [UserGenerationController::class, 'index'])->name('user.generation.list');
    Route::get('/user/generation/product/index', [UserGenerationController::class, 'productindex'])->name('user.product.generation.list');
    Route::get('/user/referral/index', [UserGenerationController::class, 'refferelIndex'])->name('user.refferel.list');
    
     Route::get('/user/referral/single/list/{id}', [UserGenerationController::class, 'refferelSingleIndex'])->name('single.refferel.list');

    // user capital transfer all route //
    Route::get('/user/transfer/create', [TransferController::class, 'create'])->name('user.transfer.create');
    Route::get('/user/amount/show/ajax/{id}', [TransferController::class, "transferAjax"])->name('transfer.show.amount');
    Route::post('/user/transfer/store', [TransferController::class, "store"])->name('user.transfer.store');

    // user send/recive transfer all route //
    Route::get('/user/transfer/send', [TransferController::class, 'send'])->name('user.send.transfer');
    Route::get('/user/transfer/recieve', [TransferController::class, 'recieve'])->name('user.recieve.transfer');
    Route::get('/user/transfer/recieve-roi', [TransferController::class, 'recieve_roi'])->name('user.recieve_roi.transfer');
    Route::get('/user/transfer/resell-roi', [TransferController::class, 'resell_roi'])->name('user.resell_roi.transfer');

    // user refferal link share all route //
    Route::get('/user/refferal/link', [UserRefferelController::class, 'index'])->name('user.refferal.link');

    // start user cashout/withdraw all route //
    Route::get('/user/cashout/request', [CashoutController::class, 'index'])->name('user.cashout.request');
    Route::post('/user/cashout/store', [CashoutController::class, 'store'])->name('cashout.request.store');
    Route::get('/user/cashout/report/show', [CashoutController::class, 'report'])->name('user.cashout.report');
    // end user cashout/withdraw all route //

    // user start cashout all method all route //
    Route::get('/user/cashout/usd/request', [CashoutController::class, 'usd'])->name('user.cashout.usd.request');
    Route::get('/user/cashout/bkash/request', [CashoutController::class, 'bkash'])->name('user.cashout.bkash.request');
    Route::get('/user/cashout/nagad/request', [CashoutController::class, 'nagad'])->name('user.cashout.nagad.request');
    Route::get('/user/cashout/rocket/request', [CashoutController::class, 'rocket'])->name('user.cashout.rocket.request');
    // user end cashout all method all route //

    // start user cashout/withdraw all route //
    Route::get('/user/product/cashout/request', [ProductCashoutController::class, 'index'])->name('user.product.cashout.request');
    Route::post('/user/product/cashout/store', [ProductCashoutController::class, 'store'])->name('cashout.product.request.store');
    Route::get('/user/product/cashout/report/show', [ProductCashoutController::class, 'report'])->name('user.product.cashout.report');
    // end user cashout/withdraw all route //

    // user start cashout all method all route //
    Route::get('/user/product/cashout/bkash/request', [ProductCashoutController::class, 'bkash'])->name('user.product.cashout.bkash.request');
    Route::get('/user/product/cashout/nagad/request', [ProductCashoutController::class, 'nagad'])->name('user.product.cashout.nagad.request');
    Route::get('/user/product/cashout/bank/request', [ProductCashoutController::class, 'bank'])->name('user.cashout.bank.request');
    // user end cashout all method all route //

    // start user income statement all route //
    Route::get('/user/income', [CashoutController::class, 'IncomeStatement'])->name('user.income');

    // start user rank incentive all route //
    Route::get('/user/rank/index', [RankController::class, 'index'])->name('user.rank.index');
    // end user rank incentive all route //

    /* ================ start  user orders all route =============== */
    Route::get('/user/order/view', [UserOrderController::class, 'index'])->name('user.orders.index');
    Route::get('/user/orders/{invoice_no}',[UserOrderController::class, 'orderView'])->name('order.view');
    Route::get('/user/orders2/view',[UserOrderController::class, 'orderView2'])->name('user.orders2.index');
    /* ================ end  user orders all route =============== */


    /* ================ start  user invoice all route =============== */
    Route::get('/invoice/download/{order_id}',[UserOrderController::class, 'UserOrderInvoice'])->name('order.invoice.download');
    /* ================ end  user invoice all route =============== */

    /* ================ start  user tree/binary all route =============== */
    Route::get('/user/tree/view',[UserTreeController::class, 'index'])->name('user.tree');
    Route::get('/user/tree/report',[UserTreeController::class, 'treeReport'])->name('user.tree.summary');
    /* ================ end  user tree/binary all route =============== */



    Route::get('/buy/package/report/show', [BalanceController::class, 'buyPackageReportShow'])->name('user.buy.package.report.show');
});

/// Admin Dashboard
Route::middleware(['auth','role:admin'])->group(function() {

    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashobard');
    Route::get('/admin/logout', [AdminController::class, 'AdminDestroy'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('update.password');

});

/// Vendor Dashboard
Route::middleware(['auth','role:vendor'])->group(function() {

    Route::get('/vendor/dashboard', [VendorController::class, 'VendorDashboard'])->name('vendor.dashobard');
    Route::get('/vendor/logout', [VendorController::class, 'VendorDestroy'])->name('vendor.logout');
    Route::get('/vendor/profile', [VendorController::class, 'VendorProfile'])->name('vendor.profile');
    Route::post('/vendor/profile/store', [VendorController::class, 'VendorProfileStore'])->name('vendor.profile.store');
    Route::get('/vendor/change/password', [VendorController::class, 'VendorChangePassword'])->name('vendor.change.password');
    Route::post('/vendor/update/password', [VendorController::class, 'VendorUpdatePassword'])->name('vendor.update.password');
});

/// Agent Dashboard
Route::middleware(['auth','role:agent'])->group(function() {
    Route::get('/agent/dashboard', [AgentListController::class, 'AgentDashboard'])->name('agent.dashobard');
    Route::get('/agent/logout', [AgentListController::class, 'AgentDestroy'])->name('agent.logout');
    Route::get('/agent/profile', [AgentListController::class, 'AgentProfile'])->name('agent.profile');
    Route::post('/agent/profile/store', [AgentListController::class, 'AgentProfileStore'])->name('agent.profile.store');
    Route::get('/agent/change/password', [AgentListController::class, 'AgentChangePassword'])->name('agent.change.password');
    Route::post('/agent/update/password', [AgentListController::class, 'AgentUpdatePassword'])->name('agent.update.password');
    // start agent pos product all route //
    Route::get('/agent/product/all', [AgentListController::class, 'AgentProductList'])->name('agent.product.list');
    Route::get('/agent/pos/product/{id}', [AgentListController::class, 'getProduct'])->name('agent.pos.getProduct');
	Route::get('/agent/pos/get-products', [AgentListController::class, 'filter'])->name('agent.pos.filter');
	Route::POST('/agent/pos/store', [AgentListController::class, 'posStore'])->name('agent.pos.store');
	Route::get('/agent/order/list', [AgentListController::class, 'agent_order_list'])->name('agent.order.product.list');

    Route::get('/agent/Orders/show/{id}', [AgentListController::class, 'agebtOrdersShow'])->name('agent.order.show');
    Route::get('/agent/Orders/invoice/download/{id}', [AgentListController::class, 'agentOrdersInvoice'])->name('agent.invoice.download');
    // agent product transfer route //
   
    // end agent pos product all route //

    // agent balance request route //
    Route::get('/agent/bank/request', [AgentListController::class, 'AgentBank'])->name('agent.bank.request');
    Route::get('/agent/bkash/request', [AgentListController::class, 'AgentBkash'])->name('agent.bkash.request');
    Route::get('/agent/nagad/request', [AgentListController::class, 'AgentNagad'])->name('agent.nagad.request');
    Route::get('/agent/rocket/request', [AgentListController::class, 'AgentRocket'])->name('agent.rocket.request');
    Route::get('/agent/balance/request/all', [AgentListController::class, 'AgentBalanceList'])->name('agent.balance.request.list');
    Route::post('/agent/balance/request/store', [AgentListController::class, 'AgentBalanceRequestStore'])->name('agent.balance.request.store');

    // agent withdraw request route //
    Route::get('/agent/withdraw/usd/request', [AgentListController::class, 'AgentWithdrawUsd'])->name('agent.usd.withdraw.request');
    Route::get('/agent/withdraw/bkash/request', [AgentListController::class, 'AgentWithdrawBkash'])->name('agent.bkash.withdraw.request');
    Route::get('/agent/withdraw/nagad/request', [AgentListController::class, 'AgentWithdrawNagad'])->name('agent.nagad.withdraw.request');
    Route::get('/agent/withdraw/rocket/request', [AgentListController::class, 'AgentWithdrawRocket'])->name('agent.rocket.withdraw.request');
    Route::get('/agent/withdraw/balance/request/all', [AgentListController::class, 'AgentWithdrawBalanceList'])->name('agent.withdraw.request.list');
    Route::post('/agent/withdraw/balance/request/store', [AgentListController::class, 'AgentWithdrawRequestStore'])->name('agent.withdraw.request.store');

    // agent notice board route //
    Route::get('/agent/all/notice', [AgentListController::class, 'AgentNotice'])->name('agent.notice.board');

});


/* =============== Admin & Vendor Login ============== */
Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->middleware(RedirectIfAuthenticated::class);

Route::get('/vendor/login', [VendorController::class, 'VendorLogin'])->name('vendor.login')->middleware(RedirectIfAuthenticated::class);

Route::get('/become/vendor', [VendorController::class, 'BecomeVendor'])->name('become.vendor');
Route::post('/vendor/register', [VendorController::class, 'VendorRegister'])->name('vendor.register');

// start agent login panel //
Route::get('/agent/login', [AgentListController::class, 'AgentLogin'])->name('agent.login')->middleware(RedirectIfAuthenticated::class);
// end agent login panel //


/* =============== Admin All Route ============== */
Route::middleware(['auth','role:admin'])->group(function() {

    /* ==================== Admin Setting All Routes =================== */
    Route::prefix('setting')->group(function(){

        Route::get("/general/settings",[SettingController::class,'index'])->name('setting.index');
        Route::post("/general/settings",[SettingController::class,'update'])->name('setting.update');
        Route::get("/color/settings",[SettingController::class,'colorIndex'])->name('color.index');
        Route::post("/color/settings/update/{id}",[SettingController::class,'colorUpdate'])->name('color_settings.update');

    });

    /* ==================== Admin Slider All Routes =================== */
    Route::prefix('slider')->group(function(){
        Route::get('/index', [SliderController::class, 'index'])->name('slider.index')->middleware('permission:slider.index');
        Route::get('/create', [SliderController::class, 'create'])->name('slider.create')->middleware('permission:slider.create');
        Route::post('/store', [SliderController::class, 'store'])->name('slider.store');
        Route::get('/edit/{id}', [SliderController::class, 'edit'])->name('slider.edit');
        Route::get('/view/{id}', [SliderController::class, 'view'])->name('slider.view');
        Route::post('/update/{id}',[SliderController::class, 'update'])->name('slider.update');
        Route::get('/delete/{id}', [SliderController::class, 'delete'])->name('slider.delete');
        Route::get('/slider_active/{id}', [SliderController::class, 'active'])->name('slider.active');
        Route::get('/slider_inactive/{id}', [SliderController::class, 'inactive'])->name('slider.in_active');
    });
    /* ==================== Admin Hot Deals Slider All Routes =================== */
    Route::prefix('hot_deals_slider')->group(function(){
        Route::get('/index', [HotDealsController::class, 'index'])->name('hot_deals_slider.index')->middleware('permission:slider.index');
        Route::get('/create', [HotDealsController::class, 'create'])->name('hot_deals_slider.create')->middleware('permission:slider.create');
        Route::post('/store', [HotDealsController::class, 'store'])->name('hot_deals_slider.store');
        Route::get('/edit/{id}', [HotDealsController::class, 'edit'])->name('hot_deals_slider.edit');
        Route::get('/view/{id}', [HotDealsController::class, 'view'])->name('hot_deals_slider.view');
        Route::post('/update/{id}',[HotDealsController::class, 'update'])->name('hot_deals_slider.update');
        Route::get('/delete/{id}', [HotDealsController::class, 'delete'])->name('hot_deals_slider.delete');
        Route::get('/slider_active/{id}', [HotDealsController::class, 'active'])->name('hot_deals_slider.active');
        Route::get('/slider_inactive/{id}', [HotDealsController::class, 'inactive'])->name('hot_deals_slider.in_active');
    });

    /* ==================== Admin Category All Routes =================== */
    Route::prefix('category')->group(function(){
        Route::get('/index', [CategoryController::class, 'index'])->name('category.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/view/{id}', [CategoryController::class, 'view'])->name('category.view');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::post('/update/{id}',[CategoryController::class, 'update'])->name('category.update');
        Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
        Route::get('/category_active/{id}', [CategoryController::class, 'active'])->name('category.active');
        Route::get('/category_inactive/{id}', [CategoryController::class, 'inactive'])->name('category.in_active');
    });

    /* ==================== Admin SubCategory All Routes =================== */
    Route::prefix('subcategory')->group(function(){
        Route::get('/index', [SubCategoryController::class, 'index'])->name('subcategory.index');
        Route::get('/create', [SubCategoryController::class, 'create'])->name('subcategory.create');
        Route::post('/store', [SubCategoryController::class, 'store'])->name('subcategory.store');
        Route::get('/view/{id}', [SubCategoryController::class, 'view'])->name('subcategory.view');
        Route::get('/edit/{id}', [SubCategoryController::class, 'edit'])->name('subcategory.edit');
        Route::post('/update/{id}',[SubCategoryController::class, 'update'])->name('subcategory.update');
        Route::get('/delete/{id}', [SubCategoryController::class, 'delete'])->name('subcategory.delete');
        Route::get('/subcategory_active/{id}', [SubCategoryController::class, 'active'])->name('subcategory.active');
        Route::get('/subcategory_inactive/{id}', [SubCategoryController::class, 'inactive'])->name('subcategory.in_active');
        Route::get('/category-subcategory/ajax/{category_id}',[SubCategoryController::class,'getsubcategory'])->name('subcategory.ajax');
    });

    /* ==================== Admin SubSubCategory All Routes =================== */
    Route::prefix('subsubcategory')->group(function(){
        Route::get('/index', [SubSubCategoryController::class, 'index'])->name('subsubcategory.index');
        Route::get('/create', [SubSubCategoryController::class, 'create'])->name('subsubcategory.create');
        Route::post('/store', [SubSubCategoryController::class, 'store'])->name('subsubcategory.store');
        Route::get('/view/{id}', [SubSubCategoryController::class, 'view'])->name('subsubcategory.view');
        Route::get('/edit/{id}', [SubSubCategoryController::class, 'edit'])->name('subsubcategory.edit');
        Route::post('/update/{id}',[SubSubCategoryController::class, 'update'])->name('subsubcategory.udate');
        Route::get('/delete/{id}', [SubSubCategoryController::class, 'destroy'])->name('subsubcategory.delete');
        Route::get('/subsubcategory_active/{id}', [SubSubCategoryController::class, 'active'])->name('subsubcategory.active');
        Route::get('/subsubcategory_inactive/{id}', [SubSubCategoryController::class, 'inactive'])->name('subsubcategory.in_active');

    });

    /* ==================== Admin Pages  All Routes =================== */
    Route::prefix('pages')->group(function(){
        Route::get('/index', [PagesController::class, 'index'])->name('pages.index');
        Route::get('/create', [PagesController::class, 'create'])->name('pages.create');
        Route::post('/store', [PagesController::class, 'store'])->name('pages.store');
        Route::get('/view/{id}', [PagesController::class, 'view'])->name('pages.view');
        Route::get('/edit/{id}', [PagesController::class, 'edit'])->name('pages.edit');
        Route::post('/update/{id}',[PagesController::class, 'update'])->name('pages.update');
        Route::get('/delete/{id}', [PagesController::class, 'delete'])->name('pages.delete');
        Route::get('/pages_active/{id}', [PagesController::class, 'active'])->name('pages.active');
        Route::get('/pages_inactive/{id}', [PagesController::class, 'inactive'])->name('pages.in_active');
    });

    /* ==================== Admin Brand All Routes =================== */
    Route::prefix('brand')->group(function(){
        Route::get('/index', [BrandController::class, 'index'])->name('brand.index');
        Route::get('/create', [BrandController::class, 'create'])->name('brand.create');
        Route::post('/store', [BrandController::class, 'store'])->name('brand.store');
        Route::get('/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
        Route::get('/view/{id}', [BrandController::class, 'view'])->name('brand.view');
        Route::get('/view/{id}', [BrandController::class, 'view'])->name('brand.view');
        Route::post('/update/{id}',[BrandController::class, 'update'])->name('brand.update');
        Route::get('/delete/{id}', [BrandController::class, 'delete'])->name('brand.delete');
        Route::get('/brand_active/{id}', [BrandController::class, 'active'])->name('brand.active');
        Route::get('/brand_inactive/{id}', [BrandController::class, 'inactive'])->name('brand.in_active');
    });

    /* ==================== Admin  Blog All Routes =================== */
    Route::prefix('blog')->group(function(){
        Route::get('/index', [BlogController::class, 'index'])->name('blog.index');
        Route::get('/create', [BlogController::class, 'create'])->name('blog.create');
        Route::post('/store', [BlogController::class, 'store'])->name('blog.store');
        Route::get('/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
        Route::post('/update/{id}',[BlogController::class, 'update'])->name('blog.update');
        Route::get('/delete/{id}', [BlogController::class, 'destroy'])->name('blog.delete');
        Route::get('/blog_active/{id}', [BlogController::class, 'active'])->name('blog.active');
        Route::get('/blog_inactive/{id}', [BlogController::class, 'inactive'])->name('blog.in_active');
        Route::get('/view/{id}', [BlogController::class, 'view'])->name('blog.view');
    });

    /* ==================== Admin  Product All Routes =================== */
    Route::prefix('products')->group(function(){
        Route::get('/index', [ProductController::class, 'index'])->name('product.index');
        Route::get('/create', [ProductController::class, 'create'])->name('product.create');
        Route::post('/store', [ProductController::class, 'store'])->name('product.store');
        Route::get('/view/{id}', [ProductController::class, 'show'])->name('product.view');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::post('/update/{id}',[ProductController::class, 'update'])->name('product.update');
        Route::get('/delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');
        Route::get('/multiimg/delete/{id}', [ProductController::class, 'MultiImageDelete'])->name('product.multiimg.delete');
        Route::get('/product_active/{id}', [ProductController::class, 'active'])->name('product.active');
        Route::get('/product_inactive/{id}', [ProductController::class, 'inactive'])->name('product.in_active');

        // For Product Stock
        Route::get('/product/stock', [ProductController::class, 'ProductStock'])->name('product.stock');

        /* ================  Start Product Import & Export Routes  ================== */
        Route::get('/product/import', [ProductController::class, 'ProductImport'])->name('product.import');
        Route::post('/product/import/store', [ProductController::class, 'ProductImportStore'])->name('product.import.store');
        Route::get('/product/export', [ProductController::class, 'ProductExport'])->name('product.export');
        /* ================  End Product Import & Export Routes  ================== */


        /* ================  Category & Subcategory With Ajax ================== */
        Route::get('/category-subcategory/ajax/{category_id}',[ProductController::class,'getsubcategory'])->name('subcategory.product.ajax');
        Route::get('/subcategory-subsubcategory/ajax/{subcategory_id}',[ProductController::class,'getsubsubcategory'])->name('subsubcategory.product.ajax');

        /* ================  Start Product Ajax All Store ================== */
        Route::post('/category/insert',[ProductController::class,'categoryInsert'])->name('product.category.store');
        Route::post('/subcategory/insert',[ProductController::class,'subcategoryInsert'])->name('product.subcategory.store');
        Route::post('/subsubcategory/insert',[ProductController::class,'subsubcategoryInsert'])->name('product.subsubcategory.store');
        Route::post('/brand/insert',[ProductController::class,'brandInsert'])->name('product.brand.store');
        /* ================  End Product Ajax All Store ================== */
    });

    /* ==================== Admin  Banner All Routes =================== */
    Route::prefix('banner')->group(function(){
        Route::get('/index', [BannerController::class, 'index'])->name('banner.index');
        Route::get('/create', [BannerController::class, 'create'])->name('banner.create');
        Route::post('/store', [BannerController::class, 'store'])->name('banner.store');
        Route::get('/edit/{id}', [BannerController::class, 'edit'])->name('banner.edit');
        Route::get('/view/{id}', [BannerController::class, 'view'])->name('banner.view');
        Route::get('/view/{id}', [BannerController::class, 'view'])->name('banner.view');
        Route::post('/update/{id}',[BannerController::class, 'update'])->name('banner.update');
        Route::get('/delete/{id}', [BannerController::class, 'delete'])->name('banner.delete');
        Route::get('/banner_active/{id}', [BannerController::class, 'active'])->name('banner.active');
        Route::get('/banner_inactive/{id}', [BannerController::class, 'inactive'])->name('banner.in_active');
    });

    /* ================  Admin Coupon All Route ================== */
    Route::prefix('coupon')->group(function(){
        Route::get('/index', [CouponController::class, 'index'])->name('coupon.index');
        Route::get('/create', [CouponController::class, 'create'])->name('coupon.create');
        Route::post('/store', [CouponController::class, 'store'])->name('coupon.store');
        Route::get('/edit/{id}', [CouponController::class, 'edit'])->name('coupon.edit');
        Route::post('/update/{id}',[CouponController::class, 'update'])->name('coupon.update');
        Route::get('/delete/{id}', [CouponController::class, 'destroy'])->name('coupon.delete');

        Route::get('/coupon_active/{id}', [CouponController::class, 'active'])->name('coupon.active');
        Route::get('/coupon_inactive/{id}', [CouponController::class, 'inactive'])->name('coupon.in_active');
        Route::get('/coupon/{id}', [CouponController::class, 'view'])->name('coupon.view');
    });

    /* ================  Start User Orders All Route ================== */
    Route::prefix('orders')->group(function(){
        // Orders All Route
        Route::get('/all_orders', [AdminOrderController::class, 'index'])->name('order.index')->middleware('permission:sale.order.show');
        Route::get('/all_orders/{id}/show', [AdminOrderController::class, 'show'])->name('order.show');

        Route::get('/orders_delete/{id}', [AdminOrderController::class, 'destroy'])->name('order.delete');
        Route::post('/orders_update/{id}', [AdminOrderController::class, 'update'])->name('admin.orders.update');
        Route::get('/invoice/{id}', [AdminOrderController::class, 'invoice_download'])->name('invoice.download');
        Route::get('/invoice/show/{id}', [AdminOrderController::class, 'invoice_show'])->name('invoice.show');

        // payment status
        Route::post('/orders/update_payment_status', [AdminOrderController::class, 'update_payment_status'])->name('orders.update_payment_status');
        // delivery status
        Route::post('/orders/update_delivery_status', [AdminOrderController::class, 'update_delivery_status'])->name('orders.update_delivery_status');

        /*================   START DIVISION WITH DISTRICT/UPAZILA/UNION ROUTE   ==================*/
        Route::get('/division-district/ajax/{division_id}',[AdminOrderController::class,'getdivision'])->name('division.ajax');
        Route::get('/district-upazilla/ajax/{district_id}',[AdminOrderController::class,'getupazilla'])->name('upazilla.ajax');
        Route::get('/upazilla-union/ajax/{upazilla_id}',[AdminOrderController::class,'getunion'])->name('union.ajax');
        /*================   END DIVISION WITH DISTRICT/UPAZILA/UNION ROUTE   ==================*/

        // Return Orders All Route
        Route::get('/return/request', [AdminOrderController::class, 'ReturnRequest'])->name('return.request');
        Route::get('/return/request/approved/{order_id}', [AdminOrderController::class, 'ReturnRequestApproved'])->name('return.request.approved');
        Route::get('/complete/return/request', [AdminOrderController::class, 'CompleteReturnRequest'])->name('complete.return.request');
    });
    /* ================  End User Orders All Route ================== */


    /* ================  Admin Commision All Route ================== */
    Route::prefix('commission')->group(function(){
        Route::get("/index",[CommissionController::class,'index'])->name('commission.index');
        Route::post("/update/{id}",[CommissionController::class,'update'])->name('commission.update');
    });
    /* ================  End Commision All Route ================== */

    /* ================  Admin Package All Route ================== */
    Route::prefix('packages')->group(function(){
        Route::get("/create",[PackageController::class,'create'])->name('package.create');
        Route::post("/store",[PackageController::class,'store'])->name('package.store');
        Route::get("/list",[PackageController::class,'index'])->name('package.list');
        Route::get("/edit/{id}",[PackageController::class,'edit'])->name('package.edit');
        Route::post("/update/{id}",[PackageController::class,'update'])->name('package.update');
        Route::get("/delete/{id}",[PackageController::class,'destroy'])->name('package.delete');
    });
    /* ================  End Package All Route ================== */

    /* ================  Admin wallet All Route ================== */
    Route::prefix('wallet')->group(function(){
        Route::get("/index",[BalanceAdminController::class,'walletIndex'])->name('admin.wallet.index');
        Route::post("/update/{id}",[BalanceAdminController::class,'walletUpdate'])->name('admin.wallet.update');
    });
    /* ================  End wallet All Route ================== */

    /* ================  Admin refferel All Route ================== */
    Route::prefix('refferel')->group(function(){
        Route::get('/index', [RefferelController::class, 'index'])->name('admin.refferel.index');
    });
    /* ================  End refferel All Route ================== */

    /* ================  Admin generation All Route ================== */
    Route::prefix('generation')->group(function(){
        Route::get('/index', [GenerationController::class, 'index'])->name('admin.generation.index');
    });
    /* ================  End generation All Route ================== */

    /* ================  Admin cashout All Route ================== */
    Route::prefix('cashout')->group(function(){
        Route::get('/report/show', [AdminCashoutController::class, 'index'])->name('admin.cashout.report');
        Route::post('/approved/request/{id}', [AdminCashoutController::class, 'acceptRequest'])->name('admin.approved.request');
        Route::post('/cancel/request/{id}', [AdminCashoutController::class, 'cancelRequest'])->name('admin.cancel.request');
        Route::get('/accept/list', [AdminCashoutController::class, 'cashoutAcceptList'])->name('admin.cashout.accept.list');
        Route::get('/reject/list', [AdminCashoutController::class, 'cashoutRejectList'])->name('admin.cashout.reject.list');
    });
    /* ================  End cashout All Route ================== */

    /* ================  Admin Product cashout All Route ================== */
    Route::prefix('product-cashout')->group(function(){
        Route::get('/report/show', [AdminProductCashoutController::class, 'index'])->name('admin.product.cashout.report');
        Route::post('/approved/request/{id}', [AdminProductCashoutController::class, 'acceptRequest'])->name('admin.product.approved.request');
        Route::post('/cancel/request/{id}', [AdminProductCashoutController::class, 'cancelRequest'])->name('admin.product.cancel.request');
        Route::get('/accept/list', [AdminProductCashoutController::class, 'cashoutAcceptList'])->name('admin.product.cashout.accept.list');
        Route::get('/reject/list', [AdminProductCashoutController::class, 'cashoutRejectList'])->name('admin.product.cashout.reject.list');
    });
    /* ================  End Product cashout All Route ================== */

    /* ================  Admin user list All Route ================== */
    Route::prefix('userlist')->group(function(){
        Route::get("/create",[AdminUserListController::class,'create'])->name('admin.user.create');
        Route::post("/store",[AdminUserListController::class,'store'])->name('admin.user.store');
        Route::get("/index",[AdminUserListController::class,'userList'])->name('admin.user.index');
        Route::get("/active/index",[AdminUserListController::class,'activeuserList'])->name('admin.user.active.index');
        Route::get("/edit/{id}",[AdminUserListController::class,'userEdit'])->name('admin.user.edit');
        Route::post("/update/{id}",[AdminUserListController::class,'userUpdate'])->name('admin.user.update');
        Route::get("/delete/{id}",[AdminUserListController::class,'destroy'])->name('admin.user.delete');
    });
    /* ================  End user list All Route ================== */

    /* ================  Admin balance list/approved/reject  All Route ================== */
    Route::prefix('balance')->group(function(){
        Route::get("/request/index",[BalanceAdminController::class,'index'])->name('admin.balance.request');
        Route::get("/request/approved/{id}",[BalanceAdminController::class,'approved'])->name('approved.balance.request');
        Route::get("/request/reject/{id}",[BalanceAdminController::class,'reject'])->name('reject.balance.request');
        Route::get("/image/show/{id}",[BalanceAdminController::class,'imageShow'])->name('admin.balance.image.show');
        Route::get('/all/approved/request', [BalanceAdminController::class, 'adminAllApprovedRequest'])->name('admin.all.approved.request');
        Route::get('/all/reject/request', [BalanceAdminController::class, 'adminAllRejectedRequest'])->name('admin.all.rejected.request');
    });
    /* ================  End balance list/approved/reject  All Route ================== */

    /* ================  Admin product deposte  All Route ================== */
     Route::prefix('product-stock')->group(function(){
        Route::get("/request/index",[DepositeAdminProductController::class,'index'])->name('admin.deposite.request');
        Route::get("/request/approved/{id}",[DepositeAdminProductController::class,'approved'])->name('approved.deposite.request');
        Route::get("/request/reject/{id}",[DepositeAdminProductController::class,'reject'])->name('reject.deposite.request');
        Route::get("/image/show/{id}",[DepositeAdminProductController::class,'imageShow'])->name('admin.deposite.image.show');
        Route::get('/all/approved/request', [DepositeAdminProductController::class, 'adminAllApprovedRequest'])->name('admin.all.deposite.approved.request');
        Route::get('/all/reject/request', [DepositeAdminProductController::class, 'adminAllRejectedRequest'])->name('admin.all.deposite.rejected.request');
        Route::get('/create', [DepositeAdminProductController::class, 'create'])->name('admin.deposite.commission.create');
        Route::get('/store/{id}', [DepositeAdminProductController::class, 'store'])->name('admin.deposite.commission.store');
    });
    /* ================  End product deposite All Route ================== */

    /* ================  Admin order notifications  All Route ================== */
    Route::prefix('notification')->group(function(){

        Route::get('/all-notification', [AdminNotificationController::class, 'index'])->name('admin.all-notification');
    });
    /* ================  End order notifications  All Route ================== */

    /* ================  Start Admin order report  All Route ================== */
    Route::prefix('order-report')->group(function(){
        Route::get("/report/view",[ReportController::class,'ReportView'])->name('report.view');
        Route::post("/search/by/date",[ReportController::class,'SearchByDate'])->name('search-by-date');
        Route::post("/search/by/month",[ReportController::class,'SearchByMonth'])->name('search-by-month');
        Route::post("/search/by/year",[ReportController::class,'SearchByYear'])->name('search-by-year');
    });
    /* ================  End Admin order report  All Route ================== */

    /* ================  Start Admin Reviw All Route ================== */
    Route::prefix('review')->group(function(){
        Route::get('/pending/review', [ReviewController::class, 'PendingReview'])->name('pending.review');
        Route::get('/review/approve/{id}', [ReviewController::class, 'ReviewApprove'])->name('review.approve');
        Route::get('/publish/review', [ReviewController::class, 'PublishReview'])->name('publish.review');
        Route::get('/review/delete/{id}', [ReviewController::class, 'ReviewDelete'])->name('review.delete');
    });
    /* ================  End Admin Reviw All Route ================== */

    /* ================  Start Subscriber All Route ================== */
    Route::prefix('subscribes')->group(function(){

        Route::get('/index', [SubscribeController::class, 'index'])->name('subscribe.index');
        Route::post('/store', [SubscribeController::class, 'store'])->name('subscribe.store');
        Route::get('/subscribe-delete/{id}', [SubscribeController::class, 'destroy'])->name('subscribe.delete');
    });
    /* ================  End Subscriber All Route ================== */

    /* ================  Start checkout notices All Route ================== */
    Route::prefix('checkout-notices')->group(function(){

        Route::get('/index', [CheckoutNoticeController::class, 'index'])->name('checkoutnotice.index');
        Route::get('/create', [CheckoutNoticeController::class, 'create'])->name('checkoutnotice.create');
        Route::post('/store', [CheckoutNoticeController::class, 'store'])->name('checkoutnotice.store');
        Route::get('/edit/{id}', [CheckoutNoticeController::class, 'edit'])->name('checkoutnotice.edit');
        Route::post('/update/{id}', [CheckoutNoticeController::class, 'update'])->name('checkoutnotice.update');
        Route::get('/delete/{id}', [CheckoutNoticeController::class, 'destroy'])->name('checkoutnotice.delete');
        Route::get('/checkout_active/{id}', [CheckoutNoticeController::class, 'active'])->name('checkoutnotice.active');
        Route::get('/checkout_inactive/{id}', [CheckoutNoticeController::class, 'inactive'])->name('checkoutnotice.in_active');
    });
    /* ================  End checkout notices All Route ================== */

    /* ================  Start checkout settings All Route ================== */
    Route::prefix('checkout-settings')->group(function(){

        Route::get('/create', [CheckoutSettingController::class, 'create'])->name('checkout.setting.create');
        Route::post('/store', [CheckoutSettingController::class, 'store'])->name('checkout.setting.store');
        Route::get('/index', [CheckoutSettingController::class, 'index'])->name('checkout.setting.index');
        Route::get('/edit/{id}', [CheckoutSettingController::class, 'edit'])->name('checkout.setting.edit');
        Route::post('/update/{id}', [CheckoutSettingController::class, 'update'])->name('checkout.setting.update');
        Route::get('/delete/{id}', [CheckoutSettingController::class, 'destroy'])->name('checkout.setting.delete');
        Route::get('/checkout_active/{id}', [CheckoutSettingController::class, 'active'])->name('checkout.setting.active');
        Route::get('/checkout_inactive/{id}', [CheckoutSettingController::class, 'inactive'])->name('checkout.setting.in_active');
    });
    /* ================  End checkout settings All Route ================== */

    /* ================  Start Backend Division/District/Upazilla All Route ================== */
    // Add Division
    Route::get('division/view', [CountryDataController::class, 'index'])->name('admin.division.view');
    Route::post('division/add/store', [CountryDataController::class, 'StoreDivision'])->name('admin.division.store');
    Route::get('division/delete/{id}', [CountryDataController::class, 'DivisionDelete'])->name('admin.division.delete');

    // Add District
    Route::get('district/view', [CountryDataController::class, 'DistrictIndex'])->name('admin.district.view');
    Route::post('district/add/store', [CountryDataController::class, 'StoreDistrict'])->name('admin.district.store');
    Route::get('district/delete/{id}', [CountryDataController::class, 'districtDelete'])->name('admin.district.delete');

    // Add Sub District
    Route::get('subdistrict/view', [CountryDataController::class, 'SubdistrictIndex'])->name('admin.subdistrict.view');
    Route::post('subdistrict/add/store', [CountryDataController::class, 'StoreSubdistrict'])->name('admin.subdistrict.store');
    Route::get('subdistrict/delete/{id}', [CountryDataController::class, 'SubdistrictDelete'])->name('admin.subdistrict.delete');
    Route::get('subdistrict/ajax/{id}', [CountryDataController::class, 'SubdistrictAjax'])->name('admin.subdistrict.ajax');

    // Add Union
    Route::get('union/view', [CountryDataController::class, 'UnionIndex'])->name('admin.union.view');
    Route::post('union/add/store', [CountryDataController::class, 'StoreUnion'])->name('admin.union.store');
    Route::get('union/delete/{id}', [CountryDataController::class, 'UnionDelete'])->name('admin.union.delete');
    Route::get('union/ajax/{id}', [CountryDataController::class, 'Unionajax'])->name('admin.union.ajax');
    Route::get('upzilatounion/ajax/{id}', [CountryDataController::class, 'UpzilatoUnionjax'])->name('admin.upzilatounion.ajax');
    /* ================  End Backend Division/District/Upazilla All Route ================== */

    /* ================  Start Permission All Route ================== */
    Route::prefix('permission')->group(function(){
        Route::get('/create', [RoleController::class, 'AddPermission'])->name('add.permission');
        Route::post('/store', [RoleController::class, 'StorePermission'])->name('permission.store');
        Route::get('/index', [RoleController::class, 'AllPermission'])->name('all.permission');
        Route::get('/edit/{id}', [RoleController::class, 'EditPermission'])->name('edit.permission');
        Route::post('/update/{id}', [RoleController::class, 'UpdatePermission'])->name('permission.update');
        Route::get('/delete/{id}', [RoleController::class, 'DeletePermission'])->name('delete.permission');
    });
    /* ================  End Permission All Route ================== */

    /* ================  Start Roles All Route ================== */
    Route::prefix('roles')->group(function(){
        Route::get('/create', [RoleController::class, 'AddRoles'])->name('add.roles');
        Route::post('/store', [RoleController::class, 'StoreRoles'])->name('roles.store');
        Route::get('/index', [RoleController::class, 'AllRoles'])->name('all.roles');
        Route::get('/edit/{id}', [RoleController::class, 'EditRoles'])->name('edit.roles');
        Route::post('/update/{id}', [RoleController::class, 'UpdateRoles'])->name('roles.update');
        Route::get('/delete/{id}', [RoleController::class, 'DeleteRoles'])->name('delete.roles');
    });
    /* ================  End Roles All Route ================== */


    /* ================  Start Add Roles in Permission All Route ================== */
    Route::prefix('roles-permission')->group(function(){
        Route::get('/create', [RoleController::class, 'AddRolesPermission'])->name('add.roles.permission');
        Route::post('/store', [RoleController::class, 'StoreRolesPermission'])->name('role.permission.store');
        Route::get('/index', [RoleController::class, 'AllRolesPermission'])->name('all.roles.permission');
        Route::get('/edit/{id}', [RoleController::class, 'AdminEditRoles'])->name('admin.edit.roles');
        Route::post('/update/{id}', [RoleController::class, 'RolePermissionUpdate'])->name('role.permission.update');
        Route::get('/delete/{id}', [RoleController::class, 'AdminDeleteRoles'])->name('admin.delete.roles');
    });
    /* ================  End Add Roles in Permission All Route ================== */

    /* ================  Start Admin User All Route  ================== */
    Route::prefix('admin-user')->group(function(){
        Route::get('/create', [AdminController::class, 'AddAdmin'])->name('add.admin');
        Route::post('/store', [AdminController::class, 'AdminUserStore'])->name('admin.store');
        Route::get('/all/admin', [AdminController::class, 'AllAdmin'])->name('all.admin');
        Route::get('/edit/{id}', [AdminController::class, 'EditAdminRole'])->name('edit.admin');
        Route::post('/update/{id}', [AdminController::class, 'AdminUserUpdate'])->name('admin.update');
        Route::get('/delete/{id}', [AdminController::class, 'DeleteAdminRole'])->name('delete.admin');
    });
    /* ================  End Admin User All Route  ================== */

    //ROI route starts here
     Route::get('view/all/quiz', [QuizController::class,'index'])->name('admin.quiz.index');
     Route::get('create/quiz', [QuizController::class,'create'])->name('admin.quiz.create');
     Route::post('process/quiz', [QuizController::class,'store'])->name('admin.quiz.store');

    

    //ROI route starts here
    Route::get('view/all/product-roi', [ProductRoiController::class,'index'])->name('admin.product_roi.index');
    Route::get('create/product-roi', [ProductRoiController::class,'create'])->name('admin.product_roi.create');
    Route::post('process/product-roi', [ProductRoiController::class,'store'])->name('admin.product_roi.store');
    
    
    /* ================  Start Agent All Route  ================== */
    Route::prefix('admin-agent')->group(function(){
        Route::get('/create', [AgentController::class, 'create'])->name('create.agent');
        Route::post('/store', [AgentController::class, 'store'])->name('agent.store');
        Route::get('/index', [AgentController::class, 'index'])->name('all.agent');
        Route::get('/edit/{id}', [AgentController::class, 'edit'])->name('agent.edit');
        Route::post('/update/{id}', [AgentController::class, 'update'])->name('agent.update');
        Route::get('/delete/{id}', [AgentController::class, 'destroy'])->name('agent.destroy');
        Route::get('/division/agent', [AgentController::class, 'divisionAgent'])->name('division.agent');
        Route::get('/district/agent', [AgentController::class, 'districtAgent'])->name('district.agent');
        Route::get('/upazilla/agent', [AgentController::class, 'upazillaAgent'])->name('upazilla.agent');
        Route::get('/agent/orders/list', [AgentController::class, 'agentOrders'])->name('all.agent.orders');
    });
    /* ================  End Agent All Route  ================== */

    /* ================  Start Agent All Route  ================== */
    Route::prefix('admin-rank')->group(function(){
        Route::get('/create', [AdminRankController::class, 'create'])->name('admin.rank.create');
        Route::get('/store/{id}', [AdminRankController::class, 'store'])->name('admin.rank.commission.store');
        Route::get('/smart/create', [AdminRankController::class, 'smart_create'])->name('admin.smart.create');
        Route::get('/ambassador/create', [AdminRankController::class, 'ambassador_create'])->name('admin.ambassador.create');
        Route::get('/brand/create', [AdminRankController::class, 'brand_create'])->name('admin.brand.create');
        Route::get('/crown/create', [AdminRankController::class, 'crown_create'])->name('admin.crown.create');
        Route::get('/executive/create', [AdminRankController::class, 'executive_create'])->name('admin.executive.create');
        Route::post('/ambassador/store', [AdminRankController::class, 'ambassador_store'])->name('admin.rank.ambassador.store');
        Route::post('/smart/store', [AdminRankController::class, 'smart_store'])->name('admin.rank.smart.store');
        Route::post('/brand/store', [AdminRankController::class, 'brand_store'])->name('admin.rank.brand.store');
        Route::post('/crown/store', [AdminRankController::class, 'crown_store'])->name('admin.rank.crown.store');
        Route::post('/executive/store', [AdminRankController::class, 'executive_store'])->name('admin.rank.executive.store');
    });
    /* ================  End Agent All Route  ================== */

    /* ==================== Admin Management All Routes =================== */
    Route::prefix('management')->group(function(){
        Route::get('/index', [ManagementController::class, 'index'])->name('management.index');
        Route::get('/create', [ManagementController::class, 'create'])->name('management.create');
        Route::post('/store', [ManagementController::class, 'store'])->name('management.store');
        Route::get('/view/{id}', [ManagementController::class, 'view'])->name('management.view');
        Route::get('/edit/{id}', [ManagementController::class, 'edit'])->name('management.edit');
        Route::post('/update/{id}',[ManagementController::class, 'update'])->name('management.update');
        Route::get('/delete/{id}', [ManagementController::class, 'delete'])->name('management.delete');
        Route::get('/management_active/{id}', [ManagementController::class, 'active'])->name('management.active');
        Route::get('/management_inactive/{id}', [ManagementController::class, 'inactive'])->name('management.in_active');
    });
    

    // Route::get('view/all/quiz', 'QuizController@index')->name('admin.quiz.index');
    // Route::get('create/quiz', 'QuizController@create')->name('admin.quiz.create');
    // Route::post('process/quiz', 'QuizController@store')->name('admin.quiz.store');
    



}); // Admin End Middleware

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
