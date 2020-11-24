<?php
// This file is part of Moodle - http://moodle.org/
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
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Class persistent
 *
 * @package    block_myprofile
 * @copyright  2018 Mihail Geshoski <mihail@moodle.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace block_todo\persistent;

use block_todo\event\todo_created;
use core\persistent;

defined('MOODLE_INTERNAL') || die();

class todo extends persistent {
    const TABLE = 'block_todo';

    /**
     * @return array|array[]
     */
    protected static function define_properties() {
        return array(
            'text' => array (
                'default' => '',
                'type' => PARAM_TEXT,
            ),
            'blockinstancesid' => array (
                'type' => PARAM_INT,
            ),
        );
    }
    /**
     * Hook to execute after a create.
     *
     * This is only intended to be used by child classes, do not put any logic here!
     *
     * @return void
     */
    protected function after_create() {
        global $USER;
        $data = [
            'objectid' => $this->get('id'),
            'context' => \context_block::instance($this->get('blockinstancesid')),
            'userid' => $USER->id,
            'other' => [
                'content' => $this->get('text'),
            ]
        ];
        $createevent = todo_created::create($data);
        $createevent->trigger();
    }

}