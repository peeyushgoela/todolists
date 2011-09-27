<div class="workLists index">
	<h2><?php echo __('Work Lists');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<!--<th><?php echo $this->Paginator->sort('id');?></th>-->
			<!--<th><?php echo $this->Paginator->sort('user_id');?></th>-->
			<th><?php echo $this->Paginator->sort('priority');?></th>
			<th><?php echo $this->Paginator->sort('Tasks');?></th>
			<th><?php echo $this->Paginator->sort('Status');?></th>
			<th><?php echo $this->Paginator->sort('Created On ');?></th>
			<th class="actions"><?php echo '<center>'.__('Actions').'</center>';?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($workLists as $workList):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<!--<td><?php echo h($workList['WorkList']['id']); ?>&nbsp;</td>-->
		<!--<td>
			<?php echo $this->Html->link($workList['User']['id'], array('controller' => 'users', 'action' => 'view', $workList['User']['id'])); ?>
		</td>-->
		<td><?php 
			if($workList['WorkList']['priority']==1)
			{
				if(!$workList['WorkList']['isComplete'])
				echo '<font size="4" color=#ff0000><b>'.__('URGENT').'</b></font>';
				else
				echo __('WAS Urgent');
			}
			else if($workList['WorkList']['priority']==2)
			{
				if(!$workList['WorkList']['isComplete'])
				echo '<font size="4" color=#00ff00><b>'.__('NORMAL').'</b></font>';
				else
				echo __('WAS Normal');
			}
			if($workList['WorkList']['priority']==3)
			{
				if(!$workList['WorkList']['isComplete'])
				echo '<font size="4" color=#0000ff><b>'.__('LOW').'</b></font>';
				else
				echo __('WAS Low');
			}
			?>&nbsp;</td>
		<td><?php echo h($workList['WorkList']['item']); ?>&nbsp;</td>
		<td><?php if($workList['WorkList']['isComplete']==0)
			   {echo '<font color=#ff0000><b>Pending</b></font>';}
			   else {echo '<font color=#00ff00><b>DONE</b></font>';}; ?>&nbsp;</td>
		<td><?php echo h($workList['WorkList']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $workList['WorkList']['id'])); ?>
			<?php echo $this->Html->Link(__('Delete'), array('action' => 'delete', $workList['WorkList']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous'), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next') . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Task'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Account'), array('controller' => 'users', 'action' => 'deleteacc',$this->Session->read('UserId')),null,__('Are you sure you want to DELETE your account??')); ?> </li>
	</ul>
</div>