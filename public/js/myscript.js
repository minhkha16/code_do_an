$(document).ready(function() {
    $("#addmore").click(function() {
        $("#addimg").append(`
            <label>Hình ảnh</label>
            <input type="file" class="form-control" name="src[]">
       `);
    })
})