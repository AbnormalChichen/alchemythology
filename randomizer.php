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




		<div class="container">

			<div class="builder_container flex randomizer">
				<canvas id="custom_creature" min-width="350px" height="350px" style="margin:2px;">	
				</canvas>


				<div class="builder flex" id="custom_creature_info" style="flex-direction: column; min-height: 700px;">
					
					<div>
						<h2 style="text-align: center" id="custom_creature_name"> Blarfus </h2>
					</div>

					<div class="info_container">
						<h3 id="height"> Height: ft</h3>
						<h3 id="weight"> Weight: lb</h3>
						<h3 id="origin"> Origin:</h3>
					</div>

					<div class="story_container">
						<p id="story"> Describe its abilities. </p>
					</div>

				</div>
			</div>

			<div class="flex randomizer_buttons">

			<div class="select-box-box" onclick="change_img('one'); draw_creature();" >
				<div class="custom-select flex" style="width:100px;">
					<img src="images/logo.png" class="select_img" id="one_img" style=" height:100px; width:100px; object-fit: contain; padding:2px; box-shadow: 0 0 0 5px white;">
					<select id="one">
						<option value="0"> One </option>
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

			<?php
				foreach ($data as $creature) {
					echo "<div id='{$creature['name_full']}_info' data-name-one='{$creature['name_1']}' data-name-two='{$creature['name_2']}' data-height-val='{$creature['height']}'";
					echo "data-weight-val='{$creature['weight']}' data-origin-val='{$creature['origin']}' data-story-one='{$creature['story_1']}' data-story-two='{$creature['story_2']}' ";
					echo "data-part-one='{$creature['part_1']}' data-part-two='{$creature['part_2']}' style='display:none;'>";

					echo "<img id='{$creature['name_full']}_head_img' src='images/{$creature['name_full']}_head.png'>";
					echo "<img id='{$creature['name_full']}_torso_img' src='images/{$creature['name_full']}_torso.png'>";
					echo "<img id='{$creature['name_full']}_arms_img' src='images/{$creature['name_full']}_arms.png'>";
					echo "<img id='{$creature['name_full']}_legs_img' src='images/{$creature['name_full']}_legs.png'>";
					echo "<img id='{$creature['name_full']}_wings_img' src='images/{$creature['name_full']}_wings.png'>";

					echo "</div>";				
				}
			?>




			<div class='flex' style="flex-direction: column; margin:25px;">
			<div class="button" onclick="swap = 1; draw_creature();">  <img src="images/swap.png" width=50px>  </div>
			<div class="button" onclick="randomize();">  <img src="images/random.png" width=50px>  </div>
			</div>



			<div class="select-box-box" onclick="change_img('two'); draw_creature();" >
				<div class="custom-select flex" style="width:100px;">
					<img src="images/logo.png" class="select_img" id="two_img" style=" height:100px; width:100px; object-fit: contain; padding:2px; box-shadow: 0 0 0 5px white;">
					<select id="two">
						<option value="0"> Two </option>
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
			<div class="logo footer"> <img src="images/logo.png" > </div>
			 Ray Wofford 
		</footer>
	</div>

		<script src="custom-select.js"></script>
		<script src="script.js"></script>
		<script> randomized=1;</script>




	</body>
</html>