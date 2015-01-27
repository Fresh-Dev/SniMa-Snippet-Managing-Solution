<div class="modal fade" id="newmessage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
                    <form method="post" id="NewMsgForm" action="index.php?form=new-message">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">{$str_newMessage}</h4>
			</div>
			<div class="modal-body">                    
                            <fieldset>
                                <div class="form-group">
                                    <label>{$str_mailTarget}</label>
                                    <input type="text" name="msg_target" id="msg_target"  class="form-control" data-provide="typeahead" id="msg_target" placeholder="{$placeholder_msg_target}" onkeyup="$('#newMsgSubmitBtn').attr('disabled','true');">
                                    <input type="hidden" name="toUserId" id="toUserId">
                                </div>
                                <div class="form-group">
                                    <label>{$str_message}</label>
                                    <textarea class="form-control" id="msg_message" placeholder="{$placeholder_message}" name="message"></textarea>
                                </div>
                                
                            </fieldset>
			</div>
			<div class="modal-footer">
                            <button type="submit" class="btn btn-default" id="newMsgSubmitBtn" disabled>{$str_submit}</button>
                            <button type="button" class="modalCloseBtn btn btn-default" data-dismiss="modal">{$str_close}</button>
			</div>
                    </form>
		</div>
	</div>
    </div>