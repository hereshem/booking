	<div class="users login">
		<h3>Login</h3>
		<div id="login-content" class="clearfix">
			<?php echo $this->Form->create('User',array('class'=>'form'));?>
				<fieldset>
					<div class="control-group">
						<label class="control-label" for="username">Email</label>
						<div class="controls">
							<?php echo $this->Form->input('email',array('label'=>false));?>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="password">Password</label>
						<div class="controls">
							<?php echo $this->Form->input('password',array('label'=>false));?>
						</div>
					</div>
				</fieldset>


				<div class="pull-right">
					<button type="submit" class="btn btn-warning btn-large">Login</button>
				</div>
			</form>

		</div> <!-- /login-content -->
		<div id="login-extra">
			<p>Remind Password? 
			<?php echo $this->Html->link('Retrieve.',array('controller'=>'pages','action'=>'forgot_password'))?></p>
			Developed By <?php echo $this->Html->link('Mantra Ideas Pvt. Ltd.','http://mantraideas.com',array('target'=>'_blank'));?>
			
		</div> <!-- /login-extra -->
	</div>