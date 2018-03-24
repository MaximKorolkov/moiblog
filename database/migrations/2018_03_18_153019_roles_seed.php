<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RolesSeed extends Migration
{
    protected $data = [
        'admin' => 'Администратор',
        'moderator' => 'Модератор',
        'user' => 'Пользователь',
    ];

    public function up()
    {
        foreach ($this->data as $name => $title) {
            DB::table('roles')->insert([
                'name' => $name,
                'title' => $title,
            ]);
        }
    }

    public function down()
    {
        DB::table('roles')->delete();
    }
}
