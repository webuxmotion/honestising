<?php

namespace app\widgets\task;

use core\Tone;
use app\widgets\task\core\TaskModel;

class Task
{
    protected $tpl;
    protected $language;
    protected $taskId;

    public function __construct($taskId)
    {
        $this->language = Tone::$app->getProperty('language');
        $this->taskId = $taskId;
        $this->tpl = __DIR__ . '/components/one-item/one-item.php';

        $this->setData();
        $this->run();
    }

    protected function run()
    {
        echo $this->getHtml();
    }

    protected function setData() {
        $model = new TaskModel();
        $task = $model->getTask();
        $answers = [];

        if ($task) {
            $task = $task[0];
            $questionId = $task['task_question_id'];
            $langId = $this->language['id'];
            $question = $model->getQuestion($questionId, $langId)[0];
            $answersIdsArr = explode(',', $task['task_answers_ids']);
            
            foreach ($answersIdsArr as $answerId) {
                $answer = $model->getAnswer($answerId, $langId);
                array_push($answers, $answer[0]);
            }
        }

        $this->question = $question;
        
        shuffle($answers);
        $this->answers = $answers;
    }

    protected function getHtml(): string
    {
        ob_start();
        require_once $this->tpl;
        return ob_get_clean();
    }
}