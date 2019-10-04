<?php 
require_once 'php_action/db_connect.php'; 
require_once 'includes/header.php'; 
?>


<div class="form-group">

<input type="text" class="form-control" name="productName1" id="productName1"  >
    
</div>





<script>
$(document).ready(function () {
    $('#productName1').typeahead({
        source: function (query, result) {
            console.log(query);
            $.ajax({
                url: "php_action/ajax3.php",
                data: 'query=' + query,            
                dataType: "json",
                type: "POST",
                success: function (data) {
                      console.log(data);
                    result($.map(data, function (item1) {
                        alert(item1);
                        return item1;
                    
                    }));
                }
            });
        }
    });
});
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/javascript-canvas-to-blob/3.15.0/js/canvas-to-blob.min.js"></script>
<!-- <script src="custom/js/order.js"></script> -->
<script src="custom/js/typeahead.js"></script>
<script src="custom/js/typeahead.min.js"></script>
<?php require_once 'includes/footer.php'; ?>