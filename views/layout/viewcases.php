<h3>Casos Activos</h3>
<table class="table table-striped" >
    <thead>
        <tr>
            <th>Id</th>
            <th>Id Proceso</th>
            <th>Fecha Inicio</th>
            <th>Actualizado el</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
    <?php 
        foreach ($cases as $case) {
            echo '<tr>';
            echo '<td>' . $case->id . '</td>';
            echo '<td>' . $case->processDefinitionId . '</td>';
            echo '<td>' . $case->start . '</td>';
            echo '<td>' . $case->last_update_date . '</td>';
            echo '<td>' . $case->state . '</td>';
            echo '</tr>';
        }
        ?>
    </tbody>
</table>

<h3>Casos Archivados</h3>


<table class="table table-striped" >
    <thead>
        <tr>
            <th>Id</th>
            <th>Id Proceso</th>
            <th>Fecha Inicio</th>
            <th>Finalizado</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($archivedCases as $case) {
            echo '<tr>';
            echo '<td>' . $case->id . '</td>';
            echo '<td>' .$case->processDefinitionId . '</td>';
            echo '<td>' . $case->start . '</td>';
            echo '<td>' . $case->end_date . '</td>';
            echo '</tr>';
        }
        ?>
    </tbody>
</table>