<div class="card articulo" style="width: 18rem;  display: inline-block; vertical-align: top;
    text-align: center;margin-left: 5%; margin-bottom:3%;">
    <input type="hidden" id="id" value="<?php echo $item['id'];  ?>">
    <img src="img/<?php echo $item['categoria']; ?>/taller/<?php echo $item['img1']; ?>" style="height: 200px; width:200px;" class="card-img-top mt-1" alt="Taller">
    <h5 class=" text-center" style="text-transform: uppercase;"><?php echo $item['nombre']; ?></h5>
    <small class="card-text text-center"><?php echo $item['descripcion']; ?></small>
    <div class="card-body">
        <div class="card-footer text-center">
            <small class="text-muted"><?php echo $item['taller']; ?></small>
        </div>
    </div>
</div>