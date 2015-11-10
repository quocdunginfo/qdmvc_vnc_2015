<?php
Qdmvc::loadDataPort('product_pg2_thietbi_port');

class Qdmvc_DataPort_ProductPTST extends Qdmvc_DataPort_Product_PG2_THIETBI
{
    protected static $model = 'QdProductPTST';
}