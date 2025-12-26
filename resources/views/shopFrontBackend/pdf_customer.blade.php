<!DOCTYPE html>
<html>

<head>
    {{-- <link rel="stylesheet" href="{{ env("APP_DIR") }}/css/pdf.css">--}}
    <link rel="stylesheet" href="https://localhost/refasta_public/css/pdf.css">
</head>

<body>
<table>
    {{-- お客様記入欄 --}}
    <tr class="customer_input">
        <td colspan="11">▼お客さま記入欄▼下記4つの内容を承諾し左側のチェックボックスにチェック（✔︎）をお願いします。その上でご記入ください。</td>
    </tr>
    <tr>
        <td class="text_center padding_side">□</td>
        <td colspan="10">個人情報保護方針及び取扱い通知事項に同意します。</td>
    </tr>
    <tr>
        <td class="text_center padding_side">□</td>
        <td colspan="10">代金のお振込、代金のお渡し後は売買契約が成立し、品物の所有権は弊社に移る事を了承します。</td>
    </tr>
    <tr>
        <td class="text_center padding_side">□</td>
        <td colspan="10">このPDFに記載した事項に関し、一切の虚偽申請の無い事を約束します。</td>
    </tr>
    <tr>
        <td class="text_center padding_side">□</td>
        <td colspan="10">万が一不正商品（ご利用規約第17条）に該当した場合、全額返金する事を了承致します。</td>
    </tr>

    {{--本人特定事項等--}}
    <tr class="identity_identification">
        <td colspan="11" class="text_center">本人特定事項　　　※必ず自筆でご記入ください。※契約成立後のキャンセルは出来かねます。</td>
    </tr>
    <tr>
        <td class="text_center vertical" rowspan="6">支払いを受ける者</td>
    </tr>
    <tr>
        <td rowspan="2" class="bg_color keep_all text_center">領収日</td>
        <td rowspan="2" colspan="2"></td>
        <td rowspan="2" class="bg_color text_center">お名前</td>
        <td colspan="5">{{$shop_front_detail->furigana_lastname}}　{{$shop_front_detail->furigana_firstname}}</td>
        <td colspan="3" class="text_center">ご職業</td>
    </tr>
    <td class="height_tr">
        <td colspan="5">{{$shop_front_detail->lastname}}　{{$shop_front_detail->firstname}}</td>
        <td class="text_small" colspan="4"></td>
    </tr>
    <tr class="height_tr">
        <td rowspan="2" class="text_center ke
      ep_all">住居</td>
        <td colspan="2"></td>
        <td colspan="2" class="text_center keep_all"></td>
        <td class="bg_color text_center keep_all">生年月日</td>
        <td class="text_center" colspan="4">明・大・昭・平・令　 年　 月　 日 （ 　歳）</td>
    </tr>
    <tr class="prefectures height_tr">
        <td class="text_right" colspan="2"></td>
        <td class="text_right" colspan="4"></td>
        <td class="text_right" colspan="3">DM送付 　可　・　不可</td>
    </tr>
    <tr>
        <td class="text_center keep_all">電話番号</td>
        <td class="text_center" colspan="5"></td>
        <td class="text_center">FAX</td>
        <td class="text_center" colspan="3"></td>
    </tr>
    <tr>
        <td class="text_center vertical" rowspan="3">アンケート</td>
        <td class="text_center keep_all">検索エンジン</td>
        <td class="text_small padding_side" colspan="6"></td>
        <td class="text_center bg_color keep_all" rowspan="3">取引の目的</td>
        <td colspan="2" class="text_center">換金・転売・委託</td>
    </tr>
    <tr>
        <td class="padding_side text_center keep_all">検索媒体</td>
        <td class="padding_side text_small" colspan="6">パソコン・スマートフォン・タブレット・携帯（ガラケー）<br>ご紹介・その他（　　　　　　　）</td>
        <td class="padding_side text_center keep_all" rowspan="2" colspan="2">その他（　　　　 ）</td>
    </tr>
    <tr>
        <td class="text_center keep_all">検索キーワード</td>
        <td colspan="6"></td>
    </tr>
    <tr>
        <td rowspan="2" class="vertical text_center">振込先</td>
        <td class="text_center keep_all">振込銀行</td>
        <td colspan="5" class="text_center">銀行　新組　新金　その他（　　　　　　）</td>
        <td class="text_center keep_all">支店名</td>
        <td>　　　　　　　　</td>
        <td colspan="2" class="text_center">普・貯・当</td>
    </tr>
    <tr>
        <td class="text_center keep_all">口座番号</td>
        <td colspan="2"></td>
        <td class="keep_all text_center">口座名義</td>
        <td colspan="3"></td>
        <td class="keep_all text_center">振込予定日</td>
        <td colspan="2" class="text_center"> 　　/　　　　/　　</td>
    </tr>
    {{-- 弊社記入欄 --}}
    <tr>
        <td class="company_input" colspan="11">弊社記入欄</td>
    </tr>
    <tr>
        <td rowspan="7" class="bg_color vertical text_center">本人確認</td>
        <td rowspan="2" colspan="" class="text_center keep_all">本人確認書類</td>
        <td colspan="5"></td>
        <td colspan="4" class="text_right">お支払総額・領収額（税込）</td>
    </tr>
    <tr class="border_none">
        <td class="keep_all" colspan="2">□ 発行場所</td>
        <td class="keep_all" colspan="3">□ 記号番号</td>
        <td colspan="2" class="border_none"></td>
        <td class="text_center">K</td>
        <td></td>
    </tr>
    <tr>
        <td rowspan="6" class="text_center">本人確認書類と現住所が異なる場合の確認方法</td>
    </tr>
    <tr>
        <td class="keep_all" colspan="5">□ 発行場所</td>
        <td class="text_center alphabet_text">A</td>
        <td>　　　　　　　　</td>
        <td class="text_center alphabet_text">D</td>
        <td colspan="2"></td>
    </tr>
    <tr>
        <td colspan="5">□ 発行場所</td>
        <td class="text_center alphabet_text">H</td>
        <td>　　　　　　　　</td>
        <td class="text_center alphabet_text">J</td>
    </tr>
    <tr>
        <td class="keep_all" colspan="5">□ 発行場所</td>
        <td colspan="2" class="text_center">支払い調書発行</td>
        <td class="text_center alphabet_text">W</td>
        <td>　　　　　　　　</td>
    </tr>
    <tr>
        <td colspan="5">□ その他（　　　　　　　）</td>
        <td class="text_center" colspan="2">有　　　　無</td>
        <td class="text_center alphabet_text">B</td>
        <td>　　　　　　　　</td>
    </tr>
</table>
</body>

</html>
