<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign In</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <link href="{{ mix('css/app.css') }}" rel="stylesheet">

</head>
<body>
  <div class="v22_5846">
    <div class="v22_5847"></div>
    <div class="v22_5848">
      <div class="v22_5849">
        <div class="v22_5850"></div>
        <span class="v22_5851">Sign in</span>
        <form id="loginForm" action="{{ route('login') }}" method="POST" onsubmit="return validateForm()">
          <div class="v22_5852">
            <label for="username">Username *</label>
            <input type="email" id="username" name="email" placeholder="Username" required>
            <span id="usernameError" class="error-message"></span> <!-- Error message for username -->
          </div>
          <div class="v22_5853">
            <label for="password">Password *</label>
            <input type="password" id="password" name="password" placeholder="Password" required>
            <span id="passwordError" class="error-message"></span> <!-- Error message for password -->
          </div>
          <div class="v22_5854">
            <button type="submit" class="v22_5857">Sign in</button>
          </div>          
        </form>
      </div>
    </div>
  </div>
  <div class="v22_5859"></div>

  {{-- <script>
    function validateForm() {
      let isValid = true;

      // Clear previous error messages
      document.getElementById("usernameError").innerText = "";
      document.getElementById("passwordError").innerText = "";

      // Get the input values
      const username = document.getElementById("username").value;
      const password = document.getElementById("password").value;

      // Validate username
      if (username === "" || username.length < 3) {
        document.getElementById("usernameError").innerText = "Username tidak valid";
        isValid = false;
      }

      // Validate password
      if (password === "" || password.length < 6) {
        document.getElementById("passwordError").innerText = "Password tidak valid";
        isValid = false;
      }

      return isValid;
    } --}}
  </script>
</body>
<style>
    * {
    box-sizing: border-box;
  }
  body {
    font-size: 14px;
  }
  .v22_5846 {
    width: 100%;
    height: 982px;
    background: rgba(255,255,255,1);
    opacity: 1;
    position: absolute;
    top: 0px;
    left: 0px;
    overflow: hidden;
  }
  .v22_5847 {
    width: 100%;
    height: 982px;
    background: url("/storage/images/v22_5847.png");
    background-repeat: no-repeat;
    background-position: center center;
    background-size: cover;
    opacity: 1;
    position: absolute;
    top: 0px;
    left: 0px;
    overflow: hidden;
  }
  .v22_5848 {
    width: 426px;
    height: 389px;
    background: url("../images/v22_5848.png");
    background-repeat: no-repeat;
    background-position: center center;
    background-size: cover;
    opacity: 1;
    position: absolute;
    top: 296px;
    left: 543px;
    overflow: hidden;
  }
  .v22_5849 {
    width: 426px;
    height: 389px;
    background: url("../images/v22_5849.png");
    background-repeat: no-repeat;
    background-position: center center;
    background-size: cover;
    opacity: 1;
    position: absolute;
    top: 0px;
    left: 0px;
    overflow: hidden;
  }
  .v22_5850 {
    width: 426px;
    height: 389px;
    background: rgba(250,250,250,1);
    opacity: 1;
    position: absolute;
    top: 0px;
    left: 0px;
    border-top-left-radius: 7px;
    border-top-right-radius: 7px;
    border-bottom-left-radius: 7px;
    border-bottom-right-radius: 7px;
    overflow: hidden;
  }
  .v22_5851 {
    width: 55px;
    color: rgba(0,0,0,1);
    position: absolute;
    top: 98px;
    left: 185px;
    font-family: Poppins;
    font-weight: SemiBold;
    font-size: 16px;
    opacity: 1;
    text-align: left;
  }
  .v22_5852 {
    width: 342px;
    height: auto; /* Ganti height dengan auto agar dapat menyesuaikan dengan konten */
    background: rgba(250, 250, 250, 1);
    opacity: 1;
    position: absolute;
    font-family: Poppins;
    top: 130px;
    left: 42px;
    padding: 8px 0; /* Memberikan ruang di dalam */ /* Sudut lembut pada input */
    overflow: hidden;
  }
  
  .v22_5852 input {
    width: 100%; /* Agar input memenuhi lebar div */
    padding: 8px 12px;
    font-size: 16px;
    outline: none;
    border: 1px solid rgba(0,0,0,0.5);
    border-top-left-radius: 7px;
    border-top-right-radius: 7px;
    border-bottom-left-radius: 7px;
    border-bottom-right-radius: 7px;
  }
  
  .v22_5852 input::placeholder {
    color: #aaa; /* Placeholder yang lebih cerah */
  }
  
  
  .v22_5853 {
    width: 342px;
    height: 35px;
    background: rgba(250,250,250,1);
    opacity: 1;
    font-family: Poppins;
    position: absolute;
    top: 210px;
    left: 41px;
  }
  .v22_5853 input {
    width: 100%; /* Agar input memenuhi lebar div */
    padding: 8px 12px;
    font-size: 16px;
    outline: none;
    border: 1px solid rgba(0,0,0,0.5);
    border-top-left-radius: 7px;
    border-top-right-radius: 7px;
    border-bottom-left-radius: 7px;
    border-bottom-right-radius: 7px;
  }
  
  .v22_5853 input::placeholder {
    color: #aaa; /* Placeholder yang lebih cerah */
  }
  
  .v22_5854 {
    width: 342px;
    height: 35px;
    background: rgba(0, 123, 255, 1); /* Warna latar belakang biru */
    opacity: 1;
    position: absolute;
    top: 304px;
    font-family: Poppins;
    left: 41px;
    border-top-left-radius: 7px;
    border-top-right-radius: 7px;
    border-bottom-left-radius: 7px;
    border-bottom-right-radius: 7px;
    overflow: hidden;
  }
  .v22_5855 {
    width: 73px;
    color: url("../images/v22_5855.png");
    position: absolute;
    top: 136px;
    left: 41px;
    font-family: Poppins;
    font-weight: SemiBold;
    font-size: 12px;
    opacity: 1;
    text-align: left;
  }
  .v22_5856 {
    width: 69px;
    color: url("../images/v22_5856.png");
    position: absolute;
    top: 218px;
    left: 41px;
    font-family: Poppins;
    font-weight: SemiBold;
    font-size: 12px;
    opacity: 1;
    text-align: left;
  }
  .v22_5857 {
    width: 100%; /* Mengatur lebar button untuk memenuhi kontainer */
    height: 100%; /* Mengatur tinggi button sesuai dengan kontainer */
    color: rgba(250, 250, 250, 1); /* Warna teks putih */
    background: transparent; /* Membuat latar belakang button transparan */
    border: none; /* Menghapus border pada button */
    font-family: 'Poppins', sans-serif;
    font-weight: 600; /* SemiBold */
    font-size: 14px; /* Ukuran font sedikit lebih besar */
    text-align: center; /* Teks berada di tengah */
    cursor: pointer; /* Menambahkan pointer saat hover */
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .v22_5858 {
    width: 17px;
    height: 11px;
    background: rgba(0,0,0,0.550000011920929);
    opacity: 1;
    position: absolute;
    top: 255px;
    left: 357px;
  }
  .v22_5859 {
    width: 65px;
    height: 61px;
    background: url("/storage/images/v22_5859.png");
    background-repeat: no-repeat;
    background-position: center center;
    background-size: cover;
    opacity: 1;
    position: absolute;
    top: 319px;
    left: 723px;
    overflow: hidden;
  }
  
</style>
</html>
