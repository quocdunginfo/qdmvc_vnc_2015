<?php
Qdmvc::loadDataPort('manufactor_port');
class Qdmvc_DataPort_ManufactorQA extends Qdmvc_DataPort_Manufactor {
    protected static $model = 'QdManufactorQA';
}