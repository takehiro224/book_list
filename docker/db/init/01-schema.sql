\c postgres;
-- 書籍の情報を格納するテーブル
CREATE TABLE IF NOT EXISTS books (
    id SERIAL PRIMARY KEY, -- 主キーとしてのID, 自動インクリメントされる
    title VARCHAR(255) NOT NULL, -- 書籍のタイトル、NULLを許容しない
    isbn VARCHAR(20) NOT NULL,
    price INTEGER NOT NULL,
    author VARCHAR(255) NOT NULL, -- 書籍の著者名、NULLを許容しない
    publisher_name VARCHAR(255),
    created TIMESTAMP,
    updated TIMESTAMP
);

-- ログインユーザーを格納するテーブル
CREATE TABLE IF NOT EXISTS users (
    id SERIAL NOT NULL,
    login_id VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    name VARCHAR(255) NOT NULL,
    created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated TIMESTAMP,
    PRIMARY KEY (id)
);