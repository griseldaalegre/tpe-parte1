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
    
    
        ?>
        
                <body>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Título</th>
                                <th>Autor</th>
                                <th>Año</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($categoria as $categoria) { ?>
                            <tr>
                                <td><?php echo $categoria->titulo_libro ?></td>
                                <td><?php echo $categoria->autor_libro ?></td>
                                <td><?php echo $categoria->anio ?></td>
                            </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </body>
    <?php
    
    require_once './templates/footer.php';

    }
    
}
?>
