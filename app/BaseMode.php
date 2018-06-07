<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class

BaseModel extends Model
{
    public $actions = [
        'create',
        'create-own',
        'read',
        'read-own',
        'update',
        'update-own',
        'delete',
        'delete-own',

    ];

    public static function getActions()
    {
        return (new static())->actions;
    }

    public function canUserActionWithOwn(string $action, $user)
    {
        if (empty($user)) {
            return false;
        }
        if (empty($this->user_id)) {
            return $user->can($action, $this);
        } else {
            return $user->can($action, $this) || ($user->can("$action-own", $this) && $this->user_id == $user->id);
        }
    }
}