<?php
require '../vendor/autoload.php';
require '../class/Process.php';
require '../class/Cases.php';
require '../class/Login.php';
require '../class/Request.php';
require '../class/Task.php';
require '../class/Sale.php';


if (!isset($_SESSION['logged'])) {
    $hola = Login::login_bonita();
}
$process = Process::getAllProcess();
$response_case= Cases::getCases();
$cases=Cases::getCases()['data'];
$archivedCases= Cases::getArchivedCases()['data'];
$tasks=Task::getTasks()['data'];
$archivedTasks=Task::getArchivedTasks()['data'];
$sales = Sale::getTotalSales();

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitoreo</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container mt-3">
    <h2>Motireo Bonita</h2>
    <br>
    <!-- Nav tabs -->
    <ul class="nav nav-tabs">
        <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#process">Procesos (<?php echo count($process);?>)</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#case">Casos (<?php echo count($cases) + count($archivedCases);?>)</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#task">Tareas (<?php echo count($tasks) + count($archivedTasks);?>)</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#sale">Ventas (<?php echo count($sales);?>)</a>
        </li>
    </ul>
    </div>

 <!-- Tab panes -->
    <div class="tab-content">
        <div id="process" class="container tab-pane active">
            <?php include 'layout/viewprocess.php'; ?>
        </div>
        <div id="case" class="container tab-pane fade"><br>
            <?php include 'layout/viewcases.php'; ?>
        </div>
        <div id="task" class="container tab-pane fade"><br>
            <?php include 'layout/viewtasks.php'; ?>
        </div>
        <div id="sale" class="container tab-pane fade"><br>
            <?php include 'layout/viewsales.php'; ?>
        </div>
    </div>

</body>
</html>
<?php
