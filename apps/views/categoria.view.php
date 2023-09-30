<?php
class CategoriasView {
    public function showCategorias($categorias) {
        require_once './templates/header.php';
        
        $href = '';

        ?>
            <ul class="list-group">
                <?php foreach($categorias as $categoria) { 
                    $href = $categoria->id_categoria;
                ?>
                    <li class="list-group-item item-task">
                        <div>
                            <a href="categoria/<?php echo $href ?>"><?php echo $categoria->categoria ?></a>
                        </div>
                    </li>
                    <?php } ?>
                </ul>
                <?php
            require_once './templates/footer.php';
            return $href;
    }
}

class CategoriaView {
    
    public function showCategoriaById($categoria) {
    require_once './templates/header.php';

        var_dump($categoria);

        echo 'holis';

    require_once './templates/footer.php';
}

}
    
?>
