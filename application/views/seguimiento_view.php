<div class="container">
    
    <section class="content pt-1 m-2">
        
        <div class="row justify-content-center">
        
            <div class="col-md-12 pt-1">
                <div class="row justify-content-center">
                    <div class="title-block">
                        <h1 class="title animated bounce"> SEGUIMIENTO DEL PLAN DE PROYECTO</h1>
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

                    <form class="" action="<?php echo base_url('/index/buscar_registro') ?>" method="post">
                     
                      <div class="form-group">
                          <label for="validation01">Número documento:</label>
                          <input type="number" name="numdocumento" class="form-control is-valid" 
                                 placeholder="DNI, CE, PASAPORTE" value="" required>
                      </div>
                       <button type="submit" class="btn btn-primary">Buscar</button>

                    </form>
                    </div>
                    <div class="col-md-12">       
                    <table class="table " width="100%" >
                            <thead class="card-header text-white bg-success">
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col" width="50%">Nombre del Proyecto</th>
                                <th scope="col">Asesor</th>
                                <th scope="col">Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php  
                        
                           
                            if (isset($grid)) {

										$i=1;
										foreach ($grid as $fila) { ?>
                                     <tr id="<?php echo $fila->id_proyecto; ?>">
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $fila->plan_proyecto; ?></td>
                                        <td><?php echo $fila->asesor; ?></td>
                                        <td><?php 
                                         if($fila->sts_proyecto =='RE'){
                                            echo "Registrado";  }

                                            elseif($fila->sts_proyecto =='AS'){
                                                echo "Aprobado para asesoramiento";  }
					    elseif($fila->sts_proyecto == 'RC') 
					    {echo "Rechazado";}
                                            elseif($fila->sts_proyecto =='CA'){
                                                    echo "Culminado y Aprobado";  }
                                            ?></td>
                                        
                                        
                                                        
                                         <?php }?>
                                    </tr> 
                                   <?php
								   $i++; 
								   }
								  ?>
                               
                            </tbody>
                            </table>

                            
                                                
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
