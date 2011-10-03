<?php

$capabilities = array(

	// View a user's dashboard (not their own)
    'block/gp11cmg:viewuser' => array(

        'captype' => 'read',
        'contextlevel' => CONTEXT_USER,
        'archetypes' => array(
            'manager' => CAP_ALLOW,
            'admin' => CAP_ALLOW
		)
	)

);

