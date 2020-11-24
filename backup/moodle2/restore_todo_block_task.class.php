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
 * The task that provides a complete restore of block_todo is defined here.
 *
 * @package     block_todo
 * @category    restore
 * @copyright   2020 Your Name <you@example.com>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

// For more information about the backup and restore process, please visit:
// https://docs.moodle.org/dev/Backup_2.0_for_developers
// https://docs.moodle.org/dev/Restore_2.0_for_developers

require_once($CFG->dirroot.'//blocks/todo/backup/moodle2/restore_todo_stepslib.php');

/**
 * Restore task for block_todo.
 */
class restore_todo_block_task extends restore_block_task {

    /**
     * Defines particular settings that the block can have.
     */
    protected function define_my_settings() {
        return;
    }

    /**
     * Defines particular steps that the block can have.
     */
    protected function define_my_steps() {
        return;
    }

    /**
     * Returns the fileareas belonging to the block.
     *
     * @return array.
     */
    public function get_fileareas() {
        return array();
    }

    /**
     * Returns the encoded configuration attributes.
     *
     * @return array;
     */
    public function get_configdata_encoded_attributes() {
        return array();
    }

    /**
     * Defines the contents in the block that must be processed by the link decoder.
     *
     * @return array.
     */
    static public function define_decode_contents() {
        $contents = array();

        // Define the contents.

        return $contents;
    }

    /**
     * Defines the decoding rules for links belonging to the block to be executed by the link decoder.
     *
     * @return array.
     */
    static public function define_decode_rules() {
        $rules = array();

        // Define the rules, if any.

        return $rules;
    }
}
