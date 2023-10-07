<?php
class CategoriasView
{
    public function showCategorias($categorias)
    {
        require_once './templates/Header.php';

        $href = '';

?>
        <ul class="list-group">
            <?php foreach ($categorias as $categoria) {
                $href = $categoria->id_categoria;
            ?>
                <li class="list-group-item item-task">
                    <div class="d-flex justify-content-around">
                        <a href="categoria/<?php echo $href ?>"><?php echo $categoria->categoria ?></a>
                        <a href="eliminarCategoria/<?= $href  ?>" type="button" class='btn btn-danger ml-auto'>Eliminar categoria</a>
                    </div>
                </li>

            <?php } ?>
        </ul>
        <?php require 'templates/FormCategoria.phtml' ?>
    <?php
        require_once './templates/Footer.php';
        return $href;
    }
}

class CategoriaView
{

    public function showCategoriaById($categoria)
    {
        require_once './templates/Header.php';


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
                    <?php foreach ($categoria as $categoria) { ?>
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

        require_once './templates/Footer.php';
    }
}
?>