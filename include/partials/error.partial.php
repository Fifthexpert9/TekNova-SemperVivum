<?php
/**
 * @var string $error
 */
?>

<?php if (isset($error) && $error): ?>
    <div class="alert alert-danger" role="alert">
        <?= htmlspecialchars($error) ?>
    </div>
<?php endif; ?>
