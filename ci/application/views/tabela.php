<?php $this->load->view('header'); 
            if(isset($altera)){
              echo "<h3>".$altera."</h3>";
            }elseif(isset($cadastra)){
              echo "<h3>".$cadastra."</h3>";
            }elseif(isset($deleta)){
              echo "<h3>".$deleta."</h3>";
            } ?>
    <br><br>
    <h1 class="col-md-10 mx-auto">Livros Registrados</h1>
    <br><br>
    <div class="col-md-10 mx-auto">
            <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">ISBN</th>
            <th scope="col">Nome</th>
            <th scope="col">Editora</th>
            <th scope="col">Ano</th>
            <th scope="col">IdAutor</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($livro as $row){ ?>
            <tr>
            <?php $temp = $row->idLivro ?>
            <th scope="row"><?php echo $row->idLivro ?></th>
            <td><?php echo $row->isbn ?></td>
            <td><?php echo $row->nome ?></td>
            <td><?php echo $row->editora ?></td>
            <td><?php echo $row->ano ?></td>
            <td><?php echo $row->idAutor ?></td>
            <td><a type="button" href="<?php echo base_url('index.php/pagina/alter/'.$temp) ?>" value="<?php echo $row->idLivro; ?>" class="btn btn-success">Alterar</a></td>
            <td><a type="button" href="<?php echo base_url('index.php/pagina/deleta/'.$temp) ?>" value="<?php echo $row->idLivro; ?>" class="btn btn-danger">Deletar</a></td>
            </tr>
        <?php } ?>
        </tbody>
        </table>
    </div>
</body>
</html>