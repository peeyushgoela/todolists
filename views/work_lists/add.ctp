<div class="workLists form">
<?php echo $this->Form->create('WorkList');?>
	<fieldset>
 		<legend><?php echo __('Add your new Task'); ?></legend>
	<?php
		echo $this->Form->input('user_id',array('type'=>'hidden','value'=>$user));
		echo $this->Form->input('item');
		echo '<b>'.$this->Form->label('Priority:').'</b>';
		echo $this->Form->Select('priority',array(1=>'High',2=>'Medium',3=>'Low'),array('escape'=>false));
		echo $this->Form->input('isComplete',array('type'=>'hidden','value'=>0));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Logout'), array('controller'=>'users','action' => 'logout'));?></li>
		<li><?php echo $this->Html->link(__('Your Lists'), array('action' => 'index')); ?> </li>
	</ul>
</div>