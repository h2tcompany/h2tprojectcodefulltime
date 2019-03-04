<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('#btnSearchGG').on('click', function () {
            if ($('#keyword').val() === '') {
                alert('Required fill the input')
            } else {
                $.ajax({
                    url: '/search/google',
                    data: {
                        keyword: $('#keyword').val()
                    },
                    success: function (data) {
                        window.location.href = data;
                    }
                });
            }
        });
        $('#keyword').on('keyup', function (e) {
            if (e.keyCode === 13) {
                if ($('#keyword').val() === '') {
                    alert('Required fill the input')
                } else {

                    $.ajax({
                        url: '/search/google',
                        data: {
                            keyword: $('#keyword').val()
                        },
                        success: function (data) {
                            window.location.href = data;
                        }
                    });
                }
            }
        });
    });
</script>
<div class="panel panel-primary">
    <div class="panel-heading">Search in google</div>
    <div class="panel-body">
        <input type="text" id="keyword" class="form-control" style="margin-bottom: 5px"
               placeholder="Type your keyword...">
        <button id="btnSearchGG" class="btn btn-primary">Search</button>
    </div>
</div>
