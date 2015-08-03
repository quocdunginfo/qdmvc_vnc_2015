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
                    'vi-VN' => 'Kích hoạt',
                    'en-US' => 'Active'
                )
            ),
            'btn_validate_all_struct_level' => array(
                'fn_name' => 'fn_validate_all_struct_level',
                'label' => array(
                    'vi-VN' => 'Validate lại Struct Level',
                    'en-US' => 'Validate all Struct Level'
                )
            ),

        ));
        return $obj;
    }


    protected function onReadyHook()
    {
        ?>
        <script type="text/javascript">
            (function ($) {
                $(document).ready(function () {
                    $('#btn_active').click(function () {
                        MYAPP.callFn('fn_active', null, function (data) {
                            if (data.fn_result != false) {
                                alert(data.fn_result.subinfo);
                            }
                        });
                    });

                    $('#qdsysbtns').append(
                        '<button class="btn btn-info btn-xs qd-action-btn" type="button" id="qdseometa" style="display: inline-block">' +
                        '<span data-bind="text: MYAPP.getURIParam($root.__sys_seometa_url(),\'item_count\')"></span>' +
                        ' <?= $this->page->getFieldCaption("__sys_seometa_url", $this->data["language"]) ?>' +
                        '</button>'
                    );
                    $("#qdseometa").bind("click", function (event) {
                        MYAPP.requestLookupWindow(MYAPP.getObj()['__sys_seometa_url']);
                    });
                });
            })(jQuery);
        </script>
    <?php
        parent::onReadyHook();//must place at the end or knockout not binding to appended html
    }

    private function genSEOMetaButton()
    {
        ?>

    <?php
    }

}