<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 08/02/2015
 * Time: 11:32 PM
 */
//Qdmvc_Helper::qd_media_choose('cavatar', 'avatar', false);

Qdmvc::loadLayout('layout_list');

class Qdmvc_View_PBHanh_List extends Qdmvc_Layout_List
{
    protected function onReadyHook()
    {
        parent::onReadyHook(); // TODO: Change the autogenerated stub
        ?>
        <script>
            (function($){
                $(document).ready(function(){
                    $('#qdprint').hide();
                    $('#qdexport').hide();
                    $('#qdshowall').hide();
                });
            })(jQuery);
        </script>
        <?php
    }

}