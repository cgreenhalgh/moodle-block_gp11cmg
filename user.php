<?php

// user-specific dashboard view

require_once('../../config.php');

// must be logged in...
require_login();

// is this for a particular user?
$userid = optional_param('id', 0, PARAM_INTEGER);

// system (global) context
$context = get_context_instance(CONTEXT_SYSTEM);
$PAGE->set_context($context);

// the current user...
global $USER;

if ($userid) {
	// is current user allowed to see this user's information?
	if ($USER->id!=$userid) {
		// hmm, not the same user, but let's allow a site manager or administrator to view it
		require_capability('block/gp11cmg:viewuser', $context);
	}
} else {
	// do current user by default
	$userid = $USER->id;
}

// DB
global $DB;

// get user from DB
$user = $DB->get_record('user',array('id'=>$userid));

if (!$user) 
	print_error('unknownuser','block_gp11cmg',$userid);

// standard page & heading, etc
$strtitle = get_string('usertitle', 'block_gp11cmg', $userid);

$PAGE->set_pagelayout('standard');
$PAGE->set_title($strtitle);
$PAGE->set_heading($strtitle);

$pageurl = new moodle_url('/blocks/gp11cmg/user.php',array('id'=>$user->id));
$PAGE->set_url($pageurl);

echo $OUTPUT->header();

// put stuff here...

echo $OUTPUT->footer();
