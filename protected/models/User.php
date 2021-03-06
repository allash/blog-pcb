<?php
/**
 * Created by JetBrains PhpStorm.
 * User: allash
 * Date: 03.12.12
 * Time: 20:42
 * To change this template use File | Settings | File Templates.
 */

class User extends CActiveRecord
{
    // Сценарий регистрации
    const SCENARIO_SIGNUP = 'signup';

    // Повторный пароль нужно объявить, т.к. этого поля нет в БД
    public $password_repeat;

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'user'; 
    }

    // Правила проверки входящих данных
    public function rules()
    {
        return array(
            // Логин и пароль - обязательные поля
            array('login, password,', 'required'),
            
            array('role', 'safe'),
            // Длина логина должна быть в пределах от 5 до 30 символов
            array('login', 'length', 'min'=>5, 'max'=>30),
            // Логин должен соответствовать шаблону
            array('login', 'match', 'pattern'=>'/^[A-z][\w]+$/'),
            // Логин должен быть уникальным
            array('login', 'unique'),
            // Длина пароля не менее 6 символов
            array('password', 'length', 'min'=>6, 'max'=>30, 'on'=>self::SCENARIO_SIGNUP),
            // Повторный пароль и почта обязательны для сценария регистрации
            array('password_repeat, email', 'required', 'on'=>self::SCENARIO_SIGNUP),
            // Длина повторного пароля не менее 6 символов
            array('password_repeat', 'length', 'min'=>6, 'max'=>30),
            // Пароль должен совпадать с повторным паролем для сценария регистрации
            array('password', 'compare', 'compareAttribute'=>'password_repeat', 'on'=>self::SCENARIO_SIGNUP),
            // Почта проверяется на соответствие типу
            array('email', 'email', 'on'=>self::SCENARIO_SIGNUP),
            // Почта должна быть в пределах от 6 до 50 символов
            array('email', 'length', 'min'=>6, 'max'=>50),
            // Почта должна быть уникальной
            array('email', 'unique'),
            // Почта должна быть написана в нижнем регистре
            array('email', 'filter', 'filter'=>'mb_strtolower'),
        );
    }

    // Метки атрибутов
    public function attributeLabels()
    {
        return array(
            'login' => 'Логин',
            'password' => 'Пароль',
            'password_repeat' => 'Повторите пароль',
            'email' => 'E-mail',
            'role' => 'Роль',
        );
    }

    // Метод, который будет вызываться до сохранения данных в БД
    protected function beforeSave()
    {
        if(parent::beforeSave())
        {
            if($this->isNewRecord)
            {
                // Время регистрации
                $this->dtime_registration = time();
                // Хешировать пароль
                $this->password = $this->hashPassword($this->password);
                $this->activation = $this->hashActivationKey();
                $this->activation_status = 0;
            }

            return true;
        }

        return false;
    }

    public function hashPassword($password)
    {
        return md5($password);
    }


    public function hashActivationKey()
    {
        return sha1(mt_rand(10000, 99999).time().$this->email);
    }

    public function activateAccount()
    {
        $this->activation_status = 1;
    }



    public function search()
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria=new CDbCriteria;
        
/*        if (Yii::app()->user->role !== 'admin') {
            $criteria->addColumnCondition(array('author'=>Yii::app()->user->name));
        }*/
        
   /*     $criteria->compare('pk_user',$this->id);*/
/*        $criteria->compare('dtime_registration',$this->title,true);
        $criteria->compare('login',$this->article,true);
        $criteria->compare('password',$this->date,true);
        $criteria->compare('email',$this->author,true);
        $criteria->compare('role',$this->author,true);*/

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

}
