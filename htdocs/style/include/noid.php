<?php
includeTemplate('style/include/header.php', compact('title'));
?>

<label class="description">Sorry, the <?php echo $type ?> <span
class="ticketid"><?php echo $id ?></span> does not exist or is
expired.</label>

<?php
includeTemplate('style/include/footer.php');
?>
