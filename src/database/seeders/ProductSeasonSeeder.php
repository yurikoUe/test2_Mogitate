<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 画像を格納するパス（storage/app/public/images）
        $imagePath1 = 'images/kiwi.png';  // キウイの画像
        $imagePath2 = 'images/strawberry.png';
        $imagePath3 = 'images/orange.png';
        $imagePath4 = 'images/watermelon.png';
        $imagePath5 = 'images/peach.png';
        $imagePath6 = 'images/muscat.png';
        $imagePath7 = 'images/pineapple.png';
        $imagePath8 = 'images/grapes.png';
        $imagePath9 = 'images/banana.png';
        $imagePath10 = 'images/melon.png';


        // products テーブルに製品データを挿入
        // （中間テーブルにIDを渡す必要があるためinsertGetIdを使用）
        $product1Id = DB::table('products')->insertGetId([
            'name' => 'キウイ',
            'price' => 800,
            'image' => $imagePath1,
            'description' => 'キウイは甘みと酸味のバランスが絶妙なフルーツです。ビタミンCなどの栄養素も豊富のため、美肌効果や疲労回復効果も期待できます。もぎたてフルーツのスムージーをお召し上がりください！',
        ]);
        $product2Id = DB::table('products')->insertGetId([
            'name' => 'ストロベリー',
            'price' => 1200,
            'image' => $imagePath2,
            'description' => '大人から子供まで大人気のストロベリー。当店では鮮度抜群の完熟いちごを使用しています。ビタミンCはもちろん食物繊維も豊富なため、腸内環境の改善も期待できます。もぎたてフルーツのスムージをお召し上がりください！',
        ]);
        $product3Id = DB::table('products')->insertGetId([
            'name' => 'オレンジ',
            'price' => 850,
            'image' => $imagePath3,
            'description' => '当店では酸味と甘みのバンランスが抜群のネーブルオレンジを使用しています。酸味は控えめで、甘さと濃厚な果汁が魅力の商品です。もぎたてフルーツのスムージをお召し上がりください！'
        ]);
        $product4Id = DB::table('products')->insertGetId([
            'name' => 'スイカ',
            'price' => 700,
            'image' => $imagePath4,
            'description' => '甘くてシャリシャリ食感が魅力のスイカ。全体の90％が水分のため、暑い日の水分補給や熱中症予防、カロリーが気になる方にもおすすめの商品です。もぎたてフルーツのスムージーをお召し上がりください！'
        ]);
        $product5Id = DB::table('products')->insertGetId([
            'name' => 'ピーチ',
            'price' => 1000,
            'image' => $imagePath5,
            'description' => '豊潤な香りととろけるような甘さが魅力のピーチ。美味しさはもちろん見た目の可愛さも抜群の商品です。ビタミンEが豊富なため、生活習慣病の予防にもおすすめです。もぎたてフルーツのスムージーをお召し上がりください！'
        ]);
        $product6Id = DB::table('products')->insertGetId([
            'name' => 'シャインマスカット',
            'price' => 1400,
            'image' => $imagePath6,
            'description' => '爽やかな香りと上品な甘みが特長的なシャインマスカットは大人から子どもまで大人気のフルーツです。疲れた脳や体のエネルギー補給にも最適の商品です。もぎたてフルーツのスムージーをお召し上がりください！'
        ]);
        $product7Id = DB::table('products')->insertGetId([
            'name' => 'パイナップル',
            'price' => 800,
            'image' => $imagePath7,
            'description' => '甘酸っぱさとトロピカルな香りが特徴のパイナップル。当店では甘さと酸味のバランスが絶妙な国産のパイナップルを使用しています。もぎたてフルーツのスムージをお召し上がりください！'
        ]);
        $product8Id = DB::table('products')->insertGetId([
            'name' => 'ブドウ',
            'price' => 1100,
            'image' => $imagePath8,
            'description' => 'ブドウの中でも人気の高い国産の「巨峰」を使用しています。高い糖度と適度な酸味が魅力で、鮮やかなパープルで見た目も可愛い商品です。もぎたてフルーツのスムージーをお召し上がりください！'
        ]);
        $product9Id = DB::table('products')->insertGetId([
            'name' => 'バナナ',
            'price' => 600,
            'image' => $imagePath9,
            'description' => '低カロリーでありながら栄養満点のため、ダイエット中の方にもおすすめの商品です。1杯でバナナの濃厚な甘みを存分に堪能できます。もぎたてフルーツのスムージーをお召し上がりください！'
        ]);
        $product10Id = DB::table('products')->insertGetId([
            'name' => 'メロン',
            'price' => 900,
            'image' => $imagePath10,
            'description' => '香りがよくジューシーで品のある甘さが人気のメロンスムージー。カリウムが多く含まれているためむくみ解消効果も抜群です。もぎたてフルーツのスムージーをお召し上がりください！'
        ]);

        // seasons テーブルに季節データを挿入
        $spring = DB::table('seasons')->insertGetId(['name' => '春']);
        $summer = DB::table('seasons')->insertGetId(['name' => '夏']);
        $autumn = DB::table('seasons')->insertGetId(['name' => '秋']);
        $winter = DB::table('seasons')->insertGetId(['name' => '冬']);

        // 中間テーブル product_season に関連を挿入
        DB::table('product_season')->insert([
            ['product_id' => $product1Id, 'season_id' => $autumn],
            ['product_id' => $product1Id, 'season_id' => $winter],
            ['product_id' => $product2Id, 'season_id' => $spring],
            ['product_id' => $product3Id, 'season_id' => $winter],
            ['product_id' => $product4Id, 'season_id' => $summer],
            ['product_id' => $product5Id, 'season_id' => $summer],
            ['product_id' => $product6Id, 'season_id' => $summer],
            ['product_id' => $product6Id, 'season_id' => $autumn],
            ['product_id' => $product7Id, 'season_id' => $spring],
            ['product_id' => $product7Id, 'season_id' => $summer],
            ['product_id' => $product8Id, 'season_id' => $summer],
            ['product_id' => $product8Id, 'season_id' => $autumn],
            ['product_id' => $product9Id, 'season_id' => $summer],
            ['product_id' => $product10Id, 'season_id' => $spring],
            ['product_id' => $product10Id, 'season_id' => $summer],
        ]);

    }
}
