<?php
Qdmvc::loadDataPort('product_cat_port');
class Qdmvc_DataPort_ProductCatDF extends Qdmvc_DataPort_ProductCat {
    protected static $model = 'QdProductCatDF';
}