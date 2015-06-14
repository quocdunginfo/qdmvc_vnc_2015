<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:36 PM
 */
Qdmvc::loadPage('root_setup');
class Qdmvc_Page_TRootSetup extends Qdmvc_Page_RootSetup {

    protected static function getViewClass()
    {
        return 'Qdmvc_View_TRootSetup';
    }

    public static function getPage()
    {
        return 'theme_root_setup';
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
                    'topleft_tuvan' => array(
                        'SourceExpr' => 'topleft_tuvan',

                    ),
                    'topcenter_promotion' => array(
                        'SourceExpr' => 'topcenter_promotion',

                    ),
                    'topright_navs' => array(
                        'SourceExpr' => 'topright_navs',

                    ),
                    'bottomleft_footer_note' => array(
                        'SourceExpr' => 'bottomleft_footer_note',

                    ),
                    'widgetnavcat_id' => array(
                        'SourceExpr' => 'widgetnavcat_id',


                    ),
                    'partnergrp_id' => array(
                        'SourceExpr' => 'partnergrp_id',


                    ),
                    'vnc_logo' => array(
                        'SourceExpr' => 'vnc_logo',

                    ),
                    'commercial_logo' => array(
                        'SourceExpr' => 'commercial_logo',

                    ),
                    'social_icon' => array(
                        'SourceExpr' => 'social_icon',


                    ),
                    'img_slider' => array(
                        'SourceExpr' => 'img_slider',

                        
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