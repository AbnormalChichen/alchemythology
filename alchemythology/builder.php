<DOCTYPE html>
<html>
	<head> 

		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Caesar+Dressing&family=Trochut&display=swap" rel="stylesheet">
		<link href="style.css" rel="stylesheet">

		<title> Home - Alchemythology </title>

	</head>	
	<body>



	
	<div class="page_container">
		<header>
			<div class="title"> <a class="flex" href="index.html"> <div class="logo">  <img src="images/logo.png">  </div> <div> <h2> Alchemythology </h2> </div> </a> </div>

			<div class="nav_item"> <a href="randomizer.php"> Randomizer </a> </div>
			<div class="nav_item"> <a href="builder.php"> Builder </a> </div>
		</header>
	


	<?php

		$c_query = "SELECT * FROM creature_info";


		$database = new PDO('sqlite:creatures_info.db');

		$result = $database->query("$c_query");
		$data = $result->fetchAll(PDO::FETCH_ASSOC);

	?>

		<div class="flex instructions"> <p style="margin:0; padding: 5px; "> 
			Step 1: Name your mythological monstrosity. <br> 
			Step 2: Select which parts to use from the select boxes on either side of the creature combinator. <br> 
			Step 3: Type its stats into the relevant boxes. <br> 
			Step 4: Hit the build button to start up the creature combinator and create your mythological monstrosity. </p> </div>


		
	<div class="grid">


		<!-- LEFT COLUMN OF SELECT BOXES -->

		<div class="flex" style="flex-direction: column; align-items:flex-start; ">

			<div class="select-box-box" onclick="change_img('head');" > <h3> Head </h3>
				<div class="custom-select flex" style="width:100px;">
					<img src="images/logo.png" class="select_img" id="head_img" style=" height:100px; width:100px; object-fit: contain; padding:2px; box-shadow: 0 0 0 5px white;">
					<select id="head">
						<option value="0"> Head </option>
					    <?php
					    	foreach ($data as $creature){
					    		echo '<option value="';
					    		echo "{$creature['name_full']}";
					    		echo '">';
					    		echo " {$creature['name_full']} </option>
					    ";
							}
					    ?>
					   
					</select>
				</div>
			</div>

			<div class="select-box-box" onclick="change_img('torso');" > <h3> Torso </h3>
				<div class="custom-select flex" style="width:100px;">
					<img src="images/logo.png" class="select_img" id="torso_img" style=" height:100px; width:100px; object-fit: contain; padding:2px; box-shadow: 0 0 0 5px white;">
					<select id="torso">
						<option value="0"> Torso </option>
					    <?php
					    	foreach ($data as $creature){
					    		echo '<option value="';
					    		echo "{$creature['name_full']}";
					    		echo '">';
					    		echo " {$creature['name_full']} </option>
					    ";
							}
					    ?>
					   
					</select>
				</div>
			</div>

			<div class="select-box-box" onclick="change_img('arms');" > <h3> Arms </h3>
				<div class="custom-select flex" style="width:100px;">
					<img src="images/logo.png" class="select_img" id="arms_img" style=" height:100px; width:100px; object-fit: contain; padding:2px; box-shadow: 0 0 0 5px white;">
					<select id="arms">
						<option value="0"> Arms </option>
					    <?php
					    	foreach ($data as $creature){
					    		echo '<option value="';
					    		echo "{$creature['name_full']}";
					    		echo '">';
					    		echo " {$creature['name_full']} </option>
					    ";
							}
					    ?>
					   
					</select>
				</div>
			</div>


		</div>

		<!-- MIDDLE COLUMN WHERE BUILDER IS -->


		<div class="flex" style=" flex-direction: column; align-items:center; ">



			<div> <input type="text" class="info_input" id="custom_name_input" placeholder="Name Your Creature"> </div>

			<div class="builder_container flex">
				<canvas id="custom_creature" min-width="350px" height="350px" style="margin:2px;">	
				</canvas>


				<div class="builder flex" id="custom_creature_info" style="flex-direction: column;">
					
					<div>
						<h2 style="text-align: center" id="custom_creature_name"> Blarfus </h2>
					</div>

					<div class="info_container">
						<h3 id="height"> Height: ft</h3>
						<h3 id="weight"> Weight: lb</h3>
						<h3 id="origin"> Origin:   </h3>
					</div>

					<div class="story_container">
						<p id="story"> Describe its abilities. </p>
					</div>

				</div>
			</div>
			

			<div class="flex" style="justify-content: space-around; width:100%;"> <div> <input class="info_input"type="number" id="height_input" style="padding-right:30px; text-align:right;" placeholder="Height"> <span style="margin-left:-50px;" >ft</span> </div>
			<div> <input class="info_input" type="number" id="weight_input" style="padding-right:40px; text-align:right;" placeholder="Weight"> <span style="margin-left:-50px;">lb</span> </div></div>
			<div> <input class="info_input" type="text" id="origin_input" placeholder="where is it from?"> </div>
			<div id="story_input" contenteditable="true"> Describe its abilities. </div>
			<div class="button" style="color:white;" onclick="draw_creature();"> Build </div>
		</div>




		<!-- RIGHT COLUMN SELECT BOXES -->

		<div class="flex" style="flex-direction: column; align-items:flex-end; ">

			<div class="select-box-box" onclick="change_img('wings');" > <h3> Wings </h3>
				<div class="custom-select flex" style="width:100px;">
					<img src="images/logo.png" class="select_img" id="wings_img" style=" height:100px; width:100px; object-fit: contain; padding:2px; box-shadow: 0 0 0 5px white;">
					<select id="wings">
						<option value="0"> Wings </option>
						<option value="0"> None </option>
					    <?php

					    	foreach ($data as $creature){
					    		if($creature['part_2'] === 'wings'){
					    			echo '<option value="';
					    			echo "{$creature['name_full']}";
					    			echo '">';
					    			echo " {$creature['name_full']} </option>
					    	";
					   		}
					   	}
							
					    ?>
					   
					</select>
				</div>
			</div>


			<div class="select-box-box" onclick="change_img('legs');" > <h3> Legs </h3>
				<div class="custom-select flex" style="width:100px;">
					<img src="images/logo.png" class="select_img" id="legs_img" style=" height:100px; width:100px; object-fit: contain; padding:2px; box-shadow: 0 0 0 5px white;">
					<select id="legs">
						<option value="0"> Legs </option>
					    <?php
					    	foreach ($data as $creature){
					    		echo '<option value="';
					    		echo "{$creature['name_full']}";
					    		echo '">';
					    		echo " {$creature['name_full']} </option>
					    ";
							}
					    ?>
					   
					</select>
				</div>
			</div>


		</div>

	</div>







		
			

		<footer>
			<div class="logo footer"> <img src="images/logo.png"> </div>
			 Ray Wofford 
		</footer>
	</div>

		<script src="custom-select.js"></script>
		<script src="script.js"></script>



	</body>
</html>