<?php

namespace App\Http\Controllers;

use App\User as User;
use Yajra\Datatables\Datatables;

class TestController extends Controller {

	public function getTableData() {
		$users = User::query();

		return Datatables::of($users)
			->addColumn('btn_edit_delete', function ($users) {
				return '
						<div class="row">
							<button class="edit-button btn btn-sm btn-rounded btn-outline-primary waves-effect " type="button" id="edit-button" data-target="#editModal" onclick="showEditModal(this.value)" value="' . $users->id . '"><i class="fa fa-pencil-square-o fa-3x" aria-hidden="true"></i></button>
                    		<button class="delete-button btn btn-sm btn-rounded btn-outline-danger waves-effect " type="button" id="' . $users->id . '" data-toggle="modal" data-target="#basicModal"><i class="fa fa-times fa-3x" aria-hidden="true"></i></button>
						</div>
	                 ';

			})
			->rawColumns(['btn_edit_delete'])
			->make(true);
	}
}
