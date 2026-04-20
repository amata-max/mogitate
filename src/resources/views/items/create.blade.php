@extends('layouts.app')

@section('content')

<div class="container">
    <h1>商品登録</h1>

    <form method="POST" action="/items" enctype="multipart/form-data">
    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/items" enctype="multipart/form-data">
        @csrf

        <input type="text" name="name" placeholder="商品名" value="{{ old('name') }}">

        <input type="number" name="price" placeholder="価格" value="{{ old('price') }}">

        <textarea name="description" placeholder="説明">{{ old('description') }}</textarea>

        <input type="file" name="image">

        <button class="btn btn-success">登録</button>
    </form>
</div>

@endsection