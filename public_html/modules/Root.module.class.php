<?php

    /**
     * Root Module.
     *
     * @desc            Handles the main website pages such as the homepage.
     *                  If this file doesn't exist or is invalid, we have a big
     *                  problem.
     *
     */

    require_once( 'modules/Common.class.php' );

    class RootUI implements TemplateReq
    {

        /**
         * Engine calls the current template handler
         */
        private $Engine;

        /**
         * Check the invokation, prepare it for building:
         */
        public function __construct( $strInvoke )
        {

            if ( is_numeric( substr( $strInvoke, 1 ) ) )
            {
                $strInvoke = 'n' . $strInvoke;
            }

            if ( !method_exists( $this, $strInvoke ) )
            {
                TemplateHandler::HTTPError('404');
            }
            else
            {
                $strHandler = TemplateHandler::GetHandler();
                $this->Engine = new $strHandler;
                $this->$strInvoke();
            }

        }

        //----------------------------------------------------------------------
        // Begin build functions:
        //----------------------------------------------------------------------

        /**
         * @invoke      Root
         *
         * @desc        Website Homepage.
         */
        private function Root()
        {

            $this->Engine->caching = true;
            $this->Engine->cache_lifetime = 120;

            /**
             * Stream Information:
             */
            $this->Engine->Assign( 'strStreamTitle', 'Darksiders' );

            /**
             * User Information:
             */
            $this->Engine->Assign( 'strAvatarUrl', CommonUI::GetAvatar( 'Seer', 120 ) );

            $this->Engine->Display( 'modules/templates/Root/Root.tpl' );

        }

    }
