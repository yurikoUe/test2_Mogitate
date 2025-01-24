@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/products.css')}}">
@endsection

@section('header')
    <h1>{{ request('keyword') ? '"' . request('keyword') . '"の商品一覧' : '商品一覧' }}</h1>
    <a href="{{ route('products.register') }}">＋商品を追加</a>
@endsection

@section('aside')

    <!-- キーワード検索 -->
    <form action="/products/search" method="GET">
        <input type="text" name="keyword" placeholder="商品名で検索" value="{{request('keyword')}}">
        <!-- 並び替えメニュー -->
        <select name="sort">
            <option value="">価格で並び替え</option>
            <option value="high" {{ request('sort') === 'high' ? 'selected' : '' }}>高い順</option>
            <option value="low" {{ request('sort') === 'low' ? 'selected' : '' }}>低い順</option>
        </select>
        <button type="submit">検索</button>
    </form>

    <!-- 並び替え条件のタグ表示 -->
    @if(request('sort'))
        <div class="sort-tag">
            <span>並び替え: {{ request('sort') === 'high' ? '高い順' : '低い順' }}</span>
            <a href="{{ route('products.search', array_merge(request()->except('sort'))) }}" class="reset-sort">×</a>
        </div>
    @endif
@endsection

@section('content')
    @foreach ($products as $product)
        <div>
            <a  href="{{ route('products.show', ['productId' => $product->id]) }}">
                <div>
                    <img src="{{ asset('storage/' . $product->image) }}" alt="$product->name">
                    <!-- <img src="{{ asset('storage/images/kiwi.png') }}" alt="Kiwi"> -->
                    <div>
                        <h2>{{ $product->name }}</h2>
                        <p>{{ $product->price }}</p>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
    <!-- ページネーション -->
    <div class="pagination-container">
        {{ $products->links() }}
    </div>
@endsection
