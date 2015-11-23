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
            'btn_view_fe_searchpage_lv1' => array(
                //'fn_name' => 'btn_view_in_frontend',
                'label' => array(
                    'vi-VN' => 'Mở trang SP Struct Lv1',
                    'en-US' => 'Open Front-End Lv1 Page'
                )
            ),
            'btn_view_fe_searchpage_lv2' => array(
                //'fn_name' => 'btn_view_in_frontend',
                'label' => array(
                    'vi-VN' => 'Mở trang SP Struct Lv2',
                    'en-US' => 'Open Front-End Lv2 Page'
                )
            ),
            'btn_view_in_frontend' => array(
                //'fn_name' => 'btn_view_in_frontend',
                'label' => array(
                    'vi-VN' => 'Mở trang SP Struct Lv3',
                    'en-US' => 'Open Front-End Lv3 Page'
                )
            ),
            'btn_genstructure' => array(
                'fn_name' => 'fn_genstructure',
                'label' => array(
                    'vi-VN' => 'Tạo lại cấu trúc LSP',
                    'en-US' => 'Re-gen Structure'
                ),
                'confirm' => true
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
                    $('#btn_view_fe_searchpage_lv1').click(function () {
                        MYAPP.openInNewTab(MYAPP.viewModel._permalink_search_page_struct_lv1());
                    });
                    $('#btn_view_fe_searchpage_lv2').click(function () {
                        MYAPP.openInNewTab(MYAPP.viewModel._permalink_search_page_struct_lv2());
                    });
                    //register button
                    $("#qdmanufactors").bind("click", function (event) {
                        MYAPP.requestLookupWindow(MYAPP.getObj()['__sys_link_manufactors_url']);
                    });
                });
            })(jQuery);
        </script>
    <?php
    }

    protected function getToolbar()
    {
        $obj = parent::getToolbar();
        $obj['qdpagebtn']['Childs']['qdmanufactors'] = array(
            'Order' => 100,
            'Label' => array(
                array(
                    'Type' => 'Binding',
                    'Formula' => 'text: MYAPP.getURIParam($root.__sys_link_manufactors_url(),\'item_count\')'
                ),
                array(
                    'Type' => 'Text',
                    'Formula' => $this->page->getFieldCaption('__sys_link_manufactors_url', $this->data['language'])
                )
            ),
        );
        return $obj;
    }

}