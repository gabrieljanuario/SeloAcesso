<div class="center">
	
	<!-- Left -->
	<div class="l">

		<h1><?php echo __d('view', 'Valid.title'); ?></h1>
		<p><?php echo __d('view', 'Valid.title.subscr'); ?></p>
	
		<div id="statsBox" class="border5 box">
				<div id="sl1" class="line">
					<span class="l1"><?php echo __d('view', 'Valid.boxstats.line1.label'); ?></span>
					<span class="l2"><?php echo $sign['Sign']['url']; ?></span>
				</div>	

				<div id="sl2" class="line">
					<span class="l1"><?php echo __d('view', 'Valid.boxstats.line2.label'); ?></span>
					<span class="l2"><?php echo __d('view', 'Valid.boxstats.line2.value'); ?> <?php echo date('Y-m-d', strtotime($sign['Sign']['created'])); ?></span>
				</div>	

				<div id="sl3" class="line">
					<span class="l1"><?php echo __d('view', 'Valid.boxstats.line3.label'); ?></span>
					<span class="l2"><?php echo $sign['Sign']['razao_social']; ?></span>
				</div>	
		</div>	

		<div id="disclaimer" class="border5 box">
			<h2><?php echo __d('view', 'Valid.disclaimer.title'); ?></h2>
			<p><?php echo __d('view', 'Valid.disclaimer.subscr'); ?></p>
		</div>

		<div id="btnFooter">
			<a class="btn1 border5" href="#"><?php echo __d('view', 'Valid.btnverifique.value'); ?></a>
			<a class="btn2 border5" href="#"><?php echo __d('view', 'Valid.btndenuncie.value'); ?></a>
		</div>
		

	
		<div class="clear"></div>
	</div>
	
	<!-- Right -->
	<div class="r">

		<div class="clear"></div>		
	</div>

	<div class="clear"></div>	
</div>	