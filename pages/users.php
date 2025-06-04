
<h3>Utilisateur</h3>


<?php 

	$req = $cnx->query("SELECT * FROM users");

 ?>

<button class="btn btn-success m-3 "  data-bs-toggle="modal" data-bs-target="#modal_ajouter" style="float: right;">
Nouveau</button>






<table class="table table-bordered  ">
	<thead>
		<th>#</th>
		<th>Nom</th>
		<th>Login</th>
		<th>Rôle</th>
		<th>Action</th>
	</thead>


	<tbody>

		<?php foreach ($req as $valeur): ?>

		<tr>
			<td><?=$valeur['id_user']?></td>
			<td><?=$valeur['nom']?></td>
			<td><?=$valeur['login']?></td>
			<td><?=$valeur['role']?></td>
			<td>

				<button 

				 data-bs-toggle="modal" 
				 data-bs-target="#modal_modifier"

				 data-id="<?=$valeur['id_user']?>"
				 data-nom="<?=$valeur['nom']?>"
				 data-login="<?=$valeur['login']?>"
				 data-role="<?=$valeur['role']?>"
			

				class="btn_modifier btn btn-light btn-sm">Modifier</button>



				<a href="assets/include/script.php?id_user_sup=<?=$valeur['id_user']?>" class="btn btn-danger btn-sm">supprimer</a>

			</td>
		</tr>
			
		<?php endforeach ?>
	</tbody>


</table>



















 
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
					<label>Login</label>
					<input  class="form-control" type="text" name="login">
				</div>

				<div>
					<label>Mot de passe</label>
					<input  class="form-control" type="text" name="pwd">
				</div>

				<div>
					<label>Rôle</label>
					<select class="form-control"  name="role">
							<option>admin</option>
							<option>user</option>
					</select>
				</div>

				
			
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
        <button type="submit" type="submit" class="btn btn-success" name="btn_ajouter">Valider</button>
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