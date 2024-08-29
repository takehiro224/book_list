USE booklist;

-- 書籍の情報を格納するテーブル
CREATE TABLE IF NOT EXISTS books (
    id INT AUTO_INCREMENT PRIMARY KEY, -- 主キーとしてのID、自動インクリメントされる
    title VARCHAR(255) NOT NULL, -- 書籍のタイトル、NULLを許容しない
    isbn VARCHAR(20) NOT NULL,
    price INT NOT NULL,
    author VARCHAR(255) NOT NULL, -- 書籍の著者名、NULLを許容しない
    publisher_name VARCHAR(255),
    created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);