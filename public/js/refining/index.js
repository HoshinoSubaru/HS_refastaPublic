
// データの取得
window.onload = function(){
    // 郵便番号検
    $("#user_yuubinn").focusout(function(){
        // $yb = val_esc($(this).val());
        // // まず半角変換
        // $yb = toHalfWidth($yb);
        $yb = $(this).val();
        // 数字以外削除
        $yb = $yb.replace(/[^0-9]/g,"");
        $(this).val($yb); // 代入する
        AjaxZip3.zip2addr('user_yuubinn','','user_todou','user_sikutyouson','user_banti');
        $("#user_sikutyouson").focus();
    });
    
    $("#user_yuubinn").keydown(function(ev) {
        if ((ev.which && ev.which === 13) || (ev.keyCode && ev.keyCode === 13)) {
            AjaxZip3.zip2addr('user_yuubinn','','user_todou','user_sikutyouson','user_banti');
            $("#user_building").focus();
        } else {
            return true;
        }
    });

    const ingotTotal = new IngotTotal();
    $('form').submit(function(event){
        // ここで必要なエラーチェックを実装
        if ($('input[name="is_applicant"]:checked').val() !== 'はい') {
            alert('※ご本人さま以外のお申込ですとお取引はできかねます。必須項目を選択してください。');
            event.preventDefault(); // フォームの送信をキャンセル
        } else if ($('input[name="same_address"]:checked').val() !== 'はい') {
            alert('※ご身分証の住所以外でのやり取りはできかねます。必須項目を選択してください。');
            event.preventDefault(); // フォームの送信をキャンセル
        }

        const ingotDetailsValue = document.getElementById('ingotDetailsInput').value.trim();
        
        // ingotDetails が空、または [null] の場合はエラー
        if (!ingotDetailsValue || ingotDetailsValue === '[null]' || ingotDetailsValue === '[]') {
            alert('インゴット詳細のデータがありません。詳しく内容を入力してください。');
            event.preventDefault(); // フォームの送信をキャンセルする
            $('html, body').animate({
                scrollTop: 0
            }, 'slow');
            return false;
        }
        
        // JSON パースしてバリデーション
        try {
            const parsedDetails = JSON.parse(ingotDetailsValue);
            if (!Array.isArray(parsedDetails) || parsedDetails.length === 0) {
                alert('インゴット詳細のデータがありません。詳しく内容を入力してください。');
                event.preventDefault();
                $('html, body').animate({
                    scrollTop: 0
                }, 'slow');
                return false;
            }
            
            // 配列内に null や不正なデータがないかチェック
            let hasValidData = false;
            for (let i = 0; i < parsedDetails.length; i++) {
                if (parsedDetails[i] && parsedDetails[i]._type) {
                    hasValidData = true;
                    break;
                }
            }
            
            if (!hasValidData) {
                alert('インゴット詳細のデータがありません。詳しく内容を入力してください。');
                event.preventDefault();
                $('html, body').animate({
                    scrollTop: 0
                }, 'slow');
                return false;
            }
        } catch (e) {
            alert('インゴット詳細のデータが不正です。もう一度入力してください。');
            event.preventDefault();
            $('html, body').animate({
                scrollTop: 0
            }, 'slow');
            return false;
        }
        
    });
    $(document).on('click', '.deleteRowBtn', function(e) {
        const index = $(this).attr("index");
        ingotTotal.deleteRow(this.parentNode, index);
    });
    document.getElementById("platinumtype").addEventListener("click", function() {
        const splits_count_50g_div = document.getElementById("splits_count_50g_div");
        const splits_count_100g_div = document.getElementById("splits_count_100g_div");
        const splits_immediate_split_100g_div = document.getElementById("splits_immediate_split_100g_div"); 
        // const question3_scrap = document.getElementById("question3_scrap");
        splits_immediate_split_100g_div.style.display = 'none';　// splits_immediate_split_100g_divを非表示にする
        splits_count_50g_div.style.display = 'none'; // splits_count_50g_divを非表示にする
        splits_count_100g_div.style.display = ''; // splits_count_100g_divを非表示にする
        // question3_scrap.style.display = 'none';
        const gramSelect = document.getElementById('gram');
        for (let i = 0; i < gramSelect.options.length; i++) {
            const option = gramSelect.options[i];
            if (option.value === '100' || option.value === '200' || option.value === '300') {
                option.style.display = 'none';
            }
        }
    });
    document.getElementById("goldtype").addEventListener("click", function() {
        const splits_count_50g_div = document.getElementById("splits_count_50g_div");
        const splits_count_100g_div = document.getElementById("splits_count_100g_div");
        const splits_scrap_100g_div = document.getElementById("splits_scrap_100g_div");
        splits_count_50g_div.style.display = ''; // splits_count_50g_divを表示する
        splits_count_100g_div.style.display = ''; // splits_count_100g_divを表示する
        splits_scrap_100g_div.style.display = 'none';
        splits_scrap_100g_div.style.setProperty('display', 'none', 'important');
        const gramSelect = document.getElementById('gram');
        for (let i = 0; i < gramSelect.options.length; i++) {
            const option = gramSelect.options[i];
            if (option.value === '100' || option.value === '200' || option.value === '300') {
                option.style.display = '';
            }
        }
    });
    document.getElementById("scraptype").addEventListener("click", function() {
        const splits_count_50g_div = document.getElementById("splits_count_50g_div");
        const splits_count_100g_div = document.getElementById("splits_count_100g_div");
        const splits_immediate_split_100g_div = document.getElementById("splits_immediate_split_100g_div");
        const splits_scrap_100g_div = document.getElementById("splits_scrap_100g_div");
        splits_count_50g_div.style.display = 'none'; // splits_count_50g_divを表示する
        splits_immediate_split_100g_div.style.display = 'none'; // splits_immediate_split_100g_divを表示する
        splits_count_100g_div.style.display = 'none'; // splits_count_100g_divを表示する
        splits_scrap_100g_div.style.display = '';
        const gramSelect = document.getElementById('gram');
        for (let i = 0; i < gramSelect.options.length; i++) {
            const option = gramSelect.options[i];
            if (option.value === '100' || option.value === '200' || option.value === '300') {
                option.style.display = '';
            }
        }

    });
    const openSecondModalBtn = document.getElementById('openSecondModalBtn');
    openSecondModalBtn.disabled = true;
    document.getElementById('ingotCounttotal').addEventListener('input', function() {
        const ingotCount = parseInt(document.getElementById('ingotCounttotal').value);
        const button = document.getElementById('openSecondModalBtn');
        if (ingotCount == 0 || ingotCount == '') {
            button.disabled = true;
        } else {
            button.disabled = false; 
            button.addEventListener('click', function() {
                resetBoxModel();
            });
        }
    });
    document.getElementById("barchargefee_div").style.display = 'none';
    document.getElementById("sale_advance_no").addEventListener("click", function() {
        const saleRebuildingPrice_div = document.getElementById("saleRebuildingPrice_div");
        const selected_sale_div = document.getElementById("selected_sale_div");
        selected_sale_div.style.display = 'none'; 
        saleRebuildingPrice_div.style.display = 'none'; 
    });
    document.getElementById("sale_advance_yes").addEventListener("click", function() {
        const selected_sale_div = document.getElementById("selected_sale_div");
        selected_sale_div.style.display = ''; 
    });
    $('input[name="selected_sale_g"]').click(function(){
        ingotTotal.saleRebuildingPrice(); //インゴット詳細の表示
    })
    document.getElementById("selected_sale_50g").addEventListener("click", function() {
        const saleRebuildingPrice_div = document.getElementById("saleRebuildingPrice_div");
        saleRebuildingPrice_div.style.display = ''; 
    });
    document.getElementById("selected_sale_100g").addEventListener("click", function() {
        const saleRebuildingPrice_div = document.getElementById("saleRebuildingPrice_div");
        saleRebuildingPrice_div.style.display = ''; 
    });
    document.getElementById("selected_scrap_100g").addEventListener("click", function() {
        const saleRebuildingPrice_div = document.getElementById("saleRebuildingPrice_div");
        saleRebuildingPrice_div.style.display = ''; 
    });
    document.getElementById("selected_sale_immediate_split_100g").addEventListener("click", function() {
        const saleRebuildingPrice_div = document.getElementById("saleRebuildingPrice_div");
        saleRebuildingPrice_div.style.display = ''; 
    });
    $('input[name="selected_sale_g"]').change(function(){
        ingotTotal.displayDetails(); //インゴット詳細の表示
        ingotTotal.calculateTotalPrice();
    })
    $('#gram').change(function(){
        updateSplitOptions();  //選択された重量に応じてPullDownの中選択処理を制御するメソッド
    });
    $('input[name="service_selection"]').change(function(){
        ingotTotal.displayDetails(); //インゴット詳細の表示
        ingotTotal.calculateTotalPrice();
    })

    $('input[name="sale_advance_input"]').change(function(){
        ingotTotal.displayDetails(); //インゴット詳細の表示
        ingotTotal.calculateTotalPrice();
    })

    //インゴット詳細を保存するときの詳細
    $("#saveDatabtn").click(function() {
        console.log("✅ Saveボタン押された");
        const ingotDetail = new IngotDetail();
        ingotDetail.type = document.querySelector('input[name="type"]:checked').value;
        console.log("ingotDetail.type 何ですか", ingotDetail.type);
        ingotDetail.is_gdb = document.querySelector('input[name="is_gdb"]:checked').value;
        // ingotDetail.gram = document.getElementById('gram').value;
        // ingotDetail.splits_count_100g = document.getElementById('splits_count_100g').value;
        // ingotDetail.splits_count_50g = document.getElementById('splits_count_50g').value;
        // ingotDetail.immediate_split_count_100g = document.getElementById('splits_immediate_split_100g').value;
        if (ingotDetail.type === 'スクラップ') {
            // ingotDetail.gram = document.getElementById('gram').value;
            ingotDetail.splits_scrap_100g = document.getElementById('splits_scrap_100g').value;
            ingotDetail.gram = document.getElementById('splits_scrap_100g').value;

            const scrapInput = document.getElementById('splits_scrap_100g');
                const val = scrapInput.value.trim();

                if (!val || isNaN(val) || parseInt(val) < 100) {
                    alert("スクラップのグラム数を100g以上で入力してください。");
                    scrapInput.focus();
                    return false;
                }

                ingotDetail.splits_scrap_100g = val;
                ingotDetail.gram = val;
        } else {
            ingotDetail.gram = document.getElementById('gram').value;
            ingotDetail.splits_count_100g = document.getElementById('splits_count_100g').value;
            ingotDetail.splits_count_50g = document.getElementById('splits_count_50g').value;
            ingotDetail.immediate_split_count_100g = document.getElementById('splits_immediate_split_100g').value;
        }

        // ingotDetail.splits_scrap_100g = document.getElementById('splits_scrap_100g').value;

        //追加
        const count50 = parseInt(ingotDetail.splits_count_50g) || 0;
        const count100 = parseInt(ingotDetail.splits_count_100g) || 0;
        const scrap100 = parseInt(ingotDetail.splits_scrap_100g) || 0;
        const countInstant = parseInt(ingotDetail.immediate_split_count_100g) || 0;
        const countScrap = parseInt(ingotDetail.splits_scrap_100g) || 0;
    

        // 混在禁止
        if ((count100 > 0 || count50 > 0) && countInstant > 0) {
            alert('通常分割（50g/100g）と即分割（100g）は同時に選択できません。');
            return false;
        }
    
        // 合計グラム一致チェック
        // const totalGram = ((count100 * 100) + (count50 * 50) + (countInstant * 100));
        // if (parseInt(ingotDetail.gram) !== totalGram) {
        //     alert('グラム数と分割数の合計が一致しません。');
        //     return false;
        // }
        if (ingotDetail.type !== 'スクラップ') {
            const totalGram = ((count100 * 100) + (count50 * 50) + (countInstant * 100));
            if (parseInt(ingotDetail.gram) !== totalGram) {
                alert('グラム数と分割数の合計が一致しません。');
                return false;
            }
        }
        //追加
        // if (ingotDetail.gram != (ingotDetail.splits_count_100g * 100) + (ingotDetail.splits_count_50g * 50) + (ingotDetail.immediate_split_count_100g * 100)) {
        //     alert('グラム数と合計枚数が合わないです。');
        //           return false;
        // }
        if (ingotDetail.type !== 'スクラップ' && ingotDetail.gram != (count100 * 100 + count50 * 50 + countInstant * 100)) {
            alert('グラム数と合計枚数が合わないです。');
            return false;
        }

        // if (
        //     (ingotDetail.type === 'スクラップ' && ingotDetail.gram != (ingotDetail.splits_scrap_100g * 100)) ||
        //     (ingotDetail.type !== 'スクラップ' && ingotDetail.gram != (
        //         (ingotDetail.splits_count_100g * 100) +
        //         (ingotDetail.splits_count_50g * 50) +
        //         (ingotDetail.immediate_split_count_100g * 100)
        //     ))
        //   ) {
        //       alert('グラム数と合計枚数が合わないです。');
        //       return false;
        //   }
        // 計算
        ingotDetail.calculateUnitPrice();  //単価計算

        //ingotTotalに追加
        ingotTotal.addIngotDetail(ingotDetail);
        const ingotDetailsJSON = JSON.stringify(ingotTotal.ingotDetails);
        document.getElementById('ingotDetailsInput').value = ingotDetailsJSON;
        const ingotDetails = JSON.parse(ingotDetailsJSON);

        
        console.log('ingotDetailsJSON', ingotDetailsJSON);

        ingotTotal.displayDetails(); //インゴット詳細の表示
        ingotTotal.calculateTotalPrice();
        
    });
    // ✅ これをここに追加する（Saveボタン処理の後に）
    document.getElementById('ingotCounttotal').addEventListener('change', () => {
        ingotTotal.displayDetails();
    });
};
function resetBoxModel() {
    document.getElementById("question1").style.display = '';
    document.getElementById("question2").style.display = 'none';
    document.getElementById("question3").style.display = 'none';
    const gramGroup = document.getElementById('question3_g');
    if (gramGroup) {
        gramGroup.style.display = 'flex'; // または 'flex'
    }
    $('#gram').val('');
    // $('#goldtype input[type="radio"]').prop('checked', true);
    $('#goldtype input[type="radio"]').prop('checked', true); 
    $('input[name="is_gdb"][value="はい"]').prop('checked', true);
    
    updateSplitOptions();
    $('#splits_count_50g').val('');
    $('#splits_count_100g').val('');
    $('#splits_immediate_split_100g').val('');
    $('#splits_scrap_100g').val('');

    // 選択されたタイプを取得
    document.getElementById("splits_count_50g_div").style.display = '';
    document.getElementById("splits_count_100g_div").style.display = '';
    document.getElementById("splits_immediate_split_100g_div").style.display = ''; 
    

    $('#unit_price').val('');
    $('#fee_total_price').val('');
    $('#max_assignment_count_50g').val('');
}
// 選択された重量に応じてPullDownの中選択処理を制御するメソッド
function updateSplitOptions() {
    const gram = parseInt($('#gram').val());
    const splits_count_100g = document.getElementById('splits_count_100g');
    const splits_count_50g = document.getElementById('splits_count_50g');
    const splits_immediate_split_100g = document.getElementById('splits_immediate_split_100g');
    const splits_scrap_100g = document.getElementById('splits_scrap_100g');

    const splits_count_100g_div = document.getElementById("splits_count_100g_div");
    const splits_immediate_split_100g_div = document.getElementById("splits_immediate_split_100g_div");
    const splits_scrap_100g_div = document.getElementById('splits_scrap_100g_div');

    // 初期化
    splits_count_100g.innerHTML = '';
    splits_count_50g.innerHTML = '';
    splits_immediate_split_100g.innerHTML = '';
    // splits_scrap_100g.innerHTML = '';

    //100g
    const isScrap = document.querySelector('input[name="type"]:checked')?.value === 'スクラップ';

    // if(isScrap) {
    //     splits_scrap_100g_div.style.display = '';
    //     splits_count_100g_div.style.display = 'none';
    // } else {
    //     splits_count_100g_div.style.display = '';
    //     splits_scrap_100g_div.style.display = 'none';
    // }
    if (isScrap) {
        // input なので value に直接代入
        splits_scrap_100g_div.style.display = '';
        splits_scrap_100g.value = '';
        splits_count_100g_div.style.display = 'none';
    } else {
        splits_scrap_100g_div.style.display = 'none';
        splits_count_100g_div.style.display = '';

        // 通常の select の option を生成
        for (let i = 0; i * 100 <= gram; i++) {
            splits_count_100g.innerHTML += `<option value="${i}">${i}枚</option>`;
            splits_immediate_split_100g.innerHTML += `<option value="${i}">${i}枚</option>`;
        }

        for (let i = 0; i * 50 <= gram; i++) {
            if (i % 2 === 0) {
                splits_count_50g.innerHTML += `<option value="${i}">${i}枚</option>`;
            }
        }
    }
    // 分割枚数 100g 選択時の選択肢を生成
    // for (let i = 0; i * 100 <= gram; i++) {
    //     splits_count_100g.innerHTML += `<option value="${i}">${i}枚</option>`;
    //     splits_immediate_split_100g.innerHTML += `<option value="${i}">${i}枚</option>`;
    //     splits_scrap_100g.innerHTML += `<option value="${i}">${i}枚</option>`;
    // }

    // 分割枚数 50g 選択時の選択肢を生成
    // for (let i = 0; i * 50 <= gram; i ++) {
    //     if(i % 2 == 0) {
    //         splits_count_50g.innerHTML += `<option value="${i}">${i}枚</option>`;
    //     }
    // }
    $('#splits_immediate_split_100g').off('change').on('change', function () {
        const immediateCount = parseInt($(this).val()) || 0;
        if (immediateCount > 0) {
            $('#splits_count_50g_div').hide();
            $('#splits_count_100g_div').hide();
        } else {
            $('#splits_count_50g_div').show();
            $('#splits_count_100g_div').show();
        }
    });

    // 50gの選択肢が変更されたときの処理
    $('#splits_count_50g').off('change').on('change', function () {
        const selectedSplits50g = parseInt(splits_count_50g.value) || 0;
        const selectedSplits100g = parseInt(splits_count_100g.value) || 0;
        
        // 通常分割のいずれかが選ばれている場合 → 即分割を非表示
        if (selectedSplits50g > 0 || selectedSplits100g > 0) {
            splits_immediate_split_100g_div.style.display = 'none';
        } else {
            splits_immediate_split_100g_div.style.display = '';
        }

        // 100g欄の制御（通常）
        if (selectedSplits50g * 50 >= gram) {
            splits_count_100g_div.style.display = 'none';
        } else {
            splits_count_100g_div.style.display = '';
            const max100g = Math.floor((gram - selectedSplits50g * 50) / 100);
            splits_count_100g.innerHTML = '';
            for (let i = 0; i <= max100g; i++) {
                splits_count_100g.innerHTML += `<option value="${i}">${i}枚</option>`;
            }
        }
    });
    // 100g変更時の即分割との排他制御（必要に応じて）
    $('#splits_count_100g').off('change').on('change', function () {
        const selectedSplits50g = parseInt(splits_count_50g.value) || 0;
        const selectedSplits100g = parseInt(splits_count_100g.value) || 0;

        if (selectedSplits50g > 0 || selectedSplits100g > 0) {
            splits_immediate_split_100g_div.style.display = 'none';
        } else {
            splits_immediate_split_100g_div.style.display = '';
        }
    });
}