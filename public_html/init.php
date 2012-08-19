<?php

    /**
     * 0_PHP_DB-Session-Login
     *
     * @desc            Initialisation File - Sets up environment. Set
     *                  configuration values in here.
     *
     */

    //--------------------------------------------------------------------------
    // Main Configuration:
    //--------------------------------------------------------------------------

    /**
     * Domain Settings:
     */
    define( 'ROOT',             'http://thnm.pde.com/' );
    define( 'SECURE_ROOT',      'https://thnm.pde.com/' );
    define( 'STATIC_ROOT',      '//thnm.pde.com/static/' ); /* Protocol-less for
                                                          greater flexibility */

    /**
     * Database Settings
     */
    define( 'DB_DRIVER',        'mysql' );
    define( 'DB_HOST',          'localhost' );
    define( 'DB_USER',          'root' );
    define( 'DB_PASS',          'Diablo2' );


    /**
     * Website Settings:
     */
    define( 'TITLE',            'Top Hats & Monocles' );

    /**
     * Timezone Configuration:
     */
    if ( function_exists( 'date_default_timezone_set' ) )
    {
        if ( ! @date_default_timezone_get() )
        {
            date_default_timezone_set( @ini_get('date.timezone') ? ini_get('date.timezone') : 'UTC' );
        }
        else
        {
            date_default_timezone_set( 'UTC' );
        }
    }

    /**
     * Require required files...
     */
    require( 'handlers/db.handler.php' );
    require( 'handlers/template.handler.php' );

    /**
     * Begin Initialisation:
     */
    $Db = new DbHandler;
    $Template = new TemplateHandler;