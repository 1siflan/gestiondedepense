<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>



<?php 

	$date_aujourdhui = date("Y-m-d"); 
	$annee = date("Y"); 


	 $calcule_total_today = $cnx->query("SELECT sum(montant) 
				FROM depense 
				WHERE 
				date_dep BETWEEN '$date_aujourdhui' AND '$date_aujourdhui';");
	 	foreach ($calcule_total_today as $today) {
	 		$total_today = $today[0];
	 	}



	 	$calcule_total_categorie = $cnx->query("SELECT count(id_cat) 
				FROM categorie_depense 
				 ");


	 	foreach ($calcule_total_categorie as $nombre_cat) {
	 		$total_nombre_cat = $nombre_cat[0];
	 	}




		$janv = $cnx->query("SELECT SUM(montant) FROM depense WHERE MONTH(date_dep) = 1 AND YEAR(date_dep) = $annee");
		$total_janv = $janv->fetchColumn();


		$fev = $cnx->query("SELECT SUM(montant) FROM depense WHERE MONTH(date_dep) = 2 AND YEAR(date_dep) = $annee");
		$total_fev = $fev->fetchColumn();

 ?>



<div class="row">
	
	<div class="col-6">
		<div class="card bg-success text-light card-body">
				<h6>Dépense Aujourd'hui</h6>
				<h4><?=$total_today ?></h4>
		</div>
	</div>



	<div class="col-6">
		<div class="card bg-warning text-dark card-body">
				<h6>Dépense Aujourd'hui</h6>
				<h4><?=$total_nombre_cat ?></h4>
		</div>
	</div>


</div>



<canvas id="myChart" style="width:100%;max-width:600px"></canvas>



<script>
const xValues = ["Jav", "FEV", "mar", "avr", "mai" ,"juin"];
const yValues = [<?=$total_janv?>, <?=$total_fev?>, <?=$total_janv?>, <?=$total_janv?>, <?=$total_janv?>,<?=$total_janv?>];
const barColors = ["red", "green","blue","orange","brown"];

new Chart("myChart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero: true
        }
      }]
    },

    title: {
      display: true,
      text: "World Wine Production 2018"
    }
  }
});
</script>