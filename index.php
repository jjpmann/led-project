<!DOCTYPE html>
<html>
<head>
    <title>Color Table</title>

    <style>
        .video img { width: 300px; height: 300px; }
        #colorchart{border:0;padding:0;border-collapse:collapse; width: 100%; height: 100%;}
        #colorchart .block{width:50px;height:30px;}
        .content {
            counter-reset: my-counter;
            max-width: 1300px;
            margin: 40px auto;
            z-index: 1;
            position: relative;

        }
        .colors {
            display: none;
        }
        .colors > .block {
            display: block;
            height: 50px;
            width: 3.84%;
            margin: 1px;
            float: left;
            position: relative;
            z-index: 1;
        }
        .colors > .block:hover {
            z-index: 3;
        }
        .colors > .block:hover .inner {
            width: 100px;
            height: 100px;
            position: relative;
            top: -25px;
            left: -25px;
            z-index: 5;
            border: 1px solid black;
            background-color: inherit;
        }
       /* .colors .block:before {
            content: counter(my-counter);
            counter-increment: my-counter;
        }*/

        /* 4 column colouring */
        .colors > .block:nth-child(25n+1) {
            clear: both;
        }
    
        @media (min-width:621px) and (max-width: 1299px) {
            .content {
                max-width: 900px;
                min-width: 620px;
            }
            .colors > .block {

                /*width: 45px;*/
                height: 55px;
                width: 7.4%;
            }
            .colors .block:nth-child(25n+1),
            .colors .block:nth-child(25n+3),
            .colors .block:nth-child(25n+5),
            .colors .block:nth-child(25n+7),
            .colors .block:nth-child(25n+9),
            .colors .block:nth-child(25n+11),
            .colors .block:nth-child(25n+13),
            .colors .block:nth-child(25n+15),
            .colors .block:nth-child(25n+17),
            .colors .block:nth-child(25n+19),
            .colors .block:nth-child(25n+21),
            .colors .block:nth-child(25n+23) {
                font-weight: bold;
                color: yellow;
                /*background: black !important;*/
                display: none;
            }
            .colors .block:nth-child(25n+2) {
                clear: both;
            }
        }
        @media (min-width:621px) and (max-width: 700px) {
            .colors > .block {
                width: 7.3%;
            }
        }

        @media (max-width:620px) {
            /*body { background: red ;}*/
            .content {
                width: 320px;
            }
            .colors .block {
                width: 45px;
                height: 45px;

            }
            .colors .block:nth-child(25n+2),
            .colors .block:nth-child(25n+3),
            .colors .block:nth-child(25n+4),
            .colors .block:nth-child(25n+5),
            .colors .block:nth-child(25n+7),
            .colors .block:nth-child(25n+8),
            .colors .block:nth-child(25n+9),
            .colors .block:nth-child(25n+10),
            .colors .block:nth-child(25n+11),
            .colors .block:nth-child(25n+13),
            .colors .block:nth-child(25n+14),
            .colors .block:nth-child(25n+15),
            .colors .block:nth-child(25n+16),
            .colors .block:nth-child(25n+17),
            .colors .block:nth-child(25n+19),
            .colors .block:nth-child(25n+20),
            .colors .block:nth-child(25n+21),
            .colors .block:nth-child(25n+22),
            .colors .block:nth-child(25n+23) {
                font-weight: bold;
                color: yellow;
                /*background: black !important;*/
                display: none;
            }
            .colors .block:nth-child(25n+3) {
                /*clear: both;*/
            }
        }

        
    </style>
</head>
<body>

    <div class="content">
        <div class="video">
            <video width="320" height="240" src="http://admin:pw4Admin@192.168.1.81/mjpeg.cgi">
                Your browser does not support the video tag.
            </video>
            <?php /*<img src="http://admin:pw4Admin@192.168.1.81/mjpeg.cgi"> */ ?>
        </div>
        <div class="controls">
            <button class="toggleOn">On</button>
            <button class='toggleOff'>Off</button>
            <button class="status">Status</button>
        </div>
        <div class="status"></div>
        <div class="colors"></div>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script>



        $(document).ready(function() {
            // Stuff to do as soon as the DOM is ready;
            COLORS = {
                
                url: '/api.php?',
                colorsArray: ['#F8E0E0', '#F8E6E0', '#F8ECE0', '#F7F2E0', '#F7F8E0', '#F1F8E0', '#ECF8E0', '#E6F8E0', '#E0F8E0', '#E0F8E6', '#E0F8EC', '#E0F8F1', '#E0F8F7', '#E0F2F7', '#E0ECF8', '#E0E6F8', '#E0E0F8', '#E6E0F8', '#ECE0F8', '#F2E0F7', '#F8E0F7', '#F8E0F1', '#F8E0EC', '#F8E0E6', '#FAFAFA', '#F6CECE', '#F6D8CE', '#F6E3CE', '#F5ECCE', '#F5F6CE', '#ECF6CE', '#E3F6CE', '#D8F6CE', '#CEF6CE', '#CEF6D8', '#CEF6E3', '#CEF6EC', '#CEF6F5', '#CEECF5', '#CEE3F6', '#CED8F6', '#CECEF6', '#D8CEF6', '#E3CEF6', '#ECCEF5', '#F6CEF5', '#F6CEEC', '#F6CEE3', '#F6CED8', '#F2F2F2', '#F5A9A9', '#F5BCA9', '#F5D0A9', '#F3E2A9', '#F2F5A9', '#E1F5A9', '#D0F5A9', '#BCF5A9', '#A9F5A9', '#A9F5BC', '#A9F5D0', '#A9F5E1', '#A9F5F2', '#A9E2F3', '#A9D0F5', '#A9BCF5', '#A9A9F5', '#BCA9F5', '#D0A9F5', '#E2A9F3', '#F5A9F2', '#F5A9E1', '#F5A9D0', '#F5A9BC', '#E6E6E6', '#F78181', '#F79F81', '#F7BE81', '#F5DA81', '#F3F781', '#D8F781', '#BEF781', '#9FF781', '#81F781', '#81F79F', '#81F7BE', '#81F7D8', '#81F7F3', '#81DAF5', '#81BEF7', '#819FF7', '#8181F7', '#9F81F7', '#BE81F7', '#DA81F5', '#F781F3', '#F781D8', '#F781BE', '#F7819F', '#D8D8D8', '#FA5858', '#FA8258', '#FAAC58', '#F7D358', '#F4FA58', '#D0FA58', '#ACFA58', '#82FA58', '#58FA58', '#58FA82', '#58FAAC', '#58FAD0', '#58FAF4', '#58D3F7', '#58ACFA', '#5882FA', '#5858FA', '#8258FA', '#AC58FA', '#D358F7', '#FA58F4', '#FA58D0', '#FA58AC', '#FA5882', '#BDBDBD', '#FE2E2E', '#FE642E', '#FE9A2E', '#FACC2E', '#F7FE2E', '#C8FE2E', '#9AFE2E', '#64FE2E', '#2EFE2E', '#2EFE64', '#2EFE9A', '#2EFEC8', '#2EFEF7', '#2ECCFA', '#2E9AFE', '#2E64FE', '#2E2EFE', '#642EFE', '#9A2EFE', '#CC2EFA', '#FE2EF7', '#FE2EC8', '#FE2E9A', '#FE2E64', '#A4A4A4', '#FF0000', '#FF4000', '#FF8000', '#FFBF00', '#FFFF00', '#BFFF00', '#80FF00', '#40FF00', '#00FF00', '#00FF40', '#00FF80', '#00FFBF', '#00FFFF', '#00BFFF', '#0080FF', '#0040FF', '#0000FF', '#4000FF', '#8000FF', '#BF00FF', '#FF00FF', '#FF00BF', '#FF0080', '#FF0040', '#848484', '#DF0101', '#DF3A01', '#DF7401', '#DBA901', '#D7DF01', '#A5DF00', '#74DF00', '#3ADF00', '#01DF01', '#01DF3A', '#01DF74', '#01DFA5', '#01DFD7', '#01A9DB', '#0174DF', '#013ADF', '#0101DF', '#3A01DF', '#7401DF', '#A901DB', '#DF01D7', '#DF01A5', '#DF0174', '#DF013A', '#6E6E6E', '#B40404', '#B43104', '#B45F04', '#B18904', '#AEB404', '#86B404', '#5FB404', '#31B404', '#04B404', '#04B431', '#04B45F', '#04B486', '#04B4AE', '#0489B1', '#045FB4', '#0431B4', '#0404B4', '#3104B4', '#5F04B4', '#8904B1', '#B404AE', '#B40486', '#B4045F', '#B40431', '#585858', '#8A0808', '#8A2908', '#8A4B08', '#886A08', '#868A08', '#688A08', '#4B8A08', '#298A08', '#088A08', '#088A29', '#088A4B', '#088A68', '#088A85', '#086A87', '#084B8A', '#08298A', '#08088A', '#29088A', '#4B088A', '#6A0888', '#8A0886', '#8A0868', '#8A084B', '#8A0829', '#424242', '#610B0B', '#61210B', '#61380B', '#5F4C0B', '#5E610B', '#4B610B', '#38610B', '#21610B', '#0B610B', '#0B6121', '#0B6138', '#0B614B', '#0B615E', '#0B4C5F', '#0B3861', '#0B2161', '#0B0B61', '#210B61', '#380B61', '#4C0B5F', '#610B5E', '#610B4B', '#610B38', '#610B21', '#2E2E2E', '#3B0B0B', '#3B170B', '#3B240B', '#3A2F0B', '#393B0B', '#2E3B0B', '#243B0B', '#173B0B', '#0B3B0B', '#0B3B17', '#0B3B24', '#0B3B2E', '#0B3B39', '#0B2F3A', '#0B243B', '#0B173B', '#0B0B3B', '#170B3B', '#240B3B', '#2F0B3A', '#3B0B39', '#3B0B2E', '#3B0B24', '#3B0B17', '#1C1C1C', '#2A0A0A', '#2A120A', '#2A1B0A', '#29220A', '#292A0A', '#222A0A', '#1B2A0A', '#122A0A', '#0A2A0A', '#0A2A12', '#0A2A1B', '#0A2A22', '#0A2A29', '#0A2229', '#0A1B2A', '#0A122A', '#0A0A2A', '#120A2A', '#1B0A2A', '#220A29', '#2A0A29', '#2A0A22', '#2A0A1B', '#2A0A12', '#151515'],

                $div: $('div.colors'),
                $controls: $('.controls'),
                $colors: $('.colors'),

                currentColor: [],

                init: function(){
                    var content = this.colorsArray.map(function(color){
                        return '<div class="block" style="background-color: ' + color + '"><div class="inner"></div></div>';
                    })
                    this.$div.html(content);
                    this.bind();
                    this.getStatus();
                },

                updateColor: function (p) {
                    //console.log( p );
                    $.get(this.url + 'color/' + p);
                },

                toggle: function (on) {
                    this.toggleColors(on);
                    if (on) {
                        return $.get(this.url + 'on');
                    } 
                    return $.get(this.url + 'off');
                },

                rgb: function (s) {
                    return s.substring(4, s.length-1)
                         .replace(/ /g, '')
                         .split(',');
                },

                setColor: function(color) {
                    this.currentColor = color;
                },

                toggleColors: function(show){
                    if (show) {
                        this.$colors.show();
                    } else {
                        this.$colors.hide();
                    }
                },

                getStatus: function () {
                    var self = this;
                    $.get(this.url + 'status')
                        .done(function(resp){
                            if (resp.status) {
                                self.setColor(resp.color);
                                self.toggleColors(true);
                            }
                        })
                        .fail(function(error){
                            console.log( error );
                        });
                },

                bind: function() {
                    var self = this;
                    this.$controls.on('click', 'button', function(){
                        var $this = $(this);
                        if ($this.hasClass('toggleOn')) {
                            self.toggle(true);
                        }
                        if ($this.hasClass('toggleOff')) {
                            self.toggle(false);
                        }
                        if ($this.hasClass('status')) {
                            self.getStatus();
                        }
                    });

                    this.$colors.on('click', '.block', function(){
                        var $this = $(this),
                            background = $this.css('background-color');
                            color = self.rgb(background);
                            //console.log( color );
                        var p = color.join('/');
                        self.updateColor(p);
                    });

                }

            };

            COLORS.init();
        });
    </script>
</body>
</html>