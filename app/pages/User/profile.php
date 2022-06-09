<div class="p-profile">
  <?=$this->component('message')?>
  <h1 class="p-profile__title">
    <?=upperFirst(__('tpl_profile'))?>
  </h1>

  <?php if (isAdmin()): ?>
    <a href="<?=PATH?>admin">
      Admin panel
    </a>
  <?php endif; ?>
  
  <a href="<?=baseUrl()?>user/logout">
    <?=__('tpl_logout')?>
  </a>

  <form method="POST" action="/user/update">
    <h2 class="p-profile__section-title">
      <?=__('user_profile_main_information')?>
    </h2>
    <div class="p-profile__items">
      <?=$this->component('input', [
        'title' => __('tpl_first_name'),
        'id' => 'firstName',
        'value' => $user['firstName'],
        'name' => 'firstName'
      ])?>
      <?=$this->component('input', [
        'title' => __('tpl_last_name'),
        'id' => 'lastName',
        'value' => $user['lastName'],
        'name' => 'lastName'
      ])?>
      <?=$this->component('input', [
        'title' => 'Email',
        'id' => 'email',
        'value' => $user['email'],
        'name' => 'email',
        'disabled' => true
      ])?>
      <?=$this->component('input', [
        'title' => __('tpl_phone'),
        'id' => 'phone',
        'value' => $user['phone'],
        'name' => 'phone',
      ])?>
    </div>
    
    <h2 class="p-profile__section-title">
      <?=__('user_profile_additional_information')?>
    </h2>
    <div class="p-profile__items">
      <?=$this->component('input', [
        'title' => 'Telegram',
        'id' => 'telegram',
        'value' => $user['telegram'],
        'name' => 'telegram',
      ])?>
      <?=$this->component('input', [
        'title' => 'Facebook',
        'id' => 'facebook',
        'value' => $user['facebook'],
        'name' => 'facebook',
      ])?>
    </div>
    
    <div class="p-profile__save-button-wrapper">
      <?=$this->component('button', [
        'title' => __('tpl_save'),
      ])?>
    </div>
    
  </form>
</div>