
<!DOCTYPE html>
<html>
  <head>
    <title>منصة تبديل الشفتات</title>
    <style>
      body {
  font-family: '', sans-serif;
  font-size: 1.1em;
  background-color: #FFC107;
  color: #333;
  text-align: center;
}
      
      h1 {
        color: #333;
        text-align: center;
      }
      form {
        width: 400px;
        margin: 0 auto;
        padding: 20px;
        background-color: #FFF;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        text-align: center;
      }
      label {
        display: block;
        margin-top: 20px;
      }
      input[type="text"],
      input[type="tel"],
      select,
      input[type="datetime-local"] {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border: 2px solid #CCC;
        border-radius: 5px;
        box-sizing: border-box;
        text-align: center;
      }
      input[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #FFC107;
        color: #FFF;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-top: 20px;
      }
      input[type="submit"]:hover {
        background-color: #FFA000;
        
      }
      img {
        display: block;
        margin: 20px auto;
        width: 200px;
        height: 200px;
        vertical-align: middle;
      }
    </style>
  </head>
  <body>   
    <img src="2p.jpg" alt="Logo">
    <h1>شِــفــت</h1>
    <h2> منصة تبديل اوقات العمل بين الموظفين</h2>
    <form action="connect.php" method="post">
      <label for="name">: اسم الموظف</label><br>
      <input type="text" id="name" name="name" required><br>
      <label for="mobile_number">: رقم الجوال</label><br>
      <input type="tel" id="mobile_number" name="mobile_number" required><br>
      <label for="current_shift">: الشفت الحالي</label><br>
      
      <select id="required_shift" name="required_shift" required>
        <option value="morning">صباحاً</option>
        <option value="afternoon">ظهراً</option>
        <option value="evening">مساءً</option>
      </select><br>
      <label for="required_shift">: الشفت المرغوب</label><br>
      <select id="required_shift" name="required_shift" required>
        <option value="morning">صباحاً</option>
        <option value="afternoon">ظهراً</option>
        <option value="evening">مساءً</option>
      </select><br>
      <label for="switch_period">: الوقت الحالي</label><br>
      <input type="time" id="switch_period" name="switch_period" required><br>
      <label for="switch_period2">: الوقت المرغوب</label><br>
      <input type="time" id="switch_period2" name="switch_period2" required><br>
      <p>تحذير: إرسال طلبات تغيير الشفت لغير الجادين قد يعرضك للمخالفة</p>
      <input type="submit" value="اعتمد طلب تغيير الشفت">
      <form action="done.html" method="post"></form>


    </form>
  </body>
</html>