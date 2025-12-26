@extends('layouts.app')
@section('title')店頭入力@endsection

@section('description')
    リファスタの店頭入力ページです
@endsection

@section('content')

    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                お客様一覧画面
            </div>
            <div class="card-body">
                <table class="table table-hover table-sm main_table">
                    <tr>
                        <th>id</th>
                        <th></th>
                        <th>所有物</th>
                        <th>本人確認書類</th>
                        <th>PP同意</th>
                        <th>初利用</th>
                        <th>姓</th>
                        <th>名</th>
                        <th>セイ</th>
                        <th>メイ</th>
                        <th>性別</th>
                        <th>生年月日</th>
                        <th>都道府県</th>
                        <th>市区町村</th>
                        <th>以下住所</th>
                        <th>建物種類</th>
                        <th>住まい</th>
                        <th>電話</th>
                        <th>メアド</th>
                        <th>職業</th>
                        <th>職業テキスト</th>
                        <th>キャンペーンコード</th>
                        <th>結果</th>
                        <th>売買目的</th>
                        <th>署名</th>
                        <th>本人確認書類</th>
                        <th>商品画像</th>
                        <th>送信日</th>
                        <th>作成日</th>
                        <th>作成者（不要）</th>
                        <th>更新日</th>
                        <th>更新者（不要）</th>
                    </tr>

                    @foreach($shop_front_lists as $shop_front_list)

                            <tr>
                                <td>{{ $shop_front_list->shop_front_id }}</td>
                                <td>
                                    <a class="btn btn-info" href="{{ env("APP_URL") }}/shop_front/check_contents?shop_front_id={{ $shop_front_list->shop_front_id }}">内容確認</a>
                                    <a class="btn btn-info" href="{{ env("APP_URL") }}/shop_front/make_pdf?shop_front_id={{ $shop_front_list->shop_front_id }}">PDF確認</a>
                                </td>
                                <td>{{ $shop_front_list->is_own }}</td>
                                <td>{{ $shop_front_list->iddocment_category }}</td>
                                <td>{{ $shop_front_list->is_confirm_pp }}</td>
                                <td>{{ $shop_front_list->is_first }}</td>
                                <td>{{ $shop_front_list->lastname }}</td>
                                <td>{{ $shop_front_list->firstname }}</td>
                                <td>{{ $shop_front_list->furigana_lastname }}</td>
                                <td>{{ $shop_front_list->furigana_firstname }}</td>
                                <td>{{ $shop_front_list->gender }}</td>
                                <td>{{ $shop_front_list->birthday }}</td>
                                <td>{{ $shop_front_list->prefecture }}</td>
                                <td>{{ $shop_front_list->city }}</td>
                                <td>{{ $shop_front_list->town }}</td>
                                <td>{{ $shop_front_list->building_types }}</td>
                                <td>{{ $shop_front_list->dwelling_types }}</td>
                                <td>{{ $shop_front_list->tel }}</td>
                                <td>{{ $shop_front_list->email }}</td>
                                <td>{{ $shop_front_list->job_category }}</td>
                                <td>{{ $shop_front_list->job_category_freetext }}</td>
                                <td>{{ $shop_front_list->campaign }}</td>
                                <td>{{ $shop_front_list->taransaction_result }}</td>
                                <td>{{ $shop_front_list->trading }}</td>
                                <td><img src="{{ $shop_front_list->sign_img_path }}"></td>
                                <td><img src="{{ $shop_front_list->iddocment_image_path }}"></td>
                                <td><img src="{{ $shop_front_list->products_image_path }}"></td>
                                <td>{{ $shop_front_list->send_at }}</td>
                                <td>{{ $shop_front_list->created_at }}</td>
                                <td>{{ $shop_front_list->created_by }}</td>
                                <td>{{ $shop_front_list->updated_at }}</td>
                                <td>{{ $shop_front_list->updated_by }}</td>
                            </tr>
                    @endforeach

                </table>

@endsection
<style>
.container-fluid.container-fluid{
    width:min-content;
}
.main_table th, .main_table td{
    font-size: 12px;
    word-break: keep-all;
}
</style>

@section('body_last')
@endsection