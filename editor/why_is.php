<!DOCTYPE html>
<html lang="sv">
<head>
	<meta charset="utf-8">
	<title>This'ma'boat</title>
	<style>
		.editor
		{
			width: 400px;
			height: 300px;
		}
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>
<body>
	
	<pre id="editor">'Thismine</pre>
	
	<div id="editor">
        function foo(items) {
            var x = "All this is syntax highlighted";
            return x;
        }
    </div>
	
	
	<script src="ace/src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
	<script src="ace/src-noconflict/ext-language_tools.js"></script>
	<script>
		var editor = ace.edit("editor");
		editor.setTheme("ace/theme/twilight");
		editor.session.setMode("ace/mode/javascript");
		//enable autocompletion and snippets
		editor.setOptions({
			enableBasicAutocompletion: true,
			enableSnippets: true,
			enableLiveAutocompletion: false
		});
	</script>
	<script src="ace/demo/show_own_source.js"></script>
</body>
</html>