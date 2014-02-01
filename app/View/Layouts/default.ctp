<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?> <?php echo __d('view', 'Layouts.fb_default.bazzapp'); ?></title>
        <?php
                // echo $this->Html->meta('icon');
                // echo $this->element('meta');
                                
                echo $this->Html->css('reset-min.css');
                echo $this->Html->css('style.css');
                echo $this->Html->css('style_pages.css');
                                                        
				echo $this->Html->script('jquery.currency.js');
                // echo $this->Html->script('jquery.modal.js');
        		// echo $this->Html->script('jquery.validate.min.js');
        					
                echo $this->fetch('meta');
                echo $this->fetch('css');
                echo $this->fetch('script');
                
                // echo $this->element('google_analytics');
        ?>
</head>
<body lang="br">
	<div id="global" class="<?php print !empty($body_class) ? $body_class : ''; ?> <?php print !empty($body_page) ? $body_page : ''; ?>" >

		<?php // print $this->element('header'); ?>
        <!-- CONTENT -->        
        <div id="content" class="<?php print !empty($body_class) ? $body_class : ''; ?>" >
	        <div id="cont">        
                <?php echo $this->fetch('content'); ?>
                <div class="clear"></div>                
            </div>
        </div>   
        <!-- END#CONTENT -->
        
	</div>

	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
