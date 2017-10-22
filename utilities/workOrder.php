<?php 
require_once 'header.php';
?>
<form method="post" id="imgupload" name="multiple_upload_form" id="multiple_upload_form" enctype="multipart/form-data" action="upload.php" runat="server">
    <a class="close" href="#">x</a>
    <label>Choose Image</label>
    <input type="file" name="images[]" id="images" multiple onchange="readURL(this);" >
</form>
<div class="images_preview">

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script>
<script type="text/javascript">
        function readURL(input) {
            // if (input.files && input.files[0]) {
            //     var reader = new FileReader();

            //     reader.onload = function (e) {
            //         $('#blah').attr('src', e.target.result);
            //     }

            //     reader.readAsDataURL(input.files[0]);
                ///
                $(this).next('.images_preview').empty();
                $.each(input.files, function(index, val) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        // $('#blah').attr('src', e.target.result);
                        $('.images_preview').append("<img class='thumbnail' src='" + e.target.result + "'>");

                    }

                reader.readAsDataURL(input.files[index]);
                });
            }
</script>