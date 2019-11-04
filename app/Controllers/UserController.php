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

    public function update($request)
    {
        $attributes = $request->getParsedBody();
        $model = new User();
        $user = $model->findById($attributes['id']);
        $user->iban = $attributes['paymentId'];
        $user->save();
    }

    public function destroy($request)
    {
        $attributes = $request->getParsedBody();
        $user = (new User())->findById($attributes['id']);
        return $user->destroy();
    }

    public function success($iban)
    {
        $iban = $iban;
        require __DIR__."/../Views/Iban.php";
    }

    public function error()
    {
        echo "404";
    }
}