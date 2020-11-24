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
 * Code to be executed after the plugin's database scheme has been installed is defined here.
 *
 * @package     block_todo
 * @category    upgrade
 * @copyright   2020 Your Name <you@example.com>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Custom code to be run on installing the plugin.
 */
function xmldb_block_todo_upgrade($oldversion, $block) {
    global $DB;
    $dbman = $DB->get_manager();

    if ($oldversion < 2020110602) {

        // Define field usermodified to be added to block_todo.
        $table = new xmldb_table('block_todo');
        $field = new xmldb_field('usermodified', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, '0', 'text');
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }
        $field = new xmldb_field('timecreated', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, '0', 'usermodified');
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }
        $field = new xmldb_field('timemodified', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, '0', 'timecreated');
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }
        $key = new xmldb_key('usermodified', XMLDB_KEY_FOREIGN, ['usermodified'], 'user', ['id']);
        // Launch add key usermodified.
        $dbman->add_key($table, $key);
        // Todo savepoint reached.
        upgrade_block_savepoint(true, 2020110602, 'todo');
    }
    if ($oldversion < 2020110603) {
        $table = new xmldb_table('block_todo');
        $field = new xmldb_field('blockinstancesid', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, '0', 'timemodified');
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }
        $key = new xmldb_key('blockinstancesid_fk', XMLDB_KEY_FOREIGN, ['blockinstancesid'], 'block_instances', ['id']);
        // Launch add key usermodified.
        $dbman->add_key($table, $key);
        upgrade_block_savepoint(true, 2020110603, 'todo');
    }
    return true;
}
