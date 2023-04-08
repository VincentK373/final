@extends('dashboard.part.main')
@section('container')
    <div class="kotak2" style="background-color:rgb(232, 204, 245); 
    padding: 0px 0px 0px 0px;">
        <div class="kiri" style="margin: 20px">
            <h2><b>Change Profile</b></h2>
        </div>
        <div class="tengah">
            <form action="" id="form">
                <div class="name">
                    <input type="text" name="fn" id="fn" placeholder=" First Name">
                    <input type="text" name="ln" id="ln" placeholder=" Last Name">
                </div>

                <input type="email" name="email" id="email" placeholder=" Email">
                <input type="password" name="pass" id="pass" placeholder=" Password">
                <input type="password" name="con_pass" id="con_pass" placeholder=" Confirm Password">
                <input type="text" name="username" id="username" placeholder=" Username">
                <input type="text" name="place" id="place" placeholder=" Place Of Birth">
                <label for="date" class="dateSubTittle">Date of birth</label>
                <div class="date_of_birth">
                    <!--Ini date-->
                    <select name="date" id="date">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                    </select>
                    <!--Ini month-->
                    <select name="month" id="month">
                        <option value="January">January</option>
                        <option value="February">February</option>
                        <option value="March">March</option>
                        <option value="April">April</option>
                        <option value="May">May</option>
                        <option value="June">June</option>
                        <option value="July">July</option>
                        <option value="August">August</option>
                        <option value="September">September</option>
                        <option value="October">October</option>
                        <option value="November">November</option>
                        <option value="December">December</option>
                    </select>
                    <!--Ini year-->
                    <select name="year" id="year">
                        <option value="2001">2001</option>
                        <option value="2002">2002</option>
                        <option value="2003">2003</option>
                        <option value="2004">2004</option>
                        <option value="2005">2005</option>
                        <option value="2006">2006</option>
                        <option value="2007">2007</option>
                        <option value="2008">2008</option>
                        <option value="2009">2009</option>
                        <option value="2010">2010</option>
                        <option value="2011">2011</option>
                        <option value="2012">2012</option>
                        <option value="2013">2013</option>
                        <option value="2014">2014</option>
                        <option value="2015">2015</option>
                        <option value="2016">2016</option>
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                    </select>
                </div>

                <div class="bawah">
                    <input type="tel" name="telephone" id="telephone" placeholder=" Phone Number">
                    <select name="gender" id="gender" placeholder="Gender">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>

                <input type="submit" value="Sign Up" id="btn">

            </form>








            {{-- <div id="content"
                style="display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;">

                <div class="kotak_form"
                    style="background: #FFFFFF;
                width: 100%;
                height: 100%;
                display: flex;
                flex-direction: column;
                justify-content: flex-start;
                align-items: center;
                flex-wrap: wrap;">
                    <span
                        style="border: 1px solid #A3A3A3;
                    width: 92%;
                    margin-bottom: 19px;
                    margin-top: 10px;"></span>
                    <form action="" id="form"
                        style="display: flex;
                    flex-direction: column;
                    align-items: center;
                    gap: 13px;">
                        <div class="name" style="display: flex;flex-direction: row;">
                            <input type="text" name="fn" id="fn" placeholder=" First Name">
                            <input type="text" name="ln" id="ln" placeholder=" Last Name">
                        </div>
                    </form>
                </div>
            </div> --}}
        </div>
        <div class="kanan" style="margin-top: 400px">
            <a href="/dashboard" class="btn btn-success">Confirm Profile</a>
        </div>
    </div>


    <style>
        .kotak2 {
            display: flex;
        }

        .kotak2 .kiri {
            width: 20%;
        }

        .kotak2 .tengah {
            width: 80%;
        }

        .kotak2 .kanan {
            width: 20%;
        }

        .kanan {
            float: right;
            width: 20%;
            max-height: 400px;
            padding-right: 50px;
            display: inline;
            margin-top: 0px;
            overflow: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            border: 1px solid white;
        }

        th,
        td {
            padding: 8px;
            border: 1px solid white;
        }

        td {
            background-color: rgb(232, 204, 245);
            width: 70%;
        }

        th {
            text-align: center;
            background-color: rgb(144, 68, 199);
            font-weight: bold;
            width: 30%;
            color: white
        }

        .kiri {
            display: inline;
            height: 100%;
            margin-right: 30px;
            width: 20%;
        }

        .tengah {
            background-color: white;
            float: left;
            display: inline;
            margin-right: 30px;
            height: 100%;
            width: 80%;
        }

        .kotak2 {
            width: 1150px;
            height: 450px;
            background-color: white;
            margin-top: 130px;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 40px;
            padding-top: 50px;
            padding-left: 50px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }
    </style>
@endsection



{{-- <div id="content">
                <div class="kotak_form">
                    <h2 id="title">Sign Up</h2>

                    <span></span>
                    <form action="" id="form">
                        <div class="name">
                            <input type="text" name="fn" id="fn" placeholder=" First Name">
                            <input type="text" name="ln" id="ln" placeholder=" Last Name">
                        </div>

                        <input type="email" name="email" id="email" placeholder=" Email">
                        <input type="password" name="pass" id="pass" placeholder=" Password">
                        <input type="password" name="con_pass" id="con_pass" placeholder=" Confirm Password">
                        <input type="text" name="username" id="username" placeholder=" Username">
                        <input type="text" name="place" id="place" placeholder=" Place Of Birth">
                        <label for="date" class="dateSubTittle">Date of birth</label>
                        <div class="date_of_birth">
                            <!--Ini date-->
                            <select name="date" id="date">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                            </select>
                            <!--Ini month-->
                            <select name="month" id="month">
                                <option value="January">January</option>
                                <option value="February">February</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="August">August</option>
                                <option value="September">September</option>
                                <option value="October">October</option>
                                <option value="November">November</option>
                                <option value="December">December</option>
                            </select>
                            <!--Ini year-->
                            <select name="year" id="year">
                                <option value="2001">2001</option>
                                <option value="2002">2002</option>
                                <option value="2003">2003</option>
                                <option value="2004">2004</option>
                                <option value="2005">2005</option>
                                <option value="2006">2006</option>
                                <option value="2007">2007</option>
                                <option value="2008">2008</option>
                                <option value="2009">2009</option>
                                <option value="2010">2010</option>
                                <option value="2011">2011</option>
                                <option value="2012">2012</option>
                                <option value="2013">2013</option>
                                <option value="2014">2014</option>
                                <option value="2015">2015</option>
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                            </select>
                        </div>

                        <div class="bawah">
                            <input type="tel" name="telephone" id="telephone" placeholder=" Phone Number">
                            <select name="gender" id="gender" placeholder="Gender">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>

                        <input type="submit" value="Sign Up" id="btn">

                    </form>
                </div>
            </div> --}}
