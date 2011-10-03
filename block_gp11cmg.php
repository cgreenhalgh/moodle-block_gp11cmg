<?php

// The block definition itself, i.e. what can be made to appear at the side
// of the site.

defined('MOODLE_INTERNAL') || die();

// this is currently a simple block, i.e. a single fragment of HTML. 
// a list is also a standard option
class block_gp11cmg extends block_base {

	function init() {
		$this->title = get_string('title', 'block_gp11cmg');
	}
	
	function applicable_formats() {
		return array('all' => true);
	}
	
	function instance_allow_multiple() {
		// only one instance
		return false;
	}
	
	function get_content() {
		if ($this->content !== null) {
			return $this->content;
		}

		$this->content         =  new stdClass;
		$html = '';
		// link to current user's dashboard?

		$userurl = new moodle_url('/blocks/gp11cmg/user.php');
		$html .= '<a href="'.$userurl.'">'.get_string('userurl', 'block_gp11cmg').'</a>';

		$this->content->text = $html;
		return $this->content;
	}
}
