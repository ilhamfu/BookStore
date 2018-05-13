drop database bookstore;
create database bookstore;
use bookstore;

create table tbBuku(
    isbn varchar(20) primary key,
    judul varchar(20) not null,
    penerbit int not null,
    pengarang varchar(20) not null,
    tahun_terbit int not null,
    jumlah int
);

create table tbPenerbit(
    id_penerbit varchar(20) primary key,
    nama_instansi varchar(50) not null,
    alamat varchar(100),
    no_telp varchar(20),
    email varchar(40)
);

create table tblLogin(
    username varchar(20) primary key,
    password varchar(100) not null,
    status enum('USER','ADMIN') not null,
    nama_depan VARCHAR(20) not NULL,
    nama_belakang VARCHAR(20) not NULL,
    alamat VARCHAR(100) not NULL,
    jenis_kelamin enum('laki','perempuan') not null,
    ttl DATE not null,
    email VARCHAR(20) not NULL
);

create table tblStatusPeminjaman(
    id_peminjaman int primary key auto_increment,
    id_user int not null,
    tanggal_peminjaman date,
    id_pegawai int not null,
    isKembali bit DEFAULT 0,
    tanggal_kembali date
);

create table tblListBuku(
    id_peminjaman int not null,
    isbn_buku varchar(20) not null
);

create view vwBuku as 
    select b.isbn,b.judul,p.nama_instansi,b.pengarang,b.tahun_terbit,b.jumlah from tbBuku b INNER JOIN (tbPenerbit p) ON (b.penerbit=p.id_penerbit);