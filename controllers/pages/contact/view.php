<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 08/02/2015
 * Time: 11:32 PM
 */
//import libraries
Qdmvc::loadLayout('layout_cardnavigate');
class Qdmvc_View_Contact_Card extends Qdmvc_Layout_CardNavigate {
    protected function onReadyHook()
    {
        parent::onReadyHook(); // TODO: Change the autogenerated stub

        ?>
        <script type="text/javascript">
            (function ($) {
                $(document).ready(function () {
                    $('#lookup_cs_address_district_id').click(function(){
                        var lurl = $(this).data('lookupurl');
                        var province_id = $('#ctl_address_province_id').val();
                        if(province_id!='')
                        {
                            lurl = MYAPP.addDataPortFilter(lurl, 199, 'provinceid', province_id);// '&filterdatafield199=provinceid&filtervalue199='+province_id+'&filtercondition199=EQUAL';
                        }
                        MYAPP.requestLookupWindow(lurl);
                    });

                    $('#lookup_cs_address_ward_id').click(function(){
                        var lurl = $(this).data('lookupurl');
                        var district_id = $('#ctl_address_district_id').val();
                        if(district_id!='')
                        {
                            lurl += '&filterdatafield199=districtid&filtervalue199='+district_id;
                        }
                        MYAPP.requestLookupWindow(lurl);
                    });
                });
            })(jQuery);
        </script>
        <?php
    }

}