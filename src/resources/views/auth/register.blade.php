@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 480px;">
  <h1 class="mb-4">会員登録</h1>

  {{-- バリデーションエラー（全体） --}}
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form method="POST" action="{{ route('register') }}">
    @csrf

    {{-- 名前 --}}
    <div class="mb-3">
      <label for="name" class="form-label">名前</label>
      <input type="text" id="name" name="name"
             value="{{ old('name') }}"
             class="form-control @error('name') is-invalid @enderror">
      {{-- お名前を入力してください --}}
      @error('name')
        <p style="color:red;">{{ $message }}</p>
      @enderror
    </div>

    {{-- メールアドレス --}}
    <div class="mb-3">
      <label for="email" class="form-label">メールアドレス</label>
      <input type="email" id="email" name="email"
             value="{{ old('email') }}"
             class="form-control @error('email') is-invalid @enderror">
      {{-- メールアドレスを入力してください --}}
      @error('email')
        <p style="color:red;">{{ $message }}</p>
      @enderror
    </div>

    {{-- パスワード --}}
    <div class="mb-3">
      <label for="password" class="form-label">パスワード</label>
      <input type="password" id="password" name="password"
             class="form-control @error('password') is-invalid @enderror">
      {{-- パスワードを入力してください --}}
      @error('password')
        <p style="color:red;">{{ $message }}</p>
      @enderror
    </div>

    {{-- パスワード確認 --}}
    <div class="mb-3">
      <label for="password_confirmation" class="form-label">パスワード確認</label>
      <input type="password" id="password_confirmation" name="password_confirmation"
             class="form-control">
    </div>

    {{-- 「ログインはこちら」リンクを追加（route('login')） --}}
    <p class="text-center mt-3">
      <a href="{{ route('login') }}">ログインはこちら</a>
    </p>

    {{-- 「次に進む」に変更 --}}
    <button type="submit" class="btn btn-primary w-100">次に進む</button>
  </form>
</div>
@endsection

