<?php
    class LessonsView{

        function __construct(){

        }

        function show($lessons){
            ?>
            
                <main>
            
                <section class="lessons">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Tema</th>
                          <th>Descripcion</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                             <?php foreach($lessons as $key => $lesson) { ?>
                        
                            <tr>
                              <td> <img src="<?php echo $lesson['img_src'] ?>" alt="<?php echo $lesson['tema'] ?>"> <?php echo $lesson ['tema'] ?></td>
                              <td><?php echo $lesson['descripcion'] ?></td>
                              <td>
                                <form method="post" action="">
                                <input  class="btn btn-outline-danger" type="submit" value="Agregar">
                                </form>
                              </td>
                          </tbody>
                          <?php } ?>
                        </table>
                </section>
            
                </main>
                <?php require_once 'templates/footer.html'; ?>
            <?php }
    }
?>