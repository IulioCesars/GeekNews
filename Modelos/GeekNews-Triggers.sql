use geeknews;

show triggers;

/*Forma del nombre de los triggers 
Accion_Disparador
*/


DELIMITER //
CREATE TRIGGER BorrarComentarios_Noticia
BEFORE DELETE
   ON Noticia FOR EACH ROW
BEGIN
	delete from Comentario where idNoticia = OLD.idNoticia;
END; //

DELIMITER //
CREATE TRIGGER BorrarMultimedia_Noticia
BEFORE DELETE
   ON Noticia FOR EACH ROW
BEGIN
	delete from Multimedia where idNoticia = OLD.idNoticia;
END; //

delete from noticia where idNoticia = 49

DELIMITER //
CREATE TRIGGER BorrarNoticia_Usuario
BEFORE DELETE
   ON Usuario FOR EACH ROW
BEGIN
	delete from Noticia where idReportero = OLD.idUsuario;
END; //
