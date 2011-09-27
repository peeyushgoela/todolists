<?php if($this->Session->check('User'))echo Header('Location:/work_lists/');?>
<?php echo $this->Html->css('cake.generic');?>
<br><br><br><br><br><br><br><br>
<div class='view'>
<font size=5 >
TO DO LISTS is a small web app wherein you can :
<br/>
<ul>
<li>Keep Track of your tasks</li>
<li>Keep systematic record of of your daily schedule</li>
<li>Prioritize</li>
<li>Never forget anything again</li>
</ul>
</font>
<br/><br/>
Hope You Like it:
<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
      <fb:like></fb:like>
   
</div>

<div class='actions'>
	<ul>
		<li><?php echo '<br/>'.$this->Html->link(__('Login'), array('controller'=>'users','action' => 'login')); ?></li>
		<li><?php echo '<br/>'.$this->Html->link(__('SignUp'), array('controller'=>'users','action' => 'add')); ?></li>
	</ul>
</div>	
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
