Create view View_Noticia_Completa as
	select n.idNoticia, n.Titulo, n.Cuerpo, n.Visitas, n.MeGusta, n.Autorizada, 
    CONCAT(u.Apellidos, " ", u.Nombre) as Reportero, s.Nombre as Seccion , 
    n.Fecha, m.Path as Multimedia  from Noticia as n 
		inner join Multimedia as m on  m.idNoticia=n.idNoticia
        inner join Usuario as u on u.idUsuario = n.idReportero
        inner join Seccion as s on s.idSeccion = n.idSeccion
        
Create view View_Comentario_Short as
	select idComentario, Email, Comentario, Fecha, idNoticia, Visible from Comentario;
    
Create view View_Noticia_Tarjeta as
	select n.idNoticia, n.Titulo, SUBSTRING(n.Cuerpo,1,40) as Cuerpo, n.Visitas, n.MeGusta, n.Autorizada, 
    CONCAT(u.Apellidos, " ", u.Nombre) as Reportero, s.Nombre as Seccion, s.idSeccion , 
    n.Fecha, m.Path as Multimedia  from Noticia as n 
		inner join Multimedia as m on  m.idNoticia=n.idNoticia
        inner join Usuario as u on u.idUsuario = n.idReportero
        inner join Seccion as s on s.idSeccion = n.idSeccion
        
Create view View_Seccion as
select idSeccion, Nombre, Descripcion, Imagen, Relevancia from seccion;