<?php
class CategoriaView {
    public function showCategoria($categorias) {
        require_once './templates/header.php';
        ?>
<ul class="list-group">
    <?php foreach($categorias as $categoria) { ?>
        <li class="list-group-item item-task">
            <div>
                <a href=""><?php echo $categoria->categoria ?></a>
            </div>
        </li>
        <?php } ?>
    </ul>
    <?php
require_once './templates/footer.php';
}
    }

    
?>
