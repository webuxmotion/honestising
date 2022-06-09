<?php

namespace app\controllers;

use app\widgets\task\core\TaskModel;

class TaskController extends AppController {
    
    public function answerAction() {
      $task = get('task', 'string');
      $answer = get('answer', 'string');

      $model = new TaskModel();
      $taskItem = $model->getTask($task)[0];

      if ($taskItem) {
        if ($taskItem['task_answer_id'] === $answer) {
          $successAnswer = $answer;
          $wrongAnswer = '';
        } else {
          $successAnswer = $taskItem['task_answer_id'];
          $wrongAnswer = $answer;
        }
      }

      header('Content-type: application/json');
      echo json_encode([
        'task_id' => $task,
        'wrong_answer' => $wrongAnswer,
        'success_answer' => $successAnswer,
      ]);
      die;
    }
}