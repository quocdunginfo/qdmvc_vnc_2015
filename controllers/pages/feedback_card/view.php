<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 08/02/2015
 * Time: 11:32 PM
 */
//import libraries
Qdmvc::loadLayout('layout_cardnavigate');

class Qdmvc_View_Feedback_Card extends Qdmvc_Layout_CardNavigate
{
    protected function serverFunctions()
    {
        $obj = parent::serverFunctions();
        $obj = array_merge($obj, array(
            'btn_composeemail' => array(
                //'fn_name' => 'fn_active',
                'label' => array(
                    'vi-VN' => 'Gửi Mail',
                    'en-US' => 'Compose Mail'
                )
            )
        ));
        return $obj;
    }

    protected function onReadyHook()
    {
        parent::onReadyHook();
        ?>
        <!-- Modal -->
        <div id="btn_composeemail_dialog" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Email compose</h4>
                    </div>
                    <div class="modal-body">
                        <form onsubmit="return false">
                            <div class="form-group">
                                <label for="btn_composeemail_email">Email address</label>
                                <input type="email" class="form-control" id="btn_composeemail_email">
                            </div>
                            <div class="form-group">
                                <label for="btn_composeemail_subject">Subject</label>
                                <input type="text" class="form-control" id="btn_composeemail_subject">
                            </div>
                            <div class="form-group">
                                <label for="btn_composeemail_content">Content</label>
                                <input type="text" class="form-control" id="btn_composeemail_content">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary" id="btn_composeemail_send">Send</button>
                    </div>
                </div>

            </div>
        </div>

        <script type="text/javascript">
            (function ($) {
                $(document).ready(function () {
                    $('#btn_composeemail').click(function () {
                        $('#btn_composeemail_dialog').modal('show');
                        $('#btn_composeemail_email').val(MYAPP.viewModel.customer_email());
                    });
                    $('#btn_composeemail_send').click(function () {
                        var subject = $('#btn_composeemail_subject').val();
                        var content = $('#btn_composeemail_content').val();
                        MYAPP.callFn('fn_sendemail', {subject: subject, content: content}, function (data) {
                            if (data.fn_result != false) {
                                alert(data.fn_result.info);
                                //close form
                                $('#btn_composeemail_dialog').modal('hide');
                            } else {
                                alert('Send email Fail!');
                            }
                        });
                    });

                });
            })(jQuery);
        </script>
    <?php
    }
}