<?php $__env->startSection('main-content'); ?>
	<div class="column block">
		<h5 class="bk-org title">
			<?php echo e(__('auth.title')); ?>

		</h5>
		<p>&nbsp;</p>
		
		<form action="<?php echo e(url('login')); ?>" method="POST" style="margin-left: 20px;">
			<?php echo e(csrf_field()); ?>

			<table border="0">
				<tbody>
					<tr>
						<td style="width: 25%;text-align: right;"><?php echo e(__('auth.login.username')); ?></td>
						<td style="width: 75%;">
							<input type="text" name="username" style="width: 350px;" required value="<?php echo e(old('username')); ?>">
							<?php if($errors->first('username')): ?>
							<p style="font-style: italic; color: darkred;">
								<?php echo e(__('auth.failed')); ?>

							</p>
							<?php endif; ?>
						</td>
					</tr>
					<tr>
						<td style="width: 25%;text-align: right;">
							<?php echo e(__('auth.login.password')); ?>

						</td>
						<td style="width: 75%;">
							<input type="password" name="password" style="width: 350px;" required>
						</td>
					</tr>
					<tr>
						<td style="width: 25%;text-align: right;"></td>
						<td style="width: 75%;">
							<input type="submit" value="<?php echo e(__('auth.login.submit')); ?>">
						</td>
					</tr>
				</tbody>
			</table>
		</form>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>