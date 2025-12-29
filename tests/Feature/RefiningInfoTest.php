<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RefiningInfoTest extends TestCase
{
    /**
     * TC-I-001: 金インゴット申込フルフロー
     * 目的: 金インゴットの申込が正常に完了することを確認
     */
    public function test_can_submit_gold_ingot_application()
    {
        $response = $this->post('/refasta_public/refining_info', [
            'ingot_details' => json_encode([
                [
                    '_type' => '金',
                    '_is_gdb' => 'はい',
                    '_is_overseas_brand' => '',
                    '_gram' => '500',
                    '_splits_count_50g' => 4,
                    '_splits_count_100g' => 1,
                    '_immediate_split_count_100g' => 0,
                    '_splits_scrap_100g' => 0,
                    '_unit_price' => 177.272727,
                    '_fee_total_price' => 97350,
                    '_zei' => 1.1
                ]
            ]),
            'selected_sale_g' => '100',
            'saleRebuildingPricefee' => '850,000円',
            'deliveryservicefee' => '27,500円',
            'barchargefeefee' => '0円',
            'totalTransferAmountfee' => '-822,500円',
            'sale_advance_input' => 'はい',
            'service_selection' => '配送タイプ',
            'usage' => '初めて',
            'name' => 'テスト 太郎',
            'kana' => 'テスト タロウ',
            'phone_number' => '090-1234-5678',
            'email' => 'test@example.com',
            'contact_method' => 'メール',
            'user_yuubinn' => '100-0001',
            'user_todou' => '東京都',
            'user_sikutyouson' => '千代田区',
            'user_banti' => '千代田1-1-1',
            'user_building' => 'テストビル101',
            'is_applicant' => 'はい',
            'same_address' => 'はい',
            'content_inquiry' => 'テストデータ'
        ]);

        $response->assertStatus(302);
        $response->assertRedirect();
        $this->assertTrue(strpos($response->headers->get('Location'), '/refining_info/thanks') !== false);
    }

    /**
     * TC-I-002: スクラップ申込フルフロー
     * 目的: スクラップの申込が正常に完了することを確認
     */
    public function test_can_submit_scrap_application()
    {
        $response = $this->post('/refasta_public/refining_info', [
            'ingot_details' => json_encode([
                [
                    '_type' => 'スクラップ',
                    '_is_gdb' => 'はい',
                    '_is_overseas_brand' => '',
                    '_gram' => '150',
                    '_splits_count_50g' => 0,
                    '_splits_count_100g' => 0,
                    '_immediate_split_count_100g' => 0,
                    '_splits_scrap_100g' => 150,
                    '_unit_price' => 265.9090909090909,
                    '_fee_total_price' => 43898.5,
                    '_zei' => 1.1
                ]
            ]),
            'selected_sale_g' => '100',
            'saleRebuildingPricefee' => '850,000円',
            'deliveryservicefee' => '27,500円',
            'barchargefeefee' => '0円',
            'totalTransferAmountfee' => '-778,601円',
            'sale_advance_input' => 'はい',
            'service_selection' => '配送タイプ',
            'usage' => '初めて',
            'name' => '佐藤 次郎',
            'kana' => 'サトウ ジロウ',
            'phone_number' => '070-1111-2222',
            'email' => 'jiro@example.com',
            'contact_method' => 'メール',
            'user_yuubinn' => '160-0001',
            'user_todou' => '東京都',
            'user_sikutyouson' => '新宿区',
            'user_banti' => '新宿1-1-1',
            'user_building' => '新宿タワー501',
            'is_applicant' => 'はい',
            'same_address' => 'はい',
            'content_inquiry' => 'スクラップのテストです'
        ]);

        $response->assertStatus(302);
        $response->assertRedirect();
    }

    /**
     * TC-I-003: 複数インゴット申込フルフロー
     * 目的: 複数インゴットの申込が正常に完了することを確認
     */
    public function test_can_submit_multiple_ingots_application()
    {
        $response = $this->post('/refasta_public/refining_info', [
            'ingot_details' => json_encode([
                [
                    '_type' => '金',
                    '_is_gdb' => 'はい',
                    '_is_overseas_brand' => '',
                    '_gram' => '500',
                    '_splits_count_50g' => 4,
                    '_splits_count_100g' => 1,
                    '_immediate_split_count_100g' => 0,
                    '_splits_scrap_100g' => 0,
                    '_unit_price' => 177.272727,
                    '_fee_total_price' => 97350,
                    '_zei' => 1.1
                ],
                [
                    '_type' => 'プラチナ',
                    '_is_gdb' => 'はい',
                    '_is_overseas_brand' => '',
                    '_gram' => '1000',
                    '_splits_count_50g' => 0,
                    '_splits_count_100g' => 10,
                    '_immediate_split_count_100g' => 0,
                    '_splits_scrap_100g' => 0,
                    '_unit_price' => 280,
                    '_fee_total_price' => 308000,
                    '_zei' => 1.1
                ]
            ]),
            'selected_sale_g' => '100',
            'saleRebuildingPricefee' => '850,000円',
            'deliveryservicefee' => '44,000円',
            'barchargefeefee' => '0円',
            'totalTransferAmountfee' => '-400,650円',
            'sale_advance_input' => 'はい',
            'service_selection' => '配送タイプ',
            'usage' => '2回目以降',
            'name' => '高橋 健一',
            'kana' => 'タカハシ ケンイチ',
            'phone_number' => '080-5555-6666',
            'email' => 'kenichi@example.com',
            'contact_method' => '電話',
            'user_yuubinn' => '180-0001',
            'user_todou' => '東京都',
            'user_sikutyouson' => '武蔵野市',
            'user_banti' => '吉祥寺3-3-3',
            'user_building' => '吉祥寺マンション202',
            'is_applicant' => 'はい',
            'same_address' => 'はい',
            'content_inquiry' => '複数インゴットのテスト'
        ]);

        $response->assertStatus(302);
        $response->assertRedirect();
    }

    /**
     * TC-I-004: [null] ingot_details でのメール送信エラー
     * 目的: [null] の ingot_details でメール送信エラーが適切にハンドリングされることを確認
     */
    public function test_handles_null_ingot_details_gracefully()
    {
        $response = $this->post('/refasta_public/refining_info', [
            'ingot_details' => '[null]',
            'sale_advance_input' => 'いいえ',
            'service_selection' => '配送タイプ',
            'usage' => '初めて',
            'name' => 'エラー テスト',
            'kana' => 'エラー テスト',
            'phone_number' => '090-0000-0000',
            'email' => 'error@example.com',
            'contact_method' => 'メール',
            'user_yuubinn' => '000-0000',
            'user_todou' => '東京都',
            'user_sikutyouson' => 'テスト区',
            'user_banti' => 'テスト1-1-1',
            'user_building' => '',
            'is_applicant' => 'はい',
            'same_address' => 'はい',
            'content_inquiry' => ''
        ]);

        // サンクスページにリダイレクトされることを確認（エラーハンドリング成功）
        $response->assertStatus(302);
        $response->assertRedirect();
        $this->assertTrue(strpos($response->headers->get('Location'), '/refining_info/thanks') !== false);
    }

    /**
     * TC-V-006: ingot_details が空配列の場合
     * 目的: ingot_details が空配列の場合の処理を確認
     */
    public function test_handles_empty_ingot_details_array()
    {
        $response = $this->post('/refasta_public/refining_info', [
            'ingot_details' => '[]',
            'sale_advance_input' => 'いいえ',
            'service_selection' => '配送タイプ',
            'usage' => '初めて',
            'name' => '空配列 テスト',
            'kana' => 'カラハイレツ テスト',
            'phone_number' => '090-1111-1111',
            'email' => 'empty@example.com',
            'contact_method' => 'メール',
            'user_yuubinn' => '000-0001',
            'user_todou' => '東京都',
            'user_sikutyouson' => 'テスト区',
            'user_banti' => 'テスト2-2-2',
            'user_building' => '',
            'is_applicant' => 'はい',
            'same_address' => 'はい',
            'content_inquiry' => ''
        ]);

        $response->assertStatus(302);
        $response->assertRedirect();
    }

    /**
     * ハニーポット（スパム対策）のテスト
     */
    public function test_rejects_spam_with_honeypot()
    {
        $response = $this->post('/refasta_public/refining_info', [
            'hp_field' => 'spam',  // ハニーポットに値が入っている
            'ingot_details' => json_encode([
                [
                    '_type' => '金',
                    '_gram' => '500'
                ]
            ]),
            'name' => 'Spam Bot',
            'email' => 'spam@example.com',
            'is_applicant' => 'はい',
            'same_address' => 'はい'
        ]);

        // 403 Forbidden が返されることを確認
        $response->assertStatus(403);
    }
}
