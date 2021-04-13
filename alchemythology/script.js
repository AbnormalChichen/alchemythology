 var which_one, which_part, img, head_one, head_two, torso_one, torso_two, arms_one, arms_two, legs_one, legs_two, wings_one, wings_2, randomized = 0, c_one, c_two, swap = 0;



function change_img (part){

	which_one = document.getElementById(part).value;
	which_part = part;



if(which_one == '0'){

  		img = document.getElementById(part + '_img');
		img.src = "images/logo.png";

		document.getElementById(part + '_img').src = img.src;

		console.log(document.getElementById(part + '_img').src);
  }else if(part == 'one'){

  	head_one = new Image(100, 100);
  	head_one.src = "images/" + which_one + "_head.png";

  	torso_one = new Image(100,100);
  	torso_one.src = "images/" + which_one + "_torso.png";

  	arms_one = new Image(100,100);
  	arms_one.src = "images/" + which_one + "_arms.png";

  	legs_one = new Image(100,100);
  	legs_one.src = "images/" + which_one + "_legs.png";

  	wings_one = new Image(100,100);
  	wings_one.src = "images/" + which_one + "_wings.png";

  	img = document.getElementById(part + '_img');
	img.src = "images/" + which_one + ".png";

	document.getElementById(part + '_img').src = img.src;

	console.log(document.getElementById(part + '_img').src);
  }else if(part == 'two'){

  	head_two = new Image(100, 100);
  	head_two.src = "images/" + which_one + "_head.png";

  	torso_two = new Image(100,100);
  	torso_two.src = "images/" + which_one + "_torso.png";

  	arms_two = new Image(100,100);
  	arms_two.src = "images/" + which_one + "_arms.png";

  	legs_two = new Image(100,100);
  	legs_two.src = "images/" + which_one + "_legs.png";

  	wings_two = new Image(100,100);
  	wings_two.src = "images/" + which_one + "_wings.png";

  	img = document.getElementById(part + '_img');
	img.src = "images/" + which_one + ".png";

	document.getElementById(part + '_img').src = img.src;

	console.log(document.getElementById(part + '_img').src);
  }else if (which_one != 0){
		img = document.getElementById(part + '_img');
		img.src = "images/" + which_one + "_" + part + ".png";

		document.getElementById(part + '_img').src = img.src;

		console.log(document.getElementById(part + '_img').src);
  } if(which_one == '0'){

  		img = document.getElementById(part + '_img');
		img.src = "images/logo.png";

		document.getElementById(part + '_img').src = img.src;

		console.log(document.getElementById(part + '_img').src);
  }
}

function hyphenate(str, num) {  
  return str.replace(RegExp("(\\w{" + num + "})(\\w)", "g"), function(all,text,char){ 
    return text + "-<br>" + char; 
  }); 
}

function randomize(){

	var c_amount = document.getElementById('one').options.length;

	var c_array = [];
	for(var i = 1; i < c_amount; i++){
		c_array.push(document.getElementById('one').options[i].value);
	}
	
	c_one = document.getElementById('one').value;
	c_two = document.getElementById('two').value;

  	//shuffle array
	var results = c_array.sort(function() { return 0.5 - Math.random(); }) .slice(0, 2); // Get first 2 items

	console.log(results);

	c_one = results[0];
	c_two = results[1];

	

	//creae an array to update the text on select boxes when random button is clicked
	select_text = document.getElementsByClassName('select-selected');

	select_text[0].innerHTML= c_one;
	select_text[1].innerHTML= c_two;



	document.getElementById('one').value = c_one;
	change_img('one');

	
	document.getElementById('two').value = c_two;
	change_img('two');

	draw_creature();
	

}

function draw_creature() {

//assign variables to the parts


	var c_head, c_torso, c_arms, c_legs, c_wings, story, o, w, h, name;

	var head = document.getElementById('head_img');
	var torso = document.getElementById('torso_img');
	var arms = document.getElementById('arms_img');
	var legs = document.getElementById('legs_img');
	var wings = document.getElementById('wings_img');

    console.log();

	if(randomized == 1){
		c_one= document.getElementById('one').value;
		c_two= document.getElementById('two').value;

		//creae an array to update the text on select boxes when random or swap button is clicked
		select_text = document.getElementsByClassName('select-selected');

		if(swap == 1){
			c_temp = c_one;
			c_one = c_two;
			c_two = c_temp;

			document.getElementById('one').value = c_one;
			document.getElementById('two').value = c_two;
			change_img('one');
			change_img('two');
			swap = 0;
		}

		select_text[0].innerHTML= c_one;
		select_text[1].innerHTML= c_two;

		


		c_head = c_one;
		c_torso = c_one;
		c_arms = c_one;
		c_legs = c_one;
		c_wings = c_one;


		head = document.getElementById(c_one + '_head_img');
		torso = document.getElementById(c_one + '_torso_img');
		arms = document.getElementById(c_one + '_arms_img');
		legs = document.getElementById(c_one +'_legs_img');
		wings = document.getElementById(c_one + '_wings_img');



		c_replace_part_1 = document.getElementById(c_two + '_info').dataset.partOne;
		c_replace_part_2 = document.getElementById(c_two + '_info').dataset.partTwo;



		if(c_replace_part_1 == 'head'){
			c_head = c_two;
			head = document.getElementById(c_two + '_head_img');

		}else if(c_replace_part_1 == 'torso'){
			c_torso = c_two;
			torso = document.getElementById(c_two + '_torso_img');

		}else if(c_replace_part_1 == 'arms'){
			c_arms = c_two;
			arms = document.getElementById(c_two + '_arms_img');

		}else if(c_replace_part_1 == 'legs'){
			c_legs = c_two;
			legs = document.getElementById(c_two +'_legs_img');

		}else if(c_replace_part_1 == 'wings'){
			c_wings = c_two;
			wings = document.getElementById(c_two + '_wings_img');

		}

		if(c_replace_part_2 == 'head'){
			c_head = c_two;
			head = document.getElementById(c_two + '_head_img');

		}else if(c_replace_part_2 == 'torso'){
			c_torso = c_two;
			torso = document.getElementById(c_two + '_torso_img');

		}else if(c_replace_part_2 == 'arms'){
			c_arms = c_two;
			arms = document.getElementById(c_two + '_arms_img');

		}else if(c_replace_part_2 == 'legs'){
			c_legs = c_two;
			legs = document.getElementById(c_two +'_legs_img');

		}else if(c_replace_part_2 =='wings'){
			c_wings = c_two;
			wings = document.getElementById(c_two + '_wings_img');

		}

		c_info_one = document.getElementById(c_one + '_info').dataset;
		c_info_two = document.getElementById(c_two + '_info').dataset;

		var h1 = c_info_one.heightVal;
		var h2 = c_info_two.heightVal;
		var w1 = c_info_one.weightVal;
 		var w2 = c_info_two.weightVal;
		

		h1 = Number(h1);
		h2 = Number(h2);
		w1 = Number(w1);
		w2 = Number(w2);


		

		o = c_info_two.originVal;
	
		w = (w1 + w2)/2;

		w = w.toString();

	
		h = (h1 + h2)/2;
		
		h = h.toString();

		name = c_info_one.nameOne + c_info_two.nameTwo;
		name = name.charAt(0).toUpperCase() + name.slice(1);

		story = c_info_one.storyOne+ " " + c_info_two.storyTwo;;
		story = story.replace(/\[MON\]/g, name)
		

	}else {
		 c_head = document.getElementById('head').value;
		 c_torso = document.getElementById('torso').value;
		 c_arms = document.getElementById('arms').value;
		 c_legs = document.getElementById('legs').value;
		 c_wings = document.getElementById('wings').value;
		 story = document.getElementById('story_input').innerHTML;

		 o = document.getElementById('origin_input').value;
		 w = document.getElementById('weight_input').value;
		 h = document.getElementById('height_input').value;
		 name = document.getElementById('custom_name_input').value;

	}

	canvas = document.getElementById('custom_creature');
	context = canvas.getContext("2d");

	canvas.width += 0;


	context.translate(canvas.width*0.2, canvas.height*0.3);
	context.scale(0.3,0.3);
	

	

 //position and draw each part based on the torso

	if(c_legs == "dragon"){
		context.drawImage(legs, (canvas.width/2)-95, (canvas.height/2)+190);

	}else if(c_legs == "goblin"){
		context.drawImage(legs, (canvas.width/2)-107, (canvas.height/2)+290);

	}else if(c_legs == "centaur"){
		context.translate(50, -115);
		context.drawImage(legs, (canvas.width/2)-380, (canvas.height/2)+235);

	}

	if(c_wings =="dragon"){
		context.drawImage(wings, (canvas.width/2)-215, (canvas.height/2)-125);
	}

	if(c_torso == "goblin"){
		context.drawImage(torso, canvas.width/2, (canvas.height/2)-12);

	}else{
		context.drawImage(torso, canvas.width/2, canvas.height/2);
	}

	if(c_head == "dragon"){
		context.drawImage(head, (canvas.width/2)-6, (canvas.height/2) - 315);
	}else if(c_head == "goblin"){
		context.drawImage(head, (canvas.width/2)-50, (canvas.height/2) - 265);

	}else if(c_head == "centaur"){
		context.drawImage(head, (canvas.width/2)+65, (canvas.height/2) - 165);
	}

	if(c_arms == "dragon"){
		context.drawImage(arms, (canvas.width/2)-93, (canvas.height/2));
	}else if(c_arms == "goblin"){
		context.drawImage(arms, (canvas.width/2)-132, (canvas.height/2)-10);

	}else if(c_arms == "centaur"){
		context.drawImage(arms, (canvas.width/2)-45, (canvas.height/2));
	}


	//assign vars to info

	//add custom info to the builder window
	if(name.length > 0){

		name = hyphenate(name, 10);

		document.getElementById('custom_creature_name').innerHTML = name;

	}

	if(h.length > 0){
	
		h = hyphenate(h, 15);

		document.getElementById('height').innerHTML = 'height: ' + h + ' ft';

	}

	if(w.length > 0){

		w = hyphenate(w, 15);
		document.getElementById('weight').innerHTML = 'weight: ' + w + ' lb';
		

	}

	if(o.length > 0){

		o = hyphenate(o,12);

		document.getElementById('origin').innerHTML = "origin: " + o;


	}

	if(story.length > 0){
	
		story = hyphenate(story, 20); 
		document.getElementById('story').innerHTML = story;

	}


}



