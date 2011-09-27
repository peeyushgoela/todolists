<div class="workLists form">
<?php echo $this->Form->create('WorkList');?>
	<fieldset>
 		<legend><?php __('Edit Work List'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id',array('type'=>'hidden','value'=>$this->Session->read('UserId')));
		echo $this->Form->input('item');
		echo $this->Form->input('priority',array('type'=>'hidden'));
		echo $this->Form->input('isComplete',array('label'=>'Check if The Task is Complete'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('WorkList.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('WorkList.id'))); ?></li>
		<li><?php echo $this->Html->link(__('All Tasks'), array('action' => 'index'));?></li>
	</ul>
</div>