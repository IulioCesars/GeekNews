create database if not exists GeekNews;
use GeekNews;

create table if not exists Usuario(
	idUsuario		integer auto_increment,
    Nombre			varchar(50),
    Apellidos		varchar(50),
    Email			varchar(50) unique,
    Contrasena		varchar(50),
    Telefono		varchar(12),
    FNacimiento		date,
    Genero			enum('Masculino','Femenino'),
    Avatar			mediumblob,
    Portada			mediumblob,
    Privilegios		enum('Administrador', 'Reportero', 'Usuario', 'Dev') default 'Usuario',
    Activo			boolean default true,
    primary key(idUsuario)
);

create table if not exists Multimedia(
	idMultimedia	int auto_increment,
    idNoticia		int,
    Path			varchar(255),
    primary key(idMultimedia),
    foreign key(idNoticia) references Noticia(idNoticia)
);

create table if not exists Seccion(
	idSeccion		integer auto_increment,
    Nombre			varchar(50),
    Descripcion		varchar(255),
    Imagen			varchar(255),
    Relevancia		integer,
    primary key(idSeccion)
);

create table if not exists Noticia(
	idNoticia		integer auto_increment,
    Titulo			varchar(50),
    Cuerpo			text,
    Visitas			integer,
    MeGusta			integer,
    Autorizada		boolean,
    idReportero		integer,
    idSeccion		integer,
    Fecha			timestamp,
    primary key(idNoticia),
    foreign key(idReportero) references Usuario(idUsuario),
    foreign key(idSeccion) references Seccion(idSeccion)
);

create table if not exists Comentario(
	idComentario	integer auto_increment,
    Nombre			varchar(50),
    Email			varchar(50),
    Comentario		varchar(255),
    Fecha			timestamp,
    idNoticia		integer,
    Visible 		boolean,
    primary key(idComentario),
    foreign key(idNoticia) references Noticia(idNoticia)
);

alter table Noticia
	MODIFY  MeGusta integer default 0,
    MODIFY Visitas integer default 0,
    MODIFY Autorizada boolean default false;
    
alter table Usuario
	modify Contrasena varchar(100);
