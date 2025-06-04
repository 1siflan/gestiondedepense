
<h3>DEPENSES</h3>

<?php 

		$total_depense = 0 ;


		if(isset($_GET['btn_recherche'])){



			$date_debut = $_GET['date_debut'];
			$date_fin = $_GET['date_fin'];
			$id_categorie = $_GET['id_categorie'];

			if($id_categorie ==  0 ){


				$req = $cnx->query("SELECT * 
				FROM depense, categorie_depense, users 
				WHERE depense.id_cat = categorie_depense.id_cat 
				AND depense.id_user = users.id_user 
				-- AND depense.id_cat = '$id_categorie' 
				AND depense.date_dep BETWEEN '$date_debut' AND '$date_fin';");

			}else{
			$req = $cnx->query("SELECT * 
				FROM depense, categorie_depense, users 
				WHERE depense.id_cat = categorie_depense.id_cat 
				AND depense.id_user = users.id_user 
				AND depense.id_cat = '$id_categorie' 
				AND depense.date_dep BETWEEN '$date_debut' AND '$date_fin';");
			}

			
			

		}else{
			$req = $cnx->query("SELECT * from depense , categorie_depense , users where categorie_depense.id_cat = depense.id_cat and depense.id_user=users.id_user ;");
		}

	



	$req2 = $cnx->query("SELECT * from categorie_depense") ;



	$req3 = $cnx->query("SELECT * from categorie_depense") ;
 ?>



 <div class="bg-light p-3">
		<form action="home.php">
			<input type="hidden" name="pages" value="depense">
				<div class="row">
						<div class="col-4">
							<div>
								<label>Du</label>
								<input type="date" name="date_debut" class="form-control">
							</div>
						</div>

						<div class="col-4">
							<div>
								<label>Au</label>
								<input type="date" name="date_fin" class="form-control">
							</div>
						</div>

						<div class="col-4">
							<div>
								<label>Catégorie</label>
									<select class="form-control" name="id_categorie">
											<option value="0">Tous</option>
											<?php foreach ($req3 as  $liste_cat): ?>
												<option value="<?=$liste_cat['id_cat']?>"><?=$liste_cat['nom']?></option>
											<?php endforeach ?>
										
									</select>
							</div>
						</div>

						<div class="col-12">
							<div>
								<label></label>
								<button class="btn btn-dark w-100" name="btn_recherche">Recherche</button>
							</div>
						</div>
				</div>
		</form>
</div>



<button class="btn btn-success m-3 "  data-bs-toggle="modal" data-bs-target="#modal_ajouter" style="float: right;">
Nouveau</button>









<table class="table table-bordered ">
	<thead>
		<th>#</th>
		<th>Nom</th>
		<th>Date Dépense</th>
		<th>Montant</th>
		<th>Note</th>
		<th>Catégorie</th>
		<th>Utilisateur</th>
		<th>Action</th>
	</thead>


	<tbody>

		<?php foreach ($req as $valeur):    

			$total_depense += $valeur['montant']; 



			?>

		<tr>
			<td><?=$valeur['id_depense']?></td>
			<td><?=$valeur['nom']?></td>
			<td><?=$valeur['date_dep']?></td>
			<td><?=$valeur['montant']?></td>
			<td><?=$valeur['note']?></td>
			<td><?=$valeur[8]?></td>
			<td><?=$valeur[10]?></td>
			<td>

				<button 

				 data-bs-toggle="modal" 
				 data-bs-target="#modal_modifier"

				 data-id="<?=$valeur['id_depense']?>"
				 data-nom="<?=$valeur['nom']?>"
				 data-date_dep="<?=$valeur['date_dep']?>"
				 data-montant="<?=$valeur['montant']?>"
				 data-note="<?=$valeur['note']?>"
				 data-id_cat="<?=$valeur['id_cat']?>"
				 data-id_user="<?=$valeur['id_user']?>"
			

				class="btn_modifier btn btn-light btn-sm">Modifier</button>



				<a href="assets/include/script.php?id_dep_sup=<?=$valeur['id_depense']?>" class="btn btn-danger btn-sm">supprimer</a>

			</td>
		</tr>
			
		<?php endforeach ?>
	</tbody>


</table>



<div class="p-3 h3">
	Total : <?=number_format($total_depense , 2 , ',',' ')?>
</div>



















 
<!-- Modal  ajouter -->
<div class="modal fade" id="modal_ajouter" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Nouveau utilisateur</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
  <form action="assets/include/script.php" method="POST">

      <div class="modal-body">
        
				<div>
					<label>Nom</label>
					<input  class="form-control" type="text" name="nom">
				</div>

				<div>
					<label>Date </label>
					<input   class="form-control" type="date" name="date_dep" value="<?=date("Y-m-d")?>">
				</div>


				<div>
					<label>Montant</label>
					<input   class="form-control" type="number" name="montant">
				</div>

				<div>
					<label>Note</label>
					<textarea   class="form-control"  name="note"></textarea>
				</div>
				

				<div>
					<label>Catégorie</label>
					<select class="form-control"  name="id_cat">

						<?php foreach ($req2 as  $c): ?>
														<option value="<?=$c['id_cat']?>"><?=$c['nom']?></option>
						<?php endforeach ?>

					</select>
				</div>

				<div>
					<input type="text" name="id_user" value="<?=$_SESSION['user_id']?>" readonly hidden>
				</div>

				
			
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
        <button type="submit" type="submit" class="btn btn-success" name="btn_ajouter_depense">Valider</button>
      </div>
      </form>
    </div>
  </div>
</div>





















 
<!-- Modal  modifier -->
<div class="modal fade" id="modal_modifier" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modification</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
  <form action="assets/include/script.php" method="POST">

      <div class="modal-body">
        
				<div>
					<label>Nom</label>
					<input  class="form-control inp_nom" type="text" name="nom">

					<input  hidden class="form-control inp_id" type="text" name="id">
				</div>

				<div>
					<label>Login</label>
					<input  class="form-control inp_login" type="text" name="login">
				</div>

				<div>
					<label>Mot de passe</label>
					<input  class="form-control " type="password" name="pwd">
				</div>

				<div>
					<label>Rôle</label>
					<select class="form-control inp_role"  name="role">
							<option>admin</option>
							<option>user</option>
					</select>
				</div>

				
			
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
        <button type="submit" type="submit" class="btn btn-success" name="btn_modifier">Valider</button>
      </div>
      </form>
    </div>
  </div>
</div>








<script type="text/javascript">
	

	$(document).ready(function(){


		$(".btn_modifier").click(function(){

			id = $(this).data("id")
			nom = $(this).data("nom")
			login = $(this).data("login")
			role = $(this).data("role")

			$(".inp_nom").val(nom)
			$(".inp_login").val(login)
			$(".inp_role").val(role)
			$(".inp_id").val(id)

		})



	})
	let table = new DataTable('.table');


</script>