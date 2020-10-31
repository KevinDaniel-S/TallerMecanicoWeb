CREATE TABLE Cliente (
	DNI varchar(50) NOT NULL,
	Nombre varchar(255) NOT NULL,
	Apellido varchar(255) NOT NULL,
	Dirección varchar(255),
	Teléfono varchar(20),
	PRIMARY KEY (DNI),
	UNIQUE INDEX (Apellido, Nombre)
);

CREATE TABLE Vehiculo (
	Matricula varchar(50) NOT NULL,
	FK_DNI varchar(50) NOT NULL,
	Modelo varchar(50) NOT NULL,
	Color varchar(50) NOT NULL,
	PRIMARY KEY (Matricula),
	FOREIGN KEY (FK_DNI) REFERENCES Cliente(DNI)
);

CREATE TABLE Reparacion(
	ID_Reparacion INT AUTO_INCREMENT,
	FK_Matricula varchar(50) NOT NULL,
	Fecha_Entrada DateTime default NOW(),
	Fecha_Salida DateTime,
	PRIMARY KEY (ID_Reparacion),
	FOREIGN KEY (FK_Matricula) REFERENCES Vehiculo(Matricula)
);

CREATE TABLE Refacciones(
	Codigo_R INT AUTO_INCREMENT,
	Nombre varchar(50),
	Precio Decimal(6,2),
	PRIMARY KEY (Codigo_R)
);

CREATE TABLE Hoja_Parte(
	Codigo_H INT AUTO_INCREMENT,
	FK_Refaccion INT,
	FK_Reparacion INT,
	Precio_Unitario DECIMAL(6,2),
	Precio_Total DECIMAL(6,2),
	PRIMARY KEY(Codigo_H),
	FOREIGN KEY(FK_Refaccion) REFERENCES Refacciones(Codigo_R),
	FOREIGN KEY(FK_Reparacion) REFERENCES Reparacion(ID_Reparacion)	
);

CREATE TABLE Empleado(
	ID_Empleado INT AUTO_INCREMENT,
	Nombre varchar(255) NOT NULL,
	Apellido varchar(255) NOT NULL,
	Usuario varchar(255) NOT NULL UNIQUE,
	Contrasena varchar(255) NOT NULL,
	Correo varchar(255) NOT NULL UNIQUE;
	Dirección varchar(255),
	Teléfono varchar(20),
	Libre Bool DEFAULT TRUE,
	Puesto varchar(20),
	PRIMARY KEY (ID_Empleado),
	UNIQUE INDEX (Apellido, Nombre)
);

CREATE TABLE Mecanicos_Proyecto(
	ID_Mecanicos INT AUTO_INCREMENT,
	FK_Mecanico INT NOT NULL,
	FK_Reparacion INT NOT NULL,
	PRIMARY KEY(ID_Mecanicos),
	FOREIGN KEY(FK_Mecanico) REFERENCES Empleado(ID_Empleado),
	FOREIGN KEY(FK_Reparacion) REFERENCES Reparacion(ID_Reparacion)
);

CREATE TABLE Factura(
	ID_Reparacion INT,
	Total_Refacciones Decimal(6,2),
	Total_Mano_obra Decimal(6,2),
	Total Decimal(6,2),
	PRIMARY KEY(ID_Reparacion),
	CONSTRAINT FK_Reparacion FOREIGN KEY (ID_Reparacion) REFERENCES Reparacion(ID_Reparacion) 
);