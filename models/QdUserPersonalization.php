<?php

class QdUserPersonalization extends QdRoot
{
    static $table_name = 'mpd_user_personalization';

    public static function getFieldsConfig()
    {
        return array_merge(parent::getFieldsConfig(), array(
            'username' => array(
                'ReadOnly' => true
            ),
            'userid' => array(
                'DataType' => 'Code',
                'FieldClass' => 'Normal',//'FlowField'
                'TableRelation' => array(
                    'Table' => 'QdUser',
                    'Field' => 'id',
                    'TableFilter' => array()
                ),
            ),
            'active' => array(
                'DataType' => 'Boolean'
            ),
            'language' => array(
                'DataType' => 'Option',
                'Options' => array(
                    Qdmvc_Config::$LANG_viVN => array(
                        'Caption' => array('en-US' => 'Vietnamese', 'vi-VN' => 'Tiếng Việt'),
                    ),
                    Qdmvc_Config::$LANG_enUS => array(
                        'Caption' => array('en-US' => 'English', 'vi-VN' => 'Tiếng Anh'),
                    ),
                )
            )
        ));
    }

    public static function getInitObj()
    {
        $obj = new QdUserPersonalization();
        $obj->language = Qdmvc_Config::$LANG_viVN;
        $obj->active = true;
        return $obj;
    }

    protected function useridOnValidate($field_name)
    {
        $u = QdUser::GET($this->$field_name);

        $c = new QdUserPersonalization();
        $c->SETRANGE('userid', $this->$field_name);
        $c = $c->GETLIST();
        $c = empty($c)?null:$c[0];

        if ($u == null) {
            $this->pushValidateError($field_name, $field_name.' không tồn tại trong QdUser', 'error');
        } else {
            if(($this->is_new_record() && $c != null) || ($c!=null && $c->id != $this->id))
            {
                $this->pushValidateError('userid', 'UserID đã tồn tại trong bảng', 'error');
                return false;
            }

            $this->username = $u->username;
            $this->pushValidateError('username', 'UserName tự động gán từ QdUser', 'info');
        }
    }

    public function delete($location = '')
    {
        if($this->active == true)
        {
            $this->pushValidateError('active', 'Không thể xóa khi Active = true', 'error');
            return false;
        }
        return parent::delete($location); // TODO: Change the autogenerated stub
    }
}