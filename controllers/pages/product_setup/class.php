<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:36 PM
 */
Qdmvc::loadPage('root_setup');
class Qdmvc_Page_ProductSetup extends Qdmvc_Page_RootSetup {
    protected static function getViewClass()
    {
        return 'Qdmvc_View_ProductSetup';
    }

    public static function getPage()
    {
        return 'product_setup';
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
                        'Hidden' => true
                    ),
                    'df_pro_cat_avatar' => array(
                        'SourceExpr' => 'df_pro_cat_avatar',

                    ),
                    'df_product_desc_tpl' => array(
                        'SourceExpr' => 'df_product_desc_tpl',

                    ),
                    'df_pro_avatar' => array(
                        'SourceExpr' => 'df_pro_avatar',

                    ),
                    'bigsalecat_id' => array(
                        'SourceExpr' => 'bigsalecat_id',

                    ),
                )
            )
            /* SAMPLE
            ,
            'Group2' => array(
                'Type' => 'Part',
                'Name' => 'Lines',
                'PagePartID' => '',
                'SubPageLink' => array(
                    'Field' => '',
                    'Type' => 'FIELD',//'CONST',
                    'Value' => ''
                )
            )
            */
        );
    }

}