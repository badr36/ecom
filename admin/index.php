<?php
session_start();
include 'classes/Commande.php';

if(!isset($_SESSION['admin']))
  header("location: login.php");

$commande = new Commande();
$revenuespasmois = $commande->getRevenueParMois();
$commandeparmois = $commande->getCommandeParMois();
$getcategorie = $commande->getCategorie();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/index.css">
    <!-- any charts -->
    <script src="anychart-installation-package-8.11.0/js/anychart-base.min.js"></script>
    <script src="anychart-installation-package-8.11.0/js/anychart-ui.min.js"></script>
    <script src="anychart-installation-package-8.11.0/js/anychart-exports.min.js"></script>
    <link href="anychart-installation-package-8.11.0/css/anychart-ui.min.css" type="text/css" rel="stylesheet">
    <link href="anychart-installation-package-8.11.0/fonts/css/anychart-font.min.css" type="text/css" rel="stylesheet">
    <title>E-SHOP</title>
</head>
<body>

    <div class="side-bar">
    <h1><a href="index.php">E-<span style="color: #CA2E55;">SHOP</span></a></h1>
    <ul>
            <li class="active"><a href="index.php">Tableau de Bord</a></li>
            <li><a href="produits.php">Produits</a></li>
            <li><a href="commandes.php">Commandes</a></li>
            <li><a href="clients.php">Clients</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>

    <main>
        <div class="bar">
        <ul>
          <li>Admin</li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
        </div>
          <div class="infos">
            <div class="info">
                <img src="public/images/sales.svg" alt="">
                <div class="flex">
                    <p class="info-desc">Total Vente</p>
                    <p class="price"><?= $commande->getTotalVente() ?> MAD</p>
                </div>
            </div>
            <div class="info">
                <img src="public/images/sales2.svg" alt="">
                <div class="flex">
                    <p class="info-desc">Vente d'aujourd'hui</p>
                    <p class="price"><?= $commande->getTotalVenteAuj() ?> MAD</p>
                </div>
            </div>
            <div class="info">
                <img src="public/images/online-order.svg" alt="">
                <div class="flex">
                    <p class="info-desc">Total Commande</p>
                    <p class="price"><?= $commande->getTotalCommande() ?></p>
                </div>
            </div>
            <div class="info">
                <img src="public/images/order.svg" alt="">
                <div class="flex">
                    <p class="info-desc">Commande d'aujourd'hui</p>
                    <p class="price"><?= $commande->getTotalCommandeAuj() ?></p>
                </div>
            </div>
        </div>
        <div class="charts">
            <div class="chart" id="chart1">

            </div>
            <div class="chart" id="chart2">
    
            </div>
            
        </div>
        <div class="chart" id="chart3" style="padding-top: 3em;">
    
        </div>
    </main>




    <script>
      // chart 1
        anychart.onDocumentReady(function () {
         
          // create data set on our data
          var dataSet = anychart.data.set(getData());
    
          // map data for the first series, take x from the zero column and value from the first column of data set
          var firstSeriesData = dataSet.mapAs({ x: 0, value: 1 });
    
    
          // create line chart
          var chart = anychart.line();
    
          // adding dollar symbols to yAxis labels
          chart.yAxis().labels().format('MAD {%Value}');
    
          // turn on chart animation
          chart.animation(true);
    
          // turn on the crosshair
          chart
            .crosshair()
            .enabled(true)
            .yLabel({ enabled: false })
            .yStroke(null)
            .xStroke('#cecece')
            .zIndex(99);
    
        
    
          // set chart title text settings
          chart.title(
            'Revenue / Mois'
          );
    
          // create first series with mapped data
          var firstSeries = chart.spline(firstSeriesData);
          firstSeries.name('Revenue');
          firstSeries.markers().zIndex(100);
          firstSeries.hovered().markers().enabled(true).type('circle').size(4);
    
         
          // turn the legend on
          chart.legend().enabled(true).fontSize(13).padding([10, 0, 20, 0]);
          
          chart.xAxis().labels().width(40);
          chart.xAxis().labels().height(50);
          // set container id for the chart
          chart.container('chart1');
    
          // initiate chart drawing
          chart.draw();
        });
    
        function getData() {
          return [
            <?php while($rpm = $revenuespasmois->fetch()): ?>
            <?php echo "['{$rpm['d']}', {$rpm['tot']}]"?>,
            <?php endwhile ?>
          ];
        }

        // chart2

    anychart.onDocumentReady(function () {
      // create pie chart with passed data
      var chart = anychart.pie([
        <?php while($c = $getcategorie->fetch()): ?>
            <?php echo "['{$c['n']}', '{$c['tot']}']"?>,
            <?php endwhile ?>
      ]);

      // set chart title text settings
      chart
        .title('Commande / Catégorie')
        // set chart radius
        .radius('43%')
        // create empty area in pie chart
        .innerRadius('30%');

      // set container id for the chart
      chart.container('chart2');
      // initiate chart drawing
      chart.draw();
    });
      
    // chart 3
    anychart.onDocumentReady(function () {
      // create column chart
      var chart = anychart.column();

      // turn on chart animation
      chart.animation(true);

      // set chart title text settings
      chart.title('Commande / Mois');

      // create area series with passed data
      var series = chart.column([
        <?php while($cpm = $commandeparmois->fetch()): ?>
          <?php echo "['{$cpm['d']}', {$cpm['tot']}]"?>,
        <?php endwhile ?>
      ]);

      // set series tooltip settings
      series.tooltip().titleFormat('{%X}');

      series
        .tooltip()
        .position('center-top')
        .anchor('center-bottom')
        .offsetX(0)
        .offsetY(5)
        .format('{%Value}{groupsSeparator: }');

      // set scale minimum
      chart.yScale().minimum(0);

      // set yAxis labels formatter
      chart.yAxis().labels().format('{%Value}{groupsSeparator: }');

      // tooltips position and interactivity settings
      chart.tooltip().positionMode('point');
      chart.interactivity().hoverMode('by-x');

      chart.maxPointWidth(40);
      chart.xAxis().labels().width(35);
      chart.xAxis().labels().height(50);
      // set container id for the chart
      chart.container('chart3');

      // initiate chart drawing
      chart.draw();
    });
    </script>
</body>
</html>