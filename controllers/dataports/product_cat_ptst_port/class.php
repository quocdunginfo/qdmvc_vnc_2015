<?php
Qdmvc::loadDataPort('product_cat_pg2_thietbi_port');

class Qdmvc_DataPort_ProductCatPTST extends Qdmvc_DataPort_ProductCatPG2THIETBI
{
    protected static $model = 'QdProductCatPTST';
}