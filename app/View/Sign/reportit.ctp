<?php
	$this->set('body_class', 'layout1');
	$this->set('body_page', 'reportit');
?>

<div class="center">
	
	<!-- Left -->
	<div class="l">

		<h1>DENUNCIE</h1>
		
		<p>Denuncie foi criado para que o consumidor possa denunciar um site suspeito, que apresenta um Selo Site Blindado falso sem que tenham sido feitos os testes de vulnerabilidades.</p>
		<p>A mensagem ser‡ diretamente enviada ao departamento respons‡vel da Site Blindado S/A, que entrar‡ em contato com a empresa denunciada.</p>
		<p>Preencha o endereo do site que deseja denunciar e ajude a tornar a internet mais segura.</p>
		
		<h2>Denuncie um selo falso</h2>
		
		<?php echo $this->Form->create('Sign'); ?>
		<ul>
			<li><?php echo $this->Form->input('Sign.reportit.url', array('type' => 'text', 'div' => false, 'class' => 'txt', 'label' => __d('view', 'Sign.reportit.url.title'))); ?></li>
			<li><?php echo $this->Form->input('Sign.reportit.name', array('type' => 'text', 'div' => false, 'class' => 'txt', 'label' => __d('view', 'Sign.reportit.name.title'))); ?></li>
			<li><?php echo $this->Form->input('Sign.reportit.email', array('type' => 'text', 'div' => false,  'class' => 'txt','label' => __d('view', 'Sign.reportit.email.title'))); ?></li>
			<li><?php echo $this->Form->input('Sign.reportit.message', array('type' => 'textarea', 'div' => false,  'class' => 'textarea', 'label' => __d('view', 'Sign.reportit.message.title'))); ?></li>
	       	<li><?php echo $this->Form->submit(__d('view', 'Sign.reportit.submit.title'), array( 'div' => false, 'class' => 'submit')); ?></li>
		</ul>	

		<?php echo $this->Form->end(); ?>
		<div class="clear"></div>
	</div>
	
	<!-- Right -->
	<div class="r">

		<div class="clear"></div>		
	</div>

	<div class="clear"></div>	
</div>		