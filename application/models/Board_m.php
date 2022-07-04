<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Board_m extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    /*public function get_list($table='ci_board'){
        $sql="SELECT * FROM " .$table. " ORDER BY board_id DESC ";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    } */

	function get_list($table='myboard', $type='', $offset='', $limit='', $search_word='')
	{

		$sword='';

		if ($search_word != ''){
			// 검색어가 있을 경우의 처리
			$sword = ' WHERE subject like "%'.$search_word.'%" or contents like "%'.$search_word.'%"';
		}

		$limit_query = '';

		if ( $limit != '' OR $offset != '' )
		{
			//페이징이 있을 경우의 처리
			$limit_query = ' LIMIT '.$offset.', '.$limit;
		}

		$sql = "SELECT * FROM ".$table.$sword." ORDER BY board_id DESC".$limit_query;
		$query = $this->db->query($sql);

		if ( $type == 'count' )
		{
			//리스트를 반환하는 것이 아니라 전체 게시물의 갯수를 반환
			$result = $query->num_rows();
			//$this->db->count_all($table);
		}
		else
		{
			//게시물 리스트 반환
			$result = $query->result();
		}
		return $result;
	}

	/*
	 * 게시물 상세보기 가져오기
	 * @param string $table 게시판 테이블
	 * @param string $id 게시물번호
	 * @return array
	 */

	function get_view($table, $id)
	{
		/*
		//조회수 증가
		$sql0 = "UPDATE " .$table. " SET hits=hits+1 WHERE board_id='" .$id. "'";
		$this->db->query($sql0);
		*/

		$sql = "SELECT * FROM " .$table. " WHERE board_id='" .$id. "'";
		$query = $this->db->query($sql);

		//게시물 내용 반환
		$result = $query->row();
		return $result;
	}
	/**
	 * 게시물 입력
	 * @param array $arrays 테이블명, 게시물제목, 게시물내용, 아이디 1차 배열
	 * @return boolean 입력 성공여부
	 */
	function insert_board($arrays)
	{
		echo '<meta charset=utf-8" />';
        //date_default_timezone_set('Asia/Seoul');
		$insert_array = array(
			'enterprise' => $arrays['enterprise'],
			'board_pid' => 0, 		 //원글이라 0을 입력, 댓글일 경우 원글번호 입력
			'user_id' => 'advisor',  // 로그인 처리한 후에는 로그인한 아이디
			'user_name' => '관리자',
			'subject' => $arrays['subject'],
			'contents' => $arrays['contents'],
			'st_date' => $arrays['st_date'],
			'fn_date' => $arrays['fn_date'],
			'apply' => $arrays['apply']

		);

		$result = $this->db->insert($arrays['table'], $insert_array);

		//결과 반환
		return $result;
	}

    /** 게시물 수정
     * @param array $arrays 테이블명, 게시물번호, 게시물제목, 게시물내용 1차 배열
     * @return boolean 입력 성공여부
     */
    function modify_board($arrays)
    {
		echo '<meta charset=utf-8" />';
        $modify_array = array(
            'subject' => $arrays['subject'],
            'contents' => $arrays['contents'],
			'st_date' => $arrays['st_date'],
			'fn_date' => $arrays['fn_date'],

        );

        $where = array(
            'board_id' => $arrays['board_id']
        );

        $result = $this->db->update($arrays['table'], $modify_array, $where);

        //결과 반환
        return $result;
    }
    /**게시물 삭제
     * @param string $table 테이블명
     * @param string $no 게시물번호
     * @return boolean 삭제 성공여부
     */
    function delete_content($table, $no)
    {
		echo '<meta charset=utf-8" />';
        $delete_array = array(
            'board_id' => $no
        );

        $result = $this->db->delete($table, $delete_array);

        //결과 반환
        return $result;
    }


}
