<?php

class QdUser extends QdRoot
{
    static $table_name = 'mpd_user';

    public static function getFieldsConfig()
    {
        $obj = array_merge(parent::getFieldsConfig(), array(
            'username' => array(
                'ReadOnly' => true
            ),
            'displayname' => array(
                'ReadOnly' => true
            ),
            'status' => array(
                'DataType' => 'Boolean',
                'ReadOnly' => true
            ),
        ));
        $obj['id']['ReadOnly'] = true;
        return $obj;
    }

    public static function getInitObj()
    {
        $obj = new QdUser();
        return $obj;
    }

    protected function idOnValidate($field_name)
    {
        if($this->{$field_name}=='')
        {
            $this->pushValidateError($field_name, '"model" phải khác rỗng');
        }
    }

    public function fn_syncfromwp($location, $params = array())
    {
        //remove all
        QdUser::delete_all();
        //copy all from WP
        $users = get_users();
        $count = 0;
        foreach ( $users as $user ) {
            $tmp = new QdUser();
            $tmp->id = $user->ID;
            $tmp->username = $user->user_login;
            $tmp->displayname = $user->display_name;
            $tmp->status = $user->user_status;
            $tmp->email = $user->user_email;
            $location .= sprintf('|%s|%s', $this->getCalledClassName(), 'fn_syncfromwp');
            if($tmp->save($location))
            {
                $count++;
            }
        }
        $this->pushValidateError('', 'Total Users: ' . $count, 'info');
        return $count > 0;
    }

}