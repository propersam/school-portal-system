<style type="text/css">

    @import url(https://fonts.googleapis.com/css?family=Roboto:100,300,400,900,700,500,300,100);

    * {
        margin: 0;
        box-sizing: border-box;

    }

    body {
        background: #fff;
        font-family: 'Roboto', sans-serif;
    }

    ::selection {
        background: #f31544;
        color: #FFF;
    }

    ::moz-selection {
        background: #f31544;
        color: #FFF;
    }

    h1 {
        font-size: 1.5em;
        color: #222;
    }

    h2 {
        font-size: .9em;
    }

    h3 {
        font-size: 1.2em;
        font-weight: 300;
        line-height: 2em;
    }

    p {
        font-size: .7em;
        color: #666;
        line-height: 1.2em;
    }

    /*#invoiceholder{
      width:100%;
      height: 100%;
    }*/
    /*#headerimage{
      z-index:-1;
      position:relative;
      top: -50px;
      background-image: url('http://michaeltruong.ca/images/invoicebg.jpg');

      -webkit-box-shadow:inset 0 2px 4px rgba(0,0,0,.15), inset 0 -2px 4px rgba(0,0,0,.15);
        -moz-box-shadow:inset 0 2px 4px rgba(0,0,0,.15), inset 0 -2px 4px rgba(0,0,0,.15);
        box-shadow:inset 0 2px 4px rgba(0,0,0,.15), inset 0 -2px 4px rgba(0,0,0,.15);
      overflow:hidden;
      background-attachment: fixed;
      background-size: 1920px 80%;
      background-position: 50% -90%;
    }*/
    #invoice {
        /* position: relative;
         top: -290px;*/
        margin: 0 auto;
        width: 90%;
        background: #FFF;
    }

    [id*='invoice-'] { /* Targets all id with 'col-' */
        border-bottom: 1px solid #EEE;
        padding: 30px;
    }

    #invoice-top {
        height: 120px;
    }

    #invoice-mid {
        height: 120px;
    }

    #invoice-bot {
        height: 250px;
    }

    .logo {
        float: left;
        height: 60px;
        width: 60px;
        background: url(/assets/images/quote.png) no-repeat;
        background-size: 60px 60px;
    }

    .clientlogo {
        float: left;
        height: 60px;
        width: 60px;
        background: url(/assets/images/student_icon.png) no-repeat;
        background-size: 60px 60px;
        border-radius: 50px;
    }

    .info {
        display: block;
        float: left;
        margin-left: 20px;
    }

    .title {
        float: right;
    }

    .title p {
        text-align: right;
    }

    #project {
        margin-left: 82%;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    td {
        padding: 5px 0 5px 15px;
        border: 1px solid #EEE
    }

    .tabletitle {
        padding: 5px;
        background: #EEE;
    }

    .service {
        border: 1px solid #EEE;
    }

    .item {
        width: 50%;
    }

    .itemtext {
        font-size: .9em;
    }

    #legalcopy {
        margin-top: 30px;
    }

    form {
        float: right;
        margin-top: 30px;
        text-align: right;
    }

    .legal {
        width: 70%;
    }
</style>
<div id="invoiceholder">

    <div id="headerimage"></div>
    <div id="invoice" class="effect2">

        <div id="invoice-top">
            <div class="logo"></div>
            <div class="info">
                <h2>Eco Pillars School</h2>
                <p> admin@ecopillarsschool.org</br>
                    (234) 8094826000
                </p>
            </div><!--End Info-->
            <div class="title">
                <h1>Exam Result</h1>
                <p>Date: {{ date("F j, Y") }}</br>
                    Time: {{ date("g:i a") }}
                </p>
            </div><!--End Title-->
        </div><!--End InvoiceTop-->


        <div id="invoice-mid">

            <div class="clientlogo"></div>
            <div class="info">
                <h2>{{ $data['student']['firstname'] }}</h2>
                <p>{{ $data['student']['email'] }}</p>
            </div>

            <div id="project">
                <h2>Session: {{ $data['session']['name'] }}</h2>
                <p>Term: {{ $_GET['term'] }}</p>
            </div>

        </div>

        <div id="invoice-bot">

            <div id="table">
                <!-- <table>
                  <tr class="tabletitle">
                    <td class="item"><h2>Item Description</h2></td>
                    <td class="Hours"><h2>Hours</h2></td>
                    <td class="Rate"><h2>Rate</h2></td>
                    <td class="subtotal"><h2>Sub-total</h2></td>
                  </tr>

                  <tr class="service">
                    <td class="tableitem"><p class="itemtext">Communication</p></td>
                    <td class="tableitem"><p class="itemtext">5</p></td>
                    <td class="tableitem"><p class="itemtext">$75</p></td>
                    <td class="tableitem"><p class="itemtext">$375.00</p></td>
                  </tr>

                  <tr class="service">
                    <td class="tableitem"><p class="itemtext">Asset Gathering</p></td>
                    <td class="tableitem"><p class="itemtext">3</p></td>
                    <td class="tableitem"><p class="itemtext">$75</p></td>
                    <td class="tableitem"><p class="itemtext">$225.00</p></td>
                  </tr>

                  <tr class="service">
                    <td class="tableitem"><p class="itemtext">Design Development</p></td>
                    <td class="tableitem"><p class="itemtext">5</p></td>
                    <td class="tableitem"><p class="itemtext">$75</p></td>
                    <td class="tableitem"><p class="itemtext">$375.00</p></td>
                  </tr>

                  <tr class="service">
                    <td class="tableitem"><p class="itemtext">Animation</p></td>
                    <td class="tableitem"><p class="itemtext">20</p></td>
                    <td class="tableitem"><p class="itemtext">$75</p></td>
                    <td class="tableitem"><p class="itemtext">$1,500.00</p></td>
                  </tr>

                  <tr class="service">
                    <td class="tableitem"><p class="itemtext">Animation Revisions</p></td>
                    <td class="tableitem"><p class="itemtext">10</p></td>
                    <td class="tableitem"><p class="itemtext">$75</p></td>
                    <td class="tableitem"><p class="itemtext">$750.00</p></td>
                  </tr>

                  <tr class="service">
                    <td class="tableitem"><p class="itemtext"></p></td>
                    <td class="tableitem"><p class="itemtext">HST</p></td>
                    <td class="tableitem"><p class="itemtext">13%</p></td>
                    <td class="tableitem"><p class="itemtext">$419.25</p></td>
                  </tr>


                  <tr class="tabletitle">
                    <td></td>
                    <td></td>
                    <td class="Rate"><h2>Total</h2></td>
                    <td class="payment"><h2>$3,644.25</h2></td>
                  </tr>

                </table> -->

                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>
                            Subject
                        </th>
                        <th>
                            Exam Score
                        </th>
                        <th>
                            Assessment Score
                        </th>
                        <th>
                            Total
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($data['results'] as $i)
                        @if ($i->term == 1)
                            <tr>
                                <td>
                                    <p>{{ $i->subject['subject']['name'] }}</p>
                                </td>
                                <td>
                                    <p>{{ $i->score }}</p>
                                </td>
                                <td>
                                    <p>{{ $i['assessment']['score'] }}</p>
                                </td>
                                <td>
                                    <p>{{ $i['assessment']['score'] + $i->score }}</p>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div><!--End Table-->


        </div><!--End InvoiceBot-->
        <div id="legalcopy">
            <p class="legal"><strong>School Address</strong>  18 Anifa street Ilufe- Ojo, Lagos.
            </p>
        </div>
    </div><!--End Invoice-->
</div><!-- End Invoice Holder-->
<!-- <div class="container">



