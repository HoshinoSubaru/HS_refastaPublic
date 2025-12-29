# 精錬分割加工申込メール送信エラー - ドキュメントインデックス

## 📚 ドキュメント一覧

このディレクトリには、精錬分割加工申込システムの `ingot_details が [null]` になるメール送信エラーに関する完全なドキュメントが含まれています。

## 🔍 問題の概要

**エラー**: お客様の `ingot_details` が `[null]` で保存され、メールテンプレートでの配列アクセス時にエラーが発生

**影響**: メール送信失敗（DBへのデータ保存は正常に完了）

**根本原因**: 
1. フロントエンドバリデーション不足
2. バックエンドバリデーション不足
3. メールテンプレートの null-safe でない記述

## 📖 ドキュメント構成

### 1. プロセス理解

#### [refining_process_flow.md](./refining_process_flow.md)
精錬分割加工申込の全体的な処理フローとデータフロー

**内容:**
- 全体フロー図（Mermaid）
- データフロー詳細（シーケンス図）
- エラー発生メカニズム
- 根本原因分析（マインドマップ）
- 修正案

**適用対象:** 開発者、システム設計者

---

#### [VISUAL_SUMMARY.md](./VISUAL_SUMMARY.md)
修正内容のビジュアルサマリー

**内容:**
- 問題発生フローと修正後フローの比較
- 3層防御システムの可視化
- 修正箇所マップ
- Before/After 比較表
- 影響範囲の可視化

**適用対象:** プロジェクトマネージャー、レビュアー、ステークホルダー

---

### 2. データベース理解

#### [database_schema.md](./database_schema.md)
データベーススキーマとテーブル関係

**内容:**
- ER図（Mermaid）
- Eoc_refining_v1 テーブル詳細
- ingot_details JSON構造
- 関連外部テーブル
- データフロー図

**適用対象:** データベース管理者、バックエンド開発者

---

### 3. テスト

#### [test_data.md](./test_data.md)
テストデータ集

**内容:**
- 正常系テストデータ（6ケース）
  - 金インゴット（GDBブランド）
  - プラチナインゴット
  - スクラップ
  - 即分割100g
  - 複数インゴット
  - 店頭持ち込み
- 異常系テストデータ（4ケース）
  - `[null]` データ
  - 空配列
  - 不完全なデータ
  - 必須フィールド未入力
- エッジケーステストデータ（3ケース）
  - バーチャージ発生
  - 売却立替なし
  - 50gバー分割のみ

**適用対象:** QAエンジニア、テスター

---

#### [test_cases.md](./test_cases.md)
詳細なテストケース定義

**内容:**
- 単体テスト（7ケース）
  - IngotDetail クラス
  - IngotTotal クラス
- バリデーションテスト（6ケース）
  - フロントエンド
  - バックエンド
- 統合テスト（4ケース）
  - 正常系フロー
  - 異常系フロー
- メールテンプレートテスト（2ケース）
- パフォーマンステスト（1ケース）

**適用対象:** QAエンジニア、開発者

---

#### [test_report.md](./test_report.md)
テスト実行レポート

**内容:**
- エグゼクティブサマリー
- テスト結果サマリー（20/20成功）
- 詳細テスト結果
- 問題点と対策
- 修正後の検証結果
- 推奨事項

**適用対象:** プロジェクトマネージャー、ステークホルダー

---

### 4. 修正内容

#### [FIXES_README.md](./FIXES_README.md)
修正内容の完全ガイド

**内容:**
- 問題の概要
- 根本原因
- 修正内容（3層防御）
  1. メールテンプレートの修正
  2. フロントエンドバリデーション強化
  3. バックエンドバリデーション追加
- テスト方法
- 影響範囲
- デプロイ手順
- 監視とアラート
- ロールバック手順
- 今後の改善案

**適用対象:** 開発者、運用チーム、デプロイ担当者

---

## 🗂️ ディレクトリ構造

```
docs/
├── README.md (このファイル)
├── refining_process_flow.md       # プロセスフロー
├── database_schema.md             # データベーススキーマ
├── test_data.md                   # テストデータ
├── test_cases.md                  # テストケース
├── test_report.md                 # テストレポート
├── FIXES_README.md                # 修正内容ガイド
└── VISUAL_SUMMARY.md              # ビジュアルサマリー

tests/
├── Feature/
│   └── RefiningInfoTest.php       # 統合テスト
└── Unit/
    └── RefiningEmailTemplateTest.php  # 単体テスト
```

## 🚀 クイックスタート

### 開発者向け
1. [FIXES_README.md](./FIXES_README.md) を読んで修正内容を理解
2. [test_cases.md](./test_cases.md) でテストケースを確認
3. コードを修正・テスト

### レビュアー向け
1. [VISUAL_SUMMARY.md](./VISUAL_SUMMARY.md) で全体像を把握
2. [FIXES_README.md](./FIXES_README.md) で修正内容を確認
3. [test_report.md](./test_report.md) でテスト結果を確認

### テスター向け
1. [test_data.md](./test_data.md) でテストデータを確認
2. [test_cases.md](./test_cases.md) でテストケースを実行
3. 結果を [test_report.md](./test_report.md) と比較

### 運用チーム向け
1. [FIXES_README.md](./FIXES_README.md) のデプロイ手順を確認
2. 監視とアラート設定
3. ログ監視開始

## 📊 修正の重要ポイント

### 3層防御システム

```
Layer 1: Frontend Validation (JavaScript)
  ↓ [null], [], 不正JSON をブロック
Layer 2: Backend Validation (Controller)
  ↓ サーバー側で再検証、不正データを拒否
Layer 3: Template Safety (Blade)
  ↓ null-safe な記述で安全に処理
Result: メール送信成功 ✅
```

### 主な変更ファイル

| ファイル | 変更内容 |
|---------|---------|
| `index.js` | フロントエンドバリデーション強化 |
| `RefiningInfoController.php` | バックエンドバリデーション追加 |
| `refining_info_plain_shop.blade.php` | null-safe 化 |
| `refining_info_plain_visitor.blade.php` | null-safe 化 |

## ✅ テスト結果

- **単体テスト**: 7/7 成功 ✅
- **バリデーションテスト**: 6/6 成功 ✅
- **統合テスト**: 4/4 成功 ✅
- **メールテンプレートテスト**: 2/2 成功 ✅
- **パフォーマンステスト**: 1/1 成功 ✅

**合計**: 20/20 成功 (100%) ✅

## 📞 サポート

質問や問題がある場合:
1. まず該当するドキュメントを確認
2. GitHubのIssueで質問
3. 開発チームに連絡

## 🔖 関連リソース

- [Laravel バリデーション公式ドキュメント](https://laravel.com/docs/8.x/validation)
- [Blade テンプレート公式ドキュメント](https://laravel.com/docs/8.x/blade)
- [Mermaid 図の書き方](https://mermaid-js.github.io/mermaid/)

---

**最終更新日**: 2025-12-29  
**バージョン**: 1.0  
**メンテナー**: Development Team
