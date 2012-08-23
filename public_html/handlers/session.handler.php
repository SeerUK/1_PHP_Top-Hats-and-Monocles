<?php

    /**
     * Session Handler
     *
     * @desc            Handles user sessions, allowing the authentication class
     *                  to use the user values and set up permissions.
     *
     */

    /**
     * Password handler main class
     */
    class SessionHandler
    {

        public function __construct($strUserName, $strUserPassHash)
        {

            /**
             * By now the user credentials have already been verified as being
             * valid. We're safe to proceed.
             */

            /**
             * Prepare the session values for entry in the database.
             */

            $strStartData = getDate();

            //base64_encode

            /*DbHandler::Query("
                    INSERT INTO
                        `tblsession` (`session_uid`, `session_user_uid`, `session_user_pass`, `session_start_date`, `session_ip`)
                    VALUES
                        ('1', '2', 'soifjsodif', '234', '203.23.23.')
                    ;");*/

        }

    }
