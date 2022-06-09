<?php

namespace app\widgets\task\core;

use app\models\AppModel;

class TaskModel extends AppModel
{
  public function getTask() {
    $sql = "
      SELECT *
      FROM task
    ";

    $res = $this->db->query($sql);
    //$res = $this->convertToAssoc($res, 'code');

    return $res ?? null;
  }

  public function getQuestion($id, $langId) {
    $sql = "
      SELECT tq.*, qd.text
      FROM task_question tq
      JOIN task_question_description qd
        ON tq.id = qd.task_question_id
      WHERE 
        tq.id = ?
      AND 
        qd.lang_id = ?
    ";

    $res = $this->db->query($sql, [$id, $langId]);
    //$res = $this->convertToAssoc($res, 'code');

    return $res ?? null;
  }

  public function getAnswer($id, $langId) {
    $sql = "
      SELECT ta.*, ad.text
      FROM task_answer ta
      JOIN task_answer_description ad
        ON ta.id = ad.task_answer_id
      WHERE 
        ta.id = ?
      AND 
        ad.lang_id = ?
    ";

    $res = $this->db->query($sql, [$id, $langId]);
    //$res = $this->convertToAssoc($res, 'code');

    return $res ?? null;
  }
}