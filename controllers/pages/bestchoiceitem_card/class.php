<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:36 PM
 */
Qdmvc::loadPage('root');
class Qdmvc_Page_BestChoiceItem extends Qdmvc_Page_Root {
    public function run()
    {
        parent::run();
    }
    protected static function getViewClass()
    {
        return 'Qdmvc_View_BestChoiceItem';
    }

    public static function getPage()
    {
        return 'bestchoiceitem_card';
    }

    public function getInitObj()
    {
        $obj = parent::getInitObj();
        $obj->type = 100;
        return $obj;

    }


    protected static function initFields()
    {
        return array(
            'Group1' => array(
                'Type' => 'Group',
                'Name' => 'General',
                'Fields' => array(
                    'id' => array(
                        'SourceExpr' => 'id',
                        'PrimaryKey' => true
                    ),
                    'content' => array(
                        'SourceExpr' => 'content',
                    ),
                    'short_content' => array(
                        'SourceExpr' => 'short_content',
                    ),
                    'avatar' => array(
                        'SourceExpr' => 'avatar',
                        'DataType' => static::getDataType('avatar')
                    ),
                    'type' => array(
                        'SourceExpr' => 'type',
                        'DataType' => static::getDataType('type'),
                        'ReadOnly' => static::isReadOnly('type')
                    )
                )
            )
        );
    }

}