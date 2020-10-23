<?php
include_once '../db.php';

class Talleres extends DB{
    function __construct()
    {
        parent::__construct();
    }

    public function get($id){
        $query = $this->connect()->prepare('SELECT id,taller,nombre,descripcion,img1,categoria FROM talleres WHERE id= :id LIMIT 0,12');
        $query->execute(['id'=>$id]);
        
        $row=$query->fetch();

        return[
            'id' => $row['id'],
            'taller' => $row['taller'],
            'nombre' => $row['nombre'],
            'descripcion' => $row['descripcion'],
            'img1' => $row['img1'],
            'categoria' => $row['categoria'],
        ];
    
    }

    public function getItemsByCategory($category){
        $query = $this->connect()->prepare('SELECT id,taller,nombre,descripcion,img1,categoria FROM talleres WHERE categoria= :cat LIMIT 0,12');
        $query->execute(['cat'=>$category]);
        
        $items = []; //creo mi arreglo de arreglos 

       while( $row=$query->fetch(PDO::FETCH_ASSOC)){
           //item es el arreglo que contendra mis columnas
        $item = [
            'id' => $row['id'],
            'taller' => $row['taller'],
            'nombre' => $row['nombre'],
            'descripcion' => $row['descripcion'],
            'img1' => $row['img1'],
            'categoria' => $row['categoria'],
        ];
         array_push($items,$item);
       }

        return $items;
    }
}
?>