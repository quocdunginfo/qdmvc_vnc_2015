<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 08/02/2015
 * Time: 11:32 PM
 */
Qdmvc::loadLayout('layout_report_navigate');

class Qdmvc_View_Report_DgInStock extends Qdmvc_Layout_Report_Navigation
{
    protected function serverFunctions()
    {
        $obj = parent::serverFunctions();
        $obj = array_merge($obj, array(

        ));
        return $obj;
    }


    protected function onReadyHook()
    {
        parent::onReadyHook();//must place at the end or knockout not binding to appended html
        ?>
        <script type="text/javascript">
            (function ($) {
                $(document).ready(function () {


                });
            })(jQuery);
        </script>
    <?php

    }
}