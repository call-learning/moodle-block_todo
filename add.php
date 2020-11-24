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
 */

require_once("../../config.php");
global $CFG, $PAGE, $OUTPUT, $USER;

$blockinstancesid = required_param('blockinstancesid', PARAM_INT); // Block instance ID.
$returnurl = required_param('returnurl', PARAM_URL);

require_login();

$PAGE->set_url( new moodle_url($CFG->wwwroot.'/blocks/todo/add.php', array('blockinstancesid'=> $blockinstancesid)));
$blockcontext = context_block::instance($blockinstancesid, MUST_EXIST);
$PAGE->set_context($blockcontext);
$PAGE->set_pagelayout('standard');
$PAGE->set_heading(get_string('add:todo','block_todo'));

$form = new \block_todo\form\add_todo_form(null, array(
    'persistent'=> null,
    'blockinstancesid'=>$blockinstancesid,
    'returnurl'=> $returnurl));

if ($data = $form->get_data()) {
    global $USER;
    //$data->usermodified = $USER->id;
    //$data->timemodified = time();
    //$data->timecreated = $data->timemodified;
    //unset($data->returnurl);
    //unset($data->submitbutton);
    $todoinstance = new \block_todo\persistent\todo(0,$data);
    $todoinstance->create();

    redirect(new moodle_url($returnurl));
} else if($form->is_cancelled()) {
    redirect(new moodle_url($returnurl));
}
echo $OUTPUT->header();

$form->display();

echo $OUTPUT->footer();
