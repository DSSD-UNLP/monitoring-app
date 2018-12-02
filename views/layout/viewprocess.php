            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Versión</th>
                        <th>Fecha de Carga</th>
                        <th>Id de inicio</th>
                        <th>Estado</th>
                        <!-- <th>Acciones</th> -->
                    </tr>
                </thead>
                <tbody>
                        <?php 
                        foreach ($process as $p) { ?>
                        <tr>
                        
                            <td><?php echo $p->id; ?></td>    
                            <td><?php echo $p->name; ?></td>    
                            <td><?php echo $p->displayDescription; ?></td>    
                            <td><?php echo $p->version; ?></td>    
                            <td><?php echo $p->deploymentDate; ?></td>    
                            <td><?php echo $p->actorinitiatorid; ?></td>    
                            <td><?php echo $p->activationState; ?></td>    
                            <!-- <td></td>     -->
                        </tr>
                        <?php }  ?>
                    </tr>
                </tbody>
            </table>
