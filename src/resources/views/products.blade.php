@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/products.css')}}">
@endsection

@section('header')
    <h1>{{ request('keyword') ? '"' . request('keyword') . '"の商品一覧' : '商品一覧' }}</h1>
    <a href="{{ route('products.register') }}" class="header__title-btn">＋商品を追加</a>
@endsection

@section('aside')
    <div class="form__content">
        <!-- キーワード検索 -->
        <form action="/products/search" method="GET">
            <input class="form__input" type="text" name="keyword" placeholder="商品名で検索" value="{{request('keyword')}}">
            <button class="form__btn" type="submit">検索</button>
            <!-- 並び替えメニュー -->
            <p class="form__sort-label">価格順で表示</p>
            <select class="form__sort-select" name="sort" onchange="this.form.submit()">
                <option value="">価格で並び替え</option>
                <option value="high" {{ request('sort') === 'high' ? 'selected' : '' }}>高い順</option>
                <option value="low" {{ request('sort') === 'low' ? 'selected' : '' }}>低い順</option>
            </select>
        </form>

        <!-- 並び替え条件のタグ表示 -->
        @if(request('sort'))
            <div class="sort-tag">
                <span>{{ request('sort') === 'high' ? '高い順に表示' : '低い順に表示' }}</span>
                <a href="{{ route('products.search', array_merge(request()->except('sort'))) }}" class="reset-sort">×</a>
            </div>
        @endif
    </div>
@endsection

@section('content')
    <div class="product-container">
        @foreach ($products as $product)
            <div class="product-card">
                <a  href="{{ route('products.show', ['productId' => $product->id]) }}">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="$product->name">
                    <div class="product-card__footer">
                        <h2>{{ $product->name }}</h2>
                        <p>¥{{ $product->price }}</p>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
    <!-- ページネーション -->
    <div class="pagination-container">
        {{ $products->links() }}
    </div>
@endsection
