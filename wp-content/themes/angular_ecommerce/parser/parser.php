<?php

require 'simple_html_dom.php';


$homeURL = 'https://www.blueapron.com';
$cookbookURL = 'https://www.blueapron.com/cookbook/';


/**
 * find all category 
 */

$html = file_get_html($cookbookURL);

foreach($html->find('#filter-ingredients li') as $cats) {

	$cat = trim($cats->plaintext);


	/**
	 * set current category as link 
	 * and get recipes
	 */

	$recipes = file_get_html($cookbookURL . $cat);


	foreach($recipes->find('.recipe-thumb') as $element) {

		/**
		 * get some data from thumb
		 * and go to single recipe
		 */
		
		$rec["category"] = $cat;				
		$link = $element->find('a', 0)->href;				
		$rec["link"] = preg_replace( "/^.{9}/", "", $link );		
		$rec["thumb"] = $element->find('img', 0)->src;

		/**
		 * now we in single recipe, 
		 * so lets get all we want and go to another one  
		 */

		$recipe = file_get_html( $homeURL . $link );

		/**
		 * check for 404 error  
		 */
		if ($recipe) {

			$rec["title"] = $recipe->find('.main-title', 0)->plaintext;
			$rec["subtitle"] = $recipe->find('.sub-title', 0)->plaintext;
			$rec["headbg"] = $recipe->find('.rec-splash-img', 0)->src;
			$rec["portions"] = $recipe->find('.recipe-servings p', 0)->plaintext;
			$rec["calories"] = $recipe->find('.recipe-servings p', 1)->plaintext;

			/**
			 * in some recipe there is no time field, 
			 * and parser write description to time variable
			 * bullshit!
			 * so we need this check
			 * and if there is not.. we set default value
			 */

			$time = $recipe->find('.recipe-servings p', 2)->plaintext;
			if (strlen( $time) > 100 ) {
				$rec["time"] = $time;
			} else {
				$rec["time"] = 'Cooking Time: so fast as you can!';
			}			

			$rec["desc"] = $recipe->find('.rec-descrip-details-section', 0)->plaintext;
			$rec["ingbg"] = $recipe->find('.ingredients-img', 0)->src;

			/**
			 * we need more loop to collect all data 
			 * now we get all ingredients as no-associated array
			 */

			foreach ($recipe->find('.ingredients-list li') as $i) {
				$in[] = $i->plaintext;
			}

			/**
			 * and set it as a value of our main output array 
			 */

			$rec["ingredients"] = $in;
			unset($in);

			/**
			 * the same for recipe steps
			 */		

			foreach ($recipe->find('.section-rec-instructions .instr-step') as $i) {
				$stps["img"] = $i->find('.img-max', 0)->src;
				$stps["title"] = $i->find('.instr-title', 0)->plaintext;
				$stps["desc"] = $i->find('.instr-txt', 0)->plaintext;

				$steps[] = $stps;
			}

			$rec["steps"] = $steps;
			unset($steps);
		}

		/**
		 * write single recipe data in to the file named as rec-name.json 
		 */
		
		file_put_contents( '../app' . $link . '.json', json_encode($rec));

		/**
		 * I lie, that the output array 
		 */

		//$data[] = $rec;
		

		}

}

/**
* write all data we stoled to pretty .json file 
*/

//file_put_contents( '../app/recipes/recipes.json', json_encode($data));

?>