<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 08/02/2015
 * Time: 11:32 PM
 */
Qdmvc::loadLayout('layout_cardnavigate');

class Qdmvc_Layout_Report_Navigation extends Qdmvc_Layout_CardNavigate
{
    protected function onReadyHook()
    {
        parent::onReadyHook();
        ?>
        <script>
            (function ($) {
                $(document).ready(function () {
                    $('#qdviewreport').show();
                    $("#qdviewreport").bind("click", function (event) {
                            /*Call server fn_get_reporturl*/
                            MYAPP.callFn('fn_get_reporturl', {}, function (data) {
                                MYAPP.openInNewTab(data.fn_result.reporturl);
                            }, undefined, undefined, true);
                        }
                    );
                });
            })(jQuery);
        </script>
    <?php
    }

}