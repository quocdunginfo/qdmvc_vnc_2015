<?php
Qdmvc::loadDataPort('product_cat_pg2_port');

class Qdmvc_DataPort_ProductCatPK extends Qdmvc_DataPort_ProductCatPG2
{
    protected static $model = 'QdProductCatPK';
}