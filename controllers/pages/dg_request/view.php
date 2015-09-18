<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 08/02/2015
 * Time: 11:32 PM
 */
Qdmvc::loadLayout('layout_cardnavigate');

class Qdmvc_View_DgRequest extends Qdmvc_Layout_CardNavigate
{
    protected function serverFunctions()
    {
        $obj = parent::serverFunctions();
        $obj = array_merge($obj, array(
            'btn_reopen' => array(
                'fn_name' => 'fn_reopen',
                'label' => array(
                    'vi-VN' => 'Mở lại',
                    'en-US' => 'Reopen'
                )
            ),
            'btn_release' => array(
                'fn_name' => 'fn_release',
                'label' => array(
                    'vi-VN' => 'Xác nhận',
                    'en-US' => 'Release'
                )
            ),
            'btn_close' => array(
                'fn_name' => 'fn_close',
                'label' => array(
                    'vi-VN' => 'Đóng',
                    'en-US' => 'Close'
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
                    $("#cardForm [name='status']").on('change', function () {
                        if ($(this).val().toLowerCase() != 'open') {
                            $("#cardForm [name='suggest_price']").attr('disabled', 'disabled');
                            $("#cardForm [name='keyword']").attr('disabled', 'disabled');
                            $("#cardForm [name='cat_id']").attr('disabled', 'disabled');
                            if($(this).val().toLowerCase()=='close'){
                                $("#cardForm [name='price']").attr('disabled', 'disabled');
                            }
                            else {
                                $("#cardForm [name='price']").removeAttr('disabled');
                            }
                        }
                        else {
                            $("#cardForm [name='price']").attr('disabled', 'disabled');
                            $("#cardForm [name='suggest_price']").removeAttr('disabled');
                            $("#cardForm [name='keyword']").removeAttr('disabled');
                            $("#cardForm [name='cat_id']").removeAttr('disabled');
                        }
                    });
                });
            })(jQuery);
        </script>
    <?php

    }

}