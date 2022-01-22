<div class="container">
    
    <section class="content pt-1 m-2">
        
        <div class="row justify-content-center">
        
            <div class="col-md-12 pt-1">
                <div class="row justify-content-center">
                    <div class="title-block">
                        <h1 class="title animated bounce"> REGISTRO DE PLAN DE PROYECTO</h1>
                    </div>
                </div>
                <hr>   

            </div>
            <div class="col-md-8 pt-0">                                             
                <div class="row justify-content-center text-justify"> 
              
                </div>       
            </div>
            

           
            
            <div class="col-md-8 pt-0">                     
                
                     
                   <div class="card ">
                      <div class="card-header text-white bg-success">
                        INVESTIGADOR
                      </div>
                      <div class="card-body m-4">

                    <form class="" action="<?php echo base_url('/index/guardar_registro') ?>" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                          <label for="validation01">Tipo documento:</label>
                           <?php
                           foreach ($tipodocumento as $fila) {
                                $op_td[$fila->id_tipodocumento] = $fila->tipodocumento;
                            }
                            echo form_dropdown("id_tipodocumento", $op_td,'' , 'class="form-control"'); ?>
                      </div>
                      <div class="form-group">
                          <label for="validation01">Número documento:</label>
                          <input type="number" name="numdocumento" class="form-control is-valid" 
                                 placeholder="DNI, CE, PASAPORTE" value="" required>
                      </div>
                      <div class="form-group">
                          <label for="validation01">Nombres y Apellidos</label>
                          <input type="text" class="form-control is-valid" name="razonsocial" 
                                 placeholder="" value="" required>
                      </div>
                      <div class="form-group">
                          <label for="validation01">Dirección</label>
                          <input type="text" class="form-control is-valid" name="direccion" 
                                 placeholder="" value="" required>
                      </div>
                      <div class="form-group">
                          <label for="validation01">Correo</label>
                          <input type="text" class="form-control is-valid" name="email" 
                                 placeholder="" value="" required>
                      </div>
                      <div class="form-group">
                          <label for="validation01">Celular</label>
                          <input type="text" class="form-control is-valid" name="celular" 
                                 placeholder="" value="" required>
                      </div>
                      <div class="form-group">
                          <label for="validation02">Carrera Profesional</label>
                          <input type="text" class="form-control is-valid" name="carrera_profesional" 
                                 placeholder="" value="" required>
                      </div>
                      <div class="form-group">
                          <label for="validation02">Título de plan de Proyecto</label>
                          <textarea class="form-control" name="plan_proyecto"></textarea>
                      </div>
                      <div class="form-group">
                          <label for="validation02">Plan de Proyecto (.pdf)</label>
                          <input type="file" required="" name="plan_proyecto_doc" class="form-control" >
                      </div>

                       <button type="submit" class="btn btn-primary">Registrar</button>

                    </form>

                      </div>
                    </div>
                                             
                                    
                
            </div>
            
            <div class="col-md-4 ">       
                           
                <?php 
				$this->load->view('aside.php');
				?>                        
            </div>
            
        </div>

    </section>

</div>     