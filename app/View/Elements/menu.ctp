<fieldset>
	<ul id="menuAux">
	    <li><?php echo $this->Html->link('Selo - Aplicado no Cliente', 
		array('controller' => 'pages', 'action' => 'display', 'testSign'), 
		array('title' => 'Selo - Aplicado no Cliente')); ?></li>
	
	    <li><?php echo $this->Html->link('Selo Valido', 
		array('controller' => 'sign', 'action' => 'validaters', 'client' => '1'), 
		array('title' => 'Selo Valido')); ?></li>
	
	    <li><?php echo $this->Html->link('Selo - Invalido', 
		array('controller' => 'sign', 'action' => 'invalid'), 
		array('title' => 'Selo Invalido')); ?></li>
	
	    <li><?php echo $this->Html->link('Selo - Denuncie', 
		array('controller' => 'sign', 'action' => 'reportit'), 
		array('title' => 'Denuncie')); ?></li>

	
	</ul>
</fieldset>