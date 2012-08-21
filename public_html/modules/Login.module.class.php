<?php

    /**
     * Login Module
     *
     * @desc            Controls all aspects of logging in. Not related to
     *                  authentication, just sets up the user session so that
     *                  the system can authenticate a user.
     *
     */

    /**
     * Main Login Class
     */
    class LoginUI
    {

        private $objDb;

        public function __construct( $strUsername, $strPassword, $bolRemember = false )
        {

            DbHander::Query('SELECT * FROM `thnm_user`');
        }

    }
