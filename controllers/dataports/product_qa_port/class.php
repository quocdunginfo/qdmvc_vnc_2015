<?php
Qdmvc::loadDataPort('product_port');
class Qdmvc_DataPort_ProductQA extends Qdmvc_DataPort_Product
{
    protected static $model = 'QdProductQA';
}