

<?php $__env->startSection('title', 'Entry • Role Selection'); ?>

<?php $__env->startSection('content'); ?>
  <div class="card">
    <p class="h1">Role Selection</p>
    <p class="muted">Choose where you want to go. This prototype uses session-based role simulation and hardcoded data.</p>

    <div class="grid" style="margin-top:12px;">
      <div class="card half">
        <div class="row">
          <div>
            <b>Student / Applicant</b>
            <div class="muted">Browse scholarships and apply (no login).</div>
          </div>
          <a class="btn primary" href="<?php echo e(route('student.scholarships')); ?>">Enter</a>
        </div>
      </div>

      <div class="card half">
        <div class="row">
          <div>
            <b>Admin</b>
            <div class="muted">Login (simulated) to access dashboard.</div>
          </div>
          <a class="btn primary" href="<?php echo e(route('admin.login')); ?>">Login</a>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\scholarship-portal\resources\views/entry/index.blade.php ENDPATH**/ ?>