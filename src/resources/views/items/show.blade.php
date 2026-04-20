@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card">

        @if($item->image)
            <img src="{{ asset('storage/'.$item->image) }}">
        @endif

        <h2>{{ $item->name }}</h2>
        <p class="price">¥{{ $item->price }}</p>
        <p>{{ $item->description }}</p>

        <a href="/items/{{ $item->id }}/edit" class="btn btn-success">編集</a>

        <!-- 削除 -->
        <form method="POST" action="/items/{{ $item->id }}" 
              onsubmit="return confirm('本当に削除しますか？');">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">削除</button>
        </form>

    </div>
</div>

@endsection