<?php


use Illuminate\Support\Facades\Route;
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
// use Symfony\Component\Routing\Route;

Route::get('/debug-sentry', function () {
    throw new Exception('My first Sentry error!本番で反映');
  });
  
Route::get('/', function () {
    return view('welcome');
});

//入力画面
Route::get('mailingkit','MailingkitController@index');
// 202102/28 18:24より、"が末尾つくエラーが発生した。
Route::get('mailingkit/"', function () {
    return redirect('mailingkit');
});

//入力画面テスト
// Route::get('mailingkitTest20210217','MailingkitTestController@index');

//送信時エラーチェックや完了画面の表示
Route::get('mailingkit/thanks', function () {
    return redirect('mailingkit');
});
Route::post('mailingkit/thanks','MailingkitController@submit');


//test
// Route::get('mailingkit_test','TestController@index');
Route::get('mailingkitTest20210217','MailingkitTestController@index');

Route::get('mailingkitTest20210217/thanks', function () {
    return redirect('mailingkit');
});
Route::post('mailingkitTest20210217/thanks','MailingkitTestController@submit');

//メール送信テスト
// Route::get('mail_send_test','TestController@mail_send_test');

Route::get('info','InfoController@index');

Route::get('info/thanks', function () {
    return redirect('info');
});
Route::post('info/thanks','InfoController@submit');


Route::get('info_test', 'Info_testController@index');

Route::get('info_test/thanks', function () {
    return redirect('info');
});
Route::post('info_test/thanks', 'Info_testController@submit');

// メルマガ解除
Route::get('/mail_magazine/thanks', 'Mail_magazine_cancelController@thanks');
Route::get('/mail_magazine/cancel/{send_mail_id}/{mailaddress}', 'Mail_magazine_cancelController@index');
Route::post('/mail_magazine/cancel/{send_mail_id}/{mailaddress}', 'Mail_magazine_cancelController@cancel');
// メルマガ開封計測
Route::get('/mail_magazine/open/{send_mail_id}/{mailaddress}', 'Mail_magazine_openController@index');

/**
 * メール査定ご入力フォーム
 */
Route::get('/estimate', 'EstimateController@estimate');
Route::post('/estimate', 'EstimateController@estimate_update');
Route::get('/estimate_image', 'EstimateController@estimate');
Route::post('/estimate_image', 'EstimateController@estimate_image_update');
Route::get("/estimate/thanks", "EstimateController@estimate_thanks");
Route::post("/estimate/thanks", "EstimateController@estimate_thanks");

/**
 * 店頭入力ステップ
 */
// スタート画面
Route::get("shop_front/startPage", "Shop_frontController@startPage");
// ID生成処理＋お客様入力画面の開始
Route::get("shop_front/startPage/start", "Shop_frontController@dummy");
Route::post("shop_front/startPage/start", "Shop_frontController@input_start");
// 店頭買取入力画面
Route::get('/shop_front', 'Shop_frontController@shop_front');
Route::post('/shop_front_update', 'Shop_frontController@shop_front_update');
// 本人確認書類の撮影画面
Route::get("shop_front/iddocment_image_upload", "Shop_frontController@iddocment_image_upload_display");
Route::post("shop_front/iddocment_image_upload", "Shop_frontController@iddocment_image_upload");
//本人確認書類撮影確認画面
Route::get("shop_front/confirm_iddocment_image", "Shop_frontController@confirm_iddocment_image");
Route::post("shop_front/confirm_iddocment_image", "Shop_frontController@confirm_iddocment_image_yes");
// 商品の撮影画面
Route::get("shop_front/products_image_upload", "Shop_frontController@products_image_upload_display");
Route::post("shop_front/products_image_upload", "Shop_frontController@products_image_upload");
//商品撮影確認画面
Route::get("shop_front/confirm_image", "Shop_frontController@confirm_image");
Route::post("shop_front/confirm_image", "Shop_frontController@confirm_image_yes");

//本人確認書類&商品撮影確認画面
Route::get("shop_front/confirm_new_image", "Shop_frontController@confirm_new_image");
Route::post("shop_front/confirm_new_image", "Shop_frontController@confirm_new_image_yes");

//完了ページ
Route::get("shop_front/thanks", "Shop_frontController@thanks");

//タブレットをスタッフへ渡す画面
Route::get("shop_front/staff", "Shop_frontController@staff");


/**
 * 店頭入力ステップ END
 */


// evaProjectへ移動させる
//一覧画面
Route::get("shop_front/list", "shopFrontBackendController@list_display");
//入力内容の確認画面
Route::get("shop_front/check_contents", "shopFrontBackendController@check_contents_display");
Route::post("shop_front/check_contents", "shopFrontBackendController@check_contents");
//メール送信
Route::post("shop_front/send_mail", "shopFrontBackendController@send_mail");
//PDF作成
Route::get("shop_front/make_pdf", "shopFrontBackendController@make_pdf");
/**
 * 金地金精錬分割加工サービス
 */
// web.php
Route::get('/refining_info', 'RefiningInfoController@index');
Route::post('/refining_info', 'RefiningInfoController@sendEmail')->name('post.refining_info');
Route::get('/refining_info/thanks', 'RefiningInfoController@thanks')->name('thanks');

