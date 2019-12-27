CREATE DATABASE IF NOT EXISTS prueba_tecnica;
USE prueba_tecnica;

CREATE TABLE usuarios(
    id          int(11) auto_increment not null,
    nombre      varchar(50) not null,
    edad        int(11) not null,
    RFC         varchar(13) not null,
    password    varchar(255) not null,
    email       varchar(255) not null,
    telefono    varchar(255) not null,
    estado      varchar(255) not null,
    CONSTRAINT pk_usuarios PRIMARY KEY(id),
    CONSTRAINT uc_usuarios UNIQUE KEY(email) 
)ENGINE=InnoDb;