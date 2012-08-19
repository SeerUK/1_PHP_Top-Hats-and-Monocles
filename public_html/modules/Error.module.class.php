<?php

    /**
     * HTTP Error Module
     *
     * @desc            Prepares pages for HTTP errors, usually from requests in
     *                  scripts in our system (hopefully).
     *
     */

    class ErrorUI implements TemplateReq
    {

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
                $this->Engine = new Smarty;
                $this->$strInvoke();
            }

        }

        //----------------------------------------------------------------------
        // Begin assignment and build functions:
        //----------------------------------------------------------------------

        /**
         * @invoke      404
         *
         * @desc        HTTP 404 page
         */
        private function n404()
        {

            $this->Engine->caching = true;
            $this->Engine->cache_lifetime = 3600;

            $this->Engine->assign( 'strTitle', TITLE );

            $this->Engine->Display( 'modules/templates/Error/404.tpl' );

        }

    }
