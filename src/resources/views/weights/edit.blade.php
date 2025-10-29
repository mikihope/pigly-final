@extends('layouts.app')

@section('content')
<div class="container">
    <h1>目標体重の変更</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if ($target)
        <form method="POST" action="{{ route('weights.update', $target->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="target_weight" class="form-label">目標体重 (kg)</label>
                <input
                    type="number"
                    step="0.1"
                    id="target_weight"
                    name="target_weight"
                    value="{{ old('target_weight', $target->target_weight ?? '') }}"
                    required
                >
            </div>

            <button type="submit">更新</button>
        </form>
    @else
        <p style="color:red;">目標体重が登録されていません。先に設定してください。</p>
    @endif
</div>
@endsection

