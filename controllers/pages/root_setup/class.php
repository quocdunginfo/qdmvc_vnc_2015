<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 05/03/2015
 * Time: 11:36 PM
 */
Qdmvc::loadPage('root');
class Qdmvc_Page_RootSetup extends Qdmvc_Page_Root {
    public function run()
    {
        $c = static::getModel();
        //prepare data
        if ($c::GET() == null) {
            $obj = new $c();
            $obj->save();
            $this->data['obj'] = $obj;
        } else {
            $this->data['obj'] = $c::GET();
        }

        $tmp = $c::toJSON(array($this->data['obj']));
        $this->data['obj_json'] = $tmp[0];

        //load View and render
        parent::run();
    }
}