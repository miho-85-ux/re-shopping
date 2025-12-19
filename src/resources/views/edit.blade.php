@extends('layout.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/edit.css') }}" >
@endsection

@section('content')
<div class="edit-content">
    <form action="/update" method="POST">
        @method('PATCH')
        @csrf
        <input type="hidden" name="key" value="{{ $item->id }}">
        <table class="edit-table">
            <tr>
                <th>商品名</th>
                <td><input type="name" name="name" value="{{ old('name', $item->name) }}"></td>
            </tr>
            <tr>
                <th>個数</th>
                <td><input type="text" name="quantity" value="{{ old('quantity', $item->quantity) }}"></td>
            </tr>
        </table>
        <div class="submit">
            <button class="edit-submit"  type="submit">登録</button>
            <a class="edit-submit__back" href="/">戻る</a>
        </div>
    </form>
    
</div>
@endsection