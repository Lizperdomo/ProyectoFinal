create database seguros;
 
use seguros;

SELECT @@datadir;

drop database seguros;

create table coberturas(
	id int not null auto_increment,
	nombre varchar(50) unique,
	descripcion varchar(100),
	status varchar(20) not null,
	costo float not null,
	created_at date,
	updated_at datetime null,
	deleted_at datetime null,
	primary key(id)
);

create table usuarios(
	id int not null auto_increment,
	nombre varchar(30) not null,
	apellidoP varchar(30) not null,
	apellidoM varchar(30) not null,
	fechaNac date not null,
	calle varchar(50) null,
	colonia varchar(50) null,
	municipio varchar(50) null,
	estado varchar(50) null, 
	ciudad varchar(50) null,
	CURP varchar(30) not null unique,
	RFC varchar(20) not null unique,
	telefono varchar(10) not null,
	perfil varchar(20) not null,
	nombreUsuario varchar(50) not null,
	contraseña varchar(50) not null,
	idCobertura int null,
	index(idCobertura),
	created_at datetime,
	updated_at datetime null,
	deleted_at datetime null,
	foreign key(idCobertura) references coberturas(id),
	primary key(id)
);


create table usuario_cobertura(
	id int not null auto_increment primary key,
	usuario int not null,
	index(usuario),
	cobertura int not null,
	index(cobertura),
	foreign key(usuario) references usuarios(id),
	foreign key(cobertura) references coberturas(id)
);


create table ventas(
	id int not null auto_increment,
	numeroTarjeta int not null unique,
	cvv int not null unique, 
	monto float not null,
	usuario int not null,
	index(usuario),
	cobertura int not null,
	index(cobertura),
	created_at datetime,
	updated_at datetime null,
	deleted_at datetime null,
	foreign key(usuario) references usuarios(id),
	foreign key(cobertura) references coberturas(id),
	primary key(id)
);

create table cobertura_venta(
	id int not null auto_increment primary key,
	cobertura int not null,
	index(cobertura),
	venta int not null,
	index(venta),
	foreign key(cobertura) references coberturas(id),
	foreign key(venta) references ventas(id)
);

insert into coberturas (nombre, descripcion, status, costo, created_at)
	values 	('Enfermedades graves', 'Esta cobertura cubre hasta 8 enfermedades', 'Disponible', 150, '2023/07/16'),
			('Cirugias', 'Esta cobertura cubre hasta 20 cirugias', 'No disponible', 250, '2023/07/19'),
			('Gastos funerarios', 'Esta cobertura te ofrece hasta $54000 pesos para gastos funerarios', 'Disponible', 200, '2023/07/19'),
			('Accidentes personales', 'Esta cobertura ofrece hasta $85000 pesos', 'Disponible', 250, '2023/07/20'),
			('Garantía escolar', 'Esta cobertura cubre varios gastos escolares', 'Disponible', 100, '2023/07/22'),
			('Protección contra cáncer', 'Esta cobertura cubre hasta 10 quimioterapias', 'Disponible', 150, '2023/07/22'),
			('Enfermedades terminales', 'Esta cobertura ofrece hasta $1000000 de pesos', 'No disponible', 300, '2023/07/24'),
			('Apoyo por hospitalización', 'Esta cobertura ofrece pagar todos los gatos de hospitalización', 'Disponible', 250, '2023/07/25'),
			('Muerte accidental', 'Esta cobertura ofrece a los familiares del asegurado hasta $100000 pesos ', 'No disponible', 150, '2023/07/26'),
			('Fallecimiento', 'En caso de fallecer el asegurado se les entrega a los familiares el dinero ahorrado', 'Disponible', 350, '2023/07/28');
	
		select * from coberturas;
	
insert into usuarios (nombre, apellidoP, apellidoM, fechaNac, calle, colonia, municipio, estado, ciudad, CURP, RFC, telefono, perfil, nombreUsuario, contraseña, idCobertura, created_at)
	values 	('Lizbeth', 'Perdomo', 'González', '1998/08/09', '5 de mayo', 'Centro', 'Teziutlán', 'Puebla', 'Puebla', 'PEGL080903MPLRNZA9', 'PEGL080903TE2', '2311202681', 'Administrador', 'Liz', 'liz080903', null , '2023/07/20'), 
			('Monserrat', 'Peña', 'Guerrero', '1973/10/25', 'Allende', 'Centro', 'Teziutlán ', 'Puebla', 'Puebla', 'MOPG980404MPLHY6C', 'MONPG980404MPLU', '2311256584', 'Cliente', 'Peña', 'MOPG980404', 1, '2023/07/20'),
			('Luis', 'Sánchez', 'Arriaga', '1990/05/15', 'Hidalgo', 'Centro', 'Teziutlán', 'Puebla', 'Puebla', 'LUSA200714HPLDF5K', 'LUSA200714HPLDY', '2316953210', 'Cliente', 'Sanchez', 'LUSA200714',  3, '2023/07/22'),
			('Lucia', 'Jiménez', 'Zamora', '1984/06/12','Nacozari', 'El carmen', 'Jalacingo', 'Veracruz', 'Veracruz', 'LUJZ971004MPLOK5H', 'LUJZ971004MPLFI', '2321584102', 'Cliente', 'Jimenez', 'LUJZ971004', 5, '2023/07/24'),
			('Mariana', 'Aguilar', 'Velazquez', '1990/11/26','Julio', 'Fresnillo', 'San juan', 'Puebla', 'Puebla', 'MAAV060608MPLDJNS', 'MAAV060608MPLDB', '2311574200', 'Cliente', 'Aguilar', 'MAAV060608', 10, '2023/07/27'),
			('Israel', 'Periañez', 'Rosas', '1995/07/06','Los pinos', 'Ciprecess', 'Jalacingo', 'Veracruz', 'Veracruz', 'ISPR030515HPLUYBJ', 'ISPR030515HPLHU', '2320685231', 'Cliente', 'Periañez', 'ISPR030515', 8, '2023/07/28');
		
		select * from usuarios;

insert into usuario_cobertura (usuario, cobertura)
	values 	(2, 1),
			(3, 3),	
			(4, 5),
			(5, 6),
			(6, 8);
	
insert into ventas (numeroTarjeta, cvv, monto, usuario, cobertura, created_at)
	values 	(16598235, 126, 150, 2, 1, '2023/07/20'),
			(16595952, 456, 200, 3, 3, '2023/07/22'),
			(69512263, 149, 100, 4, 5, '2023/07/24'),
			(26975236, 364, 350, 5, 10, '2023/07/27'),
			(14861415, 265, 250, 2, 2, '2023/07/27'),
			(26461115, 266, 150, 3, 6, '2023/07/27'),
			(36564866, 025, 250, 5, 4, '2023/07/27'),
			(20684994, 648, 300, 4, 7, '2023/07/27'),
			(78626100, 984, 150, 4, 9, '2023/07/27'),
			(98262163, 658, 250, 5, 8, '2023/07/28');

	
insert into cobertura_venta (cobertura, venta)
	values 	(1, 1),
			(3, 2),
			(5, 3),
			(6, 4),
			(8, 5);
