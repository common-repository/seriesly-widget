<?php
class sly_widget extends WP_Widget {
    function sly_widget() { 
        $widget_ops = array('classname' => 'sly_widget', 'description' => "Inserta fichas de Series.ly en tu blog");
        $this->WP_Widget('sly_widget', "Series.ly Widget", $widget_ops);
    }
    function widget($args,$instance) {
		
		$sly_width = "350";
		$sly_height = "149";
		if ($instance['sly_SIZE'] == 1) {
			$sly_width = "350";
			$sly_height = "40";
		}
		if ($instance['sly_SIZE'] == 2) {
			$sly_width = "200";
			$sly_height = "200";
		}
		
		$sly_border = "";
		if ($instance['sly_BORDER'] == 1) {
			$sly_border = ' style="border: 2px solid rgb(10, 81, 161)"';
		}
		if ($instance['sly_BORDER'] == 2) {
			$sly_border = ' style="border: 5px solid rgb(10, 81, 161)"';
		}
		
        echo $before_widget; 
        ?>
        <aside id='mpw_widget' class='widget myp_widget'>
            <h3 class='widget-title'><?php echo $instance["sly_TITLE"]; ?></h3>
            <p><center><iframe src="http://www.prosoparidas.com/lab/sly-widget/search.php?q=<?php echo $instance["sly_Q"]; ?>&size=<?php echo $instance["sly_SIZE"]; ?>" width="<?php echo $sly_width; ?>" height="<?php echo $sly_height; ?>" frameborder="0" scrolling="no"<?php echo $sly_border; ?>></iframe></center></p>
        </aside>
        <?php
        echo $after_widget;
    }
    function update($new, $old) {
        $instance = $old;
        $instance["sly_TITLE"] = strip_tags($new["sly_TITLE"]);
		$instance["sly_Q"] = strip_tags($new["sly_Q"]);
		$instance["sly_SIZE"] = strip_tags($new["sly_SIZE"]);
		$instance["sly_BORDER"] = strip_tags($new["sly_BORDER"]);
        return $instance;     
    }
    function form($instance) {
        ?>
         <p>
            <label for="<?php echo $this->get_field_id('sly_TITLE'); ?>">Título:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('sly_TITLE'); ?>" name="<?php echo $this->get_field_name('sly_TITLE'); ?>" type="text" value="<?php echo esc_attr($instance["sly_TITLE"]); ?>" />
         </p>
         <p>
            <label for="<?php echo $this->get_field_id('sly_Q'); ?>">Nombre de la ficha:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('sly_Q'); ?>" name="<?php echo $this->get_field_name('sly_Q'); ?>" type="text" value="<?php echo esc_attr($instance["sly_Q"]); ?>" />
         </p>
         <p>
            <label for="<?php echo $this->get_field_id('sly_SIZE'); ?>">Tama&ntilde;o:</label>
            <select id="<?php echo $this->get_field_id('sly_SIZE'); ?>" name="<?php echo $this->get_field_name('sly_SIZE'); ?>">
            <option value="0"<?php if (esc_attr($instance["sly_SIZE"]) == 0) { ?> selected="selected"<?php } ?>>Estándar</option>
            <option value="1"<?php if (esc_attr($instance["sly_SIZE"]) == 1) { ?> selected="selected"<?php } ?>>Pequeño</option>
            <option value="2"<?php if (esc_attr($instance["sly_SIZE"]) == 2) { ?> selected="selected"<?php } ?>>Cuadrado</option>
            </select>
         </p>
         <p>
            <label for="<?php echo $this->get_field_id('sly_BORDER'); ?>">Borde:</label>
            <select id="<?php echo $this->get_field_id('sly_BORDER'); ?>" name="<?php echo $this->get_field_name('sly_BORDER'); ?>">
            <option value="0"<?php if (esc_attr($instance["sly_BORDER"]) == 0) { ?> selected="selected"<?php } ?>>Ninguno</option>
            <option value="1"<?php if (esc_attr($instance["sly_BORDER"]) == 1) { ?> selected="selected"<?php } ?>>Fino</option>
            <option value="2"<?php if (esc_attr($instance["sly_BORDER"]) == 2) { ?> selected="selected"<?php } ?>>Grueso</option>
            </select>
         </p>
         <?php
    }    
}
?>