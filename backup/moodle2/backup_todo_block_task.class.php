<?php
// This file is part of Moodle - https://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * The task that provides all the steps to perform a complete backup is defined here.
 *
 * @package     block_todo
 * @category    backup
 * @copyright   2020 Your Name <you@example.com>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

// For more information about the backup and restore process, please visit:
// https://docs.moodle.org/dev/Backup_2.0_for_developers
// https://docs.moodle.org/dev/Restore_2.0_for_developers

require_once($CFG->dirroot.'//blocks/todo/backup/moodle2/backup_todo_stepslib.php');
require_once($CFG->dirroot.'//blocks/todo/backup/moodle2/backup_todo_settingslib.php');

/**
 * The class provides all the settings and steps to perform one complete backup
 * of block_todo.
 */
class backup_todo_block_task extends backup_block_task {

    /**
     * Defines particular settings for the plugin.
     */
    protected function define_my_settings() {
        return;
    }

    /**
     * Defines particular steps for the backup process.
     */
    protected function define_my_steps() {
        return;
    }

    /**
     * Returns the array of file area names within the block context.
     *
     * @return string[] File area names.
     */
    public function get_fileareas() {
        return array();
    }

    /**
     * Returns the config elements that must be processed before they are stored for backup.
     *
     * @return string[] Config elements.
     */
    public function get_configdata_encoded_attributes() {
        return array();
    }

    /**
     * Codes the transformations to perform in the block in order to get transportable (encoded) links.
     *
     * @param string $content.
     * @return string.
     */
    static public function encode_content_links($content) {
        return $content;
    }
}
