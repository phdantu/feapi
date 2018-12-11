<?php $this->load->view('header'); 
            if(isset($altera)){
              echo "<h3>".$altera."</h3>";
            }elseif(isset($cadastra)){
              echo "<h3>".$cadastra."</h3>";
            }elseif(isset($deleta)){
              echo "<h3>".$deleta."</h3>";
            } ?>
    <br><br>
    <h1 class="col-md-10 mx-auto">Autores Registrados</h1>
    <br><br>
    <div class="col-md-10 mx-auto">
            <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">País</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($autores as $row){ ?>
            <tr>
            <?php $temp = $row->idAutor ?>
            <th scope="row"><?php echo $row->idAutor ?></th>
            <td><?php echo $row->nome ?></td>
            <td><?php echo $row->pais ?></td>
            <td><a type="button" href="<?php echo base_url('index.php/pagina/alterAutor/'.$temp) ?>" value="<?php echo $row->idAutor; ?>" class="btn btn-success">Alterar</a></td>
            <td><a type="button" href="<?php echo base_url('index.php/pagina/deletaAutor/'.$temp) ?>" value="<?php echo $row->idAutor; ?>" class="btn btn-danger">Deletar</a></td>
            </tr>
        <?php } ?>
        </tbody>
        </table>
    </div>
</body>
</html>