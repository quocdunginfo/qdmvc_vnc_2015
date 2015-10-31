<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 08/02/2015
 * Time: 11:32 PM
 */
Qdmvc::loadLayout('layout_cardnavigate');

class Qdmvc_View_PBHanh extends Qdmvc_Layout_CardNavigate
{
    protected function serverFunctions()
    {
        $obj = parent::serverFunctions();
        $obj = array_merge($obj, array(
            'btn_reopen' => array(
                'label' => array(
                    'vi-VN' => 'Mở lại',
                    'en-US' => 'Reopen'
                ),
                'fn_name' => 'fn_reopen',
            ),
            'btn_print_doc_preview' => array(
                'label' => array(
                    'vi-VN' => 'Xem trước khi in',
                    'en-US' => 'Print Preview'
                )
            ),
            'btn_print_doc' => array(
                //'fn_name' => 'fn_print_doc',
                'label' => array(
                    'vi-VN' => 'In phiếu',
                    'en-US' => 'Print'
                )
            ),
            'btn_ship' => array(
                'fn_name' => 'fn_ship',
                'label' => array(
                    'vi-VN' => 'Giao phiếu',
                    'en-US' => 'Ship Doc'
                ),
                'confirm' => true
            ),
            'btn_view_qrcode' => array(
                //'fn_name' => 'btn_view_in_frontend',
                'label' => array(
                    'vi-VN' => 'Tạo mã QR',
                    'en-US' => 'Gen QR Code'
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
                    $('#btn_print_doc_preview').click(function () {
                        MYAPP.callFn('fn_get_print_doc', null, function (data) {
                            if (data.fn_result != false) {
                                MYAPP.printDocPreview(data.fn_result, 800, 500);
                            }
                        });
                    });

                    $('#btn_print_doc').click(function () {
                        MYAPP.callFn('fn_get_print_doc', null, function (data) {
                            if (data.fn_result != false) {
                                MYAPP.printDoc(data.fn_result, 800, 500);
                            }
                        });
                    });
                    $('#btn_view_qrcode').click(function () {
                        var qrlink = MYAPP.getQRCodeLink(MYAPP.viewModel.id(), 300, 300);
                        MYAPP.openInNewTab(qrlink);
                    });
                });
            })(jQuery);
        </script>
    <?php

    }

}