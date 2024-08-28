# ApacheコンテナのDockerfile
FROM php:8.1-rc-apache

ENV TZ Asia/Tokyo

# APTパッケージマネージャーのデータベースを最新の状態に更新
# [libpq-dev] 
# PostgreSQLのC言語クライアントライブラリを開発するためのヘッダーファイルと開発用のツールを提供するパッケージ
# 「pdo_pgsql」や「pgsql」のPHP拡張をビルドするために必要
RUN apt-get update && apt-get install -y vim libpq-dev


# [docker-php-ext-install] 
# Dockerコンテナ内でPHPの拡張モジュールをインストールするためのユーティリティコマンド
# Dockerイメージ内のPHP環境をカスタマイズする際に使用

# [pdo] PHP Data Objects
# PHPでデータベースにアクセスするためのデータベース抽象化レイヤー
# PDOはPHPの標準拡張モジュールとして提供されており、さまざまな種類のデータベースに対して一貫したインターフェースを提供
# PDOを使用することで、PHPアプリケーションは特定のデータベースエンジンに依存することなく、異なるデータベースに対して同じコードを再利用できます
RUN docker-php-ext-install pdo

# [pdo_pgsql]
# PDO拡張を使用して、PostgreSQLデータベースに接続するためのドライバー
# PHPでPostgreSQLデータベースに対して一貫したインターフェースを提供
RUN docker-php-ext-install pdo_pgsql

# [pgsql]
# PostgreSQLデータベースシステムに対して、PHPから直接アクセスするためのドライバーの1つ
# pgsqlドライバーはPHPの拡張モジュール
RUN docker-php-ext-install pgsql