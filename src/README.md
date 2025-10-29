# Pigly（確認テスト3）

体重記録アプリ「Pigly」は、ユーザーが自分の体重を記録し、目標体重を管理できるLaravelアプリケーションです。

---

## 📊 ER図
![ER図](./er.png)


---

## 🚀 使用技術

| 項目 | 内容 |
|------|------|
| フレームワーク | Laravel 12 |
| PHP | 8.3 |
| データベース | MySQL 8.0 |
| 認証 | Laravel Fortify |
| 開発環境 | Docker / WSL2 / Ubuntu |
| フロントエンド | Blade / CSS |

---

## 🧱 機能一覧

- 新規登録・ログイン・ログアウト（Fortify使用）
- 目標体重の登録・変更
- 体重ログの登録・閲覧
- バリデーション（日本語対応）
- 認証ユーザーごとのデータ管理

---

## 🧩 テーブル構成

### users テーブル
| カラム名 | 型 | 備考 |
|-----------|----|------|
| id | bigint | 主キー |
| name | string | ユーザー名 |
| email | string | ユニーク制約 |
| password | string | ハッシュ化 |
| timestamps | - | 登録・更新日時 |

### weight_targets テーブル
| カラム名 | 型 | 備考 |
|-----------|----|------|
| id | bigint | 主キー |
| user_id | bigint | 外部キー（users.id） |
| target_weight | decimal(5,1) | 目標体重 |
| timestamps | - | 登録・更新日時 |

### weight_logs テーブル
| カラム名 | 型 | 備考 |
|-----------|----|------|
| id | bigint | 主キー |
| user_id | bigint | 外部キー（users.id） |
| date | date | 記録日 |
| weight | decimal(5,1) | 当日の体重 |
| timestamps | - | 登録・更新日時 |

---

## ⚙️ 環境構築手順

```bash
git clone https://github.com/mikihope/pigly-final.git
cd pigly-final/src
cp .env.example .env
composer install
npm install
php artisan key:generate
php artisan migrate --seed
php artisan serve

