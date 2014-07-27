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
        <div id="display-notes" class="col-sm-offset-2 col-sm-8">
            <h2><p class="text-info">All notes of <b><?php echo $_SESSION['name']; ?></b></p></h2>
            <ul id="note-list">
            </ul>
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
    var list = $('#note-list');
    var title = $('#new-note input');
    var output = $('#output');
    var description = $('#note-list-descriptions');
    output.hide();
    title.hide();
    var addnote_btn = $('#new-note button').first().hide();
    var cancelnote_btn = $('#new-note button').last().hide();
    var content = $('#new-note textarea');
    showAllNotes();
    content.on('focus', function () {
        showNewNote();
    });
    cancelnote_btn.on('click', function () {
        clearNewNote();
    });
    addnote_btn.on('click', function () {
        addNote(title.val(), content.val());
    });
    function showAllNotes() {
        removeList();
        $.post('./core/api/shownotes.php', function (data) {
            var json_obj = $.parseJSON(data);
            for (var j in json_obj) {
                var i = json_obj.length - j - 1;
                var lt = json_obj[i].title;
                var ln = json_obj[i].name;
                var lc = json_obj[i].content;
                var lca = json_obj[i].created_at;
                var li = json_obj[i].id;
                list.append($('<li>').text(lt));
            }
        });
    }
    function removeList() {
        list.find('li').remove();
    }
    function addNote(t, c) {
        var request = $.ajax({
            type: 'POST',
            data: {content: content.val(), title: title.val()},
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
</style>
<?php
include_once './template/footer.php';
?>
