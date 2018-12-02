<table width="100%" class="table table-striped table-bordered table-hover">
    <thead>
    <tr>
        <th>Artículo</th>
        <th>Cantidad</th>
        <th>Monto Total</th>
        <th>Promedio</th>
    </tr>
    </thead>
    <tbody>
    <?php
    
    foreach ($sales as $sale){
        echo '<tr>';
        echo '<td>'. $sale['articulo'] . '</td>';
        echo '<td>'. $sale['cantidad'] . '</td>';
        echo '<td>'. $sale['montoTotal'] . '</td>';
        echo '<td>'. $sale['promedio'] . '</td>';
    }
    ?>
    </tbody>
</table>