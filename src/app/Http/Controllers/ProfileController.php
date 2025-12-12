<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;

class ProfileController extends Controller
{
    /**
     * プロフィール設定画面の表示
     */
    public function edit()
    {
        return view('auth.profile');
    }

    /**
     * プロフィール更新（バリデーションのみ仮実装）
     */
    public function update(ProfileRequest $request)
    {
        // 今はバリデーションのみ。実装時に保存処理を追加してください。
        $request->validated();

        return back();
    }
}


