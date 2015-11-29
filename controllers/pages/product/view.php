<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 08/02/2015
 * Time: 11:32 PM
 */
//import libraries
Qdmvc::loadLayout('layout_cardnavigate');

class Qdmvc_View_Product_Card extends Qdmvc_Layout_CardNavigate
{
    protected function serverFunctions()
    {
        $obj = parent::serverFunctions();
        $obj = array_merge($obj, array(
            'btn_active' => array(
                //'fn_name' => 'fn_active',
                'label' => array(
                    'vi-VN' => '[Not set]',
                    'en-US' => '[Not set]'
                )
            ),
            'btn_validate_all_struct_level' => array(
                'fn_name' => 'fn_validate_all_struct_level',
                'label' => array(
                    'vi-VN' => 'Validate lại Struct Level theo LSP',
                    'en-US' => 'Validate all Struct Level by Cat'
                )
            ),
            'btn_view_in_frontend' => array(
                //'fn_name' => 'btn_view_in_frontend',
                'label' => array(
                    'vi-VN' => 'Mở trang chi tiết SP',
                    'en-US' => 'Open Front-End Product Page'
                )
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
                    var btn_active_label = '<?=Qdmvc_Message::getMsg('btn_active')?>';
                    var btn_deactive_label = '<?=Qdmvc_Message::getMsg('btn_deactive')?>';
                    //Change Button label
                    $('#cardForm input[name=active]').on('change', function(){
                        var label = this.checked?btn_deactive_label:btn_active_label;
                        $('#btn_active').html(label);
                    });
                    //
                    $('#btn_active').click(function () {
                        MYAPP.callFn('fn_active', null, function (data) {
                            if (data.fn_result != false) {
                                console.log(data.fn_result.subinfo);
                            }
                        });
                    });

                    $('#qdsysbtn').append(
                        '<button class="btn btn-info btn-xs qd-action-btn" type="button" id="qdseometa" style="display: inline-block">' +
                        '<span data-bind="text: MYAPP.getURIParam($root.__sys_seometa_url(),\'item_count\')"></span>' +
                        ' <?= $this->page->getFieldCaption("__sys_seometa_url", $this->data["language"]) ?>' +
                        '</button>'
                    );
                    $("#qdseometa").bind("click", function (event) {
                        MYAPP.requestLookupWindow(MYAPP.getObj()['__sys_seometa_url']);
                    });
                    $('#btn_view_in_frontend').click(function () {
                        MYAPP.openInNewTab(MYAPP.viewModel._permalink());
                    });
                    $('#btn_view_qrcode').click(function () {
                        var qrlink = MYAPP.getQRCodeLink(MYAPP.viewModel.id());
                        MYAPP.openInNewTab(qrlink);
                    });
                    $('#lookup_cs_manufacturer_id').click(function () {
                        var lurl = $(this).data('lookupurl');
                        var struct_lv_2 = MYAPP.viewModel.struct_lv_2();
                        if (struct_lv_2 != '') {
                            lurl = MYAPP.addDataPortFilter(lurl, 199, 'struct_lv_2', struct_lv_2);
                        }
                        MYAPP.requestLookupWindow(lurl);
                    });

                    $('#lookup_cs_product_cat_id').click(function () {
                        var lurl = $(this).data('lookupurl');
                        MYAPP.requestLookupWindow(lurl, function(obj){
                            //set struct value
                            MYAPP.viewModel.struct_lv_1(obj[0].struct_lv_1);
                            MYAPP.viewModel.struct_lv_2(obj[0].struct_lv_2);
                            MYAPP.viewModel.struct_lv_3(obj[0].struct_lv_3);
                            MYAPP.viewModel.struct_lv_4(obj[0].struct_lv_4);
                        });
                    });

                    if($('#lookup_cs_size_id').length > 0){
                        $('#lookup_cs_size_id').click(function () {
                            var lurl = $(this).data('lookupurl');
                            var struct_lv_4 = MYAPP.viewModel.struct_lv_4();
                            if (struct_lv_4 != '') {
                                lurl = MYAPP.addDataPortFilter(lurl, 199, 'type', struct_lv_4);
                            }
                            MYAPP.requestLookupWindow(lurl);
                        });
                    }
                });
            })(jQuery);
        </script>
    <?php

    }
}