<?php
include_once './template/header.php';
?>
<div class="container-fluid">
    <div id="login-notification">
        <h2>Please log in.</h2>
    </div>
    <div id="notes">
        <div id="new-note" class="col-sm-offset-4 col-sm-4">
            <div id="output" class="alert alert-success" role="alert"></div>
            <input type="text" class="form-control" placeholder="Title">
            <textarea class="form-control" rows="1" placeholder="Add note"></textarea>
            <button class="btn btn-primary">Add</button>
            <button class="btn btn-default">Cancel</button>
        </div>
        <div id="display-notes" class="col-sm-offset-2 col-sm-9">
            <h2><p class="text-info">All notes of <b><?php echo $_SESSION['name']; ?></b></p></h2>
            <div class="col-sm-4" id="div1">

            </div>
            <div class="col-sm-4" id="div2">

            </div>
            <div class="col-sm-4" id="div3">

            </div>
        </div>
    </div>
    <script>
        makeActive(1);
        $(function () {
            <?php
                if(!empty($_SESSION['name'])){
            ?>
            showNotes();
            <?php
                }else{
            ?>
            showLoginNotification();
            <?php
                }
            ?>
        });
        var list = $('#grid');
        var title = $('#new-note input');
        var output = $('#output');
        output.hide();
        title.hide();
        var addnote_btn = $('#new-note button').first().hide();
        var cancelnote_btn = $('#new-note button').last().hide();
        var content = $('#new-note textarea');
        showAllNotes();
        content.on('click', function (event) {
            event.stopPropagation();
            showNewNote();
        });
        title.on('click', function (event) {
            event.stopPropagation();
        });
        cancelnote_btn.on('click', function () {
            clearNewNote();
        });
        addnote_btn.on('click', function () {
            addNote(title.val(), content.val());
        });
        $(document.body).on('click', function () {
            clearNewNote();
        });
        function showNote(note, index) {
            //console.log(index+"|"+note.title);
            var newrow = '<div class="panel panel-primary"><div class="panel-heading"><h3 class="panel-title">' + note.title + '</h3></div><div class="panel-body">' + note.content + '</div><div class="panel-footer">' + note.created_at + '</div></div>';
            var id = "#div" + (index + 1);
            $(id).append(newrow);
            //console.log(id+"|"+note.title);
        }
        function showAllNotes() {
            removeList();
            $.post('./core/api/shownotes.php', function (data) {
                var json_obj = $.parseJSON(data);
                for (var j in json_obj) {
                    var i = json_obj.length - j - 1;
                    showNote(json_obj[i], j%3);
                }
            });
        }
        function removeList() {
            $('.panel').remove();
        }
        function addNote(t, c) {
            var request = $.ajax({
                type: 'POST',
                data: {title: title.val(), content: content.val()},
                url: './core/api/addnote.php'
            });
            request.done(function () {
                output.text('Well Done! You successfully add a note.');
                clearNewNote();
                output.show();
                showAllNotes();
            });
        }
        function showNewNote() {
            content.attr('rows', 3);
            title.show();
            addnote_btn.show();
            cancelnote_btn.show();
            output.hide();
        }
        function clearNewNote() {
            content.attr('rows', 1);
            content.val('');
            title.val('');
            title.hide();
            output.hide();
            addnote_btn.hide();
            cancelnote_btn.hide();
        }
        function showLoginNotification() {
            $('#login-notification').show();
            $('#notes').hide();
        }
        function showNotes() {
            $('#login-notification').hide();
            $('#notes').show();
            $('#display-notes').show();
        }
    </script>
    <style>
        body {
            padding-top: 70px;
        }

        textarea {
            resize: none;
        }

        #grid li {

        }
    </style>
    <?php
    include_once './template/footer.php';
    ?>
