<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mogitate</title>
    <link rel="stylesheet" href="{{asset('css/sanitize.css')}}">
    <link rel="stylesheet" href="{{asset('css/register.css')}}">
</head>
<body>
    <header class="header__logo">
        <a href="{{ route('products') }}">
            <img src="{{ asset('storage/images/mogitate.png') }}" alt="もぎたてロゴ">
        </a>
    </header>
    <header>
        <h1 class="header__title">商品登録</h1>
    </header>

    <main class="main">
        <form
            class="form"
            action="{{ route('products.store') }}"
            method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="form__group">
                <label f class="form__label" or="name">商品名<strong class="form__required">必須</strong></label>
                <input type="text" name="name" id="name" value="{{ old('name') }}">
                @if($errors->has('name'))
                    <p class="form__error">{{ $errors->first('name') }}</p>
                @endif
            </div>
            <div class="form__group">
                <label  class="form__label" for="price">値段<strong class="form__required">必須</strong></label>
                <input type="number" name="price" id="price" value="{{ old('price') }}">
                @if($errors->has('price'))
                    <p class="form__error">{{ $errors->first('price') }}</p>
                @endif
            </div>
            <div class="form__group">
                <label  class="form__label" for="image">商品画像<strong class="form__required">必須</strong></label>
                <input type="file" name="image" id="image">
                @if($errors->has('image'))
                    <p class="form__error">{{ $errors->first('image') }}</p>
                @endif
            </div>
            <div class="form__group form__group-seasons">
                <label  class="form__label form__label-seasons" for="seasons">季節
                    <strong class="form__required">必須</strong>
                    <p class="form__note">複数選択可</p>
                </label>
                <div class="form__checkbox-group">
                    @foreach($seasons as $season)
                        <label class="form__checkbox-label">
                            <input type="checkbox"  class="form__checkbox" name="seasons[]" value="{{ $season->id }}"
                                @if(in_array($season->id, old('seasons', []))) checked @endif>
                            {{ $season->name }}
                        </label><br>
                    @endforeach
                </div>
                @if($errors->has('seasons'))
                    <p class="form__error">{{ $errors->first('seasons') }}</p>
                @endif
            </div>
            <div class="form__group">
                <label  class="form__label" for="description">商品説明<strong class="form__required">必須</strong></label>
                <textarea name="description" id="description" rows="3">{{ old('description') }}</textarea>
                @if($errors->has('description'))
                    <p class="form__error">{{ $errors->first('description') }}</p>
                @endif
            </div>
            <div class="form__actions">
                <a href="{{ route('products') }}" class="form__back-link">戻る</a>
                <button type="submit" class="form__submit-button">登録</button>
            </div>
        </form>
    </main>