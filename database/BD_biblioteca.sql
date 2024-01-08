

CREATE TABLE tb_usuarios(
    id_usuario              INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombres                 VARCHAR (255) NOT NULL,
    apellidos               VARCHAR (255) NOT NULL,
    ci                      VARCHAR (255) NOT NULL,
    celular                 VARCHAR (255) NULL,
    cargo                   VARCHAR (255) NOT NULL,
    email                   VARCHAR (255) NOT NULL,
    password                TEXT NOT NULL,

    fyh_creacion            DATETIME        NULL,
    fyh_actualizacion       DATETIME        NULL,
    fyh_eliminacion         DATETIME        NULL,
    estado                  VARCHAR (11)    NOT NULL
);


CREATE TABLE tb_libros(
    id_libro                 INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    codigo                   VARCHAR (35)NOT NULL,
    area                     VARCHAR (30) NOT NULL,
    autor                    VARCHAR (255) NOT NULL,
    editorial                VARCHAR (255) NOT NULL,
    titulo                   VARCHAR (255)  NULL,
    numero                   VARCHAR (10)  NULL,
    ficha                    VARCHAR (10)  NULL,
    formato                  VARCHAR(15) NOT NULL,
    ejemplares               VARCHAR (5) NOT NULL,
    observaciones            VARCHAR(255) NULL,
    fyh_creacion            DATETIME      NOT  NULL,
    fyh_actualizacion       DATETIME        NULL,
    fyh_eliminacion         DATETIME        NULL,
    estado                  VARCHAR (1)    NOT NULL
);




CREATE TABLE tb_areas(
    id_area         INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    area                     VARCHAR (30) NOT NULL,
   
    fyh_creacion            DATETIME      NOT  NULL,
    fyh_actualizacion       DATETIME        NULL,
    fyh_eliminacion         DATETIME        NULL,
    estado                  VARCHAR (11)    NOT NULL
);


CREATE TABLE tb_editorial(
    id_editorial         INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    editorial                    VARCHAR (255) NOT NULL,
   
    fyh_creacion            DATETIME      NOT  NULL,
    fyh_actualizacion       DATETIME        NULL,
    fyh_eliminacion         DATETIME        NULL,
    estado                  VARCHAR (11)    NOT NULL
);

CREATE TABLE tb_autores(
    id_autor        INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    autor                    VARCHAR (255) NOT NULL,
   
    fyh_creacion            DATETIME      NOT  NULL,
    fyh_actualizacion       DATETIME        NULL,
    fyh_eliminacion         DATETIME        NULL,
    estado                  VARCHAR (1)    NOT NULL
);


CREATE TABLE tb_prestamos(
    id_prestamo         INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre        VARCHAR (255) NOT NULL,
    carrera       VARCHAR (18) NOT NULL,
    matricula    VARCHAR (15) NOT NULL,
    libro    VARCHAR (255) NOT NULL,
    observacipn   VARCHAR (255) NOT NULL,
    fyh_creacion            DATETIME      NOT  NULL,
    fyh_actualizacion       DATETIME        NULL,
    fyh_eliminacion         DATETIME        NULL,
    estado                  VARCHAR (1)    NOT NULL
);