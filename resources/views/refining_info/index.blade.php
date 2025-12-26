
@include("refining_info.style")
@extends('layouts.app')
@section('title')金地金精錬分割加工サービス申込フォーム@endsection
@section('content')
<div id="refining_form">
    <div class="refining_area">
        <div class="refining_box01">
            <h2><span>精錬分割加工</span><br>金地金精錬分割加工サービス申込フォーム</h2>
            <!-- <div class="content">
            このサイトは、セコムトラストシステムズ株式会社のサーバ証明書により実在性が認証されています。<br>
            また、SSLページは通信が暗号化されプライバシーが守られています。
            </div> -->
        </div>
        <form id="myForm" method="POST" action="/refasta_public/refining_info">
            {{ csrf_field() }}
        <input type="text" name="hp_field" id="hp_field" class="hp-field" autocomplete="off" tabindex="-1">  
            <div class="refining_box02">
                <div class="refining_ttl">手順00：お取扱いインゴットブランド</div>
                <table class="refining_table pc_only">
                    <tbody>
                        <tr>
                        <th class="ttl1">名称</th> <th class="ttl2">金</th> <th class="ttl3">Pt</th> <th class="ttl1">名称</th> <th class="ttl2">金</th> <th class="ttl3">Pt</th>
                        </tr>
                        <tr>
                        <td class="content1">アサヒプリテック</td> <td class="content2">〇</td> <td class="content2">〇</td> <td class="content1">JX金属</td>	<td class="content2">〇</td> <td class="content2">〇</td>
                        </tr>
                        <tr>
                        <td class="content1">エヌ・イーケムキャット</td> <td class="content2">〇</td> <td class="content2">〇</td> <td class="content1">住友金属鉱山</td> <td class="content2">〇</td> <td class="content2">〇</td> 
                        </tr>
                        <tr>
                        <td class="content1">中外鉱業</td> <td class="content2">〇</td> <td class="content2">〇</td> <td class="content1">松田産業</td> <td class="content2">〇</td> <td class="content2">〇</td>
                        </tr>
                        <tr>
                        <td class="content1">DOWAメタルマイン</td> <td class="content2">〇</td> <td class="content2">〇</td> <td class="content1">三井金属鉱業</td> <td class="content2">〇</td> <td class="content2">〇</td>
                        </tr>
                        <tr>
                        <td class="content1">日鉱金属 日立製錬所</td> <td class="content2">〇</td> <td class="content2">〇</td> <td class="content1">三菱マテリアル</td> <td class="content2">〇</td> <td class="content2">〇</td>
                        </tr>
                        <tr>
                        <td class="content1">石福金属興業</td> <td class="content2">〇</td> <td class="content2">〇</td> <td class="content1">横浜金属</td> <td class="content2">〇</td> <td class="content2">〇</td>
                        </tr>
                        <tr>
                        <td class="content1">昭栄化学工業</td> <td class="content2">〇</td> <td class="content2">〇</td> <td class="content1">ジャパンエナジー</td> <td class="content2">〇</td> <td class="content2">〇</td>
                        </tr>
                        <tr>
                        <td class="content1">田中貴金属工業</td> <td class="content2">〇</td> <td class="content2">〇</td> <td class="content1">日鉱金属 佐賀関製錬所</td> <td class="content2">〇</td> <td class="content2">〇</td>
                        </tr>
                        <tr>
                        <td class="content1">東邦亜鉛</td> <td class="content2">〇</td> <td class="content2">〇</td> <td class="content1">日鉱製錬</td> <td class="content2">〇</td> <td class="content2">〇</td>
                        </tr>
                        <tr>
                        <td class="content1">徳力本店</td> <td class="content2">〇</td> <td class="content2">〇</td> <td class="content1">ヒラコ</td> <td class="content2">〇</td> <td class="content2">〇</td>
                        </tr>
                        <tr>
                        <td class="content1">パンパシフィック・カッパー</td> <td class="content2">〇</td> <td class="content2">〇</td> <td class="content1">日本マテリアル</td> <td class="content2">〇</td> <td class="content2">〇</td>
                        </tr>
                        <tr>
                        <td class="content1">相田化学工業</td> <td class="content3"></td> <td class="content2">〇</td> <td class="content1">マテリアルエコリファイン</td> <td class="content3"></td> <td class="content2">〇</td>
                        </tr>
                    </tbody>
                </table>
                <table class="refining_table sp_only">
                    <tbody>
                        <tr>
                            <th colspan="2">金、プラチナの取扱有り</th>
                        </tr>
                        <tr>
                            <td class="content_left">アサヒプリテック</td>
                            <td class="content_right">JX金属</td>
                        </tr>
                        <tr>
                            <td class="content_left">エヌ・<br>イーケムキャット</td>
                            <td class="content_left">住友金属鉱山</td>
                        </tr>
                        <tr>
                            <td class="content_left">中外鉱業</td>
                            <td class="content_right">松田産業</td>
                        </tr>
                        <tr>
                            <td class="content_left">DOWAメタルマイン</td>
                            <td class="content_right">三井金属鉱業</td>
                        </tr>
                        <tr>
                            <td class="content_left">日鉱金属 日立製錬所</td>
                            <td class="content_right">三菱マテリアル</td>
                        </tr>
                        <tr>
                            <td class="content_left">石福金属興業</td>
                            <td class="content_right">横浜金属</td>
                        </tr>
                        <tr>
                            <td class="content_left">昭栄化学工業</td>
                            <td class="content_right">ジャパンエナジー</td>
                        </tr>
                        <tr>
                            <td class="content_left">田中貴金属工業</td>
                            <td class="content_right">東邦亜鉛</td>
                        </tr>
                        <tr>
                            <td class="content_left">日鉱金属 佐賀関製錬所</td>
                            <td class="content_right">日鉱製錬</td>
                        </tr>
                        <tr>
                            <td class="content_left">徳力本店</td>
                            <td class="content_right">ヒラコ</td>
                        </tr>
                        <tr>
                            <td class="content_left">パンパシフィック・<br>カッパー</td>
                            <td class="content_right">日本マテリアル</td>
                        </tr>
                        <tr>
                            <th colspan="2">プラチナのみ取扱有り</th>
                        </tr>
                        <tr>
                            <td class="content_left">マテリアル<br>エコリファイン</td>
                            <td class="content_right">相田化学工業</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="refining_box03">
                <div class="refining_ttl">手順01：ご依頼内容情報入力</div>
                <div id="ingotCount_input">
                    <label class="form-check-label" for="ingotCounttotal">まず、インゴットの本数を入力してください。</label><br>
                    <label class="form-check-label small" for="ingotCounttotal">その他地金/スクラップ精錬ご希望の方は「１本」を選択してご入力へお進みください。</label>
                    <select id="ingotCounttotal" name="ingotCounttotal" class="form-control" required>
                        <option value="" disabled selected>選択してください</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                    </select>
                </div>
                <div id="totalgram_show_div"></div>
                <div id="refining_box03_details">
                    <div id="displaySavedData" class="displaySavedData"></div>
                    <div id="totalgram_show_div01"></div>
                    <div class="row mx-auto openSecondModalBtn">
                        <button id="openSecondModalBtn" type="button" class="btn btn-primary mx-auto" data-toggle="modal" data-target="#calaculateModal">
                            <span>こちらをクリック</span>詳細を入力してください
                        </button>
                    </div>
                    <div class="row mx-auto display_none">
                        <button id="calculateTotalPrice" type="button" class="btn btn-primary mx-auto p-3">
                            お支払い金額を計算する
                        </button>
                    </div>
                    <div class="collect_cal_box" id="collect_cal_box">
                        <div class="form-group row">
                            <label class="col-lg-4" for="service_selection"><span class="badge badge-danger">必須</span>インゴットのお持ち込み方法</label><br>
                            <div class="col-lg-4">
                                <div class="form-check" id="service_selection_div">
                                    <label class="form-check-label" id="service_selection_yes">
                                        <input class="form-check-input" type="radio" id="service_selection_yes" name="service_selection" value="店頭タイプ" required>    
                                        ご来店にてお持ち込み<br>（店頭タイプ）
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label" id="service_selection_no">
                                        <input class="form-check-input" type="radio" id="service_selection_no" name="service_selection" value="配送タイプ" required>
                                        日本通運セキュリティ輸送にて配送<br>（配送タイプ）
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <small class="user_nameHelpBlock form-text text-muted">※配送タイプは1kgまで27,500円。それ以上は1kg超過毎に16,500円が加算されます。店頭タイプでのご来店予約は不要となります。（税込）</small>
                                <!-- <small class="user_nameHelpBlock form-text text-muted">※配送タイプは500gまで27,500円。それ以上は1kg超過毎に90,000円が加算されます。店頭タイプでのご来店予約は不要となります。（税込）</small> -->
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4" for="sale_advance_input"><span class="badge badge-danger">必須</span>売却立替</label><br>
                            <div class="col-lg-4">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" id="sale_advance_yes" name="sale_advance_input" value="はい" required>
                                        希望する
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" id="sale_advance_no" name="sale_advance_input" value="いいえ" required>
                                        希望しない
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <small class="user_nameHelpBlock form-text text-muted">※今回納品するインゴットバー1本を売却し、差額を当方よりお振込若しくはお手渡しする、節税とお得をセットにしたプランです。お客さまにはお取引まで一切費用がかからずお得です。</small>
                            </div>
                        </div>
                        <div class="form-group row" id="selected_sale_div" style="display:none">
                            <label class="col-lg-4" for="selected_sale_g"><span class="badge badge-danger">必須</span>売却立替詳細:</label>
                            <div class="col-lg-4">
                                <div class="form-check" id="selected_sale_50g">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" id="selected_sale_50g" name="selected_sale_g" value="50">
                                        50g
                                    </label>
                                </div>
                                <div class="form-check" id="selected_sale_100g">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" id="selected_sale_100g" name="selected_sale_g" value="100">
                                        100g
                                    </label>
                                </div>
                                <div class="form-check" id="selected_scrap_100g">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" id="selected_scrap_100g" name="selected_sale_g" value="100">
                                        スクラップ100g
                                    </label>
                                </div>
                                <div class="form-check" id="selected_sale_immediate_split_100g">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" id="selected_sale_immediate_split_100g" name="selected_sale_immediate_split_100g" value="100">
                                        100g
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <small class="user_nameHelpBlock form-text text-muted">※売却するインゴットバーの重量を選択してください。</small>
                            </div>
                        </div>
                        <div class="form-group row" id="saleRebuildingPrice_div" style="display:none">
                            <div class="col-lg-4 price_coin">本日のインゴット売却価格:</div>
                            <div class="col-lg-8">
                                <input type="hidden" id="saleRebuildingPricefee" name="saleRebuildingPricefee" value="">
                                <div class="saleRebuildingPrice form-control" type="text" id="saleRebuildingPrice"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-4 delivery">配送料(税込):</div>
                            <div class="col-lg-8">
                                <input type="hidden" id="deliveryservicefee" name="deliveryservicefee" value="">
                                <div class="deliveryserviceinput form-control" type="text" id="deliveryservice"></div>
                                <small class="user_nameHelpBlock form-text text-muted">※お客様のお住まいの地域によって追加の配送費用が発生する場合がございます。その場合は担当者より改めて連絡を致します。</small>
                            </div>
                        </div>
                        <div class="form-group row" id="barchargefee_div">
                            <div class="col-lg-4 barchargefee">バーチャージ(税込):</div>
                            <div class="col-lg-8">
                                <input type="hidden" id="barchargefee" name="barchargefeefee" value="">
                                <div class="barchargefeeinput form-control" type="text" id="barchargefeeinput"></div>
                                <small class="user_nameHelpBlock form-text text-muted">※500g未満のバーを選択した場合、100g毎にバーチャージを頂戴いたします。</small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-4 totalTransfer">合計サービス料金(税込):</div>
                            <div class="col-lg-8">
                                <input type="hidden" id="totalTransferAmountfee" name="totalTransferAmountfee" value="">
                                <div class="totalTransferAmountinput form-control" type="text" id="totalTransferAmount"></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body display_none" id="ingot_gold_1000g" data="{{ $ingot_gold_1000g }}"></div>
                    <div class="card-body display_none" id="ingot_gold_100g_price" data="{{ $ingot_gold_100g }}"></div>
                    <div class="card-body display_none" id="ingot_k24_1g" data="{{ $ingot_k24_1g }}"></div>
                    <div class="card-body display_none" id="ingot_platinum_1000g" data="{{ $ingot_platinum_1000g }}"></div>
                    <div class="card-body display_none" id="ingot_platinum_100g_price" data="{{ $ingot_platinum_100g }}"></div> 
                </div>
                
            </div>
            <div class="refining_box04" id="refining_box04">
                <div class="refining_ttl">手順02：お客様情報入力</div>
                    <div class="form-group row">
                    <label class="col-lg-4"><span class="badge badge-danger">必須</span>ご利用回数</label>
                        <div class="col-lg-8">
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="first_time"><input class="form-check-input" type="radio" name="usage" id="first_time" value="はじめて" required>はじめて</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="repeat"><input class="form-check-input" type="radio" name="usage" id="repeat" value="2回目以降" required>2回目以降</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-4" for="name" ><span class="badge badge-danger">必須</span>お名前(姓 名)</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="name" name="name" placeholder="買取 太郎" required>
                            <small class="user_nameHelpBlock form-text text-muted">※姓と名の間にスペースをお入れください。</small>
                        </div>
                        
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-4" for="phonetic"><span class="badge badge-danger">必須</span>フリガナ(セイ メイ)</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="kana" name="kana" placeholder="カイトリ タロウ" required>
                            <small class="user_nameHelpBlock form-text text-muted">※全角カナ</small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-4" for="phone_number"><span class="badge badge-danger">必須</span>電話番号</label>
                        <div class="col-lg-8">
                            <input type="tel" class="form-control" id="phone_number" name="phone_number" pattern="[0-9]{10,11}" placeholder="08012345678" required>
                            <small class="user_nameHelpBlock form-text text-muted">※ハイフン不要・半角数字</small>
                        </div>    
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-4" for="email"><span class="badge badge-danger">必須</span>メールアドレス<br></label>
                        <div class="col-lg-8">
                            <input type="email" class="form-control" id="email" name="email" placeholder="例）rifa@urlounge.co.jp" required>
                            <small class="user_nameHelpBlock form-text text-muted">※半角英数字</small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4" for="contact_method"><span class="badge badge-danger">必須</span>希望連絡方法</label>
                        <div class="col-lg-8">
                            <select class="form-control" id="contact_method" name="contact_method" required>
                                <option value="" disabled selected hidden>希望連絡方法を選択してください</option>
                                <option value="電話">電話</option>
                                <option value="LINE">LINE</option>
                                <option value="メール">メール</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row postcode_area">
                        <label class="col-lg-4" for="postal_code"><span class="badge badge-danger">必須</span>ご住所</label>
                        <div class="col-lg-8">
                            <div class="row col-lg-12 yuubinn">
                                <input type="text" class="form-control col-lg-7" id="user_yuubinn" name="user_yuubinn" placeholder="例）1700013" required>
                                <div class="col-lg-4 input-group-append user_yuubinn_btn">
                                    <button type="button" class="btn btn-primary"><a onclick="window.open('http://www.post.japanpost.jp/zipcode/','','scrollbars=yes,width=900,height=800,');" rel="nofollow">郵便番号検索</a>
                                    </button>
                                </div>
                            </div>
                            <small class="user_nameHelpBlock form-text text-muted">※半角数字を入力すると都道府県以下が自動反映されます。郵便番号がわからない方は青いボタンから検索してください。</small>
                            <small class="user_nameHelpBlock form-text text-muted">※身分証に記載されている現住所をご入力ください。
                                「都道府県・市区町村」が自動入力されます。<br>
                                <a onclick="window.open('http://www.post.japanpost.jp/zipcode/','','scrollbars=yes,width=900,height=800,');" rel="nofollow">郵便番号を検索される方はコチラ
                                （日本郵便のサイトへ移ります。）</a>
                            </small>
                            <input type="text" class="form-control" id="user_todou" name="user_todou" placeholder="都道府県" required>
                            <input type="text" class="form-control" id="user_sikutyouson" name="user_sikutyouson" placeholder="例）〇〇市△△区" required>
                            <input type="text" class="form-control" id="user_banti" name="user_banti" placeholder="例）□□町１−２−３" required>
                            <input type="text" class="form-control" id="user_building" name="user_building" placeholder="例）あいうえおマンション７７７号室">
                        </div>
                        
                    </div>
            </div>
            <div class="refining_box05" id="refining_box05">
                <div class="refining_ttl">手順03：最終確認</div>
                <div class="check_form">
                    <div class="form-group row">
                        <label class="col-lg-4" for="is_applicant"><span class="badge badge-danger">必須</span>ご本人さまのお申込みですか？</label>
                        <div class="col-lg-8">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="is_applicant_yes" name="is_applicant" value="はい" required>
                                <label class="form-check-label" for="is_applicant_yes" required>はい</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="is_applicant_no" name="is_applicant" value="いいえ">
                                <label class="form-check-label" for="is_applicant_no">いいえ</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <small class="user_nameHelpBlock form-text text-muted">※ご本人さま以外のお申込ですとお取引はできかねます。</small>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4" for="same_address"><span class="badge badge-danger">必須</span>身分証の住所と現住所は同一ですか？</label>
                        <div class="col-lg-8">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="same_address_yes" name="same_address" value="はい" required>
                                <label class="form-check-label" for="same_address_yes" required>はい</label>
                                
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="same_address_no" name="same_address" value="いいえ">
                                <label class="form-check-label" for="same_address_no">いいえ</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <small class="user_nameHelpBlock form-text text-muted">※ご身分証の住所以外でのやり取りはできかねます。</small>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4" for="content_inquiry">備考欄 兼 お問い合わせ内容</label>
                        <div class="col-lg-8">
                            <textarea class="form-control" id="content_inquiry" name="content_inquiry" rows="4" placeholder="その他不明点などございましたらお気軽にお申し付けください。"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="refining_box06" id="refining_box06">
                <div class="questionnaire_box">
                    <div class="form-group agreement row">
                        @php($item_name = 'kiyaku_check')
                        <label class="col-lg-4"><span class="badge badge-danger">必須</span>利用規約</label>
                        <div class="col-lg-8">
                            <div class="agree_text">利用規約とプライバシーポリシーに同意の上、「入力内容を送信する」をクリックしてください。</div>
                            <div class="accordion" id="accordionKiyaku">
                                <div class="card">
                                    <div class="card-header p-0" id="">
                                        <div class="agree_ttl mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                data-target="#kiyaku_box" aria-expanded="true" aria-controls="kiyaku_box">
                                                ▼利用規約
                                            </button>
                                        </div>
                                    </div>
                                    <div id="kiyaku_box" class="collapse" aria-labelledby="" data-parent="#accordionKiyaku">
                                        <div class="card-body">
                                            {!! $kiyaku_html !!}
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header p-0" id="headingTwo">
                                            <div class="agree_ttl mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                    data-target="#privacy_box" aria-expanded="false" aria-controls="privacy_box">
                                                    ▼個人情報取扱い通知事項</button>
                                            </div>
                                        </div>
                                        <div id="privacy_box" class="collapse" aria-labelledby="headingTwo"
                                            data-parent="#accordionKiyaku">
                                            <div class="card-body">
                                                {!! $pp_html !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="kiyaku_check">
                                <div class="custom-checkbox kiyaku-check-btn">
                                    <input type="checkbox" class="form-control{{ $errors->has($item_name) ? ' is-invalid' : '' }} custom-control-input" name="{{ $item_name }}" id="{{ $item_name }}" aria-describedby="{{ $item_name }}HelpBlock" autocomplete="off" @if(old($item_name)==true) checked @endif required>
                                    <label class="custom-control-label" for="{{ $item_name }}">同意する</label>
                                    <div class="valid-feedback">入力済みです。</div>
                                    <div class="invalid-feedback">
                                        利用規約に同意してください。
                                    </div>
                                </div>
                                @if ($errors->has($item_name))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first($item_name) }}</strong>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div><!-- end form-group -->
                </div>
            </div>
            
            <div class="submit_btn mt-3" id="submit_btn_display">
                <div class="g-recaptcha" data-callback="onSubmit" data-sitekey="{{ env("GOOGLE_RECAPTHA_SITEKEY") }}" ></div>
                <button type="submit" id="submitBtn" class="btn btn-primary disabled" disabled>入力内容を送信する</button>
            </div>
            <!-- インゴット情報 modal -->
            <div class="modal fade" id="calaculateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" data-backdrop="static">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">金地金精錬分割加工サービス</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div><!-- modal-header -->
                        <div class="modal-body">
                            <div class="ingotDetails">
                                <div id="goldForm" class="hidden goldForm" style="display: block;">
                                    <div id="question1"class="card-content-img form-group row">
                                        <label class="col-lg-12 question_ttl" for="type"><span class="red">★</span>インゴット種類</label>
                                        <div class="col-lg-12 row">
                                            <div class="form-check-block col-lg-6">
                                                <label class="form-check-label" id="goldtype">
                                                    <input class="form-check-input" type="radio" id="goldtype" name="type" value="金" checked>
                                                    <div class="card-content-wrapper">
                                                        <div class="card-content">
                                                            <img src="https://kinkaimasu.jp/wp_styles/refining/form/img/refining-info-Ver2-img-gold.png" alt="" width="300" height/>
                                                            <h4>金</h4>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="form-check-block col-lg-6">
                                                <label class="form-check-label" id="platinumtype">
                                                    <input class="form-check-input" type="radio" id="platinumtype" name="type" value="プラチナ">
                                                    <div class="card-content-wrapper">
                                                        <div class="card-content">
                                                            <img src="https://kinkaimasu.jp/wp_styles/refining/form/img/refining-info-Ver2-img-platinum.png" alt="" width="300"/>
                                                            <h4>プラチナ</h4>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="form-check-block col-lg-6">
                                                <label class="form-check-label" id="scraptype">
                                                    <input class="form-check-input" type="radio" id="scraptype" name="type" value="スクラップ">
                                                    <div class="card-content-wrapper">
                                                        <div class="card-content">
                                                            <img src="https://rifa.life/refasta_wordpress/wp-content/uploads/2025/05/refining-info-Ver2-img-scrap.png" alt="" width="300" height/>
                                                            <h4>スクラップ、<br>それ以外の金地金</h4>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                        <button class="next-question col-lg-2 float-right">次へ</button>
                                    </div>
                                    <div id="question2" class="card-content-img form-group row" style="display:none;">
                                        <label class="col-lg-12 question_ttl" for="is_gdb"><span class="red">★</span>お手持ちのインゴットはＧＤＢブランドですか？</label>
                                        <div class="col-lg-12 row">
                                            <div class="form-check-block col-lg-6">
                                                <label class="form-check-label" id="is_gdb_true">
                                                    <input class="form-check-input" type="radio" id="is_gdb_true" name="is_gdb" value="はい" checked>
                                                    <div class="card-content-wrapper">
                                                        <div class="card-content">
                                                            <img src="https://kinkaimasu.jp/wp_styles/refining/form/img/refining-info-Ver2-img-gdb0.png" alt="" width="" height/>
                                                            <h4>はい</h4>
                                                            <h5><span><a class="is_gdb_list" target="_blank"href="https://kinkaimasu.jp/ingot/#gdb_list">GDBブランド一覧</a></span><br>※即分割は国内のみ</h5>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="form-check-block col-lg-6">
                                                <label class="form-check-label" id="is_gdb_no">
                                                    <input class="form-check-input" type="radio" id="is_gdb_no" name="is_gdb" value="分からない">   
                                                    <div class="card-content-wrapper">
                                                        <div class="card-content">
                                                            <img src="https://kinkaimasu.jp/wp_styles/refining/form/img/refining-info-Ver2-img-unknown.png" alt=""/>
                                                            <h4>分からない</h4>
                                                            <h5>直接お問い合わせください<br>
                                                            <span><a href="tel:0120-954-679" onclick="ga('send', 'event', 'sp', 'tel');" class="is_gdb_tel" itemprop="telephone">0120-954-679</a></span></h5>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                        <button class="prev-question col-lg-2 float-left">戻る</button>
                                        <button class="next-question col-lg-2 float-right">次へ</button>
                                    </div>
                                    <div id="question3" class="card-content-img form-group row" style="display:none;">
                                        <label class="col-lg-12 question_ttl" for="is_gdb"><span class="red">★</span>お持ちのインゴットのグラム数</label>
                                        <div class="col-lg-12">
                                            <div class="form-group row" id="question3_g">
                                                <label class="col-lg-4">重量（グラム）</label><br>
                                                <select class="col-lg-7 form-control" name="gram" id="gram">
                                                    <option value="" disabled selected hidden>グラムを選択してください</option>
                                                    <option value="100">100g</option>
                                                    <option value="200">200g</option> 
                                                    <option value="300">300g</option>
                                                    <option value="500">500g</option>
                                                    <option value="1000">1000g</option>
                                                </select>
                                            </div>
                                            <div class="form-group row" id="splits_count_50g_div">
                                                <label class="col-lg-4">分割枚数 50g</label><br>
                                                <select class="col-lg-7 form-control" name="splits_count_50g" id="splits_count_50g">
                                                    
                                                </select>
                                            </div>
                                            <div class="form-group row" id="splits_count_100g_div">
                                                <label class="col-lg-4">分割枚数 100g</label><br>
                                                <select class="col-lg-7 form-control" name="splits_count_100g" id="splits_count_100g">
                                                    
                                                </select>
                                            </div>
                                            <div class="form-group row" id="splits_immediate_split_100g_div">
                                                <label class="col-lg-4">即分割枚数 100g</label><br>
                                                <select class="col-lg-7 form-control" name="splits_immediate_split_100g" id="splits_immediate_split_100g">
                                                    
                                                </select>
                                            </div>
                                            
                                            <div class="form-group row" id="splits_scrap_100g_div">
                                                <label class="col-lg-4">スクラップのグラム数</label><br>
                                                <!-- <select class="col-lg-7 form-control" name="splits_scrap_100g" id="splits_scrap_100g"> -->
                                                <input type="number" id="splits_scrap_100g" name="splits_scrap_100g" class="col-lg-7 form-control" min="100" step="10" placeholder="例：120" />
                                                <label class="form-check-label small" style="display: block; text-align: left;">
                                                ※グラム数が不明な場合でもご安心ください。店頭にて再計量いたします。
                                                </label>
                                            </div>
                                        </div>
                                        <button class="prev-question col-lg-2">戻る</button>
                                        <div class="modal-footer">
                                            <input type="hidden" id="ingotDetailsInput" name="ingot_details">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="saveDatabtn">保存して追加</button>
                                        </div><!-- modal-footer -->
                                    </div>
                                    <!-- <div id="question3_scrap" style="display: none;">
                                        <label class="col-lg-12 question_ttl" for="splits_scrap_100g"><span class="red">★</span>お持ちの”インゴットのグラム数</label>
                                        <div class="col-lg-12">
                                            <div class="form-group row" id="splits_scrap_100g_div">
                                                <label class="col-lg-4">グラム数</label><br>
                                                <input type="number" id="splits_scrap_100g" name="splits_scrap_100g" class="col-lg-7 form-control" min="1" placeholder="例：3" />
                                                <input type="hidden" id="gram_scrap" name="gram_scrap" />
                                            </div>
                                        </div>
                                        <button class="prev-question col-lg-2">戻る</button>
                                        <div class="modal-footer">
                                            <input type="hidden" id="ingotDetailsInput" name="ingot_details">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="saveDatabtn">保存して追加</button>
                                        </div>
                                    </div> -->
                                    
                                </div>
                            </div> <!-- ingotDetails -->
                        </div><!-- modal-body -->
                        <!-- <div class="modal-footer">
                        <input type="hidden" id="ingotDetailsInput" name="ingot_details">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="saveDatabtn">保存して追加</button>
                        </div> -->
                        <!-- modal-footer -->
                    </div><!-- modal-content -->
                </div>
            </div><!-- インゴット情報 modal -->
        </form>
        <div class="refining_information" id="refining_information">
            <div class="text-left alerm_box">携帯電話のドメイン指定受信をされているお客様につきましては「urlounge.co.jp」を受信指定してください。<br>
                設定をされていない場合、弊社からのメールが届きませんのでご確認ください。<br>
                携帯電話のドメイン指定外拒否をされているお客様は一時的に解除をお願いします。<br>
                パソコンのアドレスを返信用アドレスとしてご入力された場合は、弊社からのお見積りが迷惑メールフォルダなどに入る<br>
                場合がございます。ご確認をお願いいたします。
            </div>
            <div id="ss_box" style="text-align: center; display: block; margin: 20px auto 15px;">
                <form action="https://www.login.secomtrust.net/customer/customer/pfw/CertificationPage.do" name="CertificationPageForm" method="post" target="_blank" style="margin: 0px;">
                    <input type="image" src="https://rifa.life/refasta_wordpress/wp-content/uploads/2022/03/B0310422-1.gif" width="56" name="Sticker" alt="クリックして証明書の内容をご確認ください" oncontextmenu="return false;">
                    <input type="hidden" name="Req_ID" value="7388475980">
                </form>
            </div>
            
            <div style="text-align: center;font-size: 12px;margin-bottom: 25px;">このサイトは、セコムトラストシステムズ株式会社のサーバ証明書により実在性が認証されています。<br>
                また、SSLページは通信が暗号化されプライバシーが守られています。
            </div>
        </div>
        
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    var radio = document.getElementById("service_selection_yes");

    radio.addEventListener("change", function() {
        if (this.checked) {
            $('#serviceSelectionModal').modal('show');
        }
    });
});

// document.addEventListener("DOMContentLoaded", function() {
    
//     const questions = document.querySelectorAll('.question');
//     const nextButtons = document.querySelectorAll('.next-question');
//     const prevButtons = document.querySelectorAll('.prev-question');

//     function showNextQuestion(currentQuestion) {
//         currentQuestion.style.display = 'none';
//         const nextQuestion = currentQuestion.nextElementSibling;
//         if (nextQuestion) {
//             nextQuestion.style.display = 'block'; 
//         } else {
//             $('#exampleModal').modal('hide');
//         }
//     }

//     function showPrevQuestion(currentQuestion) {
//         currentQuestion.style.display = 'none'; 
//         const prevQuestion = currentQuestion.previousElementSibling;
//         if (prevQuestion) {
//             prevQuestion.style.display = 'block'; 
//         }
//     }

//     nextButtons.forEach(function(button) {
//         button.addEventListener('click', function() {
//             const currentQuestion = this.parentElement;
//             showNextQuestion(currentQuestion);
//         });
//     });
//     prevButtons.forEach(function(button) {
//         button.addEventListener('click', function() {
//             const currentQuestion = this.parentElement;
//             showPrevQuestion(currentQuestion);
//         });
//     });
// });

document.addEventListener("DOMContentLoaded", function () {
    const nextButtons = document.querySelectorAll('.next-question');
    const prevButtons = document.querySelectorAll('.prev-question');

    function getSelectedType() {
        return document.querySelector('input[name="type"]:checked')?.value;
    }

    function showNextQuestion(currentQuestion) {
        currentQuestion.style.display = 'none';

        const selectedType = getSelectedType();
        let nextQuestion;

        if (currentQuestion.id === 'question1' && selectedType === 'スクラップ') {
            nextQuestion = document.getElementById('question3'); // skip question2
        } else if (currentQuestion.id === 'question1') {
            nextQuestion = document.getElementById('question2');
        } else if (currentQuestion.id === 'question2') {
            nextQuestion = document.getElementById('question3');
        }

        if (nextQuestion) {
            nextQuestion.style.display = 'block';
        } else {
            $('#exampleModal').modal('hide');
        }
    }

    function showPrevQuestion(currentQuestion) {
        currentQuestion.style.display = 'none';

        const selectedType = getSelectedType();
        let prevQuestion;

        if (currentQuestion.id === 'question3' && selectedType === 'スクラップ') {
            prevQuestion = document.getElementById('question1'); // skip back to 1
        } else if (currentQuestion.id === 'question3') {
            prevQuestion = document.getElementById('question2');
        } else if (currentQuestion.id === 'question2') {
            prevQuestion = document.getElementById('question1');
        }

        if (prevQuestion) {
            prevQuestion.style.display = 'block';
        }
    }

    nextButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            const currentQuestion = this.closest(".form-group.row");
            showNextQuestion(currentQuestion);
        });
    });

    prevButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            const currentQuestion = this.closest(".form-group.row");
            showPrevQuestion(currentQuestion);
        });
    });
    const gramSelect = document.getElementById('gram');
    const scrapInput = document.getElementById('splits_scrap_100g');
    const typeRadios = document.querySelectorAll('input[name="type"]');
    function updateGramField() {
        const selected = getSelectedType();

        const gramGroup = document.getElementById('question3_g');
        if (!gramGroup) return;

        if (selected === 'スクラップ') {
            gramGroup.style.display = 'none'; // スクラップなら隠す
            scrapInput?.addEventListener('input', syncScrapToGram);
        } else {
            gramGroup.style.display = 'block'; // 金などは表示
            scrapInput?.removeEventListener('input', syncScrapToGram);
            gramSelect.value = "";
        }
    }

    function syncScrapToGram() {
        const val = scrapInput.value;
        if (val && !isNaN(val)) {
            gramSelect.value = val;
        }
    }

    typeRadios.forEach(r => r.addEventListener('change', updateGramField));
    updateGramField(); // 初期実行
});


// document.addEventListener("DOMContentLoaded", function () {
//     // scraptype を選択してもその時点では表示しない
//     document.getElementById("scraptype").addEventListener("click", function () {
//         document.querySelector('#question2').style.display = 'none';
//         document.querySelector('#question3').style.display = 'none';
//         document.querySelector('#question3_scrap').style.display = 'none'; // 表示しない
//     });

//     // 「次へ」ボタン（全体制御）
//     document.querySelectorAll(".next-question").forEach(function (button) {
//         button.addEventListener("click", function () {
//             const current = this.closest(".form-group.row");
//             current.style.display = "none";

//             const selectedType = document.querySelector('input[name="type"]:checked')?.value;

//             if (current.id === "question1") {
//                 if (selectedType === "スクラップ") {
//                     document.getElementById("question3_scrap").style.display = "block";
//                 } else {
//                     document.getElementById("question2").style.display = "block";
//                 }
//             } else if (current.id === "question2") {
//                 document.getElementById("question3").style.display = "block";
//             }
//         });
//     });

//     // 「戻る」ボタン
//     document.querySelectorAll(".prev-question").forEach(function (button) {
//         button.addEventListener("click", function () {
//             const current = this.closest(".form-group.row");
//             current.style.display = "none";

//             if (current.id === "question3_scrap") {
//                 document.getElementById("question1").style.display = "block";
//             } else if (current.id === "question3") {
//                 document.getElementById("question2").style.display = "block";
//             } else if (current.id === "question2") {
//                 document.getElementById("question1").style.display = "block";
//             }
//         });
//     });
// });



</script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script>
    function onSubmit(token) {
        // Honeypot チェック
        const hpField = document.getElementById('hp_field');
        if (hpField && hpField.value !== '') {
            console.warn('スパムと判断：honeypot に値が入っていた');
            return; // スパムなら送信させない
        }

        // 通常の送信処理：ボタン有効化
        const submitBtn = document.getElementById('submitBtn');
        if (submitBtn) {
            submitBtn.classList.remove('disabled');
            submitBtn.disabled = false;
        }
    }
</script>
<script>
// 売却立替の表示/非表示と必須制御
document.addEventListener("DOMContentLoaded", function() {
    const saleAdvanceYes = document.getElementById("sale_advance_yes");
    const saleAdvanceNo = document.getElementById("sale_advance_no");
    const selectedSaleDiv = document.getElementById("selected_sale_div");
    const selectedSaleInputs = document.querySelectorAll('input[name="selected_sale_g"]');
    
    // 売却立替詳細の表示/非表示と必須属性を切り替える関数
    function toggleSaleAdvanceDetails() {
        if (saleAdvanceYes.checked) {
            // 「希望する」が選択された場合
            selectedSaleDiv.style.display = '';  // 表示
            // 売却立替詳細を必須にする
            selectedSaleInputs.forEach(input => {
                input.setAttribute('required', 'required');
            });
        } else if (saleAdvanceNo.checked) {
            // 「希望しない」が選択された場合
            selectedSaleDiv.style.display = 'none';  // 非表示
            // 売却立替詳細の必須を解除
            selectedSaleInputs.forEach(input => {
                input.removeAttribute('required');
                input.checked = false;  // 選択をクリア
            });
        }
    }
    
    // イベントリスナーを追加
    if (saleAdvanceYes) {
        saleAdvanceYes.addEventListener('change', toggleSaleAdvanceDetails);
    }
    if (saleAdvanceNo) {
        saleAdvanceNo.addEventListener('change', toggleSaleAdvanceDetails);
    }
    
    // ページ読み込み時に初期状態を設定
    toggleSaleAdvanceDetails();
});
</script>
<script src="https://ajaxzip3.github.io/ajaxzip3.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="/refasta_public/js/refining/IngotDetail.js"></script>
<script src="/refasta_public/js/refining/IngotTotal.js"></script>
<script src="/refasta_public/js/refining/index.js"></script>
@endsection