<?php
Qdmvc::loadDataPort('product_pg2_dcn_port');

class Qdmvc_DataPort_ProductLT extends Qdmvc_DataPort_Product_PG2_DCN
{
    protected static $model = 'QdProductLT';
}