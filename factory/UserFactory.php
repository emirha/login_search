<?php

namespace Factory;

use App;
use User;

class UserFactory {

    public static function save (User $user) {
        App::$db->prepare(
            'INSERT INTO users SET
                name     = :name,
                email    = :email,
                password = :password'
        );

        App::$db->getQuery()->bindValue(':name',     $user->getName());
        App::$db->getQuery()->bindValue(':email',    $user->getEmail());
        App::$db->getQuery()->bindValue(':password', $user->getPassword());

        if (App::$db->getQuery()->execute()) {
            $user->setId(App::$db->getPdo()->lastInsertId());
            return $user->getId();
        }

        return null;
    }

    public static function getUsernamePass ($username, $password) {
        App::$db->prepare('SELECT * FROM users WHERE email = ? AND password = SHA1(?) LIMIT 1');
        App::$db->getQuery()->bindParam(1,$username);
        App::$db->getQuery()->bindParam(2,$password);
        $users =  App::$db->load('User');
        if (!empty($users))
            return $users[0];
    }

    public static function search($searchTerm) {
        App::$db->prepare('SELECT * FROM users WHERE email LIKE ? OR email LIKE ?');
        $searchTerm = '%'.$searchTerm.'%';
        App::$db->getQuery()->bindParam(1,$searchTerm);
        App::$db->getQuery()->bindParam(2,$searchTerm);
        return App::$db->load('User');
    }

}
