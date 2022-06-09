<div class="login">
  <?php if (isUser()): ?>
    <?=$this->component('button', [
      'href' => baseUrl(),
      'title' => __('tpl_to_main_page'),
    ])?>
  <?php else: ?>
    <h2 class="login__title">
      <?=__('user_login_enter_to_site')?>
    </h2>
    <p class="login__description">
      <?=__('user_login_authorize_with_google_text')?>
    </p>
    <?=$this->component('google-button', [
      'href' => $href,
      'text' => __('user_login_continue_with_google')
    ])?>
  <?php endif; ?>
</div>