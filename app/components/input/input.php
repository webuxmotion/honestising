<?php
  $title = $title ?? 'Default title';
  $id = $id ?? null;
  $value = $value ?? '';
  $name = $name ?? '';
  $disabled = $disabled ?? null;
  $type = $type ?? 'text';
?>

<div class="input">
    <?php if ($title): ?>
        <div class="input__label-wrapper">
            <label for="<?=$id?>" class="input__label"><?=$title?></label>
        </div>
    <?php endif; ?>
    <input 
        value="<?=$value?>"
        id="<?=$id?>"
        type="<?=$type?>"
        name="<?=$name?>"
        class="input__input"
        <?=$disabled === true ? "disabled": '' ?>
    />
</div>