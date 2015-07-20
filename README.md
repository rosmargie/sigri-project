PROYECTO SIGRI
==============

En esta parte del proyecto se ha realizado la autentificacion del usuario y sus roles. 
Para que funcione adecuadamente se debe seguir los siguientes pasos:


1) Obtener la ultima version de Master
--------------------------------------

Estando en la rama "master", realizar lo siguiente:

  git pull origin master


2) Adecuar la BD a las nuevas tablas creadas
--------------------------------------------

Se han creado nuevas entidades y a otras se han agregado/modificado sus campos, para poder adecuar estas a las tablas, se usa un comando de doctrine que hace que el valor de las entidades las refleje en la base de datos sin tener que modificar nada de la BD. Dentro de la carpeta inicial del proyecto hacer:

  php app/console doctrine:schema:update --force

*Si es que sale algun error es porque hay algunos campos o variables de entidades que tienen conflictos entre la BD local.


3) Agregar usuarios de prueba para poder loguearse
--------------------------------------------------

Primeramente eliminar la informacion de todas las tablas de la BD local

  SET FOREIGN_KEY_CHECKS=0; 
  SET SQL_SAFE_UPDATES = 0;
  delete from empleado;
  delete from solicitudes;

Agregar la nueva informacion de usuarios para poder acceder:

  /*ROLES*/

  INSERT INTO `rol` VALUES (1,'ROLE_ADMIN'),(2,'ROLE_EMPLEADO'),(3,'ROLE_GESTOR'),(4,'ROLE_PERSONALOTI');

  alter table `empleado` AUTO_INCREMENT=5;

  /*UNIDAD ORGANICA*/

  INSERT INTO `unidad_organica` VALUES (1,'Seleccion y Nombramiento',352),(2,'Presidencia',353),(3,'Tramites documentarios',354),(4,'Recepcion',355);

  alter table `empleado` AUTO_INCREMENT=5;

  /*EMPLEADO*/

  INSERT INTO `empleado` (ID_EMPLEADO,NOMBRE,APELLIDO_PATERNO,APELLIDO_MATERNO,TELEFONO,EMAIL,DIRECCION,UNIDAD_ORGANICA_ID_UNIDAD_ORGANICA,USERNAME,PASSWORD,SALT)
  VALUES (29,'gfdfd','gfdgfd','dgffdg','435435','dfgdffdg','fdgdfg',3,'prueba_solicitante','ddGP1IyrOJgEpyXrPoz4kG+H4mRWnZf6HaFCZhr9K0fYamtRxsGxV+q083o6Ta17HtdfkC+eraUVbAVQxtahzQ==','107c9892c2e3d4c25b487cdb8b7aef2d'),(30,'sdfsdf','sdfsdf','dsfsdf','3423432','sdfsdf','sdfsdf',4,'prueba_gestor','4WXAGJI5BoprJMMtqszUOgms2un0mfrysNT7BUmWPzB3ewZt6wqLgwmp4/L1yPX/qnDv0aTOn8GM/GQ6ICEoYQ==','baf243eafa046897038e5257a2daf19e'),(31,'dsfsdf','sdfsdfsdf','dgfdfg','234324','fgdgdfg','sdfsdf',4,'prueba_personaloti','sRr9sm8qvUhYH9GZ+usxGyIuIJ1PTw99NE6hYw54P5VaO5LDNr8ZUIkSe9S43EweTb2ArgvCKsPXir1uhQLR1g==','fe5a2cffb717d99e04855c0fefd3a9b2'),(32,'ghjghjghjg','sdfsdffsd','dfgdfgdfg','32432432','dfsdfdf','sdfsdf',3,'prueba_gestorsolo','ylTlE1SpMGRSSyUwgjmaiTmyBrjAN9ozF627/V7/u3LRgwfjfu3yPwVfeXwBs98PiipuG8XnJk6sNyQjZv+M5A==','fe68fc9164f92f00b050b7b0928458a5');

  alter table `empleado` AUTO_INCREMENT=33;

  /*USER ROL*/

  INSERT INTO `user_role` VALUES (29,2),(30,1),(30,2),(30,3),(30,4),(31,2),(31,4),(32,1),(32,2),(32,3);

4) Iniciar Sesion
-----------------

  Los usuarios de prueba son:

  usuario: prueba_solicitante, password: 789456123

  usuario: prueba_gestor, password: 789456

  usuario: prueba_personaloti, password: 789456

  usuario: prueba_gestorsolo, password: 789456

