@extends('layouts.app')
@section('title')メルマガ解除申請@endsection

@section('description')
リファスタのメルマガ解除申請フォームです。送信されたメルマガに記載のURLからのみ申し込めます。
@endsection

@include('mail_magazine_cancel.style')
@section('content')
<div class="form_head">
    <h1>メルマガ解除申請</h1>
</div>

<div class="main_column">
    @if(env("APP_DEBUG", false) === false)
        <form class="form" id="mail_magazine_cancel_form" action="/mail_magazine/cancel/{{ $send_mail_id }}/{{ $mailaddress }}" method="post" >
    @else
        <form class="form" id="mail_magazine_cancel_form" action="/refasta_public/mail_magazine/cancel/{{ $send_mail_id }}/{{ $mailaddress }}" method="post" >
    @endif
        {{ csrf_field() }}
        <table id="form_area">
            <tr>
                <th class="star">解除メールアドレス</th>
                <td>
                    <input type="text" name="mail" value="{{ $mailaddress }}" readonly />
                </td>
            </tr>
        </table>
        @if(env("APP_DEBUG", false) === true)
            <div class="thWide sendbox submit " id='submit_btn' >
                メルマガを解除する
            </div>
        @else
            <div class="g-recaptcha" data-callback="onSubmit" data-sitekey="{{ env("GOOGLE_RECAPTHA_SITEKEY") }}" ></div>
            <div class="thWide sendbox submit disabled" id='submit_btn' >
                メルマガを解除する
            </div>
        @endif

        <input type="hidden" name="send_mail_id" value="{{ $send_mail_id }}" readonly>
        <input type="hidden" name="mailaddress" value="{{ $mailaddress }}" readonly>
    </form>
</div>
@endsection

@section('body_last')
<script src='https://www.google.com/recaptcha/api.js'></script>
@include('mail_magazine_cancel.script')
@endsection

