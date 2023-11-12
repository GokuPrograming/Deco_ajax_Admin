<?php

class admin_panel
{
    private $db;

    public function __construct()
    {
        $con = new Conexion();
        $this->db = $con->conectar();
    }

    public function listaDeloMasVendido()
    {

        /*select v.id_lista_cursos,lc.titulo, count(lc.id_lista_cursos) as cantidad
from venta v
join deco.lista_curso lc on v.id_lista_cursos = lc.id_lista_cursos
group by lc.id_lista_cursos
order by count(v.id_lista_cursos) desc
; */

        $query = "SELECT v.id_lista_cursos,lc.titulo, count(lc.id_lista_cursos) as cantidad
        from venta v
        join deco.lista_curso lc on v.id_lista_cursos = lc.id_lista_cursos
        group by lc.id_lista_cursos
        order by count(v.id_lista_cursos) desc
        limit 8";

        $stmt = $this->db->prepare($query);
        $stmt->execute();

        $cursos = array(); // Inicializa un array para almacenar los cursos

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $cursos[] = $row;
        }
        return $cursos;
    }
    public function usuariosTOP()
    {
        /*SELECT u.id_usuario,u.correo,count(v.id_lista_cursos) cantidad from venta v
join deco.usuario u on v.id_usuario = u.id_usuario
group by u.correo
order by  count(v.id_lista_cursos) desc
limit 3; */
        $query = "SELECT u.id_usuario,u.correo,count(v.id_lista_cursos) cantidad from venta v
        join deco.usuario u on v.id_usuario = u.id_usuario
        group by u.correo
        order by  count(v.id_lista_cursos) desc
        limit 10";

        $stmt = $this->db->prepare($query);
        $stmt->execute();

        $cursos = array(); // Inicializa un array para almacenar los cursos

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $cursos[] = $row;
        }
        return $cursos;
    }

    public function usuariosTodos()
    {
        /*select u.correo,u.id_usuario,u.id_rol,r.rol from usuario u
join rol r on r.id_rol = u.id_rol; */
        $query = "SELECT u.correo,u.id_usuario,u.id_rol,r.rol from usuario u
        join rol r on r.id_rol = u.id_rol
        order by u.id_usuario asc
        ";

        $stmt = $this->db->prepare($query);
        $stmt->execute();

        $cursos = array(); // Inicializa un array para almacenar los cursos

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $cursos[] = $row;
        }
        return $cursos;
    }
    public function graficaVentaPeriodo($fecha1, $fecha2)
    {
        $query = "SELECT COUNT(v.id_lista_cursos) as cantidad, fecha
                  FROM venta v
                  JOIN deco.lista_curso lc ON v.id_lista_cursos = lc.id_lista_cursos
                  WHERE fecha BETWEEN :fechaInicio AND :fechaFinal
                  GROUP BY fecha";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':fechaInicio', $fecha1);
        $stmt->bindParam(':fechaFinal', $fecha2);
        $stmt->execute();

        $cursos = array(); // Inicializa un array para almacenar los cursos

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $cursos[] = $row;
        }

        return $cursos;
    }
    //select  id_rol,rol from rol;
    public function traerRol()
    {

        /*select v.id_lista_cursos,lc.titulo, count(lc.id_lista_cursos) as cantidad
from venta v
join deco.lista_curso lc on v.id_lista_cursos = lc.id_lista_cursos
group by lc.id_lista_cursos
order by count(v.id_lista_cursos) desc
; */
        $query = "select  id_rol,rol from rol";

        $stmt = $this->db->prepare($query);
        $stmt->execute();

        $cursos = array(); // Inicializa un array para almacenar los cursos

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $cursos[] = $row;
        }
        return $cursos;
    }
    public function actualizarRolUsuario($idUsuario, $idRol)
{
    try {
        $query = "UPDATE usuario SET id_rol = :idRol WHERE id_usuario = :idUsuario";

        $stmt = $this->db->prepare($query);

        // Asignar valores a los parámetros
        $stmt->bindParam(':idRol', $idRol, PDO::PARAM_INT);
        $stmt->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);

        // Ejecutar la sentencia
        $stmt->execute();

        // Devolver éxito o algún otro indicador si es necesario
        return true;
    } catch (PDOException $e) {
        // Manejar el error de alguna manera (puede ser un log, lanzar una excepción, etc.)
        // Puedes personalizar esto según tus necesidades
        return false;
    }
}

}
