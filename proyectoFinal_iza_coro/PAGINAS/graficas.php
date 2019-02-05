<?php
	$connect = mysqli_connect("localhost","root","","educacion");
	$query = "SELECT count(razon)as cantidad, razon from poblacion where asisteClases='no'  group by razon";
	$result = mysqli_query($connect,$query);
	
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<title>GRAFICAS</title>

    <link rel="stylesheet" href="../css/estilos_responsive.css">
    <link rel="stylesheet" href="../CSS/estilo_fromlogin.css">
    <link rel="stylesheet" href="../CSS/estilo_header.css">
    <link rel="stylesheet" href="../CSS/estilo_skills.css">
        
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['razon', 'cantidad'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["razon"]."', ".$row["cantidad"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Porcentaje de empleados por cargo',  
                      //is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
	</script>  
</head>
<body>
       <header>
        <a href="#"><img src="../IMAGENES/logo.jpg" alt=""   width="150px" height="80px" class="logo"></a>
        <nav>
            <ul>
            <li><a href="../index.php" class="list-item">Inicio</a></li>         </ul>
        </nav>
    </header>
	<br/>
	<br/>
	<div style="width:900px">
		<h3 align="center">Gráfico de Pastel - API Google</h3>
		<br/>
		<div id="piechart" style="width:900px; height:500px" ></div>
	</div>
	 <?php require '../PAGINAS/footer.php' ?>
</body>
</html>
   

       

