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
    <header>
        <h1>商品登録</h1>
    </header>

    <main>
        <form
            action="{{ route('products.store') }}"
            method="POST"
            enctype="multipart/form-data">
            @csrf
            <div>
                <label for="name">商品名<strong>必須</strong></label>
                <input type="text" name="name" id="name" value="{{ old('name') }}">
                @if($errors->has('name'))
                    <p>{{ $errors->first('name') }}</p>
                @endif
            </div>
            <div>
                <label for="price">値段<strong>必須</strong></label>
                <input type="number" name="price" id="price" value="{{ old('price') }}">
                @if($errors->has('price'))
                    <p>{{ $errors->first('price') }}</p>
                @endif
            </div>
            <div>
                <label for="image">商品画像<strong>必須</strong></label>
                <input type="file" name="image" id="image">
                @if($errors->has('image'))
                    <p>{{ $errors->first('image') }}</p>
                @endif
            </div>
            <div>
                <label for="seasons">季節
                    <strong>必須</strong>
                    <p>複数選択可</p>
                </label>
                <div>
                    @foreach($seasons as $season)
                        <label>
                            <input type="checkbox" name="seasons[]" value="{{ $season->id }}"
                                @if(in_array($season->id, old('seasons', []))) checked @endif>
                            {{ $season->name }}
                        </label><br>
                    @endforeach
                </div>
                @if($errors->has('seasons'))
                    <p>{{ $errors->first('seasons') }}</p>
                @endif
            </div>
            <div>
                <label for="description">商品説明<strong>必須</strong></label>
                <textarea name="description" id="description">{{ old('description') }}</textarea>
                @if($errors->has('description'))
                    <p>{{ $errors->first('description') }}</p>
                @endif
            </div>
            <div>
                <a href="{{ route('products') }}">戻る</a>
                <button type="submit">登録</button>
            </div>
        </form>
    </main>