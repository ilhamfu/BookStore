create database bookstore;
use bookstore;

create table tbBuku(
    ISBN varnchar(20) primary key,
    judul varchar(20) not null,
    penerbit int not null,
    pengarang varchar(20) not null,
    tahun_terbit int not null
    tersedia int
);

create table tbPenerbit(
    id_penerbit varchar(20) primary key,
    nama_instansi varchar(50) not null,
    alamat varchar(100),
    no_telp varchar(20),
    email varchar(40)
);

create table tblJenis(
    id_jenis int primary key,
    ket varchar(10) not null
);

create table tblUser(
    id int auto_increment,
    username varchar(20) primary key,
    password varchar(100) not null,
    status enum('USER','ADMIN') not null,
    isPinjam bit default('0')
);

create table tblStatusPeminjaman(
    id_peminjaman int primary key auto_increment,
    id_user int not null,
    tanggal_peminjaman date not null,
    id_pegawai int not null,
    isKembali bit default(0),
    tanggal_kembali data
);

create table tblListBuku(
    id_peminjaman int not null,
    isbn_buku varchar(20) not null
);
