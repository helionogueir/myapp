<?php

namespace source\module\home\controller;

use source\core\controller\PublicRequest;

/**
 * - Home controller action
 * @author Helio Nogueira <helio.nogueir@gmail.com>
 * @version v1.0.0
 */
class Home extends PublicRequest {

    public function page() {
        $this->output("module/home/view/home/index.tpl");
    }

}
