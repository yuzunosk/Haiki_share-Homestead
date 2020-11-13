<?php

namespace Tests\Unit;

use App\Models\Product;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        // レコード新規作成
        $Product = new \App\Models\Product;

        //このルートに接続
        $res = $this->get(route('store.product.new'));;

        // 接続できたか確認
        $res->assertOk();

        //表示したページに以下が表示されているかどうか？
        $res->assertSee('新規商品登録');
        $res->assertSee('商品名');
        $res->assertSee('カテゴリー');
        $res->assertSee('値段');
        $res->assertSee('賞味期限');
        $res->assertSee('新規登録');

        //テスト用データ
        $Product->name     = "試験パン";
        $Product->category = "パン";
        $Product->price    = 170;
        $Product->sellby   = date('Y/m/d');
        $Product->pic      = null;
        $Product->store_id = 1;
        $Product->save();

        // SELECT
        $readUser = Product::where('name', '試験パン')->first();
        $this->assertNotNull($readUser); // データが取得できたかテスト

        // テストレコード削除
        Product::where('name', '試験パン')->delete();
    }
}
