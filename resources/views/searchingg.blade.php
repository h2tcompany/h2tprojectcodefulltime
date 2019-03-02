<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('#btnSearch').on('click',function () {
            $.ajax({
                url: '/search/google',
                data: {
                    keyword: $('#keyword').val()
                },
                success: function (data) {
                    window.location.href = data;
                }
            });
        });
        $('#keyword').on('keyup',function (e) {
            if(e.keyCode === 13){
                $.ajax({
                    url: '/search/google',
                    data: {
                        keyword: $('#keyword').val()
                    },
                    success: function (data) {
                        window.location.href = data.data;
                    }
                });
            }
        })
    });
</script>
<div class="panel panel-primary">
    <div class="panel-heading">Search in google</div>
    <div class="panel-body">
        <input type="text" id="keyword" class="form-control" style="margin-bottom: 5px" placeholder="Type your keyword...">
        <input type="text" id="btnSearch" value="Search" class="btn btn-primary">
    </div>
</div>