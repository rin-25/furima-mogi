<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * 商品一覧画面（おすすめタブ）
     */
    public function index(Request $request)
    {
        $query = Product::query()
            ->with(['seller', 'purchase']);

        // ログイン中の場合、自分が出品した商品を除外
        if (Auth::check()) {
            $query->where('seller_id', '!=', Auth::id());
        }

        // 検索機能（商品名で部分一致）
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', "%{$search}%");
        }

        $products = $query->latest()->paginate(12);

        // 購入済み商品にSoldフラグを付与
        foreach ($products as $product) {
            $product->is_sold = $product->purchase !== null;
        }

        return view('products.index', [
            'products' => $products,
            'search' => $request->input('search', ''),
            'activeTab' => 'recommended',
        ]);
    }

    /**
     * マイリスト画面
     */
    public function mylist(Request $request)
    {
        // 未認証の場合は空の結果を返す
        if (!Auth::check()) {
            return view('products.mylist', [
                'products' => collect([]),
                'search' => $request->input('search', ''),
                'activeTab' => 'mylist',
            ]);
        }

        $query = Product::query()
            ->with(['seller', 'purchase'])
            ->whereHas('likes', function ($q) {
                $q->where('user_id', Auth::id());
            });

        // 検索機能（商品名で部分一致）
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', "%{$search}%");
        }

        $products = $query->latest()->paginate(12);

        // 購入済み商品にSoldフラグを付与
        foreach ($products as $product) {
            $product->is_sold = $product->purchase !== null;
        }

        return view('products.mylist', [
            'products' => $products,
            'search' => $request->input('search', ''),
            'activeTab' => 'mylist',
        ]);
    }
}

