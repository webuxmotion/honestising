<?php

namespace app\models;

class LessonPinModel extends AppModel
{
  public $table = 'lesson_pin';

  public $attributes = [
    'lesson_id' => '',
    'user_id' => '',
  ];

  public $rules = [
    'required' => [
        'lesson_id',
        'user_id'
    ],
  ];

  public function togglePin($lessonId) {
    $userId = $_SESSION['user']['id'] ?? null;

    if ($userId) {
        $sql = "
            SELECT * FROM {$this->table}
            WHERE user_id = ?
            AND lesson_id = ?
        ";

        $res = $this->db->query($sql, [$userId, $lessonId]);
        
        $item = $res[0] ?? null;

        if ($item) {
            $sql = "
                DELETE FROM {$this->table}
                WHERE id = ?
            ";
            $res = $this->db->execute($sql, [$item['id']]);
        } else {
            $this->load([
                'lesson_id' => $lessonId,
                'user_id' => $userId,
            ]);
            $this->save();
        }
    } else {
      $_SESSION['errors'] = 'Please Enter to site';
    }
  }
}