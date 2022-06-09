<div class="p-list">
  
  <header class="p-list__header">
    <h1 class="p-list__title">
      <?=__('tpl_lessons')?>
    </h1>

    <div class="p-list__filter-list">
      <a 
        href="<?=baseUrl()?>lessons" 
        class="p-list__filter-button <?=(!$pinnedMode && !$doneMode) ? 'is-active' : ''?>"
      >
        <?=__('tpl_all')?>
      </a>
      <a 
        href="<?=baseUrl()?>lessons?pinned=true"
        class="p-list__filter-button <?=($pinnedMode) ? 'is-active' : ''?>"
      >
        <?=__('tpl_pinned')?>
      </a>
      <a 
        href="<?=baseUrl()?>lessons?done=true"
        class="p-list__filter-button <?=($doneMode) ? 'is-active' : ''?>"
      >
        <?=__('tpl_finished')?>
      </a>
    </div>
  </header>
  

  <div class="p-list__items">
    <?php if (!isUser() && ($pinnedMode || $doneMode)): ?>
      <?php 
        $redirectTo = '';

        if ($pinnedMode) $redirectTo = 'lessons?pinned=true';
        if ($doneMode) $redirectTo = 'lessons?done=true';
      ?>
      <?=$this->component('button', [
        'href' => baseUrl() . 'login?redirectTo=' . $redirectTo,
        'title' => __('tpl_login'),
      ])?>
    <?php else: ?>

      <?php if (count($list)): ?>
        <?php foreach ($list as $item): ?>
          <div class="p-list__item">
            <?=$this->component('lesson-card', [
              'item' => $item,
              'href' => baseUrl() . 'lessons/' . $item['slug']
            ])?>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <div class="p-list__not-found">
          <div class="p-list__not-found-text">
            <?php if ($pinnedMode): ?>
              <?=__('tpl_pinned_lessons_not_found')?>
            <?php elseif ($doneMode): ?>
              <?=__('tpl_finished_lessons_not_found')?>
            <?php else: ?>
              Not found
            <?php endif; ?>
          </div>
          <?=$this->component('button', [
            'href' => baseUrl() . 'lessons',
            'title' => __('tpl_all_lessons'),
          ])?>
        </div>
    <?php endif; ?>

    <?php endif; ?>

    
  </div>
</div>
