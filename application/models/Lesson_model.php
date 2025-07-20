<?php
class Lesson_model extends CI_Model {

    public function get_all_by_course($course_id) {
        return $this->db->where('course_id', $course_id)->get('lessons')->result();
    }

    public function get($id) {
        return $this->db->get_where('lessons', ['id' => $id])->row();
    }

    public function insert($data) {
        return $this->db->insert('lessons', $data);
    }

    public function update($id, $data) {
        return $this->db->where('id', $id)->update('lessons', $data);
    }

    public function delete($id) {
        return $this->db->delete('lessons', ['id' => $id]);
    }
}
