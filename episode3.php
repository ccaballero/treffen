<?php

// AJAX CONTENT
function isAjax() {
    return isset($_GET['ajax']);
}

?>

<?php if (isAjax()) {
    header('Content-type: text/xml');
    
    switch ($_GET['ajax']) {
        case 1:
            echo <<<EOL
<document>
    <h1>Parte I</h1>
    <h2>cristhian me la pela en primera pagina</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut mollis semper neque et ultrices. Vestibulum vitae hendrerit odio. Vivamus tincidunt lectus urna, non venenatis quam. Fusce sagittis, odio eget vehicula lacinia, ligula elit accumsan nulla, nec ullamcorper turpis urna vel augue. Mauris convallis sem at nulla iaculis sit amet bibendum urna laoreet. Ut lacus sapien, tempor eu aliquet sagittis, porta vitae lacus. Cras at sapien quis nisl hendrerit ultrices vel non tortor. Vivamus aliquet aliquam sem, quis bibendum sem pulvinar eu.</p>
    <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed in tempor dui. Proin quam lacus, posuere quis mollis sed, pulvinar et nisl. Cras eleifend mollis nibh vel posuere. Cras mollis libero arcu, id consequat massa. Cras nec elit odio. Etiam adipiscing laoreet porttitor. Sed id volutpat metus.</p>
    <p>Cras pharetra sem ut tortor luctus vitae fermentum arcu sollicitudin. Integer a sapien sapien, vel porta odio. Suspendisse placerat consectetur porttitor. Duis consectetur commodo lorem, vel feugiat augue congue a. In convallis tristique pulvinar. Fusce porta accumsan purus a tincidunt. Sed a augue sit amet urna suscipit volutpat. Cras dignissim, sapien id convallis tristique, magna odio porta nisi, id pulvinar nunc augue eu purus. Sed at nisi diam, non semper nisl.</p>
</document>
EOL;
            break;
        case 2:
            echo <<<EOL
<document>
    <h1>Parte I</h1>
    <h2>cristhian me la pela en segunda pagina</h2>
    <p>Suspendisse sed libero dolor. Ut tempus mi at purus malesuada malesuada. Ut id eros elit. Nam molestie malesuada turpis, a condimentum lacus mattis sit amet. Duis eu lobortis ligula. Suspendisse fringilla, velit id posuere dapibus, lacus arcu commodo tellus, in interdum urna sapien nec diam. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent placerat tempor pellentesque. Pellentesque vitae congue arcu. Aenean eleifend lacinia rutrum.</p>
    <p>Praesent lectus ipsum, mattis non placerat in, pulvinar a magna. Maecenas blandit urna vitae dolor lacinia vel ultricies felis molestie. Donec aliquam, massa et interdum mattis, orci nibh placerat dolor, eu fermentum sem dui facilisis nulla. Maecenas gravida consequat eleifend. In hac habitasse platea dictumst. Aenean neque augue, porttitor dictum sollicitudin vel, elementum in risus. Duis feugiat, dui eu sagittis sagittis, arcu urna pellentesque risus, vitae suscipit tortor turpis nec neque. Morbi enim lectus, semper in ullamcorper non, scelerisque ac quam. Sed eu eros nec quam commodo aliquam in vitae ligula. Pellentesque convallis imperdiet odio, id lobortis lorem pellentesque ut. Sed ut pharetra nulla.</p>
    <p>Nulla eu nisl nulla. Phasellus enim odio, condimentum ut commodo ut, convallis vitae felis. In sodales ipsum diam, ac dapibus justo. Phasellus eu leo velit. Morbi at tincidunt diam. Donec quis elit est, vitae aliquet sem. Aliquam viverra feugiat orci nec tempor.</p>
    <p>Praesent posuere dignissim mattis. In semper elit et tellus accumsan convallis. Maecenas rhoncus augue at dui malesuada fermentum. Quisque tempor lacus quis erat tincidunt ullamcorper. Nullam posuere ullamcorper nunc, eu luctus sapien tincidunt tristique. Nunc a ultricies arcu. Nullam sed lectus nisl, vel accumsan orci. Vivamus in dolor et lectus pretium congue ut ac lectus. Nulla dui tortor, fringilla sit amet venenatis sit amet, consectetur vitae lacus. Pellentesque eu nibh dolor. Sed nibh libero, lacinia et condimentum at, ultricies vel massa. Nulla a nulla sit amet libero semper luctus. Aliquam semper hendrerit tristique. Suspendisse malesuada nunc et tellus blandit consectetur.</p>
    <p>Morbi nisl purus, fermentum eget auctor vel, rhoncus at odio. Nullam quis augue a metus luctus cursus. Sed mollis fermentum velit vel aliquet. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse suscipit nibh ac orci sodales fermentum. Integer purus lorem, aliquam at sodales at, imperdiet et massa. Quisque vitae enim lorem, quis tincidunt lacus. Maecenas ut augue turpis, non lacinia mi. Vestibulum congue scelerisque ante, quis porta justo pellentesque a. Duis eget massa lectus, nec placerat nibh. Ut at cursus nibh. Vestibulum sodales volutpat massa, id lobortis magna faucibus eu. Integer molestie diam et purus condimentum sit amet interdum mauris dapibus. Vestibulum leo purus, sollicitudin ut pretium at, molestie posuere risus. Mauris ullamcorper euismod ipsum, eget euismod eros porta ac. Proin sagittis rutrum mauris in pulvinar.</p>
    <p>Nullam consequat velit non nulla ornare nec suscipit ligula aliquet. Curabitur in nisi at ipsum dictum sollicitudin. Proin varius mauris non quam porttitor id ultricies arcu luctus. Aliquam vestibulum, urna ac laoreet condimentum, nibh turpis mattis turpis, quis mattis nulla nisl eget diam. In at orci et urna tincidunt malesuada eu id dolor. Curabitur semper nibh nec turpis cursus ultricies. Vivamus eget libero sit amet erat aliquam elementum. Phasellus velit elit, vulputate vel faucibus pharetra, adipiscing eu magna. Duis consequat quam id turpis adipiscing condimentum. Etiam a sagittis quam. Maecenas varius accumsan risus at consequat.</p>
</document>
EOL;
            break;
        case 3:
            echo <<<EOL
<document>
    <h1>Parte I</h1>
    <h2>cristhian me la pela en tercera pagina</h2>
    <p>Aliquam in nulla eu leo tincidunt dapibus et ut erat. Donec ac dolor augue. Quisque pellentesque, risus consequat blandit mattis, nunc ante venenatis eros, et fermentum dolor eros vel augue. Vivamus a vulputate purus. Nam rutrum eleifend justo vitae dictum. Integer tincidunt eleifend elit vel aliquam. Vestibulum orci magna, placerat vel luctus et, sodales vel ipsum. Curabitur tristique, diam ut sollicitudin varius, tellus tortor vehicula turpis, sit amet tincidunt quam ipsum nec felis.</p>
    <p>Suspendisse vel nisi quis quam faucibus aliquet ac sed dolor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc vel risus vitae ligula imperdiet tempor. Proin adipiscing sapien id elit consectetur tristique. Ut tristique, augue et feugiat iaculis, ipsum mi volutpat magna, ac pulvinar purus tellus ut dolor. Sed fringilla quam augue, id iaculis lorem. Aenean feugiat est quis nibh tincidunt non semper erat tincidunt. Suspendisse tincidunt, diam vitae mattis euismod, enim odio mollis enim, vitae semper arcu dui a justo.</p>
    <p>Sed laoreet posuere massa, eget faucibus sem pellentesque vitae. Sed vestibulum pharetra placerat. Donec placerat imperdiet semper. Nulla suscipit euismod orci ac interdum. Duis imperdiet tortor id lacus porttitor cursus. Aenean cursus tortor id felis consectetur consectetur venenatis magna laoreet. Cras nisi magna, convallis sit amet pharetra ut, ornare sed erat.</p>
    <p>Nulla tellus augue, volutpat at consequat at, consequat eget purus. In tempus mi porta turpis vehicula pharetra vestibulum mauris vehicula. Donec imperdiet purus ac erat congue consequat. Nunc purus risus, consequat nec bibendum ac, sodales sed mauris. Nullam a vulputate neque. Curabitur interdum velit eu dolor pulvinar eget ultricies velit pellentesque. Ut ac vestibulum nibh. Etiam facilisis enim nulla, in rutrum diam.</p>
    <p>Quisque posuere tincidunt nisi, vitae egestas arcu porttitor id. Nullam sodales lacinia malesuada. In hac habitasse platea dictumst. Suspendisse interdum augue in mi consequat vel faucibus risus elementum. Quisque semper tempus metus, ac tempus dui ornare sed. Mauris elementum, nisl id convallis molestie, nulla lacus fermentum turpis, at suscipit arcu dolor non nunc. Sed accumsan porttitor justo sed molestie. Integer porttitor, est eget scelerisque consequat, velit quam euismod dui, sollicitudin pharetra lorem nulla ac lectus. Praesent consectetur sagittis nibh semper rutrum. Cras a tortor velit, id venenatis arcu. Nulla ut nisi non massa elementum fringilla et in neque. Phasellus ac erat enim.</p>
    <p>In at massa purus, nec imperdiet erat. Morbi vitae tellus nec arcu fringilla lacinia. Donec vehicula dapibus risus, viverra auctor tortor cursus vel. Praesent pharetra nunc vitae quam auctor nec accumsan purus porttitor. Duis consequat leo vel nisl molestie auctor. Donec non ultrices nisl. Donec ac facilisis dui. Quisque turpis diam, condimentum at pretium et, interdum nec justo. Duis eget sapien fermentum lectus pellentesque facilisis eu nec elit. Morbi urna odio, mattis congue ullamcorper sed, posuere sed felis. Nulla leo eros, eleifend eu dignissim ac, sodales ut velit.</p>
</document>
EOL;
            break;
    }   
?>

<?php } else { ?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <style type="text/css">
            * {
                font-size: 11pt;
            }
            html, body, div, ul {
                margin: 0;
                padding: 0;
            }
            h1 {
                font-size: 22pt;
                margin: 4px;
                padding-left: 120px;
            }
            #menu {
                float: left;
                width: 110px;
                margin: 4px 0px 0px 5px;
            }
            #menu ul {
                list-style: none;
            }
            #menu ul li {
                background-color: #e6e6e6;
                margin: 3px 0px;
                padding: 4px;
            }
            #menu ul li a {
                color: #666666;
            }
            #menu ul li a:hover {
                color: #000000;
            }
            #container {
                background-color: #e6e6e6;
                position: absolute;
                top: 50px;
                bottom: 10px;
                left: 120px;
                right: 10px;
            }
        </style>
        <script type="text/javascript" src="/jquery-1.6.2.min.js"></script>
    </head>
    <body>
        <h1>AJAXXX</h1>
        <div>
            <div id="menu">
                <ul>
                    <li><a name="1" href="#">I</a></li>
                    <li><a name="2" href="#">II</a></li>
                    <li><a name="3" href="#">III</a></li>
                </ul>
            </div>
            <div id="container"></div>
            <script type="text/javascript">
                $(document).ready(function(){
                    $('a').click(function(){
                        var a=$(this).attr('name');
                        $.get('episode3.php', {ajax:a}, function(xml) {
                            $('#container').html($(xml).find('document').text());
                        });
                    });
                });
            </script>
<?php } ?>
