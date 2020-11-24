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
 * Cohort updated event.
 *
 * @package    core
 * @copyright  2013 Dan Poltawski <dan@moodle.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace block_todo\observer;
defined('MOODLE_INTERNAL') || die();

class todo_observer {
    public static function todo_created_callback(\core\event\base $event) {
        $data = $event->get_data();
        if (!empty($data['other'])) {
            global $USER, $CFG;
            $message = new \core\message\message();
            //$message->component = 'moodle';
            //$message->name = 'instantmessage';
            $message->component = 'block_todo';
            $message->name = 'todocreated';

            $message->userfrom = $USER;
            $message->userto = \core_user::get_user($data['userid']);
            $message->subject = 'Todo Created'; //
            $message->fullmessage = $data['other']['content'];
            $message->fullmessageformat = FORMAT_PLAIN;
            $message->fullmessagehtml = "<p>{$data['other']['content']}</p>";
            $message->smallmessage = 'small message';
            //$message->notification = '0';
            $message->contexturl = $CFG->wwwroot.'/my';
            $message->contexturlname = 'Context name';
            $message->replyto = "random@example.com";
            $message->courseid = SITEID;
            $messageid = message_send($message);
        }
    }
}