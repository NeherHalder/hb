<?php $__env->startSection('main-content'); ?>
<div class="column block">
	<h5 class="bk-org title">
		<?php echo e(__('home.contact.title')); ?>

	</h5>
	<p>&nbsp;</p>
	<div style="padding-left: 10px;width: 50%; float: left; padding-right: 35px;">
		<table border="0" style="width: 100%;">
	        <form method="POST" action="<?php echo e(url('contact')); ?>" style="margin-left: 15px;">
			    <?php echo e(csrf_field()); ?>   
				<tbody>
					<?php if(Session::has('success')): ?>
						<tr>
							<td colspan="2" style="text-align: center; color: green;">
								<?php echo e(Session::get('success')); ?>

							</td>
						</tr>
					<?php endif; ?>
					<tr>
						<td style="width: 25%;text-align: center;">
							<label for="name"><?php echo e(__('home.contact.name')); ?></label>
						</td>
						<td style="width: 75%;">
							<input type="text" name="name" style="width: 100%;" <?php echo e(old('name')); ?>>
							<?php if($errors->first('name')): ?>
								<label style="color: darkred;"><?php echo e($errors->first('name')); ?></label>
							<?php endif; ?>
						</td>
					</tr>
					<tr>
						<td style="width: 25%;text-align: center;">
							<label for="mobile"><?php echo e(__('home.contact.mobile')); ?></label>
						</td>
						<td style="width: 75%;">
							<input type="text" name="mobile" style="width: 100%;" value="<?php echo e(old('mobile')); ?>">
							<?php if($errors->first('mobile')): ?>
								<label style="color: darkred;"><?php echo e($errors->first('mobile')); ?></label>
							<?php endif; ?>
						</td>
					</tr>
					<tr>
						<td style="width: 25%;text-align: center;">
							<label for="email"><?php echo e(__('home.contact.email')); ?></label>
						</td>
						<td style="width: 75%;">
							<input type="text" name="email" style="width: 100%;" value="<?php echo e(old('email')); ?>">
							<?php if($errors->first('email')): ?>
								<label style="color: darkred;"><?php echo e($errors->first('email')); ?></label>
							<?php endif; ?>
						</td>
					</tr>
					<tr>
						<td style="width: 25%;text-align: center;">
							<label for="subject"><?php echo e(__('home.contact.subject')); ?></label>
						</td>
						<td style="width: 75%;">
							<input type="text" name="subject" style="width: 100%;" value="<?php echo e(old('subject')); ?>">
							<?php if($errors->first('subject')): ?>
								<label style="color: darkred;"><?php echo e($errors->first('subject')); ?></label>
							<?php endif; ?>
						</td>
					</tr>
					<tr>
						<td style="width: 25%;text-align: center;">
							<label for="message"><?php echo e(__('home.contact.message')); ?></label>
						</td>
						<td style="width: 75%;">
							<textarea name="message" id="message" style="width: 100%;" rows="4" placeholder="<?php echo e(__('home.contact.message_ph')); ?>"></textarea>
							<?php if($errors->first('message')): ?>
								<label style="color: darkred;"><?php echo e($errors->first('message')); ?></label>
							<?php endif; ?>
						</td>
					</tr>
					<tr style="text-align: center;">
						<td colspan="2">
							<button type="submit" class="btn-template-main">
								<?php echo e(__('home.contact.send_btn')); ?>

							</button>
						</td>
					</tr>
				</tbody>
	        </form>
		</table>
	</div>
	<div style="width: 10px; float: left; border-right: 2px solid #eee; height: 300px;">
	</div>
    <div style="width: 40%; float: left; margin-left: 15px; text-align: center;">
        <table border="0"" style="width: 100%; font-size: 1.2em;">
		    <tbody>
                <tr>
                	<td>
                		<h5><?php echo e(language('Contact for Hall/Seminar Room Booking', 'হল/সেমিনার কক্ষ ভাড়া বিষয়ক তথ্যের জন্য যোগাযোগ করুন')); ?></h5>
                	</td>
                </tr>
                <tr>
                	<td>
                		<strong><?php echo e(language('Khondkar Asif Mahtab', 'খন্দকার আসিফ মাহতাব')); ?></strong>
                	</td>
                </tr>
                <tr>
                	<td>
                		<?php echo e(language('Librarian (Development Wing)', 'লাইব্রেরিয়ান (ডেভেলপমেন্ট উইং)')); ?>

                	</td>
                </tr>
                <tr>
                	<td>
                		<?php echo e(language('Department of public library', 'গণগ্রন্থাগার অধিদপ্তর')); ?>,
                	</td>
                </tr>
                <tr>
                	<td>
                		<?php echo language('10, Kazi Nazrul Islam Avenue, <br> Shahbagh, Dhaka-1000', '১০, কাজী নজরুল ইসলাম এভিনিউ, <br> শাহবাগ, ঢাকা-১০০০.'); ?>

                	</td>
                </tr>  
                <tr>
                	<td>
                		<?php echo e(language('Email: librariandpl.dev@gmail.com', 'ইমেইল: librariandpl.dev@gmail.com')); ?>

                	</td>
                </tr>
                <tr>
                	<td>
                		<?php echo e(language('Mobile: 01716034982', 'মোবাইল: ০১৭১৬০৩৪৯৮২')); ?>

                	</td>
                </tr>              
                <tr>
                	<td>
                		<?php echo e(language('Phone: 0258610422', 'ফোন: ০২৫৮৬১০৪২২')); ?>

                	</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>