

<?php $__env->startSection('title', 'Student • Apply'); ?>

<?php $__env->startSection('content'); ?>
  <div class="card">
    <p class="h1">Apply: <?php echo e($scholarship['title']); ?></p>
    <p class="muted">Prototype form. Submitting will store the application in session (no database).</p>

    <form method="POST" action="<?php echo e(route('student.apply.submit', $scholarship['id'])); ?>" style="margin-top:12px;">
      <?php echo csrf_field(); ?>

      <div class="grid">
        <div class="card half">
          <label><b>Name</b></label><br>
          <input name="applicant_name" required placeholder="Full name"
                 style="width:100%; margin-top:6px; padding:10px; border-radius:10px; border:1px solid #1f2833; background:#0b0d10; color:#e8eef6;">
        </div>

        <div class="card half">
          <label><b>Email</b></label><br>
          <input type="email" name="email" required placeholder="you@email.com"
                 style="width:100%; margin-top:6px; padding:10px; border-radius:10px; border:1px solid #1f2833; background:#0b0d10; color:#e8eef6;">
        </div>

        <div class="card half">
          <label><b>Program</b></label><br>
          <input name="program" required placeholder="e.g., BSIT"
                 style="width:100%; margin-top:6px; padding:10px; border-radius:10px; border:1px solid #1f2833; background:#0b0d10; color:#e8eef6;">
        </div>

        <div class="card half">
          <label><b>Year Level</b></label><br>
          <input name="year_level" required placeholder="e.g., 2nd Year"
                 style="width:100%; margin-top:6px; padding:10px; border-radius:10px; border:1px solid #1f2833; background:#0b0d10; color:#e8eef6;">
        </div>
      </div>

      <div class="row" style="margin-top:12px;">
        <a class="btn" href="<?php echo e(route('student.scholarships.details', $scholarship['id'])); ?>">Back</a>
        <button class="btn primary" type="submit">Submit Application</button>
      </div>
    </form>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\scholarship-portal\resources\views/student/apply.blade.php ENDPATH**/ ?>