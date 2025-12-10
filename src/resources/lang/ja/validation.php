<?php

return [
    'required' => ':attributeを入力してください',
    'email' => ':attributeはメール形式で入力してください',
    'min' => [
        'string' => ':attributeは:min文字以上で入力してください',
        'numeric' => ':attributeは:min以上で入力してください',
    ],
    'max' => [
        'string' => ':attributeは:max文字以内で入力してください',
    ],
    'confirmed' => ':attributeと一致しません',
    'mimes' => ':attributeは:valuesを指定してください',
    'integer' => ':attributeは数値で入力してください',
    'array' => ':attributeを正しく選択してください',
    'regex' => ':attributeの形式が正しくありません',

    'attributes' => [
        'name' => 'お名前',
        'email' => 'メールアドレス',
        'password' => 'パスワード',
        'password_confirmation' => '確認用パスワード',
        'body' => '商品コメント',
        'payment_method' => '支払い方法',
        'shipping_address' => '配送先',
        'postal_code' => '郵便番号',
        'address' => '住所',
        'profile_image' => 'プロフィール画像',
        'description' => '商品説明',
        'image' => '商品画像',
        'categories' => '商品のカテゴリー',
        'condition_id' => '商品の状態',
        'price' => '商品価格',
    ],
];


