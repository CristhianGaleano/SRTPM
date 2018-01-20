create table usuarios (username varchar(30), password varchar(30), perfil varchar(20));
insert into usuarios values("cristhian","123" ,"admin" );

#SELECT * FROM usuarios;
create table propietario_moto (cedula_propietario varchar(30) primary key not null ,
nombre_propietario varchar(30) not null,
apellidos varchar(30) not null,
fecha_naci_propietario date not null,
direccion varchar(40),
email varchar(40) not null,
telefono varchar(15),
cedula_escaneada_propietario varchar(50),
tarjeta_propieda varchar(50),
certificado_vecinda varchar(50),
licensia_conduccion varchar(50),
SOAT varchar(50),
registro_civil varchar(50), 
seguro varchar(50),
passalvo_transito varchar(50),
pasado_judicial varchar(50),
foto varchar(50)
);
#SELECT * FROM propietario_moto;
CREATE TABLE empresa (nit varchar(50) primary key not null,
nombre varchar(40) not null, /*cambiar a no requerido*/
direccion varchar(30),
email varchar(40) not null, /*cambiar a no requerido*/
telefono varchar(15),
pagina_web varchar(30),
carta varchar(80),
razon_social varchar(30));


#SELECT * FROM empresa;
/*cambiar tamaño posible error*/
CREATE TABLE parrillero (cedula_parrillero varchar(15) not null primary key,
nombres_parrillero varchar(50) not null,
apellidos_parillero varchar(50),
edad int,
fecha_naci date not null,
pasado_judicial varchar(60),
cedula_scanner varchar(60),
registro_civil varchar(60),
cedula_propietario varchar(30),
FOREIGN KEY (cedula_propietario) REFERENCES propietario_moto(cedula_propietario)
);
#select *from parrillero;



create index propietario_parrillero on parrillero(cedula_propietario);

CREATE TABLE permiso_parrillero (id int auto_increment primary key ,
fecha_solicitud date not null,
fecha_expedicion date,
fecha_vencimiento date,
estado varchar(20) not null,
cedula_propietario varchar(30),
FOREIGN KEY (cedula_propietario) REFERENCES propietario_moto(cedula_propietario )
);
CREATE INDEX propietario_permisoPa on permiso_parrillero(cedula_propietario);
CREATE TABLE permiso_horario_extendido (id int auto_increment primary key ,
fecha_solicitud date not null,
fecha_expedicion date,
fecha_vencimiento date,
estado varchar(20) not null,
cedula_propietario varchar(30),
nit varchar(50),
FOREIGN KEY (cedula_propietario) REFERENCES propietario_moto(cedula_propietario),
FOREIGN KEY (nit) REFERENCES empresa(nit)
);
#select * from permiso_horario_extendido;
CREATE INDEX propietario_permisoHo on permiso_horario_extendido(cedula_propietario);

CREATE TABLE usuariosM (id int auto_increment primary key ,
nombres varchar(30) not null,
email varchar(30),
usuario varchar(30) not null,
contrasena varchar(30) not null);
