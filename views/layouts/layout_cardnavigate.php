<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 08/02/2015
 * Time: 11:32 PM
 */
Qdmvc::loadLayout('layout_card');

class Qdmvc_Layout_CardNavigate extends Qdmvc_Layout_Card
{
    protected function getPageListURL()
    {
        $c = $this->page;
        return $c->getPageListURL();
    }

    protected function btnDeleteAction()
    {
        //Multi item deletion
        ?>
        <script>
            (function ($) {
                $(document).ready(function () {
                    $("#qddelete").bind("click", function (event) {
                        //get Grid
                        var gridf = MYAPP.getGridFrame();
                        var grid = gridf.MYAPP.getGrid();
                        var msg_confirm = '<?=Qdmvc_Message::getMsg('msg_confirm_deletion')?>';

                        if (gridf.MYAPP.isMultiSelection()) {
                            var list_ids = gridf.MYAPP.getSelectedRowsId();
                            if (!confirm(msg_confirm + " "+list_ids+" ?")) {
                                return false;
                            }
                            //AJAX loader
                            MYAPP.ajax_loader = new ajaxLoader("#cardForm");

                            if(list_ids.length > 0){
                                $.post(MYAPP.data_port, {submit: "submit", action: "delete_multi", data: {id: list_ids}})
                                    .done(function (data) {


                                        //....
                                        MYAPP.showMsg(data.msg);

                                        <?=$this->OnDeleteOK()?>
                                    })
                                    .fail(function (data) {
                                        console.log("FAIL:" + data);
                                    })
                                    .always(function () {
                                        //release lock
                                        MYAPP.ajax_loader.remove();
                                    });
                            }
                        } else {
                            var id_ = MYAPP.viewModel.id();
                            if (!confirm(msg_confirm + " "+id_+"?")) {
                                return false;
                            }
                            //AJAX loader
                            MYAPP.ajax_loader = new ajaxLoader("#cardForm");

                            $.post(MYAPP.data_port, {submit: "submit", action: "delete", data: {id: id_}})
                                .done(function (data) {
                                    //data JSON
                                    //var obj = data;//"ok";//jQuery.parseJSON( data );//may throw error if data aldreay JSON format

                                    //....
                                    MYAPP.showMsg(data.msg);

                                    <?=$this->OnDeleteOK()?>
                                })
                                .fail(function (data) {
                                    console.log("FAIL:" + data);
                                })
                                .always(function () {
                                    //release lock
                                    MYAPP.ajax_loader.remove();
                                });
                        }
                    });
                })
            })(jQuery);

        </script>
    <?php
    }

    protected function internalGateway()
    {
        ?>
        <script>
            //update grid
            MYAPP.updateGrid = function (keepIndex) {
                try {
                    document.getElementById('list').contentWindow.MYAPP.updateGrid(keepIndex);
                } catch (error) {
                    console.log(error);
                }
            };
            MYAPP.getGridFrame = function () {
                return document.getElementById('list').contentWindow;
            };
        </script>
        <?php
        parent::internalGateway();
    }

    protected function externalGateway()
    {
        ?>
        <script>
            //gate way to comunicate with parent windows
            MYAPP.doubleClickObj = function (obj) {//do not change func name
                (function ($) {
                    $('#jqxNavigationBar').jqxNavigationBar('expandAt', 0);
                    //set obj too
                    MYAPP.setObj(obj);
                })(jQuery);
            }
        </script>
        <?php
        parent::externalGateway();
    }

    protected function preConfig()
    {
        parent::preConfig();
        ?>
        <?= $this->bindingField() ?>

    <?php
    }


    protected function onReadyHook()
    {
        ?>
        <script type="text/javascript">
            (function ($) {
                $(document).ready(function () {

                });
            })(jQuery);
        </script>
        <?php
        parent::onReadyHook();
    }

    protected function onSaveOK()
    {
        ?>
        if(!MYAPP.formValidationError())
        {
        MYAPP.updateGrid(true);
        }

        <?php
        parent::onSaveOK();
    }

    protected function onDeleteOK()
    {
        ?>
        if(!MYAPP.formValidationError())
        {
        MYAPP.updateGrid(false);
        }
        <?php
        parent::onDeleteOK();
    }

    protected function onCallFnOK()
    {
        ?>
        if(!MYAPP.formValidationError())
        {
        MYAPP.updateGrid(true);
        }

        <?php
        parent::onCallFnOK();
    }


    protected function bindingField()
    {

    }


    protected function Bars()
    {
        parent::Bars();
        ?>
        <div>
            <div style='margin-top: 2px;'>
                <div style='margin-left: 4px; float: left;'>
                    Navigator
                </div>
            </div>
        </div>
        <div>
            <div style="height: 450px; width: 100%">
                <!-- Content Place Holder 2 -->
                <iframe id="list" src="<?= $this->getPageListURL() ?>"
                        width="100%" height="99%" scrolling="no" frameborder="0">
                    <p>Your browser does not support iframes</p>
                </iframe>
                <!-- ENd Content Place Holder 2 -->
            </div>
        </div>
    <?php
    }
}
