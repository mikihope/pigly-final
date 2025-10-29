@extends('layouts.app')

@section('content')
<div class="container">
    <h1>体重記録一覧</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <h2>{{ $user->name }} さんの記録</h2>

    <p>
        目標体重：
        @if ($target)
            {{ $target->target_weight }} kg
        @else
            未設定
        @endif
    </p>

    <p><a href="{{ route('weights.edit') }}">目標体重を変更する</a></p>

    <h3>体重ログ</h3>

    @if ($weightLogs->isEmpty())
        <p>まだ体重記録がありません。</p>
    @else
        <table border="1" cellpadding="8">
            <tr>
                <th>日付</th>
                <th>体重(kg)</th>
            </tr>
            @foreach ($weightLogs as $log)
                <tr>
                    <td>{{ $log->date }}</td>
                    <td>{{ $log->weight }}</td>
                </tr>
            @endforeach
        </table>
    @endif
</div>
@endsection

