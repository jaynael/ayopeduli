<div class="sidebar">
	<ul>
	<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(1) ) : else : ?>
         
         <!--<li>
             <h2><?php _e('Search'); ?></h2>
             <ul>
            <li><form action="<?php bloginfo('url'); ?>/" method="GET">
            <input type="text" value="Search..." name="s" id="ls" class="searchfield" onfocus="if (this.value == 'Search...') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Search...';}" />
            <input type="submit" value="Search!" class="searchbutton" />
            </form></li>
            </ul>
        </li>
        
         <li>
      		  <h2><?php _e('Pages'); ?></h2>
              <ul>
              <li><a href="<?php bloginfo('url'); ?>">Home</a></li>
              <?php wp_list_pages('depth=1&title_li='); ?>
              </ul>
           	  
        	</li>

        <li>
        <h2><?php _e('Categories'); ?></h2>
            <ul>
            <?php wp_list_cats('sort_column=name&hierarchical=0'); ?>
            </ul>
        </li>-->
      	
        

        
	<?php endif; ?>
	</ul>
    </div>