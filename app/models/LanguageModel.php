<?php

namespace app\models;

class LanguageModel extends AppModel
{
  public function getLanguages() {
    $sql = "SELECT code, title, base, id FROM language ORDER BY base DESC";

    $res = $this->db->query($sql);
    $res = $this->convertToAssoc($res, 'code');

    return $res ?? null;
}
}