<?php


namespace app\models;


use yii\base\Model;

class Login extends Model
{
    public $email;
    public $password;

    public function rules()
    {
        return [
            [['email', 'password'], 'required'],
            ['email', 'email'],
            ['password', 'validatePassword'] //Собственная функция для валидации пароля
        ];
    }

    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) //Если нет ошибок в валидации
        {
            $user = $this->getUser(); //Получаем пользователя для дальнейшего сравнения пароля

            if(!$user || !$user->validatePassword($this->password))
            {
                //Если мы НЕ нашли в базе такого пользователя
                //или введенный пароль и пароль пользователя в базе НЕ равны то,
                $this->addError($attribute, 'Пароль или пользователь введены не верно');
                //добавляем новую ошибку
            }
        }
    }

    public function getUser()
    {
        return User::findOne(['email' => $this->email]); //А получаем мы пользователя по введенному имейлу
    }
}