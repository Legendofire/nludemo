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
        <style>
            .loader {
                border: 16px solid #f3f3f3; /* Light grey */
                border-top: 16px solid #3498db; /* Blue */
                border-radius: 50%;
                width: 120px;
                height: 120px;
                animation: spin 2s linear infinite;
            }

            @keyframes spin {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(360deg); }
            }
        </style>
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

            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Concepts</a></li>
                <li><a data-toggle="tab" href="#menu1">Categories</a></li>
                <li><a data-toggle="tab" href="#menu2">Emotions</a></li>
                <li><a data-toggle="tab" href="#menu3">Entities</a></li>
                <li><a data-toggle="tab" href="#menu4">Keywords</a></li>
                <li><a data-toggle="tab" href="#menu5">Metadata</a></li>
                <li><a data-toggle="tab" href="#menu6">Relations</a></li>
                <li><a data-toggle="tab" href="#menu7">Semantic Roles</a></li>
                <li><a data-toggle="tab" href="#menu8">Sentiment</a></li>
                <li><a data-toggle="tab" href="#menu9">Examples</a></li>
            </ul>

            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                    <h3>Concepts</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                <th>Key Word</th>
                                <th>Relevance</th>
                                <th>DBpedia Resource</th>
                                </thead>
                                <tbody id="body_conc" class="table_body">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div id="menu1" class="tab-pane fade">
                    <h3>Categories</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                <th>Key Word</th>
                                <th>Relevance</th>
                                </thead>
                                <tbody id="body_cat" class="table_body">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div id="menu2" class="tab-pane fade">
                    <h3>Emotions</h3>
                    <div class="row">
                        <div class="col-md-12" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto" id="container">

                        </div>
                    </div>
                </div>

                <div id="menu3" class="tab-pane fade">
                    <h3>Entities</h3>
                    <div class="row">
                        <table class="table">
                            <thead>
                            <th>Text</th>
                            <th>Type</th>
                            <th>Relevance</th>
                            <th>Count</th>
                            <th>Disambiguation</th>
                            </thead>
                            <tbody id="body_ent" class="table_body">

                            </tbody>
                        </table>
                    </div>
                </div>

                <div id="menu4" class="tab-pane fade">
                    <h3>Keywords</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                <th>Key Word</th>
                                <th>Relevance</th>
                                </thead>
                                <tbody id="body_key" class="table_body">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div id="menu5" class="tab-pane fade">
                    <h3>Metadata</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Title: </h4>
                            <span id="meta_title"></span>
                        </div>
                        <div class="col-md-6">
                            <h4>Publication Date: </h4>
                            <span id="meta_date"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#feeds">Feeds</a></li>
                                <li><a data-toggle="tab" href="#authors">Authors</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="feeds" class="tab-pane fade in active">
                                    <div class="col-md-12">
                                        <table class="table">
                                            <thead>
                                            <th>Feed URL</th>
                                            <th>Confident?</th>
                                            </thead>
                                            <tbody id="body_meta_feed" class="table_body">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div id="authors" class="tab-pane fade">
                                    <div class="col-md-12">
                                        <table class="table">
                                            <thead>
                                            <th>Name</th>
                                            </thead>
                                            <tbody id="body_meta_auth" class="table_body">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="menu6" class="tab-pane fade">
                    <h3>Relations</h3>
                    <div class="row">
                        <table class="table">
                            <thead>
                            <th>Text</th>
                            <th>Relation</th>
                            <th>Score</th>
                            </thead>
                            <tbody id="body_rel" class="table_body">

                            </tbody>
                        </table>
                    </div>
                </div>

                <div id="menu7" class="tab-pane fade">
                    <h3>Semantic Roles</h3>
                    <div class="row">
                        <table class="table">
                            <thead>
                            <th>Subject</th>
                            <th>Verb</th>
                            <th>Object</th>
                            </thead>
                            <tbody id="body_sem" class="table_body">

                            </tbody>
                        </table>
                    </div>
                </div>

                <div id="menu8" class="tab-pane fade">
                    <h3>Sentiment</h3>
                    <div class="row">
                        <div class="col-md-6" style="display:none" id="happy">
                            <img src="<?php base_url() ?>Assets/happy_smile.png" class="img-responsive" alt="Cinque Terre">
                        </div>
                        <div class="col-md-6" style="display:none" id="sad">
                            <img src="<?php base_url() ?>Assets/sad_smile.jpeg" class="img-responsive" alt="Cinque Terre">
                        </div>
                        <div class="col-md-6">
                            <p style="text-align: center">
                                <span style="font-size: xx-large;">Sentiment Score:</span><br>
                                <span style="font-size: xx-large;" id="sentiment_value"></span>
                            </p>
                        </div>
                    </div>
                </div>

                <div id="menu9" class="tab-pane fade">
                    <h3>Examples</h3>
                    <div class="row">
                        <table class="table">
                            <thead>
                            <th>Name</th>
                            <th>Link</th>
                            <th>Copy</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Tokens of Love in Paris</td>
                                    <td><a id="ex_1" href="http://paidpost.nytimes.com/chaumet/tokens-of-love.html?tbs_nyt=2017-march-nytnative_ribbon&cpv_dsm_id=1064918">http://paidpost.nytimes.com/chaumet/tokens-of-love.html?tbs_nyt=2017-march-nytnative_ribbon&cpv_dsm_id=1064918</a></td>
                                    <td><button id="button1" class="btn btn-info ex_btn" data-id="ex_1">Use Example</button></td>
                                </tr>
                                <tr>
                                    <td>New York Today: A Holocaust Survivor’s Story, on Stage</td>
                                    <td><a id="ex_2" href="https://www.nytimes.com/2017/04/18/nyregion/new-york-today-a-holocaust-survivors-story-on-stage.html">https://www.nytimes.com/2017/04/18/nyregion/new-york-today-a-holocaust-survivors-story-on-stage.html</a></td>
                                    <td><button id="button1" class="btn btn-info ex_btn" data-id="ex_2">Use Example</button></td>
                                </tr>
                                <tr>
                                    <td>Huffington Post Funny articles</td>
                                    <td><a id="ex_7" href="http://www.huffingtonpost.com/news/funny-articles/">http://www.huffingtonpost.com/news/funny-articles/</a></td>
                                    <td><button id="button1" class="btn btn-info ex_btn" data-id="ex_7">Use Example</button></td>
                                </tr>
                                <tr>
                                    <td>Raye7 Website</td>
                                    <td><a id="ex_8" href="www.raye7.com">www.raye7.com</a></td>
                                    <td><button id="button1" class="btn btn-info ex_btn" data-id="ex_8">Use Example</button></td>
                                </tr>
                                <tr>
                                    <td>Overlimits Website</td>
                                    <td><a id="ex_9" href="www.overlimits.ae">www.overlimits.ae</a></td>
                                    <td><button id="button1" class="btn btn-info ex_btn" data-id="ex_9">Use Example</button></td>
                                </tr>
                                <tr>
                                    <td>Unidots Website</td>
                                    <td><a id="ex_10" href="www.unidots.com.eg">www.unidots.com.eg</a></td>
                                    <td><button id="button1" class="btn btn-info ex_btn" data-id="ex_10">Use Example</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>

        <div id="spinner" class="modal fade" tabindex="-1" role="dialog" aria-hidden="spinner">
            <div class="modal-dialog" role="document">
                <div class="loader text-center col-md-12 col-md-offset-4"></div>
            </div>
        </div>

        <div id="disambiguation_modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="modal_add">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title" id="modal_add"><i style="color:#3c8dbc;padding-right:5px"class="fa fa-pencil"></i>Other Types Associated With <span id="dis_text"></span></h3>
                    </div>
                    <div class="modal-body">
                        <ul style="-webkit-column-count: 3; -moz-column-count: 3; column-count: 3; list-style: none;" id="dis_subtype">

                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </body>
    <script>
        var data = [];
        $("#check_this").on('click', function () {
            jQuery.ajax({
                type: "POST",
                //url: "https://nludemo.mybluemix.net/index.php/Welcome/process",
                url: "<?php echo base_url() ?>/index.php/Welcome/process",
                dataType: "json",
                data: {
                    text: $("#input").val()
                },
                beforeSend: function () {
                    $('#spinner').modal('show');
                },
                success: function (html) {
                    data = html;
                    fill_table();
                    fill_piechart();
                    fill_sentiment();
                    fill_metadata();
                    fill_relations();
                    fill_semantic_roles()
                },
                complete: function () {
                    $('#spinner').modal('hide');
                }
            });

        });

        function fill_table() {
            $(".table_body").html("");

            for (var i = 0; i < data.concepts.length; i++) {
                var row = '<tr><td>' + data.concepts[i].text + '</td><td>' + data.concepts[i].relevance + '</td><td><a href="' + data.concepts[i].dbpedia_resource + '">' + data.concepts[i].dbpedia_resource + '</a></td></tr>'
                $("#body_conc").append(row);
            }

            for (var i = 0; i < data.categories.length; i++) {
                var row = '<tr><td>' + data.categories[i].label + '</td><td>' + data.categories[i].score + '</td></tr>'
                $("#body_cat").append(row);
            }

            for (var i = 0; i < data.keywords.length; i++) {
                var row = '<tr><td>' + data.keywords[i].text + '</td><td>' + data.keywords[i].relevance + '</td></tr>'
                $("#body_key").append(row);
            }

            var meta = data.metadata;
            for (var i = 0; i < meta.feeds.length; i++) {
                var row = '<tr><td><a href="' + meta.feeds[i].feed + '">' + meta.feeds[i].feed + '</a></td><td>' + meta.feeds[i].confident + '</td></tr>'
                $("#body_meta_feed").append(row);
            }

            for (var i = 0; i < meta.authors.length; i++) {
                var row = '<tr><td>' + meta.authors[i].name + '</td></tr>'
                $("#body_meta_auth").append(row);
            }

            var entities = data.entities;
            for (var i = 0; i < entities.length; i++) {
                var row = '<tr><td>' + entities[i].text + '</td><td>' + entities[i].type + '</td><td>' + entities[i].relevance + '</td><td>' + entities[i].count + '</td><td><button type="button" class="btn btn-info dism_button" data-id="' + i + '"">View Disambiguations</button></td></tr>'
                $("#body_ent").append(row);
            }
            $('.dism_button').on('click', function () {
                view_disambiguation($(this).data('id'));
            });
        }

        function fill_piechart() {
            var emotions = data.emotion.document.emotion;
            Highcharts.chart('container', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                            style: {
                                color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                            }
                        }
                    }
                },
                series: [{
                        name: 'Percentage',
                        colorByPoint: true,
                        data: [{
                                name: 'Sadness',
                                y: emotions.sadness
                            }, {
                                name: 'Joy',
                                y: emotions.joy,
                                selected: true
                            }, {
                                name: 'Fear',
                                y: emotions.fear
                            }, {
                                name: 'Disgust',
                                y: emotions.disgust
                            }, {
                                name: 'Anger',
                                y: emotions.anger
                            }]
                    }]
            });
        }

        function fill_sentiment() {
            var sentiment = data.sentiment.document;
            if (sentiment.label === 'positive') {
                $("#happy").show();
                $("#sad").hide();
            } else {
                $("#sad").show();
                $("#happy").hide();
            }
            $("#sentiment_value").html(sentiment.score);
        }

        function fill_metadata() {
            var meta = data.metadata;
            $("#meta_title").html(meta.title);
            $("#meta_date").html(meta.publication_date);
        }

        function view_disambiguation(index) {
            var disambiguation = data.entities[index].disambiguation;
            $("#dis_text").html(disambiguation.name);
            $("#dis_subtype").html('');
            for (var i = 0; i < disambiguation.subtype.length; i++) {
                $("#dis_subtype").append('<li>' + disambiguation.subtype[i] + '</li>');
            }
            $("#disambiguation_modal").modal('show');
        }

        function fill_relations() {
            var relations = data.relations;
            for (var i = 0; i < relations.length; i++) {
                var arguments = relations[i].arguments;
                var relation = "<a href='#' data-toggle='tooltip' title='" + arguments[0].entities[0].type + "'>" + arguments[0].text + "</a> " + relations[i].type + " " + "<a href='#' data-toggle='tooltip' title='" + arguments[1].entities[0].type + "'>" + arguments[1].text + "</a>";
                var row = '<tr><td>' + relations[i].sentence + '</td><td>' + relation + '</td><td>' + relations[i].score + '</td></tr>'
                $("#body_rel").append(row);
            }
        }

        function fill_semantic_roles() {
            var semantics = data.semantic_roles;
            for (var i = 0; i < semantics.length; i++) {
                try {
                    var row = '<tr><td>' + semantics[i].subject.text + '</td><td>' + "<a href='#' data-toggle='tooltip' title='" + semantics[i].action.verb.text + " in " + semantics[i].action.verb.tense + " tense'>" + semantics[i].action.text + "</a>" + '</td><td>' + semantics[i].object.text + '</td></tr>'
                    $("#body_sem").append(row);
                } catch (err) {
                }
            }
        }

        $('[data-toggle="tooltip"]').tooltip();

        $('.ex_btn').on('click', function () {
            $('#input').val($('#'+$(this).data('id')).html());
        });
    </script>
</html>