	<body>
    <center><h2>Formulaire d'ajout </h2>
<script src="js/verification.js"> </script>
<p></p>
<?php $matiere=getMatiere(); ?>
 <form method="post" action="./?action=insertCre">
	<table><tr><td>
	<p><label for="CRE_MAT"> Matiere : </label> 
		<select name="CRE_MAT">
			<?php
				for($i=0;$i<sizeof($matiere);$i++){ ?> 
					<option value= <?= $matiere[$i]['MAT_CODE'];?> > 
						<?= $matiere[$i]['MAT_LIBELLE']; ?> </option> 
			<?php } ?>
		</select></p>
	<p><label for="CRE_DATE"> Nouvelle date : </label> <input id="CRE_DATE" type="date" name="CRE_DATE" size="50px" maxlength="20"   /></p>
	<p><label for="CRE_HEUREDEB"> Nouvelle heure de début : </label> <input id="CRE_HEUREDEB" type="time" name="CRE_HEUREDEB" size="50px" maxlength="20" /></p>
	<p><label for="CRE_SALLE"> Nouvelle salle : </label> <input id="CRE_SALLE" type="text" name="CRE_SALLE" size="50px" maxlength="5"  onblur="verifSalle();" /><span id = "erreursalle" ></span></p>
	<p><label for="CRE_HEUREFIN"> Nouvelle heure de fin : </label> <input id="CRE_HEUREFIN" type="time" name="CRE_HEUREFIN" size="50px" maxlength="20"  /></p>

	</td></tr></table>
			        <input type="submit" value="valider"/>
				    <input type="reset"/></p>
				    <p></p>
</form>