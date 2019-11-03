<?php

namespace App\Controllers;

use App\models\User;

class UserController
{
    public function home($data)
    {
        require __DIR__."/../Views/User.php";
    }

    public function create($request)
    {
        $attributes = $request->getParsedBody();
        $user = new User();
        foreach ($attributes as $key => $attribute):
            $user->$key = $attribute;
        endforeach;
        if ($user->save()) {
            $usr = ['id' => $user->id, 'owner' => $user->data()->owner, 'iban' => $user->data()->iban];
            return $usr;
        } else {
            return false;
        }
    }

    public function update()
    {

    }

    public function error()
    {
        echo "404";
    }
}