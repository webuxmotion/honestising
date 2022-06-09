<?php
  $type = '';
  $show = false;
  $content = '';
  $icon = '';

  if (isset($_SESSION['errors'])) {
    $type = 'is-danger';
    $content = $_SESSION['errors'];
    $show = true;
    $icon = icon('danger');
  } else if (isset($_SESSION['success'])) {
    $type = 'is-success';
    $content = $_SESSION['success'];
    $show = true;
    $icon = icon('check');
  }
?>


<?php if ($show): ?>
<div class="message section <?=$type?>">
  <div class="container">
    <div class="message__body">
      <div class="message__icon">
        <?=$icon?>
      </div>
      <?=$content?>
    </div>
  </div>
</div>
<?php endif; ?>

<?php 

unset($_SESSION['errors']); 
unset($_SESSION['success']); 

?>