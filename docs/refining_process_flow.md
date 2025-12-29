# 精錬分割加工申込 処理フロー

## プロセスフロー図

### 全体フロー
```mermaid
flowchart TD
    A[ユーザーがフォームにアクセス] --> B[インゴット本数を入力]
    B --> C[インゴット詳細モーダルを開く]
    C --> D[インゴット種類選択]
    D --> E{種類は?}
    E -->|金/プラチナ| F[GDBブランド確認]
    E -->|スクラップ| G[グラム数入力]
    F --> H[グラム数選択]
    H --> I[分割枚数選択]
    G --> J[スクラップグラム入力]
    I --> K[保存ボタンクリック]
    J --> K
    K --> L{ingotDetailsに追加}
    L --> M[費用計算]
    M --> N{必要本数入力完了?}
    N -->|いいえ| C
    N -->|はい| O[配送方法選択]
    O --> P[売却立替選択]
    P --> Q[お客様情報入力]
    Q --> R[フォーム送信]
    R --> S{バリデーション}
    S -->|失敗| T[エラー表示]
    S -->|成功| U[ingot_detailsをJSON化]
    U --> V[DBに保存]
    V --> W[メール送信処理]
    W --> X{メール送信成功?}
    X -->|はい| Y[サンクスページ表示]
    X -->|いいえ| Z[エラーログ記録]
    Z --> AA[GoogleChat通知]
    AA --> Y
```

### データフロー詳細
```mermaid
sequenceDiagram
    participant User as ユーザー
    participant UI as フロントエンド
    participant JS as JavaScript
    participant Controller as RefiningInfoController
    participant DB as Database
    participant Mail as メールシステム
    participant Chat as GoogleChat

    User->>UI: フォーム入力開始
    User->>UI: インゴット詳細入力
    UI->>JS: saveDatabtn クリック
    JS->>JS: IngotDetail インスタンス生成
    JS->>JS: バリデーション実行
    alt バリデーションエラー
        JS->>User: アラート表示
    else バリデーション成功
        JS->>JS: calculateUnitPrice()
        JS->>JS: ingotTotal.addIngotDetail()
        JS->>JS: JSON.stringify(ingotDetails)
        JS->>UI: ingotDetailsInput.value = JSON
        JS->>JS: displayDetails()
        JS->>JS: calculateTotalPrice()
    end
    
    User->>UI: フォーム送信
    UI->>Controller: POST /refining_info
    Controller->>Controller: $ingotDetailsJSON = request('ingot_details')
    Controller->>Controller: json_decode($ingotDetailsJSON)
    
    alt ingotDetails が [null] の場合
        Controller->>Controller: 空配列として処理
        Note over Controller: foreach で null をスキップ
        Controller->>DB: データ保存（ingot_details: "[null]"）
        Controller->>Mail: メール送信試行
        Mail->>Mail: Blade テンプレート処理
        Note over Mail: $detail['_type'] でエラー発生
        Mail--xController: Exception
        Controller->>DB: エラーログ記録
        Controller->>Chat: エラー通知
        Controller->>User: サンクスページ（エラー発生済み）
    else 正常なデータの場合
        Controller->>DB: データ保存
        Controller->>Mail: 店舗側メール送信
        Controller->>Mail: お客様側メール送信
        Controller->>User: サンクスページ表示
    end
```

### エラー発生メカニズム
```mermaid
flowchart TD
    A[ingotDetails が [null] でDB保存] --> B[メールテンプレート読み込み]
    B --> C[@foreach ingotDetails as detail]
    C --> D{$detail が null?}
    D -->|はい| E[detail['_type'] アクセス試行]
    E --> F[エラー: Trying to access array offset on value of type null]
    F --> G[メール送信失敗]
    G --> H[catch ブロックで捕捉]
    H --> I[エラーログ記録]
    I --> J[GoogleChat通知]
    D -->|いいえ| K[正常にデータ表示]
```

## データ構造

### 正常な ingotDetails の構造
```json
[
  {
    "_gram": "500",
    "_type": "金",
    "_is_gdb": "はい",
    "_is_overseas_brand": "",
    "_splits_count_100g": 3,
    "_splits_count_50g": 4,
    "_immediate_split_count_100g": 0,
    "_splits_scrap_100g": 0,
    "_fee_total_price": 97350,
    "_unit_price": 177.272727,
    "_zei": 1.1
  }
]
```

### エラー時の ingotDetails の構造
```json
[null]
```

## 根本原因の可能性

```mermaid
mindmap
  root((ingotDetails が [null] になる原因))
    フロントエンド
      ユーザー操作ミス
        モーダルを閉じただけ
        保存ボタンを押さなかった
      JavaScript エラー
        例外が発生
        データ構築失敗
      ブラウザの問題
        メモリ不足
        拡張機能の干渉
    通信
      タイムアウト
      データ欠損
      エンコードエラー
    バリデーション不足
      null チェック未実装
      空配列チェック未実装
```

## 修正案

### 1. フロントエンド修正
- ingotDetailsInput の値が空または "[null]" の場合は送信をブロック
- 保存ボタンクリック時に厳密なバリデーション追加

### 2. バックエンド修正
- Controller で ingotDetails の null チェック強化
- 空配列や [null] の場合はエラーレスポンス

### 3. メールテンプレート修正
- null safe な記述に変更
- @if($detail) チェック追加

### 4. ユーザビリティ改善
- 入力状態を視覚的に明示
- 保存前にモーダルを閉じようとした場合に警告表示
