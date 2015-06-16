<?php
Qdmvc::loadDataPort('product_port');
class Qdmvc_DataPort_ProductDF extends Qdmvc_DataPort_Product
{
    protected static $model = 'QdProductDF';
}