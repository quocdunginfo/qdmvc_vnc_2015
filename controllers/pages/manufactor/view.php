<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 08/02/2015
 * Time: 11:32 PM
 */
Qdmvc::loadLayout('layout_cardnavigate');
class Qdmvc_View_Manufactor extends Qdmvc_Layout_CardNavigate {
    protected function serverFunctions()
    {
        $obj = parent::serverFunctions();
        $obj = array_merge($obj, array(
            'btn_view_in_frontend' => array(
                //'fn_name' => 'btn_view_in_frontend',
                'label' => array(
                    'vi-VN' => 'Mở trang Hãng SX',
                    'en-US' => 'Open Front-End Manufactor Page'
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