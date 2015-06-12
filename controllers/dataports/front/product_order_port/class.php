<?php
Qdmvc::loadDataPort('product_order_port');
class Qdmvc_DataPort_FrontProductOrder extends Qdmvc_DataPort_ProductOrder
{
    protected static function allowSubmitFields()
    {
        return array('sex','product_id', 'customer_name','customer_phone', 'customer_email', 'customer_address', 'mota', 'count');
    }

    protected static function canView()
    {
        return false;
    }

    protected static function canDelete()
    {
        return false;
    }

    protected static function canEdit()
    {
        return false;
    }

    protected function checkSecurity()
    {
        return true;
    }

    protected function insert()
    {
        if(parent::insert())
        {
            //send email
            if (method_exists($this->obj, 'fn_send_email'))
            {
                $this->obj->fn_send_email();
            }
        }
    }

}
