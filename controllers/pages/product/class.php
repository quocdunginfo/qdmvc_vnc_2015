<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:30 PM
 */
Qdmvc::loadPage('root');
class Qdmvc_Page_Product_Card extends Qdmvc_Page_Root
{
    protected static $fields_show = null;

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
                            'DataType' => static::getDataType('type')
                        ),
                        'name' => array(
                            'SourceExpr' => 'name',
                            'DataType' => static::getDataType('name')
                        ),
                        'avatar' => array(
                            'SourceExpr' => 'avatar',
                            'DataType' => static::getDataType('avatar')
                        ),
                        'product_cat_id' => array(
                            'SourceExpr' => 'product_cat_id',
                            'LookupURL' => static::getLookupURL('product_cat_id')
                        ),
                        '_product_cat_name' => array(
                            'SourceExpr' => '_product_cat_name',
                            'ReadOnly' => static::isReadOnly('_product_cat_name')
                        ),
                        'manufacturer_id' => array(
                            'SourceExpr' => 'manufacturer_id',
                            'LookupURL' => static::getLookupURL('manufacturer_id')
                        ),
                        'size_id' => array(
	                        'SourceExpr' => 'size_id',
	                        'LookupURL' => static::getLookupURL('size_id')
                        ),
                        '_manufacturer_name' => array(
                            'SourceExpr' => '_manufacturer_name',
                            'ReadOnly' => static::isReadOnly('_manufacturer_name')
                        ),
                        'code' => array(
                            'SourceExpr' => 'code'
                        ),
                        'price' => array(
                            'SourceExpr' => 'price'
                        ),
                        'discount_percent' => array(
                            'SourceExpr' => 'discount_percent',
                            'DataType' => static::getDataType('discount_percent'),
                        ),
                        '_price_discount' => array(
                            'SourceExpr' => '_price_discount',
                            'DataType' => static::getDataType('_price_discount'),
                            'ReadOnly' => true
                        ),
                        'active' => array(
                            'SourceExpr' => 'active',
                            'DataType' => static::getDataType('active')
                        ),
                        'temp_out_of_stock' => array(
                            'SourceExpr' => 'temp_out_of_stock',
                            'DataType' => static::getDataType('temp_out_of_stock')
                        ),
                        'description' => array(
                            'SourceExpr' => 'description',
                            'DataType' => static::getDataType('description')
                        ),
                        'doitra_baohanh' => array(
                            'SourceExpr' => 'doitra_baohanh',
                            'DataType' => static::getDataType('doitra_baohanh')
                        ),
                        'giaohang_thanhtoan' => array(
                            'SourceExpr' => 'giaohang_thanhtoan',
                            'DataType' => static::getDataType('giaohang_thanhtoan')
                        ),
                        'date_modified' => array(
                            'SourceExpr' => 'date_modified',
                            'DataType' => static::getDataType('date_modified')
                        ),
                    )
                )
            );
    }

    protected static function getViewClass()
    {
        return 'Qdmvc_View_Product_Card';
    }


    public static function getPage()
    {
        return 'product';
    }
}