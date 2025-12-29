# テストデータ

## 1. 正常系テストデータ

### 1.1 金インゴット（GDBブランド）- 500g
```json
{
  "ingot_details": [
    {
      "_type": "金",
      "_is_gdb": "はい",
      "_is_overseas_brand": "",
      "_gram": "500",
      "_splits_count_50g": 4,
      "_splits_count_100g": 1,
      "_immediate_split_count_100g": 0,
      "_splits_scrap_100g": 0,
      "_unit_price": 177.272727,
      "_fee_total_price": 97350,
      "_zei": 1.1
    }
  ],
  "selected_sale_g": "100",
  "saleRebuildingPricefee": "850,000円",
  "deliveryservicefee": "27,500円",
  "barchargefeefee": "0円",
  "totalTransferAmountfee": "-822,500円",
  "sale_advance_input": "はい",
  "service_selection": "配送タイプ",
  "usage": "初めて",
  "name": "山田 太郎",
  "kana": "ヤマダ タロウ",
  "phone_number": "090-1234-5678",
  "email": "test@example.com",
  "contact_method": "メール",
  "user_yuubinn": "100-0001",
  "user_todou": "東京都",
  "user_sikutyouson": "千代田区",
  "user_banti": "千代田1-1-1",
  "user_building": "テストビル101",
  "is_applicant": "はい",
  "same_address": "はい",
  "content_inquiry": "テストデータ"
}
```

### 1.2 プラチナインゴット（GDBブランド）- 1000g
```json
{
  "ingot_details": [
    {
      "_type": "プラチナ",
      "_is_gdb": "はい",
      "_is_overseas_brand": "",
      "_gram": "1000",
      "_splits_count_50g": 0,
      "_splits_count_100g": 10,
      "_immediate_split_count_100g": 0,
      "_splits_scrap_100g": 0,
      "_unit_price": 280,
      "_fee_total_price": 308000,
      "_zei": 1.1
    }
  ],
  "selected_sale_g": "100",
  "saleRebuildingPricefee": "450,000円",
  "deliveryservicefee": "27,500円",
  "barchargefeefee": "0円",
  "totalTransferAmountfee": "-114,500円",
  "sale_advance_input": "はい",
  "service_selection": "配送タイプ",
  "usage": "2回目以降",
  "name": "鈴木 花子",
  "kana": "スズキ ハナコ",
  "phone_number": "080-9876-5432",
  "email": "hanako@example.com",
  "contact_method": "電話",
  "user_yuubinn": "150-0001",
  "user_todou": "東京都",
  "user_sikutyouson": "渋谷区",
  "user_banti": "渋谷1-2-3",
  "user_building": "",
  "is_applicant": "はい",
  "same_address": "はい",
  "content_inquiry": ""
}
```

### 1.3 スクラップ - 150g
```json
{
  "ingot_details": [
    {
      "_type": "スクラップ",
      "_is_gdb": "はい",
      "_is_overseas_brand": "",
      "_gram": "150",
      "_splits_count_50g": 0,
      "_splits_count_100g": 0,
      "_immediate_split_count_100g": 0,
      "_splits_scrap_100g": 150,
      "_unit_price": 265.9090909090909,
      "_fee_total_price": 43898.5,
      "_zei": 1.1
    }
  ],
  "selected_sale_g": "100",
  "saleRebuildingPricefee": "850,000円",
  "deliveryservicefee": "27,500円",
  "barchargefeefee": "0円",
  "totalTransferAmountfee": "-778,601円",
  "sale_advance_input": "はい",
  "service_selection": "配送タイプ",
  "usage": "初めて",
  "name": "佐藤 次郎",
  "kana": "サトウ ジロウ",
  "phone_number": "070-1111-2222",
  "email": "jiro@example.com",
  "contact_method": "メール",
  "user_yuubinn": "160-0001",
  "user_todou": "東京都",
  "user_sikutyouson": "新宿区",
  "user_banti": "新宿1-1-1",
  "user_building": "新宿タワー501",
  "is_applicant": "はい",
  "same_address": "はい",
  "content_inquiry": "スクラップのテストです"
}
```

### 1.4 即分割100g - 金1000g
```json
{
  "ingot_details": [
    {
      "_type": "金",
      "_is_gdb": "はい",
      "_is_overseas_brand": "",
      "_gram": "1000",
      "_splits_count_50g": 0,
      "_splits_count_100g": 0,
      "_immediate_split_count_100g": 10,
      "_splits_scrap_100g": 0,
      "_unit_price": 354.5454545454545,
      "_fee_total_price": 390000,
      "_zei": 1.1
    }
  ],
  "selected_sale_g": "instant",
  "saleRebuildingPricefee": "850,000円",
  "deliveryservicefee": "27,500円",
  "barchargefeefee": "0円",
  "totalTransferAmountfee": "-432,500円",
  "sale_advance_input": "はい",
  "service_selection": "配送タイプ",
  "usage": "初めて",
  "name": "田中 美咲",
  "kana": "タナカ ミサキ",
  "phone_number": "090-3333-4444",
  "email": "misaki@example.com",
  "contact_method": "メール",
  "user_yuubinn": "170-0001",
  "user_todou": "東京都",
  "user_sikutyouson": "豊島区",
  "user_banti": "池袋2-2-2",
  "user_building": "",
  "is_applicant": "はい",
  "same_address": "はい",
  "content_inquiry": ""
}
```

### 1.5 複数インゴット（金500g + プラチナ1000g）
```json
{
  "ingot_details": [
    {
      "_type": "金",
      "_is_gdb": "はい",
      "_is_overseas_brand": "",
      "_gram": "500",
      "_splits_count_50g": 4,
      "_splits_count_100g": 1,
      "_immediate_split_count_100g": 0,
      "_splits_scrap_100g": 0,
      "_unit_price": 177.272727,
      "_fee_total_price": 97350,
      "_zei": 1.1
    },
    {
      "_type": "プラチナ",
      "_is_gdb": "はい",
      "_is_overseas_brand": "",
      "_gram": "1000",
      "_splits_count_50g": 0,
      "_splits_count_100g": 10,
      "_immediate_split_count_100g": 0,
      "_splits_scrap_100g": 0,
      "_unit_price": 280,
      "_fee_total_price": 308000,
      "_zei": 1.1
    }
  ],
  "selected_sale_g": "100",
  "saleRebuildingPricefee": "850,000円",
  "deliveryservicefee": "44,000円",
  "barchargefeefee": "0円",
  "totalTransferAmountfee": "-400,650円",
  "sale_advance_input": "はい",
  "service_selection": "配送タイプ",
  "usage": "2回目以降",
  "name": "高橋 健一",
  "kana": "タカハシ ケンイチ",
  "phone_number": "080-5555-6666",
  "email": "kenichi@example.com",
  "contact_method": "電話",
  "user_yuubinn": "180-0001",
  "user_todou": "東京都",
  "user_sikutyouson": "武蔵野市",
  "user_banti": "吉祥寺3-3-3",
  "user_building": "吉祥寺マンション202",
  "is_applicant": "はい",
  "same_address": "はい",
  "content_inquiry": "複数インゴットのテスト"
}
```

### 1.6 店頭持ち込み（配送料なし）
```json
{
  "ingot_details": [
    {
      "_type": "金",
      "_is_gdb": "はい",
      "_is_overseas_brand": "",
      "_gram": "500",
      "_splits_count_50g": 0,
      "_splits_count_100g": 5,
      "_immediate_split_count_100g": 0,
      "_splits_scrap_100g": 0,
      "_unit_price": 177.272727,
      "_fee_total_price": 97350,
      "_zei": 1.1
    }
  ],
  "selected_sale_g": "100",
  "saleRebuildingPricefee": "850,000円",
  "deliveryservicefee": "0円",
  "barchargefeefee": "0円",
  "totalTransferAmountfee": "-752,650円",
  "sale_advance_input": "はい",
  "service_selection": "店頭タイプ",
  "usage": "初めて",
  "name": "伊藤 真一",
  "kana": "イトウ シンイチ",
  "phone_number": "070-7777-8888",
  "email": "shinichi@example.com",
  "contact_method": "メール",
  "user_yuubinn": "110-0001",
  "user_todou": "東京都",
  "user_sikutyouson": "台東区",
  "user_banti": "上野4-4-4",
  "user_building": "",
  "is_applicant": "はい",
  "same_address": "はい",
  "content_inquiry": "店頭持ち込みのテストです"
}
```

## 2. 異常系テストデータ

### 2.1 ingot_details が [null]（エラーケース）
```json
{
  "ingot_details": [null],
  "sale_advance_input": "いいえ",
  "service_selection": "配送タイプ",
  "usage": "初めて",
  "name": "エラー テスト",
  "kana": "エラー テスト",
  "phone_number": "090-0000-0000",
  "email": "error@example.com",
  "contact_method": "メール",
  "user_yuubinn": "000-0000",
  "user_todou": "東京都",
  "user_sikutyouson": "テスト区",
  "user_banti": "テスト1-1-1",
  "user_building": "",
  "is_applicant": "はい",
  "same_address": "はい",
  "content_inquiry": ""
}
```

### 2.2 ingot_details が空配列
```json
{
  "ingot_details": [],
  "sale_advance_input": "いいえ",
  "service_selection": "配送タイプ",
  "usage": "初めて",
  "name": "空配列 テスト",
  "kana": "カラハイレツ テスト",
  "phone_number": "090-1111-1111",
  "email": "empty@example.com",
  "contact_method": "メール",
  "user_yuubinn": "000-0001",
  "user_todou": "東京都",
  "user_sikutyouson": "テスト区",
  "user_banti": "テスト2-2-2",
  "user_building": "",
  "is_applicant": "はい",
  "same_address": "はい",
  "content_inquiry": ""
}
```

### 2.3 ingot_details に不完全なデータ
```json
{
  "ingot_details": [
    {
      "_type": "金",
      "_gram": "500"
    }
  ],
  "sale_advance_input": "いいえ",
  "service_selection": "配送タイプ",
  "usage": "初めて",
  "name": "不完全 テスト",
  "kana": "フカンゼン テスト",
  "phone_number": "090-2222-2222",
  "email": "incomplete@example.com",
  "contact_method": "メール",
  "user_yuubinn": "000-0002",
  "user_todou": "東京都",
  "user_sikutyouson": "テスト区",
  "user_banti": "テスト3-3-3",
  "user_building": "",
  "is_applicant": "はい",
  "same_address": "はい",
  "content_inquiry": ""
}
```

### 2.4 必須フィールド未入力（name が空）
```json
{
  "ingot_details": [
    {
      "_type": "金",
      "_is_gdb": "はい",
      "_gram": "500",
      "_splits_count_50g": 0,
      "_splits_count_100g": 5,
      "_immediate_split_count_100g": 0,
      "_splits_scrap_100g": 0,
      "_unit_price": 177.272727,
      "_fee_total_price": 97350,
      "_zei": 1.1
    }
  ],
  "sale_advance_input": "いいえ",
  "service_selection": "配送タイプ",
  "usage": "初めて",
  "name": "",
  "kana": "",
  "phone_number": "",
  "email": "required@example.com",
  "contact_method": "メール",
  "user_yuubinn": "000-0003",
  "user_todou": "東京都",
  "user_sikutyouson": "テスト区",
  "user_banti": "テスト4-4-4",
  "user_building": "",
  "is_applicant": "はい",
  "same_address": "はい",
  "content_inquiry": ""
}
```

## 3. エッジケーステストデータ

### 3.1 バーチャージ発生（100g, 200g, 300gの場合）
```json
{
  "ingot_details": [
    {
      "_type": "金",
      "_is_gdb": "はい",
      "_is_overseas_brand": "",
      "_gram": "200",
      "_splits_count_50g": 0,
      "_splits_count_100g": 2,
      "_immediate_split_count_100g": 0,
      "_splits_scrap_100g": 0,
      "_unit_price": 177.272727,
      "_fee_total_price": 38940,
      "_zei": 1.1
    }
  ],
  "selected_sale_g": "100",
  "saleRebuildingPricefee": "850,000円",
  "deliveryservicefee": "27,500円",
  "barchargefeefee": "11,000円",
  "totalTransferAmountfee": "-772,560円",
  "sale_advance_input": "はい",
  "service_selection": "配送タイプ",
  "usage": "初めて",
  "name": "渡辺 美香",
  "kana": "ワタナベ ミカ",
  "phone_number": "080-9999-0000",
  "email": "mika@example.com",
  "contact_method": "メール",
  "user_yuubinn": "120-0001",
  "user_todou": "東京都",
  "user_sikutyouson": "足立区",
  "user_banti": "北千住5-5-5",
  "user_building": "北千住アパート303",
  "is_applicant": "はい",
  "same_address": "はい",
  "content_inquiry": "バーチャージテスト"
}
```

### 3.2 売却立替なし
```json
{
  "ingot_details": [
    {
      "_type": "金",
      "_is_gdb": "はい",
      "_is_overseas_brand": "",
      "_gram": "500",
      "_splits_count_50g": 0,
      "_splits_count_100g": 5,
      "_immediate_split_count_100g": 0,
      "_splits_scrap_100g": 0,
      "_unit_price": 177.272727,
      "_fee_total_price": 97350,
      "_zei": 1.1
    }
  ],
  "saleRebuildingPricefee": "0円",
  "deliveryservicefee": "27,500円",
  "barchargefeefee": "0円",
  "totalTransferAmountfee": "124,850円",
  "sale_advance_input": "いいえ",
  "service_selection": "配送タイプ",
  "usage": "2回目以降",
  "name": "中村 太郎",
  "kana": "ナカムラ タロウ",
  "phone_number": "070-1234-5678",
  "email": "nakamura@example.com",
  "contact_method": "電話",
  "user_yuubinn": "130-0001",
  "user_todou": "東京都",
  "user_sikutyouson": "墨田区",
  "user_banti": "錦糸町6-6-6",
  "user_building": "",
  "is_applicant": "はい",
  "same_address": "はい",
  "content_inquiry": "売却立替なしのテスト"
}
```

### 3.3 50gバー分割のみ
```json
{
  "ingot_details": [
    {
      "_type": "金",
      "_is_gdb": "はい",
      "_is_overseas_brand": "",
      "_gram": "500",
      "_splits_count_50g": 10,
      "_splits_count_100g": 0,
      "_immediate_split_count_100g": 0,
      "_splits_scrap_100g": 0,
      "_unit_price": 218.181818,
      "_fee_total_price": 120000,
      "_zei": 1.1
    }
  ],
  "selected_sale_g": "50",
  "saleRebuildingPricefee": "42,500円",
  "deliveryservicefee": "27,500円",
  "barchargefeefee": "0円",
  "totalTransferAmountfee": "105,000円",
  "sale_advance_input": "はい",
  "service_selection": "配送タイプ",
  "usage": "初めて",
  "name": "小林 花子",
  "kana": "コバヤシ ハナコ",
  "phone_number": "090-8888-9999",
  "email": "hanako.k@example.com",
  "contact_method": "メール",
  "user_yuubinn": "140-0001",
  "user_todou": "東京都",
  "user_sikutyouson": "品川区",
  "user_banti": "大井町7-7-7",
  "user_building": "大井町ハイツ401",
  "is_applicant": "はい",
  "same_address": "はい",
  "content_inquiry": "50gバーのみのテスト"
}
```
