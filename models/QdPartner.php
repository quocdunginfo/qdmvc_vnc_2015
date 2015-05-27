<?php

class QdPartner extends QdWidgetNav
{
    public static function getFieldsConfig()
    {
        $obj = parent::getFieldsConfig();
        $obj['group_id']['TableRelation']['Table'] = 'QdPartnerGrp';
        $obj['type']['Options'] = array(
            static::$TYPE_PARTNER => array(
                'Caption' => array('en-US' => 'Partner', 'vi-VN' => 'Partner'),
            ),
        );
        return $obj;
    }

    public static function getInitObj()
    {
        $obj = new QdPartner();
        $obj->target = static::$TARGET_BLANK;
        $obj->type = static::$TYPE_PARTNER;
        $obj->active = true;
        return $obj;
    }
}