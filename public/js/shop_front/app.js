Vue.createApp({}).component("guest_info_registration", {
  props: {
    questions_json: {
      default: null,
      type: String
    },
  },
  data() {
    // ----------- 生年月日のリスト生成
    let profile_birthday_year = [];
    profile_birthday_year["selected"] = null; // v-model とバインディングされる
    profile_birthday_year["list"] = [];
    profile_birthday_year["num"] = 100;// 選択肢の数
    profile_birthday_year["year"] = new Date().getFullYear() - 10; // 選択肢の最新年

    // 指定年まで配列に追加
    for (let i = 0; i < profile_birthday_year["num"]; i++) {
      profile_birthday_year["list"].unshift(profile_birthday_year["year"] - i);
    }

    // 初期値の設定
    profile_birthday_year["selected"] = profile_birthday_year["list"][profile_birthday_year["list"].length * 0.6];
    // 月の設定
    let profile_birthday_month = [];
    profile_birthday_month["list"] = ["",1,2,3,4,5,6,7,8,9,10,11,12];
    profile_birthday_month["selected"] = "";
    // 日の設定
    let profile_birthday_day = [];
    profile_birthday_day["list"] = [""];
    for (let i = 1; i <= 31; i++){
      profile_birthday_day["list"].push(i);
    }
    profile_birthday_day["selected"] = "";

    // END ----------- 生年月日のリスト生成
    let prefectures = [];
    prefectures["list"] = ['', '北海道', '青森県', '岩手県', '宮城県', '秋田県', '山形県', '福島県', '茨城県', '栃木県', '群馬県', '埼玉県', '千葉県', '東京都', '神奈川県', '新潟県', '富山県', '石川県', '福井県', '山梨県', '長野県', '岐阜県', '静岡県', '愛知県', '三重県', '滋賀県', '京都府', '大阪府', '兵庫県', '奈良県', '和歌山県', '鳥取県', '島根県', '岡山県', '広島県', '山口県', '徳島県', '香川県', '愛媛県', '高知県', '福岡県', '佐賀県', '長崎県', '熊本県', '大分県', '宮崎県', '鹿児島県', '沖縄県'];
    prefectures["selected"] = '';
    /**
     * 入力内容の保持
     */
    let input_names = [
      "send_id",
      "is_owner",
      "identification_type",
      "purchase_achievement",
      "before_two_years",
      "has_changed_profile",
      "lastname",
      "firstname",
      "furigana_lastname",
      "furigana_firstname",
      "gender",
      "profile_birthday_year",
      "profile_birthday_month",
      "profile_birthday_day",
      "prefecture",
      "city",
      "town",
      "building_types",
      "dwelling_types",
      "tel",
      "email",
      "job_category",
      "job_category_freetext",
    ];
    let input_values = [];
    input_names.forEach(function(val, index){
      input_values[val] = '';
    })

    // thisへのセット
    return {
      input_values: input_values,
      input_names: input_names,
      send_id: document.getElementById("send_id").textContent,
      current_page: 0,
      max_page: 0,
      selected__profile_birthday_year: profile_birthday_year["selected"],
      list__profile_birthday_year: profile_birthday_year["list"],
      selected__profile_birthday_month: profile_birthday_month["selected"],
      list__profile_birthday_month: profile_birthday_month["list"],
      selected__profile_birthday_day: profile_birthday_day["selected"],
      list__profile_birthday_day: profile_birthday_day["list"],
      selected__prefectures: prefectures["selected"],
      list__prefectures: prefectures["list"],
      profile: {
        radio: {
          genders: ["男性", "女性"],
          building_types: ["戸建て", "マンション"],
          dwellings: ["持ち家", "実家", "賃貸", "社宅・寮", "その他"],
          jobs: ["会社員", "自営業", "パート・アルバイト", "主婦", "学生", "その他"]
        },
      },
    }
  },
  updated() {
    if (this.current_page !== this.max_page - 1) return;
    let canvas = document.getElementById("signature_canvas"),
      ctx = canvas.getContext('2d'),
      moveflg = 0,
      Xpoint,
      Ypoint;
    canvas.width = canvas.clientWidth;
    canvas.height = canvas.clientHeight;

    //初期値（サイズ、色、アルファ値）の決定
    let defSize = 3,
      defColor = "#555";

    // キャンバスを白色に塗る
    ctx.fillStyle = 'rgb(255,255,255)';

    // PC対応
    canvas.addEventListener('mousedown', startPoint, false);
    canvas.addEventListener('mousemove', movePoint, false);
    canvas.addEventListener('mouseup', endPoint, false);

    // スマホ対応
    canvas.addEventListener('touchstart', startPoint, false);
    canvas.addEventListener('touchmove', movePoint, false);
    canvas.addEventListener('touchend', endPoint, false);

    function startPoint(e) {
      e.preventDefault();
      ctx.beginPath();

      if (e.layerX === undefined) {
        Xpoint = e.touches[0].pageX - canvas.offsetLeft;
        Ypoint = e.touches[0].pageY - canvas.offsetTop;
      } else {
        Xpoint = e.layerX - canvas.offsetLeft;
        Ypoint = e.layerY - canvas.offsetTop;
      }

      console.log(e);
      console.log(Xpoint);
      console.log(Ypoint);

      ctx.moveTo(Xpoint, Ypoint);
    }

    function movePoint(e) {
      if (e.buttons === 1 || e.witch === 1 || e.type == 'touchmove') {
        if (e.layerX === undefined) {
          Xpoint = e.touches[0].pageX - canvas.offsetLeft;
          Ypoint = e.touches[0].pageY - canvas.offsetTop;
        } else {
          Xpoint = e.layerX - canvas.offsetLeft;
          Ypoint = e.layerY - canvas.offsetTop;
        }
        moveflg = 1;

        ctx.lineTo(Xpoint, Ypoint);
        ctx.lineCap = "round";
        ctx.lineWidth = defSize * 2;
        ctx.strokeStyle = defColor;
        ctx.stroke();
      }
    }

    function endPoint() {
      if (moveflg === 0) {
        ctx.lineTo(Xpoint - 1, Ypoint - 1);
        ctx.lineCap = "round";
        ctx.lineWidth = defSize * 2;
        ctx.strokeStyle = defColor;
        ctx.stroke();
      }
      moveflg = 0;
    }
  },
  methods: {
    parseJson(value) {
      if (this.current_page === 0) this.max_page = JSON.parse(value).length;
      return JSON.parse(value)[this.current_page]
    },

    submit() {
      let input_names = this.input_names;
      let formData = new FormData();
      formData.append("send_id", this.send_id);
      let input_values = this.input_values;
      input_names.forEach(function(name) {
        if(typeof document.forms["shop_front"][name] != "undefined") {

          if(document.forms["shop_front"][name].value){
            formData.append(name, document.forms["shop_front"][name].value);
            input_values[name] = document.forms["shop_front"][name].value;
          }

        } else if (typeof document.forms["shop_front"].elements[name] != "undefined") {

          if (document.forms["shop_front"].elements[name].value){
            formData.append(name, document.forms["shop_front"].elements[name].value);
            input_values[name] = document.forms["shop_front"].elements[name].value;
          }

        }
      });
// console.log(formData)
      console.log(this.input_values)
      axios.post('shop_front_update', formData).then(res => {
        console.log(res)
        console.log("bababab")
      }).catch((error) => {
        new Error(error)
      })

      const profile_page = JSON.parse(this.questions_json).findIndex( (element) => element.key === 'personal_info');
      const result_page = JSON.parse(this.questions_json).findIndex( (element) => element.key === 'deal_type');

      // 過去に買取のご利用はございますか？　初めて利用するの時
      if (this.parseJson(this.questions_json).key === "purchase_achievement") {
        if (this.input_values[this.parseJson(this.questions_json).key] === "初めて利用する") {
          this.current_page = profile_page;
          return;
        }
      }

      // 前回のご利用は２年以上前ですか？　はいの時
      if (this.parseJson(this.questions_json).key === "before_two_years") {
        if (this.input_values[this.parseJson(this.questions_json).key] === "はい") {
          this.current_page = profile_page;
          return;
        }
      }

      // お名前やご住所、電話番号等はおかわりありませんか？　いいえの時
      if (this.parseJson(this.questions_json).key === "has_changed_profile") {
        if (this.input_values[this.parseJson(this.questions_json).key] === "いいえ") {
          this.current_page = result_page;
          return;
        }
      }

      this.current_page++;
    },

    previous() {
      const purchase_achievement_page = JSON.parse(this.questions_json).findIndex( (element) => element.key === 'purchase_achievement');
      const result_page = JSON.parse(this.questions_json).findIndex( (element) => element.key === 'deal_type');

      if ( purchase_achievement_page <= this.current_page && this.current_page < result_page) {
        // 過去に買取のご利用はございますか？　初めて利用するの時
        if (this.input_values["purchase_achievement"] === "初めて利用する" && this.current_page > 3 && this.current_page < 10) {
          const purchase_achievement = JSON.parse(this.questions_json).filter(target=>target.key === "purchase_achievement");
          const purchase_achievement_page = purchase_achievement[0].id - 1;
          this.current_page = purchase_achievement_page;
          return;
        }

        // 前回のご利用は２年以上前ですか？　はいの時
        if (this.input_values["before_two_years"] === "はい") {
          const before_two_years = JSON.parse(this.questions_json).filter(target=>target.key === "before_two_years");
          const before_two_years_page = before_two_years[0].id - 1;
          this.current_page = before_two_years_page;
          return;
        }

        // お名前やご住所、電話番号等はおかわりありませんか？　いいえの時
        if (this.input_values["has_changed_profile"] === "いいえ") {
          const has_changed_profile = JSON.parse(this.questions_json).filter(target=>target.key === "has_changed_profile");
          const has_changed_profile_page = has_changed_profile[0].id - 1;
          this.current_page = has_changed_profile_page;
          return;
        }
      }

      this.current_page--;
    },

    resetCanvas() {
      let canvas = document.getElementById("signature_canvas"),
        ctx = canvas.getContext('2d');

      ctx.clearRect(0, 0, ctx.canvas.clientWidth, ctx.canvas.clientHeight);
      ctx.fillStyle = 'rgb(255,255,255)';
    },

    submitSignature() {
      let target = document.getElementById("signature_canvas");
      const canvas = document.createElement('canvas');
      const maxWidth = 200;
      const maxHeight = target.height * (maxWidth / target.width);
      canvas.width = maxWidth;
      canvas.height = maxHeight;
      const ctx = canvas.getContext('2d');
      ctx.drawImage(target, 0, 0, maxWidth, maxHeight);
      let png = canvas.toDataURL();

      const config = {
        headers: {
          'content-type': 'multipart/form-data'
        }
      };
      let formData = new FormData();
      formData.append("signature", png);
      formData.append("send_id", this.send_id);

      axios.post(`signature_image_update`, formData, config).then(res => {
        console.log(res)
        // window.location.href = 'http://localhost/refasta_public/shop_front/staff?shop_front_id={{ $shop_front_id }}';
      }).catch((error) => {
        new Error(error)
      })
    }
  },
  mounted() {
    console.log("mounted")
  },
  template: `
    <form name="shop_front">
    <div class="guestInfo_title" v-if="parseJson(questions_json).title">
      <h2 v-html="parseJson(questions_json).title"></h2>
      <p v-if="parseJson(questions_json).subtitle" v-html="parseJson(questions_json).subtitle"></p>
    </div>
    <!--radio-->
    <div class="radioWrap" v-if="parseJson(questions_json).radio">
      <template v-for="(question, index) in parseJson(questions_json).radio" :key="parseJson(questions_json).key + '_' + index">
        <input :id="parseJson(questions_json).key + '_' + index" type="radio" v-model="this.input_values[parseJson(questions_json).key]"
               :name="parseJson(questions_json).key" :value="question">
        <label :for="parseJson(questions_json).key + '_' + index"
               :class="parseJson(questions_json).radio.length > 3 ? 'many_radio' : 'few_radio'">
          {{ question }}
        </label>
      </template>
    </div>
    <!--personal_info_term-->
    <div class="personal_info_term" v-if="parseJson(questions_json).personal_info_term">
      <div class="scrollWrap">
        <div class="content">
          {{ parseJson(questions_json).kiyaku_html }}
        </div>
      </div>
    </div>
    <!--profile-->
    <div class="profileWrap" v-if="parseJson(questions_json).profile">
      <fieldset>
        <div class="profile_item">
          <legend>氏名</legend>
          <div class="profile_item-right">
            <input type="text" name="lastname" v-model="this.input_values.lastname">
            <input type="text" name="firstname" v-model="this.input_values.firstname">
          </div>
        </div>
        <div class="profile_item">
          <legend>氏名(フリガナ)</legend>
          <div class="profile_item-right">
            <input type="text" name="furigana_lastname" v-model="this.input_values.furigana_lastname">
            <input type="text" name="furigana_firstname" v-model="this.input_values.furigana_firstname">
          </div>
        </div>
        <div class="profile_item">
          <legend>性別</legend>
          <div class="profile_item-right">
            <template v-for="(gender, index) in this.profile.radio.genders" :key="'radio_building_type_' + index">
              <input :id="'gender_' + index" type="radio" name="gender" :value="gender" v-model="this.input_values.gender">
              <label :for="'gender_' + index" class="profile_radio">
                {{ gender }}
              </label>
            </template>
          </div>
        </div>
        <div class="profile_item profile_birthday">
          <legend>生年月日</legend>
          <div class="profile_item-right">
            <select v-model="selected__profile_birthday_year" name="profile_birthday_year"
                    class="profile_birthday_year">
              <option v-for="(year, index) in this.list__profile_birthday_year" :key="index" :value="year">{{ year }}年</option>
            </select>
            <select v-model="selected__profile_birthday_month" name="profile_birthday_month"
                    class="profile_birthday_month">
              <option v-for="(month, index) in this.list__profile_birthday_month" :key="index" :value="month">{{ month }}月</option>
            </select>
            <select v-model="selected__profile_birthday_day" name="profile_birthday_day"
                    class="profile_birthday_day">
              <option v-for="(day, index) in this.list__profile_birthday_day" :key="index" :value="day">{{ day }}日</option>
            </select>
          </div>
        </div>
        <div class="profile_item">
          <legend>郵便番号</legend>
          <div class="profile_item-right">
            <input name="yubinnumber" type="text" v-model="this.input_values.yubinnumber">
          </div>
        </div>
        <div class="profile_item">
          <legend>都道府県</legend>
          <div class="profile_item-right">
            <select v-model="selected__prefectures" name="prefecture"
                    class="prefecture">
              <option v-for="(prefecture, index) in this.list__prefectures" :key="index" :value="prefecture">{{ prefecture }}</option>
            </select>
          </div>
        </div>
        <div class="profile_item">
          <legend>市区郡</legend>
          <div class="profile_item-right">
            <input name="city" type="text" v-model="this.input_values.city">
          </div>
        </div>
        <div class="profile_item">
          <legend>町名・番地</legend>
          <div class="profile_item-right">
            <input name="town" type="text" v-model="this.input_values.town">
          </div>
        </div>
      </fieldset>
      <fieldset>
        <div class="profile_item">
          <legend>建物種類</legend>
          <div class="profile_item-right">
            <template v-for="(building_type, index) in this.profile.radio.building_types"
                      :key="'radio_building_type_' + index">
              <input :id="'building_type_' + index" type="radio" name="building_types" :value="building_type" v-model="this.input_values.building_types">
              <label :for="'building_type_' + index" class="profile_radio">
                {{ building_type }}
              </label>
            </template>
          </div>
        </div>
        <div class="profile_item">
          <legend>お住まい</legend>
          <div class="profile_item-right">
            <template v-for="(dwelling, index) in this.profile.radio.dwellings" :key="'radio_dwelling_' + index">
              <input :id="'dwelling_' + index" type="radio" name="dwelling_types" :value="dwelling" v-model="this.input_values.dwelling_types">
              <label :for="'dwelling_' + index" class="profile_radio">
                {{ dwelling }}
              </label>
            </template>
          </div>
        </div>
      </fieldset>
      <fieldset>
        <div class="profile_item">
          <legend>電話番号</legend>
          <div class="profile_item-right">
            <input type="tel" name="tel" v-model="this.input_values.tel">
          </div>
        </div>
        <div class="profile_item">
          <legend>メールアドレス</legend>
          <div class="profile_item-right">
            <input type="email" name="email" v-model="this.input_values.email">
          </div>
        </div>
      </fieldset>
      <fieldset>
        <div class="profile_item occupation">
          <legend>ご職業</legend>
          <div class="profile_item-right">
            <template v-for="(job, index) in this.profile.radio.jobs" :key="'radio_job_' + index">
              <input :id="'job_category_' + index" type="radio" name="job_category" :value="job" v-model="this.input_values.job_category">
              <label :for="'job_category_' + index" class="profile_radio">
                {{ job }}
              </label>
            </template>
            <input type="text" name="job_category_freetext" v-model="this.input_values.job_category_freetext">
          </div>
        </div>
      </fieldset>
    </div>
    <!--deal-->
    <div class="deal" v-if="parseJson(questions_json).deal">
      <h2>商品結果：{{ parseJson(questions_json).deal.result }}</h2>
      <template v-for="(question_array, index) in parseJson(questions_json).deal.radio" :key="'deal_' + index">
        <legend>{{ question_array }}</legend>
        <fieldset>
          <div>
            <input type="radio" :name="'deal_' + index" :id="'deal_yes_' + index" :value="'deal_yes_' + index">
            <label :for="'deal_yes_' + index">
              YES
            </label>
          </div>
          <div>
            <input type="radio" :name="'deal_' + index" :id="'deal_no_' + index" :value="'deal_no_' + index">
            <label :for="'deal_no_' + index">
              NO
            </label>
          </div>
        </fieldset>
      </template>
    </div>
    <!--terms_of_service-->
    <div class="terms_of_service" v-if="parseJson(questions_json).terms_of_service">
      <section>
        <h2>売買目的についてお答えください</h2>
        <fieldset>
          <input type="radio" name="purpose" id="purpose_saving">
          <label for="purpose_saving">貯蓄</label>
          <input type="radio" name="purpose" id="purpose_hobby">
          <label for="purpose_hobby">趣味・娯楽</label>
          <input type="radio" name="purpose" id="purpose_expense">
          <label for="purpose_expense">生活費</label>
        </fieldset>
        <fieldset>
          <input type="radio" name="purpose" id="purpose_rental">
          <label for="purpose_rental">貸入返済</label>
        </fieldset>
        <fieldset>
          <input type="radio" name="purpose" id="purpose_other">
          <label for="purpose_other">その他</label>
          <input type="text" name="purpose_other">
        </fieldset>
      </section>
      <section>
        <h2>規約をお読みの上、下記項目についてお答えください</h2>
        <fieldset>
          <input type="checkbox" name="agreement_antisocial" id="agreement_antisocial">
          <label for="agreement_antisocial">反社会的勢力ではありません</label>
        </fieldset>
        <fieldset>
          <input type="checkbox" name="agreement_content" id="agreement_content">
          <label for="agreement_content">規約の内容について理解し同意しました</label>
        </fieldset>
      </section>
    </div>
    <!--signature-->
    <div class="signature" v-if="parseJson(questions_json).signature">
      <canvas id="signature_canvas" width="1000" height="300"></canvas>
      <button type="button" @click="resetCanvas('signature_canvas')" class="form-control">リセット</button>
    </div>
    <ul class="footerMenu">
      <li class="footerMenu_left">
        <button type="button" @click="previous"
                v-if="this.current_page !== 0">戻る
        </button>
      </li>
      <li class="footerMenu_center">
        <button type="button" @click="submit"
                v-if="this.current_page !== this.max_page - 1">次へ
        </button>
        <button type="button" @click="submitSignature" v-if="this.current_page === this.max_page - 1">取引完了</button>
      </li>
    </ul>
    </form>
  `,
}).mount('#guestInfoRegistration')