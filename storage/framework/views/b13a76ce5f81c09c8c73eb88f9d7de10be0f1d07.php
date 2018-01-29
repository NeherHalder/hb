<?php $__env->startSection('style'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/jquery.datepick.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
<div class="column block">
    <h5 class="bk-org title">
        <?php echo e(language('Fill out the below form properly to book Hall/Seminar Room', 'হল/সেমিনার রুম ভাড়ার জন্য নিম্নের তথ্যসমূহ সঠিকভাবে পূরণ করুন')); ?>

    </h5>
    <p>&nbsp;</p>
    <div style="margin-left: 16px;">
        <div style="margin-bottom: 10px; border-bottom: 1px solid #e3e3e3;padding-bottom: 14px;margin-right: 30px;">
            <strong>হল/সেমিনার রুম ভাড়া সংক্রান্ত গুরুত্বপূর্ণ তথ্য</strong>
            <p><strong> প্রথম বার্তা: </strong> ফর্ম পূরণ করার পরে।</p>
            <p><strong>দ্বিতীয় বার্তা:</strong> পে অর্ডার (নিরাপত্তা অর্থ) সহ আবেদন জমা দেওয়ার পরে।</p>
            <p><strong>তৃতীয় বার্তা:  </strong> অ্যাডমিন অনুমোদিত হওয়ার পরে, অনুমোদিত চিঠিটি উল্লিখিত সময়ের মধ্যে একটি পৃথক পে অর্ডারের মাধ্যমে আপনি ভাড়া এবং ভ্যাট জমা দেওয়ার জন্য অনুরোধ করা হল।</p>
        </div>
        <?php if(session()->has('collition')): ?>
            <div style="margin-bottom: 10px; border-bottom: 1px solid #e3e3e3; padding-bottom: 9px; font-style: italic; color: darkred;font-size: 1.2em;">
                আপনার প্রদত্ত দিনসমূহে হল/সেমিনার রুমের বুকিং সম্ভব নয় | উক্ত সময়ে বুকিং আছে | নিচে বুকিংসমূহের বিস্তারিত দেখুন |
            </div>
        <?php endif; ?>
        <form method="POST" action="">
            <?php echo e(csrf_field()); ?>

            <table border="0" style="width: 100%;">
                <tbody>
                    <tr>
                        <td style="width: 50%;">
                            <label for="reason"><?php echo e(language('Booking Reason', 'অনুষ্ঠানের উদ্দেশ্য')); ?></label>
                            <select name="reason" id="reason" style="width: 92%; height: 32px;">
                                <option value=""><?php echo e(language('Select Reason', 'নির্বাচন করুন')); ?></option>
                                <option value="conference" <?php echo e(old('reason') == 'conference' ? 'selected' : ''); ?>>
                                    <?php echo e(language('Conference', 'সম্মেলন')); ?>

                                </option>
                                <option value="seminar" <?php echo e(old('reason') == 'seminar' ? 'selected' : ''); ?>>
                                    <?php echo e(language('Seminar', 'সেমিনার')); ?>

                                </option>
                                <option value="movie" <?php echo e(old('reason') == 'movie' ? 'selected' : ''); ?>>
                                    <?php echo e(language('Movie Show', 'চলচ্চিত্র প্রদর্শনী')); ?>

                                </option>
                            </select>
                            <?php if($errors->first('reason')): ?>
                                <label style="color: darkred;"><?php echo e($errors->first('reason')); ?></label>
                            <?php endif; ?>
                        </td>
                        <td style="width: 50%;">
                            <label for="hall_room"><?php echo e(language('Hall/Seminar Room', 'হল / সেমিনার রুম')); ?></label>
                            <select name="hall_room" id="hall_room" style="width: 92%; height: 32px;">
                                <option value=""><?php echo e(language('Select Hall/Seminar Room','হল/সেমিনার রুম সিলেক্ট করুন')); ?></option>
                                <?php $__currentLoopData = allRoomTypes(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key); ?>" 
                                    <?php echo e((old('hall_room') == $key) || (Request::input('room') == $key) ? 'selected' : ''); ?>

                                    ><?php echo e($value); ?> (<?php echo e(entobn(getCapacity($key))); ?> আসন বিশিষ্ট)</option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->first('hall_room')): ?>
                                <label style="color: darkred;"><?php echo e($errors->first('hall_room')); ?></label>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 100%;" colspan="2">
                            <label for="description"><?php echo e(language('Booking Event Description', 'অনুষ্ঠানের সংক্ষিপ্ত বর্ণনা')); ?></label>
                            <textarea name="description" id="description" style="width: 95%;" rows="3"
                            ><?php echo e(old('description')); ?></textarea>
                            <?php if($errors->first('description')): ?>
                                <label style="color: darkred;"><?php echo e($errors->first('description')); ?></label>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;">
                            <label for="popupDatepicker"><?php echo e(language('Event Date (Select event dates for multiple days)', 'অনুষ্ঠানের তারিখ (একাধিক দিনের জন্য অনুষ্ঠানের তারিখসমূহ সিলেক্ট করুন)')); ?></label>
                            <input type="text" name="event_date" style="width: 92%;" id="popupDatepicker" value="<?php echo e(old('event_date')); ?>" autocomplete="off">
                            <?php if($errors->first('event_date')): ?>
                                <label style="color: darkred;"><?php echo e($errors->first('event_date')); ?></label>
                            <?php endif; ?>
                            <?php if(session()->has('collition')): ?>
                                <div style="margin-left: 16px;">
                                    <label style="color: darkred;"><?php echo e(entobn(session()->get('booked'))); ?> তারিখে আপনার বুকিং সম্ভব নয়</label>
                                </div>
                            <?php endif; ?>
                        </td>
                        <td style="width: 50%;">
                            <label for="event_time"><?php echo e(language('Event Time', 'অনুষ্ঠানের সময়')); ?></label>
                            <select name="event_time" id="event_time" style="width: 92%; height: 32px;">
                                <option value=""><?php echo e(language('Select Event Schedule', 'অনুষ্ঠানের সময় সিলেক্ট করুন')); ?></option>
                                <option value="full-day" <?php echo e(old('event_time') == 'full-day' ? 'selected' : ''); ?>>
                                    <?php echo e(language('Full Day Package', 'পূর্ণ দিবস')); ?>

                                </option>
                                <option value="half-mor" <?php echo e(old('event_time') == 'half-mor' ? 'selected' : ''); ?>>
                                    <?php echo e(language('Half Day (Morning)', 'অর্ধ দিবস (সকাল)')); ?>

                                </option>
                                <option value="half-eve" <?php echo e(old('event_time') == 'half-eve' ? 'selected' : ''); ?>>
                                    <?php echo e(language('Half Day (evening)', 'অর্ধ দিবস (বিকাল)')); ?>

                                </option>
                            </select>
                            <?php if($errors->first('event_time')): ?>
                                <label style="color: darkred;"><?php echo e($errors->first('event_time')); ?></label>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;">
                            <label for="no_of_guests"><?php echo e(language('No. of Guests', 'অতিথির সংখ্যা')); ?></label>
                            <input type="number" min="10" name="no_of_guests" style="width: 92%;" value="<?php echo e(old('no_of_guests')); ?>">
                            <?php if($errors->first('no_of_guests')): ?>
                                <label style="color: darkred;"><?php echo e($errors->first('no_of_guests')); ?></label>
                            <?php endif; ?>
                        </td>
                        <td style="width: 50%;">
                            <label for="chief_guest"><?php echo e(language('Chief Guest', 'প্রধান অতিথি')); ?></label>
                            <input type="text" name="chief_guest" style="width: 91%;" value="<?php echo e(old('chief_guest')); ?>">
                            <?php if($errors->first('chief_guest')): ?>
                                <label style="color: darkred;"><?php echo e($errors->first('chief_guest')); ?></label>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;">
                            <label for="main_guest"><?php echo e(language('Main Guest', 'বিশেষ অতিথি')); ?></label>
                            <input type="text" name="main_guest" style="width: 92%;" value="<?php echo e(old('main_guest')); ?>">
                            <?php if($errors->first('main_guest')): ?>
                                <label style="color: darkred;"><?php echo e($errors->first('main_guest')); ?></label>
                            <?php endif; ?>
                        </td>
                        <td style="width: 50%;">
                            <label for="chair_of_the_event"><?php echo e(language('Chair of the Event', 'চেয়ার অফ দ্যা ইভেন্ট')); ?></label>
                            <input type="text" name="chair_of_the_event" style="width: 91%;" value="<?php echo e(old('chair_of_the_event')); ?>">
                            <?php if($errors->first('chair_of_the_event')): ?>
                                <label style="color: darkred;"><?php echo e($errors->first('chair_of_the_event')); ?></label>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;">
                            <label for="applicant_name"><?php echo e(language('Applicant Name', 'আবেদনকারীর নাম')); ?></label>
                            <input type="text" name="applicant_name" style="width: 92%;" value="<?php echo e(old('applicant_name')); ?>">
                            <?php if($errors->first('applicant_name')): ?>
                                <label style="color: darkred;"><?php echo e($errors->first('applicant_name')); ?></label>
                            <?php endif; ?>
                        </td>
                        <td style="width: 50%;">
                            <?php 
                                $checkedNID = old('id_type') == 'nid' ? true : false;
                                $checkedBCN = old('id_type') == 'bcn' ? true : false;
                             ?>
                            <input type="radio" name="id_type" value="nid" }} <?php echo e($checkedBCN ? : 'checked'); ?>><?php echo e(language('NID Number ', 'এনআইডি নং')); ?>

                            <input type="radio" name="id_type" value="bcn" }} <?php echo e($checkedBCN ? 'checked' : ''); ?>><?php echo e(language('BCN Number ', 'জন্মসনদ নম্বর')); ?>


                            <input type="text" name="nid_no" style="width: 91%;" value="<?php echo e(old('nid_no')); ?>"  maxlength="17"  minlength="13">
                            <?php if($errors->first('nid_no')): ?>
                                <label style="color: darkred;"><?php echo e($errors->first('nid_no')); ?></label>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;">
                            <label for="email_address"><?php echo e(language('Email Address (if exists)', 'ইমেইল এড্রেস (যদি থাকে)')); ?></label>
                            <input type="text" name="email_address" style="width: 92%;" value="<?php echo e(old('email_address')); ?>">
                            <?php if($errors->first('email_address')): ?>
                                <label style="color: darkred;"><?php echo e($errors->first('email_address')); ?></label>
                            <?php endif; ?>
                        </td>
                        <td style="width: 50%;">
                            <label for="mobile_no"><?php echo e(language('Mobile Number', 'মোবাইল নম্বর')); ?></label>
                            <input type="text" name="mobile_no" maxlength="11" style="width: 91%;" value="<?php echo e(old('mobile_no')); ?>" placeholder="<?php echo e(language('01XXXXXXXXX', '০১XXXXXXXXX')); ?>">
                            <?php if($errors->first('mobile_no')): ?>
                                <label style="color: darkred;"><?php echo e($errors->first('mobile_no')); ?></label>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 100%;" colspan="2">
                            <label for="address"><?php echo e(language('Applicant\'s Address', 'আবেদনকারীর ঠিকানা')); ?></label>
                            <textarea name="address" id="address" style="width: 95%;" rows="3"
                            ><?php echo e(old('address')); ?></textarea>
                            <?php if($errors->first('address')): ?>
                                <label style="color: darkred;"><?php echo e($errors->first('address')); ?></label>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 100%; text-align: center;" colspan="2">
                            <button type="submit" style="padding: 6px 12px; font-size: 1.2em;">
                                <?php echo e(language('Apply for Booking', 'আবেদন করুন')); ?>

                            </button>
                        </td>
                    </tr>
                </tbody>      
            </table>
        </form>    
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
    $(document).ready(function() {
        $('#popupDatepicker').datepick({
            dateFormat: 'yyyy-mm-dd',
            multiSelect: 999, 
            monthsToShow: 2, 
            showTrigger: '#calImg',
            changeMonth: true,
            changeYear: true
        });
    }); 
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>