

<?php $__env->startSection('title', 'Admin • Dashboard'); ?>

<?php $__env->startSection('content'); ?>
  <div class="card">
    <div class="row">
      <div>
        <p class="h1">Admin Dashboard</p>
        <p class="muted">Prototype dashboard. Next steps will add Scholarship Management, Applications Review, and Compliance Verification pages.</p>
      </div>
      <a class="btn" href="<?php echo e(route('admin.logout')); ?>">Logout</a>
    </div>
  </div>

  <div class="grid" style="margin-top:12px;">
    <div class="card half">
      <b>Scholarship Management</b>
      <p class="muted">Add/Edit Open/Closed scholarships (mock).</p>
      <a class="btn primary" href="<?php echo e(route('admin.applications')); ?>">Open</a>
    </div>

    <div class="card half">
      <b>Application Processing</b>
      <p class="muted">Review applications, Approve/Reject (mock).</p>
      <a class="btn" href="#" onclick="alert('Next step: Admin Applications page will be added later.'); return false;">Open</a>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\scholarship-portal\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>