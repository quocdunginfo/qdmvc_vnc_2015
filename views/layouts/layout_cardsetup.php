<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 09/03/2015
 * Time: 7:08 PM
 */
Qdmvc::loadLayout('layout_card');
class Qdmvc_Layout_CardSetup extends Qdmvc_Layout_Card
{
    protected function onReadyHook()
    {
        parent::onReadyHook();
        ?>
        <script>
            (function($){
                $(document).ready(function(){
                    //MYAPP.setObj(<?=$this->obj_json?>);//may not compatible with cache
                    MYAPP.ajax_loader = new ajaxLoader("#cardForm");
                    $.get(MYAPP.data_port)
                        .done(function (data) {
                            console.log(data);
                            MYAPP.setObj(data.rows[0]);
                        })
                        .fail(function (data) {
                            console.log(data);
                        })
                        .always(function () {
                            MYAPP.ajax_loader.remove();
                        });
                    $("#qdnew").hide();
                    $("#qdclone").hide();
                    $("#qddelete").hide();
                    //$("#qdnote").hide();
                    //$("#qdimage").hide();
                });
            })(jQuery);
        </script>
        <?php
    }
}