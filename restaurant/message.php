<?php if (isset($error) AND ! empty($error)): ?>
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="icon fa fa-ban"></i> <?php echo $error; ?>
    </div>
<?php endif; ?>
<?php if (isset($information) AND ! empty($information)): ?>
    <div class="alert alert-info alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="icon fa fa-info"></i> <?php echo $information; ?>
    </div>
<?php endif; ?>
<?php if (isset($warning) AND ! empty($warning)): ?>
    <div class="alert alert-warning alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="icon fa fa-warning"></i> <?php echo $warning; ?>
    </div>
<?php endif; ?>
<?php if (isset($success) AND ! empty($success)): ?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="icon fa fa-check"></i> <?php echo $success; ?>
    </div>
<?php endif; ?>
