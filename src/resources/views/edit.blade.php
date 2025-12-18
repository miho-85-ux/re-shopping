@extends('layout.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/edit.css') }}" >
@endsection

@section('content')
<div>
    <form action="/update" method="POST">
        @method('PATCH')
        @csrf
        <input type="hidden" name="key" value="{{ $item->id }}">
        <table>
            <tr>
                <th>商品名</th>
                <th><input type="name" name="name" value="{{ old('name', $item->name) }}"></th>
            </tr>
            <tr>
                <th>個数</th>
                <th><input type="text" name="quantity" value="{{ old('quantity', $item->quantity) }}"></th>
            </tr>
        </table>
        <div>
            <button type="submit">登録</button>
            <a href="/">戻る</a>
        </div>
    </form>
    
</div>
@endsection