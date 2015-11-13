<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'cookbook');

/** Имя пользователя MySQL */
define('DB_USER', 'cook');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'dirty_cookies');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'u(t0Vs{l- 4xdKXGHs8;#L`V7-P`D^a|R6N*r)T,5{K.7i*F_~LO-!z(}V_[S$7u');
define('SECURE_AUTH_KEY',  'm+WB41ItR~c56of2L=68yY-5=/^vS8y!|/78qtqlobNxU`JwVD%s|#baB5xT_QlN');
define('LOGGED_IN_KEY',    'Tv`RA%2_CzWhq|Zt_!whX#7-IdZyPNP3SM2Kf1XyLZCIEBB;#P)C#jdqcSm9`}TM');
define('NONCE_KEY',        '7jpHThM1IEdaeVo-q;sx-[:J6x:]P_kL|(7phQ+(UP3mVua)%8|D$|$h8<xrGPcQ');
define('AUTH_SALT',        'P#.-I]Ee ~EyK|4&bL/.fDgo9-1Gqep]/4azw3~QA$#{ST0NM>n76H(NOY7*MIpK');
define('SECURE_AUTH_SALT', 'tA/JI:c-*f-k97-e#7-R(Zh`Y}9Np|Gc`x3f6iX /[o;#lObMy3rDppMQqjuf<cK');
define('LOGGED_IN_SALT',   'R>*{XD+P64TS@lmTn;Qc%)]:%xV&KSZ80tD`+m>e&OF!toz$Un(GP@TfL!Ba+|w`');
define('NONCE_SALT',       ';zL`Q#&#NR]>F5boXFH.I=F},7;+0XU_iUwX9ONhJBs/xD`mw%]^)f@%9{GL;1Yo');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 * 
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');

