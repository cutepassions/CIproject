
<script>
    $(document).ready(function(){
        $("#search_btn").click(function(){
            if($("#q").val() == ''){
                alert('검색어를 입력해주세요.');
                return false;
            } else {    // 검색어를 포함한 주소를 만들어서 POST 전송
                var act = '<?php echo base_url('/CIproject/index.php/board/lists/myboard/q/');?>'+$("#q").val()+'/page/1';
                $("#bd_search").attr('action', act).submit();
            }
        });
    });
    //검색어 입력후 엔터키를 입력하면 검색 버튼을 누른 것과 동일한 효과를 내도록 함
    function board_search_enter(form) {
        var keycode = window.event.keyCode;
        if(keycode == 13) $("#search_btn").click();
    }
</script>

<article id="board_area">
	<header>
		<h1></h1>
	</header>
        <table cellspacing="0" cellpadding="0" class="table table-striped" align="center">
            <thead>
            <tr>
				<th scope="col">기업</th>
                <th scope="col">번호</th>
                <th scope="col">제목</th>
                <th scope="col">작성자</th>
				<th scope="col">시작일</th>
				<th scope="col">마감일</th>
				<th scope="col">지원 현황</th>
            </tr>
            </thead>
            <tbody>
            <?php
            date_default_timezone_set('Asia/Seoul');
            foreach ($list as $lt) {
            ?>
                <tr>
                    <th scope="row">
                        [<?php echo $lt->enterprise; ?>]
                    </th>
					<th scope="row">
						<?php echo $lt->board_id; ?>
					</th>
                    <td><a href="<?php echo base_url('/CIproject/index.php/');?><?php echo $this->uri->segment(1, 'board');?>/view/<?php echo $this->uri->segment(3, 'myboard');?>/<?php echo $lt->board_id;?>/page/<?php echo $page;?>">
                        <?php echo $lt->subject; ?></a></td>
                    <td><?php echo $lt->user_name; ?></td>
                    <td><?php echo $lt->st_date; ?></td>
					<td><?php echo $lt->fn_date; ?></td>
					<td><?php echo $lt->apply; ?></td>
                </tr>
            <?php
            }
            ?>
          	<tr style="al"><th colspan="7"><a href="<?php echo base_url('/CIproject/index.php/board/write/');?><?php echo $this->uri->segment(3, 'myboard');?>/page/<?php echo $this->uri->segment(5);?>" class="btn btn-success">쓰기</a>
					<a href='<?php echo base_url('/CIproject/index.php/');?>' class="btn btn-primary">목록</a></th>
			</tr>
			</tbody>
<div align="center">
			<tfoot align="">
			<tr>
				<th colspan="7"><?php echo $pagination;?></th>
			</tr>
			</tfoot>
</div>
		</table>
	<div align="center">

		<form id="bd_search" method="post">
			<input type="text" name="search_word" id="q" onkeypress="board_search_enter(document.q);"/>
			<input type="button" value="검색" id="search_btn" />
            <input type="hidden" name="<?= $this->security->get_csrf_token_name()?>" value="<?=$this->security->get_csrf_hash();?>"/>
		</form>
	</div>

</article>
