<?php 
include_once 'talleres.php';
//mapear las solicitudes de los usuarios
if(isset($_GET['categoria'])){
    $categoria = $_GET['categoria'];

    if($categoria == ""){
        echo json_encode(['statuscode' => 400, 'response' =>'No existe categoria']);
    }else{
        $categoria = $_GET['categoria'];
        $productos = new Talleres();
        $items = $productos->getItemsByCategory($categoria);
        echo json_encode(['statuscode'=>200, 'items'=>$items]);
    }

}else if(isset($_GET['get-item'])){
    $id = $_GET['get-item'];
    if ($id = "") {
        echo json_encode(['statuscode'=>400, 'response'=>'No hay valor para id']);
    } else {
        $id = $_GET['get-item'];
        $productos = new Talleres();
        $item= $productos->get($id);
        echo json_encode(['statuscode'=> 200, 'item'=>$item]);
    }   

}else{
    echo json_encode(['statuscode' => 400, 'response' =>'No existe categoria']);
}

?>