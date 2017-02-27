<?php
require_once"unit_test.php";

class Entry extends Unit_test{

    public function run() {
        $this->testEntry();
        $this->testEntryOut();
    }

    public function testEntry() {
        $this->CI->load->library("UserClass");

        $data['entry_number'] = 3;
        $data['entry_fmale'] = 1;
        $data['entry_male'] = 2;
        $data['activities_id'] = 2;
        $data['aue_comments'] = "abc";

        $result = $this->CI->userclass->entry($data, 2);

        $this->unit->run($result['state'], -1, "run entry function in class UserClass");

        $sql = "SELECT * FROM activities_user_entry WHERE user_id=2 AND activities_id=2";
        $result = $this->CI->db->query($sql);
        $entrynfo = $result->row_array();

        // 查询消息记录是否存在
        $sql = "SELECT * FROM users_message WHERE send_user_id=2 AND receive_user_id=1 AND message_type=1";
        $result = $this->CI->db->query($sql);
        $this->unit->run($result->num_rows(), 1, "see the entry message in DB");

        $result = $this->CI->userclass->passEntry($entrynfo['aue_id'], 1);
        $this->unit->run($result['state'], -1, "pass entry function in class UserClass");

        $sql = "SELECT * FROM users_message WHERE send_user_id=1 AND receive_user_id=2 AND message_type=101";
        $result = $this->CI->db->query($sql);
        $this->unit->run($result->num_rows(), 1, "see the pass entry message in DB");

        $result = $this->CI->userclass->delEntry($entrynfo['aue_id'], 1);
        $this->unit->run($result['state'], -1, "delete entry function in class UserClass");

        $sql = "SELECT * FROM users_message WHERE send_user_id=1 AND receive_user_id=2 AND message_type=101";
        $result = $this->CI->db->query($sql);
        $this->unit->run($result->num_rows(), 2, "see the del entry message in DB");

        // clear data
        $sql = "DELETE FROM activities_user_entry where user_id=2";
        $this->CI->db->query($sql);
        $sql = "DELETE FROM users_message WHERE send_user_id=2 AND receive_user_id=1 AND message_type=1";
        $this->CI->db->query($sql);
        $sql = "DELETE FROM users_message WHERE send_user_id=1 AND receive_user_id=2 AND message_type=101";
        $this->CI->db->query($sql);
    }

    public function testEntryOut() {
        $this->CI->load->library("UserClass");

        $data['entry_number'] = 3;
        $data['entry_fmale'] = 1;
        $data['entry_male'] = 2;
        $data['activities_id'] = 2;
        $data['aue_comments'] = "abc";

        $result = $this->CI->userclass->entry($data, 2);
        $result = $this->CI->userclass->entry_out(array("activities_id" => 2), 2);
        $this->unit->run($result['state'], -1, "run entry out without pass");

        $result = $this->CI->userclass->entry($data, 2);
        $sql = "SELECT * FROM activities_user_entry WHERE user_id=2 AND activities_id=2";
        $result = $this->CI->db->query($sql);
        $entrynfo = $result->row_array();
        $result = $this->CI->userclass->passEntry($entrynfo['aue_id'], 1);
        $result = $this->CI->userclass->entry_out(array("activities_id" => 2), 2);
        $this->unit->run($result['state'], -1, "run entry out after pass");

        // clear data
        $sql = "DELETE FROM activities_user_entry where user_id=2";
        $this->CI->db->query($sql);
        $sql = "DELETE FROM users_message WHERE send_user_id=2 AND receive_user_id=1";
        $this->CI->db->query($sql);
        $sql = "DELETE FROM users_message WHERE send_user_id=1 AND receive_user_id=2";
        $this->CI->db->query($sql);
    }
}
