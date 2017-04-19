<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Natural Language Understanding Demo</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Natural Language Understanding Demo</h1>
                    <p class="lead">Extracting Keywords from text or a URL</p>

                    <textarea id="input" class="col-md-12" style="font-size: x-large;"></textarea>
                    
                    <button id="check_this" class="btn btn-lg btn-info col-md-12">Analyze</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                        <th>Key Word</th>
                        <th>Relevance</th>
                        <th>Bluemix Link</th>
                        </thead>
                        <tbody id="table_body">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
    <script>
        $("#check_this").on('click',function(){
            
            jQuery.ajax({
                type: "POST",
                url: "<?php echo base_url()?>index.php/Welcome/process",
                dataType: "json",
                data: {
                    text: $("#input").val()
                },
                success: function (html) {
                    fill_table(html);
                }
            });
            
        }); 
        
        function fill_table(data){
            $("#table_body").html("");
            for(var i=0;i<data.keywords.length;i++){
                var row = '<tr><td>'+data.keywords[i].text+'</td><td>'+data.keywords[i].relevance+'</td><td><a href="'+data.keywords[i].link+'">'+data.keywords[i].link+'</a></td></tr>'
                $("#table_body").append(row);
            }
        }
    </script>
</html>