use GeekNews;
DELIMITER //
CREATE PROCEDURE sp_Usuario_Insertar(IN _Nombre varchar(50), IN _Apellidos varchar(50),IN _Email varchar(50),
									IN _Contrasena varchar(100),IN _Telefono varchar(12), IN _FNacimiento varchar(15),
									IN _Genero varchar(15))
BEGIN
	insert into Usuario (Nombre,Apellidos,Email,Contrasena, telefono, FNacimiento,Genero) 
		Values(_Nombre,_Apellidos,_Email,_Contrasena, _telefono, STR_TO_DATE(_FNacimiento,'%Y-%m-%d'),_Genero);
	select true;
END 
//
DELIMITER ;

DELIMITER //
CREATE PROCEDURE sp_Usuario_Validar(IN _Email varchar(50))
BEGIN
	/*Devuelve el numero de usuarios con ese correo y contraseña*/
	select idUsuario as Retorno, Contrasena from Usuario where Email = _Email;
END 
//
DELIMITER ;

DELIMITER //
CREATE PROCEDURE sp_Usuario_ValidarAdmin(IN _id int)
BEGIN
	/*Devuelve true si el usuario es admin*/
	SELECT Privilegios from Usuario WHERE idUsuario=_id;
END 
//
DELIMITER ;


DELIMITER //
CREATE PROCEDURE sp_Usuario_Obtener(IN _id int)
BEGIN
	select idUsuario, Nombre, Apellidos, Email, Contrasena, Telefono,
			FNacimiento, Genero, Avatar, Portada, Privilegios, Activo from Usuario where idUsuario=_id;
END 
//
DELIMITER ;

DELIMITER //
CREATE PROCEDURE sp_Seccion_ConsultarTodo()
BEGIN
	/*Devuelve todas las secciones*/
	SELECT idSeccion, Nombre, Descripcion, Imagen, Relevancia From Seccion;
END 
//
DELIMITER ;


DELIMITER //
CREATE PROCEDURE sp_Noticia_Insertar(IN _Titulo VARCHAR(50), IN _Cuerpo TEXT, IN _idReportero int, IN idSeccion int)
BEGIN
	/*Inserta Noticia*/
	INSERT into Noticia(Titulo, Cuerpo, idReportero, idSeccion)
	VALUES(_Titulo,_Cuerpo,_idReportero, idSeccion);
    SELECT LAST_INSERT_ID() as Retorno;
END 
//
DELIMITER ;

DELIMITER //
CREATE PROCEDURE sp_Multimedia_Insertar(IN _idNoticia int, IN _Path varchar(255))
BEGIN
	/*Inserta Noticia*/
	INSERT into Multimedia(idNoticia, Path) VALUES (_idNoticia, _Path);
END 
//
DELIMITER ;


DELIMITER //
CREATE PROCEDURE sp_Noticia_Obtener(IN _idNoticia int)
BEGIN
	SELECT * from View_Noticia_Completa where idNoticia = _idNoticia;
END 
//
DELIMITER ;

DELIMITER //
CREATE PROCEDURE sp_Comentario_Insertar(IN _Email varchar(50), IN _Comentario varchar(255), IN _idNoticia integer)
BEGIN
	insert into Comentario(Email, Comentario, idNoticia, Visible)
		values(_Email, _Comentario, _idNoticia,true);
END 
//
DELIMITER ;

DELIMITER //
CREATE PROCEDURE sp_Comentario_Obtener(IN _ID integer)
BEGIN
	select * from View_Comentario_Short where idNoticia = _ID;
END 
//
DELIMITER ;

DELIMITER //
CREATE PROCEDURE sp_Noticia_ObtenerTodoF(IN _ID integer)
BEGIN
	select * from View_Noticia_Tarjeta where idSeccion = _ID;
END 
//
DELIMITER ;

DELIMITER //
CREATE PROCEDURE sp_Noticia_ObtenerTodo()
BEGIN
	select * from View_Noticia_Tarjeta;
END 
//
DELIMITER ;

DELIMITER //
CREATE PROCEDURE sp_Comentario_Borrar(IN _ID integer)
BEGIN
	delete from Comentario where idComentario = _ID;
END 
//
DELIMITER ;

DELIMITER //
CREATE PROCEDURE sp_Noticia_MeGusta(IN _ID integer)
BEGIN
	update Noticia set MeGusta = MeGusta + 1 where idNoticia=_ID;
END 
//
DELIMITER ;

DELIMITER //
CREATE PROCEDURE sp_Noticia_Visita(IN _ID integer)
BEGIN
	update Noticia set Visitas = Visitas + 1 where idNoticia=_ID;
END 
//
DELIMITER ;

DELIMITER //
CREATE PROCEDURE sp_Busqueda(IN _par varchar(100))
BEGIN
	select * from View_Noticia_Tarjeta where Titulo like concat("%",_par,"%") or Cuerpo like concat("%",_par,"%") or Reportero like concat("%",_par,"%");
END 
//
DELIMITER ;

DELIMITER //
CREATE PROCEDURE sp_Usuario_InsertarTodo(IN _Nombre varchar(50), IN _Apellidos varchar(50),IN _Email varchar(50),
									IN _Contrasena varchar(100),IN _Telefono varchar(12), IN _FNacimiento varchar(15),
									 IN _Avatar blob, IN _Portada blob)
BEGIN
	insert into Usuario (Nombre,Apellidos,Email,Contrasena, telefono, FNacimiento,Genero, Avatar, Portada) 
		Values(_Nombre,_Apellidos,_Email,_Contrasena, _telefono, STR_TO_DATE(_FNacimiento,'%Y-%m-%d'),
        _Avatar, _Portada);
	select true;
END 
//
DELIMITER ;
