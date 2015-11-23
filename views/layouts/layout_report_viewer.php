<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 08/02/2015
 * Time: 11:32 PM
 */
Qdmvc::loadLayout('layout_root');

class Qdmvc_Layout_Report_Viewer extends Qdmvc_Layout_Root
{
    function __construct($page)
    {
        parent::__construct($page);
        $this->data['view_style'] = 'compact';
    }

    protected function onReadyHook()
    {
        parent::onReadyHook();
        ?>
        <script>
            (function ($) {
                $(document).ready(function () {

                });
            })(jQuery);
        </script>
    <?php
    }

    public function render()
    {
        $this->style();
        parent::render();
    }


}