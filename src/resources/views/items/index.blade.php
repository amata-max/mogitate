@extends('layouts.app')

@section('content')

<div class="container">

    <h1>商品一覧</h1>

    <div class="layout">

        <div class="sidebar">
            <form method="GET" action="/items">
                <input type="text" name="keyword" placeholder="商品検索">
                <button>検索</button>
            </form>
        </div>

        <div class="grid">
            @foreach($items as $item)
                <div class="card">
                    <img src="{{ asset('storage/'.$item->image) }}">
                    <div class="card-body">
                        <div class="name">{{ $item->name }}</div>
                        <div class="price">¥{{ $item->price }}</div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>

@endsection