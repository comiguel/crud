<?php


class UserTableSeeder extends Seeder {
    public function run(){
        User::create(array(
            'name'=> 'Administrator',
            'lastname' => 'admin.com',
            'username' => 'admin',
            'pass' => Hash::make('1234') // Hash::make() nos va generar una cadena con nuestra contraseña encriptada
        ));
    }
}