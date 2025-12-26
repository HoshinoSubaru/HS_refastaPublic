class IngotDetail {
    constructor() {
        this._gram = 0;
        this._type = '';
        this._is_gdb = ''; // string
        this._is_overseas_brand = ''; // string
        this._splits_count_100g = 0;
        this._splits_count_50g = 0;
        this._unit_price = 0; // グラム単価
        this._fee_total_price = 0; // 分割加工手数料
        this._zei = 1.1;
        this._immediate_split_count_100g = 0;
        this._splits_scrap_100g = 0;
        this._unit_prices = {
            'companines': {
                'asahi': {
                    'internal': {
                        'unit_prices': 177.272727,
                        'description': '国内のGDB。50g出来ない'
                    },
                    'instant': {
                        'unit_prices': 354.5454545454545,
                        'description': '国内のGDB。即分割100gのみ'
                    },
                    'abroad': {
                        'unit_prices': 265.9090909090909,
                        'description': '国内のGD以外と海外とイレギュラー系。50g出来ない'
                    },
                    'platinum': {
                        'unit_prices': 280,
                        'description': '50g出来ない'
                    },
                    'scrap': {
                        'unit_prices': 265.9090909090909,
                        'description': 'スクラップ（金貨・仏具・お鈴含む）。100g単位。端数は返却または買取対応'
                    }
                },
                'chugai': {
                    'all': {
                        'unit_prices': 218.181818,
                        'description': '50gから対応できる'
                    }
                },
                
            }
        };
        
    }

    get type() {
        return this._type;
    }
    set type(value) {
        this._type = value;
    }

    get is_gdb() {
        return this._is_gdb;
    }  
    set is_gdb(value) {
        this._is_gdb = value;
    }

    get is_overseas_brand() {
        return this._is_overseas_brand;
    }
    set is_overseas_brand(value) {
        this._is_overseas_brand = value;
    }

    get gram() {
        return Number(this._gram);
    }
    set gram(value) {
        this._gram = value;
    }

    get splits_count_100g() {
        return this._splits_count_100g;
    }
    set splits_count_100g(value) {
        this._splits_count_100g = value;
    }
    //スクラップ
    get splits_scrap_100g() {
        return this._splits_scrap_100g;
    }
    set splits_scrap_100g(value) {
        this._splits_scrap_100g = value;
    }
    //スクラップ
    get splits_count_50g() {
        return this._splits_count_50g;
    }
    set splits_count_50g(value) {
        this._splits_count_50g = value;
    }

    get fee_total_price() {
        return Number(this._fee_total_price);
    }
    set fee_total_price(value) {
        this._fee_total_price = value;
    }

    get unit_prices() {
        return this._unit_prices;
    }
    set unit_prices(value) {
        this._unit_prices = value;
    }

    get unit_price() {
        return this._unit_price;
    }
    set unit_price(value) {
        this._unit_price = value;
    }

    get zei() {
        return this._zei;
    }

    get immediate_split_count_100g() { 
        return this._immediate_split_count_100g; 
    }
    set immediate_split_count_100g(value) { 
        this._immediate_split_count_100g = value; 
    }

    // グラム単価と分割加工手数料の計算
    calculateUnitPrice() {
        this.unit_price = this._unit_prices.companines.asahi.abroad.unit_prices;
        
        if (this.type === '金') {
            if (this.is_gdb === 'はい') {
                if (this.immediate_split_count_100g > 0) {
                    this.unit_price = this._unit_prices.companines.asahi.instant.unit_prices;
                }
                else if (this.splits_count_50g > 0) { 
                    this.unit_price = this._unit_prices.companines.chugai.all.unit_prices;
                } else {
                    this.unit_price = this._unit_prices.companines.asahi.internal.unit_prices;
                }
            } 
            else if (this.is_overseas_brand === 'はい') {
                this.unit_price = this._unit_prices.companines.asahi.abroad.unit_prices;
            }
        } 
        else if  (this.type === 'スクラップ') {
            this.unit_price = this._unit_prices.companines.asahi.scrap.unit_prices;
        }
        else if (this.type === 'プラチナ') {
            this.unit_price = this._unit_prices.companines.asahi.platinum.unit_prices;
        }
        // 分割加工手数料の計算（単価＊グラム＊税率）
        this.fee_total_price = this.unit_price * this.gram * this.zei;
    }
}  
