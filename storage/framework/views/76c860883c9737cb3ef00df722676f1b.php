

<?php $__env->startSection('title', 'Student • Submitted'); ?>

<?php $__env->startSection('content'); ?>
  <div class="card">
    <p class="h1">Application Submitted</p>
    <p class="muted">Your application is now recorded as <b>Pending Review</b> (session-only prototype).</p>

    <div style="margin-top:12px;">
      <p class="muted"><b>Applicant:</b> <?php echo e($application['applicant_name']); ?></p>
      <p class="muted"><b>Email:</b> <?php echo e($application['email']); ?></p>
      <p class="muted"><b>Scholarship:</b> <?php echo e($application['scholarship_title']); ?></p>
      <p class="muted"><b>Status:</b> <?php echo e(strtoupper($application['status'])); ?></p>
      <p class="muted"><b>Submitted:</b> <?php echo e($application['submitted_at']); ?></p>
    </div>

    <div class="row" style="margin-top:14px;">
      <a class="btn" href="<?php echo e(route('student.scholarships')); ?>">Back to Scholarships</a>
      <a class="btn" href="<?php echo e(route('entry')); ?>">Home</a>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\scholarship-portal\resources\views/student/submitted.blade.php ENDPATH**/ ?>