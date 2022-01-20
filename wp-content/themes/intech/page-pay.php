<form action='https://24.epolicy.com.ua/wp-content/plugins/liqpay_wordpress/liqpay-form.php' method='POST' style='width: 197px;' >
    <input type='hidden' name='date' value='<?php echo date("d.m.Y H:i:s" ); ?>' required/>
    <input type='hidden' name='liqpay_product_id'  value='1'/>
    <input type='hidden' name='hidden_content'  value='test content'/>
    <input type='hidden' name='url_page'  value='https://24.epolicy.com.ua/'/>
    <input type='hidden' name='ip'  value='<?php echo $_SERVER['REMOTE_ADDR']; ?>'/>
    <input type='hidden' name='pay_type'  value='pay'/>
<!--    <input type='hidden' name='subscribe_type'  value='month'/>-->
    <input  class='textarea' type='text' name='fio' value=''  placeholder='ФИО' required/><br />
    <input  class='textarea' type='email' name='mail' value=''  placeholder='Email' required/> <br />
    <label for='plata'>Призначення платежу</label><br />
    <input  class='textarea'  type='text' id='plata' name='plata'  value='' /><br />
    <input style='float: left;'    class='textarea val' type='text' id='paid' name='paid'  value='' required/>
    <select class='textarea sel' style='float: left;' name='menu' size='1'>
        <option value='EUR'>EUR</option>
        <option selected='selected' value='UAH'>UAH</option>
        <option  value='USD'>USD</option>
        <option  value='RUB'>RUB</option>
    </select> <br />
    <input class='btn' type='submit' value='Оплатить' /></form>
