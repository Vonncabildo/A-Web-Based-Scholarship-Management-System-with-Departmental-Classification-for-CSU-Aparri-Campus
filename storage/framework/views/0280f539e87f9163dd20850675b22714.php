

<?php $__env->startSection('title', 'Student • Scholarships'); ?>

<?php $__env->startSection('content'); ?>
  <div class="card">
    <div class="row">
      <div>
        <p class="h1">Available Scholarships</p>
        <p class="muted">Showing only scholarships with status <b>Open</b> (hardcoded from config/mock.php).</p>
      </div>
      <span class="badge"><?php echo e(count($scholarships)); ?> open</span>
    </div>
  </div>

  <div class="grid" style="margin-top:12px;">
    <?php $__empty_1 = true; $__currentLoopData = $scholarships; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
      <div class="card half">
        <div class="row">
          <div>
            <b><?php echo e($s['title']); ?></b>
            <div class="muted">Deadline: <?php echo e($s['deadline']); ?></div>
            <div class="muted">Eligible: <?php echo e($s['eligible_program']); ?> • <?php echo e($s['eligible_year_level']); ?></div>
          </div>
          <span class="badge">Open</span>
        </div>

        <p class="muted" style="margin-top:10px;"><?php echo e($s['description']); ?></p>

        
        <a class="btn primary" href="<?php echo e(route('student.scholarships.details', $s['id'])); ?>">
            View Details
        </a>
      </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
      <div class="card">
        <b>No open scholarships.</b>
        <p class="muted">Check back later.</p>
      </div>
    <?php endif; ?>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\scholarship-portal\resources\views/student/scholarships.blade.php ENDPATH**/ ?>