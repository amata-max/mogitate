@extends('layouts.app')

@section('content')

<div class="container">
    <h1>商品編集</h1>

    <!-- エラー表示 -->
    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/items/{{ $item->id }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <input type="text" name="name" value="{{ old('name', $item->name) }}">

        <input type="number" name="price" value="{{ old('price', $item->price) }}">

        <textarea name="description">{{ old('description', $item->description) }}</textarea>

        <!-- 現在の画像 -->
        @if($item->image)
            <img src="{{ asset('storage/'.$item->image) }}" style="width:200px;">
        @endif

        <!-- 新しい画像 -->
        <input type="file" name="image" onchange="previewImage(event)">

        <!-- プレビュー -->
        <img id="preview" style="width:200px; display:none;">

        <button class="btn btn-primary">更新</button>
    </form>
</div>

<script>
function previewImage(event) {
    const img = document.getElementById('preview');
    img.src = URL.createObjectURL(event.target.files[0]);
    img.style.display = 'block';
}
</script>

@endsection