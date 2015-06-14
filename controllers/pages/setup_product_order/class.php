<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:36 PM
 */
Qdmvc::loadPage('root_setup');
class Qdmvc_Page_SetupProductOrder extends Qdmvc_Page_RootSetup {
    protected static function getViewClass()
    {
        return 'Qdmvc_View_SetupProductOrder';
    }

    public static function getPage()
    {
        return 'setup_product_order';
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
                    'advice_phone' => array(
                        'SourceExpr' => 'advice_phone',

                    ),
                    'support_phone' => array(
                        'SourceExpr' => 'support_phone',

                    ),
                    'order_form_title' => array(
                        'SourceExpr' => 'order_form_title',

                    ),
                    'form_order_done_title' => array(
                        'SourceExpr' => 'form_order_done_title',

                    ),
                    'form_order_done_tpl' => array(
                        'SourceExpr' => 'form_order_done_tpl',

                    ),
                    'order_done_email_title' => array(
                        'SourceExpr' => 'order_done_email_title',
                    ),
                    'order_done_email_tpl' => array(
                        'SourceExpr' => 'order_done_email_tpl',

                    ),
                    'form_order_done_avatar' => array(
                        'SourceExpr' => 'form_order_done_avatar',

                    ),
                    'btn_dathang' => array(
                        'SourceExpr' => 'btn_dathang',

                    ),
                    'btn_goidathang' => array(
                        'SourceExpr' => 'btn_goidathang',

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