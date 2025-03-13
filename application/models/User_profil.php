<?php
	/**
	 * 
	 */
	class User_profil extends CI_Model
	{
		
		public function cekUser($user)
		{
			$this->db->select('password');
			$this->db->where('username',$user);
			$query = $this->db->get('user');
			return $query;
		}
	}
?>