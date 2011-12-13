<?php

/**
 *  * @internal
 *   */
abstract class UTIL_Mustache {

    private static $loader;
      private static $mustache;

      public static function init() {
            if ( !class_exists( 'Mustache' ) )
                    require dirname(__FILE__) . '/vendor/mustache/Mustache.php';

                if ( !class_exists( 'MustacheLoader' ) )
                        require dirname(__FILE__) . '/vendor/mustache/MustacheLoader.php';

                    self::$loader = new MustacheLoader( dirname(__FILE__) . '/../templates', 'html' );

                    self::$mustache = new Mustache( null, null, self::$loader );
                      }

        public static function render( $template, $data ) {
              return self::$mustache->render( self::$loader[$template], $data );
                }
}

UTIL_Mustache::init();
