<?php
include_once './template/header.php';
?>
<div class="container-fluid">
    <div id="login-notification">
        <h2>Please log in.</h2>
    </div>
    <div id="notes">
        <div id="new-note" class="col-sm-4">
            <input type="text" class="form-control" placeholder="Add Note"/>
        </div>
        <div id="display-notes">

        </div>
    </div>
</div>
<script>
    makeActive(1);
    function showLoginNotification() {
        $('#login-notification').show();
        $('#notes').hide();
    }
    function showNotes() {
        $('#login-notification').hide();
        $('#notes').show();
    }
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

</script>
<style>
    body {
        padding-top: 70px;
    }
</style>
<?php
include_once './template/footer.php';
?>
