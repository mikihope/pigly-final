@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 480px;">
  <h1 class="mb-4">ログイン</h1>

  {{-- 全体のエラーメッセージ表示 --}}
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form method="POST" action="{{ route('login') }}">
    @csrf

    {{-- メールアドレス --}}
    <div class="mb-3">
      <label for="email" class="form-label">メールアドレス</label>
      <input type="email" id="email" name="email"
             value="{{ old('email') }}"
             class="form-control @error('email') is-invalid @enderror">
      @error('email')
        <p style="color:red;">{{ $message }}</p>
      @enderror
    </div>

    {{-- パスワード --}}
    <div class="mb-3">
      <label for="password" class="form-label">パスワード</label>
      <input type="password" id="password" name="password"
             class="form-control @error('password') is-invalid @enderror">
      @error('password')
        <p style="color:red;">{{ $message }}</p>
      @enderror
    </div>

    {{-- 会員登録リンク --}}
    <p class="text-center mt-3">
      <a href="{{ route('register') }}">会員登録はこちら</a>
    </p>

    {{-- ログインボタン --}}
    <button type="submit" class="btn btn-primary w-100">ログイン</button>
  </form>
</div>
@endsection

