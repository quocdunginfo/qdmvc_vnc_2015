<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:36 PM
 */
Qdmvc::loadPage('root');
class Qdmvc_Page_TRootSetup extends Qdmvc_Page_Root {
    public function run()
    {
        //prepare data
        if(QdTRootSetup::GET()==null)
        {
            $obj = new QdTRootSetup();
            $obj->save();
            $this->data['obj'] = $obj;
        }
        else
        {
            $this->data['obj'] = QdTRootSetup::GET();
        }

        //load View and render
        parent::run();
    }

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
                        'DataType' => static::getDataType('topleft_tuvan')
                    ),
                    'topcenter_promotion' => array(
                        'SourceExpr' => 'topcenter_promotion',
                        'DataType' => static::getDataType('topcenter_promotion')
                    ),
                    'topright_navs' => array(
                        'SourceExpr' => 'topright_navs',
                        'DataType' => static::getDataType('topright_navs')
                    ),
                    'bottomleft_footer_note' => array(
                        'SourceExpr' => 'bottomleft_footer_note',
                        'DataType' => static::getDataType('bottomleft_footer_note')
                    ),
                    'widgetnavcat_id' => array(
                        'SourceExpr' => 'widgetnavcat_id',
                        'DataType' => static::getDataType('widgetnavcat_id'),
                        'LookupURL' => static::getLookupURL('widgetnavcat_id')
                    ),
                    'vnc_logo' => array(
                        'SourceExpr' => 'vnc_logo',
                        'DataType' => static::getDataType('vnc_logo'),
                    ),
                    'social_icon' => array(
                        'SourceExpr' => 'social_icon',
                        'DataType' => static::getDataType('social_icon'),
                        'LookupURL' => static::getLookupURL('social_icon')
                    ),
                    'img_slider' => array(
                        'SourceExpr' => 'img_slider',
                        'DataType' => static::getDataType('img_slider'),
                        'LookupURL' => static::getLookupURL('img_slider')
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