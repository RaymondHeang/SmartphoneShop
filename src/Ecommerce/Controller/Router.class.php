<?php
    namespace Ecommerce\Controller;

    class Router
    {

        public function __construct()
        {
            $this->exec();
        }

        protected function exec()
        {
            $sGetController = 'Front';
            if (array_key_exists('controller', $_GET)) {
                $sGetController = $_GET['controller'];
            }

            $sMethod = 'home';
            if (array_key_exists('method', $_GET)) {
                $sMethod = $_GET['method'];
            }

            require ROOT . 'inc/site.header.inc.php'; //include HTML header
            $sController = __NAMESPACE__."\\".$sGetController."Controller"; //normalize controller's name
            $sFunction = strtolower($sMethod).'Action'; //normalize method's name


            if (class_exists($sController, true)) { //check if the class $sController exists and call default __autoload

                $oController = new $sController();

                if (method_exists($oController, $sFunction)) { //check if the method $sFunction exists within $oController
                    $oController->$sFunction(); //call that method
                } else {
                    $this->errorAction(); //else call errorAction()
                }
            } else {
                $this->errorAction(); //else call errorAction()
            }
            require ROOT . 'inc/site.footer.inc.php'; //include HTML footer
        }

        protected function errorAction() //error method
        {
            require ROOT . 'src/ecommerce/view/error.php'; //include the error page
        }

    }
