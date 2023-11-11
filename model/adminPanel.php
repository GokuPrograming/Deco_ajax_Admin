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
        limit 5 ";

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
        /*select count(v.id_lista_cursos) as ventasDECurso, fecha
from venta v
         join deco.lista_curso lc on v.id_lista_cursos = lc.id_lista_cursos
where fecha
          between '2023-11-03' and '2023-11-20'
group by fecha; */
        $query = "SELECT count(v.id_lista_cursos) as ventasDECurso, fecha
        from venta v
         join deco.lista_curso lc on v.id_lista_cursos = lc.id_lista_cursos
        where fecha
        between '2023-11-03' and '2023-11-20'
        group by fecha
        ";

        $stmt = $this->db->prepare($query);
        $stmt->execute();

        $cursos = array(); // Inicializa un array para almacenar los cursos

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $cursos[] = $row;
        }
        return $cursos;
    }
}
