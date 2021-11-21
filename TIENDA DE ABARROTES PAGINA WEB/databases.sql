--http://localhost/TIENDA%20DE%20ABARROTES%20PAGINA%20WEB--

--USUARIO--
CREATE TABLE USUARIO(
    codusu int not null AUTO_INCREMENT,
    nomusu varchar(50),
    apeusu varchar(50),
    emausu varchar(20) not null,
    pasusu varchar(20) not null,
    estado int not null,
    CONSTRAINT pk_usuario
    PRIMARY KEY (codusu)
);
INSERT INTO USUARIO(nomusu,apeusu,emausu,pasusu,estado)
VALUES ('Gilberto','Guzman','gilberto@gmail.com','123456',1);


CREATE TABLE PRODUCTO(
    codpro int not null AUTO_INCREMENT,
    nompro varchar(50) null,
    despro varchar(100) null,
    prepro numeric(6,2) null,
    estado int null,
    CONSTRAINT pk_producto
    PRIMARY KEY (codpro)
);

--Productos--
ALTER TABLE PRODUCTO add rutimapro varchar(100) null;

INSERT INTO PRODUCTO (nompro,despro,prepro,estado,rutimapro)
VALUES ('Arroz','Organico Kg','31.80',1,'arroz.jpeg'),
       ('Cacahuate','Estilo Japones 100g','18.00',1,'cacahuate.jpeg'),
       ('Chicharron','Sin Carbohidratos 160g','52.00',1,'chicharron.jpeg'),
       ('Legumbres','Del Huerto 220g','8.90',1,'latalegumbres.jpeg'),
       ('Frijoles','Bayos Enteros 560g','13.00',1,'latafrijoles.jpeg'),
       ('Chiles','Rajas 240g','13.20',1,'latarajas.jpeg'),
       ('Huevos','Paquete de 6 unidades','14.20',1,'huevos.jpeg'),
       ('Queso','Gourmet 300g','160.00',1,'queso.jpeg'),
       ('Mayonesa','Sabor limon 390g','39.99',1,'mayonesa.jpeg'),
       ('Jamon','Pavo Virginia 290g','33.50',1,'jamon.jpeg');
       
CREATE TABLE PEDIDO(
    codped int not null AUTO_INCREMENT,
    codusu int not null,
    codpro int not null,
    fecped datetime not null,
    estado int not null,
    dirusuped varchar(50) not null,
    telusuped varchar(12) not null,
    PRIMARY KEY (codped)
);