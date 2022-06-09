<div class="sidebar">
  <div class="sidebar__column">
    <a href="<?=baseUrl()?>" class="sidebar__logo">
      <?=icon('logo-small')?>
    </a>
    <!-- <a href="<?=baseUrl()?>" class="sidebar__control">
      <?=icon('burger')?>
    </a> -->
    <a href="<?=baseUrl()?>lessons?pinned=true" class="sidebar__control">
      <?=icon('pin')?>
    </a>
    <a href="<?=baseUrl()?>lessons?done=true" class="sidebar__control">
      <?=icon('done')?>
    </a>
    <!-- <a href="<?=baseUrl()?>" class="sidebar__control">
      <?=icon('army-text')?>
    </a> -->
  </div>
  <div class="sidebar__column">
    <!-- <a href="<?=baseUrl()?>" class="sidebar__control">
      <?=icon('dollar-sign')?>
    </a> -->
    <?php new \app\widgets\language\Language() ?>
  </div>
</div>