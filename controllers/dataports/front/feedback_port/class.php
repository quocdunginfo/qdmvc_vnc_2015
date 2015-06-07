<?php
Qdmvc::loadDataPort('feedback_port');

class Qdmvc_DataPort_FrontFeedback extends Qdmvc_DataPort_Feedback
{
    protected static function allowSubmitFields()
    {
        return array('customer_name', 'customer_email', 'content', 'customer_phone', 'title');
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

}