<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 08/02/2015
 * Time: 11:32 PM
 */
Qdmvc::loadLayout('layout_cardnavigate');

class Qdmvc_View_WpMenu extends Qdmvc_Layout_CardNavigate
{
    protected function serverFunctions()
    {
        $obj = parent::serverFunctions();
        $obj = array_merge($obj, array(
            'btn_syncfromwp' => array(
                'fn_name' => 'fn_syncfromwp',
                'label' => array(
                    'vi-VN' => 'Sync from WP',
                    'en-US' => 'Sync from WP'
                )
            ),
            'btn_openwpmenueditor' => array(
                //'fn_name' => 'btn_openwpmenueditor',
                'label' => array(
                    'vi-VN' => 'Mở WP Menu Editor',
                    'en-US' => 'Open WP Menu Editor'
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

                    //button
                    var menu_format = '<?=admin_url( 'nav-menus.php?action=edit&menu=');?>';
                    $('#btn_openwpmenueditor').click(function () {

                        var tmp = menu_format + MYAPP.viewModel.wpid();
                        //MYAPP.requestLookupWindow(tmp);
                        MYAPP.openInNewTab(tmp);
                    });
                });
            })(jQuery);
        </script>
        <?php
        parent::onReadyHook();
    }
}