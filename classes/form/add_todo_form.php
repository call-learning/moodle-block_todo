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
 * Add todo form
 *
 * @package    block_todo
 * @copyright  2018 Mihail Geshoski <mihail@moodle.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace block_todo\form;
global $CFG;

use core\form\persistent;

require_once($CFG->libdir.'/formslib.php');

class add_todo_form extends persistent {

    protected static $persistentclass = "\\block_todo\\persistent\\todo";

    protected static $fieldstoremove = array('submitbutton','returnurl');

    protected function definition() {
        $mform = $this->_form;
        $blockinstancesid = empty($this->_customdata['blockinstancesid']) ? 0: $this->_customdata['blockinstancesid'];
        $returnurl = empty($this->_customdata['returnurl']) ? '': $this->_customdata['returnurl'];

        $mform->addElement('hidden', 'blockinstancesid');
        $mform->setType('blockinstancesid', PARAM_INT);
        $mform->setConstant('blockinstancesid', $blockinstancesid);

        $mform->addElement('hidden', 'returnurl');
        $mform->setType('returnurl', PARAM_URL);
        $mform->setDefault('returnurl', $returnurl);

        $mform->addElement('text', 'text', get_string('todo:text', 'block_todo'));
        $mform->setType('text', PARAM_TEXT);

        $this->add_action_buttons();
    }
}