<?php

return [
	'role_structure' => [
		'superadministrator' => [
			'users' => 'c,r,u,d',
			'acl' => 'c,r,u,d',
			'profile' => 'r,u',
		],
		'administrator' => [
			'users' => 'c,r,u,d',
			'profile' => 'r,u',
		],
		'staff' => [
			'profile' => 'r,u',
		],
		'customer' => [
			'profile' => 'r,u',
		],
	],
	'permission_structure' => [
		'cru_user' => [
			'profile' => 'c,r,u',
		],
	],
	'permissions_map' => [
		'c' => 'create',
		'r' => 'read',
		'u' => 'update',
		'd' => 'delete',
	],
];
