<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 08/02/2015
 * Time: 11:32 PM
 */
Qdmvc::loadLayout('layout_cardnavigate');

class Qdmvc_View_QdmvcPage extends Qdmvc_Layout_CardNavigate
{
    protected function serverFunctions()
    {
        $obj = parent::serverFunctions();
        $obj = array_merge($obj, array(
            'btn_genfromfolder' => array(
                'fn_name' => 'fn_genfromfolder',
                'label' => array(
                    'vi-VN' => 'Sync from folder',
                    'en-US' => 'Sync from folder'
                )
            )
        ));
        return $obj;
    }

    protected function onReadyHook()
    {
        ?>
        <script>
            (function ($) {
                $(document).ready(function () {
                    $("#qdnew").hide();
                    $("#qdclone").hide();
                    $("#qddelete").hide();
                    //$("#qdnote").hide();
                    //$("#qdimage").hide();
                    $("#qdupdate").hide();
                    //$("#qdlog").hide();
                });
            })(jQuery);
        </script>
        <?php
        parent::onReadyHook();
    }
}