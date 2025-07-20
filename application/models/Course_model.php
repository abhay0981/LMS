<?php
class Course_model extends CI_Model
{

    public function get_all()
    {
        return $this->db->order_by('id', 'DESC')->get('courses')->result();
    }

    public function get($id)
    {
        return $this->db->get_where('courses', ['id' => $id])->row();
    }

    public function insert($data)
    {
        return $this->db->insert('courses', $data);
    }

    public function update($id, $data)
    {
        return $this->db->where('id', $id)->update('courses', $data);
    }

    public function delete($id)
    {
        return $this->db->delete('courses', ['id' => $id]);
    }

    public function get_by_instructor($instructor_id)
    {
        return $this->db->where('instructor_id', $instructor_id)->get('courses')->result();
    }

}
