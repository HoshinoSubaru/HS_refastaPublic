@extends('layouts.app')
@section('title')メルマガ解除完了@endsection

@section('description')
リファスタのメルマガ解除申請の完了ページです。
@endsection

@include('mail_magazine_cancel.style')
<style>
    body{
        background: #fff;
    }
    .main_column{
        padding-bottom: 5rem;
    }
    .thanks_msg {
        text-align: center;
        padding: 3rem 1rem;
        background: #fff;
        border: 1px solid #fafafa;
        font-size: 18px;
        font-family: serif;
    }
    .wp-block-column.wp-block-column {
        margin: auto;
        padding: 0.5rem;
    }
    @media(max-width: 900px){
        .thanks_msg{
            text-align: left;
        }
    }
</style>
@section('content')
<div class="form_head">
    <h1>メルマガ解除完了</h1>
</div>

<div class="main_column">
    @if((isset($msg_type)) && (isset($msg)))
    <div class="alert alert-{{ $msg_type }}">{{ $msg }}</div>
    @else
    <div class="alert alert-info">メルマガ解除申請が完了致しました。</div>
    @endif

    <div class="panel panel-body">
        <div class="thanks_msg">
            いつもリファスタをご愛好頂き誠にありがとうございます。<br class="pc_only">
            「{{ $mailaddress }}」へのメルマガ配信停止を受け付けました。<br class="pc_only">
            時期により配信停止までお時間がかかることがございますので、<br class="pc_only">
            登録解除完了まで今しばらくお待ち頂きたく存じます。<br class="pc_only">
            他にもご不明点・ご質問などございましたら、いつでもお気軽にご相談ください。
        </div>

        {!! $takuhai_line_cta !!}
    </div>

</div>


@endsection

@section('body_last')
<script src="https://kit.fontawesome.com/811bbbf021.js" crossorigin="anonymous"></script>
@endsection

