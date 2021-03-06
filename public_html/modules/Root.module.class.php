<?php

    /**
     * Root Module.
     *
     * @desc            Handles the main website pages such as the homepage.
     *                  If this file doesn't exist or is invalid, we have a big
     *                  problem.
     *
     */

    /**
     * Require the CommonUI functions:
     */
    require_once( 'modules/Common.class.php' );

    class RootUI extends TemplateReq
    {

        //----------------------------------------------------------------------
        // Begin build functions:
        //----------------------------------------------------------------------

        /**
         * @invoke      Root
         *
         * @desc        Website Homepage.
         */
        protected function Root()
        {

            $this->objEngine->caching = false;

            /**
             * Stream Information:
             */
            $this->objEngine->Assign( 'strStreamTitle', 'League of Legends' );

            /**
             * Navigation:
             */
            $this->objEngine->Assign( 'arrPN', CommonUI::GetPrimaryNav(0) );

            /**
             * User Information:
             */
            $this->objEngine->Assign( 'strAvatarUrl', CommonUI::GetAvatar( 'Seer', 120 ) );

            $this->objEngine->Display( 'modules/templates/Root/Root.tpl' );

        }

    }
