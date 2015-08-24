<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 08/02/2015
 * Time: 11:32 PM
 */
Qdmvc::loadLayout('layout_cardnavigate');

class Qdmvc_View_Menu extends Qdmvc_Layout_CardNavigate
{
    protected function serverFunctions()
    {
        $obj = parent::serverFunctions();
        $obj = array_merge($obj, array(
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
                    var menu_format = '<?=admin_url( 'nav-menus.php?action=edit&menu=');?>';
                    $('#btn_openwpmenueditor').click(function () {
                        var tmp = menu_format + MYAPP.viewModel.position_1();
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