<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pigly</title>
</head>
<body>
    <header>
        <h1>Pigly</h1>
        <nav>
            <ul style="list-style: none; display: flex; gap: 10px;">
                <li><a href="{{ route('weights.index') }}">ホーム</a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">ログアウト</button>
                    </form>
                </li>
            </ul>
        </nav>
        <hr>
    </header>

    <main>
        @yield('content')
    </main>
</body>
</html>

