

<?php $__env->startSection('title', 'Admin • Login'); ?>

<?php $__env->startSection('content'); ?>
  <div class="card">
    <p class="h1">Admin Login (Prototype)</p>
    <p class="muted">No real credentials. Clicking login will set <b>session(role=admin)</b>.</p>

    <form method="POST" action="<?php echo e(route('admin.login.submit')); ?>">
      <?php echo csrf_field(); ?>
      <button class="btn primary" type="submit">Login as Admin</button>
      <a class="btn" href="<?php echo e(route('entry')); ?>">Back</a>
    </form>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\scholarship-portal\resources\views/admin/login.blade.php ENDPATH**/ ?>