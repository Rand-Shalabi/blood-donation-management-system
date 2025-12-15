<?php
function show_alert($message, $type = 'danger') {
    if (!empty($message)) {
        if ($type == 'success') {
            $icon = 'bi-check-circle-fill';
        } else {
            $icon = 'bi-exclamation-triangle-fill';
        }
        ?>
        <div class="alert alert-<?php echo $type; ?> alert-dismissible fade show" role="alert">
            <i class="bi <?php echo $icon; ?>"></i> <?php echo htmlspecialchars($message); ?>
            
        </div>
        <?php
    }
}
?>
