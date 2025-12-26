Vue.createApp({
    data() {
        return {}
    },
    methods: {
        resetImage: function(num){
            // リセットするターゲットを取得する
            // indexを使って、idをもとに取得する
            let target = document.getElementById('uploadimg_' + num)
            // ターゲットのファイル情報をリセット（空に）する。
            console.log(target.value)
            target.value = '';
            console.log(target.value)

            // サムネイル画像のHTMLを変換する
            // グレーアウトで、『選択解除済』の表示とかにする。
            document.getElementById("uploadimg_resbox_" + num).innerHTML = '選択解除済';
            document.getElementById("uploadimg_reset_btn_" + num).classList.add("delete");
            let uploadimg_reset_btn_stat  = document.getElementById("uploadimg_reset_btn_" + num).classList.add("delete");

            // Eoc_estimate_imagesの該当データを削除（最後にPOST送信した時でも良い）

        },

        onFileChange: function (event, index) {
            // ヘッダー定義
            const config = {
                headers: {
                    'content-type': 'multipart/form-data'
                }
            };

            axios.defaults.headers.common = {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            };
            const send_id = document.querySelector('input[name="send_id"]').value;
            let file = event.target.files[0];
            let formData = new FormData();
            formData.append(`image_${index}`, file);
            formData.append("send_id", send_id);
            formData.append("send_id", send_id);

            axios.post(`/refasta_public/estimate_image`, formData, config).then(res => {

                if (res.data.status == 'error') {

                    // エラー時
                    let html = '<div class="alert alert-danger">' + res.data.message + '</div>';
                    document.getElementById("error_field_area_" + index).innerHTML = html;
        
                } else {
                    // 成功時
                    let html = '';
                    document.getElementById("error_field_area_" + index).innerHTML = html;
                }
                

                let filereader = new FileReader();
                filereader.readAsDataURL(file);
                let imgbase64 = "";
                filereader.onload = () => {
                    imgbase64 = filereader.result
                    console.log(filereader)
                    console.log(imgbase64)
                    let imghtml = '<img src="' + imgbase64 + '" >';
                    document.getElementById("uploadimg_resbox_" + index).innerHTML = imghtml;
                    let add_files = document.getElementsByClassName("add_file")
                    for( let i = 0 ; i < add_files.length ; i ++ ) {
                        add_files[i].classList.remove("last")
                    }
                    document.getElementsByClassName("add_file")[index].classList.remove("disabled")

                    // todo ここのaddする対象は調整（disabledのクラスがないやつの中で、最後のやつにlastクラスをaddする。）
                    // 以下の「index」の数字を、「disabled以外の個数 - 1」にすればいける
                    document.getElementsByClassName("add_file")[index].classList.add("last")

                    // 『写真を選択する』を『写真を再選択する』に変換する。
                    document.getElementById("uploadimg_label_" + index).innerHTML = '写真を再選択する';
                    // リセットボタンを表示する
                    
                    document.getElementById("uploadimg_reset_btn_" + index).classList.add("active"); 
                    document.getElementById("uploadimg_reset_btn_" + index).classList.remove("delete");
                    console.log(file)
                }
            }).catch((error) => {
                new Error(error)
            })
        },
        onTextChange: function (event, index) {
            // ヘッダー定義
            const config = {
                headers: {
                    'content-type': 'multipart/form-data'
                }
            };

            axios.defaults.headers.common = {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            };
            const send_id = document.querySelector('input[name="send_id"]').value;
            let text = document.getElementsByName("upload_text_" + index);
            let formData = new FormData();
            formData.append(`text_${index}`, text);
            console.log(text)

            axios.post(`estimate_image`, formData, config).then(res => {
            
            }).catch((error) => {
                new Error(error)
            })
        },
    },
    template: `
      <div class="add_file_form">
        <div v-for="index in 10" :key='"img_" + index' class="add_file last disabled">
          <div classolspan="2" class="add_area">
            <div class="uploadimg_area">
                <label :for='"uploadimg_" + index' :id='"uploadimg_label_" + index'>写真を選択する</label>
                <input :id='"uploadimg_" + index' type="file" v-on:change="onFileChange($event, index)" class='upload_img'>
                <div class="upload_img_thumbnail_wrap">
                    <div class="uploadimg_reset_btn" :id='"uploadimg_reset_btn_" + index' v-on:click="resetImage(index)">×</div>
                    <div :id='"uploadimg_resbox_" + index' class='upload_img_thumbnail'></div>
                </div>
            </div>
            <textarea :id='"upload_text_" + index' :name='"upload_text_" + index' type="text" class='upload_text'>＜補足情報＞
地金の品位　:　
全体の重さ　:　
カラット数　:　
ブランド名　:　
宝石の種類　:　
その他備考　:　</textarea>
          </div>
          <div :id='"error_field_area_" + index'></div>
        </div>
      </div>
    `,
}).mount('#imageUpload')