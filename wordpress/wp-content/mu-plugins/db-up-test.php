<?php
/*
Plugin Name: Custom WP CLI Command
Description: A custom WP CLI command to update options.
Version: 1.0
Author: Dan Linn
*/


if (defined('WP_CLI') && WP_CLI) {
    /**
     * Implements example command.
     */
    class Custom_WP_CLI_Command extends WP_CLI_Command {

        /**
         * Updates WordPress options from a specified file.
         *
         * ## OPTIONS
         *
         * <file>
         * : The path to the SQL file containing the options.
         *
         * ## EXAMPLES
         *
         *     wp custom_command update_options wp_options.sql
         *
         */
        public function update_options($args, $assoc_args) {
            list($file) = $args;

            // Verify the file exists
            if (!file_exists($file)) {
                WP_CLI::error(sprintf('File "%s" not found.', $file));
                return;
            }

            $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            foreach ($lines as $line) {
                $line = trim($line, " ,\n");
                if (preg_match("/^\('([^']*)',\s*'([^']*)',\s*'([^']*)'\)$/", $line, $matches)) {
                    $option_name = $matches[1];
                    $option_value = unserialize(stripslashes($matches[2])); // Assuming values are serialized.
                    if ($option_value === false && $matches[2] !== 'b:0;') {
                        WP_CLI::warning(sprintf('Skipping option "%s" due to unserialization error.', $option_name));
                        continue;
                    }

                    if (update_option($option_name, $option_value)) {
                        WP_CLI::success(sprintf('Option "%s" updated.', $option_name));
                    } else {
                        WP_CLI::log(sprintf('Option "%s" not updated or already up-to-date.', $option_name));
                    }
                }
            }
        }
    }

    WP_CLI::add_command('custom_command', 'Custom_WP_CLI_Command');
}

