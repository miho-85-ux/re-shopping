@extends('layout.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" >
@endsection

@section('content')
<div class="Shopping-content">
    <div class="content">
        <form class="content-top" action="/store" method="POST">
            @csrf 
            <div >
                <label class="content-title" for="name">お買い物リスト</label>
                <div>
                    <input type="text" name="name" id="name" >
                </div>
            </div>
            <div>
                <label class="content-title"  for="quantity">個数</label>
                <div>
                    <select name="quantity" id="quantity" >
                        <option value="" selected disablde>選択してください</option>
                        @foreach(range(1, 10) as $quantity)
                        <option value = "{{ $quantity }}">{{ $quantity }}個</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div>
                <button class="content-submit" type="submit">登録</button>
            </div>
        </form>
    </div>
    <div class="content">
        <form class="content-top" action="/search" method="GET">
            <div>
                <label class="content-title" for="name">検索</label>
                <div>
                    <input type="text" name="name" id="name" value="{{ request('name') }}">
                </div>
            </div>
            <div>
                <label class="content-title" for="quantity">個数</label>
                <div>
                    <select name="quantity" id="quantity">
                        <option value="" selected disablde>選択してください</option>
                        @foreach(range(1, 10) as $quantity)
                            <option value = "{{ $quantity }}" {{request('quantity') == $quantity ? 'selected' : '' }}>
                                {{ $quantity }}個
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div>
                <button class="content-submit" type="submit">検索</button>
            </div>
        </form>
    </div>

    <div class="shopping-table">
        <table class="table">
            <tr>
                <th class="table-item__title">お買い物リスト</th>
                <th class="table-item__title">個数</th>
                <th></th>
                <th></th>
            </tr>
            @foreach ($items as $item)
            <tr>
                <form action="/edit" method="POST">
                    @method('PATCH')
                    @csrf 
                    <input type="hidden" name="key" value="{{ $item->id }}">   
                    <td>{{ $item -> name }}</td>
                    <td>{{ $item -> quantity }}個</td>
                    <td class="table-item__submit"><button class="table-item__submit-edit" type="submit">編集</button></td>
                </form>
                <form action="/destroy" method="POST">
                    @method('DELETE')
                    @csrf 
                    <input type="hidden" name="key" value="{{ $item->id }}" >
                    <td>
                        <button class="table-item__submit-delete" type="submit">削除</button>
                    </td>
                </form>
            </tr>
            @endforeach
        </table>
    </div>
</div>

@endsection