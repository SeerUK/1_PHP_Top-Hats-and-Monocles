<?php

    /**
     * Template Handler
     *
     * @current system  Smarty 3.1.11
     * @desc            Handles preparation of template files based upon the URL
     *                  and sets up the page using the template engine specified
     *                  above.
     *
     */

    /**
     * Require the current template system:
     */
    require_once( 'template.libs/Smarty.class.php' );

    /**
     * TemplateHandler Main Class:
     */
    class TemplateHandler
    {

        public $module;
        public $invoke;
        public $instance;

        public function __construct()
        {

            $this->ValidateURI();

        }

        /**
         * Returns current template handler, must be the name of the main class
         * for the template system.
         */
        public static function GetHandler()
        {
            return 'Smarty';
        }

        /**
         * Redirect to appropriate error page and halt execution of script:
         */
        public static function HTTPError($intErrCode)
        {

            header( 'Location: ' . ROOT . '?module=Error&invoke=' . $intErrCode );
            exit;

        }

        /**
         * Validates and sanitizes the URL elements needed for templates to be
         * displayed properly.
         */
        private function ValidateURI()
        {

            /**
             * We will always only have 'module' and 'invoke'
             */
            if ( isset( $_GET['module'] ) && isset( $_GET['invoke'] ) )
            {
                $this->module = $_GET['module'];
                $this->invoke = $_GET['invoke'];

                /**
                 * URI template values must be alphanumeric.
                 */
                if ( !ctype_alnum( $this->module ) || !ctype_alnum( $this->invoke ) )
                {
                    $this::HTTPError('404');
                }

                /**
                 * Verify Existance of module and invokation... test invoke:
                 */
                if ( file_exists( 'modules/' . $this->module . '.module.class.php' ) )
                {
                    require_once( 'modules/' . $this->module . '.module.class.php' );

                    $strClass = $this->module . 'UI';
                    $this->instance = new $strClass($this->invoke);
                }
                else
                {
                    $this::HTTPError('404');
                }
            }
            else
            {
                if ( !isset( $_GET['module'] ) && !isset( $_GET['invoke'] ) )
                {
                    require_once( 'modules/Root.module.class.php' );
                    $this->instance = new RootUI('Root');
                }
                elseif ( !isset( $_GET['module'] ) || !isset( $_GET['invoke'] ) )
                {
                    $this::HTTPError('404');
                }
            }

        }

    }

    /**
     * Interface to control the module classes:
     *
     * Should be implemented in every module class to help ensure correct
     * functionality.
     */
    interface TemplateReq
    {
        public function __construct( $strInvoke );
    }
