<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>登録画面</title>
<link type="text/css" rel="stylesheet" href="/css/style.css">
</head>
<body>

<!-- エラー出力 -->
@if ($errors->any())
    <ul class="error-box">
        @foreach ($errors->all() as $_error)
            <li>{{ $_error }}</li>
        @endforeach
    </ul>
@endif

<form method="post">
{{ csrf_field() }}

<ul>
    <li>
        <label>名前</label>
        <input type="text" name="name" value="{{ old('name', $user->name) }}">
    </li>
    <li>
        <label>メールアドレス</label>
        <input type="text" name="email" value="{{ old('email', $user->email) }}">
    </li>
    <li>
        <label>パスワード</label>
        <input type="password" name="password"> （4〜30文字）
    </li>
    <li>
        <label>パスワード（確認用)</label>
        <input type="password" name="password_confirmation">
    </li>
</ul>

<input type="submit" value="確認画面へ">
</form>

</body>
</html>
