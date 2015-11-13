<?php

// регаем тип поста "татухи"
function create_tattoo() { 
    register_post_type( 'tattoo',
        array(
            'labels' => array(
                'name' => 'Татухи',
                'singular_name' => 'Татухи',
                'add_new' => 'Добавить',
                'add_new_item' => 'Добавить татуху',
                'edit' => 'Редактировать',
                'edit_item' => 'Редактировать татуху',
                'new_item' => 'Новая татуха',
                'view' => 'Просмотр',
                'view_item' => 'Посмотреть татуху',
                'search_items' => 'Искать татуху',
                'not_found' => 'Нет татух!',
                'not_found_in_trash' => 'Ваще нет татух',
                'parent' => 'предки'
            ),
            'public' => true,
            'menu_position' => 6,
            'supports' => array( 'title', 'thumbnail', 'editor' ),
            'taxonomies' => array( '' ),
            'menu_icon' => plugins_url( 'tat.png', __FILE__ ),
            'has_archive' => true
        )
    );
}




add_action( 'init', 'create_tattoo' ); 




add_action(  'init',  'prowp_define_product_type_taxonomy'  ); 
function prowp_define_product_type_taxonomy() {
    register_taxonomy(  'type',  'post',  array(  
                        'hierarchical'  => true,
                        'label'  =>  'Type',  
                        'query_var'  => true,  
                        'rewrite'  => true )  
    );
}


add_filter(  'the_content', 'prowp_profanity_filter'  ); 
function prowp_profanity_filter( $content ) {
    $profanities = array(  'lorem',  'ipsum'  );
    $content= str_ireplace( $profanities,  '[censored]', $content ); 
return $content;
}


add_filter(  'the_content', 'prowp_subscribed'  ); 
function prowp_subscribed( $content ) {
    if ( is_single() ) {
        $content.= '<h3>enjoed my stuff?</h3>';
        $content.= '<p>buy me a beer</p>';

    }
    return $content;
}


add_filter(  'the_title', 'prowp_title'  ); 
function prowp_title( $title ) {
    if ( is_single() ) {
        $title.= ', so eat my banana';

    }
    return $title;
}


// создаем произвольное меню для плагина 
add_action(  'admin_menu',  'prowp_create_menu'  ); 
function prowp_create_menu()  {
    // создаем новое меню верхнего уровня
    add_menu_page(  'Halloween Plugin Page',  'Halloween Plugin',
    'manage_options',  'prowp_main_menu',  'prowp_settings_page'  );


    add_action(  'admin_init',  'prowp_register_settings'  );

}

function prowp_register_settings()  {
    // регистрируем настройки
    register_setting(  'prowp-settings-group', 'prowp_options', 'prowp_sanitize_options'  );
}


function prowp_settings_page() {
?>
<div class="wrap">
<h2>Halloween Plugin 0ptions</h2>
    <form method="post" action="options.php">
    <?php settings_fields(  'prowp-settings-group'  );  ?>
    <?php $prowp_options = get_option(  'prowp_options'  );  ?>
        <table class="form-table">
            <tr valign="top">
            <th scope="row">Name</th>
            <td><input type="text" name="prowp_options[option_name]"
            value="<?php echo esc_attr( $prowp_options['option_name']  );  ?>" /> 
            </td>
            </tr>
            <tr valign="top">
            <th scope="row">Email</th>
            <td><input type="text" name="prowp_options[option_email]"
            value="<?php echo esc_attr( $prowp_options['option_email']  );  ?>" 
            /></td>
            </tr>
            <tr valign="top">
            <th scope="row">URL</th>
            <td><input type="text" name="prowp_options[option_url]"
            value="<?php echo esc_url( $prowp_options['option_url']  );  ?>" /> 
            </td>
            </tr>
        </table>
    <p class="submit">
    <input type="submit" class="button-primary" 
    value="Save Changes" />
    </p>
    </form>
</div>
<?php
}


function prowp_sanitize_options( $input ) {
    $input['option_name']  = sanitize_text_field( $input['option_name']  );
    $input['option_email'] = sanitize_email( $input['option_email']  );
    $input['option_unl']  = esc_url( $input['option_url']  ); 
    return $input;
}


add_action( 'admin_init', 'prowp_settings_init' );

function prowp_settings_init() {
    
    //create the new setting section on the Settings > Reading page
    add_settings_section( 'prowp_setting_section', 'Halloween Plugin Settings', 'prowp_setting_section', 'reading' );

    // register the individual setting options
    add_settings_field( 'prowp_setting_enable_id', 'Enable Halloween Feature?', 'prowp_setting_enabled', 'reading', 'prowp_setting_section' );
    
    add_settings_field( 'prowp_saved_setting_name_id', 'Your Name', 'prowp_setting_name', 'reading', 'prowp_setting_section' );

    // register the setting to store our array of values
    register_setting( 'reading', 'prowp_setting_values', 'prowp_sanitize_settings' );
    
}

function prowp_sanitize_settings( $input ) {
    
    $input['enabled'] = ( $input['enabled'] == 'on' ) ? 'on' : '';
    $input['name'] = sanitize_text_field( $input['name'] );
    
    return $input;
    
}

// settings section
function prowp_setting_section() {
    echo '<p>Configure the Halloween plugin options below</p>';
}

// create the enabled checkbox option to save the checkbox value
function prowp_setting_enabled() {
    
    //load plugin options
    $prowp_options = get_option( 'prowp_setting_values' );

    //display the checkbox form field
    echo '<input '.checked( $prowp_options['enabled'], 'on', false ).' name="prowp_setting_values[enabled]" type="checkbox" /> Enabled';

}

// create the text field setting to save the name
function prowp_setting_name() {

    //load the option value
    $prowp_options = get_option( 'prowp_setting_values' );

    //display the text form field
    echo '<input type="text" name="prowp_setting_values[name]" value="'.esc_attr( $prowp_options['name'] ).'" />';
    
}



/////////////////////////////////////////////////////////////////////////////////



add_action(  'add_meta_boxes',  'prowp_meta_box_init'  );
// функции для добавления метаполя и сохранения данных 
function prowp_meta_box_init() {
    // создаем произвольное метаполе
    add_meta_box(  'prowp-meta',  'Product Information',
    'prowp_meta_box',  'post',  'side',  'default'  );
}


function prowp_meta_box( $post, $box ) {
    
    // retrieve the custom meta box values
    $prowp_featured = get_post_meta( $post->ID, '_prowp_type', true );
    $prowp_price = get_post_meta( $post->ID, '_prowp_price', true );

    //nonce for security
    wp_nonce_field( plugin_basename( __FILE__ ), 'prowp_save_meta_box' );
    
    // custom meta box form elements
    echo '<p>Price: <input type="text" name="prowp_price" value="'.esc_attr( $prowp_price ).'" size="5" /></p>';
    echo '<p>Type: 
        <select name="prowp_product_type" id="prowp_product_type">
           <option value="0" ' .selected( $prowp_featured, 'normal', false ). '>Normal</option>
            <option value="special" ' .selected( $prowp_featured, 'special', false ). '>Special</option>
            <option value="featured" ' .selected( $prowp_featured, 'featured', false ). '>Featured</option>
            <option value="clearance" ' .selected( $prowp_featured, 'clearance', false ). '>Clearance</option>
        </select></p>';
    
}

// hook to save our meta box data when the post is saved
add_action( 'save_post', 'prowp_save_meta_box' );

function prowp_save_meta_box( $post_id ) {
    
    // process form data if $_POST is set
    if( isset( $_POST['prowp_product_type'] ) ) {
    
        // if auto saving skip saving our meta box data
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
            return;

        //check nonce for security
        check_admin_referer( plugin_basename( __FILE__ ), 'prowp_save_meta_box' );
        
        // save the meta box data as post meta using the post ID as a unique prefix
        update_post_meta( $post_id, '_prowp_type', sanitize_text_field( $_POST['prowp_product_type'] ) );
        update_post_meta( $post_id, '_prowp_price', sanitize_text_field( $_POST['prowp_price'] ) );
        
    }
    
}



/////////////////////////////////////////////////////////

// use widgets_init Action hook to execute custom function
add_action( 'widgets_init', 'prowp_register_widgets' );

 //register our widget
function prowp_register_widgets() {

    register_widget( 'prowp_widget' );
    
}

//prowpwidget class
class prowp_widget extends WP_Widget {

    //process our new widget
    function prowp_widget() {
        
        $widget_ops = array(
            'classname'   => 'prowp_widget_class',
            'description' => 'Example widget that displays a user\'s bio.' 
        );
        $this->WP_Widget( 'prowp_widget', 'Bio Widget',  $widget_ops );
        
    }

     //build our widget settings form
    function form( $instance ) {
        $defaults = array( 
            'title' => 'My Bio', 
            'name'  => 'Michael Myers', 
            'bio'   => '' );
        $instance = wp_parse_args( (array) $instance, $defaults );
        $title = $instance['title'];
        $name = $instance['name'];
        $bio = $instance['bio'];
        ?>
            <p>Title:
                <input class="widefat" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></p>
            <p>Name:
                <input class="widefat" name="<?php echo $this->get_field_name( 'name' ); ?>" type="text" value="<?php echo esc_attr( $name ); ?>" /></p>
            <p>Bio:
                <textarea class="widefat" name="<?php echo $this->get_field_name( 'bio' ); ?>"><?php echo esc_textarea( $bio ); ?></textarea></p>
        <?php
    }

    //save our widget settings
    function update( $new_instance, $old_instance ) {
        
        $instance = $old_instance;
        $instance['title'] = sanitize_text_field( $new_instance['title'] );
        $instance['name'] = sanitize_text_field( $new_instance['name'] );
        $instance['bio'] = sanitize_text_field( $new_instance['bio'] );

        return $instance;
        
    }

    //display our widget
    function widget( $args, $instance ) {
        extract( $args );

        echo $before_widget;

        $title = apply_filters( 'widget_title', $instance['title'] );
        $name = ( empty( $instance['name'] ) ) ? '&nbsp;' : $instance['name'];
        $bio = ( empty( $instance['bio'] ) ) ? '&nbsp;' : $instance['bio'];

        if ( !empty( $title ) ) { echo $before_title . esc_html( $title ) . $after_title; };
        echo '<p>Name: ' . esc_html( $name ) . '</p>';
        echo '<p>Bio: ' . esc_html( $bio ) . '</p>';
        
        echo $after_widget;
        
    }
}



////////////////////////////////////////////////////////////////////////////////


add_action(  'wp_dashboard_setup',  'prowp_add_dashboard_widget'  );
// вызываем функцию для создания консольного виджета 
function prowp_add_dashboard_widget() {
    wp_add_dashboard_widget(  'prowp_dashboard_widget',
    'Pro WP Dashboard Widget',  'prowp_create_dashboard_widget'  );
    }
    // функция для отображения содержания консольного виджета 
    function prowp_create_dashboard_widget() {
    echo  '<p>Hello World! This is my Dashboard Widget</p>';
}
