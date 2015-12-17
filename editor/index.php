<!DOCTYPE html>
<html lang="en">
<head>
<title>ACE in Action</title>
<style type="text/css" media="screen">
    #editor { 
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
    }
</style>
</head>
<body>

<div id="editor">&lt;html lang="sv">
&lt;meta charset="utf-8">
</div>
    
<script src="ace/src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
<script src="ace/src-noconflict/ext-language_tools.js"></script>
<script>
    var editor = ace.edit("editor");
    editor.setTheme("ace/theme/clouds_midnight");
    editor.getSession().setMode("ace/mode/html");
	 // enable autocompletion and snippets
    editor.setOptions({
		enableBasicAutocompletion: true,
		enableSnippets: true,
		enableLiveAutocompletion: false,
		showPrintMargin: false
    });
	
	editor.getSession().on('change', function(e) {
		console.log(editor.getValue());
	});
</script>
</body>
</html>