<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 08/02/2015
 * Time: 11:32 PM
 */
Qdmvc::loadLayout('layout_cardnavigate');
class Qdmvc_View_Log extends Qdmvc_Layout_CardNavigate {
    protected function onReadyHook()
    {
        ?>
        <script>
            (function($){
                $(document).ready(function(){
                    $("#qdnew").hide();
                    $("#qdclone").hide();
                    $("#qddelete").hide();
                    //$("#qdnote").hide();
                    //$("#qdimage").hide();
                    $("#qdupdate").hide();
                    $("#qdlog").hide();
                });
            })(jQuery);
        </script>
        <?php
        parent::onReadyHook();
    }
}