<?php
class historialCompras

{ 
    private $db;
    private $user_id;
    public function __construct()
    {
        $con = new Conexion();
        $this->db = $con->conectar();
    }
    public function MostrarCompras($user_id)
    {
        $query = "SELECT id_venta,nombre,primer_apellido,segundo_apellido,fecha,v.id_paypal from cliente c
        join deco.usuario u on u.id_usuario = c.id_usuario
        join deco.venta v on u.id_usuario = v.id_usuario
        WHERE c.id_usuario = :user_id
        group by fecha
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();

        $cursos = array(); // Inicializa un array para almacenar los cursos

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $cursos[] = $row;
        }
        return $cursos; // Devuelve el array de cursos
    }
    public function MostrarICompras($user_id, $fecha)
    {
        $query = "
        SELECT titulo,precio,id_venta, nombre, primer_apellido, segundo_apellido, fecha, v.id_paypal
        from cliente c
                 join deco.usuario u on u.id_usuario = c.id_usuario
                 join deco.venta v on u.id_usuario = v.id_usuario
                 join deco.lista_curso lc on lc.id_lista_cursos = v.id_lista_cursos
       
        WHERE c.id_usuario = :user_id 
        and fecha =:fecha
        order by fecha desc
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $fecha_formateada = date('Y-m-d', strtotime($fecha));
        $stmt->bindParam(':fecha', $fecha_formateada, PDO::PARAM_STR);
        $stmt->execute();

        $cursos = array(); // Inicializa un array para almacenar los cursos

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $cursos[] = $row;
        }
        return $cursos; // Devuelve el array de cursos
    }
}
