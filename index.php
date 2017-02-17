<!DOCTYPE html>
<html>
<head>
    <title>Color Table</title>

    <style>
        .colorWrapper {
            max-height: 500px;
            min-height: 400px;
        }
        #colorchart{border:0;padding:0;border-collapse:collapse; width: 100%; height: 100%;}
        #colorchart div{width:50px;height:30px;}
        .colors {
            counter-reset: my-counter;
            width: 1300px;
            margin: 40px auto;

        }
        .colors > div {
            display: block;
            height: 50px;
            width: 50px;
            margin: 1px;
            float: left;
        }

       /* .colors > div:before {
            content: counter(my-counter);
            counter-increment: my-counter;
        }*/

        /* 4 column colouring */
        .colors > div:nth-child(25n+1) {
            clear: both;
        }

        @media (min-width:621px) and (max-width: 1299px) {
            .colors {
                max-width: 900px;
            }
            .colors > div {

                /*width: 45px;*/
                height: 55px;
                width: 7.4%;
            }
            .colors > div:nth-child(25n+1),
            .colors > div:nth-child(25n+3),
            .colors > div:nth-child(25n+5),
            .colors > div:nth-child(25n+7),
            .colors > div:nth-child(25n+9),
            .colors > div:nth-child(25n+11),
            .colors > div:nth-child(25n+13),
            .colors > div:nth-child(25n+15),
            .colors > div:nth-child(25n+17),
            .colors > div:nth-child(25n+19),
            .colors > div:nth-child(25n+21),
            .colors > div:nth-child(25n+23) {
                font-weight: bold;
                color: yellow;
                /*background: black !important;*/
                display: none;
            }
            .colors > div:nth-child(25n+2) {
                clear: both;
            }
        }

        @media (max-width:620px) {
            /*body { background: red ;}*/
            .colors {
                width: 320px;
            }
            .colors > div {
                width: 45px;
                height: 45px;

            }
            .colors > div:nth-child(25n+2),
            .colors > div:nth-child(25n+3),
            .colors > div:nth-child(25n+4),
            .colors > div:nth-child(25n+5),
            .colors > div:nth-child(25n+7),
            .colors > div:nth-child(25n+8),
            .colors > div:nth-child(25n+9),
            .colors > div:nth-child(25n+10),
            .colors > div:nth-child(25n+11),
            .colors > div:nth-child(25n+13),
            .colors > div:nth-child(25n+14),
            .colors > div:nth-child(25n+15),
            .colors > div:nth-child(25n+16),
            .colors > div:nth-child(25n+17),
            .colors > div:nth-child(25n+19),
            .colors > div:nth-child(25n+20),
            .colors > div:nth-child(25n+21),
            .colors > div:nth-child(25n+22),
            .colors > div:nth-child(25n+23) {
                font-weight: bold;
                color: yellow;
                /*background: black !important;*/
                display: none;
            }
            .colors > div:nth-child(25n+3) {
                /*clear: both;*/
            }
        }

        
    </style>
</head>
<body>

    <div class="colors">
        <div style="background:#F8E0E0;"></div>
        <div style="background:#F8E6E0;"></div>
        <div style="background:#F8ECE0;"></div>
        <div style="background:#F7F2E0;"></div>
        <div style="background:#F7F8E0;"></div>
        <div style="background:#F1F8E0;"></div>
        <div style="background:#ECF8E0;"></div>
        <div style="background:#E6F8E0;"></div>
        <div style="background:#E0F8E0;"></div>
        <div style="background:#E0F8E6;"></div>
        <div style="background:#E0F8EC;"></div>
        <div style="background:#E0F8F1;"></div>
        <div style="background:#E0F8F7;"></div>
        <div style="background:#E0F2F7;"></div>
        <div style="background:#E0ECF8;"></div>
        <div style="background:#E0E6F8;"></div>
        <div style="background:#E0E0F8;"></div>
        <div style="background:#E6E0F8;"></div>
        <div style="background:#ECE0F8;"></div>
        <div style="background:#F2E0F7;"></div>
        <div style="background:#F8E0F7;"></div>
        <div style="background:#F8E0F1;"></div>
        <div style="background:#F8E0EC;"></div>
        <div style="background:#F8E0E6;"></div>
        <div style="background:#FAFAFA;"></div>
        <div style="background:#F6CECE;"></div>
        <div style="background:#F6D8CE;"></div>
        <div style="background:#F6E3CE;"></div>
        <div style="background:#F5ECCE;"></div>
        <div style="background:#F5F6CE;"></div>
        <div style="background:#ECF6CE;"></div>
        <div style="background:#E3F6CE;"></div>
        <div style="background:#D8F6CE;"></div>
        <div style="background:#CEF6CE;"></div>
        <div style="background:#CEF6D8;"></div>
        <div style="background:#CEF6E3;"></div>
        <div style="background:#CEF6EC;"></div>
        <div style="background:#CEF6F5;"></div>
        <div style="background:#CEECF5;"></div>
        <div style="background:#CEE3F6;"></div>
        <div style="background:#CED8F6;"></div>
        <div style="background:#CECEF6;"></div>
        <div style="background:#D8CEF6;"></div>
        <div style="background:#E3CEF6;"></div>
        <div style="background:#ECCEF5;"></div>
        <div style="background:#F6CEF5;"></div>
        <div style="background:#F6CEEC;"></div>
        <div style="background:#F6CEE3;"></div>
        <div style="background:#F6CED8;"></div>
        <div style="background:#F2F2F2;"></div>
        <div style="background:#F5A9A9;"></div>
        <div style="background:#F5BCA9;"></div>
        <div style="background:#F5D0A9;"></div>
        <div style="background:#F3E2A9;"></div>
        <div style="background:#F2F5A9;"></div>
        <div style="background:#E1F5A9;"></div>
        <div style="background:#D0F5A9;"></div>
        <div style="background:#BCF5A9;"></div>
        <div style="background:#A9F5A9;"></div>
        <div style="background:#A9F5BC;"></div>
        <div style="background:#A9F5D0;"></div>
        <div style="background:#A9F5E1;"></div>
        <div style="background:#A9F5F2;"></div>
        <div style="background:#A9E2F3;"></div>
        <div style="background:#A9D0F5;"></div>
        <div style="background:#A9BCF5;"></div>
        <div style="background:#A9A9F5;"></div>
        <div style="background:#BCA9F5;"></div>
        <div style="background:#D0A9F5;"></div>
        <div style="background:#E2A9F3;"></div>
        <div style="background:#F5A9F2;"></div>
        <div style="background:#F5A9E1;"></div>
        <div style="background:#F5A9D0;"></div>
        <div style="background:#F5A9BC;"></div>
        <div style="background:#E6E6E6;"></div>
        <div style="background:#F78181;"></div>
        <div style="background:#F79F81;"></div>
        <div style="background:#F7BE81;"></div>
        <div style="background:#F5DA81;"></div>
        <div style="background:#F3F781;"></div>
        <div style="background:#D8F781;"></div>
        <div style="background:#BEF781;"></div>
        <div style="background:#9FF781;"></div>
        <div style="background:#81F781;"></div>
        <div style="background:#81F79F;"></div>
        <div style="background:#81F7BE;"></div>
        <div style="background:#81F7D8;"></div>
        <div style="background:#81F7F3;"></div>
        <div style="background:#81DAF5;"></div>
        <div style="background:#81BEF7;"></div>
        <div style="background:#819FF7;"></div>
        <div style="background:#8181F7;"></div>
        <div style="background:#9F81F7;"></div>
        <div style="background:#BE81F7;"></div>
        <div style="background:#DA81F5;"></div>
        <div style="background:#F781F3;"></div>
        <div style="background:#F781D8;"></div>
        <div style="background:#F781BE;"></div>
        <div style="background:#F7819F;"></div>
        <div style="background:#D8D8D8;"></div>
        <div style="background:#FA5858;"></div>
        <div style="background:#FA8258;"></div>
        <div style="background:#FAAC58;"></div>
        <div style="background:#F7D358;"></div>
        <div style="background:#F4FA58;"></div>
        <div style="background:#D0FA58;"></div>
        <div style="background:#ACFA58;"></div>
        <div style="background:#82FA58;"></div>
        <div style="background:#58FA58;"></div>
        <div style="background:#58FA82;"></div>
        <div style="background:#58FAAC;"></div>
        <div style="background:#58FAD0;"></div>
        <div style="background:#58FAF4;"></div>
        <div style="background:#58D3F7;"></div>
        <div style="background:#58ACFA;"></div>
        <div style="background:#5882FA;"></div>
        <div style="background:#5858FA;"></div>
        <div style="background:#8258FA;"></div>
        <div style="background:#AC58FA;"></div>
        <div style="background:#D358F7;"></div>
        <div style="background:#FA58F4;"></div>
        <div style="background:#FA58D0;"></div>
        <div style="background:#FA58AC;"></div>
        <div style="background:#FA5882;"></div>
        <div style="background:#BDBDBD;"></div>
        <div style="background:#FE2E2E;"></div>
        <div style="background:#FE642E;"></div>
        <div style="background:#FE9A2E;"></div>
        <div style="background:#FACC2E;"></div>
        <div style="background:#F7FE2E;"></div>
        <div style="background:#C8FE2E;"></div>
        <div style="background:#9AFE2E;"></div>
        <div style="background:#64FE2E;"></div>
        <div style="background:#2EFE2E;"></div>
        <div style="background:#2EFE64;"></div>
        <div style="background:#2EFE9A;"></div>
        <div style="background:#2EFEC8;"></div>
        <div style="background:#2EFEF7;"></div>
        <div style="background:#2ECCFA;"></div>
        <div style="background:#2E9AFE;"></div>
        <div style="background:#2E64FE;"></div>
        <div style="background:#2E2EFE;"></div>
        <div style="background:#642EFE;"></div>
        <div style="background:#9A2EFE;"></div>
        <div style="background:#CC2EFA;"></div>
        <div style="background:#FE2EF7;"></div>
        <div style="background:#FE2EC8;"></div>
        <div style="background:#FE2E9A;"></div>
        <div style="background:#FE2E64;"></div>
        <div style="background:#A4A4A4;"></div>
        <div style="background:#FF0000;"></div>
        <div style="background:#FF4000;"></div>
        <div style="background:#FF8000;"></div>
        <div style="background:#FFBF00;"></div>
        <div style="background:#FFFF00;"></div>
        <div style="background:#BFFF00;"></div>
        <div style="background:#80FF00;"></div>
        <div style="background:#40FF00;"></div>
        <div style="background:#00FF00;"></div>
        <div style="background:#00FF40;"></div>
        <div style="background:#00FF80;"></div>
        <div style="background:#00FFBF;"></div>
        <div style="background:#00FFFF;"></div>
        <div style="background:#00BFFF;"></div>
        <div style="background:#0080FF;"></div>
        <div style="background:#0040FF;"></div>
        <div style="background:#0000FF;"></div>
        <div style="background:#4000FF;"></div>
        <div style="background:#8000FF;"></div>
        <div style="background:#BF00FF;"></div>
        <div style="background:#FF00FF;"></div>
        <div style="background:#FF00BF;"></div>
        <div style="background:#FF0080;"></div>
        <div style="background:#FF0040;"></div>
        <div style="background:#848484;"></div>
        <div style="background:#DF0101;"></div>
        <div style="background:#DF3A01;"></div>
        <div style="background:#DF7401;"></div>
        <div style="background:#DBA901;"></div>
        <div style="background:#D7DF01;"></div>
        <div style="background:#A5DF00;"></div>
        <div style="background:#74DF00;"></div>
        <div style="background:#3ADF00;"></div>
        <div style="background:#01DF01;"></div>
        <div style="background:#01DF3A;"></div>
        <div style="background:#01DF74;"></div>
        <div style="background:#01DFA5;"></div>
        <div style="background:#01DFD7;"></div>
        <div style="background:#01A9DB;"></div>
        <div style="background:#0174DF;"></div>
        <div style="background:#013ADF;"></div>
        <div style="background:#0101DF;"></div>
        <div style="background:#3A01DF;"></div>
        <div style="background:#7401DF;"></div>
        <div style="background:#A901DB;"></div>
        <div style="background:#DF01D7;"></div>
        <div style="background:#DF01A5;"></div>
        <div style="background:#DF0174;"></div>
        <div style="background:#DF013A;"></div>
        <div style="background:#6E6E6E;"></div>
        <div style="background:#B40404;"></div>
        <div style="background:#B43104;"></div>
        <div style="background:#B45F04;"></div>
        <div style="background:#B18904;"></div>
        <div style="background:#AEB404;"></div>
        <div style="background:#86B404;"></div>
        <div style="background:#5FB404;"></div>
        <div style="background:#31B404;"></div>
        <div style="background:#04B404;"></div>
        <div style="background:#04B431;"></div>
        <div style="background:#04B45F;"></div>
        <div style="background:#04B486;"></div>
        <div style="background:#04B4AE;"></div>
        <div style="background:#0489B1;"></div>
        <div style="background:#045FB4;"></div>
        <div style="background:#0431B4;"></div>
        <div style="background:#0404B4;"></div>
        <div style="background:#3104B4;"></div>
        <div style="background:#5F04B4;"></div>
        <div style="background:#8904B1;"></div>
        <div style="background:#B404AE;"></div>
        <div style="background:#B40486;"></div>
        <div style="background:#B4045F;"></div>
        <div style="background:#B40431;"></div>
        <div style="background:#585858;"></div>
        <div style="background:#8A0808;"></div>
        <div style="background:#8A2908;"></div>
        <div style="background:#8A4B08;"></div>
        <div style="background:#886A08;"></div>
        <div style="background:#868A08;"></div>
        <div style="background:#688A08;"></div>
        <div style="background:#4B8A08;"></div>
        <div style="background:#298A08;"></div>
        <div style="background:#088A08;"></div>
        <div style="background:#088A29;"></div>
        <div style="background:#088A4B;"></div>
        <div style="background:#088A68;"></div>
        <div style="background:#088A85;"></div>
        <div style="background:#086A87;"></div>
        <div style="background:#084B8A;"></div>
        <div style="background:#08298A;"></div>
        <div style="background:#08088A;"></div>
        <div style="background:#29088A;"></div>
        <div style="background:#4B088A;"></div>
        <div style="background:#6A0888;"></div>
        <div style="background:#8A0886;"></div>
        <div style="background:#8A0868;"></div>
        <div style="background:#8A084B;"></div>
        <div style="background:#8A0829;"></div>
        <div style="background:#424242;"></div>
        <div style="background:#610B0B;"></div>
        <div style="background:#61210B;"></div>
        <div style="background:#61380B;"></div>
        <div style="background:#5F4C0B;"></div>
        <div style="background:#5E610B;"></div>
        <div style="background:#4B610B;"></div>
        <div style="background:#38610B;"></div>
        <div style="background:#21610B;"></div>
        <div style="background:#0B610B;"></div>
        <div style="background:#0B6121;"></div>
        <div style="background:#0B6138;"></div>
        <div style="background:#0B614B;"></div>
        <div style="background:#0B615E;"></div>
        <div style="background:#0B4C5F;"></div>
        <div style="background:#0B3861;"></div>
        <div style="background:#0B2161;"></div>
        <div style="background:#0B0B61;"></div>
        <div style="background:#210B61;"></div>
        <div style="background:#380B61;"></div>
        <div style="background:#4C0B5F;"></div>
        <div style="background:#610B5E;"></div>
        <div style="background:#610B4B;"></div>
        <div style="background:#610B38;"></div>
        <div style="background:#610B21;"></div>
        <div style="background:#2E2E2E;"></div>
        <div style="background:#3B0B0B;"></div>
        <div style="background:#3B170B;"></div>
        <div style="background:#3B240B;"></div>
        <div style="background:#3A2F0B;"></div>
        <div style="background:#393B0B;"></div>
        <div style="background:#2E3B0B;"></div>
        <div style="background:#243B0B;"></div>
        <div style="background:#173B0B;"></div>
        <div style="background:#0B3B0B;"></div>
        <div style="background:#0B3B17;"></div>
        <div style="background:#0B3B24;"></div>
        <div style="background:#0B3B2E;"></div>
        <div style="background:#0B3B39;"></div>
        <div style="background:#0B2F3A;"></div>
        <div style="background:#0B243B;"></div>
        <div style="background:#0B173B;"></div>
        <div style="background:#0B0B3B;"></div>
        <div style="background:#170B3B;"></div>
        <div style="background:#240B3B;"></div>
        <div style="background:#2F0B3A;"></div>
        <div style="background:#3B0B39;"></div>
        <div style="background:#3B0B2E;"></div>
        <div style="background:#3B0B24;"></div>
        <div style="background:#3B0B17;"></div>
        <div style="background:#1C1C1C;"></div>
        <div style="background:#2A0A0A;"></div>
        <div style="background:#2A120A;"></div>
        <div style="background:#2A1B0A;"></div>
        <div style="background:#29220A;"></div>
        <div style="background:#292A0A;"></div>
        <div style="background:#222A0A;"></div>
        <div style="background:#1B2A0A;"></div>
        <div style="background:#122A0A;"></div>
        <div style="background:#0A2A0A;"></div>
        <div style="background:#0A2A12;"></div>
        <div style="background:#0A2A1B;"></div>
        <div style="background:#0A2A22;"></div>
        <div style="background:#0A2A29;"></div>
        <div style="background:#0A2229;"></div>
        <div style="background:#0A1B2A;"></div>
        <div style="background:#0A122A;"></div>
        <div style="background:#0A0A2A;"></div>
        <div style="background:#120A2A;"></div>
        <div style="background:#1B0A2A;"></div>
        <div style="background:#220A29;"></div>
        <div style="background:#2A0A29;"></div>
        <div style="background:#2A0A22;"></div>
        <div style="background:#2A0A1B;"></div>
        <div style="background:#2A0A12;"></div>
        <div style="background:#151515;"></div>
    </div>
    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script>

        function rgb(s) {
            return s.substring(4, s.length-1)
                 .replace(/ /g, '')
                 .split(',');
        }

        $('.colors').on('click', 'div', function(){
            var $this = $(this),
                background = $this.css('background-color');
                color = rgb(background);
            //    console.log( color );
            var p = color.join('/');
            console.log( color );
            var url = '/api.php/color/' + p;
            $.get(url);


        });
    </script>
</body>
</html>