$(document).ready(function () {
    $('#clientName').typeahead({
        source: function (query, result) {
            console.log(query);
            $.ajax({
                url: "ajax.php",
                data: 'query=' + query,            
                dataType: "json",
                type: "POST",
                success: function (data) {
                    //  console.log(data);
                    result($.map(data, function (item) {
                        //alert(item);
                        return item;
                    
                    }));
                }
            });
        }
    });
});


$(document).ready(function(){
    $('#clientName').change(function(){
        var customer_id= $(this).val();
        // alert(customer_id);
        $.ajax({
            url:"ajax2.php",
            method:"post",
            data:{customer_id:customer_id},
            success:function(data){  
                 console.log(data);
                 $('#clientContact').val(data); 
                  
            }  
        })
    })
})

// $.fn.dataTable.ext.errMode = 'throw';


$(document).ready(function () {
    $('#productName1').typeahead({
        source: function (query1, result1) {
            console.log(query1);
            $.ajax({
                url: "php_action/ajax3.php",
                data: 'query1=' + query1,            
                dataType: "json",
                type: "POST",
                success: function (data) {
                      console.log(data);
                    result1($.map(data, function (item1) {
                        alert(item1);
                        return item1;
                    
                    }));
                }
            });
        }
    });
});

// $(document).ready(function(){
//     $("#productName1").keyup(function(){
//         $.ajax({
//         type: "POST",
//         url: "php_action/ajax3.php",
//         data:'keyword='+$(this).val(),
//         // beforeSend: function(){
//         //     $("#productName1").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
//         // },
//         success: function(data){
//             $("#suggesstion-box").show();
//             $("#suggesstion-box").html(data);
//             $("#productName1").css("background","#FFF");
//         }
//         });
//     });
// });
// //To select country name
// function selectCountry(val) {
// $("#productName1").val(val);
// $("#suggesstion-box").hide();
// }