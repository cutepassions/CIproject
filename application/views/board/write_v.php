<script>
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
				alert('마감일을 입력해주세요.');
				$("#input04").focus();
				return false;
			}else if($("#input05").val() == ''){
				alert('기업종류를 입력해주세요.');
				$("#input05").focus();
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
		    <legend>게시물 쓰기</legend>

		    <div class="control-group">

		      <label class="control-label" for="input01">제목</label>
		      <div class="controls">
		        <input type="text" class="input-xlarge" id="input01" name="subject" >
		        <p class="help-block">제목을 입력해 주세요.</p>
		      </div>

		      <label class="control-label" for="input02">내용</label>
		      <div class="controls">
		        <textarea class="input-xlarge" id="input02" name="contents" cols="30" rows="2"></textarea>
		        <p class="help-block">내용을 입력해 주세요.</p>
		      </div>

				<label class="control-label" for="input03">시작일</label>
				<div class="controls">
					<input type="date" class="input-xlarge" id="input03" name="st_date" >
					<p class="help-block">시작일을 입력해 주세요. Ex)2021-09-05</p>
				</div>

				<label class="control-label" for="input04">마감일</label>
				<div class="controls">
					<input type="date" class="input-xlarge" id="input04" name="fn_date" >
					<p class="help-block">종료일을 입력해 주세요. Ex)2021-11-05</p>
				</div>

				<label class="control-label" for="input05">기업 종류</label>
				<select class="form-select form-select-sm" name="enterprise" id="input05">
					<option selected value="">---------선택해주세요---------</option>
					<option name="public" value="공기업">공기업</option>
					<option name="private" value="사기업">사기업</option>
				</select>
				<p class="help-block">기업을 선택해 주세요</p>

				<label class="control-label" for="input06">지원 현황</label>
				<div class="controls">
					<input type="checkbox" class="input-xlarge" id="input06" name="apply" value="지원">
					지원
				</div>


              <div class="form-actions" style="margin-top: 20px">
                <button type="submit" class="btn btn-primary" id="write_btn">작성</button>
                <button class="btn" type="button" onclick="document.location.reload()">취소</button>
				  <a href='<?php echo base_url('/CIproject/index.php/');?>' class="btn btn-primary">목록</a></th>
              </div>

		    </div>
		  </fieldset>
            <input type="hidden" id="csrf_token" name="<?= $this->security->get_csrf_token_name()?>" value="<?=$this->security->get_csrf_hash();?>"/>
		</form>
	</article>
