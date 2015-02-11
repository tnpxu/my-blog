<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function insert_data($data)
    {
        return $this->db->insert('blog', $data);
    }
    function show_data()
    {
        $query = $this->db->get('blog');

        foreach ($query->result() as $row)
        {
            $data[] = array(
                'id'         => $row->id,
                'subject'    => $row->subject,
                'message'    => $row->message,
                'type'       => $row->type,
                'img_path'   => $row->img_path,
                'created_at' => $row->created_at,
            );
        }
        return $data;
    }
    function find_blog($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->get('blog');
            $row = $query->row();
            $data[0] = array(
                'id'         => $row->id,
                'subject'    => $row->subject,
                'message'    => $row->message,
                'type'       => $row->type,
                'img_path'   => $row->img_path,
                'created_at' => $row->created_at,
            );
            return $data;
    }

    function get_data($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->get('blog');

        if($query->num_rows()>0)
        {
            $row = $query->row();
            $data = array(
                'id'         => $row->id,
                'subject'    => $row->subject,
                'message'    => $row->message,
                'type'       => $row->type,
                'img_path'   => $row->img_path,
                'created_at' => $row->created_at,
            );
            return $data;
        }
        return FALSE;
    }

    function edit_data($id,$data)
    {
        $this->db->where('id',$id);
        return $this->db->update('blog',$data);
    }
    function delete_data($id)
    {
        return $this->db->delete('blog',array('id' => $id));
    }
    function search_data($data_search)
    {
        $this->db->like('type', $data_search['search']);
        $query = $this->db->get('blog');
        if($query->num_rows()>0)
        {
            foreach ($query->result() as $row)
            {
            $data[] = array(
                'id'         => $row->id,
                'subject'    => $row->subject,
                'message'    => $row->message,
                'type'       => $row->type,
                'img_path'   => $row->img_path,
                'created_at' => $row->created_at,
                );
            }
        return $data;
        }
        else
        {
        return FALSE;
        } 
    }

}