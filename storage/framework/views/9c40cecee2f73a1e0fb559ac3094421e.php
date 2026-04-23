

<?php $__env->startSection('title', 'Admin • Applications'); ?>

<?php $__env->startSection('content'); ?>
  <div class="card">
    <div class="row">
      <div>
        <p class="h1">Applications</p>
        <p class="muted">Prototype list. Reads from session('application') only.</p>
      </div>
      <div class="row">
        <a class="btn" href="<?php echo e(route('admin.dashboard')); ?>">Back</a>
        <a class="btn" href="<?php echo e(route('admin.logout')); ?>">Logout</a>
      </div>
    </div>

    <?php if(session('msg')): ?>
      <p class="muted" style="margin-top:10px;"><b>Notice:</b> <?php echo e(session('msg')); ?></p>
    <?php endif; ?>
  </div>

  <div class="card" style="margin-top:12px;">
    <?php if(!$application): ?>
      <b>No submitted application yet.</b>
      <p class="muted">Submit one from the Student flow first (Apply → Submit).</p>
    <?php else: ?>
      <div class="row">
        <div>
          <b><?php echo e($application['applicant_name']); ?></b>
          <div class="muted"><?php echo e($application['email']); ?></div>
          <div class="muted">Scholarship: <?php echo e($application['scholarship_title']); ?></div>
        </div>

        <span class="badge">
          <?php echo e(strtoupper($application['status'] ?? 'pending_review')); ?>

        </span>
      </div>

      <?php if(!empty($application['reference_id'])): ?>
        <p class="muted" style="margin-top:10px;"><b>Reference ID:</b> <?php echo e($application['reference_id']); ?></p>
      <?php endif; ?>

      <?php if(!empty($application['admin_remarks'])): ?>
        <p class="muted"><b>Remarks:</b> <?php echo e($application['admin_remarks']); ?></p>
      <?php endif; ?>

      <a class="btn primary" href="<?php echo e(route('admin.applications.review')); ?>" style="margin-top:10px;">
        Review Application
      </a>
    <?php endif; ?>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\scholarship-portal\resources\views/admin/applications.blade.php ENDPATH**/ ?>