-- database.sql

-- Tabel berita
CREATE TABLE berita (
    id INT AUTO_INCREMENT PRIMARY KEY,
    gambar VARCHAR(255) NOT NULL,
    judul VARCHAR(255) NOT NULL,
    isi TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabel anggota
CREATE TABLE anggota (
    id INT AUTO_INCREMENT PRIMARY KEY,
    foto VARCHAR(255) NOT NULL,
    nama VARCHAR(100) NOT NULL,
    jabatan VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabel produk
CREATE TABLE produk (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    foto VARCHAR(255) NOT NULL,
    deskripsi TEXT NOT NULL,
    nomor_wa VARCHAR(20) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabel wisata
CREATE TABLE wisata (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    foto VARCHAR(255) NOT NULL,
    deskripsi TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabel user untuk login admin
CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    nama VARCHAR(100) NOT NULL,
    session_admin VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
