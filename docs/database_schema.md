# データベーススキーマ

## テーブル関連図

```mermaid
erDiagram
    Eoc_refining_v1 ||--o{ ingot_details : "contains JSON"
    
    Eoc_refining_v1 {
        bigint id PK
        string selected_sale_g "売却立替詳細（50g/100g）"
        string saleRebuildingPrice "本日のインゴット売却価格"
        string deliveryservice "配送料"
        string totalTransferAmount "ご請求金額"
        json ingot_details "インゴット詳細（JSON配列）"
        string angouka_mailaddress "暗号化メールアドレス"
        string service_selection "インゴットのお持ち込み方法"
        string sale_advance_input "売却立替（はい/いいえ）"
        string usage "弊社ご利用回数"
        string name "お名前"
        string kana "フリガナ"
        string phone_number "電話番号"
        string email "メールアドレス"
        string contact_method "希望連絡方法"
        string user_yuubinn "郵便番号"
        string user_todou "都道府県"
        string user_sikutyouson "市区町村"
        string user_banti "町村名・番地"
        string user_building "建物名"
        string is_applicant "ご本人さまのお申込みですか"
        string same_address "身分証の住所と現住所は同一ですか"
        text content_inquiry "備考欄"
        timestamp created_at
        timestamp updated_at
    }
    
    ingot_details {
        string _type "インゴット種類（金/プラチナ/スクラップ）"
        string _is_gdb "GDBブランド（はい/分からない）"
        string _is_overseas_brand "海外ブランド"
        string _gram "重量（グラム）"
        int _splits_count_50g "分割50gバー枚数"
        int _splits_count_100g "分割100gバー枚数"
        int _immediate_split_count_100g "即分割100gバー枚数"
        int _splits_scrap_100g "スクラップのグラム数"
        float _unit_price "グラム単価"
        float _fee_total_price "分割加工手数料"
        float _zei "税率（1.1）"
    }
```

## Eoc_refining_v1 テーブル詳細

### 基本情報
| カラム名 | 型 | Null | デフォルト | 説明 |
|---------|------|------|-----------|------|
| id | bigint(20) | NO | AUTO_INCREMENT | 主キー |
| created_at | timestamp | YES | NULL | 作成日時 |
| updated_at | timestamp | YES | NULL | 更新日時 |

### インゴット関連
| カラム名 | 型 | Null | 説明 | 例 |
|---------|------|------|------|------|
| ingot_details | text | YES | インゴット詳細情報（JSON） | `[{"_gram":"500","_type":"金",...}]` |

### 料金関連
| カラム名 | 型 | Null | 説明 | 例 |
|---------|------|------|------|------|
| selected_sale_g | varchar(255) | YES | 売却立替詳細 | "100", "50", "instant" |
| saleRebuildingPrice | varchar(255) | YES | 本日のインゴット売却価格 | "850,000円" |
| deliveryservice | varchar(255) | YES | 配送料 | "27,500円" |
| barchargefeefee | varchar(255) | YES | バーチャージ | "5,500円" |
| totalTransferAmount | varchar(255) | YES | ご請求金額 | "-800,000円" |

### サービス選択
| カラム名 | 型 | Null | 説明 | 例 |
|---------|------|------|------|------|
| service_selection | varchar(255) | YES | お持ち込み方法 | "店頭タイプ", "配送タイプ" |
| sale_advance_input | varchar(255) | YES | 売却立替 | "はい", "いいえ" |
| usage | varchar(255) | YES | ご利用回数 | "初めて", "2回目以降" |

### お客様情報
| カラム名 | 型 | Null | 説明 | 例 |
|---------|------|------|------|------|
| name | varchar(255) | YES | お名前 | "山田 太郎" |
| kana | varchar(255) | YES | フリガナ | "ヤマダ タロウ" |
| phone_number | varchar(255) | YES | 電話番号 | "090-1234-5678" |
| email | varchar(255) | YES | メールアドレス | "example@example.com" |
| angouka_mailaddress | varchar(255) | YES | 暗号化メールアドレス | "a1b2c3d4" |
| contact_method | varchar(255) | YES | 希望連絡方法 | "電話", "メール" |

### 住所情報
| カラム名 | 型 | Null | 説明 | 例 |
|---------|------|------|------|------|
| user_yuubinn | varchar(255) | YES | 郵便番号 | "100-0001" |
| user_todou | varchar(255) | YES | 都道府県 | "東京都" |
| user_sikutyouson | varchar(255) | YES | 市区町村 | "千代田区" |
| user_banti | varchar(255) | YES | 町村名・番地 | "千代田1-1-1" |
| user_building | varchar(255) | YES | 建物名 | "○○ビル101号室" |

### 最終確認
| カラム名 | 型 | Null | 説明 | 例 |
|---------|------|------|------|------|
| is_applicant | varchar(255) | YES | ご本人さまのお申込みですか | "はい", "いいえ" |
| same_address | varchar(255) | YES | 身分証の住所と現住所は同一ですか | "はい", "いいえ" |
| content_inquiry | text | YES | 備考欄 | "よろしくお願いします" |

## ingot_details JSON構造

### 正常なデータ例

```json
[
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
]
```

### スクラップの場合

```json
[
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
]
```

### 問題のあるデータ（エラー発生）

```json
[null]
```

## 関連外部テーブル

```mermaid
erDiagram
    kinkai_tb_gold ||--o{ Eoc_refining_v1 : "価格参照"
    kinkai_tb_platinum ||--o{ Eoc_refining_v1 : "価格参照"
    
    kinkai_tb_gold {
        string gold_item "商品名"
        decimal gold_price "金価格"
    }
    
    kinkai_tb_platinum {
        string platinum_item "商品名"
        decimal platinum_price "プラチナ価格"
    }
```

### kinkai.tb_gold
- `gold_item = 'ingot_100over'` : 100g以上のインゴット価格（1gあたり）
- `gold_item = 'k24'` : K24金価格（1gあたり）

### kinkai.tb_platinum
- `platinum_item = 'ingot_100over'` : 100g以上のプラチナインゴット価格（1gあたり）

## データフロー

```mermaid
flowchart LR
    A[ユーザー入力] --> B[JavaScript<br/>IngotDetail]
    B --> C[JSON.stringify]
    C --> D[ingot_details<br/>hidden input]
    D --> E[POST Request]
    E --> F[Controller]
    F --> G[json_decode]
    G --> H{Validation}
    H -->|OK| I[DB Insert]
    H -->|NG| J[Error]
    I --> K[Eoc_refining_v1<br/>Table]
    K --> L[Mail Template]
    L --> M{foreach}
    M -->|null| N[Error]
    M -->|valid| O[Success]
```
