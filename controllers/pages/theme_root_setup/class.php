<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:36 PM
 */
Qdmvc::loadPage('root_setup');

class Qdmvc_Page_TRootSetup extends Qdmvc_Page_RootSetup
{

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

            'Tab1' => array(
                'Type' => 'Group',
                'Name' => array(
                    'vi-VN' => 'Header',
                    'en-US' => 'Header'
                ),
                'Fields' => array(
                    'topleft_tuvan' => array(
                        'SourceExpr' => 'topleft_tuvan',

                    ),
                    'topcenter_promotion' => array(
                        'SourceExpr' => 'topcenter_promotion',

                    ),
                    'topright_navs' => array(
                        'SourceExpr' => 'topright_navs',

                    ),
                    'vnc_logo' => array(
                        'SourceExpr' => 'vnc_logo',

                    ),
                    'img_slider' => array(
                        'SourceExpr' => 'img_slider',


                    ),
                )
            ),
            'Tab2' => array(
                'Type' => 'Group',
                'Name' => array(
                    'vi-VN' => 'Footer',
                    'en-US' => 'Footer'
                ),
                'Fields' => array(
                    'widgetnavcat_id' => array(
                        'SourceExpr' => 'widgetnavcat_id',


                    ),
                    'partnergrp_id' => array(
                        'SourceExpr' => 'partnergrp_id',


                    ),
                    'social_icon' => array(
                        'SourceExpr' => 'social_icon',


                    ),
                    'bottomleft_footer_note' => array(
                        'SourceExpr' => 'bottomleft_footer_note',

                    ),
                    'commercial_logo' => array(
                        'SourceExpr' => 'commercial_logo',

                    ),
                )
            ),
            'Tab3' => array(
                'Type' => 'Group',
                'Name' => array(
                    'vi-VN' => 'SEO',
                    'en-US' => 'SEO'
                ),
                'Fields' => array(
                    'seo_title_struct' => array(
                    ),
                    'seo_title_struct_2' => array(
                    ),
                    'seo_description_struct' => array(
                    ),
                    'seo_keywords_struct' => array(
                    ),
                )
            ),
            'Group1' => array(
                'Type' => 'Group',
                'Name' => array(
                    'vi-VN' => 'Khác...',
                    'en-US' => 'Other...'
                ),
                'Fields' => array(
                    'id' => array(
                        'SourceExpr' => 'id',
                        'Hidden' => true
                    ),

                    'banner_service_page' => array(),
                )
            ),
        );
    }

}