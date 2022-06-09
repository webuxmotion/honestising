<a href="<?=$href?>" class="lesson-card">

  <?php if ($item['has_pin']): ?>
    <span class="lesson-card__icon lesson-card__icon--pin">
      <?=icon('pin-color')?>
    </span>
  <?php endif; ?>
  
  <?php if ($item['has_done']): ?>
    <span class="lesson-card__icon lesson-card__icon--done">
      <?=icon('check-color')?>
    </span>
  <?php endif; ?>

  <?=$item['title']?>
</a>