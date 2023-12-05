create database primaria;

drop database primaria;

use primaria;

create table admin(
	id int not null auto_increment,
	primary key(id),
	usuario varchar(20) not null,
	contraseña varchar(20) not null,
	created_at datetime not null,
    updated_at datetime null,
    deleted_at datetime null
);

create table maestros(
    id int not null auto_increment,
    primary key(id),
    usuario varchar(50) not null,
    contraseña varchar(20) not null,
    nombre varchar(50) not null,
    aPaterno varchar(50) not null,
    aMaterno varchar(50) not null,
    calle varchar(30) not null,
    colonia varchar(30) not null,
    numero int not null,
    municipio varchar(50) not null,
    ciudad varchar(50) not null,
    estado varchar(50) not null,
    matricula varchar(30) not null unique,
    telefono varchar(10) not null,
    created_at datetime not null,
    updated_at datetime null,
    deleted_at datetime null
);

create table alumnos(
    id int not null auto_increment,
    primary key(id),
    usuario varchar(50) not null,
    contraseña varchar(20) not null,
    nombre varchar(50) not null, 
    aPaterno varchar(50) not null,
    aMaterno varchar(50) not null,
    numeroControl int not null unique,
    fechaN date not null,
    calle varchar(50) not null,
    colonia varchar(50) not null,
    numero int null,
    municipio varchar(50) not null,
    ciudad varchar(30) not null,
    estado varchar(30) not null,
    grado varchar(20) not null,
    grupo varchar(20) not null,
    created_at datetime not null,
    updated_at datetime null,
    deleted_at datetime null
);

create table materias(
    id int not null auto_increment,
    nombre varchar(50) not null,
    nombreCorto varchar(10) not null,
    clave varchar(10) not null,
    unidades int not null,
    maestro int not null,
    index(maestro),
    created_at datetime not null,
    updated_at datetime not null,
    deleted_at datetime null,
    foreign key(maestro) references maestros(id),
    primary key(id)
);


create table calificaciones(
    id int not null auto_increment,
    alumno int not null,
    index(alumno),
    español float null,
    matematicas float null,
    historia float null,
    civismo float null,
    edFisica float null,
    geografia float null,
    ciencias float null,
    created_at datetime not null,
    updated_at datetime null,
    deleted_at datetime null,
    foreign key(alumno) references alumnos(id),
    primary key(id)
);
   

insert INTO admin (usuario, contraseña, created_at) -- Ya 
VALUES 
    ('isa', '150503', '2023/11/05 11:52:02');
   
insert INTO maestros (usuario, contraseña, nombre, aPaterno, aMaterno, calle, colonia, numero, municipio, ciudad, estado, matricula, telefono, created_at) -- Ya
VALUES 
    ('xime', '1234xime', 'Ximena', 'Arcos', 'Perdomo', 'San andrés', 'Fovissste', 2, 'Teziutlán', 'Puebla', 'Puebla', 'XI125684', 2311256984, '0000/00/00 00:00:00'),
    ('val', 'vale003', 'Valeria', 'Guerrero', 'Juárez', 'Hidalgo', 'Centro', 15, 'Jalacingo', 'Veracruz', 'Veracruz', 'VA297162', 2321568475, '0000/00/00 00:00:00'),
    ('luis', 'lu03985', 'Luis', 'Linos', 'Huerta', '16 de septiembre', 'Juárez', 56, 'Teziutlán', 'Puebla', 'Puebla', 'LU365130', 2311684571, '0000/00/00 00:00:00'),
    ('marce', 'mar3698', 'Marcelo', 'Arcos', 'Vidal', 'Bugambilias', 'Norte', 232, 'Zacapoaxtla', 'Puebla', 'Puebla', 'MA314100', 2351694606, '0000/00/00 00:00:00'),
    ('gaby', 'gab2695', 'Gabriela', 'Torres', 'Dinorin', 'Aquiles serdán', 'Sur', 1056, 'Jalacingo', 'Veracruz', 'Veracruz', 'GA329024', 2321540695, '0000/00/00 00:00:00');

   
INSERT INTO alumnos (usuario, contraseña, nombre, aPaterno, aMaterno, numeroControl, fechaN, calle, colonia, numero, municipio, ciudad, estado, grado, grupo, created_at) -- Ya
VALUES 
    ('alex', 'alex2023', 'Alex', 'Huerta', 'Sánchez', 150, '2011/11/15', 'Julio', 'Bugambilias', 26, 'Zaragoza', 'Puebla', 'Puebla', 'Sexto', 'A', '0000/00/00 00:00:00'),
    ('ale', 'ale2023', 'Alejandra', 'Duran', 'Pérez', 265, '2012/12/08', 'Hidalgo', 'Libertad', 220, 'Teziutlán', 'Puebla', 'Puebla', 'Cuarto', 'B', '0000/00/00 00:00:00'),
    ('keni', 'keni2023', 'Kenia', 'Arroyo', 'Espinoza', 365, '2013/06/14', 'Insurgentes', 'Centro', 180, 'Jalacingo', 'Veracruz', 'Veracruz', 'Quinto', 'C', '0000/00/00 00:00:00'),
    ('chevis', 'chevis2023', 'Sebastián', 'Flores', 'Flores', 165, '2017/08/25', 'Industrial', 'Juárez', 250, 'Monterrey', 'Nuevo León', 'Nuevo León', 'Primero', 'B', '0000/00/00 00:00:00'),
    ('caro', 'caro2023', 'Carolina', 'Gómez', 'Pantoja', 564, '2015/04/25', 'Castillo', 'León', 1254, 'Zacapoaxtla', 'Puebla', 'Puebla', 'Tercero', 'A', '0000/00/00 00:00:00');


INSERT INTO materias (nombre, nombreCorto, clave, unidades, maestro, created_at) -- foreign key(maestro) references maestros(id)
VALUES 
    ('Español', 'ESP', 'ESP-1', 5, 1, '0000/00/00 00:00:00 '),
    ('Matemáticas', 'MAT', 'MAT-1', 4, 2, '0000/00/00 00:00:00'),
    ('Historia', 'HIST', 'HIST-2', 3, 3, '0000/00/00 00:00:00'),
    ('Civismo', 'CIVIS', 'CIVIS-4', 5, 4, '0000/00/00 00:00:00'),
    ('Educación Física', 'EDUFI', 'EDUFI-3', 6, 5, '0000/00/00 00:00:00'),
    ('Geografía', 'GEO', 'GEO-3', 4, 2, '0000/00/00 00:00:00'),
    ('Ciencias Naturales', 'CIEN', 'CIEN-1', 5, 3, '0000/00/00 00:00:00');

INSERT INTO calificaciones (alumno, español, matematicas, historia, civismo, edFisica, geografia, ciencias, created_at) --  foreign key(alumno) references alumnos(id),
VALUES 
    (1, 9.5, 8, 7.9, 9, 10, 9.0, 9.08, '2023/10/11'),
    (2, 8.5, 9, 7.0, 8, 9, 8.5, 8.25, '2023/10/12'),
	(3, 9.2, 8.8, 9.0, 8.5, 9.3, 8.9, 8.93, '2023/10/13'),
    (4, 8.9, 9.1, 8.7, 9.2, 9.0, 8.8, 8.93, '2023/10/14');
   
   show databases;
  
