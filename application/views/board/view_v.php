<article id="board_area">
		<header>
			<h1></h1>
		</header>
		<table cellspacing="0" cellpadding="0" class="table table-striped" >
			<thead>
				<tr>
					<th scope="col"> [<?php echo $views->enterprise; ?>]</th>
					<th scope="col"> <?php echo $views->subject; ?></th>
					<th scope="col">이름 : <?php echo $views->user_name; ?></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th colspan="5">
						<?php echo $views->contents; ?></th>
				</tr>
			</tbody>
			<tfoot>
				<tr>
					<th colspan="5">
                        <a href="<?php echo base_url('/CIproject/index.php/board/lists/');?><?php echo $this->uri->segment(3);?>/page/<?php echo $this->uri->segment(6);?>"
                           class="btn btn-primary">목록</a>

						<a href="<?php echo base_url('/CIproject/index.php/board/modify/');?><?php echo $this->uri->segment(3);?>/<?php echo $this->uri->segment(4);?>/page/<?php echo $this->uri->segment(6);?>"
                           class="btn btn-warning">수정</a>

						<a href="<?php echo base_url('/CIproject/index.php/board/delete/');?><?php echo $this->uri->segment(3);?>/<?php echo $this->uri->segment(4);?>/page/<?php echo $this->uri->segment(6);?>"
                           class="btn btn-danger">삭제</a>

						<a href="<?php echo base_url('/CIproject/index.php/board/write/');?><?php echo $this->uri->segment(3);?>/page/<?php echo $this->uri->segment(6);?>"
                           class="btn btn-success">쓰기</a></th

				</tr>

			</tfoot>
		</table>
</article>
