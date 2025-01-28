@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/detail.css')}}">
@endsection

@section('content')
    <div class="product-container">
        <div class="product-container__top">
            <div class="product-container__top-img">
                <img src="{{ asset('storage/' . $product->image) }}">
                <form action="{{ route('products.update', ['productId' => $product->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="file" name="image" id="image" accept="image/png, image/jpeg" />
                    @if($errors->has('image'))
                        <p class="error-massage">{{ $errors->first('image') }}</p>
                    @endif
            </div>
            <div class="product-container__top-form">
                <label class="product-container__label" for="name">商品名</label>
                <input class="product-container__input" type="text" name="name" id="name" placeholder="{{ old('name', $product->name) }}">
                @if($errors->has('name'))
                    <p class="error-massage">{{ $errors->first('name') }}</p>
                @endif

                <label  class="product-container__label" for="price">値段</label>
                <input  class="product-container__input" type="number" name="price" id="price" placeholder="{{ old('price', $product->price) }}">
                @if($errors->has('price'))
                    <p class="error-massage">{{ $errors->first('price') }}</p>
                @endif

                <label  class="product-container__label" for="seasons">季節</label>
                <div class="product-container__seasons">
                    @foreach($seasons as $season)
                        <label>
                            <input type="checkbox" name="seasons[]" value="{{ $season->id }}"
                                @if($product->seasons->contains($season->id))
                                @endif>
                            {{ $season->name }}
                        </label><br>
                    @endforeach
                </div>
                @if($errors->has('seasons'))
                    <p class="error-massage">{{ $errors->first('seasons') }}</p>
                @endif
            </div>
        </div>

        <div class="product-container__description">
            <label  class="product-container__label" for="description">商品説明</label>
            <textarea  class="product-container__description-textarea" name="description" id="description" placeholder="{{ old('description', $product->description) }}" rows="3"></textarea>
            @if($errors->has('description'))
                <p class="error-massage">{{ $errors->first('description') }}</p>
            @endif
        </div>

        <div class="product-container__bottoms">
            <div></div>
            <div>
                <a class="product-container__bottom-back" href="{{ route('products') }}">戻る</a>
                <button  class="product-container__bottom-store" type="submit">変更を保存</button>
                </form>
            </div>
            <!-- ゴミ箱アイコンの削除ボタン -->
            <form action="{{ route('products.delete', ['productId' => $product->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" style="background: none; border: none; padding: 0; cursor: pointer;">
                    <img src="{{ asset('storage/images/trash-icon.png') }}" alt="削除" style="width: 30px; height: 30px;">
                </button>
            </form>
        </div>
    </div>
@endsection