@extends('layouts.app')

@section('content')
<h1>検索結果</h1>

@foreach ($items as $item)
    <div>
        <h2>{{ $item->name }}</h2>
        <p>{{ $item->price }}円</p>
    </div>
@endforeach

<a href="{{ route('items.index') }}">戻る</a>
@endsection