<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 08/02/2015
 * Time: 11:32 PM
 */
Qdmvc::loadLayout('layout_cardnavigate');

class Qdmvc_View_DgInStock extends Qdmvc_Layout_CardNavigate
{
    protected function serverFunctions()
    {
        $obj = parent::serverFunctions();
        $obj = array_merge($obj, array(
            'btn_makerequest' => array(
                'fn_name' => 'fn_makerequest',
                'label' => array(
                    'vi-VN' => 'Thẩm định lại',
                    'en-US' => 'Make Request'
                )
            ),
            'btn_search' => array(
                //'fn_name' => 'fn_search',
                'label' => array(
                    'vi-VN' => 'Tìm kiếm theo Tags',
                    'en-US' => 'Search by Tags'
                )
            ),
        ));
        return $obj;
    }


    protected function onReadyHook()
    {
        parent::onReadyHook();//must place at the end or knockout not binding to appended html
        ?>

        <!-- Modal -->
        <div id="btn_search_dialog" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Search</h4>
                    </div>
                    <div class="modal-body">
                        <form onsubmit="return false">
                            <div class="form-group">
                                <label for="btn_search_keyword">Keyword: </label>
                                <input type="text" class="form-control" id="btn_search_keyword">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary" id="btn_search_send">Submit</button>
                    </div>
                </div>

            </div>
        </div>

        <script type="text/javascript">
            (function ($) {
                $(document).ready(function () {
                    $('#btn_search').click(function () {
                        $('#btn_search_dialog').modal('show');
                        $('#btn_search_keyword').val(MYAPP.viewModel.keyword());
                    });
                    $('#btn_search_send').click(function () {
                        var keyword = $('#btn_search_keyword').val();
                        MYAPP.callFn('fn_search', {keyword: keyword}, function (data) {
                            if (data.fn_result != false) {
                                alert(data.fn_result.rec_id);
                                //close form
                                $('#btn_composeemail_dialog').modal('hide');
                            } else {
                                alert('Keyword does not match any record');
                            }
                        });
                    });

                });
            })(jQuery);
        </script>
    <?php

    }
}