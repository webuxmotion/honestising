<?php

namespace app\models;

class UserModel extends AppModel {

    protected $table = 'user';
    
    public $attributes = [
        'email' => '',
        'firstName' => '',
        'lastName' => '',
        'avatar' => '',
        'address' => '',
    ];

    public $rules = [
        'required' => [
            ['email'],
        ],
        'email' => [
            ['email'],
        ]
    ];

    public function findDuplicate($key, $value) {
        $sql = "
            SELECT * FROM {$this->table}
            WHERE {$key} = ?
        ";
        
        $res = $this->db->query($sql, [$value]);

        if (empty($res)) {
            return false;
        }

        return $res[0];
    }

    private function setSessionUser($user) {
        foreach ($user as $k => $v) {
            if ($k != 'password') {
                $_SESSION['user'][$k] = $v;
            }
        }
    }

    public function saveGoogleUser($data) {
        $res = $this->findOne($data['email'], 'email');

        $email = $data['email'];
        $avatar = $data['avatar'];

        if (empty($res)) {
            $this->load($data);
            if ($this->validate()) {
                $this->save();
            }
            $res = $this->findOne($email, 'email');
            $this->setSessionUser($res[0]);
        } else {
            $sql = "
                UPDATE user
                SET avatar = ?
                WHERE email = ?
            ";
            $this->db->execute($sql, [$avatar, $email]);

            $res = $this->findOne($email, 'email');
            $this->setSessionUser($res[0]);
        }
    }

    public function updateProfile($data) {
        $user = $_SESSION['user'] ?? null;

        if ($user) {
            $email = $user['email'];
        }
        
        $res = $this->findOne($email, 'email');
        
        if (!empty($res) && !empty($data)) {
            $firstName = $data['firstName'];
            $lastName = $data['lastName'];
            $phone = $data['phone'];
            $facebook = $data['facebook'];
            $telegram = $data['telegram'];

            $sql = "
                UPDATE user
                SET 
                    firstName = ?,
                    lastName = ?,
                    phone = ?,
                    facebook = ?,
                    telegram = ?
                WHERE 
                    email = ?
            ";

            $this->db->execute($sql, [
                $firstName, 
                $lastName,
                $phone,
                $facebook,
                $telegram,
                $email
            ]);

            $res = $this->findOne($email, 'email');

            if (!empty($res)) {
                $this->setSessionUser($res[0]);

                return true;
            }
        }

        return false;
    }
}