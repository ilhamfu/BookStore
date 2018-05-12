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
    id int auto_increment,
    username varchar(20) primary key,
    password varchar(100) not null,
    status enum('USER','ADMIN') not null,    
);

create table tblUser(
    id_login int PRIMARY KEY,
    nama_depan VARCHAR(20) not NULL,
    nama_belakang VARCHAR(20) not NULL
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
    isKembali bit default(0),
    tanggal_kembali data
);

create table tblListBuku(
    id_peminjaman int not null,
    isbn_buku varchar(20) not null
);

create view vwBuku as 
    select b.isbn,b.judul,p.nama_instansi,b.pengarang,b.tahun_terbit,b.jumlah from tbBuku b INNER JOIN (tbPenerbit p) ON (b.penerbit=p.id_penerbit);

insert into tbBuku('isbn','judul','penerbit','pengarang','tahun_terbit','jumlah') values ('67726643251058395127','Marmut Merah Jambu',1,'Raditya Dika',2010,1);
insert into tbBuku('isbn','judul','penerbit','pengarang','tahun_terbit','jumlah') values ('09383170494167606553','Hujan',2,'Tere Liye',2016,1);
insert into tbBuku('isbn','judul','penerbit','pengarang','tahun_terbit','jumlah') values ('97186229950817794956','A: Aku', Benci,' & Cinta',4,Wulan Fadi,2015,10);
insert into tbBuku('isbn','judul','penerbit','pengarang','tahun_terbit','jumlah') values ('06047277940934974610','Dear Nathan',4,'Erisca Febriani',2016,13);
insert into tbBuku('isbn','judul','penerbit','pengarang','tahun_terbit','jumlah') values ('25008311394128101448','Surga yang Tak Dirindukan 2',3,'Asma nadia',2016,11);
insert into tbBuku('isbn','judul','penerbit','pengarang','tahun_terbit','jumlah') values ('35141053063804790320','Gita Cinta dari SMA',2,'Eddy D. Iskandar',2014,3);
insert into tbBuku('isbn','judul','penerbit','pengarang','tahun_terbit','jumlah') values ('69870098113326891459','Critical Eleven',2,'Ika Natassa',2015,17);
insert into tbBuku('isbn','judul','penerbit','pengarang','tahun_terbit','jumlah') values ('65528602525191988806','Rindu',5,'Tere Liye',2015,4);
insert into tbBuku('isbn','judul','penerbit','pengarang','tahun_terbit','jumlah') values ('95562591666708398203','Garis Waktu',6,'Fiersa Besari',2016,20);
insert into tbBuku('isbn','judul','penerbit','pengarang','tahun_terbit','jumlah') values ('32262078105781116667','Friend Zone',8,'Vanessa marsella',2016,6);
insert into tbBuku('isbn','judul','penerbit','pengarang','tahun_terbit','jumlah') values ('32468337963087714763','Sebuah Usaha Untuk Melupakan',6,'Boy Candra',2016,15);
insert into tbBuku('isbn','judul','penerbit','pengarang','tahun_terbit','jumlah') values ('25495285485018751490','Laskar Pelangi',7,'Andrea Hirata',2007,8);
insert into tbBuku('isbn','judul','penerbit','pengarang','tahun_terbit','jumlah') values ('22370089222571230487','5 cm',2,'Donny Dhirgantoro',2005,8);
insert into tbBuku('isbn','judul','penerbit','pengarang','tahun_terbit','jumlah') values ('17253614473425287091','Negeri 5 Menara',2,'A.Fuadi',2009,10);
insert into tbBuku('isbn','judul','penerbit','pengarang','tahun_terbit','jumlah') values ('86764671964385745240','Sang Pemimpi',7,'Andrea Hirata',2006,1);
insert into tbBuku('isbn','judul','penerbit','pengarang','tahun_terbit','jumlah') values ('56842112287497865954','Bintang',2,'Tere Liye',2017,20);
insert into tbBuku('isbn','judul','penerbit','pengarang','tahun_terbit','jumlah') values ('17652353593173199834','Bidadari Bermata Bening',5,'Habiburrahman El-Shirazy',2017,7);
insert into tbBuku('isbn','judul','penerbit','pengarang','tahun_terbit','jumlah') values ('14152157754090158015','Jingga Untuk Matahari',2,'Esti Kinasih',2017,11);
insert into tbBuku('isbn','judul','penerbit','pengarang','tahun_terbit','jumlah') values ('03851388499793578953','Origami Hati',8,'Boy Candra',2006,6);

insert into tbBuku('id_penerbit','nama_instansi','alamat','no_telp','email') values (1,'Bukune','JL. H. Montong, No. 57, 12630 RT.6/RW.2 Ciganjur Jagakarsa Kota Jakarta Selatan DKI Jakarta 12630 Indonesia','(021)78883030','redaksi@bukune.com');
insert into tbBuku('id_penerbit','nama_instansi','alamat','no_telp','email') values (2,'Gramedia','Jl. Palmerah Barat 29-37 10270, RT.1/RW.2, Gelora, Central Jakarta City, Jakarta 10270','(021) 53650110','fiksi@gramediapublishers.com');
insert into tbBuku('id_penerbit','nama_instansi','alamat','no_telp','email') values (3,' AsmaNadia Publishing House','Jl. Merapi Raya Rt 007/09 No 42 Depok Timur, Sukmajaya, Depok, Jawa Barat 16417','(+62)85891158876','tokoonlineasmanadia@gmail.com');
insert into tbBuku('id_penerbit','nama_instansi','alamat','no_telp','email') values (4,'Best Media','Jl. Mangga','(021)519462465','bestmedia@gmail.com');
insert into tbBuku('id_penerbit','nama_instansi','alamat','no_telp','email') values (5,'Republika','Blok I nO, Jl. Kav. Polri Blok J No.65, RT.6/RW.6, Jagakarsa, DKI Jakarta, Daerah Khusus Ibukota Jakarta 11460','(021) 7817702','redaksipab@republikapenerbit.com');
insert into tbBuku('id_penerbit','nama_instansi','alamat','no_telp','email') values (6,'MediaKita','Jl. H. Montong No.57, RT.6/RW.2, Ciganjur, Jagakarsa, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12630','(021) 78883030','naskah@mediakita.com');
insert into tbBuku('id_penerbit','nama_instansi','alamat','no_telp','email') values (7,'Bentang Pustaka','Jl. Pandega Pagma No. 19, Yogjakarta Kode Pos 55284','(0274) 517 373','bentangpustaka@yahoo.com');
insert into tbBuku('id_penerbit','nama_instansi','alamat','no_telp','email') values (8,'Wahyu Media','Jl. Mohamad Kahfi II No.12, RT.13/RW.9, Srengseng Sawah, Jagakarsa, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12630','(021) 78883030','redaksiku@wahyumedia.com');
