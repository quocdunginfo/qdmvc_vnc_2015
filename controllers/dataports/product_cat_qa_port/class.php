<?php
Qdmvc::loadDataPort('product_cat_port');
class Qdmvc_DataPort_ProductCatQA extends Qdmvc_DataPort_ProductCat {
    protected static $model = 'QdProductCatQA';
}