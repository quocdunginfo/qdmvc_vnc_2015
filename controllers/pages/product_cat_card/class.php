<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:36 PM
 */
Qdmvc::loadPage('root');
class Qdmvc_Page_ProductCat_Card extends Qdmvc_Page_Root {
    protected static function getViewClass()
    {
        return 'Qdmvc_View_ProductCat_Card';
    }

    public static function getPage()
    {
        return 'product_cat_card';
    }
    public function getPagePartURL($part_name='')
    {
        return '';
        //return "http://localhost/mpd_2015/wp-admin/admin.php?page=product_card&qdrole=navigate&filterdatafield0=product_cat_id&filtervalue0=95";//quocdunginfo
    }
    protected static function initFields()
    {
        return array(
            'General' => array(
                'Type' => 'Group',
                'Fields' => array(
                    'id' => array(
                        'SourceExpr' => 'id',
                        'ReadOnly' => true
                    ),

                    'type' => array(
                        'SourceExpr' => 'type',

                    ),
                    'type2' => array(
                        'SourceExpr' => 'type2',

                    ),
                    'level' => array(

                    ),
                    'name' => array(
                        'SourceExpr' => 'name'
                    ),
                    'avatar' => array(
                        'SourceExpr' => 'avatar',

                    ),
                    'parent_id' => array(
                        'SourceExpr' => 'parent_id',
                    ),
                    '_parent_name' => array(
                        'SourceExpr' => '_parent_name',


                    ),
                    'order' => array(
                        'SourceExpr' => 'order'
                    ),
                    'active' => array(
                        'SourceExpr' => 'active',

                    )
                )
            ),
            /*
            'Lines' => array(
                'Type' => 'Part',
                'SubType' => 'Page',
                'PagePartID' => 'product_card',
                'SubPageLink' => array(
                    'Field' => 'product_cat_id',
                    'Type' => 'FIELD',//'CONST'
                    'Value' => 'id'
                )
            )//quocdunginfo*/
        );
    }
}