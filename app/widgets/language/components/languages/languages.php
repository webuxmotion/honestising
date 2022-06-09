<div class="w-languages">
    <button class="w-languages__button">
        <?= icon("lang-" . $this->language['code']) ?>
    </button>
    <nav id="languages" class="w-languages__dropdown">
        <?php foreach ($this->languages as $k => $v): ?>
            <div>
                <button class="w-languages__button js-dropdown-item" data-code="<?= $k ?>">
                    <?= icon("lang-" . $k) ?>
                </button>
            </div>
        <?php endforeach; ?>
    </nav>
</div>