<?php
class PeliModel {
    private $db;

    public function __construct() {
       $this->db = new PDO('mysql:host=localhost;dbname=db_films;charset=utf8', 'root', '');
    }

    public function getPelis($orderBy = false) {
        $sql = 'SELECT * FROM peliculas';


        if($orderBy) {
            switch($orderBy) {
                case 'nombre':
                    $sql .= ' ORDER BY nombre';
                    break;
                case 'director':
                    $sql .= ' ORDER BY director';
                    break;
            }
        }

        // 2. Ejecuto la consulta
        $query = $this->db->prepare($sql);
        $query->execute();
    
        // 3. Obtengo los datos en un arreglo de objetos
        $pelis = $query->fetchAll(PDO::FETCH_OBJ); 
    
        return $pelis;
    }

    public function getPeli($id) {    
        $query = $this->db->prepare('SELECT * FROM peliculas WHERE id_peliculas = ?');
        $query->execute([$id]);   
    
        $peli = $query->fetch(PDO::FETCH_OBJ);
    
        return $peli;
    
    }
    



    public function insertPelis($name, $director, $date){
        $query = $this->db->prepare('INSERT INTO peliculas(nombre, director, fecha_estreno) VALUES (?, ?, ?)');
        $query->execute([$name, $director, $date]);
        $id = $this->db->lastInsertId();
    
        return $id;


    }


    public function deletePeli($id){

        $query = $this->db->prepare('DELETE FROM peliculas WHERE id_peliculas = ?');
        $query->execute([$id]);
    }

    public function editarPeli($id, $nombre, $director, $fecha_estreno) {

        $query = $this->db->prepare('UPDATE peliculas SET nombre = ?, director = ?, fecha_estreno = ? WHERE id_peliculas = ?');
        $query->execute([$nombre, $director, $fecha_estreno, $id]);
    }
}

