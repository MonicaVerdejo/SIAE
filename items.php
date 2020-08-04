<div class="card articulo" style="width: 18rem;  display: inline-block; vertical-align: top;
    text-align: center;margin-left: 5%; margin-bottom:3%;">
    <input type="hidden" id="id" value="<?php echo $item['id'];  ?>">
    <img src="img/cultura/<?php echo $item['img1']; ?>" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title"><?php echo $item['nombreRepresentativo']; ?></h5>
        <p class="card-text"><?php echo $item['descripcion']; ?></p>
        <div class="card-footer text-center">
            <small class="text-muted"><?php echo $item['taller']; ?></small>
        </div>
      
    </div>
</div>