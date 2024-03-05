<?php include "./signup/header.php"; ?>

<head>

    <title>Sign Up</title>

    <script>
        function pwdfinal() {
            var pwdlast = document.getElementById("pwd").value;

            if (pwdlast.match(/[a-z]/) && pwdlast.match(/[A-Z]/) && pwdlast.match(/\d/)) {
                if (pwdlast.length < 8 || pwdlast.length > 16) {
                    return false;
                } else {
                    return true;
                }
            } else {
                return false;
            }
        }

        function doCheck() {
            var msg = 0;
            var errmsg = "";

            // Check email format
            if (mailCheckFormat() === false) {
                msg += 1;
                errmsg += "「E-mail」格式錯誤。 ";
            }

            // Check user acoount format
            if (doCheckAcc() === false) {
                msg += 1;
                errmsg += "「會員帳號」格式錯誤。";
            }

            // Check password format
            if (pwdfinal() === false) {
                msg += 1;
                errmsg += "「密碼」格式錯誤。";
            }

            // Check check-password
            if (checkSamepwd() === false) {
                msg += 1;
                errmsg += "「密碼確認」與「密碼」內容不一致。";
            }

            // Check phone
            if (!phoneCheck()) {
                msg += 1;
                errmsg += "「連絡電話」請填入【純數字】。";
            }

            console.log(msg);

            //msg check
            if (msg > 0) {
                alert(errmsg);
                return false;
            } else {
                return true;
            }

        }
    </script>
</head>

<body>
    <section id="formArea" class="formSec py-5">
        <div>
            <form class="mx-auto col-11 col-sm-11 col-md-10 col-lg-9 col-xl-8 col-xxl-6" name="signup" method="post" onsubmit="return doCheck()" action="signup_submit.php">
                <div>
                    <label class="labelname mb-2">姓氏<font color="red"> *</font>
                    </label>
                    <div>
                        <input type="text" id="lName" name="lName" class="py-1 px-2 mb-3" required>
                    </div>
                </div>
                <div>
                    <label class="labelname mb-2">名字<font color="red"> *</font>
                    </label>
                    <div>
                        <input type="text" id="fName" name="fName" class="py-1 px-2 mb-3" required>
                    </div>
                </div>

                <div>
                    <label class="labelname mb-2">性別<font color="red"> *</font>
                    </label>
                    <div class="py-1 px-2 mb-3">
                        <!-- class="mt-1 me-1 mb-3" -->
                        <label class="radio mt-1 me-2"><input type="radio" name="gender" value="1" checked> 男</label>
                        <label class="radio mt-1 me-2"><input type="radio" name="gender" value="2"> 女</label>
                        <label class="radio mt-1 me-2"><input type="radio" name="gender" value="3"> 不願透露</label>
                        <!-- 
                        雙性 Intersex，還可能會看到 Non-binary（非二元）、Genderqueer（性別酷兒）、Bigender（雙性別）、Transgender（跨性別）、Agender（無性別）、I prefer not to say（不願透露）、Custom（自訂）
                    -->
                    </div>
                </div>
                <div>
                    <label class="labelname mb-2">生日<font color="red"> *</font></label>
                    <p class="memo mb-2">* 生日填寫後無法修改，請確認填寫正確日期。</p>
                    <div>
                        <input type="date" id="birth" name="birth" class="py-1 px-2 mb-3" required>
                    </div>
                </div>
                <div>
                    <label class="labelname mb-2">Email<font color="red"> *</font></label>
                    <div>
                        <input type="email" id="mail" name="mail" onchange="mailCheckFormat()" class="py-1 px-2 mb-3" required>
                        <p id="mail_msg" class="mt-0 mb-2"></p>
                    </div>
                    <script>
                        function mailCheckFormat() {
                            var emailInput = document.getElementById('mail');
                            var isEmailValid = IsEmail(emailInput.value);

                            if (!isEmailValid) {
                                document.getElementById('mail_msg').innerHTML = "<font color='red'>請填入正確的「E-mail」格式。</font>";
                                return false;
                            } else {
                                document.getElementById('mail_msg').innerHTML = "";
                                return true;
                            }
                        }

                        function IsEmail(mail) {
                            var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                            return regex.test(mail);
                        }
                    </script>
                </div>

                <!-- User Account -->
                <div>
                    <label class="labelname mb-2">會員帳號<font color="red"> *</font></label>
                    <p class="memo mb-2">
                        * 為保障您的個人資料安全，「會員帳號」設定後便無法修改。<br>
                        * 「會員帳號」格式：請填入6 ~ 10個字元，內容須包含【數字】和【英文字母大小寫】。
                    </p>
                    <div>
                        <input type="text" id="userAcc" name="userAcc" class="py-1 px-2 mb-3" required onblur="doCheckAcc()">
                    </div>
                    <p id="acc_msg" class="mt-0 mb-2"></p>

                    <script>
                        function doCheckAcc() {
                            var userAcc = document.getElementById('userAcc').value;
                            var acclen = userAcc.length;

                            if (6 > acclen) {
                                $("#acc_msg").html("<font color='red'>「會員帳號」長度太短，請填入6 ~ 10個字元。</font>");
                                return false;
                            } else if (acclen > 10) {
                                $("#acc_msg").html("<font color='red'>「會員帳號」長度太長，請填入6 ~ 10個字元。</font>");
                                return false;
                            } else if (userAcc.match(/\d/)) {
                                if (userAcc.match(/[a-z]/) && userAcc.match(/[A-Z]/)) {
                                    $.ajax({
                                        type: 'post',
                                        url: 'checkAcc.php',
                                        data: {
                                            userAcc: userAcc
                                        },
                                        success: function(msg) {
                                            if (msg == "Nah") {
                                                $("#acc_msg").html("<font color='red'>您輸入的「會員帳號」，已有人使用。</font>");
                                                return false;
                                            } else {
                                                $("#acc_msg").html("<font color='green'>您輸入的「會員帳號」，可使用。 </font>");
                                                return true;
                                            }
                                        }
                                    });
                                } else {
                                    $("#acc_msg").html("<font color='red'>「會員帳號」內容須包含【數字】和【英文大小寫】。</font>");
                                    return false;
                                }
                            } else {
                                $("#acc_msg").html("<font color='red'>「會員帳號」內容須包含【數字】和【英文大小寫】。</font>");
                                return false;
                            }
                        }
                    </script>

                </div>

                <!-- password -->
                <div>
                    <label class="labelname mb-2">密碼<font color="red"> *</font></label>
                    <p class="memo mb-2">
                        * 「密碼」格式：請填入8 ~ 16個字元，內容須包含【數字】和【英文字母大小寫】。
                    </p>
                    <div>
                        <input type="password" id="pwd" name="pwd" onchange="pwdCheckFormat()" class="py-1 px-2" required>
                    </div>
                    <!-- pwdCheck()不能當function名稱，因為城市在呈現網頁時，pwdCheck這個名字已經被下面「確認密碼相同」中的id, name用掉了 -->
                    <br>
                    <label for="showPassword" class="mt-0 mb-2">
                        <input type="checkbox" id="showpwd" onchange="doshow()" class="show"> 顯示密碼
                    </label>

                    <script>
                        function doshow() {
                            var pwdInput = document.getElementById("pwd");
                            var checkbox = document.getElementById('showpwd');

                            pwdInput.type = checkbox.checked ? 'text' : 'password';
                        }
                    </script>

                    <!-- 密碼強度-->
                    <p id="pwdStrength_msg" class="mt-0 mb-2"></p>
                    <script>
                        function pwdCheckFormat() {
                            // console.log("success");
                            var pwd = document.getElementById('pwd').value;
                            var strength = 0;
                            var tips = "";

                            // Check password length
                            if (pwd.length < 8 || pwd.length > 16) {
                                tips += "請填入8 ~ 16個字元。";
                            } else {
                                strength += 1;
                            }

                            // Check for mixed case
                            if (pwd.match(/[a-z]/) && pwd.match(/[A-Z]/)) {
                                strength += 1;
                            } else {
                                tips += "須包含【英文字母大小寫】。";
                            }

                            // Check for numbers
                            if (pwd.match(/\d/)) {
                                strength += 1;
                            } else {
                                tips += "須包含【數字】。 ";
                            }

                            // Check for special characters
                            if (pwd.match(/[^a-zA-Z\d]/)) {
                                strength += 1;
                            }

                            // Update the text and color based on the password strength
                            var pwdStrengthElement = document.getElementById('pwdStrength_msg');
                            if (strength < 2) {
                                pwdStrengthElement.innerText = "簡單。" + tips;
                                pwdStrengthElement.style.color = 'red';
                            } else if (strength === 2) {
                                pwdStrengthElement.innerText = "普通。" + tips;
                                pwdStrengthElement.style.color = 'orange';
                            } else if (strength === 3) {
                                pwdStrengthElement.innerText = "困難。" + tips;
                                pwdStrengthElement.style.color = 'green';
                            } else {
                                pwdStrengthElement.innerText = "非常困難。" + tips;
                                pwdStrengthElement.style.color = 'green';
                            }
                        }
                    </script>

                </div>

                <div>
                    <label class="labelname mb-2">密碼確認<font color="red"> *</font></label>
                    <div>
                        <input type="password" id="pwdCheck" name="pwdCheck" onchange="checkSamepwd()" class="py-1 px-2 mb-3" required>
                    </div>
                    <div id="pwdSame_msg" class="mt-0 mb-2"></div>

                    <script>
                        function checkSamepwd() {
                            var pwd = document.getElementById('pwd').value;
                            var pwdCheck = document.getElementById('pwdCheck').value;

                            if (pwdCheck != pwd) {
                                $("#pwdSame_msg").html("<font color='red'>「密碼確認」與「密碼」內容不一致。</font>");
                                return false;
                            } else {
                                $("#pwdSame_msg").html("");
                            }
                        }
                    </script>
                </div>
                <div>
                    <label class="labelname mb-2">聯絡電話<font color="red"> *</font></label>
                    <div>
                        <input type="text" id="phone" name="phone" onchange="phoneCheck()" class="py-1 px-2 mb-3" required>
                    </div>
                    <div id="phone_msg" class="mt-0 mb-2"></div>

                    <script>
                        function phoneCheck() {
                            var pwdlast = document.getElementById("phone").value;

                            if (pwdlast.match(/\d/)) {
                                $("#phone_msg").html("");
                                return true;
                            } else {
                                $("#phone_msg").html("<font color='red'>請填入【純數字】。</font>");
                                return false;
                            }
                        }
                    </script>
                </div>

                <!-- Address -->
                <div>
                    <label class="labelname mb-2">地址<font color="red"> *</font></label><br>
                    <div class="addrSelect">
                        <select class="form-select py-1 px-2 mt-1 mb-2 me-3" name="addr_city" id="addr_city" aria-label="Default select example" required>
                            <option value="0" class="mt-1 py-1 px-2 mb-3" selected disabled> 縣市</option>

                            <?php
                            require 'conn.php';

                            $sql = "SELECT DISTINCT * FROM `city`";

                            $result = mysqli_query($conn, $sql) or die("Data Choosen Error！" . mysqli_error($conn));

                            while ($data = mysqli_fetch_assoc($result)) {
                            ?>

                                <option value="<?php echo $data['city_id']; ?>"><?php echo $data['city_name']; ?></option>

                            <?php
                            }
                            ?>
                        </select>

                        <!-- Choose Town -->
                        <select class="form-select py-1 px-2 mt-1 mb-2" name="addr_town" id="addr_town" aria-label="Default select example" required>
                            <option class="mt-1 py-1 px-2 mb-3" value="0" selected disabled> 鄉鎮市區</option>
                        </select>

                        <script>
                            $(document).ready(function() {
                                // Function to fetch towns based on the selected city
                                function fetchTowns(selectedCity) {
                                    $.ajax({
                                        type: 'post',
                                        url: './signup/get_towns.php',
                                        data: {
                                            selectedCity: selectedCity
                                            // 'get_towns.php'裡的selectedCity：網頁端的selectedCity
                                        },
                                        success: function(res) {
                                            // Populate the second dropdown with the towns
                                            $('#addr_town').html(res);
                                        }
                                    });
                                }

                                // Event listener for city selection change
                                $(document).on('change', '#addr_city', function() {
                                    var selectedCity = $(this).val();
                                    if (selectedCity) {
                                        fetchTowns(selectedCity);
                                    } else {
                                        // Handle the case when no city is selected
                                        $('#addr_town').html('<option value="" selected disabled> 鄉鎮市區</option>');
                                    }
                                });

                                // Trigger the event listener on page load to populate the towns if a city is pre-selected
                                $('#addr_city').trigger('change');
                            });
                        </script>
                    </div>
                    <div>
                        <input type="text" id="addr_St" name="addr_St" class="py-1 px-2 mb-3 me-3" required>
                    </div>
                </div>


                <!-- button -->
                <div class="btn">
                    <span class="ms-2">
                        <button type="submit" class="submitBtn py-3 px-5 mt-3">送出</button>
                    </span>
                    <span class="me-2">
                        <a href="login.php">
                            <button type="button" class="discardBtn py-3 px-5 mt-3">取消</button>
                        </a>
                    </span>
                </div>
            </form>
        </div>
    </section>

    <?php include 'footer.php'; ?>