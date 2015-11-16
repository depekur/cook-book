<?php

function add_recipe_steps_view ( $post ) 
{


	for ( $steps = 1; $steps < 7; $steps++ ) {

	?>

		<section style="margin-bottom: 50px;">	
			<h1>Шаг #<?= $steps ?></h1>

		
			<p>
			<label for="myplugin_new_field">Название шага:<br>
				<input type="text" id="myplugin_new_field" name="myplugin_new_field" value="<?= esc_attr( $value ) ?>" size="100" />
			</label>

			</p>
			<p>
				<label for="myplugin_new_field">Описание шага:<br>
					<textarea type="text" id="product_schema_field_description" name="product_schema_field_description" cols="100" rows="7"> </textarea>
				</label>
			</p>
			<p>
				<label for="myplugin_new_field">Фото шага:<br>
					<input type="text" id="myplugin_new_field" name="myplugin_new_field" value="<?= esc_attr( $value ) ?>" size="100" />
				</label>
			</p>

		</section>

	<?php

	}

}