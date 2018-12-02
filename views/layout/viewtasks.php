<h3>Tareas Activas</h3>

<table class="table table-bordered"  id="tablaTasks" >
    <thead>
        <tr>
            <th>Id del Proceso</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Tipo de Tarea</th>
            <th>Asignada</th>
            <th>Completada</th>
            <th>Prioridad</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($tasks as $task) {
        echo '<tr>';
        echo '<td>' . $task->processId . '</td>';
        echo '<td>' . $task->displayName . '</td>';
        echo '<td>' . $task->description . '</td>';
        echo '<td>' . $task->type . '</td>';
        echo '<td>' . $task->assigned_date . '</td>';
        echo '<td>' . $task->reached_state_date . '</td>';
        echo '<td>' . $task->priority . '</td>';
        echo '<td>' . $task->state . '</td>';
        echo '</tr>';
        }
        ?>
    </tbody>
</table>

<h3>Tareas terminadas</h3>

<table class="table table-bordered" >
    <thead>
        <tr>
            <th>Id del Proceso</th>
            <th>Nombre</th>
            <th>Descripci&oacute;n</th>
            <th>Tipo de Tarea</th>
            <th>Asignada</th>
            <th>Completada</th>
            <th>Prioridad</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($archivedTasks as $task) {
            echo '<tr>';
            echo '<td>' . $task->processId . '</td>';
            echo '<td>' . $task->displayName . '</td>';
            echo '<td>' . $task->description . '</td>';
            echo '<td>' . $task->type . '</td>';
            echo '<td>' . $task->assigned_date . '</td>';
            echo '<td>' . $task->reached_state_date . '</td>';
            echo '<td>' . $task->priority . '</td>';
            echo '<td>' . $task->state . '</td>';
            echo '</tr>';
        }
        ?>
    </tbody>
</table>
