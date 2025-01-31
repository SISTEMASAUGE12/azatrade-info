<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'azatrade_noticia_azatrade');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'azatrade_noti_az');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', '878HqOddi2tY');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8mb4');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'W~K0-TB7t8O9IILR$bfwCdxcarjp^F6}s4bOfY`{`#dRQpCi]5=R45d:vL[U@j*Z');
define('SECURE_AUTH_KEY', 'j`Wt}{B}eoRIF>CEeaUC*B|4O^L2Cx1w0s/LY(jpf!gX*`8r.xcB]&Di$t[MmQ@l');
define('LOGGED_IN_KEY', ':%[$E(hPH.}$7vY$zbRGnm6Y3(JX{U@z=<8Hab6E~+pY $JsGJ`o.KX<Xo5Sm.7t');
define('NONCE_KEY', '3wct@DceubV6a3(4Xxc&,k,#YeHubiVMk{EVpCu*5 tBSjVJIXniThn7pX|02}^m');
define('AUTH_SALT', '*e)ehxm{q&4B7fRAy+hvfNNk}wD5w]8x{KVSTEzb<ot^(-e-)TG{;oG(qe!TUj)V');
define('SECURE_AUTH_SALT', 'vSM0)Y_w&&TET-g!%uV+8aQL}RdR*8@U>W/WqF<|Wt-?bmqsZgxSR,mbEeFvgWEi');
define('LOGGED_IN_SALT', 'e!nJ5RDwRDjz#op+X*fGWDWcPOmo`KFMiU*1/L|1o3kU?bCMau!yTVDZcW<vRF:X');
define('NONCE_SALT', ':2fc`hjU9SA%B#gGoK@a,VMDt^G!c$dvOSZt!E(0X:C;eSxxVW9.&esgJuA?hT]P');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

