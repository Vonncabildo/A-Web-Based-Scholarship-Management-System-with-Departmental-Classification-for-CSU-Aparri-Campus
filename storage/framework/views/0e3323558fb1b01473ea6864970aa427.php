

<?php $__env->startSection('title', 'Student • Scholarship Details'); ?>

<?php $__env->startSection('content'); ?>
  <div class="card">
    <div class="row">
      <div>
        <p class="h1"><?php echo e($scholarship['title']); ?></p>
        <p class="muted"><?php echo e($scholarship['description']); ?></p>
      </div>
      <span class="badge"><?php echo e(strtoupper($scholarship['status'])); ?></span>
    </div>

    <div style="margin-top:12px;">
      <p class="muted"><b>Deadline:</b> <?php echo e($scholarship['deadline']); ?></p>
      <p class="muted"><b>Eligible Program:</b> <?php echo e($scholarship['eligible_program']); ?></p>
      <p class="muted"><b>Eligible Year Level:</b> <?php echo e($scholarship['eligible_year_level']); ?></p>
    </div>

    <div style="margin-top:14px;" class="row">
      <a class="btn" href="<?php echo e(route('student.scholarships')); ?>">Back</a>

      <?php if($scholarship['status'] === 'open'): ?>
        <a class="btn primary" href="<?php echo e(route('student.apply', $scholarship['id'])); ?>">Apply Now</a>
      <?php else: ?>
        <span class="badge">Applications closed</span>
      <?php endif; ?>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\scholarship-portal\resources\views/student/details.blade.php ENDPATH**/ ?>