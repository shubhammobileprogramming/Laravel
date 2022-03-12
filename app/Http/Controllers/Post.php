<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostModel;

class Post extends Controller
{
    public function get_data() {
        $postData = PostModel::get();

        if($postData) {
            return array('status'=> 200, 'data' => $postData, 'message' => '');
        } else {
            return array('status'=> 201, 'data' => '', 'message' => 'record not available.');
        }
    }

    public function create_data(Request $request) {

        $get = json_decode($request->getContent());

        $saveData = new PostModel;
        $saveData->name = $get->name;
        $saveData->email = $get->email;
        $saveData->subject = $get->subject;
        $saveData->message = $get->message;
        $saveData->save();

        $status = $saveData->id;

        if($status > 0) {
            return array('status'=> 200, 'data' => '', 'message' => 'record created successfully.');
        } else {
            return array('status'=> 201, 'data' => '', 'message' => 'record not created, try again.');
        }
    }

    public function update_data(Request $request) {
        $get = json_decode($request->getContent());

        $updateData = PostModel::find($get->id);

        $updateData->name = $get->name;
        $updateData->email = $get->email;
        $updateData->subject = $get->subject;
        $updateData->message = $get->message;
        $updateData->save();

        if ($updateData->getChanges()) {
            return array('status'=> 200, 'data' => '', 'message' => 'record updated successfully.');
        } else {
            return array('status'=> 201, 'data' => '', 'message' => 'record not updated, try again.');
        }
    }

    public function delete_data(Request $request) {
        $get = json_decode($request->getContent());

        $id = $get->id;

        $data = PostModel::where('id', $id)->delete();
        if($data == true) {
            return array('status'=> 200, 'data' => '', 'message' => 'record deleted successfully.');
        } else {
            return array('status'=> 201, 'data' => '', 'message' => 'record not deleted, try again.');
        }
    }
}
