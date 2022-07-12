# 環境変数の情報でLaravelのBasic認証

## インストール

```
$ composer config repositories.meisterguild vcs https://github.com/hmrkm/laravel-basic-auth
$ composer require meisterguild/laravel-basic-auth
```

## 使い方

`.env`に以下を追記。

```
BASIC_AUTH_USERNAME=<ユーザー名>
BASIC_AUTH_PASSWORD=<パスワード>
```

`Kerne.php`の`routeMiddleware`に以下を追記。

```
'auth.basic.env' => \Meisterguild\LaravelBasicAuth\BasicAuthMiddleware::class,
```

Basic認証を掛けたいルーティングにミドルウェアを設定します。

```
Route::middleware('auth.basic.env')
```
