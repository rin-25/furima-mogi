@extends('layouts.app')

@section('title', 'マイリスト')

@section('content')
@auth
    @if($products->count() > 0)
        <div class="product-grid">
            @foreach($products as $product)
                <a href="#" class="product-card">
                    <div class="product-image">
                        @if($product->image_path)
                            <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" onerror="this.style.display='none';">
                        @endif
                        @if($product->is_sold)
                            <span class="sold-badge">Sold</span>
                        @endif
                    </div>
                    <div class="product-name">{{ $product->name }}</div>
                </a>
            @endforeach
        </div>
    @else
        <div class="empty-message">
            @if(request('search'))
                検索条件に一致する商品が見つかりませんでした。
            @else
                いいねした商品がありません。
            @endif
        </div>
    @endif
@else
    <div class="empty-message">
        ログインすると、いいねした商品が表示されます。
    </div>
@endauth
@endsection

