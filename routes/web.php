    <?php

use Illuminate\Support\Facades\Route;


Route::group(['namespace'=>'Admin\Auth','prefix'=>'admincp'],function (){
    Route::get('/login',[
        'uses' => 'AuthController@login',
        'as'   => 'admin.auth.login'
    ]);
    Route::post('/login',[
        'uses' => 'AuthController@postLogin',
        'as'   => 'admin.auth.postLogin'
    ]);
    Route::get('/logout',[
        'uses' => 'AuthController@logout',
        'as'   => 'admin.auth.logout'
    ]);
});

Route::group(['namespace'=>'Admin','prefix'=>'admincp', 'middleware' => ['auth','guest:admin']],function (){
    Route::get('/',[
        'uses' => 'IndexController@index',
        'as'   => 'admin.index'
    ]);
    Route::group(['prefix'=>'danh-muc'],function (){
        Route::get('',[
            'uses' => 'CategoriesController@index',
            'as'   => 'admin.categories.get'
        ]);
        Route::get('them-danh-muc',[
            'uses' => 'CategoriesController@create',
            'as'   => 'admin.categories.add'
        ]);
        Route::post('them-danh-muc',[
            'uses' => 'CategoriesController@store',
            'as'   => 'admin.categories.postAdd'
        ]);
        Route::get('xoa-danh-muc-{id}',[
            'uses' => 'CategoriesController@destroy',
            'as'   => 'admin.categories.destroy'
        ]);
        Route::get('sua-danh-muc-{id}',[
            'uses' => 'CategoriesController@edit',
            'as'   => 'admin.categories.update'
        ]);
        Route::post('sua-danh-muc-{id}',[
            'uses' => 'CategoriesController@update',
            'as'   => 'admin.categories.postUpdate'
        ]);
        Route::get('trang-thai-{id}',[
            'uses' => 'CategoriesController@status',
            'as'   => 'admin.categories.status'
        ]);
    });
    Route::group(['prefix'=>'san-pham'],function (){
        Route::get('',[
            'uses' => 'ProductsController@index',
            'as'   => 'admin.products.get'
        ]);
        Route::get('them-san-pham',[
            'uses' => 'ProductsController@create',
            'as'   => 'admin.products.add'
        ]);
        Route::post('them-san-pham',[
            'uses' => 'ProductsController@store',
            'as'   => 'admin.products.postAdd'
        ]);
        Route::get('xoa-san-pham-{id}',[
            'uses' => 'ProductsController@destroy',
            'as'   => 'admin.products.destroy'
        ]);
        Route::get('sua-san-pham-{id}',[
            'uses' => 'ProductsController@edit',
            'as'   => 'admin.products.update'
        ]);
        Route::post('sua-san-pham-{id}',[
            'uses' => 'ProductsController@update',
            'as'   => 'admin.products.postUpdate'
        ]);
        Route::get('binh-luan-sp/{slug}/{id}',[
            'uses' => 'ProductsController@viewComment',
            'as'   => 'admin.products.comment'
        ]);
        Route::get('xoa-cmt/{id}',[
            'uses' => 'ProductsController@delComment',
            'as'   => 'admin.products.delComment'
        ]);
        Route::post('them-qty',[
            'uses' => 'ProductsController@addQty',
            'as'   => 'admin.products.addQty'
        ]);
    });
    Route::group(['prefix'=>'tin-tuc'],function (){
        Route::get('',[
            'uses' => 'NewsController@index',
            'as'   => 'admin.news.get'
        ]);
        Route::get('them-tin',[
            'uses' => 'NewsController@create',
            'as'   => 'admin.news.add'
        ]);
        Route::post('them-tin',[
            'uses' => 'NewsController@store',
            'as'   => 'admin.news.postAdd'
        ]);
        Route::get('xoa-tin-{id}',[
            'uses' => 'NewsController@destroy',
            'as'   => 'admin.news.destroy'
        ]);
        Route::get('sua-tin-{id}',[
            'uses' => 'NewsController@edit',
            'as'   => 'admin.news.update'
        ]);
        Route::post('sua-tin-{id}',[
            'uses' => 'NewsController@update',
            'as'   => 'admin.news.postUpdate'
        ]);
    });
    Route::group(['prefix'=>'ma-giam-gia'],function (){
        Route::get('',[
            'uses' => 'GiftCodesController@index',
            'as'   => 'admin.giftcode.get'
        ]);
        Route::get('them-ma',[
            'uses' => 'GiftCodesController@create',
            'as'   => 'admin.giftcode.add'
        ]);
        Route::post('them-ma',[
            'uses' => 'GiftCodesController@store',
            'as'   => 'admin.giftcode.postAdd'
        ]);
        Route::get('xoa-ma-{id}',[
            'uses' => 'GiftCodesController@destroy',
            'as'   => 'admin.giftcode.destroy'
        ]);
        Route::get('sua-ma-{id}',[
            'uses' => 'GiftCodesController@edit',
            'as'   => 'admin.giftcode.update'
        ]);
        Route::post('sua-ma-{id}',[
            'uses' => 'GiftCodesController@update',
            'as'   => 'admin.giftcode.postUpdate'
        ]);
    });
    Route::group(['prefix'=>'slides'],function (){
        Route::get('',[
            'uses' => 'SlidesController@index',
            'as'   => 'admin.slides.get'
        ]);
        Route::get('them-slides',[
            'uses' => 'SlidesController@create',
            'as'   => 'admin.slides.add'
        ]);
        Route::post('them-slides',[
            'uses' => 'SlidesController@store',
            'as'   => 'admin.slides.postAdd'
        ]);
        Route::get('xoa-slides-{id}',[
            'uses' => 'SlidesController@destroy',
            'as'   => 'admin.slides.destroy'
        ]);
        Route::get('sua-slides-{id}',[
            'uses' => 'SlidesController@edit',
            'as'   => 'admin.slides.update'
        ]);
        Route::post('sua-slides-{id}',[
            'uses' => 'SlidesController@update',
            'as'   => 'admin.slides.postUpdate'
        ]);
    });
    Route::group(['prefix'=>'lien-he'],function (){
        Route::get('',[
            'uses' => 'ContactsController@index',
            'as'   => 'admin.contacts.get'
        ]);
        Route::get('xoa-slides-{id}',[
            'uses' => 'ContactsController@destroy',
            'as'   => 'admin.contacts.destroy'
        ]);
        Route::post('tra-loi-{id}',[
            'uses' => 'ContactsController@confirm',
            'as'   => 'admin.contacts.confirm'
        ]);
    });
    Route::group(['prefix'=>'nguoi-dung'],function (){
        Route::get('',[
            'uses' => 'UsersController@index',
            'as'   => 'admin.users.get'
        ]);
        Route::get('them-nguoi-dung',[
            'uses' => 'UsersController@create',
            'as'   => 'admin.users.add'
        ]);
        Route::post('them-nguoi-dung',[
            'uses' => 'UsersController@store',
            'as'   => 'admin.users.postAdd'
        ]);
        Route::get('xoa-nguoi-dung-{id}',[
            'uses' => 'UsersController@destroy',
            'as'   => 'admin.users.destroy'
        ]);
        Route::get('sua-nguoi-dung-{id}',[
            'uses' => 'UsersController@edit',
            'as'   => 'admin.users.update'
        ]);
        Route::post('sua-nguoi-dung-{id}',[
            'uses' => 'UsersController@update',
            'as'   => 'admin.users.postUpdate'
        ]);
    });
    Route::group(['prefix'=>'don-hang'],function (){
        Route::get('',[
            'uses' => 'TransactionsController@index',
            'as'   => 'admin.transactions.get'
        ]);
        Route::post('xem-don-hang',[
            'uses' => 'TransactionsController@show',
            'as'   => 'admin.transactions.show'
        ]);
        Route::get('xu-ly-don-hang-{id}',[
            'uses' => 'TransactionsController@approved',
            'as'   => 'admin.transactions.approved'
        ]);
        Route::get('xoa-don-hang-{id}',[
            'uses' => 'TransactionsController@destroy',
            'as'   => 'admin.transactions.destroy'
        ]);
        Route::get('xuat-don-hang-{id}',[
            'uses' => 'TransactionsController@export',
            'as'   => 'admin.transactions.export'
        ]);
        Route::get('mail-{id}',[
            'uses' => 'TransactionsController@sendMail',
            'as'   => 'admin.transactions.sendMail'
        ]);
    });
    Route::group(['prefix'=>'thong-ke'],function (){
        Route::get('don-hang-thang/nam-{year}',[
            'uses' => 'ReportController@bills',
            'as'   => 'admin.report.bill'
        ]);
        Route::get('export',[
            'uses' => 'ReportController@exportBill',
            'as'   => 'admin.report.exportBill'
        ]);
        Route::get('nhan-vien',[
            'uses' => 'ReportController@employee',
            'as'   => 'admin.report.employee'
        ]);
        Route::post('chi-tiet-don-cua-nhan-vien',[
            'uses' => 'ReportController@employeeDetail',
            'as'   => 'admin.report.employeeDetail'
        ]);
    });
    Route::group(['prefix'=>'role'],function (){
        Route::get('phan-quyen','RolesUserController@index')->name('admin.rolep.index');
        Route::get('phan-quyen/{id}','RolesUserController@edit')->name('admin.rolep.edit');
        Route::post('phan-quyen/{id}','RolesUserController@postEdit')->name('admin.rolep.postEdit');
    });
});

    Auth::routes(['verify' => true]);

Route::group(['namespace'=>'Home'],function (){
    //verify
    Route::group([],function (){
        Route::get('/email/resend','VerifyController@resend')->name('verify.resend');
        Route::get('/email/verify/{id}/{hash}','VerifyController@verify')->name('verification.verify');
    });

    Route::get('',[
        'uses' => 'IndexController@index',
        'as'   => 'home.index'
    ]);
    Route::get('/danh-muc-{name}/{id}',[
        'uses' => 'IndexController@categories',
        'as'   => 'home.page.categories'
    ]);
    Route::get('/san-pham-{name}/{id}',[
        'uses' => 'IndexController@product',
        'as'   => 'home.page.product'
    ]);
    Route::post('/comment-{id}',[
        'uses' => 'IndexController@comment',
        'as'   => 'home.page.comment'
    ]);
    Route::get('/lien-he',[
        'uses' => 'IndexController@contact',
        'as'   => 'home.page.contact'
    ]);
    Route::post('/lien-he',[
        'uses' => 'IndexController@postContact',
        'as'   => 'home.page.postContact'
    ]);
    Route::get('/tin-tuc',[
        'uses' => 'IndexController@news',
        'as'   => 'home.page.news'
    ]);
    Route::get('/tin/{id}',[
        'uses' => 'IndexController@newDetail',
        'as'   => 'home.page.newDetail'
    ]);
    Route::group(['prefix'=>'gio-hang'],function (){
        Route::get('/',[
            'uses' => 'CartController@index',
            'as'   => 'home.shopping.index'
        ]);
        Route::post('/them-{id}',[
            'uses' => 'CartController@store',
            'as'   => 'home.shopping.store'
        ]);
        Route::post('/cap-nhap',[
            'uses' => 'CartController@update',
            'as'   => 'home.shopping.update'
        ]);
        Route::get('/xoa-all',[
            'uses' => 'CartController@destroy',
            'as'   => 'home.shopping.destroy'
        ]);
        Route::get('/xoa-{id}',[
            'uses' => 'CartController@remove',
            'as'   => 'home.shopping.remove'
        ]);
        Route::post('/ma-giam-gia',[
            'uses' => 'CartController@giftCode',
            'as'   => 'home.shopping.giftCode'
        ]);
    });
    Route::group(['prefix'=>'thanh-toan'],function (){
        Route::get('/',[
            'uses' => 'IndexController@checkout',
            'as'   => 'home.page.checkout'
        ]);
        Route::post('/them-don-hang',[
            'uses' => 'CheckOutController@store',
            'as'   => 'home.checkout.store'
        ]);
        Route::post('/cap-nhap-thong-tin',[
            'uses' => 'CheckOutController@updateUser',
            'as'   => 'home.checkout.updateUser'
        ]);
    });
    Route::get('/dang-nhap',[
        'uses' => 'AuthController@login',
        'as'   => 'home.page.login'
    ]);
    Route::post('/dang-nhap',[
        'uses' => 'AuthController@postLogin',
        'as'   => 'home.page.postLogin'
    ]);


    Route::get('/dang-ky',[
        'uses' => 'AuthController@register',
        'as'   => 'home.page.register'
    ]);
    Route::post('/dang-ky',[
        'uses' => 'AuthController@postRegister',
        'as'   => 'home.page.postRegister'
    ]);
    Route::get('/dang-xuat',[
        'uses' => 'AuthController@logout',
        'as'   => 'home.page.logout'
    ]);
    Route::group(['prefix'=>'user-{id}'],function () {
        Route::get('/',[
            'uses' => 'UserController@index',
            'as'   => 'home.page.user'
        ]);
        Route::post('/cap-nhap-thong-tin',[
            'uses' => 'UserController@updateInfo',
            'as'   => 'home.page.updateInfor'
        ]);
        Route::get('/don-hang-da-mua-{status}',[
            'uses' => 'UserController@billBought',
            'as'   => 'home.page.billBought'
        ]);
        Route::get('/don-hang-doi-xua-ly-{status}',[
            'uses' => 'UserController@billBought',
            'as'   => 'home.page.billBought'
        ]);
    });
    Route::get('xem-don-hang-cua-toi',[
        'uses' => 'UserController@showBillDetail',
        'as'   => 'home.transactions.show'
    ]);
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
