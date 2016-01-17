<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 08/02/2015
 * Time: 11:32 PM
 */
Qdmvc::loadLayout('layout_cardnavigate');

class Qdmvc_View_Note extends Qdmvc_Layout_CardNavigate
{
    protected function serverFunctions()
    {
        $obj = parent::serverFunctions();
        $obj = array_merge($obj, array(
            'btn_import' => array(
                //'fn_name' => 'fn_import',
                'label' => array(
                    'vi-VN' => 'Import from Excel',
                    'en-US' => 'Import from Excel'
                )
            ),

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
                    //register button
                    $("#btn_import").bind("click", function (event) {
                        //Show Page Card
                        MYAPP.requestLookupWindow('<?= get_site_url(null, 'wp-admin/admin.php?page=importdata&qdrole=navigate') ?>');
                    });
                });
            })(jQuery);
        </script>
    <?php
    }
}