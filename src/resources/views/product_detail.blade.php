@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/products.css')}}">
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
    <form action="{{ route('products.update', ['productId' => $product->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <div>
                <!-- 画像 -->
                <img src="{{ asset('storage/' . $product->image) }}">
                <input type="file" name="image" id="image" accept="image/png, image/jpeg" />
                @if($errors->has('image'))
                    <p>{{ $errors->first('image') }}</p>
                @endif
                <input type="hidden" name="current_image" value="{{ $product->image }}">
            </div>
            <div>
                <div>
                    <label for="name">商品名</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}">
                    @if($errors->has('name'))
                        <p>{{ $errors->first('name') }}</p>
                    @endif
                </div>
                <div>
                    <label for="price">値段</label>
                    <input type="number" name="price" id="price" value="{{ old('price', $product->price) }}">
                    @if($errors->has('price'))
                        <p>{{ $errors->first('price') }}</p>
                    @endif
                </div>
                <div>
                    <label for="seasons">季節</label>
                    <div>
                        @foreach($seasons as $season)
                            <label>
                                <input type="checkbox" name="seasons[]" value="{{ $season->id }}"
                                    @if($product->seasons->contains($season->id)) checked @endif>
                                {{ $season->name }}
                            </label><br>
                        @endforeach
                    </div>
                    @if($errors->has('seasons'))
                        <p>{{ $errors->first('seasons') }}</p>
                    @endif
                </div>
            </div>
            <div>
                <div>
                    <label for="description">商品説明</label>
                    <textarea name="description" id="description">{{ old('description', $product->description) }}</textarea>
                    @if($errors->has('description'))
                        <p>{{ $errors->first('description') }}</p>
                    @endif
                </div>
            </div>

        </div>
        <div>
            <a href="{{ route('products') }}">戻る</a>
            <button type="submit">変更を保存</button>
        </div>
    </form>
    
    <!-- ゴミ箱アイコンの削除ボタン -->
    <form action="{{ route('products.delete', ['productId' => $product->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" style="background: none; border: none; padding: 0; cursor: pointer;">
                    <img src="{{ asset('storage/images/trash-icon.png') }}" alt="削除" style="width: 24px; height: 24px;">
                </button>
            </form>
@endsection