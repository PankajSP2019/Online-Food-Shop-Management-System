<!DOCTYPE html>
<html>

<head>
    <style>
        #l001 {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background: linear-gradient(120deg, #2980b9, #8e44ad);
            /*            background: white;*/
        }

        .footer {
/*     uncomment this for fixed position footer       position: fixed;*/
            position: static;
            left: 0;
            bottom: 0;
            width: 100%;
            background: linear-gradient(120deg, #2980b9, #8e44ad);
            color: white;
            text-align: left;
        }

        /*
        li {
            float: left;
            border-right: 1px solid #bbb;
        }

        li:last-child {
            border-right: 1px solid #bbb;
        }

        li a {
            display: inline-block;
            color: black;
            text-align: right;
            padding: 20px 16px;
            text-decoration: none;
        }

        li a:hover:not(.active) {
            background-color: green;
        }

        .active {
            background-color: #04AA6D;
        }
*/

    </style>
</head>
<br>
<hr />

<div class="footer">

    <ul id="l001">
        <table id="tt1" style="width:100%">
            <tr>
                <td width="25%">
                    <h4>Contact Us</h4>
                    Call us 11am-11pm(Everyday)<br>
                    <img src="https://img.icons8.com/ios-glyphs/30/000000/phone-message.png" /> 017-xxxx-yyyy<br>

                    <img src="https://img.icons8.com/ios-glyphs/20/000000/email.png" />
                    Mail: Ofoodshop@gamil.com<br>

                    <img src="https://img.icons8.com/ios-glyphs/20/000000/marker--v2.png" />
                    Block B,Road-2,Bashundhar, Dhaka-****
                </td>
            </tr>
        </table>
        <br>
        © 2021 - <?php echo date("Y");?> Online foodshop.com | All Rights Reserved

    </ul>
    <br>

</div>



</html>
