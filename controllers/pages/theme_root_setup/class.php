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
                'Order' => 20,
                'Name' => array(
                    'vi-VN' => 'Header',
                    'en-US' => 'Header'
                ),
                'Fields' => array(
                    'topleft_tuvan' => array(
                        'Order' => 10
                    ),
                    'topcenter_promotion' => array(
                        'Order' => 20
                    ),
                    'topright_navs' => array(
                        'Order' => 30
                    ),
                    'vnc_logo' => array(
                        'Order' => 40
                    ),
                    'img_slider' => array(
                        'Order' => 50
                    ),
                )
            ),
            'Tab2' => array(
                'Type' => 'Group',
                'Order' => 10,
                'Name' => array(
                    'vi-VN' => 'Footer',
                    'en-US' => 'Footer'
                ),
                'Fields' => array(
                    'widgetnavcat_id' => array(
                        'Order' => 10
                    ),
                    'partnergrp_id' => array(
                        'Order' => 20
                    ),
                    'social_icon' => array(
                        'Order' => 30
                    ),
                    'bottomleft_footer_note' => array(
                        'Order' => 40
                    ),
                    'commercial_logo' => array(
                        'Order' => 50
                    ),
                )
            ),
            'Tab3' => array(
                'Type' => 'Group',
                'Order' => 30,
                'Name' => array(
                    'vi-VN' => 'SEO',
                    'en-US' => 'SEO'
                ),
                'Fields' => array(
                    'seo_title_struct' => array(
                        'Order' => 10,
                    ),
                    'seo_title_struct_2' => array(
                        'Order' => 20,
                    ),
                    'seo_description_struct' => array(
                        'Order' => 30,
                    ),
                    'seo_keywords_struct' => array(
                        'Order' => 40,
                    ),
                )
            ),
            'Group1' => array(
                'Type' => 'Group',
                'Order' => 90,
                'Name' => array(
                    'vi-VN' => 'Khác...',
                    'en-US' => 'Other...'
                ),
                'Fields' => array(
                    'id' => array(
                        'Hidden' => true,
                        'Order' => 10,
                    ),
                    'banner_service_page' => array(
                        'Order' => 20,
                    ),
                )
            ),
        );
    }

}