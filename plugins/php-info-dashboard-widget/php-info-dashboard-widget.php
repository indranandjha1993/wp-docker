<?php
/*
Plugin Name: Server Info
Plugin URI: https://www.linkedin.com/in/indra-nand-jha-54861ba3/
Description: Displays server information in an organized manner on the server info page under the Tools menu in the WordPress dashboard.
Version: 1.0
Author: Indra Nand Jha
Author URI: https://www.linkedin.com/in/indra-nand-jha-54861ba3/
*/

// Add a submenu item to the "Tools" menu
add_action('admin_menu', 'si_add_submenu_page');
function si_add_submenu_page()
{
    add_submenu_page(
        'tools.php',
        'Server Info',
        'Server Info',
        'manage_options',
        'server-info',
        'si_display_info'
    );
}

// Display the server information
function si_display_info()
{
    $php_info = array(
        'PHP Version' => phpversion(),
        'Loaded Extensions' => implode(', ', get_loaded_extensions())
    );

    $server_info = array(
        'Server Software' => $_SERVER['SERVER_SOFTWARE'],
        'Document Root' => $_SERVER['DOCUMENT_ROOT'],
        'Upload Max Filesize' => ini_get('upload_max_filesize'),
        'Post Max Size' => ini_get('post_max_size'),
        'Max Execution Time' => ini_get('max_execution_time')
    );

    ?>
    <div class="wrap">
        <h1>Server Info</h1>

        <div id="server-info-tabs">
            <div id="php-info">
                <table class="widefat">
                    <thead>
                    <tr>
                        <th>Key</th>
                        <th>Value</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($php_info as $key => $value) : ?>
                        <tr>
                            <td><?php echo $key; ?></td>
                            <td><?php echo $value; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div id="server-info">
                <table class="widefat">
                    <thead>
                    <tr>
                        <th>Key</th>
                        <th>Value</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($server_info as $key => $value) : ?>
                        <tr>
                            <td><?php echo $key; ?></td>
                            <td><?php echo $value; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <style>
        #server-info-tabs {
            margin-top: 20px;
        }

        #server-info-tabs .ui-tabs-panel {
            border: none;
        }

        #server-info-tabs .widefat {
            margin-top: 20px;
        }

        #server-info-tabs th {
            font-weight: bold;
        }

        #server-info-tabs td {
            word-break: break-word;
        }
    </style>
    <?php
}