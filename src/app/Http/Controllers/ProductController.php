<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Season;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index(){
        $products = Product::Paginate(6);
        return view('products', compact('products'));
    }

    public function search(Request $request){

        $query = Product::query();

        // キーワード検索を適用
        $query->keywordSearch($request->keyword)
                ->sortByPrice($request->sort);

        $products = $query->paginate(6);

        return view('products', compact('products'));

    }

    public function show($productId) {
        $product = Product::findOrFail($productId); // 指定されたIDの商品を取得
        $seasons = Season::all();
        return view('product_detail', compact('product', 'seasons'));
    }



    public function update(ProductRequest $request, $productId)
    {
        // 対象の商品を取得
        $product = Product::findOrFail($productId);

        // データを更新
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');

        // 新しい画像がアップロードされた場合
        if ($request->hasFile('image')) {
            // 古い画像を削除
            if ($product->image) {
                \Storage::delete('public/' . $product->image);
            }

            // 新しい画像を保存
            $imagePath = $request->file('image')->store('images', 'public');
            $product->image = $imagePath;
        } elseif ($request->filled('current_image')) {
            // 新しい画像がない場合は既存の画像を保持
            $product->image = $request->input('current_image');
        }

        // 季節の更新
        if ($request->has('season_id')) {
            // 季節を選択している場合、選ばれた季節を更新
            $product->seasons()->sync($request->input('season_id', []));
        }

        // データを保存
        $product->save();

        // 更新完了後、商品一覧画面にリダイレクト
        return redirect()->route('products');
    }


}
