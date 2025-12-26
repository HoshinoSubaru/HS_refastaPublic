class IngotTotal {
    constructor() {
        this._ingotDetails = []; // インゴット詳細の配列を初期化します
        this._fee_total_price = 0;
    }
    // インゴット詳細の配列を取得するgetter
    get ingotDetails() {
        return this._ingotDetails;
    }

    // インゴット詳細の配列を設定するsetter
    set ingotDetails(value) {
        this._ingotDetails = value;
    }

    addIngotDetail(IngotDetail) {
        // 追加分（１行）
        IngotDetail.calculateUnitPrice();
        this.ingotDetails.push(IngotDetail);

        // const ingotDetailsJSON = JSON.stringify(this.ingotDetails);
        // console.log("ingotDetailsJSON:", ingotDetailsJSON);

        // console.log("this.ingotDetails:", this.ingotDetails.slice()); // After addition
    }
    updateIngotDetail(IngotDetail, Num) {
        // 追加分（１行）
        IngotDetail.calculateUnitPrice();
        this.ingotDetails[Num] = IngotDetail;
    }
    // 全体の合計金額の計算
    calculateTotalPrice() {
        // 一回リセット
        document.getElementById('totalTransferAmount').textContent = '';
        document.getElementById('deliveryservice').textContent = '';
        document.getElementById('totalTransferAmount').textContent = '';
        if (this.ingotDetails.length === 0) {
            return;
        }
        let total_price = 0;
        let totalgram = 0;
        this.ingotDetails.forEach(function(ingotDetail, index) {
            total_price += ingotDetail.fee_total_price;
            totalgram += ingotDetail.gram;
        });
        if(totalgram >= 0){
            document.getElementById('totalgram_show_div').innerHTML = "お客様の入力した合計グラム数は <strong>" + totalgram.toLocaleString() + "</strong>g です。ご依頼いただく本数分をご入力ください。";

        }else {
            document.getElementById('totalgram_show_div').style.display = "none";
        } 
        if (totalgram === 0) {
            return;
        }
        total_price = this.deliveryServicePrice(total_price, totalgram);
        total_price = this.saleRebuildingPrice(total_price);
        total_price = this.barChargeFee(total_price);
        if (total_price < 0) {
            // 負の値の場合のテキスト
            document.getElementById('totalTransferAmount').innerHTML = "<span>リファスタから</span>" + Math.abs(Math.round(total_price)).toLocaleString() + "<span>円を振り込みいたします。</span>";
            document.getElementById('totalTransferAmountfee').value = Math.round(total_price).toLocaleString() + '円';
        } else {
            // 正の値の場合のテキスト
            document.getElementById('totalTransferAmount').innerHTML = Math.round(total_price).toLocaleString() + "<span>円のご利用料金が発生いたします。</span>";
            document.getElementById('totalTransferAmountfee').value = Math.round(total_price).toLocaleString() + '円';
        }
        // document.getElementById('totalTransferAmount').textContent = Math.floor(total_price).toLocaleString() + '円';
    }  
    //バーチャージ計算メソッド
    barChargeFee(total_price){
        let barCharge = 5500; //100g・200g・300gを選択した時、100g毎にバーを生成するためにバーチャージ（5,500円税込/本）追加
        let TotalbarCharge = 0;
        this.ingotDetails.forEach(function(ingotDetail, index) {
            let ingotGram = parseInt(ingotDetail._gram); 
            if (ingotGram === 100 || ingotGram === 200 || ingotGram === 300) {
                let barCount = Math.ceil(ingotGram / 100);
                total_price += barCharge * barCount; 
                TotalbarCharge += barCharge * barCount;
            }
        });
        if (TotalbarCharge > 0) {
            document.getElementById('barchargefee_div').style.display = ""; // 要素を表示する
        } else {
            document.getElementById('barchargefee_div').style.display = "none"; // 要素を非表示にする
        }
        document.getElementById('barchargefee').value = TotalbarCharge.toLocaleString() + '円';
        document.getElementById('barchargefeeinput').innerHTML = TotalbarCharge.toLocaleString()  + '円';
        return total_price;
    }
    // 配送料の計算メソッド
    deliveryServicePrice (total_price, totalgram) {
        let service_selection = document.querySelector('input[name="service_selection"]:checked').value;
        if (service_selection == '店頭タイプ') {
            document.getElementById('deliveryservice').textContent = 0 + '円';
            document.getElementById('deliveryservicefee').value = 0 + '円';
            return total_price;
        }
        const deliveryFeeBelow1kg = 27500; // 500g未満の配送料
        const deliveryFeeAbove1kg = 16500; // 1kg以上の配送料
        // const deliveryFeeAbove1kg = 90000; // 1kg以上の配送料
        
        let deliveryservice = 0;
        // if (totalgram <= 500) {
        //     deliveryservice = deliveryFeeBelow1kg;
        // } else {
        //     deliveryservice = parseInt((Math.ceil((totalgram - 500) / 1000)) * deliveryFeeAbove1kg);
        //     deliveryservice = deliveryservice + deliveryFeeBelow1kg;
        // }
        deliveryservice = parseInt((Math.ceil(totalgram/1000)-1) * deliveryFeeAbove1kg);
        deliveryservice = deliveryservice + deliveryFeeBelow1kg;
        document.getElementById('deliveryservice').textContent = deliveryservice.toLocaleString() + '円';
        document.getElementById('deliveryservicefee').value = deliveryservice.toLocaleString() + '円';
        return total_price + deliveryservice;
    }

    // 売却立替の計算メソッド
    saleRebuildingPrice (total_price) {
        let sale_advance_input = document.querySelector('input[name="sale_advance_input"]:checked').value;
        if (sale_advance_input == 'いいえ') {
            return total_price;
        }

        let is_sales_gold = false;
        let is_sales_gold_50 = false;
        let is_sales_gold_100 = false;
        let is_immediate_split_100 = false;
        let is_sales_scrap_100g = false;

        const selected_sale_50g = document.getElementById("selected_sale_50g");
        const selected_sale_100g = document.getElementById("selected_sale_100g");
        const selected_sale_immediate_split_100g = document.getElementById("selected_sale_immediate_split_100g");
        const selected_scrap_100g = document.getElementById("selected_scrap_100g");

        this.ingotDetails.forEach(function(ingotDetail, index) {
            if (ingotDetail.type === '金') {
                is_sales_gold = true; // 金が一枚でもあったら金を売却
                if (ingotDetail.splits_count_50g > 0) {
                    is_sales_gold_50 = true; // 金の50gが一枚でもあったら50gを売却
                }
                if (ingotDetail.splits_count_100g > 0 || ingotDetail.immediate_split_count_100g > 0) {
                    is_sales_gold_100 = true; // 金の100gが一枚でもあったら100gを売却
                }
            } 
            else if (ingotDetail.type === 'スクラップ') {
                console.log('is_sales_scrap_100g:', ingotDetail.type);
                if (ingotDetail.splits_scrap_100g > 0) {
                    is_sales_scrap_100g = true; // treat scrap 100g as normal 100g
                }
            }
            else {
                if (ingotDetail.splits_count_100g > 0) {
                    is_sales_gold_100 = true; // 金の100gが一枚でもあったら100gを売却
                }
            } 
        });
        
        if (is_sales_scrap_100g) {
            // スクラップがあればそれを優先表示
            selected_scrap_100g.style.display = '';
            selected_sale_50g.style.display = 'none';
            selected_sale_100g.style.display = 'none';
            selected_sale_immediate_split_100g.style.display = 'none';
        } else {
            // 通常金種の表示処理
            selected_sale_50g.style.display = is_sales_gold_50 ? '' : 'none';
            selected_sale_100g.style.display = is_sales_gold_100 ? '' : 'none';
            selected_sale_immediate_split_100g.style.display = is_immediate_split_100 ? '' : 'none';
            selected_scrap_100g.style.display = 'none';
        }

        let selectedValue = document.querySelector('input[name="selected_sale_g"]:checked')?.value;
        let saleRebuildingPrice = 0;
        if (is_sales_gold === true || is_sales_scrap_100g === true)  {
            // 金の価格を取得
            if (selectedValue === '50' && is_sales_gold_50 == true) {
                 // 金の50gが一枚でも存在していたら、50gを売却立替
                saleRebuildingPrice = Number(document.getElementById('ingot_k24_1g').getAttribute("data")) * 50;
            }else if ((selectedValue === '100' || selectedValue === 'instant') && is_sales_gold_100 == true) {
                // 通常100g または 即分割100g のいずれでも、同じ価格で立替
                saleRebuildingPrice = Number(document.getElementById('ingot_gold_100g_price').getAttribute("data"));
            }else if (selectedValue === '100' && is_sales_scrap_100g === true) {
                // スクラップも金の100g相当として処理
                saleRebuildingPrice = Number(document.getElementById('ingot_gold_100g_price').getAttribute("data"));
            }
        }
        else {
            if (selectedValue === '100' && is_sales_gold_100 == true) {
                // 金以外の場合（プラチナ）、100gのプラチナを売却立替（金に比べてほぼないパターン）
                saleRebuildingPrice = Number(document.getElementById('ingot_platinum_100g_price').getAttribute("data"));
            }
        }
        console.log('saleRebuildingPrice:', saleRebuildingPrice);
        document.getElementById('saleRebuildingPrice').textContent = saleRebuildingPrice.toLocaleString() + '円';
        document.getElementById('saleRebuildingPricefee').value = saleRebuildingPrice.toLocaleString() + '円';
        return total_price - saleRebuildingPrice;
    } 
    
    displayDetails() {
        document.getElementById("displaySavedData").innerHTML = '';
        var displaySavedData = document.getElementById("displaySavedData");
        let displayHtml = '';
        let count = 1;
        this.ingotDetails.forEach(function(ingotDetail, index) {
            let newRow = document.createElement("div");
            newRow.classList.add("displaybox");
            let is_gdb_html = '';
            is_gdb_html = `
            <tr>
                <td>GDBブランド : </td>
                <td>`+ingotDetail.is_gdb+`</td>
            </tr>
            `;
            let is_overseas_brand_html = '';
                is_overseas_brand_html = `
                <tr>
                    <td>海外ブランド : </td>
                    <td>`+ingotDetail.is_overseas_brand+`</td>
                </tr>
                `;
            
            let count_100g_html = '';
                if (ingotDetail.type === 'スクラップ') {
                    count_100g_html = `
                    <tr>
                        <td>スクラップのグラム : </td>
                        <td>${ingotDetail.splits_scrap_100g}g</td>
                    </tr>
                    `;
                } else {
                    count_100g_html = `
                    <tr>
                        <td>100g : </td>
                        <td>${ingotDetail.splits_count_100g}枚</td>
                    </tr>
                    `;
                }
            const fee_total_price = ingotDetail.fee_total_price.toLocaleString('ja-JP');
            displayHtml = `
            <div class="col-md-12 displaybox_inner border p-2">
                <div class="d-flex justify-content-between">
                    <div class="displaybox_ttl">インゴット${count}本目の情報</div>
                    <table class="table table-borderless">
                        <tr>
                            <td class="fw-bold">${ingotDetail.type} : </td>
                            <td class="fw-bold">${ingotDetail.gram}g</td>
                        </tr>
                        ${is_gdb_html}
                        <tr>
                            <td>50g : </td>
                            <td>${ingotDetail.splits_count_50g}枚</td>
                        </tr>
                        ${count_100g_html}
                        <tr>
                            <td>即分割（100g）: </td>
                            <td>${ingotDetail.immediate_split_count_100g > 0 ? ingotDetail.immediate_split_count_100g + '枚' : '0枚'}</td>
                        </tr>
                        <tr>
                            <td>分割加工費用 : </td>
                            <td>${fee_total_price}円</td>
                        </tr>
                    </table>
                </div>
                <button type="button" class="deleteRowBtn deleteRow btn btn-danger" index="${index}">削除</button>
            </div>
            `;
            newRow.innerHTML = displayHtml;
            displaySavedData.appendChild(newRow);
            count++; 
        });
        const ingotCounttotal = parseInt(document.getElementById('ingotCounttotal').value);
        const button = document.getElementById('openSecondModalBtn');
        const refining_box04 = document.getElementById("refining_box04");
        const refining_box05 = document.getElementById("refining_box05");
        const refining_box06 = document.getElementById("refining_box06");
        const submit_btn_display = document.getElementById("submit_btn_display");
        const refining_information = document.getElementById("refining_information");
        const collect_cal_box = document.getElementById("collect_cal_box");
        
        // const enoughcount = ingotCounttotal - (count - 1);
        // if (ingotCounttotal == count || ingotCounttotal >= count) {
        //     button.disabled = false; // 本数が一致したらボタンを有効化
        //     document.getElementById('totalgram_show_div01').innerHTML = "もう<strong>"+enoughcount + "本 </strong>分の入力が必要です、「詳細を入力してください」ボタンをもう一度クリックして追加してください。";
        //     document.getElementById('totalgram_show_div01').style.color = 'red';
        //     // 要素を操作できないようにする
        //     refining_box04.style.pointerEvents = 'none';
        //     refining_box05.style.pointerEvents = 'none';
        //     refining_box06.style.pointerEvents = 'none';
        //     submit_btn_display.style.pointerEvents = 'none';
        //     refining_information.style.pointerEvents = 'none';
        //     collect_cal_box.style.pointerEvents = 'none';
            
        //     refining_box04.style.opacity = '0.5';
        //     refining_box05.style.opacity = '0.5';
        //     refining_box06.style.opacity = '0.5';
        //     submit_btn_display.style.opacity = '0.5';
        //     refining_information.style.opacity = '0.5';
        //     collect_cal_box.style.opacity = '0.5';
        // } else {
        //     button.disabled = true; // 本数が一致しなければボタンを無効化
        //     document.getElementById('totalgram_show_div01').innerHTML = "インゴット<strong>" + ingotCounttotal + "本 </strong>が正しく入力されました。インゴットの情報に問題なければ、次の入力に進んでください。";
        //     document.getElementById('totalgram_show_div01').style.color = 'green';
        //     // 要素を操作可能にする
        //     refining_box04.style.pointerEvents = 'auto';
        //     refining_box05.style.pointerEvents = 'auto';
        //     refining_box06.style.pointerEvents = 'auto';
        //     submit_btn_display.style.pointerEvents = 'auto';
        //     refining_information.style.pointerEvents = 'auto';
        //     collect_cal_box.style.pointerEvents = 'auto';
            
        //     refining_box04.style.opacity = '1';
        //     refining_box05.style.opacity = '1';
        //     refining_box06.style.opacity = '1';
        //     submit_btn_display.style.opacity = '1';
        //     refining_information.style.opacity = '1';
        //     collect_cal_box.style.opacity = '1';
        // }
        const filledCount = count - 1; // 実際に追加された本数
        const enoughcount = ingotCounttotal - filledCount;

        if (filledCount < ingotCounttotal) {
            button.disabled = false;
            document.getElementById('totalgram_show_div01').innerHTML = 
                "あと<strong>" + enoughcount + "本</strong>分の入力が必要です。「詳細を入力してください」ボタンをもう一度クリックして追加してください。";
            document.getElementById('totalgram_show_div01').style.color = 'red';

            [refining_box04, refining_box05, refining_box06, submit_btn_display, refining_information, collect_cal_box].forEach(box => {
                box.style.pointerEvents = 'none';
                box.style.opacity = '0.5';
            });
        } else {
            button.disabled = true;
            document.getElementById('totalgram_show_div01').innerHTML = 
                "インゴット<strong>" + ingotCounttotal + "本</strong>が正しく入力されました。インゴットの情報に問題なければ、次の入力に進んでください。";
            document.getElementById('totalgram_show_div01').style.color = 'green';

            [refining_box04, refining_box05, refining_box06, submit_btn_display, refining_information, collect_cal_box].forEach(box => {
                box.style.pointerEvents = 'auto';
                box.style.opacity = '1';
            });
        }

    }

    // ingotDetailsから該当情報を削除し、再レンダリング
    deleteRow(displaybox, index) {
        delete this._ingotDetails[index]; // 配列から削除
        const ingotDetailsJSON = JSON.stringify(this.ingotDetails);
        document.getElementById('ingotDetailsInput').value = ingotDetailsJSON;
        this.displayDetails(); //インゴット詳細の表示
        this.calculateTotalPrice(); // 合計計算
        this.barChargeFee(); // バーチャージ
        console.log('Updated ingotDetailsJSON', ingotDetailsJSON);
    }

}
