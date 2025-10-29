@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 500px;">
  <h1 class="mb-4">目標体重の変更</h1>

  {{-- 全体エラー表示 --}}
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form method="POST" action="{{ route('targets.update') }}">
    @csrf
    @method('PUT')

    {{-- 目標体重 --}}
    <div class="mb-3">
      <label for="target_weight" class="form-label">目標体重（kg）</label>
      <input type="text" id="target_weight" name="target_weight"
             value="{{ old('target_weight', $target->target_weight ?? '') }}"
             class="form-control @error('target_weight') is-invalid @enderror">

      @error('target_weight')
        <p style="color:red;">{{ $message }}</p>
      @enderror
    </div>

    {{-- ボタン --}}
    <div class="d-flex justify-content-between">
      <a href="{{ route('weights.index') }}" class="btn btn-secondary">戻る</a>
      <button type="submit" class="btn btn-primary">更新</button>
    </div>
  </form>
</div>
@endsection
