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
        $query = "SELECT id_venta,nombre,primer_apellido,segundo_apellido,fecha from cliente c
        join deco.usuario u on u.id_usuario = c.id_usuario
        join deco.venta v on u.id_usuario = v.id_usuario
        WHERE c.id_usuario = :user_id";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();

        $cursos = array(); // Inicializa un array para almacenar los cursos

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $cursos[] = $row;
        }
        return $cursos; // Devuelve el array de cursos
    }
}
