<?php

/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 08/02/2015
 * Time: 11:32 PM
 */
Qdmvc::loadLayout('layout_cardnavigate');
class Qdmvc_View_ProductCat_Card extends Qdmvc_Layout_CardNavigate
{
    protected function serverFunctions()
    {
        $obj = parent::serverFunctions();
        $obj = array_merge($obj, array(
            'btn_validate_all_level' => array(
                'fn_name' => 'fn_validate_all_level',
                'label' => array(
                    'vi-VN' => 'Validate lại Level',
                    'en-US' => 'Validate all Level'
                )
            ),
            'btn_view_in_frontend' => array(
                //'fn_name' => 'btn_view_in_frontend',
                'label' => array(
                    'vi-VN' => 'Mở trang Tìm kiếm LSP',
                    'en-US' => 'Open Front-End Search Page'
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
                    $('#btn_view_in_frontend').click(function () {
                        MYAPP.openInNewTab(MYAPP.viewModel._permalink());
                    });
                });
            })(jQuery);
        </script>
    <?php

    }
}