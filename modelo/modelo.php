<?php
class Denuncias {
    private $denuncia;
    private $db;

    public function __construct() {
        $this->denuncia = array();
        $this->db = new PDO('mysql:host=localhost;dbname=bd_pruebalogro', "root", "");
    }

    private function setNames() {
        return $this->db->query("SET NAMES 'utf8'");
    }

    // Método para obtener todas las denuncias
    public function getDenuncias() {
        self::setNames();
        $sql = "SELECT * FROM denuncias";
        $statement = $this->db->query($sql);
        foreach ($statement as $denuncia) {
            $this->denuncia[] = $denuncia;
        }
        $statement->closeCursor();
        return $this->denuncia;
    }

    public function setDenuncia($titulo, $descripcion, $ubicacion, $estado, $ciudadano, $telefono_ciudadano) {
        self::setNames();
        $sql = "INSERT INTO denuncias (titulo, descripcion, ubicacion, estado, ciudadano, telefono_ciudadano) VALUES (?, ?, ?, ?, ?, ?)";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $titulo, PDO::PARAM_STR);
        $statement->bindParam(2, $descripcion, PDO::PARAM_STR);
        $statement->bindParam(3, $ubicacion, PDO::PARAM_STR);
        $statement->bindParam(4, $estado, PDO::PARAM_STR);
        $statement->bindParam(5, $ciudadano, PDO::PARAM_STR);
        $statement->bindParam(6, $telefono_ciudadano, PDO::PARAM_STR);
        $success = $statement->execute();
        return $success;
    }

    // Método para actualizar una denuncia existente
    public function updateDenuncia($id, $titulo, $descripcion, $ubicacion, $estado, $ciudadano, $telefono_ciudadano) {
        self::setNames();
        $sql = "UPDATE denuncias SET titulo = ?, descripcion = ?, ubicacion = ?, estado = ?, ciudadano = ?, telefono_ciudadano = ? WHERE id = ?";
        $statement = $this->db->prepare($sql);
    
        // Vincular todos los parámetros
        $statement->bindParam(1, $titulo, PDO::PARAM_STR);
        $statement->bindParam(2, $descripcion, PDO::PARAM_STR);
        $statement->bindParam(3, $ubicacion, PDO::PARAM_STR);
        $statement->bindParam(4, $estado, PDO::PARAM_STR);
        $statement->bindParam(5, $ciudadano, PDO::PARAM_STR);
        $statement->bindParam(6, $telefono_ciudadano, PDO::PARAM_STR);
        $statement->bindParam(7, $id, PDO::PARAM_INT); // Asegúrate de vincular el id también
    
        $success = $statement->execute();
        return $success;
    }
    

    public function deleteDenuncia($id) {
        self::setNames();
        $sql = "DELETE FROM denuncias WHERE id = ?";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $id, PDO::PARAM_INT);
        $success = $statement->execute();
        return $success;
    }

    public function getDenunciaById($id) {
        self::setNames();
        $sql = "SELECT * FROM denuncias WHERE id = ?";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $id, PDO::PARAM_INT);
        $statement->execute();
        $denuncia = $statement->fetch(PDO::FETCH_ASSOC);
        return $denuncia ? $denuncia : null;
    }
}
?>
