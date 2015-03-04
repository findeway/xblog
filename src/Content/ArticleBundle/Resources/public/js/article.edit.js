 //change upload plugin params;
  $.fn.fileinput.defaults.showUpload = false;

  function toggleEdit(){
      if(!window.enableEditor){
    	  $("#form_content").hide();
    	  $(".code-insertor").hide();
    	  $("#contentPreview").html($("#form_content").val());
    	  $("#contentPreview").show();
    	  $("#btnEditorControl").addClass('glyphicon-pencil');
    	  $("#btnEditorControl").removeClass('glyphicon-floppy-disk');
      }else{
    	  $("#contentPreview").hide();
          $(".code-insertor").show();
    	  $("#form_content").show();
    	  $("#form_content").val($("#contentPreview").html());
    	  $("#btnEditorControl").removeClass('glyphicon-pencil');
    	  $("#btnEditorControl").addClass('glyphicon-floppy-disk');
      }
      window.enableEditor = !window.enableEditor;
  }
 
  function onInsertCode(){
	  var codeType = $("#language-name option:selected").val();
      var content = $('#form_content').val();
      var codeTemplate='<pre class="line-numbers '+codeType+'">\n<code class="'+codeType+'">\n'+$("#code-content").val()+'\n</code>\n</pre>';
	  $("#form_content").val(content+'\n'+codeTemplate);
  }
  $(document).ready(function(){
	  $('#formImageUpload').submit(function(event) {
    	    var $form = $(this);
            $.ajax({
                type: $form.attr('method'),
                url: $form.attr('action'),
                data: new FormData(this),
                mimeType:"multipart/form-data",
                contentType: false,
                processData:false,
                success: function(data) {
                	var content = $('#form_content').val();
                    var imageTemplate='<img class="img-responsive" src="'+data+'">'
                	$("#form_content").val(content+'\n'+imageTemplate);
                }
            });
            $("#modalImage").modal('hide');
            event.preventDefault();
      });
      window.enableEditor = false;
      //disable content editor
      toggleEdit();
 });
     