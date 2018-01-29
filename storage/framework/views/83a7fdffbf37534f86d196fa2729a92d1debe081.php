<?php $schedules = app('App\Http\CalendarService'); ?>



<?php $__env->startSection('style'); ?>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
<div class="column block">
	<h5 class="bk-org title">
		<?php echo e(language(
			'See the available hall/seminar rooms before booking',
			'বুকিংয়ের পূর্বে কবে কোন হল/সেমিনার কক্ষের বুকিং আছে তা দেখে নিন'
		)); ?>

	</h5>
	<p>&nbsp;</p>
	<div style="width: 100%;">
		<div style="width: 78%; float: left; padding: 10px 15px;">
			<div id="calendar"></div>
		</div>
		<div style="width: 15%; float: left; padding: 10px 15px;">
			<form action="" method="GET">
				<p style="margin-bottom: 16px;">
					<select name="room" id="" style="height: 35px; font-size: 1.1em;">
						<option value="all" <?php echo e(Request::input('room') == 'all' ?'selected' : ''); ?>>
							<?php echo e(language('All Hall/Seminar Rooms', 'সকল হল/সেমিনার কক্ষ')); ?>

						</option>
						<?php $__currentLoopData = allRoomTypes(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<option value="<?php echo e($key); ?>" <?php echo e(Request::input('room') == $key ?'selected' : ''); ?>>
							<?php echo e(getRoom($key)); ?>

						</option>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</select>
				</p>
				<p style="text-align: center;">
					<input type="submit" value="<?php echo e(language('Search', 'সার্চ করুন')); ?>">
				</p>
			</form>
			<hr>
			<p style="margin-bottom: 10px;">
				<span class="fc-event-dot" style="background-color:#f0ad4e"></span>&nbsp;
				<?php echo e(language('Pending Bookings', 'পেন্ডিং বুকিংসমূহ')); ?>

			</p>
			<p style="margin-bottom: 10px;">
				<span class="fc-event-dot" style="background-color:#337ab7"></span>&nbsp;
				<?php echo e(language('On Processing Bookings', 'প্রক্রিয়াধীন বুকিংসমূহ')); ?>

			</p>
			<p style="margin-bottom: 10px;">
				<span class="fc-event-dot" style="background-color:#008000"></span>&nbsp;
				<?php echo e(language('Approved Bookings', 'অনুমোদিত বুকিংসমূহ')); ?>

			</p>
			<p>
				<span class="fc-event-dot" style="background-color:#c9302c"></span>&nbsp;
				<?php echo e(language('Cancelled Bookings', 'বাতিলকৃত বুকিংসমূহ')); ?>

			</p>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
    	$('#calendar').fullCalendar({
			height: 700,
        	contentHeight: 760,
        	defaultView: 'listWeek',
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay,listWeek'
			},
			editable: false,
			events: <?php echo json_encode($schedules->generate(count($schedules->generate()) ? $schedules->generate() : [] )); ?>

		});
	});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>