	<script>
        /* 입력하지 않고 쓰기 버튼을 누르는 경우 처리
        폼에 빈 값이 있을 경우 경고메시지를 띄우고 해당 입력폼에 포커스 이동, FALSE를 반환
        */
		$(document).ready(function(){
			$("#write_btn").click(function(){
				if($("#input01").val() == ''){
					alert('제목을 입력해주세요.');
					$("#input01").focus();
					return false;
				} else if($("#input02").val() == ''){
					alert('내용을 입력해주세요.');
					$("#input02").focus();
					return false;
				}else if($("#input03").val() == ''){
					alert('시작일을 입력해주세요.');
					$("#input03").focus();
					return false;
				}else if($("#input04").val() == ''){
					alert('종료일을 입력해주세요.');
					$("#input04").focus();
					return false;
				}
				
				else {
					$("#write_action").submit();
				}
			});
		});

	</script>

	<article id="board_area">
		<header>
			<h1></h1>
		</header>
		<form class="form-horizontal" method="post" action="" id="write_action">
		  <fieldset>
		    <legend>게시물 수정</legend>
		    <div class="control-group">

		      <label class="control-label" for="input01">제목</label>
		      <div class="controls">
		        <input type="text" class="input-xlarge" id="input01" name="subject" value="<?php echo $views->subject;?>">
				<p class="help-block">제목을 입력해 주세요</p>
		      </div>

		      <label class="control-label" for="input02">내용</label>
		      <div class="controls">
		        <textarea class="input-xlarge" id="input02" name="contents" cols="30" rows="2"><?php echo $views->contents;?></textarea>
				<p class="help-block">내용을 입력해 주세요</p>
		      </div>

				<label class="control-label" for="input03">시작일</label>
				<div class="controls">
					<input type="date" class="input-xlarge" id="input03" name="st_date" value="<?php echo $views->st_date;?>">
					<p class="help-block">시작일을 입력해 주세요. Ex)2021-09-05</p>
				</div>

				<label class="control-label" for="input04">시작일</label>
				<div class="controls">
					<input type="date" class="input-xlarge" id="input04" name="fn_date" value="<?php echo $views->fn_date;?>">
					<p class="help-block">종료일을 입력해 주세요. Ex)2021-11-05</p>
				</div>

				<label class="control-label" for="input05">기업 종류</label>
				<div class="radio" name="enterprise">
					<input type="hidden" value="<?php $views->enterprise?>">
					<?php echo $views->enterprise;?>
				</div>


				<label class="control-label" for="input06" style="margin-top: 20px">지원 상황</label>
				<div class=control name="apply" value="<?php echo $views->apply; ?>">
					<input type="hidden" value="<?php $views->apply?>">
					<?php echo $views->apply;?>
				</div>
				</select>



		      <div class="form-actions" style="margin-top: 20px">
		        <button type="submit" class="btn btn-primary" id="write_btn">수정</button>
		        <button class="btn" type="button" onclick="document.location.reload()">취소</button>
				  <a href="<?php echo base_url('/CIproject/index.php/board/lists/');?><?php echo $this->uri->segment(3);?>/page/<?php echo $this->uri->segment(6);?>"
					 class="btn btn-primary">목록</a>
		      </div>
		    </div>
		  </fieldset>
            <input type="hidden" id="csrf_token" name="<?= $this->security->get_csrf_token_name()?>" value="<?=$this->security->get_csrf_hash();?>"/>
		</form>
	</article>
