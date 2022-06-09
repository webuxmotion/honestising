<div class="w-task-one-item js-task">

  <div 
    class="w-task-one-item__question js-question"
    data-question-id="<?=$this->question['id']?>"
  >
    <h2 class="w-task-one-item__question-title"><?=$this->question['text']?></h2>
    <?php if ($this->question['image']): ?>
      <img 
        src="/images-tasks/<?=$this->question['image']?>" 
        class="w-task-one-item__question-image"
        alt=""
      >
    <?php endif; ?>
  </div>
  <h3 class="w-task-one-item__answers-title">Виберіть варіант:</h3>
  <div class="w-task-one-item__answers-list">
    <?php foreach ($this->answers as $answer): ?>
      <div class="w-task-one-item__answer js-answer">
        <div class="w-task-one-item__success-animation">
          <?php require __DIR__ . '/../success-animation/success-animation.php'; ?>
        </div>
        <label>
          <input 
            type="radio" 
            name="answer" 
            value="<?=$answer['id']?>"
            class="js-input-answer"
          />
        
        <?php if ($answer['text']): ?>
          <div>
            <?=$answer['text']?>
          </div>
        <?php endif; ?>

        <?php if ($answer['image']): ?>
          <img 
            src="/images-tasks/<?=$answer['image']?>" 
            alt=""
            class="w-task-one-item__answer-image"
          >
        <?php endif; ?>
        </label>
      </div>
    <?php endforeach; ?>
  </div>

  <button class="w-task-one-item__button js-confirm-button">Перевирити</button>
</div>