<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:30 PM
 */
Qdmvc::loadPage('root');
class Qdmvc_Page_Contact_Card extends Qdmvc_Page_Root
{
    protected static function getViewClass()
    {
        return 'Qdmvc_View_Contact_Card';
    }

    protected static function initFields()
    {
        return array(
            'Group1' => array(
                'Type' => 'Group',
                'Fields' => array(
                    'id' => array(
                        'SourceExpr' => 'id',
                    ),
                    'type' => array(
                        'SourceExpr' => 'type',
                    )
                    ,
                    'name' => array(
                        'SourceExpr' => 'name'
                    ),
                    'email' => array(
                        'SourceExpr' => 'email'
                    ),
                    'phone' => array(
                        'SourceExpr' => 'phone',
                    ),
                    'website' => array(
                        'SourceExpr' => 'website'
                    ),
                    'address' => array(
                        'SourceExpr' => 'address'
                    ),
                    'active' => array(
                        'SourceExpr' => 'active',
                    ),
                    'order' => array(
                        'SourceExpr' => 'order',
                    ),
                    'description' => array(
                        'SourceExpr' => 'description',
                    )
                )
            ),
            'Tab1' => array(
                'Type' => 'Group',
                'Name' => array('vi-VN' => 'Vị trí', 'en-US' => 'Location'),
                'Fields' => array(
                    'address_province_id' => array(

                    ),
                    'address_district_id' => array(

                    ),
                    'address_ward_id' => array(

                    ),
                )
            )
        );
    }

    public static function getPage()
    {
        return 'contact';
    }
}