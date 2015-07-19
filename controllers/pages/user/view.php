<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 08/02/2015
 * Time: 11:32 PM
 */
Qdmvc::loadLayout('layout_cardnavigate');
class Qdmvc_View_User extends Qdmvc_Layout_CardNavigate {
    protected function serverFunctions()
    {
        $obj = parent::serverFunctions();
        $obj = array_merge($obj, array(
            'btn_syncfromwp' => array(
                //'fn_name' => 'fn_active',
                'label' => array(
                    'vi-VN' => 'Đồng bộ từ WP',
                    'en-US' => 'Sync from WP'
                )
            ),
            'btn_openwpusereditor' => array(
                //'fn_name' => 'fn_active',
                'label' => array(
                    'vi-VN' => 'Mở User bằng WP',
                    'en-US' => 'View User in WP'
                )
            ),
        ));
        return $obj;
    }

    protected function onReadyHook()
    {
        parent::onReadyHook();
        ?>
        <script type="text/javascript">
            (function ($) {
                $(document).ready(function () {
                    var user_format = '<?=admin_url( 'user-edit.php?user_id=');?>';

                    $('#btn_openwpusereditor').click(function(){
                        var tmp = user_format + MYAPP.viewModel.id();
                        MYAPP.openInNewTab(tmp);
                    });

                    $('#btn_syncfromwp').click(function(){
                        MYAPP.callFn('fn_syncfromwp', null, function(data){
                            if(data.fn_result != false)
                            {
                                MYAPP.updateGrid();
                            }
                        });
                    });

                    //permission
                    $("#qdnew").hide();
                    $("#qdclone").hide();
                    $("#qddelete").hide();
                    //$("#qdnote").hide();
                    //$("#qdimage").hide();
                    $("#qdupdate").hide();
                    //$("#qdlog").hide();
                });
            })(jQuery);
        </script>
    <?php
    }
}