<?php

require('conexion.php');

class model_cursos
{
    private $db;
    public function __construct()
    {
        $con = new Conexion();
        $this->db = $con->conectar(); 
    }
    public function mostrarTodosLosCursos()
    {
        //  $query = "SELECT id_lista_cursos,titulo, imagen,precio FROM lista_curso";
        $query = "SELECT id_lista_cursos,titulo, imagen,precio FROM lista_curso";
        $stmt = $this->db->prepare($query);
        $rs = $stmt->execute();
        if ($rs === false) {
            $errorInfo = $this->db->errorInfo();
            echo "Error SQLSTATE: " . $errorInfo[0] . "<br>";
            echo "Código de error: " . $errorInfo[1] . "<br>";
            echo "Mensaje de error: " . $errorInfo[2] . "<br>";
        }
        $array = array();
        // $array = $stmt->fetch(PDO::FETCH_ASSOC);


        // $cursos = array(); // Inicializa un array para almacenar los cursos

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $array[] = $row;
        }
        return $array; // Devuelve el array de cursos
    }
}
