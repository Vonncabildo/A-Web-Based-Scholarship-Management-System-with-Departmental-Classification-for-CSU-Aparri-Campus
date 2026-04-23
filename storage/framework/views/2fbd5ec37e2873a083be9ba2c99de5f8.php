

<?php $__env->startSection('title', 'Admin • Review Application'); ?>

<?php $__env->startSection('content'); ?>
  <div class="card">
    <div class="row">
      <div>
        <p class="h1">Review Application</p>
        <p class="muted">Approve or reject. Approval generates Reference ID and enables student portal login.</p>
      </div>
      <a class="btn" href="<?php echo e(route('admin.applications')); ?>">Back</a>
    </div>
  </div>

  <div class="card" style="margin-top:12px;">
    <b>Applicant:</b> <?php echo e($application['applicant_name']); ?><br>
    <span class="muted">Email: <?php echo e($application['email']); ?></span><br>
    <span class="muted">Program: <?php echo e($application['program']); ?> • Year: <?php echo e($application['year_level']); ?></span><br>
    <span class="muted">Scholarship: <?php echo e($application['scholarship_title']); ?></span><br>
    <span class="muted">Current Status: <?php echo e(strtoupper($application['status'] ?? 'pending_review')); ?></span>

    <div style="margin-top:12px;">
      <form method="POST" action="<?php echo e(route('admin.applications.approve')); ?>" style="margin-bottom:10px;">
        <?php echo csrf_field(); ?>
        <label><b>Admin Remarks (optional)</b></label><br>
        <input name="admin_remarks" placeholder="Remarks..."
          style="width:100%; margin-top:6px; padding:10px; border-radius:10px; border:1px solid #1f2833; background:#0b0d10; color:#e8eef6;">
        <div class="row" style="margin-top:10px;">
          <button class="btn primary" type="submit">Approve</button>
        </div>
      </form>

      <form method="POST" action="<?php echo e(route('admin.applications.reject')); ?>">
        <?php echo csrf_field(); ?>
        <label><b>Admin Remarks (optional)</b></label><br>
        <input name="admin_remarks" placeholder="Reason for rejection..."
          style="width:100%; margin-top:6px; padding:10px; border-radius:10px; border:1px solid #1f2833; background:#0b0d10; color:#e8eef6;">
        <div class="row" style="margin-top:10px;">
          <button class="btn" type="submit">Reject</button>
        </div>
      </form>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\scholarship-portal\resources\views/admin/review.blade.php ENDPATH**/ ?>