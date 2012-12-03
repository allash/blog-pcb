<?php
/**
 * Created by JetBrains PhpStorm.
 * User: allash
 * Date: 02.12.12
 * Time: 2:32
 * To change this template use File | Settings | File Templates.
 */
class RegisterForm extends CFormModel
{
    public $username;
    public $password;
    public $email;

    public $passwordIdentity;

    public function rules()
    {
        return array(
            // username and password are required
            array('username, password, email', 'required'),
        );
    }
}
