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
    status enum('USER','ADMIN') not null
);

create table tblUser(
    id_login int PRIMARY KEY,
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



insert into tbBuku('id_penerbit','nama_instansi','alamat','no_telp','email') values (1,'Bukune','JL. H. Montong, No. 57, 12630 RT.6/RW.2 Ciganjur Jagakarsa Kota Jakarta Selatan DKI Jakarta 12630 Indonesia','(021)78883030','redaksi@bukune.com');
insert into tbBuku('id_penerbit','nama_instansi','alamat','no_telp','email') values (2,'Gramedia','Jl. Palmerah Barat 29-37 10270, RT.1/RW.2, Gelora, Central Jakarta City, Jakarta 10270','(021) 53650110','fiksi@gramediapublishers.com');
insert into tbBuku('id_penerbit','nama_instansi','alamat','no_telp','email') values (3,'AsmaNadia Publishing House','Jl. Merapi Raya Rt 007/09 No 42 Depok Timur, Sukmajaya, Depok, Jawa Barat 16417','(+62)85891158876','tokoonlineasmanadia@gmail.com');
insert into tbBuku('id_penerbit','nama_instansi','alamat','no_telp','email') values (4,'Best Media','Jl. Mangga','(021)519462465','bestmedia@gmail.com');
insert into tbBuku('id_penerbit','nama_instansi','alamat','no_telp','email') values (5,'Republika','Blok I nO, Jl. Kav. Polri Blok J No.65, RT.6/RW.6, Jagakarsa, DKI Jakarta, Daerah Khusus Ibukota Jakarta 11460','(021) 7817702','redaksipab@republikapenerbit.com');
insert into tbBuku('id_penerbit','nama_instansi','alamat','no_telp','email') values (6,'MediaKita','Jl. H. Montong No.57, RT.6/RW.2, Ciganjur, Jagakarsa, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12630','(021) 78883030','naskah@mediakita.com');
insert into tbBuku('id_penerbit','nama_instansi','alamat','no_telp','email') values (7,'Bentang Pustaka','Jl. Pandega Pagma No. 19, Yogjakarta Kode Pos 55284','(0274) 517 373','bentangpustaka@yahoo.com');
insert into tbBuku('id_penerbit','nama_instansi','alamat','no_telp','email') values (8,'Wahyu Media','Jl. Mohamad Kahfi II No.12, RT.13/RW.9, Srengseng Sawah, Jagakarsa, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12630','(021) 78883030','redaksiku@wahyumedia.com');
