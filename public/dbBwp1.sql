CREATE DATABASE opentalk;
USE opentalk;


-- table jurusan
DROP TABLE IF EXISTS jurusan;
CREATE TABLE jurusan (
  id_jurusan INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nama_jurusan VARCHAR(100) NOT NULL UNIQUE,
  kode_jurusan VARCHAR(10) NOT NULL UNIQUE,
  fakultas VARCHAR(100) NOT NULL
);


-- table raw siswa
DROP TABLE IF EXISTS siswa;
CREATE TABLE siswa (
  id_siswa INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  id_jurusan INT(11),
  nama VARCHAR(500),
  password_siswa VARCHAR(255),
  nrp INT(11),
  jenis_kelamin ENUM('L', 'P'),
  angkatan INT(4),
  is_active BOOL DEFAULT FALSE,
  updated_at DATETIME DEFAULT NULL,
  FOREIGN KEY (id_jurusan) REFERENCES jurusan(id_jurusan)
);


-- table raw dosen
DROP TABLE IF EXISTS dosen;
CREATE TABLE dosen (
  id_dosen INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nama VARCHAR(255) DEFAULT NULL,
  password_dosen VARCHAR(255),
  nrp INT(11) DEFAULT NULL,
  jenis_kelamin CHAR(1),
  is_active BOOL DEFAULT FALSE,
  updated_at DATETIME DEFAULT NULL
);


-- table live_account
DROP TABLE IF EXISTS live_account;
CREATE TABLE live_account (
  id_live_account INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(100) NOT NULL,
  nrp INT(11) NOT NULL,
  role_account ENUM('siswa', 'admin', 'dosen') NOT NULL,
  is_active BOOL DEFAULT TRUE,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- buat konten pas live nya
DROP TABLE IF EXISTS live;
CREATE TABLE live_session (
  id_live_session INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  id_live_account INT(11),
  content TEXT,
  periode INT(4),
  is_archive BOOL DEFAULT FALSE,
  created_at DATETIME DEFAULT NULL,
  FOREIGN KEY (id_live_account) REFERENCES live_account(id_live_account)
);


-- table buat kategori keluhan
DROP TABLE IF EXISTS kategori;
CREATE TABLE kategori (
  id_kategori INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nama_kategori VARCHAR(50) NOT NULL
);

-- table buat semua keluhan pas bukan live
DROP TABLE IF EXISTS keluhan;
CREATE TABLE keluhan (
  id_keluhan INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  id_kategori INT(11) NOT NULL,
  id_siswa INT(11) NOT NULL,
  judul_keluhan VARCHAR(255) NOT NULL,
  deskripsi TEXT NOT NULL,
  upvote INT DEFAULT 0,
  status_keluhan ENUM('pending', 'in_progress', 'responded', 'denied') DEFAULT 'pending',
  created_at DATETIME DEFAULT NULL,
  deleted_at DATETIME DEFAULT NULL,
  updated_at DATETIME DEFAULT NULL,
  FOREIGN KEY (id_kategori) REFERENCES kategori(id_kategori),
  FOREIGN KEY (id_siswa) REFERENCES siswa(id_siswa)
);


-- Table untuk respon keluhan
DROP TABLE IF EXISTS respon_keluhan;
CREATE TABLE respon_keluhan (
  id_respon INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  id_keluhan INT(11) NOT NULL,
  id_dosen INT(11) NOT NULL,
  respon TEXT NOT NULL,
  created_at DATETIME DEFAULT NULL,
  FOREIGN KEY (id_keluhan) REFERENCES keluhan(id_keluhan),
  FOREIGN KEY (id_dosen) REFERENCES dosen(id_dosen)
);
