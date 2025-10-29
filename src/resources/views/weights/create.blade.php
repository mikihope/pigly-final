@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 600px;">
  <h1 class="mb-4">データ登録</h1>

  {{-- TODO Q1: 全体のバリデーションエラーを表示する --}}
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach ($errors->all() as $error) {{-- ← $errors->all()
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form method="POST" action="{{ route('weight_store') }}">
    @csrf

        {{-- 日付 --}}
    <div class="mb-3">
      <label for="date" class="form-label">日付</label>
      <input
        type="date"
        id="date"
        name="date"
        value="{{ old('date', date('Y-m-d')) }}"
        class="form-control @error('date') is-invalid @enderror">
      @error('date')
        <p style="color:red;">{{ $message }}</p>
      @enderror
    </div>

    {{-- 体重 --}}
    <div class="mb-3">
      <label for="weight" class="form-label">体重</label>
      <input
        type="number"
        id="weight"
        name="weight"
        step="0.1"
        value="{{ old('weight') }}"
        class="form-control @error('weight') is-invalid @enderror">
      @error('weight')
        <p style="color:red;">{{ $message }}</p>
      @enderror
    </div>

    {{-- 摂取カロリー --}}
    <div class="mb-3">
      <label for="calorie" class="form-label">摂取カロリー</label>
      <input
        type="number"
        id="calorie"
        name="calorie"
        value="{{ old('calorie') }}"
        class="form-control @error('calorie') is-invalid @enderror">
      @error('calorie')
        <p style="color:red;">{{ $message }}</p>
      @enderror
    </div>

    {{-- 運動時間 --}}
    <div class="mb-3">
      <label for="exercise_time" class="form-label">運動時間</label>
      <input
        type="time"
        id="exercise_time"
        name="exercise_time"
        value="{{ old('exercise_time') }}"
        class="form-control @error('exercise_time') is-invalid @enderror">
      @error('exercise_time')
        <p style="color:red;">{{ $message }}</p>
      @enderror
    </div>

    {{-- 運動内容 --}}
    <div class="mb-3">
      <label for="exercise_content" class="form-label">運動内容</label>
      <textarea
        id="exercise_content"
        name="exercise_content"
        rows="3"
        maxlength="120"
        class="form-control @error('exercise_content') is-invalid @enderror">{{ old('exercise_content') }}</textarea>
      @error('exercise_content')
        <p style="color:red;">{{ $message }}</p>
      @enderror
    </div>

    <div class="d-flex justify-content-between">
      <a href="{{ route('weights.index') }}" class="btn btn-secondary">戻る</a>
      <button type="submit" class="btn btn-primary">登録</button>
    </div>
  </form>
</div>
@endsection

